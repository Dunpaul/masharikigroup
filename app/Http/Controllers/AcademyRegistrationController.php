<?php

namespace App\Http\Controllers;

use App\Models\AcademyCohort;
use App\Models\AcademyFormField;
use App\Models\AcademyFormSubmission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class AcademyRegistrationController extends Controller
{
    public function create(): View
    {
        return view('academy.apply', [
            'fields' => AcademyFormField::ordered(),
            'cohort' => AcademyCohort::current(),
        ]);
    }

    public function store(Request $request)
    {
        $cohort = AcademyCohort::current();

        abort_unless($cohort, 403, 'Applications are currently closed.');

        $fields = AcademyFormField::ordered();

        $rules = [];

        foreach ($fields as $field) {
            $rule = $field->required ? ['required'] : ['nullable'];

            $rule[] = match ($field->type) {
                'email' => 'email',
                'date' => 'date',
                'checkbox' => 'boolean',
                'select', 'radio' => 'in:'.implode(',', array_keys($field->resolvedOptions())),
                'file' => 'array',
                default => 'string',
            };

            if ($field->type === 'file') {
                $rules["{$field->key}.*"] = 'nullable|file|mimes:pdf,jpg,jpeg,png,mp4,mov,doc,docx|max:10240';
            } else {
                $rules[$field->key] = implode('|', $rule);
            }
        }

        $validated = $request->validate($rules);

        $answers = [];
        $filesData = [];
        $systemValues = ['full_name' => null, 'email' => null, 'program' => null];

        foreach ($fields as $field) {
            if ($field->type === 'file') {
                foreach ($request->file($field->key, []) as $file) {
                    if ($file && $file->isValid()) {
                        $path = $file->store('academy-submissions', 'public');
                        $filesData[] = [
                            'field' => $field->key,
                            'name' => $file->getClientOriginalName(),
                            'path' => $path,
                            'mime' => $file->getMimeType(),
                        ];
                    }
                }

                continue;
            }

            $value = $validated[$field->key] ?? null;

            if ($field->system_key && array_key_exists($field->system_key, $systemValues)) {
                $systemValues[$field->system_key] = $value;
            }

            $answers[$field->key] = $value;
        }

        $submission = AcademyFormSubmission::create([
            'academy_cohort_id' => $cohort->id,
            'full_name' => $systemValues['full_name'],
            'email' => $systemValues['email'],
            'program' => $systemValues['program'],
            'answers' => $answers,
            'portfolio_files' => $filesData,
            'ip_address' => $request->ip(),
            'user_agent' => $request->header('User-Agent'),
            'submitted_at' => now(),
        ]);

        $this->sendNotifications($submission);

        return back()->with('success', 'Application received! We will contact you soon.');
    }

    protected function sendNotifications(AcademyFormSubmission $submission): void
    {
        $adminSubject = 'New Application Received – Check Admin Panel';
        $adminBody = "New application:\n\n".
            "Name: {$submission->full_name}\n".
            "Email: {$submission->email}\n".
            "Program: {$submission->program}\n\n".
            'View: '.url('/admin/academy-form-submissions/'.$submission->id)."\n\n".
            '-- Mashariki Arts Academy';

        foreach (['info@masharikiacademy.org', 'masharikiartsacademy@gmail.com'] as $to) {
            try {
                Mail::raw($adminBody, function ($message) use ($to, $adminSubject) {
                    $message->to($to)->subject($adminSubject)->from('info@masharikiacademy.org', 'Mashariki Arts Academy');
                });
            } catch (\Exception $e) {
                Log::warning('Admin email failed', ['error' => $e->getMessage()]);
            }
        }

        if ($submission->email) {
            $confirmSubject = 'Application Received – Mashariki Arts Academy';
            $confirmBody = "Dear Applicant,\n\n".
                "Thank you for applying to Mashariki Arts Academy. We are delighted to confirm that your application has been successfully received.\n\n".
                "Our admissions team is currently reviewing submissions. If your application is shortlisted, we will contact you through this email address.\n\n".
                "Warm regards,\n".
                'Mashariki Arts Academy Admissions Team';

            try {
                Mail::raw($confirmBody, function ($message) use ($submission, $confirmSubject) {
                    $message->to($submission->email)
                        ->subject($confirmSubject)
                        ->from('info@masharikiacademy.org', 'Mashariki Arts Academy');
                });
            } catch (\Exception $e) {
                Log::warning('Confirmation email failed', ['error' => $e->getMessage()]);
            }
        }
    }
}

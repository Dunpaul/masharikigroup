<?php

namespace App\Http\Controllers;

use App\Models\AcademyProgram;
use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ApplicationController extends Controller
{
    public function submit(Request $request)
    {
        $specializationKeys = AcademyProgram::query()->pluck('specialization_key')->implode(',');

        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'nationality' => 'required|string|max:100',
            'affiliated_with_norxen' => 'required|in:yes,no',
            'address' => 'required|string|max:500',
            'phone' => 'required|string|max:50',
            'email' => 'required|email|max:255',
            'id_number' => 'required|string|max:100',
            'gender' => 'nullable|string|in:male,female,other',
            'specialization' => "required|string|in:{$specializationKeys}",
            'education_level' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'year_completed' => 'required|integer|min:1900|max:'.(date('Y') + 1),
            'has_experience' => 'required|in:yes,no',
            'experience_description' => 'required_if:has_experience,yes|string|max:1500|nullable',
            'motivation' => 'required|string|max:4000',
            'commitment' => 'required|in:yes',
            'declaration_name' => 'required|string|max:255',
            'declaration_date' => 'required|date',
            'declaration_agree' => 'required|accepted',
            'portfolio_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png,mp4,mov,doc,docx|max:10240',
        ]);

        try {
            $application = Application::create([
                'full_name' => $validated['full_name'],
                'date_of_birth' => $validated['date_of_birth'],
                'nationality' => $validated['nationality'],
                'affiliated_with_norxen' => $validated['affiliated_with_norxen'],
                'address' => $validated['address'],
                'phone' => $validated['phone'],
                'email' => $validated['email'],
                'id_number' => $validated['id_number'],
                'gender' => $validated['gender'] ?? null,
                'specialization' => $validated['specialization'],
                'education_level' => $validated['education_level'],
                'institution' => $validated['institution'],
                'year_completed' => $validated['year_completed'],
                'has_experience' => $validated['has_experience'],
                'experience_description' => $validated['experience_description'] ?? null,
                'motivation' => $validated['motivation'],
                'commitment' => $validated['commitment'] === 'yes',
                'declaration_name' => $validated['declaration_name'],
                'declaration_date' => $validated['declaration_date'],
                'declaration_agree' => $validated['declaration_agree'] === '1',
                'ip_address' => $request->ip(),
                'user_agent' => $request->header('User-Agent'),
            ]);

            $filesData = [];
            if ($request->hasFile('portfolio_files')) {
                foreach ($request->file('portfolio_files') as $file) {
                    if ($file->isValid()) {
                        $path = $file->store('portfolio/'.$application->id, 'public');
                        $filesData[] = [
                            'name' => $file->getClientOriginalName(),
                            'path' => $path,
                            'mime' => $file->getMimeType(),
                        ];
                    }
                }
            }

            $application->update(['portfolio_files' => $filesData]);

            $adminSubject = 'New Application Received – Check Admin Panel';
            $adminBody = "New application:\n\n".
                "Name: {$application->full_name}\n".
                "Email: {$application->email}\n".
                "Specialization: {$application->specialization}\n".
                "Affiliated with Norxen Kigali: {$application->affiliated_with_norxen}\n".
                'Files: '.count($filesData)." uploaded\n\n".
                'View: '.url('/admin/applications')."\n\n".
                '-- Mashariki Arts Academy';

            $adminRecipients = ['info@masharikiacademy.org', 'masharikiartsacademy@gmail.com'];

            foreach ($adminRecipients as $to) {
                try {
                    Mail::raw($adminBody, function ($message) use ($to, $adminSubject) {
                        $message->to($to)->subject($adminSubject)->from('info@masharikiacademy.org', 'Mashariki Arts Academy');
                    });
                } catch (\Exception $e) {
                    Log::warning('Admin email failed', ['error' => $e->getMessage()]);
                }
            }

            $confirmSubject = 'Application Received – Mashariki Arts Academy';
            $confirmBody = "Dear Applicant,\n\n".
                "Thank you for applying to Mashariki Arts Academy. We are delighted to confirm that your application has been successfully received.\n\n".
                "Our admissions team is currently reviewing submissions. In the meantime, we encourage you to explore important information about joining our academy, including program details and admission requirements, on our website: https://masharikiacademy.org/admissions\n\n".
                "If your application is shortlisted, we will contact you through this email address. We sincerely appreciate your interest and patience during the review process.\n\n".
                "Warm regards,\n".
                'Mashariki Arts Academy Admissions Team';

            try {
                Mail::raw($confirmBody, function ($message) use ($application, $confirmSubject) {
                    $message->to($application->email)
                        ->subject($confirmSubject)
                        ->from('info@masharikiacademy.org', 'Mashariki Arts Academy');
                });
            } catch (\Exception $e) {
                Log::warning('Confirmation email failed', ['error' => $e->getMessage()]);
            }

            return back()->with('success', 'Application received! We will contact you soon.');
        } catch (\Exception $e) {
            Log::error('Submission failed', ['error' => $e->getMessage()]);

            return back()->with('error', 'Error submitting. Email info@masharikiacademy.org directly.');
        }
    }
}

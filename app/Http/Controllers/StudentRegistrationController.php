<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;

class StudentRegistrationController extends Controller
{
    public function create(): View
    {
        return view('market.register-student');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'company_contact_first_name' => 'required|string|max:255',
            'company_contact_last_name' => 'required|string|max:255',
            'company_contact_phone' => 'required|string|max:50',
            'company_contact_email' => 'required|email|max:255|unique:students,company_contact_email',
            'designation' => 'required|string|max:255',
            'attending_as' => 'required|in:buyer,seller,vendor,official,visitor,press',
            'school_name' => 'required|string|max:255',
            'school_address' => 'required|string|max:255',
            'school_phone' => 'required|string|max:50',
            'school_email' => 'required|email|max:255',
            'school_website' => 'required|string|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $student = Student::create([
            ...$validated,
            'registration_id' => Student::generateRegistrationId(),
            'payment_status' => 'paid',
        ]);

        try {
            Mail::raw(
                "Dear {$student->company_contact_first_name},\n\n".
                "Thank you for registering as a student attendee for Masharket. Your registration ({$student->registration_id}) is confirmed — student registration is free, no payment needed.\n\n".
                'Masharket Team',
                function ($message) use ($student) {
                    $message->to($student->company_contact_email)
                        ->subject('Masharket Student Registration Confirmed');
                }
            );
        } catch (\Exception $e) {
            Log::warning('Student confirmation email failed', ['error' => $e->getMessage()]);
        }

        $ticketUrl = route('market.ticket.show', ['type' => 'student', 'registrationId' => $student->registration_id]);

        return back()->with('success', "Registration confirmed! Your reference is {$student->registration_id}. View your ticket at: {$ticketUrl}");
    }
}

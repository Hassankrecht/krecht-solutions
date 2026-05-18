<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SiteSetting;
use App\Mail\ContactMessageNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        $siteName = SiteSetting::get('site_name', 'Krecht Solutions');
        $siteTagline = SiteSetting::get('site_tagline', 'Software & IT Services');
        $contactEmail = SiteSetting::get('contact_email', config('mail.from.address'));
        $contactPhone = SiteSetting::get('contact_phone', '78768725');
        $contactAddress = SiteSetting::get('contact_address', 'Sour, Lebanon');
        $contactWhatsapp = SiteSetting::get('contact_whatsapp', 'Available');
        $contactWorkingHours = SiteSetting::get('contact_working_hours', 'Monday - Sunday, 9:00 AM - 5:00 PM');
        
        return view('pages.contact', compact(
            'siteName',
            'siteTagline',
            'contactEmail',
            'contactPhone',
            'contactAddress',
            'contactWhatsapp',
            'contactWorkingHours'
        ));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        $contactMessage = ContactMessage::create($validated);

        try {
            $recipient = SiteSetting::get(
                'contact_notification_email',
                config('mail.mailers.smtp.username') ?: SiteSetting::get('contact_email', config('mail.from.address'))
            );

            if ($recipient) {
                Mail::to($recipient)->send(new ContactMessageNotification($contactMessage));
            }
        } catch (\Throwable $exception) {
            Log::error('Contact message email notification failed.', [
                'contact_message_id' => $contactMessage->id,
                'error' => $exception->getMessage(),
            ]);
        }

        return redirect()->back()->with('success', 'Your message has been sent successfully.');
    }
}

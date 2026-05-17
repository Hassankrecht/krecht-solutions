<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $siteName = SiteSetting::get('site_name', 'Krecht Solutions');
        $siteTagline = SiteSetting::get('site_tagline', 'Software & IT Services');
        $contactEmail = SiteSetting::get('contact_email', 'info@krecht-solutions.com');
        $contactPhone = SiteSetting::get('contact_phone', '+1 555 123 4567');
        $contactAddress = SiteSetting::get('contact_address', '123 Business Avenue, Tech City, TC 12345');
        
        return view('pages.contact', compact(
            'siteName',
            'siteTagline',
            'contactEmail',
            'contactPhone',
            'contactAddress'
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

        ContactMessage::create($validated);

        return redirect()->back()->with('success', 'Thank you for your message! We will get back to you soon.');
    }
}

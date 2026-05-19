<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Http\Request;

class SiteSettingController extends Controller
{
    public function index()
    {
        $settings = SiteSetting::all()->keyBy('key');
        return view('admin.settings.index', compact('settings'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'site_name_en' => 'required|string|max:255',
            'site_name_ar' => 'nullable|string|max:255',
            'site_tagline_en' => 'required|string|max:255',
            'site_tagline_ar' => 'nullable|string|max:255',
            'site_description_en' => 'required|string',
            'site_description_ar' => 'nullable|string',
            'contact_email' => 'required|email',
            'contact_notification_email' => 'required|email',
            'contact_phone' => 'required|string|max:255',
            'contact_address_en' => 'required|string|max:255',
            'contact_address_ar' => 'nullable|string|max:255',
            'contact_whatsapp_en' => 'required|string|max:255',
            'contact_whatsapp_ar' => 'nullable|string|max:255',
            'contact_working_hours_en' => 'required|string|max:255',
            'contact_working_hours_ar' => 'nullable|string|max:255',
            'footer_working_hours_en' => 'required|string|max:255',
            'footer_working_hours_ar' => 'nullable|string|max:255',
            'social_twitter' => 'nullable|url',
            'social_facebook' => 'nullable|url',
            'social_instagram' => 'nullable|url',
            'social_linkedin' => 'nullable|url',
        ]);

        // Update text settings with bilingual support
        SiteSetting::setLocalized('site_name', $validated['site_name_en'], $validated['site_name_ar']);
        SiteSetting::setLocalized('site_tagline', $validated['site_tagline_en'], $validated['site_tagline_ar']);
        SiteSetting::setLocalized('site_description', $validated['site_description_en'], $validated['site_description_ar']);
        SiteSetting::set('contact_email', $validated['contact_email']);
        SiteSetting::set('contact_notification_email', $validated['contact_notification_email']);
        SiteSetting::set('contact_phone', $validated['contact_phone']);
        SiteSetting::setLocalized('contact_address', $validated['contact_address_en'], $validated['contact_address_ar']);
        SiteSetting::setLocalized('contact_whatsapp', $validated['contact_whatsapp_en'], $validated['contact_whatsapp_ar']);
        SiteSetting::setLocalized('contact_working_hours', $validated['contact_working_hours_en'], $validated['contact_working_hours_ar']);
        SiteSetting::setLocalized('footer_working_hours', $validated['footer_working_hours_en'], $validated['footer_working_hours_ar']);

        // Update social links as JSON
        $socialLinks = [
            'twitter' => $validated['social_twitter'] ?? '',
            'facebook' => $validated['social_facebook'] ?? '',
            'instagram' => $validated['social_instagram'] ?? '',
            'linkedin' => $validated['social_linkedin'] ?? '',
        ];
        SiteSetting::set('social_links', $socialLinks, 'json');

        return redirect()->route('admin.settings.index')
            ->with('success', 'Settings updated successfully.');
    }
}

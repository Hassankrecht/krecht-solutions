@extends('layouts.admin')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="mb-4">
                <h1 class="fs-3 mb-1">Site Settings</h1>
                <p class="mb-0 text-muted">Manage site-wide configuration and content.</p>
            </div>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <form action="{{ route('admin.settings.update') }}" method="POST">
        @csrf
        @method('PUT')

        <!-- Site Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Site Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Name (English)</label>
                        <input type="text" name="site_name_en" class="form-control" 
                               value="{{ $settings['site_name']->value['en'] ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Name (Arabic)</label>
                        <input type="text" name="site_name_ar" class="form-control" 
                               value="{{ $settings['site_name']->value['ar'] ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Tagline (English)</label>
                        <input type="text" name="site_tagline_en" class="form-control" 
                               value="{{ $settings['site_tagline']->value['en'] ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Site Tagline (Arabic)</label>
                        <input type="text" name="site_tagline_ar" class="form-control" 
                               value="{{ $settings['site_tagline']->value['ar'] ?? '' }}">
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Site Description (English)</label>
                        <textarea name="site_description_en" class="form-control" rows="3" required>{{ $settings['site_description']->value['en'] ?? '' }}</textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label">Site Description (Arabic)</label>
                        <textarea name="site_description_ar" class="form-control" rows="3">{{ $settings['site_description']->value['ar'] ?? '' }}</textarea>
                    </div>
                </div>
            </div>
        </div>

        <!-- Contact Information -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Contact Information</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Email</label>
                        <input type="email" name="contact_email" class="form-control" 
                               value="{{ $settings['contact_email']->value ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Notification Email</label>
                        <input type="email" name="contact_notification_email" class="form-control" 
                               value="{{ $settings['contact_notification_email']->value ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Phone</label>
                        <input type="text" name="contact_phone" class="form-control" 
                               value="{{ $settings['contact_phone']->value ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Address (English)</label>
                        <input type="text" name="contact_address_en" class="form-control" 
                               value="{{ $settings['contact_address']->value['en'] ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Address (Arabic)</label>
                        <input type="text" name="contact_address_ar" class="form-control" 
                               value="{{ $settings['contact_address']->value['ar'] ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">WhatsApp Status (English)</label>
                        <input type="text" name="contact_whatsapp_en" class="form-control" 
                               value="{{ $settings['contact_whatsapp']->value['en'] ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">WhatsApp Status (Arabic)</label>
                        <input type="text" name="contact_whatsapp_ar" class="form-control" 
                               value="{{ $settings['contact_whatsapp']->value['ar'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Working Hours -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Working Hours</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Working Hours (English)</label>
                        <input type="text" name="contact_working_hours_en" class="form-control" 
                               value="{{ $settings['contact_working_hours']->value['en'] ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Contact Working Hours (Arabic)</label>
                        <input type="text" name="contact_working_hours_ar" class="form-control" 
                               value="{{ $settings['contact_working_hours']->value['ar'] ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Footer Working Hours (English)</label>
                        <input type="text" name="footer_working_hours_en" class="form-control" 
                               value="{{ $settings['footer_working_hours']->value['en'] ?? '' }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Footer Working Hours (Arabic)</label>
                        <input type="text" name="footer_working_hours_ar" class="form-control" 
                               value="{{ $settings['footer_working_hours']->value['ar'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <!-- Social Media Links -->
        <div class="card mb-4">
            <div class="card-header">
                <h5 class="mb-0">Social Media Links</h5>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Twitter URL</label>
                        <input type="url" name="social_twitter" class="form-control" 
                               value="{{ $settings['social_links']->value['twitter'] ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Facebook URL</label>
                        <input type="url" name="social_facebook" class="form-control" 
                               value="{{ $settings['social_links']->value['facebook'] ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Instagram URL</label>
                        <input type="url" name="social_instagram" class="form-control" 
                               value="{{ $settings['social_links']->value['instagram'] ?? '' }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">LinkedIn URL</label>
                        <input type="url" name="social_linkedin" class="form-control" 
                               value="{{ $settings['social_links']->value['linkedin'] ?? '' }}">
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-4">
            <button type="submit" class="btn btn-primary">
                <i class="ti ti-device-floppy me-1"></i> Save Settings
            </button>
        </div>
    </form>
</div>
@endsection

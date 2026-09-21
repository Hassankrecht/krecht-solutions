@extends('layouts.app')
@section('title', 'Krecht Private Growth Engine Privacy Policy - Krecht Solutions')
@section('meta_description', 'Privacy Policy for the Krecht Private Growth Engine, including WhatsApp Business and Meta Cloud API business communications operated by Krecht Solutions.')
@section('canonical_url', config('app.url') . '/privacy-policy')
@section('content')

<!-- Hero Section -->
<section class="hero section dark-background" style="padding: 80px 0;">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Krecht Private Growth Engine Privacy Policy</h1>
                <p>Last updated: September 22, 2026</p>
            </div>
        </div>
    </div>
</section>

<!-- Privacy Policy Content -->
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10 content">

                <h3>1. Who We Are and Scope of This Policy</h3>
                <p>
                    This Privacy Policy is provided by {{ $siteName ?? 'Krecht Solutions' }} ("Krecht", "we", "us")
                    and applies to the <strong>Krecht Private Growth Engine</strong>, a private internal business
                    system owned and operated by Krecht, together with the business communications and integrations
                    connected to it.
                </p>
                <p>
                    The Krecht Private Growth Engine is not a public service, a self-service platform, or a customer
                    portal. It is used internally by authorized Krecht personnel for legitimate business operations
                    such as prospect and company research, business development, sales operations, customer
                    relationship management, business communications, and internal operational support.
                </p>

                <h3>2. Information We May Process</h3>
                <p>In the course of operating the Krecht Private Growth Engine and related business communications, we may process:</p>
                <ul>
                    <li>Names and business names of people who communicate with us or with whom we have a business relationship.</li>
                    <li>Business contact information, including phone numbers and email addresses.</li>
                    <li>WhatsApp identifiers, WhatsApp phone numbers, and the content of WhatsApp messages exchanged with our business.</li>
                    <li>Communication history and business relationship information.</li>
                    <li>Business, prospect, and customer information, including publicly available business information used for research and business development.</li>
                    <li>Technical and log information reasonably necessary to operate, secure, and maintain our systems.</li>
                </ul>

                <h3>3. How We Use Information</h3>
                <p>We process the information described above for legitimate operational purposes, including:</p>
                <ul>
                    <li>Receiving, managing, and responding to business communications.</li>
                    <li>Business development and prospect/customer relationship management.</li>
                    <li>Follow-up communications and providing requested information.</li>
                    <li>Internal sales operations and maintaining business communication history.</li>
                    <li>Internal operational analysis and supporting authorized Krecht personnel in performing business activities.</li>
                </ul>

                <h3>4. WhatsApp and Meta</h3>
                <p>
                    The Krecht Private Growth Engine may use WhatsApp Business, the WhatsApp Cloud API, and related
                    Meta infrastructure and services to send, receive, and manage authorized business communications.
                </p>
                <p>
                    When you communicate with our business through WhatsApp, we may process your phone number,
                    WhatsApp identifiers, message content, and related communication metadata as necessary to
                    receive, manage, and respond to that communication.
                </p>
                <p>
                    Meta and WhatsApp operate under their own applicable terms and privacy practices, which govern
                    their processing of information on their platforms. Krecht is not affiliated with, sponsored by,
                    or endorsed by Meta.
                </p>

                <h3>5. AI-Assisted Processing</h3>
                <p>
                    The Krecht Private Growth Engine uses AI-assisted capabilities to support authorized internal
                    business operations. AI may assist our personnel with activities such as organizing information,
                    researching business opportunities, understanding business communications, preparing responses,
                    supporting follow-ups, and assisting internal decision-making.
                </p>
                <p>
                    AI assistance is used to support our team; it does not mean that every decision or communication
                    is fully automated.
                </p>

                <h3>6. Sharing and Service Providers</h3>
                <p>
                    Information may be processed through service and infrastructure providers where necessary to
                    operate the relevant services. This may include communication, hosting, infrastructure, or
                    AI/service providers acting on our behalf.
                </p>
                <p>
                    We do not sell personal information.
                </p>

                <h3>7. Security</h3>
                <p>
                    We apply reasonable organizational and technical measures designed to protect the information we
                    process. However, no method of transmission or storage is completely secure, and we cannot
                    guarantee absolute security.
                </p>

                <h3>8. Data Retention</h3>
                <p>
                    We retain information only for as long as reasonably necessary for legitimate operational,
                    business, legal, or compliance purposes, after which it is deleted or anonymized where
                    appropriate.
                </p>

                <h3>9. Your Privacy Requests</h3>
                <p>
                    You may contact us regarding applicable privacy requests, such as accessing, correcting, or
                    deleting your information, or asking questions about how your information is handled. We will
                    review and respond to requests in accordance with applicable law.
                </p>

                <h3>10. Third-Party Services</h3>
                <p>
                    Third-party services we use, including Meta and WhatsApp, may have their own privacy terms and
                    policies. We encourage you to review those policies for information about how those services
                    handle your data.
                </p>

                <h3>11. Changes to This Policy</h3>
                <p>
                    We may update this Privacy Policy when our practices, services, or legal requirements change.
                    The "Last updated" date at the top of this page reflects the most recent revision.
                </p>

                <h3>12. Contact Us</h3>
                <p>
                    If you have questions about this Privacy Policy or wish to make a privacy-related request, you
                    can reach us through our <a href="{{ route('contact') }}">contact page</a>
                    @if(!empty($contactEmail))
                        or by email at <a href="mailto:{{ $contactEmail }}">{{ $contactEmail }}</a>
                    @endif
                    .
                </p>

            </div>
        </div>
    </div>
</section>

@endsection

<?php

namespace App\Console\Commands;

use App\Mail\ContactMessageNotification;
use App\Models\ContactMessage;
use App\Models\SiteSetting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendContactTestEmail extends Command
{
    protected $signature = 'mail:test-contact {--to= : Email address to receive the test notification}';

    protected $description = 'Send a test Krecht Solutions contact notification email.';

    public function handle(): int
    {
        $recipient = $this->option('to')
            ?: SiteSetting::get(
                'contact_notification_email',
                config('mail.mailers.smtp.username') ?: SiteSetting::get('contact_email', config('mail.from.address'))
            );

        if (! filter_var($recipient, FILTER_VALIDATE_EMAIL)) {
            $this->error('No valid recipient email is configured.');

            return self::FAILURE;
        }

        $contactMessage = new ContactMessage([
            'name' => 'Krecht Solutions Test',
            'email' => config('mail.from.address'),
            'phone' => '78768725',
            'subject' => 'Test contact email notification',
            'message' => 'This is a test email from the Krecht Solutions contact notification system.',
        ]);
        $contactMessage->created_at = now();

        Mail::to($recipient)->send(new ContactMessageNotification($contactMessage));

        $this->info("Test contact email sent to {$recipient}.");

        return self::SUCCESS;
    }
}

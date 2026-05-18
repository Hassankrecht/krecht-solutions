<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>New Contact Message</title>
</head>
<body style="margin:0; padding:0; background:#f4f7fb; font-family:Arial, Helvetica, sans-serif; color:#172033;">
  @php
    $logoPath = public_path('assets/img/logo/logo-solution.png');
    $submittedAt = optional($contactMessage->created_at)->format('F j, Y - g:i A') ?? now()->format('F j, Y - g:i A');
  @endphp

  <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="background:#f4f7fb; padding:28px 12px;">
    <tr>
      <td align="center">
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="max-width:680px; background:#ffffff; border-radius:12px; overflow:hidden; box-shadow:0 10px 30px rgba(15,32,55,0.12);">
          <tr>
            <td style="background:#07182f; padding:28px 32px; text-align:center;">
              @if(file_exists($logoPath))
                <img src="{{ $message->embed($logoPath) }}" alt="Krecht Solutions" style="max-width:180px; height:auto; display:inline-block; margin-bottom:14px;">
              @endif
              <h1 style="margin:0; color:#ffffff; font-size:24px; line-height:1.3;">New Contact Message</h1>
              <p style="margin:8px 0 0; color:#7dd3fc; font-size:14px;">Krecht Solutions Website</p>
            </td>
          </tr>

          <tr>
            <td style="padding:30px 32px;">
              <p style="margin:0 0 18px; color:#41506a; font-size:15px; line-height:1.6;">
                A new message was submitted from the website contact form.
              </p>

              <table role="presentation" width="100%" cellspacing="0" cellpadding="0" style="border-collapse:collapse; margin-bottom:24px;">
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#64748b; width:150px;">Sender</td>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#172033; font-weight:700;">{{ $contactMessage->name }}</td>
                </tr>
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#64748b;">Email</td>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5;">
                    <a href="mailto:{{ $contactMessage->email }}" style="color:#0ea5e9; text-decoration:none;">{{ $contactMessage->email }}</a>
                  </td>
                </tr>
                @if($contactMessage->phone)
                  <tr>
                    <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#64748b;">Phone</td>
                    <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#172033;">{{ $contactMessage->phone }}</td>
                  </tr>
                @endif
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#64748b;">Subject</td>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#172033;">{{ $contactMessage->subject ?: 'No subject provided' }}</td>
                </tr>
                <tr>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#64748b;">Submitted</td>
                  <td style="padding:12px 0; border-bottom:1px solid #e6edf5; color:#172033;">{{ $submittedAt }}</td>
                </tr>
              </table>

              <div style="background:#f8fbff; border-left:4px solid #0ea5e9; border-radius:8px; padding:18px 20px;">
                <h2 style="margin:0 0 10px; color:#07182f; font-size:16px;">Message</h2>
                <div style="color:#263449; font-size:15px; line-height:1.7; white-space:pre-line;">{{ $contactMessage->message }}</div>
              </div>
            </td>
          </tr>

          <tr>
            <td style="background:#07182f; padding:18px 32px; text-align:center;">
              <p style="margin:0; color:#b6c4d6; font-size:12px;">This notification was sent automatically by the Krecht Solutions website.</p>
            </td>
          </tr>
        </table>
      </td>
    </tr>
  </table>
</body>
</html>

<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'Contact endpoint ready',
            'data' => [
                'email' => config('mail.from.address'),
            ]
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'    => 'required|string|max:255',
            'email'   => 'required|email',
            'phone'   => 'nullable|string|max:30',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string|min:10',
        ]);

        $message = ContactMessage::create($request->only(
            'name', 'email', 'phone', 'subject', 'message'
        ));

        return response()->json([
            'success' => true,
            'message' => 'Your message has been sent successfully.',
            'data'    => $message,
        ], 201);
    }
}

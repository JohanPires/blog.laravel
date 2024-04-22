<?php

namespace App\Http\Controllers;

use App\Rules\ReCaptchaV3;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        return view('recaptcha');
    }

    /**
     * Processes the contact form post
     */
    public function send(Request $request)
    {
        $request->validate( [
            'name' => ['required', 'string', 'max:50'],
            'message' => ['required', 'string', 'max:500'],
            'email' => ['required', 'email:rfc'],
            'g-recaptcha-response' => ['required', new ReCaptchaV3('submitContact')]
        ]);

        // RecaptCha V3 and other rules have passed, safe to continue

        // Here you can add code to actually send the email message

        return redirect()->back()->with('message', 'Thank you for contacting us. Your message has been sent. ');
    }
}

<?php

namespace App\Http\Controllers;
use App\Models\Message;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);


        Contact::create($request->all());


        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'message' => $request->input('message'),
        ];

        Message::create($data);


        Mail::to('recipient@example.com')->send(new ContactFormMail($data));

        return redirect()->back()->with('success', 'Your message was sent successfully!');
    }
}

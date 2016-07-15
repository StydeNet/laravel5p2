<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

    public function sendEmail(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'body' => 'required|max:1000',
        ]);

        $data = $request->only('name', 'email', 'body');

        $contact = ContactMessage::create($data);

        Mail::send('emails.message', compact('contact'), function (Message $m) use ($contact) {
            $m->from('no-reply@styde.net', 'Styde');
            $m->replyTo($contact->email, $contact->name);

            $m->to('admin@styde.net', 'Duilio')->subject('Nuevo mensaje');
        });

        return back()->with('success', '¡Mensaje recibido!');
    }
}

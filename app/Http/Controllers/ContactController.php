<?php

namespace App\Http\Controllers;

use App\ContactMessage;
use App\Jobs\SendContactEmail;
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

        $this->dispatch(new SendContactEmail($contact));

        return back()->with('success', '¡Mensaje recibido!');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
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

        Mail::send('emails.message', $data, function (Message $m) use ($data) {
            $m->from('no-reply@styde.net', 'Styde');
            $m->replyTo($data['email'], $data['name']);

            $m->to('admin@styde.net', 'Duilio')->subject('Nuevo mensaje');
        });

        return back()->with('success', '¡Mensaje recibido!');
    }
}

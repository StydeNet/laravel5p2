<?php

namespace App\Jobs;

use App\ContactMessage;
use Illuminate\Mail\Message;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactEmail extends Job implements ShouldQueue
{
    use InteractsWithQueue, SerializesModels;
    /**
     * @var ContactMessage
     */
    private $contact;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(ContactMessage $contact)
    {
        //
        $this->contact = $contact;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle(Mailer $mailer)
    {
        $mailer->send('emails.message', ['contact' => $this->contact], function (Message $m) {
            $m->from('no-reply@styde.net', 'Styde');
            $m->replyTo($this->contact->email, $this->contact->name);

            $m->to('admin@styde.net', 'Duilio')->subject('Nuevo mensaje');
        });
    }
}

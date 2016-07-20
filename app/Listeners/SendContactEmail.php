<?php

namespace App\Listeners;

use Illuminate\Mail\Message;
use App\Events\ContactMessageSent;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendContactEmail implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * @var Mailer
     */
    private $mailer;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    /**
     * Handle the event.
     *
     * @param  ContactMessageSent  $event
     * @return void
     */
    public function handle(ContactMessageSent $event)
    {
        $this->mailer->send('emails.message', ['contact' => $event->contact], function (Message $m) use ($event) {
            $m->from('no-reply@styde.net', 'Styde');
            $m->replyTo($event->contact->email, $event->contact->name);

            $m->to('admin@styde.net', 'Duilio')->subject('Nuevo mensaje');
        });
    }
}

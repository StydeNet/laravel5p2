<?php

namespace App\Events;

use App\ContactMessage;
use Illuminate\Queue\SerializesModels;

class ContactMessageSent extends Event
{
    use SerializesModels;
    /**
     * @var ContactMessage
     */
    public $contact;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(ContactMessage $contact)
    {
        $this->contact = $contact;
    }
}

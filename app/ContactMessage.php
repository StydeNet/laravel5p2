<?php

namespace App;

use App\Events\ContactMessageSent;
use Illuminate\Database\Eloquent\Model;

class ContactMessage extends Model
{
    protected $table = 'contact_messages';
    protected $fillable = ['name', 'email', 'body'];

    public static function submitMessage(array $data)
    {
        $contact = static::create($data);

        event(new ContactMessageSent($contact));
    }
}

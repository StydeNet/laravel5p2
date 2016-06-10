<?php

namespace App\Listeners;

use App\Events\PostWasPublished;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Log;

class NotifyToSubscribers
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PostWasPublished  $event
     * @return void
     */
    public function handle(PostWasPublished $event)
    {
        Log::info('Notificando a suscriptores sobre nuestro post: '.$event->post->title);
    }
}

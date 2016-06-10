<?php

namespace App\Listeners;

use App\Events\PostWasPublished;
use Illuminate\Log\Writer as Log;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NotifyToSlack
{
    /**
     * @var Writer
     */
    private $log;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Log $log)
    {
        $this->log = $log;
    }

    /**
     * Handle the event.
     *
     * @param  PostWasPublished  $event
     * @return void
     */
    public function handle(PostWasPublished $event)
    {
        $this->log->info('Notificando a Slack sobre nuestro post: '.$event->post->title);
    }
}

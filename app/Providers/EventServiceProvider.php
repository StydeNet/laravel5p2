<?php

namespace App\Providers;

use App\Activity;
use App\Events\ContactMessageSent;
use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        /*
        'App\Events\SomeEvent' => [
            'App\Listeners\EventListener',
        ],*/
        'Illuminate\Auth\Events\Login' => [
            'App\Listeners\LogLastLogin',
            'App\Listeners\UpdateLastLoggedAt',
        ],
        'App\Events\PostWasPublished' => [
            'App\Listeners\NotifyToSlack',
            'App\Listeners\TweetPost',
            'App\Listeners\NotifyToSubscribers',
        ],
        'App\Events\ContactMessageSent' => [
            'App\Listeners\SendContactEmail'
        ]
    ];

    /**
     * Register any other events for your application.
     *
     * @param  \Illuminate\Contracts\Events\Dispatcher  $events
     * @return void
     */
    public function boot(DispatcherContract $events)
    {
        parent::boot($events);

        $events->listen('eloquent.created: *', function ($model) {
            Activity::record('create', $model);
        });
    }
}

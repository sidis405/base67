<?php

namespace App\Listeners;

use App\User;
use App\Events\PostWasUpdated;
use App\Jobs\NotifyUsersOfUpdatedPostJob;

class PostWasUpdatedListener
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
     * @param  object  $event
     *
     * @return void
     */
    public function handle(PostWasUpdated $event)
    {
        $admin = User::where('role', 'admin')->first(); //1 utente

        $userToNotify = (auth()->id() == $event->post->user_id) ? $admin : $event->post->user;

        NotifyUsersOfUpdatedPostJob::dispatch($event->post, $userToNotify, auth()->user());
    }
}

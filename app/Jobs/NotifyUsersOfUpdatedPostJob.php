<?php

namespace App\Jobs;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use App\Mail\NotifyOfUpdatedPost;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifyUsersOfUpdatedPostJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $post;
    public $userToNotify;
    public $actinguser;


    /**
     * Create a new message instance.
     *
     * @param mixed $actinguser
     *
     * @return void
     */
    public function __construct(Post $post, User $userToNotify, User $actinguser)
    {
        $this->post = $post;
        $this->userToNotify = $userToNotify;
        $this->actinguser = $actinguser;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->userToNotify)->send(new NotifyOfUpdatedPost($this->post, $this->userToNotify, $this->actinguser));
    }
}

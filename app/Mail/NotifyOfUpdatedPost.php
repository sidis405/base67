<?php

namespace App\Mail;

use App\Post;
use App\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class NotifyOfUpdatedPost extends Mailable
{
    public $post;
    public $userToNotify;
    public $actinguser;

    use Queueable, SerializesModels;

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
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.admin-post-updated')->subject('NOTICE: A post was updated');
    }
}

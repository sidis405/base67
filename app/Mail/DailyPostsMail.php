<?php

namespace App\Mail;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Database\Eloquent\Collection;

class DailyPostsMail extends Mailable
{
    public $posts;
    public $user;
    public $date;

    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @param mixed $posts
     * @param mixed $user
     *
     * @return void
     */
    public function __construct(Collection $posts, User $user, Carbon $date)
    {
        //
        $this->posts = $posts;
        $this->user = $user;
        $this->date = $date;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.posts.daily-recap')
        ->subject('Daily posts recap for ' . $this->date->format('d/m/Y'));
    }
}

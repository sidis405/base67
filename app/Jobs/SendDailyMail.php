<?php

namespace App\Jobs;

use App\User;
use Carbon\Carbon;
use App\Mail\DailyPostsMail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Database\Eloquent\Collection;

class SendDailyMail implements ShouldQueue
{
    protected $posts;
    protected $user;
    protected $date;

    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Collection $posts, User $user, Carbon $date)
    {
        $this->posts = $posts;
        $this->user = $user;
        $this->date = $date;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->user)->send(new DailyPostsMail($this->posts, $this->user, $this->date));
    }
}

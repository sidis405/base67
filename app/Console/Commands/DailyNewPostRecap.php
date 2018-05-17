<?php

namespace App\Console\Commands;

use App\Post;
use App\User;
use Carbon\Carbon;
use App\Jobs\SendDailyMail;
use Illuminate\Console\Command;

class DailyNewPostRecap extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'blog:daily-recap';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Recap of post for the day';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //11.59
        $posts = Post::whereDate('created_at', Carbon::now()->format('Y-m-d'))->with('user')->get();

        // dd(Carbon::now()->format('Y-m-d'));
        $admin = User::whereRole('admin')->first();

        SendDailyMail::dispatch($posts, $admin, Carbon::now());
    }
}

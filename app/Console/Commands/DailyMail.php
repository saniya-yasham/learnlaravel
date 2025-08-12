<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class DailyMail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily-mail';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //get all users email in a array
        $users = User::pluck('email')->toArray();
        //send email to all users
        foreach ($users as $user) {
            //closure
            Mail::raw('This is a daily email', function($mail) use ($user)   {
                $mail->to($user)
                ->subject('Daily Email')
                ->send();
            });
        }
    }
}

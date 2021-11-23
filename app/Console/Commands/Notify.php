<?php

namespace App\Console\Commands;

use App\Mail\NotifyEmail;
use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class Notify extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'user:notify';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send notify to user on email';

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
        $emails=User::select('email')->get();
        foreach($emails as $email){
            //$email is the email that get from database and want to send mail on it
            //NotifyEmail is mail class that create it by this command php artisan make:mail MailName
            //to use this without task scheduler user route
            Mail::to($email)->send(new NotifyEmail('programming','php'));
        }
    }
}

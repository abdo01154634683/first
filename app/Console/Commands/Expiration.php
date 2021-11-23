<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;

class Expiration extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    //the scheduler name it is any name you want
    protected $signature = 'user:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    //description of the task scheduler to the other understand what this scheduler make
    protected $description = 'expire user after 1 minute automatically';

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
    //write in it the task that you want to execute after specified time
    public function handle()
    {
        //return collection of users
        $users=User::where('expire',0)->get();
        foreach($users as $user){
            $user->update(['expire'=>1]);
        }
    }
}

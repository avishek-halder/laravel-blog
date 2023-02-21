<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
// use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

// use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class MailSendProcess implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        // Mail::to("avisheksh93@gmail.com")->send("new OrderShipped");
        //  $data = array('name'=>"Virat Gandhi");
        //  Mail::send(['text'=>'welcome'], $data, function($message) {
        //  $message->to("avishekhalder@elphilltechnology.com", 'Tutorials Point')->subject
        //  ('Laravel Basic Testing Mail');
        //  $message->from('xyz@gmail.com','Virat Gandhi');
        //  });

        Mail::raw('Hi, welcome user!', function ($message) {
            $message->to("avishekhalder@elphilltechnology.com")
                ->subject(unique_str());
        });
        // info('Some helpful information!');
        // logger('Debug message');
        // logger()->error('You are not allowed here.');
    }
}

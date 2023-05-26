<?php

namespace App\Jobs;

use App\Mail\acceptinst;
use App\Models\Admin;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class email implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
       public $message;

    public function __construct($message)
    {
$this->message=$message;
    }

    public function handle()
    {
        $admin=Admin::all();
        \App\Models\email::create([
           'message'=>$this->message
        ]);
        Mail::to($admin)->send(new \App\Mail\email($this->message));

    }
}

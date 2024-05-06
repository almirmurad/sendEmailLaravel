<?php

namespace App\Jobs;

use App\Mail\RegisterEmail;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendRegisterEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $client;
    /**
     * Create a new job instance.
     */
    public function __construct(User $client)
    {
        //
        $this->client = $client;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        //
        $registerMail = new RegisterEmail($this->client);


        // return $registerMail;
        //Mail::to('developer@webmurad.com.br')->send(new SendMail());
        Mail::to('almirmuradojr@gmail.com')->send($registerMail);
    }
}

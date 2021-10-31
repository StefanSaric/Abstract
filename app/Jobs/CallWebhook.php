<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Config;
use App\Models\Webhook;

class CallWebhook implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($file_path)
    {
        $this->file_path = $file_path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //get endpoints and payload_type from config file
        $endpoints = Config::get('webhook.ENDPOINTS');
        $payload_type = Config::get('webhook.PAYLOAD_TYPE');

        //calling webhook
        foreach ($endpoints as $endpoint)
        {
            new Webhook($endpoint, $payload_type,$this->file_path);
        }
    }
}

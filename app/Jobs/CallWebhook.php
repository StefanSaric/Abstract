<?php

namespace App\Jobs;

use App\Services\WebhookService;
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
    public function __construct($endpoint,$payload_type,$file_path)
    {
        $this->endpoint = $endpoint;
        $this->payload_type = $payload_type;
        $this->file_path = $file_path;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        new WebhookService($this->endpoint, $this->payload_type,$this->file_path);
    }
}

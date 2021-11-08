<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Support\Facades\Config;
use App\Jobs\CallWebhook;


class WebhookController extends Controller
{
    public function sendFile(Files $file)
    {

        $endpoints = Config::get('webhook.ENDPOINTS');

        $payload_type = Config::get('webhook.PAYLOAD_TYPE');


        foreach ($endpoints as $endpoint)
        {
            dispatch(new CallWebhook($endpoint,$payload_type,$file->url));
        }

        return redirect('admin/files');
    }
}

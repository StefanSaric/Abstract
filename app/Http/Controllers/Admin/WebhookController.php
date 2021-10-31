<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Files;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use App\Models\Webhook;


class WebhookController extends Controller
{
    public function sendFile($id)
    {

        $file = Files::find($id);

        $endpoints = Config::get('webhook.ENDPOINTS');

        $payload_type = Config::get('webhook.PAYLOAD_TYPE');

        foreach ($endpoints as $endpoint)
        {
            new Webhook($endpoint, $payload_type,$file->url);
        }
    }
}

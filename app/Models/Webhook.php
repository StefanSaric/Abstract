<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Config;


class Webhook extends Model
{
    protected $url;
    protected $payload;

    public function __construct($endpoint, $payload_type,$file_path)
    {
        $this->url = $endpoint;
        $this->payload = $this->getpayload($payload_type,$file_path);
        $this->create();
    }

    public function create ()
    {
        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $this->url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => $this->payload,
            CURLOPT_HTTPHEADER => array(
                'Content-Type: application/json'
            ),
        ));

        $response = curl_exec($curl);

        curl_close($curl);

        echo http_response_code()."\r\n";

    }

    public function getpayload ($payload_type,$file_path)
    {
        switch($payload_type){
            case "json":
                $this->payload = json_encode( array("file" => $file_path));
                return $this->payload;
        }
    }
}

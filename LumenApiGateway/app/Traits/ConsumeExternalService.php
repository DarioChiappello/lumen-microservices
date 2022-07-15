<?php

namespace App\Traits;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Log;

trait ConsumeExternalService
{
    /**
     * Send a request to any service
     * @return string
     */
    public function performRequest($method, $requestUrl, $formParams = [], $headers = [])
    {
        $client = new Client([
            'base_uri' => $this->baseUri,
        ]);

        if(isset($this->secret)){
            $headers['Authorization'] = $this->secret;
        }

        $response = $client->request($method, $requestUrl, [
            'form_params' => $formParams,
            'headers' => $headers,
        ]);

        return $response->getBody()->getContents();
    }

    // public function performRequest($method, $url, $body = null)
    // {
    //     $client = new Client();
    //     $request = $client->request($method, $url, [
    //         'body' => $body
    //     ]);
    //     return $request->getBody()->getContents();
    // }

}
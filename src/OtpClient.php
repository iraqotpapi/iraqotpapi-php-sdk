<?php

namespace IraqOTPAPI\otp;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class OtpClient
{
    private string $apiKey;
    private Client $http;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
        $this->http = new Client([
            'base_uri' => 'http://api.iraqotpapi.com/v1/',
            'timeout'  => 10.0,
        ]);
    }

    /**
     * Send OTP via WhatsApp with fallback.
     *
     * @param array $data Must include keys: to, sender, channel, message. Optional: fallback, lang
     * @return array|string
     */
    public function sendOtp(array $data)
    {
        try {
            $response = $this->http->post('otp/send', [
                'headers' => [
                    'Authorization' => 'Bearer ' . $this->apiKey,
                    'Content-Type'  => 'application/json',
                    'Accept'        => 'application/json',
                ],
                'json' => $data,
            ]);

            return json_decode($response->getBody(), true);
        } catch (RequestException $e) {
            return [
                'error' => true,
                'message' => $e->getMessage(),
                'response' => $e->hasResponse() ? (string) $e->getResponse()->getBody() : null,
            ];
        }
    }
}

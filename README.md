# iraqotpapi-php-sdk
IraqOTPAPI is the top OTP API provider in Iraq, offering reliable WhatsApp and SMS authentication services.

# Iraq OTP API – PHP SDK

A lightweight PHP SDK for sending OTP codes via WhatsApp (with fallback to Telegram/SMS) using the [IraqOTPAPI.com](https://iraqotpapi.com) platform.

# Installation

```bash
composer require iraqotpapi/otp
```

## Usage

```bash
<?php

require 'vendor/autoload.php';

use IraqOTPAPI\otp\OtpClient;

// Initialize the client with your API key
$client = new OtpClient('YOUR_API_KEY');

// Send an OTP message
$response = $client->sendOtp([
    'to'       => '9647xxxxxxxxx',               // Recipient phone number (E.164 format)
    'sender'   => 'MySenderID',                  // Approved Sender ID
    'channel'  => 'whatsapp',                    // Primary channel
    'message'  => 'Your OTP Code is 123456',     // OTP message content
    'fallback' => 'sms',                         // Optional fallback channel
    'lang'     => 'en'                           // Optional language (ku, ar, en)
]);

// Handle the response
print_r($response);
```

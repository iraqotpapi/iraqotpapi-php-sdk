# iraqotpapi-php-sdk
IraqOTPAPI is Iraq's leading OTP API provider, offering robust and secure WhatsApp and SMS authentication services tailored specifically for the Iraqi market. Our PHP SDK makes it incredibly simple for developers to integrate reliable one-time password (OTP) functionality into their applications, ensuring secure user verification and transactions. Whether you need to implement OTP for user login, transaction confirmation, or two-factor authentication (2FA), IraqOTPAPI delivers fast and dependable OTP delivery across Iraq, making us the trusted choice for businesses prioritizing secure digital interactions in the region.

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

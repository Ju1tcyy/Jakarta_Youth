<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Http;

class RecaptchaHelper
{
    public static function verify($response, $remoteIp = null)
    {
        $secretKey = config('recaptcha.secret_key');
        
        if (empty($secretKey)) {
            return [
                'success' => false,
                'error' => 'reCAPTCHA secret key not configured'
            ];
        }

        try {
            $verifyResponse = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => $secretKey,
                'response' => $response,
                'remoteip' => $remoteIp
            ]);

            if ($verifyResponse->successful()) {
                $result = $verifyResponse->json();
                return $result;
            }

            return [
                'success' => false,
                'error' => 'Failed to connect to reCAPTCHA server'
            ];
        } catch (\Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }
}

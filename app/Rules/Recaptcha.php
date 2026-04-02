<?php

namespace App\Rules;

use Closure;
use App\Helpers\RecaptchaHelper;
use Illuminate\Contracts\Validation\ValidationRule;

class Recaptcha implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $result = RecaptchaHelper::verify($value, request()->ip());

        if (!isset($result['success']) || !$result['success']) {
            $fail('Verifikasi reCAPTCHA gagal, silakan coba lagi.');
        }
    }
}

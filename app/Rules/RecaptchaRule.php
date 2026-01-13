<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Http;

class RecaptchaRule implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        try {
            $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
                'secret' => config('services.recaptcha.secret_key'),
                'response' => $value,
                'remoteip' => request()->ip()
            ]);

            $result = $response->json();

            if (!isset($result['success']) || !$result['success']) {
                $fail('Verifikasi reCAPTCHA gagal. Silakan coba lagi.');
            }
        } catch (\Exception $e) {
            $fail('Terjadi kesalahan saat memverifikasi reCAPTCHA.');
        }
    }
}
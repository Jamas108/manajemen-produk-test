<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // Generate nonce untuk inline scripts
        $nonce = base64_encode(random_bytes(16));

        // Simpan nonce di request untuk digunakan di views
        $request->attributes->set('csp_nonce', $nonce);
        view()->share('cspNonce', $nonce);

        // Deteksi environment
        $isDevelopment = config('app.env') === 'local';

        // CSP Policy yang ketat
        $csp = [
            "default-src 'self'",
        ];

        // Script sources - HARUS ADA script-src-elem untuk Vite
        if ($isDevelopment) {
            // Development: izinkan Vite dev server
            $csp[] = "script-src 'self' 'nonce-{$nonce}' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google.com https://www.gstatic.com http://[::1]:5173 http://localhost:5173";
            $csp[] = "script-src-elem 'self' 'nonce-{$nonce}' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google.com https://www.gstatic.com http://[::1]:5173 http://localhost:5173";
        } else {
            // Production: strict
            $csp[] = "script-src 'self' 'nonce-{$nonce}' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google.com https://www.gstatic.com";
            $csp[] = "script-src-elem 'self' 'nonce-{$nonce}' https://cdn.jsdelivr.net https://cdnjs.cloudflare.com https://www.google.com https://www.gstatic.com";
        }

        // Style sources - HARUS ADA style-src-elem untuk Vite
        if ($isDevelopment) {
            // Development: izinkan Vite dev server + unsafe-inline untuk HMR
            $csp[] = "style-src 'self' 'nonce-{$nonce}' 'unsafe-inline' https://fonts.bunny.net https://fonts.googleapis.com http://[::1]:5173 http://localhost:5173";
            $csp[] = "style-src-elem 'self' 'nonce-{$nonce}' 'unsafe-inline' https://fonts.bunny.net https://fonts.googleapis.com http://[::1]:5173 http://localhost:5173";
        } else {
            // Production: strict
            $csp[] = "style-src 'self' 'nonce-{$nonce}' https://fonts.bunny.net https://fonts.googleapis.com";
            $csp[] = "style-src-elem 'self' 'nonce-{$nonce}' https://fonts.bunny.net https://fonts.googleapis.com";
        }

        // Font sources
        $csp[] = "font-src 'self' https://fonts.bunny.net https://fonts.gstatic.com data:";

        // Image sources
        $csp[] = "img-src 'self' data: https: blob:";

        // Connect sources - PENTING untuk Vite HMR (WebSocket)
        if ($isDevelopment) {
            $csp[] = "connect-src 'self' ws://[::1]:5173 ws://localhost:5173 http://[::1]:5173 http://localhost:5173 https://www.google.com https://www.gstatic.com";
        } else {
            $csp[] = "connect-src 'self' https://www.google.com https://www.gstatic.com";
        }

        // Frame sources - untuk reCAPTCHA
        $csp[] = "frame-src 'self' https://www.google.com https://recaptcha.google.com https://www.recaptcha.net";

        // Other directives
        $csp[] = "frame-ancestors 'none'";
        $csp[] = "base-uri 'self'";
        $csp[] = "form-action 'self'";

        // Hanya tambahkan upgrade-insecure-requests di production (HTTPS)
        if (!$isDevelopment) {
            $csp[] = "upgrade-insecure-requests";
        }

        $response->headers->set('Content-Security-Policy', implode('; ', $csp));

        // Security headers tambahan
        $response->headers->set('X-Content-Type-Options', 'nosniff');
        $response->headers->set('X-Frame-Options', 'SAMEORIGIN'); // SAMEORIGIN untuk reCAPTCHA
        $response->headers->set('X-XSS-Protection', '1; mode=block');
        $response->headers->set('Referrer-Policy', 'strict-origin-when-cross-origin');
        $response->headers->set('Permissions-Policy', 'geolocation=(), microphone=(), camera=()');

        return $response;
    }
}
@extends('layouts.app')

@section('content')
<div class="login-page">
    <div class="container">
        <div class="row justify-content-center align-items-center min-vh-100">
            <div class="col-lg-5 col-md-7">
                <!-- Login Card -->
                <div class="login-card">
                    <!-- Header -->
                    <div class="text-center mb-4">
                        <div class="login-icon mb-3">
                            <i class="bi bi-box-seam-fill"></i>
                        </div>
                        <h2 class="login-title">Welcome Back</h2>
                        <p class="login-subtitle">Sign in to continue to ProductHub</p>
                    </div>

                    <!-- Login Form -->
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email -->
                        <div class="form-group mb-3">
                            <label for="email" class="form-label">
                                <i class="bi bi-envelope-fill"></i> Email Address
                            </label>
                            <input id="email"
                                   type="email"
                                   class="form-control @error('email') is-invalid @enderror"
                                   name="email"
                                   value="{{ old('email') }}"
                                   required
                                   autocomplete="email"
                                   autofocus
                                   placeholder="Enter your email">
                            @error('email')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-3">
                            <label for="password" class="form-label">
                                <i class="bi bi-lock-fill"></i> Password
                            </label>
                            <input id="password"
                                   type="password"
                                   class="form-control @error('password') is-invalid @enderror"
                                   name="password"
                                   required
                                   autocomplete="current-password"
                                   placeholder="Enter your password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Remember Me & Forgot Password -->
                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input"
                                       type="checkbox"
                                       name="remember"
                                       id="remember"
                                       {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label" for="remember">
                                    Remember me
                                </label>
                            </div>

                            @if (Route::has('password.request'))
                                <a class="forgot-link" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            @endif
                        </div>

                        <!-- Google reCAPTCHA v2 -->
                        <div class="mb-4">
                            <div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.site_key') }}"></div>
                            @error('g-recaptcha-response')
                                <div class="text-danger mt-2">
                                    <i class="bi bi-exclamation-circle"></i> {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-primary w-100 mb-4">
                            <i class="bi bi-box-arrow-in-right"></i> Sign In
                        </button>

                        <!-- Register Link -->
                        @if (Route::has('register'))
                            <div class="text-center">
                                <span class="text-muted">Don't have an account?</span>
                                <a href="{{ route('register') }}" class="register-link">
                                    Create Account
                                </a>
                            </div>
                        @endif
                    </form>
                </div>

                <!-- Features -->
                <div class="features-grid mt-4">
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Secure Login</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-lightning-charge-fill"></i>
                        <span>Fast Access</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-globe"></i>
                        <span>24/7 Available</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Background Elements -->
    <div class="bg-shapes">
        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
    </div>
</div>

@push('scripts')
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
@endpush

@push('styles')
<style>
    :root {
        --primary: #6366f1;
        --primary-dark: #4f46e5;
        --secondary: #8b5cf6;
        --success: #10b981;
        --danger: #ef4444;
        --dark: #1e293b;
        --light: #f8fafc;
        --border: #e2e8f0;
    }

    .login-page {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        min-height: 100vh;
        position: relative;
        overflow: hidden;
    }

    /* Background Shapes */
    .bg-shapes {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        z-index: 0;
    }

    .shape {
        position: absolute;
        border-radius: 50%;
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        animation: float 20s infinite ease-in-out;
    }

    .shape-1 {
        width: 400px;
        height: 400px;
        top: -200px;
        right: -100px;
        animation-delay: 0s;
    }

    .shape-2 {
        width: 300px;
        height: 300px;
        bottom: -150px;
        left: -100px;
        animation-delay: 5s;
    }

    .shape-3 {
        width: 200px;
        height: 200px;
        top: 40%;
        right: 10%;
        animation-delay: 10s;
    }

    .shape-4 {
        width: 150px;
        height: 150px;
        bottom: 30%;
        left: 15%;
        animation-delay: 15s;
    }

    @keyframes float {
        0%, 100% {
            transform: translate(0, 0) rotate(0deg);
        }
        25% {
            transform: translate(30px, -30px) rotate(90deg);
        }
        50% {
            transform: translate(-20px, 20px) rotate(180deg);
        }
        75% {
            transform: translate(20px, 30px) rotate(270deg);
        }
    }

    /* Login Card */
    .login-card {
        background: white;
        border-radius: 24px;
        padding: 3rem;
        box-shadow: 0 20px 60px rgba(0, 0, 0, 0.2);
        position: relative;
        z-index: 1;
        backdrop-filter: blur(10px);
    }

    /* Login Icon */
    .login-icon {
        width: 80px;
        height: 80px;
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border-radius: 20px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 2.5rem;
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
    }

    /* Login Title */
    .login-title {
        font-weight: 800;
        font-size: 2rem;
        color: var(--dark);
        margin-bottom: 0.5rem;
    }

    .login-subtitle {
        color: #64748b;
        font-size: 1rem;
        margin-bottom: 0;
    }

    /* Form Styles */
    .form-label {
        font-weight: 600;
        color: var(--dark);
        margin-bottom: 0.5rem;
        font-size: 0.9rem;
    }

    .form-label i {
        color: var(--primary);
    }

    .form-control {
        padding: 0.875rem 1rem;
        border: 2px solid var(--border);
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background-color: #f8fafc;
    }

    .form-control:focus {
        border-color: var(--primary);
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
        background-color: white;
    }

    .form-control.is-invalid {
        border-color: var(--danger);
    }

    .form-control.is-invalid:focus {
        box-shadow: 0 0 0 4px rgba(239, 68, 68, 0.1);
    }

    .invalid-feedback {
        font-size: 0.875rem;
        font-weight: 500;
        margin-top: 0.5rem;
    }

    /* Checkbox */
    .form-check-input {
        width: 1.25rem;
        height: 1.25rem;
        border: 2px solid var(--border);
        border-radius: 6px;
        cursor: pointer;
    }

    .form-check-input:checked {
        background-color: var(--primary);
        border-color: var(--primary);
    }

    .form-check-input:focus {
        box-shadow: 0 0 0 4px rgba(99, 102, 241, 0.1);
    }

    .form-check-label {
        font-size: 0.9rem;
        color: #64748b;
        font-weight: 500;
        cursor: pointer;
        margin-left: 0.5rem;
    }

    /* Links */
    .forgot-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 600;
        font-size: 0.9rem;
        transition: all 0.3s ease;
    }

    .forgot-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    .register-link {
        color: var(--primary);
        text-decoration: none;
        font-weight: 700;
        margin-left: 0.5rem;
        transition: all 0.3s ease;
    }

    .register-link:hover {
        color: var(--primary-dark);
        text-decoration: underline;
    }

    /* Button */
    .btn-primary {
        background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
        border: none;
        padding: 1rem;
        font-weight: 700;
        font-size: 1.05rem;
        border-radius: 12px;
        transition: all 0.3s ease;
        box-shadow: 0 4px 12px rgba(99, 102, 241, 0.3);
    }

    .btn-primary:hover {
        transform: translateY(-2px);
        box-shadow: 0 8px 20px rgba(99, 102, 241, 0.4);
    }

    .btn-primary:active {
        transform: translateY(0);
    }

    .btn-primary i {
        font-size: 1.2rem;
    }

    /* Features Grid */
    .features-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 1rem;
        position: relative;
        z-index: 1;
    }

    .feature-item {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(10px);
        padding: 1rem;
        border-radius: 12px;
        text-align: center;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
        transition: all 0.3s ease;
    }

    .feature-item:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.15);
    }

    .feature-item i {
        font-size: 1.5rem;
        color: var(--primary);
        display: block;
        margin-bottom: 0.5rem;
    }

    .feature-item span {
        font-size: 0.85rem;
        font-weight: 600;
        color: var(--dark);
    }

    /* reCAPTCHA Styling */
    .g-recaptcha {
        transform: scale(0.95);
        transform-origin: 0 0;
        border-radius: 12px;
        overflow: hidden;
    }

    /* Responsive */
    @media (max-width: 768px) {
        .login-card {
            padding: 2rem;
        }

        .login-icon {
            width: 60px;
            height: 60px;
            font-size: 2rem;
        }

        .login-title {
            font-size: 1.5rem;
        }

        .features-grid {
            grid-template-columns: 1fr;
        }

        .g-recaptcha {
            transform: scale(0.85);
        }
    }

    /* Additional spacing */
    .form-group {
        margin-bottom: 1.5rem;
    }
</style>
@endpush
@endsection
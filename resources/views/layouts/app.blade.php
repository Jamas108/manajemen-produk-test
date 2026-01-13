<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Manajemen Produk') }} - Product Management</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Plus+Jakarta+Sans:400,500,600,700,800" rel="stylesheet">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <!-- Global Styles - DENGAN NONCE -->
    <style nonce="{{ $cspNonce ?? '' }}">
        :root {
            --primary: #6366f1;
            --primary-dark: #4f46e5;
            --primary-light: #818cf8;
            --secondary: #8b5cf6;
            --success: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #1e293b;
            --light: #f8fafc;
            --border: #e2e8f0;
        }

        * {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }

        body {
            background-color: var(--light);
            color: var(--dark);
        }

        /* Navbar Styles */
        .navbar {
            background: white !important;
            border-bottom: 1px solid var(--border);
            padding: 1rem 0;
        }

        .navbar-brand {
            font-weight: 800;
            font-size: 1.5rem;
            color: var(--primary) !important;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .navbar-brand i {
            font-size: 1.8rem;
        }

        .nav-link {
            font-weight: 600;
            color: #64748b !important;
            transition: all 0.3s ease;
            padding: 0.5rem 1rem !important;
            border-radius: 8px;
            margin: 0 0.25rem;
        }

        .nav-link:hover {
            color: var(--primary) !important;
            background-color: #f1f5f9;
        }

        .nav-link.active {
            color: var(--primary) !important;
            background-color: #eef2ff;
        }

        .nav-link i {
            font-size: 1.1rem;
        }

        /* Dropdown Styles */
        .dropdown-menu {
            border: 1px solid var(--border);
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            border-radius: 12px;
            padding: 0.5rem;
            margin-top: 0.5rem;
        }

        .dropdown-item {
            border-radius: 8px;
            padding: 0.75rem 1rem;
            transition: all 0.2s ease;
            font-weight: 500;
            color: #475569;
        }

        .dropdown-item:hover {
            background-color: #f1f5f9;
            color: var(--primary);
            transform: translateX(4px);
        }

        .dropdown-item i {
            width: 20px;
            text-align: center;
        }

        .dropdown-divider {
            margin: 0.5rem 0;
            border-color: var(--border);
        }

        /* Badge Styles */
        .badge {
            font-weight: 700;
            padding: 0.5rem 1rem;
            border-radius: 100px;
            font-size: 0.75rem;
            letter-spacing: 0.5px;
            text-transform: uppercase;
        }

        .badge.bg-danger {
            background: linear-gradient(135deg, #ef4444 0%, #dc2626 100%) !important;
        }

        .badge.bg-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%) !important;
        }

        /* Button Styles */
        .btn {
            font-weight: 600;
            padding: 0.625rem 1.5rem;
            border-radius: 10px;
            transition: all 0.3s ease;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
            color: white;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(99, 102, 241, 0.3);
        }

        .btn-success {
            background-color: var(--success);
        }

        .btn-danger {
            background-color: var(--danger);
        }

        /* Card Styles */
        .card {
            border: 1px solid var(--border);
            border-radius: 16px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
        }

        .card:hover {
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.08);
        }

        /* Alert Styles */
        .alert {
            border: none;
            border-radius: 12px;
            padding: 1rem 1.5rem;
        }

        /* Main Content */
        main {
            min-height: calc(100vh - 80px);
        }

        /* Logout Button */
        .logout-btn {
            background: none;
            border: none;
            cursor: pointer;
            text-align: left;
            width: 100%;
            padding: 0.75rem 1rem;
            border-radius: 8px;
            transition: all 0.2s ease;
            color: #475569;
            font-size: 1rem;
            font-weight: 500;
            display: flex;
            align-items: center;
        }

        .logout-btn:hover {
            background-color: #fee2e2;
            color: var(--danger);
            transform: translateX(4px);
        }

        .logout-btn i {
            width: 20px;
            text-align: center;
        }

        /* Navbar Toggle */
        .navbar-toggler {
            border: none;
            padding: 0.5rem;
        }

        .navbar-toggler:focus {
            box-shadow: none;
        }
    </style>

    <!-- Styles Stack -->
    @stack('styles')
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light sticky-top">
            <div class="container">
                <!-- Brand with Icon -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="bi bi-box-seam-fill"></i>
                    <span>Manajemen Produk</span>
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        @auth
                            @if(Auth::user()->role === 'admin')
                                <!-- Admin Navigation -->
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}"
                                       href="{{ route('admin.dashboard') }}">
                                        <i class="bi bi-speedometer2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}"
                                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-tags-fill"></i> Categories
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.categories.index') }}">
                                                <i class="bi bi-list-ul"></i> All Categories
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.categories.create') }}">
                                                <i class="bi bi-plus-circle-fill"></i> Add Category
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle {{ request()->routeIs('admin.products.*') ? 'active' : '' }}"
                                       href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <i class="bi bi-box-seam-fill"></i> Products
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.products.index') }}">
                                                <i class="bi bi-grid-fill"></i> All Products
                                            </a>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('admin.products.create') }}">
                                                <i class="bi bi-plus-circle-fill"></i> Add Product
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                            @elseif(Auth::user()->role === 'user')
                                <!-- User Navigation -->
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('user.dashboard') ? 'active' : '' }}"
                                       href="{{ route('user.dashboard') }}">
                                        <i class="bi bi-speedometer2"></i> Dashboard
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->routeIs('user.products.*') ? 'active' : '' }}"
                                       href="{{ route('user.products.index') }}">
                                        <i class="bi bi-box-seam-fill"></i> Products
                                    </a>
                                </li>
                            @endif
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto align-items-center">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">
                                        <i class="bi bi-box-arrow-in-right"></i> Login
                                    </a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="btn btn-primary ms-2" href="{{ route('register') }}">
                                        <i class="bi bi-person-plus-fill"></i> Register
                                    </a>
                                </li>
                            @endif
                        @else
                            <!-- Role Badge -->
                            <li class="nav-item me-2">
                                @if(Auth::user()->role === 'admin')
                                    <span class="badge bg-danger">
                                        <i class="bi bi-shield-fill-check"></i> Admin
                                    </span>
                                @else
                                    <span class="badge bg-primary">
                                        <i class="bi bi-person-fill"></i> User
                                    </span>
                                @endif
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    @if(Auth::user()->role === 'admin')
                                        <a class="dropdown-item" href="{{ route('admin.dashboard') }}">
                                            <i class="bi bi-speedometer2"></i> Dashboard
                                        </a>
                                    @else
                                        <a class="dropdown-item" href="{{ route('user.dashboard') }}">
                                            <i class="bi bi-speedometer2"></i> Dashboard
                                        </a>
                                    @endif

                                    <hr class="dropdown-divider">

                                    <form action="{{ route('logout') }}" method="POST" class="m-0">
                                        @csrf
                                        <button type="submit" class="logout-btn">
                                            <i class="bi bi-box-arrow-right"></i> {{ __('Logout') }}
                                        </button>
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    @stack('scripts')
</body>
</html>
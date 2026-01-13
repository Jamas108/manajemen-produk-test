@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Welcome Header -->
    <div class="row mb-4">
        <div class="col-12">
            <div class="welcome-banner">
                <div class="card border-0 shadow-sm overflow-hidden position-relative">
                    <div class="card-body p-5">
                        <div class="row align-items-center">
                            <div class="col-lg-8">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="avatar-circle bg-primary text-white me-3">
                                        {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
                                    </div>
                                    <div>
                                        <h2 class="mb-1 fw-bold">Welcome back, {{ Auth::user()->name }}! 👋</h2>
                                        <p class="mb-0 text-muted">Here's what's happening with your products today</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 text-lg-end">
                                <span class="badge bg-primary-gradient fs-6 px-4 py-2">
                                    <i class="bi bi-person-circle me-2"></i> User Account
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="banner-decoration"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Statistics Cards -->
    <div class="row g-4 mb-4">
        <!-- Total Products -->
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon bg-primary-light">
                            <i class="bi bi-box-seam text-primary"></i>
                        </div>
                        <span class="badge bg-success-light text-success">
                            <i class="bi bi-arrow-up"></i> Active
                        </span>
                    </div>
                    <h3 class="fw-bold mb-1">{{ App\Models\Product::count() }}</h3>
                    <p class="text-muted mb-0 small">Total Products</p>
                </div>
            </div>
        </div>

        <!-- Categories -->
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon bg-success-light">
                            <i class="bi bi-tags text-success"></i>
                        </div>
                        <span class="badge bg-primary-light text-primary">
                            <i class="bi bi-grid"></i> All
                        </span>
                    </div>
                    <h3 class="fw-bold mb-1">{{ App\Models\Category::count() }}</h3>
                    <p class="text-muted mb-0 small">Categories</p>
                </div>
            </div>
        </div>

        <!-- Total Stock -->
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon bg-warning-light">
                            <i class="bi bi-layers text-warning"></i>
                        </div>
                        <span class="badge bg-warning-light text-warning">
                            <i class="bi bi-database"></i> Stock
                        </span>
                    </div>
                    <h3 class="fw-bold mb-1">{{ App\Models\Product::sum('stock') }}</h3>
                    <p class="text-muted mb-0 small">Total Stock Items</p>
                </div>
            </div>
        </div>

        <!-- Products Value -->
        <div class="col-md-6 col-lg-3">
            <div class="card stat-card border-0 shadow-sm h-100">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div class="stat-icon bg-info-light">
                            <i class="bi bi-currency-dollar text-info"></i>
                        </div>
                        <span class="badge bg-info-light text-info">
                            <i class="bi bi-graph-up"></i> Value
                        </span>
                    </div>
                    <h3 class="fw-bold mb-1">Rp {{ number_format(App\Models\Product::sum('price'), 0, ',', '.') }}</h3>
                    <p class="text-muted mb-0 small">Total Products Value</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions & Recent Products -->
    <div class="row g-4">
        <!-- Quick Actions -->
        <div class="col-lg-5">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-4 pb-3">
                    <h5 class="mb-0 fw-bold">
                        <i class="bi bi-lightning-charge-fill text-warning me-2"></i> Quick Actions
                    </h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-3">
                        <a href="{{ route('user.products.index') }}" class="action-card">
                            <div class="d-flex align-items-center">
                                <div class="action-icon bg-primary-light">
                                    <i class="bi bi-box-seam text-primary"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">View All Products</h6>
                                    <p class="text-muted small mb-0">Browse and manage your product catalog</p>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </div>
                        </a>

                        <a href="{{ route('user.categories.index') }}" class="action-card">
                            <div class="d-flex align-items-center">
                                <div class="action-icon bg-success-light">
                                    <i class="bi bi-tags text-success"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Browse Categories</h6>
                                    <p class="text-muted small mb-0">Explore product categories</p>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </div>
                        </a>

                        <a href="{{ route('user.products.index') }}" class="action-card">
                            <div class="d-flex align-items-center">
                                <div class="action-icon bg-info-light">
                                    <i class="bi bi-search text-info"></i>
                                </div>
                                <div class="flex-grow-1 ms-3">
                                    <h6 class="mb-1">Search Products</h6>
                                    <p class="text-muted small mb-0">Find products quickly</p>
                                </div>
                                <i class="bi bi-chevron-right text-muted"></i>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activity -->
        <div class="col-lg-7">
            <div class="card border-0 shadow-sm h-100">
                <div class="card-header bg-white border-0 pt-4 pb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 class="mb-0 fw-bold">
                            <i class="bi bi-clock-history text-primary me-2"></i> Recent Products
                        </h5>
                        <a href="{{ route('user.products.index') }}" class="btn btn-sm btn-outline-primary">
                            View All <i class="bi bi-arrow-right ms-1"></i>
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $recentProducts = App\Models\Product::with('category')->latest()->take(5)->get();
                    @endphp

                    @if($recentProducts->count() > 0)
                        <div class="list-group list-group-flush">
                            @foreach($recentProducts as $product)
                                <div class="list-group-item border-0 px-0 py-3">
                                    <div class="d-flex align-items-center">
                                        <div class="product-icon bg-light rounded">
                                            <i class="bi bi-box text-muted"></i>
                                        </div>
                                        <div class="flex-grow-1 ms-3">
                                            <h6 class="mb-1">{{ $product->name }}</h6>
                                            <div class="d-flex align-items-center">
                                                <span class="badge bg-light text-dark me-2">
                                                    {{ $product->category->name ?? 'No Category' }}
                                                </span>
                                                <small class="text-muted">Stock: {{ $product->stock }}</small>
                                            </div>
                                        </div>
                                        <div class="text-end">
                                            <p class="mb-0 fw-bold text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</p>
                                            <small class="text-muted">{{ $product->sku }}</small>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="bi bi-inbox display-1 text-muted mb-3"></i>
                            <h6 class="text-muted">No products yet</h6>
                            <p class="text-muted small">Start by adding your first product</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@push('styles')
<style>
    .welcome-banner .card {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        color: white;
    }

    .welcome-banner .text-muted {
        color: rgba(255, 255, 255, 0.8) !important;
    }

    .banner-decoration {
        position: absolute;
        top: 0;
        right: 0;
        width: 300px;
        height: 100%;
        background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="40" fill="rgba(255,255,255,0.1)"/></svg>');
        opacity: 0.3;
    }

    .avatar-circle {
        width: 60px;
        height: 60px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
        font-weight: bold;
    }

    .bg-primary-gradient {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
    }

    .stat-card {
        transition: all 0.3s ease;
    }

    .stat-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1) !important;
    }

    .stat-icon {
        width: 48px;
        height: 48px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .bg-primary-light {
        background-color: rgba(102, 126, 234, 0.1);
    }

    .bg-success-light {
        background-color: rgba(16, 185, 129, 0.1);
    }

    .bg-warning-light {
        background-color: rgba(245, 158, 11, 0.1);
    }

    .bg-info-light {
        background-color: rgba(59, 130, 246, 0.1);
    }

    .text-success {
        color: #10b981 !important;
    }

    .text-warning {
        color: #f59e0b !important;
    }

    .text-info {
        color: #3b82f6 !important;
    }

    .action-card {
        display: block;
        padding: 1rem;
        border-radius: 12px;
        background-color: #f8fafc;
        text-decoration: none;
        color: inherit;
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .action-card:hover {
        background-color: white;
        border-color: #e2e8f0;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
    }

    .action-icon {
        width: 40px;
        height: 40px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.2rem;
    }

    .product-icon {
        width: 48px;
        height: 48px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.5rem;
    }

    .list-group-item {
        transition: all 0.2s ease;
    }

    .list-group-item:hover {
        background-color: #f8fafc;
    }
</style>
@endpush
@endsection
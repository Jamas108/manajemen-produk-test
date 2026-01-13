@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div>
                        <a href="{{ route('user.categories.index') }}" class="btn btn-sm btn-secondary">&larr; Back to Categories</a>
                    </div>
                    <h5 class="mb-0">{{ $category->name }}</h5>
                </div>
                <div class="card-body">
                    @if($category->description)
                    <div class="alert alert-info">
                        <strong>Description:</strong> {{ $category->description }}
                    </div>
                    @endif

                    <h6 class="mb-3">Products in this category ({{ $products->total() }})</h6>

                    <div class="row">
                        @forelse($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ Str::limit($product->description, 100) }}</p>
                                    <p class="text-muted">SKU: {{ $product->sku }}</p>
                                    <h6 class="text-primary">Rp {{ number_format($product->price, 0, ',', '.') }}</h6>
                                    <p class="text-muted">Stock: {{ $product->stock }}</p>
                                    <a href="{{ route('user.products.show', $product) }}" class="btn btn-sm btn-primary">View Details</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-center">No products in this category</p>
                        </div>
                        @endforelse
                    </div>

                    @if($products->hasPages())
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
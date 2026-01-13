@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Products Catalog</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                <div class="card-body">
                                    <span class="badge bg-secondary mb-2">{{ $product->category->name }}</span>
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
                            <p class="text-center">No products available</p>
                        </div>
                        @endforelse
                    </div>

                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

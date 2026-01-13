@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('user.products.index') }}" class="btn btn-sm btn-secondary">&larr; Back</a>
                </div>
                <div class="card-body">
                    <span class="badge bg-secondary mb-3">{{ $product->category->name }}</span>
                    <h2>{{ $product->name }}</h2>
                    <p class="text-muted">SKU: {{ $product->sku }}</p>

                    <hr>

                    <h4 class="text-primary mb-3">Rp {{ number_format($product->price, 0, ',', '.') }}</h4>

                    <div class="mb-3">
                        <strong>Stock:</strong>
                        <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                            {{ $product->stock > 0 ? $product->stock . ' items available' : 'Out of stock' }}
                        </span>
                    </div>

                    <div class="mb-3">
                        <h5>Description</h5>
                        <p>{{ $product->description ?? 'No description available' }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

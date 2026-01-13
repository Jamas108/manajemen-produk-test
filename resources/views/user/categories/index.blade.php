@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="mb-0">Product Categories</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        @forelse($categories as $category)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100 border-primary">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $category->name }}</h5>
                                    <p class="card-text">{{ Str::limit($category->description, 80) }}</p>
                                    <p class="text-muted">
                                        <i class="bi bi-box"></i> {{ $category->products_count }} Products
                                    </p>
                                    <a href="{{ route('user.categories.show', $category) }}" class="btn btn-sm btn-primary">View Products</a>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12">
                            <p class="text-center">No categories available</p>
                        </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
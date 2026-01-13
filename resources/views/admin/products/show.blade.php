@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Product Details</h5>
                    <div>
                        <a href="{{ route('admin.products.edit', $product) }}" class="btn btn-warning btn-sm">Edit</a>
                        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary btn-sm">Back</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <th width="150">SKU:</th>
                                        <td>{{ $product->sku }}</td>
                                    </tr>
                                    <tr>
                                        <th>Name:</th>
                                        <td>{{ $product->name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Slug:</th>
                                        <td>{{ $product->slug }}</td>
                                    </tr>
                                    <tr>
                                        <th>Category:</th>
                                        <td>
                                            <a href="{{ route('admin.categories.show', $product->category) }}">
                                                {{ $product->category->name }}
                                            </a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Price:</th>
                                        <td class="text-success fw-bold">Rp {{ number_format($product->price, 0, ',', '.') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Stock:</th>
                                        <td>
                                            <span class="badge {{ $product->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                                                {{ $product->stock }} units
                                            </span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created:</th>
                                        <td>{{ $product->created_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                    <tr>
                                        <th>Updated:</th>
                                        <td>{{ $product->updated_at->format('d M Y, H:i') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6">
                            <h6 class="fw-bold mb-3">Description</h6>
                            <div class="border rounded p-3 bg-light">
                                {{ $product->description ?? 'No description available.' }}
                            </div>
                        </div>
                    </div>

                    <hr class="my-4">

                    <div class="d-flex gap-2">
                        <form action="{{ route('admin.products.destroy', $product) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this product?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
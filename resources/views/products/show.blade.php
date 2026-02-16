@extends('layouts.app')

@section('title', 'Product Details')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Product: {{ $product->name }}</h2>
    <div>
      <a href="{{ route('products.edit', $product) }}" class="btn btn-primary btn-sm">Edit</a>
      <a href="{{ route('products.index') }}" class="btn btn-secondary btn-sm">Back</a>
    </div>
  </div>

  <div class="card">
    <div class="card-body">
      <p><strong>Price:</strong> {{ number_format($product->price, 2) }}</p>
      <p><strong>Stock:</strong> {{ $product->stock }}</p>
      <p><strong>Description:</strong></p>
      <div>{{ $product->description ?? '-' }}</div>
    </div>
  </div>

@endsection

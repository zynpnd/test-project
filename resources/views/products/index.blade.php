@extends('layouts.app')

@section('title', 'Products')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <table class="table mb-0">
        <thead class="table-light">
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @forelse($products as $product)
            <tr>
              <td>{{ $product->id }}</td>
              <td>{{ $product->name }}</td>
              <td>{{ number_format($product->price, 2) }}</td>
              <td>{{ $product->stock }}</td>
              <td>
                <a href="{{ route('products.show', $product) }}" class="btn btn-sm btn-outline-secondary">View</a>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this product?')">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-sm btn-outline-danger">Delete</button>
                </form>
              </td>
            </tr>
          @empty
            <tr>
              <td colspan="5" class="text-center">No products found.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </div>
  </div>

  <div class="mt-3">{{ $products->links() }}</div>

@endsection

@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
  <h2>Edit Product</h2>

  <form action="{{ route('products.update', $product) }}" method="POST">
    @csrf
    @method('PUT')
    @include('products._form')
    <button class="btn btn-primary">Update</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection

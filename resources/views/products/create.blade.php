@extends('layouts.app')

@section('title', 'Create Product')

@section('content')
  <h2>Create Product</h2>

  <form action="{{ route('products.store') }}" method="POST">
    @csrf
    @include('products._form')
    <button class="btn btn-primary">Save</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
  </form>
@endsection

@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>{{ $product->description }}</p>
    <p>Amount: {{ $product->amount }}</p>
    <a href="{{ route('products.edit', $product->id) }}">Edit</a>
    <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <a href="{{ route('products.index') }}">Back to List</a>
@endsection

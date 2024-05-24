<x-layout title="dashboard">
<x-navbar></x-navbar>
    <h1>Edit Product</h1>
    <form action="{{ route('products.update', $product->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $product->name }}" required>
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" value="{{ $product->description }}" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" value="{{ $product->amount }}" required>
        </div>
        <button type="submit">Update</button>
    </form>
</x-layout>
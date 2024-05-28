<x-layout title="dashboard">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-yellow-900 text-3xl font-bold text-center mb-8">Edit a Product</h1>
        <div class="bg-yellow-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('products.update') }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="name" class="block text-yellow-900 text-sm font-bold mb-2">Name</label>
                    <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}" required>
                    <input type="text" name="name" id="name" value="{{ $product->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-yellow-900 text-sm font-bold mb-2">Description</label>
                    <input type="text" name="description" id="description" value="{{ $product->description }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="amount" class="block text-yellow-900 text-sm font-bold mb-2">Amount</label>
                    <input type="number" name="amount" id="amount" value="{{ $product->amount }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-900">Update</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>

<x-layout title="dashboard">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Create Shelf Storage</h1>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="/shelf_storage/new" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="shelf_id" class="block text-gray-700 text-sm font-bold mb-2">Select Shelf</label>
                    <select name="shelf_id" id="shelf_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" disabled selected>Select a shelf</option>
                        @foreach($shelves as $shelf)
                            <option value="{{ $shelf->id }}">{{ $shelf->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="product_id" class="block text-gray-700 text-sm font-bold mb-2">Select Product</label>
                    <select name="product_id" id="product_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        <option value="" disabled selected>Select a product</option>
                        @foreach($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600 focus:outline-none focus:shadow-outline">Create</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>






<x-layout title="Edit Shelf Storage">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-yellow-900 text-4xl font-bold text-center mb-8">Edit Shelf Storage</h1>
        <div class="bg-yellow-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="{{ route('shelf_storage.update', $shelfStorage->id) }}" method="POST">
                @csrf
                @method('PUT')
                
                <div class="mb-4">
                    <label for="shelf_id" class="block text-yellow-900 text-sm font-bold mb-2">Select Shelf</label>
                    <select name="shelf_id" id="shelf_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($shelves as $shelf)
                            <option value="{{ $shelf->id }}" {{ $shelfStorage->shelf_id == $shelf->id ? 'selected' : '' }}>
                                {{ $shelf->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-4">
                    <label for="product_id" class="block text-yellow-900 text-sm font-bold mb-2">Select Product</label>
                    <select name="product_id" id="product_id" required class="block appearance-none w-full bg-white border border-gray-400 hover:border-gray-500 px-4 py-2 pr-8 rounded shadow leading-tight focus:outline-none focus:shadow-outline">
                        @foreach($products as $product)
                            <option value="{{ $product->id }}" {{ $shelfStorage->product_id == $product->id ? 'selected' : '' }}>
                                {{ $product->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-900 focus:outline-none focus:shadow-outline">Update Storage</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>

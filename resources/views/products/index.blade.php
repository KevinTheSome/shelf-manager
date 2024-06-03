<x-layout title="dashboard">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-4xl font-bold text-center mb-8 text-yellow-900">Products List</h1>
        <div class="text-center mb-4">
        <a href="/products/create" class="inline-block bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-900">Create a New Product</a>
        </div>
        @if (session('success'))
            <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">ID</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Name</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Description</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Amount</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $product->id }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $product->name }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $product->description }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $product->amount }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">
                            <a href="{{ url('products/' . $product->id . '/edit') }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-900">Edit</a>
                            <form action="{{ url('products/' . $product->id) }}" method="POST" class="inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section>
</x-layout>

<x-layout title="dashboard">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Products List</h1>
        <div class="text-center mb-4">
        <a href="/products/create" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create New Product</a>
        </div>
        @if (session('success'))
            <div class="bg-green-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Description</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Amount</th>
                        <th class="px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                        <tr>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->id }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->name }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->description }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">{{ $product->amount }}</td>
                            <td class="px-5 py-5 border-b border-gray-200 bg-white text-sm">
                                <a href="products/edit, $product->id)" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                <form action="products.destroy, $product->id)" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900 ml-2">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layout>

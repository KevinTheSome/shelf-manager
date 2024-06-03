<x-layout title="dashboard">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-yellow-900 text-4xl font-bold text-center mb-8">Shelf Storage List</h1>
        <div class="mb-4 text-right">
            <a href="/shelf_storage/create" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-900">Add New Storage</a>
        </div>
        <div class="bg-yellow-100 shadow-md rounded overflow-hidden">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">ID</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Product</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Shelf</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shelfStorages as $storage)
                        <tr>
                            <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $storage->id }}</td>
                            <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $storage->product->name }}</td>
                            <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $storage->shelf->name }}</td>
                            <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">
                                <a href="{{ route('shelf_storage.edit', $storage->id) }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-900">Edit</a>
                                <form action="{{ route('shelf_storage.delete', $storage->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="bg-red-500 text-white py-1 px-3 rounded hover:bg-red-600" onclick="return confirm('Are you sure you want to delete this storage?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layout>

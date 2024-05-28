<x-layout title="dashboard">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Shelf Storage List</h1>
        <div class="mb-4 text-right">
            <a href="/shelf_storage/create" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Add New Storage</a>
        </div>
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">ID</th>
                        <th class="py-2 px-4 border-b">Product ID</th>
                        <th class="py-2 px-4 border-b">Shelf ID</th>
                        <th class="py-2 px-4 border-b">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($shelfStorages as $storage)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $storage->id }}</td>
                            <td class="py-2 px-4 border-b">{{ $storage->product_id }}</td>
                            <td class="py-2 px-4 border-b">{{ $storage->shelf_id }}</td>
                            <td class="py-2 px-4 border-b">
                                <a href="{{ route('shelf_storage.edit', $storage->id) }}" class="bg-blue-500 text-white py-1 px-3 rounded hover:bg-blue-600">Edit</a>
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

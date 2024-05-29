<x-layout title="dashboard">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-yellow-900 text-3xl font-bold text-center mb-8">Shelves List</h1>
        <div class="text-center mb-4">
            <a href="/shelf/create" class="inline-block bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-900">Create a New Shelf</a>
        </div>
        @if (session('success'))
            <div class="bg-yellow-500 text-white p-4 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        <div class="bg-yellow-100 shadow-md rounded overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="px-5 py-3 border-b-2 border-yellow-900 bg-yellow-600 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 border-b-2 border-yellow-900 bg-yellow-600 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 border-b-2 border-yellow-900 bg-yellow-600 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($shelves as $shelf)
                        <tr>
                            <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $shelf->id }}</td>
                            <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $shelf->name }}</td>
                            <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">
                                <a href="{{ url('shelf/' . $shelf->id . '/edit') }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-900">Edit</a>
                                <form action="{{ url('shelf/' . $shelf->id . '/delete') }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:text-red-900 text-white- py-1 px-3 rounded">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </section>
</x-layout>

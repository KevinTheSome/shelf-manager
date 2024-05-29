<x-layout title="Admin">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
        <div class=" rounded overflow-hidden">
            <h1 class="text-yellow-900 text-4xl font-bold text-center mt-8 mb-8">Users management</h1>
            <table class="bg-white shadow-md rounded overflow-hidden">
                <thead>
                    <tr>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">ID</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Name</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Role</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Email</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Created at</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-yellow-900 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $user->id }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $user->name }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $user->roles }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $user->email }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">{{ $user->created_at }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 text-sm">
                        <a href="{{ url('products/' . $user->id . '/edit') }}" class="bg-yellow-100 text-indigo-600 hover:text-indigo-900">Edit</a>
                            <form action="{{ url('products/' . $user->id) }}" method="POST" class="inline-block">
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
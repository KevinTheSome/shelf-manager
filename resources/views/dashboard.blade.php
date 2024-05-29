<x-layout title="dashboard">
<a href="/logout" class="items-right flex flex-col text-right p-4 text-yellow-900 hover:text-yellow-400 transition">Log Out</a>

<section>
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow border bg-yellow-600 border-gray-700 mt-6">
                <div class="p-6">
                    <h1 class="text-center text-4xl font-bold leading-tight tracking-tight text-yellow-900 text-white mb-6">
                        Welcome to your Dashboard!
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">

                        @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Accountant')
                            <div class="bg-yellow-100 p-5 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-3">
                                <a href="/products/index" class=" p-4 text-yellow-900 hover:text-yellow-400 transition">Products</a>
                                </h3>
                                <a href='products/create' class="text-yellow-700 text-yellow-400">Create a Product</a>
                            </div>
                        @endif

                        @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Accountant')
                            <div class="bg-yellow-100 p-5 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-3">
                                <a href="/orders" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Orders</a>
                                </h3>
                                <a href='/orders/create' class="text-yellow-700 text-yellow-400">Create an Order</a>
                            </div>
                        @endif

                        @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Accountant')
                            <div class="bg-yellow-100 p-5 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-3">
                                <a href="/report" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Reports</a>
                                </h3>
                                
                            </div>
                        @endif

                        @if (auth()->user()->roles == 'Admin')
                            <div class="bg-yellow-100 p-5 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-3">
                                <a href="/admin" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Admin</a>
                                </h3>
                                <a href='/admin/users' class="text-yellow-700 text-yellow-400">Manage Users</a>
                            </div>
                        @endif

                        @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Stocker')
                            <div class="bg-yellow-100 p-5 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-3">
                                <a href="/shelf/index" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Shelves</a>
                                </h3>
                                <a href='/shelf/create' class="text-yellow-700 text-yellow-400">Add a Shelves</a>
                            </div>
                        @endif

                        @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Stocker')
                            <div class="bg-yellow-100 p-5 rounded-lg shadow">
                                <h3 class="text-lg font-semibold mb-3">
                                <a href="/shelf_storage/index" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Shelves Storage</a>
                                </h3>
                                <a href='/shelf_storage/create' class="text-yellow-700 text-yellow-400">Add product to Shelves</a>
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </section>

    
</x-layout>
<x-layout title="dashboard">
<a href="/logout" class="items-right flex flex-col text-right p-4 text-gray-500 hover:text-blue-500 transition">Log Out</a>
<section>
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow border bg-yellow-600 border-gray-700 mt-6">
                <div class="p-6">
                    <h1 class="text-center text-4xl font-bold leading-tight tracking-tight text-yellow-900 text-white mb-6">
                        Welcome to your Dashboard!
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        
                        <div class="bg-yellow-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">
                            <a href="/products/index" class=" p-4 text-yellow-900 hover:text-blue-500 transition">Products</a>
                            </h3>
                            <a href='products/create' class="text-yellow-700 text-yellow-400">Create a Product</a>
                        </div>
                        
                        <div class="bg-yellow-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">
                            <a href="/orders" class="p-4 text-yellow-900 hover:text-blue-500 transition">Orders</a>
                            </h3>
                            <a href='/orders/create' class="text-yellow-700 text-yellow-400">Create an Order</a>
                        </div>
                        
                        <div class="bg-yellow-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">
                            <a href="/report" class="p-4 text-yellow-900 hover:text-blue-500 transition">Reports</a>
                            </h3>
                            
                        </div>

                        <div class="bg-yellow-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">
                            <a href="/admin" class="p-4 text-yellow-900 hover:text-blue-500 transition">Admin</a>
                            </h3>
                            <a href='/admin/users' class="text-yellow-700 text-yellow-400">Manage Users</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>

    
</x-layout>
<x-layout title="dashboard">
<a href="/logout" class="items-right flex flex-col text-right p-4 text-gray-500 hover:text-blue-500 transition">Log Out</a>
<section>
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700 mt-6">
                <div class="p-6">
                    <h1 class="text-center text-4xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white mb-6">
                        Welcome to your Dashboard!
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <div class="bg-blue-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">
                            <a href="/products/index" class=" p-4 text-gray-500 hover:text-blue-500 transition">Products</a>
                            </h3>
                            <a href='products/create' class="text-gray-700 dark:text-gray-400">Create a Product</a>
                        </div>
                        
                        <div class="bg-green-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">
                            <a href="/orders/orders" class="p-4 text-gray-500 hover:text-blue-500 transition">Orders</a>
                            </h3>
                            <a href='orders/new' class="text-gray-700 dark:text-gray-400">Create an Order</a>
                        </div>
                        
                        <div class="bg-yellow-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">
                            <a href="/report" class="p-4 text-gray-500 hover:text-blue-500 transition">Reports</a>
                            </h3>
                            <a href='reports/create' class="text-gray-700 dark:text-gray-400">Create a Report</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
</x-layout>
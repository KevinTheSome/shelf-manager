<x-layout title="dashboard">
<x-navbar></x-navbar>
<section>
        <div class="container mx-auto">
            <div class="bg-white rounded-lg shadow dark:border dark:bg-gray-800 dark:border-gray-700 mt-6">
                <div class="p-6">
                    <h1 class="text-2xl font-bold leading-tight tracking-tight text-gray-900 dark:text-white mb-6">
                        Welcome to your Dashboard
                    </h1>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                        
                        <div class="bg-blue-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">Products</h3>
                            <a href='products/create' class="text-gray-700 dark:text-gray-400">Create a Product</a>
                        </div>
                        
                        <div class="bg-green-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">Orders</h3>
                            <a href='' class="text-gray-700 dark:text-gray-400">Create a Order</a>
                        </div>
                        
                        <div class="bg-yellow-100 p-5 rounded-lg shadow">
                            <h3 class="text-lg font-semibold mb-3">Reports</h3>
                            <a href='' class="text-gray-700 dark:text-gray-400">Create a Report</a>
                        </div>

                    </div>  
                </div>
            </div>
        </div>
    </section>
</x-layout>
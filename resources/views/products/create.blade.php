<x-layout title="Product Create">
    <x-navbar></x-navbar>
    <section class="container mx-auto px-4 py-8">
        <h1 class="text-yellow-900 text-3xl font-bold text-center mb-8">Create a Product</h1>
        <div class="bg-yellow-100 shadow-md rounded px-8 pt-6 pb-8 mb-4">
            <form action="/products/store" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="name" class="block text-yellow-900 text-sm font-bold mb-2">Name</label>
                    <input type="text" name="name" id="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-yellow-900 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="description" class="block text-yellow-900 text-sm font-bold mb-2">Description</label>
                    <input type="text" name="description" id="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-yellow-900 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="mb-4">
                    <label for="amount" class="block text-yellow-900 text-sm font-bold mb-2">Amount</label>
                    <input type="number" name="amount" id="amount" required class="shadow appearance-none border rounded w-full py-2 px-3 text-yellow-900 leading-tight focus:outline-none focus:shadow-outline">
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-yellow-500 text-white py-2 px-4 rounded hover:bg-yellow-900">Create</button>
                </div>
            </form>
        </div>
    </section>
</x-layout>

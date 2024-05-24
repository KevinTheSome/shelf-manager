<x-layout title="Product create">
<x-navbar></x-navbar>
    <h1>Create Product</h1>
    <form action="/products/store" method="POST">
        @csrf
        <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Description</label>
            <input type="text" name="description" id="description" required>
        </div>
        <div>
            <label for="amount">Amount</label>
            <input type="number" name="amount" id="amount" required>
        </div>
        <button type="submit">Create</button>
    </form>
</x-layout>

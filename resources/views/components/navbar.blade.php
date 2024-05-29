<nav class="flex w-screen justify-center space-x-8 bg-yellow-100">
    <a href="/dashboard" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Dashboard</a>

    @if (auth()->user()->roles == 'Admin')
        <a href="/admin" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Admin</a>
    @endif

    @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Accountant')
        <a href="/products/index" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Products</a>
    @endif

    @if (auth()->user()->roles == 'Admin'|| auth()->user()->roles == 'Accountant')
        <a href="/orders" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Orders</a>
    @endif

    @if (auth()->user()->roles == 'Admin'|| auth()->user()->roles == 'Accountant')
        <a href="/report" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Report</a>
    @endif

    @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Stocker')
        <a href="/shelf/index" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Shelves</a>
    @endif

    @if (auth()->user()->roles == 'Admin' || auth()->user()->roles == 'Stocker')
        <a href="/shelf_storage/index" class="p-4 text-yellow-900 hover:text-yellow-400 transition">Shelf storage</a>
    @endif

</nav>
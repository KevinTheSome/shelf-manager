<div>


<nav class="bg-yellow-100 mx-auto flex items-center flex w-screen justify-between space-x-8 ">
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
<div id="dropdown-menu" class="dropdown-menu md:hidden bg-gray-800 mt-2 space-y-2 p-2">
      <a href="/dashboard" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md">Dashboard</a>
      <a href="/admin" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md">Admin</a>
      <a href="/products/index" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md">Products</a>
      <a href="/orders" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md">Orders</a>
      <a href="/report" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md">Report</a>
      <a href="/shelf/index" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md">Shelves</a>
      <a href="/shelf_storage/index" class="block text-white hover:bg-gray-700 px-3 py-2 rounded-md">Shelf storage</a>
    </div>
</div>
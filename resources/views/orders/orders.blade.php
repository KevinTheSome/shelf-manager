<x-layout title="Orders">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
        <h1 class="text-yellow-900 text-3xl font-bold text-center mb-8 mt-8">Orders</h1>
        <a href="/orders/create" class="text-center inline-block bg-yellow-500 text-white py-2 px-4 mt-6 mb-6 rounded hover:bg-yellow-900">Make a New Order</a>

        <div class="bg-white shadow-md rounded overflow-hidden">
            <table class="min-w-full leading-normal">
                <thead>
                    <tr>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Order Date</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Recive Date</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Status</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Amount</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Product</th>
                        <th class="bg-yellow-600 px-5 py-3 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-yellow-900 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $order->orderDate }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $order->receiverDate }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $order->status }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $order->amount }}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">{{ $order->product}}</td>
                        <td class="bg-yellow-100 px-5 py-5 border-b border-yellow-400 bg-white text-sm">
                            <a href="{{ url('orders/' . $order->id . '/edit') }}" class="bg-yellow-500 text-white py-1 px-3 rounded hover:bg-yellow-900">Edit</a>
                            <form action="{{ url('orders/delivered') }}" method="POST" class="inline-block">
                                @csrf
                                <input type="hidden" name="id" value="{{ $order->id }}">
                                <button type="submit" class="text-yellow-600 hover:text-yellow-900 ml-2">Recived</button>
                            </form>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        </div>
    </section>

</x-layout>
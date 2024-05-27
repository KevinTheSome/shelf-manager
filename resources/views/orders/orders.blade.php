<x-layout title="Orders">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
        <a href="/orders/create" class="inline-block bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Make New Order</a>
            @foreach ($orders as $order)
                <div class="flex gap-2">
                    <p>{{ $order->status }}</p>
                    <p>{{ $order->amount }}</p>
                    <p>{{ $order->orderDate }}</p>
                    <p>{{ $order->receiverDate }}</p>
                </div>
            @endforeach
    </section>

</x-layout>
<x-layout title="Orders edit">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
        <form action="/orders/update" method="POST">
            @csrf
            @method('PUT')
            <label class="text-yellow-900">
                Amount:
                <p>Order amount: {{ $order->amount }}</p>
            </label>

            <label  class="text-yellow-900">
                Products:
                <p>Products: {{ $order->product_id }}</p>
            </label>

            <label class="text-yellow-900">
                Status:
                <select name="status" id="status">
                    @if ($order->status == 'shipping')
                    <option value="shipping" selected>shipping</option>
                    @else
                    <option value="shipping">shipping</option>
                    @endif

                    @if ($order->status == 'delivered')
                    <option value="delivered" selected>delivered</option>
                    @else
                    <option value="delivered">delivered</option>
                    @endif

                    @if ($order->status == 'cancelled')
                    <option value="cancelled" selected>cancelled</option>
                    @else
                    <option value="cancelled">cancelled</option>
                    @endif

                </select>
            </label>

            <input type="hidden" name="id" value="{{ $order->id }}">
            
            <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-900">update order</button>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li class="text-red-500">{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </form>

    </section>

</x-layout>
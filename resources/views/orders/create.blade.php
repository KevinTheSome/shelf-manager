<x-layout title="Orders">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
            <form method="POST" action="/orders/store" class="grid grid-cols-1 gap-2 p-4 bg-yellow-600">
                @csrf

                <label class="text-yellow-900">
                    Amount:
                    <input type="number" name="amount" placeholder="1-99" id="amount">
                </label>

                <label  class="text-yellow-900">
                    Products:
                    <select name="product_id" id="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label class="text-yellow-900">
                    Status:
                    <select name="status" id="status">
                        <option value="shipping">shipping</option>
                        <option value="delivered">delivered</option>
                        <option value="cancelled">cancelled</option>
                    </select>
                </label>
                
                <button type="submit" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-900">make an order</button>

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
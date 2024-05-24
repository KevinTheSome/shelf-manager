<x-layout title="Orders">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
            <form method="POST" action="/orders/store" class="grid grid-cols-1 gap-2 p-4 bg-gray-100">
                @csrf

                <label>
                    Amount:
                    <input type="number" name="amount" placeholder="1-99" id="amount">
                </label>

                <label>
                    Products:
                    <select name="product_id" id="product_id">
                        @foreach ($products as $product)
                            <option value="{{ $product->id }}">{{ $product->name }}</option>
                        @endforeach
                    </select>
                </label>

                <label>
                    Status:
                    <select name="status" id="status">
                        <option value="shipping">shipping</option>
                        <option value="delivered">delivered</option>
                        <option value="cancelled">cancelled</option>
                    </select>
                </label>
                
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">make a order</button>

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
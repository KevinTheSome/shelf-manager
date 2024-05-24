<x-layout title="Orders">
    <x-navbar></x-navbar>
    <section class="grid justify-center content-center">
        <h1>Orders</h1>
        <div class="grid grid-rows-1">
            <form mathod="POST">
                @csrf
                <label>
                    Amount:
                    <input type="number" name="Amount" id="Amount">
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

                <label>
                    Amount:
                    <input type="text" name="" id="">
                </label>
                
                

                
                <button type="submit">make a order</button>
            </form>
        </div>
        
    </section>

</x-layout>
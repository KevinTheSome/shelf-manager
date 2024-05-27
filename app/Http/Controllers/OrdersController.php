<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function orders()
    {
        return view('orders.orders' , ['products' => Product::all() , 'orders'=>Order::all()]);
    }

    public function create()
    {
        return view('orders.create' , ['products' => Product::all()]);
    }

    public function store(Request $request)
    {

        $request->validate([
            'status' => 'required',
            'amount' => 'required|integer',
            'product_id' => 'required',
        ]);

        $order = new Order();
        $order->orderDate = date('Y-m-d H:i:s');
        $order->receiverDate = $request->receiverDate;
        $order->status = $request->status;
        $order->amount = $request->amount;
        $order->user_id = Auth::user()->id;
        $order->product_id = $request->product_id;
        $order->save();

        return redirect('/orders');
    }

}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrdersController extends Controller
{
    public function index()
    {
        return view('orders');
    }

    public function new()
    {
        return view('orders.new');
    }

    public function create(Request $request)
    {
        $request->validate([
            'orderDate' => 'required|date',
            'receiverDate' => 'required|date',
            'status' => 'required',
            'amount' => 'required',
            'user_id' => 'required',
            'product_id' => 'required',
        ]);

        $order = new Order();
        $order->order_date = $request->orderDate;
        $order->receiver_date = $request->receiverDate;
        $order->status = $request->status;
        $order->amount = $request->amount;
        $order->user_id = $request->user_id;
        $order->product_id = $request->product_id;
        $order->save();
    }
}

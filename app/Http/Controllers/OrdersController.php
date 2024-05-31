<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Report;
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

    public function edit($id)
    {
        return view('orders.edit' , ['order' => Order::find($id)]);
    }

    public function delivered(Request $request)
    {
        $request->validate([
            'id' => 'required|integer',
        ]);

        $id = $request->id;

        $order = Order::find($id);
        $order->status = 'delivered';
        $order->receiverDate = date('Y-m-d H:i:s');
        $order->save();

        return redirect('/orders');
    }

    public function update(Request $request)
    {
        $request->validate([
            'status' => 'required|in:shipping,delivered,cancelled',
        ]);

        $order = Order::find($request->id);
        if($request->status == 'delivered') {
            
            $order->status = $request->status;
            $order->receiverDate = date('Y-m-d H:i:s');
            $order->save();
        }

        $order->status = $request->status;
        $order->save();

        return redirect('/orders');
    }

    public function store(Request $request)
    {

        $request->validate([
            'status' => 'required|in:shipping,delivered,cancelled',
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

        $report = new Report();
        $report->action = 'New order created of ' . $request->product_id . ' status ' . $request->status;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect('/orders');
    }

}

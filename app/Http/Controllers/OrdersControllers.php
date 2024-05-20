<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrdersControllers extends Controller
{
    public function index()
    {
        return view('orders');
    }
}

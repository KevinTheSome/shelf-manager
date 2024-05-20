<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Product extends Controller
{
    //the conntroller
    public function index()
    {
        return view('product');
    }

    public function show()
    {
        return view('product');
    }

}

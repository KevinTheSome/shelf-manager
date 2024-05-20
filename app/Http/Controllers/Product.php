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

    public function edit(Request $request)
    {
        return view('product');
    }

    public function update(Request $request)
    {
        return view('product');
    }

    public function delete()
    {
        return view('product');
    }

    public function create(Request $request)
    {
        return view('product');
    }

}

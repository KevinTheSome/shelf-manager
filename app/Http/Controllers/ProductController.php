<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|integer',
        ]);

        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->save();

        $report = new Report();
        $report->action = 'New Product created ' . $product->id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect()->intended('products/index')
            ->with('success', 'Product created successfully.');
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|integer',
            'product_id' => 'required|integer',
        ]);

        $product = Product::findOrFail($request->product_id);
        $product->update($request->all());

        $report = new Report();
        $report->action = 'Product edited ' . $request->product_id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect('/products/index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        $report = new Report();
        $report->action = 'Product destroy ' . $id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect('/products/index');
    }
}

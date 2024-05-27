<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;

class ShelfController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|integer',
        ]);

        $product = new Shelf();
        $product->name = $request->name;
        $product->save();
    }

}

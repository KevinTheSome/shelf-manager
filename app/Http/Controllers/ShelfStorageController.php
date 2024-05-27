<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;
use App\Models\ShelfStorage;

class ShelfStorageController extends Controller
{
    public function create(Request $request) {
        $request->validate([
            'product_id' => 'required|integer|exists:products',
            'shelf_id' => 'required|integer|exists:shelf',
        ]);

        $product = new ShelfStorage();
        $product->product_id = $request->product_id;
        $product->shelf_id = $request->shelf_id;
        $product->save();
    }
}

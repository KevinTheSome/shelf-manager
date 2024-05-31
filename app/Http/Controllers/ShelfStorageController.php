<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShelfStorage;
use App\Models\Product;
use App\Models\Shelf;

class ShelfStorageController extends Controller
{
    // Method to create a new ShelfStorage record
    public function new(Request $request) {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'shelf_id' => 'required|integer|exists:shelves,id',  // Fixed table names and added id column check
        ]);

        $shelfStorage = new ShelfStorage();
        $shelfStorage->product_id = $request->product_id;
        $shelfStorage->shelf_id = $request->shelf_id;
        $shelfStorage->save();

        return redirect('/shelf_storage/index');
    }

    public function create() {
        return view('shelfStorage.create', ['products' => Product::all(), 'shelves' => Shelf::all()]);
    }

    // Method to display the form for editing a ShelfStorage record
    public function edit($id) {
        $shelfStorage = ShelfStorage::findOrFail($id);
        $products = Product::all();
        $shelves = Shelf::all();
        return view('shelfStorage.edit', compact('shelfStorage', 'products', 'shelves'));
    }

    // Method to update an existing ShelfStorage record
    public function update(Request $request, $id) {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'shelf_id' => 'required|integer|exists:shelves,id',
        ]);

        $shelfStorage = ShelfStorage::findOrFail($id);
        $shelfStorage->product_id = $request->product_id;
        $shelfStorage->shelf_id = $request->shelf_id;
        $shelfStorage->save();

        return redirect()->intended('shelf_storage/index')
            ->with('success', 'Shelf updated successfully.');
    }

    // Method to delete a ShelfStorage record
    public function delete($id) {
        $shelfStorage = ShelfStorage::findOrFail($id);
        $shelfStorage->delete();

        return redirect()->intended('shelf_storage/index')
        ->with('success', 'Shelf deleted successfully.');
    }

    // Method to display all ShelfStorage records (index method)
    public function index() {
        $shelfStorages = ShelfStorage::with('product', 'shelf')->get();
        return view('shelfStorage.index', ['shelfStorages' => $shelfStorages]);
    }
}

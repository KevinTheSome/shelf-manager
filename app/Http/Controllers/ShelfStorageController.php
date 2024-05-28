<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShelfStorage;

class ShelfStorageController extends Controller
{
    // Method to create a new ShelfStorage record
    public function create(Request $request) {
        $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'shelf_id' => 'required|integer|exists:shelves,id',  // Fixed table names and added id column check
        ]);

        $shelfStorage = new ShelfStorage();
        $shelfStorage->product_id = $request->product_id;
        $shelfStorage->shelf_id = $request->shelf_id;
        $shelfStorage->save();

        return redirect()->route('shelf_storage.index')->with('success', 'Shelf Storage created successfully.');
    }

    // Method to display the form for editing a ShelfStorage record
    public function edit($id) {
        $shelfStorage = ShelfStorage::findOrFail($id);
        return view('shelf_storage.edit', compact('shelfStorage'));
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

        return redirect()->route('shelf_storage.index')->with('success', 'Shelf Storage updated successfully.');
    }

    // Method to delete a ShelfStorage record
    public function delete($id) {
        $shelfStorage = ShelfStorage::findOrFail($id);
        $shelfStorage->delete();

        return redirect()->route('shelf_storage.index')->with('success', 'Shelf Storage deleted successfully.');
    }

    // Method to display all ShelfStorage records (index method)
    public function index() {
        return view('shelfStorage.index', ['shelfStorages' => ShelfStorage::all()]);
    }
}

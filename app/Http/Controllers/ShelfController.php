<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;

class ShelfController extends Controller
{
    public function index() {
        $shelf = Shelf::all();
        return view('shelf.index', ['shelves' => $shelf]);
    }

    public function create() {
        return view('shelf.create');
    }

    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $shelf = new Shelf();
        $shelf->name = $request->name;
        $shelf->save();

        return redirect()->intended('shelf/index')
            ->with('success', 'Shelf created successfully.');
    }

    public function edit($id) {
        $shelf = Shelf::findOrFail($id);
        return view('shelf.edit', compact('shelf'));
    }

    public function update(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        

        $shelf = Shelf::findOrFail($request->shelf_id);
        $shelf->name = $request->name;
        $shelf->save();

        return redirect()->intended('shelf/index')
            ->with('success', 'Shelf updated successfully!');
    }

    public function delete($id)
    {
        $shelf = Shelf::findOrFail($id);
        $shelf->delete();

        return redirect('/shelf/index');
    }
}

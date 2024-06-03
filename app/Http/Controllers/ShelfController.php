<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shelf;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

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

        $report = new Report();
        $report->action = 'New Shelf created ' . $shelf->id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

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

        $report = new Report();
        $report->action = 'Shelf edited ' . $request->shelf_id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect()->intended('shelf/index')
            ->with('success', 'Shelf updated successfully!');
    }

    public function delete($id)
    {
        $shelf = Shelf::findOrFail($id);
        $shelf->delete();

        $report = new Report();
        $report->action = 'Shelf deleted ' . $id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect('/shelf/index');
    }
}

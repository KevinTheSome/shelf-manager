<?php

//Deklarē ProductController klasi
namespace App\Http\Controllers;

//Importē nepieciešamās klases
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

//index metode: Iegūst visus produktus no Product modeļa un atgriež view products.index ar produktiem.
class ProductController  extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('products.index', compact('products'));
    }
//Show metode: Atrod konkrētu produktu pēc id, un atgriež skatījumu products.show ar atrasto produktu
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }
//create metode: Atgriež skatījumu products.create, lai izveidotu jaunu produktu.
    public function create()
    {
        return view('products.create');
    }
//store metode: Validē pieprasījuma datus, lai pārbaudītu, vai name, description un amount lauki ir aizpildīti pareizi.

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|integer',
        ]);
//Izveido jaunu Product objektu un aizpilda to ar pieprasījuma datiem (name, description, amount), tad saglabā to datubāzē.
        $product = new Product();
        $product->name = $request->name;
        $product->description = $request->description;
        $product->amount = $request->amount;
        $product->save();
//Izveido jaunu Report objektu, aizpilda to ar informāciju par darbību (New Product created), pašreizējo laiku un lietotāja id, un saglabā to datubāzē.
        $report = new Report();
        $report->action = 'New Product created ' . $product->id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();
//Pārvirza lietotāju uz products/index lapu ar ziņu par veiksmīgu produkta izveidi.
        return redirect()->intended('products/index')
            ->with('success', 'Product created successfully.');
    }
//edit metode: Atrod konkrētu produktu pēc id, un atgriež skatījumu products.edit ar atrasto produktu.
    public function edit($id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', compact('product'));
    }
//update metode: Validē pieprasījuma datus, lai pārbaudītu, vai name, description, amount, un product_id lauki ir aizpildīti pareizi.
    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'amount' => 'required|integer',
            'product_id' => 'required|integer',
        ]);
//Atrod konkrētu produktu pēc product_id, un atjaunina to ar visiem pieprasījuma datiem.
        $product = Product::findOrFail($request->product_id);
        $product->update($request->all());
//Izveido jaunu Report objektu, aizpilda to ar informāciju par darbību (Product edited), pašreizējo laiku un lietotāja id, un saglabā to datubāzē.
        $report = new Report();
        $report->action = 'Product edited ' . $request->product_id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect('/products/index');
    }
//destroy metode: Atrod konkrētu produktu pēc id, un dzēš to no datubāzes.
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
//Izveido jaunu Report objektu, aizpilda to ar informāciju par darbību (Product destroy), pašreizējo laiku un lietotāja id, un saglabā to datubāzē.
        $report = new Report();
        $report->action = 'Product destroy ' . $id;
        $report->time = date('Y-m-d H:i:s');
        $report->user_id = Auth::user()->id;
        $report->save();

        return redirect('/products/index');
    }
}

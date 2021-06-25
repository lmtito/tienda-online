<?php

namespace App\Http\Controllers\Panel;

use App\Models\PanelProduct;
use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
//use App\Scopes\AvailableScope;

class ProductController extends Controller
{
    //public function __construct()
    //{
    //    $this->middleware('auth');
    //}

    public function index()
    {
        //$products = PanelProduct::all();
        //$products = Product::withoutGlobalScope(AvailableScope::class)->get();
        //dd($products);
        return view('products.index')->with([
            'products' => PanelProduct::without('images')->get(),
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(ProductRequest $request)
    {
        //if ($request->status == 'available' && $request->stock == 0) {
        //    //session()->put('error', 'If available must have stock');
            //session()->flash('error', 'If available must have stock');
        //    return redirect()
        //        ->back()
        //        ->withInput($request->all())
        //        ->withErrors('If available must have stock');
        //}
        //dd(request()->all, $request->all(), $request->validated());
        //session()->forget('error');
        $product = PanelProduct::create($request->validated());

        //session()->flash('success', "The new product with id {$product->id} was created");

        //return redirect()->back();
        //return redirect()->action('ProductController@index');
        return redirect()
            ->route('products.index')
            ->withSuccess("The new product with id {$product->id} was created");
            //->with(['success' => "The new product with id {$product->id} was created"]);
    }

    public function show(PanelProduct $product)
    {
        //$product = PanelProduct::findOrFail($product);
        //dd($product);
        return view('products.show')->with([
            'product' => $product,
        ]);
    }

    public function edit(PanelProduct $product)
    {
        return view('products.edit')->with([
            'product' => $product,  //PanelProduct::findOrFail($product),
        ]);
    }

    public function update(ProductRequest $request, PanelProduct $product)
    {
        //$product = PanelProduct::findOrFail($product);
        $product->update($request->validated());
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was edited");
    }

    public function destroy(PanelProduct $product)
    {
        //$product = PanelProduct::findOrFail($product);
        $product->delete();
        return redirect()
            ->route('products.index')
            ->withSuccess("The product with id {$product->id} was deleted");
    }
}

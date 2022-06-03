<?php

namespace App\Http\Controllers\products;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\EditItemResource;
use App\Items;
use App\Product;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Items::orderBy('id', 'desc')->paginate(10);
        $categories = Category::pluck('name', 'id')->all();
        return view('user.products.index')->withProducts($products)->withCategories($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/products/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    { 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Items::FindOrFail($id);
        return new EditItemResource($item);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {   
        $item = Items::FindOrFail($id);
        $item = (string) $item->id;
        return view('user.products.edit')->withItem($item);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        $product = Items::findOrFail($id);
        
        $product->update($request->input());
        $product->pricing->update($request->price);
        $product->image->update($request->image);
        $product->inventory->update($request->quantity);
        
        $product->location->update($request->location);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}

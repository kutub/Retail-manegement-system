<?php

namespace App\Http\Controllers;

use App\Attribute;
use App\Category;
use App\Http\Resources\ProductsResource;
use App\Image;
use App\Inventory;
use App\Items;
use App\Location;
use App\Pricing;
use App\Supplier;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function getItems(){
        $items = Items::paginate(50);
        return  ProductsResource::collection($items);
    }
    
    public function saveItem(Request $request){
    
        if ($request->model == 'item') {
             $items = Items::create($request->input());
             return response()->json($items->id);
        }if ($request->model == 'variation') {
            if($request->attributes){
                $attrItem = Attribute::create($request->input());
                
            }
        } 
        if($request->model == 'pricing'){
            $pricing = Pricing::create($request->input());
        }if($request->model == 'inventory'){
            $inventory = Inventory::create($request->input());
        }if($request->model == 'location'){
            $location = Location::create($request->input());
        }
        if($request->model == 'image'){
            $image = new Image();
            $image->image = $request->image;
            $image->items_id = $request->input('items_id');
            $image->save();
        }
        else {
            return response()->json('error: Something wrong');
        }
    }

    public function checkUnique(Request $request)
    {
        return json_encode(!Items::where('name', '=', $request->name)->exists());
    }

    public function categories(){
        $category = Category::pluck('name', 'id')->all();
        return response()->json($category);
    }
    
    public function suppliers(){
        $suppliers = Supplier::pluck('name', 'id')->all();
        return response()->json($suppliers);
    }

    public function attributes(){
        $attributes = Attribute::pluck('name', 'id')->all();
        return response()->json($attributes);
    }
    // public function attributeCreate(){
    //     return view('')
    // }
    public function attributeShow($id){
        $attributes = Attribute::FindOrFail($id);
        return response()->json($attributes);
    }

    public function createAttribute(Request $request, $id){
        $item = Items::FindOrFail($id);
        $item->attributes()->syncWithoutDetaching([2,1]);
        // $item->syncAttributes(explode(',', $request->attributes));
    }

    public function uploadImage(Request $request){
        $file = $request->file('file');
        $dir = 'public/images/products';
        $path = $file->store($dir);
        return str_replace("$dir/", '', $path);
    }

    public function search(Request $request){
        $products = Items::search($request->input('name'))->get();
        $categories = Category::pluck('name', 'id')->all();
        return view('user.products.search.index')->with( ['products' => $products, 'categories' => $categories] );
    }

    public function findItem($query){
        // $items = Items::where('name', 'LIKE', "%{$query}%")->orWhere('product_id', 'LIKE', "%{$query}%")->orWhere('tags', 'LIKE', "%{$query}%")->get();
        $items = Items::search($query)->get();
        return ProductsResource::collection($items);
    }

    public function purchaseUpdate(Request $request){
        if($request->model == 'inventory'){
            $inventory = Inventory::where('items_id', $request->items_id)->get()->first();
            $inventory->quantity = ($inventory->quantity + $request->quantity);
            $inventory->save();
        }else{
            $pricing = Pricing::where('items_id', $request->items_id)->get()->first();
            $pricing->cost_price = $request->price;
            $pricing->save();
        }
        
    }
}

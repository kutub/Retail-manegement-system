<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Purchasing;
use Illuminate\Http\Request;

class PurchasingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $purchasing = Purchasing::orderBy('id', 'desc')->paginate(10);
        return view('user.products.purchasing.index')->withPurchasing($purchasing);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/products/purchasing/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $purchase = Purchasing::create($request->input());
        $purchase->pquotes()->attach($request->quotes);
        
        return response()->json($purchase);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Purchasing  $purchasing
     * @return \Illuminate\Http\Response
     */
    public function show(Purchasing $purchasing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Purchasing  $purchasing
     * @return \Illuminate\Http\Response
     */
    public function edit(Purchasing $purchasing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Purchasing  $purchasing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Purchasing $purchasing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Purchasing  $purchasing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Purchasing $purchasing)
    {
        //
    }
}

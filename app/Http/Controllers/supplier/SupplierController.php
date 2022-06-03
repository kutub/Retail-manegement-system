<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use App\Http\Resources\FindSupplierResource;
use App\Supplier;
use Illuminate\Http\Request;
use Laratrust\Laratrust;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
           
            $suppliers = Supplier::orderBy('id', 'asc')->paginate(10);
            return view('user/suppliers/index')->withSuppliers($suppliers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user/suppliers/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            ]
        );
        $supplier = Supplier::create($request->input());
        return redirect()->route('supplier.index', app()->getLocale());
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $lang, $id)
    {
        $supplier = Supplier::FindOrFail($id);
        return view('user/suppliers/show')->withSupplier($supplier);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $lang, $id)
    {
        $supplier = Supplier::FindOrFail($id);
        return view('user/suppliers/edit')->withSupplier($supplier);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        $supplier = Supplier::FindOrFail($id);
        $supplier->update($request->input());
        return redirect()->route('supplier.edit', [app()->getLocale(), $supplier->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Supplier  $supplier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier)
    {
        //
    }

    public function findSupplier($query){
        $customer = Supplier::where('name', 'LIKE', "%{$query}%")->orWhere('phone', 'LIKE', "%{$query}%")->orWhere('id', 'LIKE', "%{$query}%")->get();
        return FindSupplierResource::collection($customer);
    }

    public function addSupplier(Request $request){
        $customer = Supplier::create($request->input());
        return new FindSupplierResource($customer);
    }
}

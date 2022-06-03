<?php

namespace App\Http\Controllers;

use App\Imports\ImportImage;
use App\Imports\ImportInventory;
use App\Imports\ImportPricing;
use App\Imports\ImportSupplier;
use App\Imports\ItemsImport;
use App\Items;
use App\Pricing;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ImportExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.importExcel.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->hasFile('select_file'));
        $this->validate($request, [
            'select_file'  => 'required|mimes:xls,xlsx'
           ]);
      
           $path1 = $request->file('select_file')->store('temp');
           $path=storage_path('app').'/'.$path1; 
        //    dd($path);
        //    $data = Excel::import(new ItemsImport, $path);
           $data = Excel::import(new ItemsImport, $path);
           
        //    dd($data);
      
           
        return back()->with('success', 'Excel Data Imported successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

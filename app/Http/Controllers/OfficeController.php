<?php

namespace App\Http\Controllers;

use App\Office;
use Illuminate\Http\Request;

class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $offices = Office::orderBy('id', 'asc')->paginate(10);
        return view('user.office.index')->withOffices($offices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.office.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //handle File Upload
        if($request->hasFile('image')){
            //Get filename with the extension
            $filenameWithExt = $request->file('image')->getClientOriginalName();
            // dd($filenameWithExt);
            //Get just filename
            $filename = pathinfo($filenameWithExt,  PATHINFO_FILENAME);
            //Get just ext
            $extension = $request->file('image')->getClientOriginalExtension();
            
            //File name to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //get file
            $file = $request->file('image');
            //upload Image 
            $file->move('uploads/office/', $fileNameToStore);
        }else{
            $fileNameToStore = 'anonymous.png';
            
        }

        $office = new Office();
        $office->name = $request->name;
        $office->tagline = $request->tagline;
        $office->description = $request->description;
        $office->email = $request->email;
        $office->image = $fileNameToStore;
        $office->mobile_1 = $request->mobile_1;
        $office->mobile_2 = $request->mobile_2;
        $office->note = $request->note;
        $office->address = $request->address;
        $office->lang = $request->lang;
        $office->isTagline = $request->isTagline;
        $office->isDescription = $request->isDescription;
        $office->isNote = $request->isNote;        
        $office->save();
        return redirect()->route('office.index', app()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $lang, $id)
    {
        $office = Office::all();
        return response()->json($office);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $lang, $id)
    {
        $office = Office::FindOrFail($id);
        return view('user.office.edit')->withOffice($office);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        $office = Office::FindOrFail($id);
        $office->update($request->input());
        return redirect()->route('office.edit', [app()->getLocale(), $office->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Office  $office
     * @return \Illuminate\Http\Response
     */
    public function destroy(Office $office)
    {
        //
    }

    public function officeInfo(){
        $office = Office::all();
        return response()->json($office);
    }
}

<?php

namespace App\Http\Controllers\products;

use App\Http\Controllers\Controller;
use App\Pquote;
use Illuminate\Http\Request;

class PquotesController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quote = Pquote::create($request->input());
        return response()->json($quote);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Pquote  $pquote
     * @return \Illuminate\Http\Response
     */
    public function show(Pquote $pquote)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Pquote  $pquote
     * @return \Illuminate\Http\Response
     */
    public function edit(Pquote $pquote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Pquote  $pquote
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pquote $pquote)
    {
        $pquote->update($request->input());
        return response()->json($pquote);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pquote  $pquote
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pquote $pquote)
    {
        $pquote->delete();
        return response()->json($pquote);
    }
}

<?php

namespace App\Http\Controllers\Api\Accounts;

use App\Deposit;
use App\Drawings;
use App\Http\Controllers\Controller;
use App\Http\Resources\DepositsResource;
use App\Http\Resources\DrawingsResource;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Shared\Drawing;

class DrawingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $drawings = Drawings::orderBy('id', 'desc')->paginate(10);
        return DrawingsResource::collection($drawings);
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
        $drawings = Drawings::create($request->input());
        return new DrawingsResource($drawings);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $drawings = Drawings::findOrFail($id);
        return new DepositsResource($drawings);
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
        $drawings = Deposit::findOrFail($id);
        $drawings->update($request->input());
        return new DrawingsResource($drawings);
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

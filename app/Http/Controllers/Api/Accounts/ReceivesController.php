<?php

namespace App\Http\Controllers\Api\Accounts;

use App\Cash;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReceivesResource;
use App\Receive;
use Illuminate\Http\Request;

class ReceivesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receives = Receive::orderBy('id', 'desc')->paginate(10);
        return ReceivesResource::collection($receives);
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
        $receive = Receive::create($request->input());
        $cash = Cash::create([
            'receive_id' => $receive->id,
            'total' => $receive->total,
            'credited' => $receive->total,
            'account_head' => $receive->receive_head,
        ]);
        return new ReceivesResource($receive);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $receive = Receive::findOrFail($id);
        return new ReceivesResource($receive);
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
        $receive = Receive::findOrFail($id);
        $receive->update($request->input());
        $cash = Cash::where('receive_id', $receive->id)->get()->first();
        $cash->update([
            'receive_id' => $request->id,
            'total' => $request->total,
            'credited' => $request->total,
            'account_head' => $request->receive_head,
        ]);

        return new ReceivesResource($receive);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
}

<?php

namespace App\Http\Controllers\accounts;

use App\Cash;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Office;
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
        return view('user.accounts.receives.index')->withReceives($receives);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        return view('user.accounts.receives.create')->withCustomers($customers);
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
        if($request->receive_head == 'from-invoice'){
            return response()->json($receive);
        }else{
            return redirect()->route('receive.show', [app()->getLocale(), $receive->id]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Receive  $receive
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $lang, $id)
    {
       
        $receive = Receive::FindOrFail($id);
        $office = Office::all();
        return view('user.accounts.receives.show')->withReceive($receive)->withOffice($office);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Receive  $receive
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $lang, $id)
    {
        $receive = Receive::FindOrFail($id);
        return view('user.accounts.receives.edit')->withReceive($receive);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Receive  $receive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Receive $receive)
    {
        $receive->update($request->input());
        $cash = Cash::where('receive_id', $receive->id)->get()->first();
        $cash->update([
            'receive_id' => $request->id,
            'total' => $request->total,
            'credited' => $request->total,
            'account_head' => $request->receive_head,
        ]);
        return redirect()->route('receive.edit', [app()->getLocale(), $receive->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Receive  $receive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receive $receive)
    {
        //
    }
}

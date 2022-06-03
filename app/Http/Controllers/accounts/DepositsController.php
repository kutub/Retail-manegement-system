<?php

namespace App\Http\Controllers\accounts;

use App\bank;
use App\Deposit;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receives = Deposit::orderBy('id', 'desc')->paginate(10);
        return view('user.accounts.deposits.index')->withReceives($receives);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $banks = bank::pluck('name', 'id')->all();
        return view('user.accounts.deposits.create')->withBanks($banks);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Deposit::create($request->input());
        return redirect()->route('deposit.index', app()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposits
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposits
     * @return \Illuminate\Http\Response
     */
    public function edit($lang, $id)
    {
        $banks = bank::pluck('name', 'id')->all();
        $deposit = Deposit::findOrFail($id);
        return view('user.accounts.deposits.edit')->withDeposit($deposit)->withBanks($banks);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $Deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        $deposit = Deposit::findOrFail($id);
        $deposit->update($request->input());
        return redirect()->route('deposit.edit', [app()->getLocale(), $deposit->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposits  $deposits
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deposit $deposit)
    {
        //
    }
}

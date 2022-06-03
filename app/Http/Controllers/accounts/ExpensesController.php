<?php

namespace App\Http\Controllers\accounts;

use App\Expenses;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExpensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = Expenses::orderBy('id', 'desc')->paginate(10);
        return view('user.accounts.expenses.index')->withExpenses($expenses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.accounts.expenses.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $expense = Expenses::create($request->input());
        return redirect()->route('expense.show', [app()->getLocale(), $expense->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function show(Expenses $expenses, $lang, $id)
    {

        $expense = Expenses::findOrFail($id);
        return view('user.accounts.expenses.show')->with('expense', $expense);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function edit(Expenses $expenses, $lang, $id)
    {
        $expense = Expenses::findOrFail($id);
        return view('user.accounts.expenses.edit')->with('expense', $expense);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        $expense = Expenses::findOrFail($id);
        $expense->update($request->input());
        return redirect()->route('expense.edit', [app()->getLocale(), $expense->id]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Expenses  $expenses
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expenses $expenses)
    {
        //
    }
}

<?php

namespace App\Http\Controllers\sales;

use App\Http\Controllers\Controller;
use App\Http\Resources\InvoiceOrderResource;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate(10);
        return view('user.sales.orders.index')->withOrders($orders);
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
        $order = Order::create($request->input());
        $order->quotes()->attach($request->quotes);
        
        return response()->json($order);
       
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return view('user.sales.orders.show')->withOrder($order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $order = Order::findOrFail($request->id);
        $order->update($request->input());
        $order->quotes()->attach($request->quotes);
        
        return response()->json($order);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }

    public function orderFindById(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        return new InvoiceOrderResource($order);
    }

    public function lastOrder(Request $request)
    {
        if ($request->filter == "lastDay") {

            $lastOrder = Order::whereDate('created_at', '>', Carbon::now()->subDays(2))->get();
            return InvoiceOrderResource::collection($lastOrder);

        } else if($request->filter == "lastWeek") {

            $lastOrder = Order::whereDate('created_at', '>', Carbon::now()->subDays(7))->get();
            return InvoiceOrderResource::collection($lastOrder);

        } else if($request->filter == "lastMonth"){

            $lastOrder = Order::whereDate('created_at', '>', Carbon::now()->subDays(30))->get();
            return InvoiceOrderResource::collection($lastOrder);

        }else if($request->filter == "date"){

            $lastOrder = Order::whereBetween('created_at', [$request->date[0], $request->date[1]])->get();
            return InvoiceOrderResource::collection($lastOrder);

        }else if($request->filter == "search"){

            $lastOrder = Order::where('id','LIKE','%'.$request->data.'%')->get();
            return InvoiceOrderResource::collection($lastOrder);

        }else{

            $lastOrder = Order::whereDate('created_at', today())->get();
            return InvoiceOrderResource::collection($lastOrder);
        }
        
    }
}

<?php

namespace App\Http\Controllers\customers;

use App\Customer;
use App\Http\Controllers\Controller;
use App\Http\Resources\FindCustomerResource;
use Illuminate\Http\Request;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::orderBy('id', 'desc')->paginate(10);
        return view('user.customers.index')->withCustomers($customers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.customers.create');
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
            $file->move('uploads/customer_images/', $fileNameToStore);
        }else{
            $fileNameToStore = 'anonymous.png';
            
        }
        // dd($request->input());
        // $customer = Customer::create($request->input());
        $customer = new Customer();
        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->mobile = $request->mobile;
        $customer->email = $request->email;
        $customer->image = $fileNameToStore;
        $customer->status = $request->status;
        $customer->city = $request->city;
        $customer->state = $request->state;
        $customer->country= $request->country;
        $customer->zip = $request->zip;
        $customer->address_1 = $request->address_1;
        $customer->address_2 = $request->address_2;
        $customer->comments = $request->comments;
        $customer->balance = $request->balance;
        $customer->credit_limit = $request->credit_limit;
        $customer->account = $request->account;
        $customer->bkash_number = $request->bkash_number;
        $customer->amount_for_next_point = $request->amount_for_next_point;
        $customer->test = $request->test;
        $customer->tier_name = $request->tier_name;
        $customer->percentage = $request->percentage;
        $customer->points = $request->points;
        $customer->disable_loyalty = $request->disable_loyalty;
        $customer->override_tax = $request->override_tax;
        $customer->taxable = $request->taxable;
        $customer->save();
        return redirect()->route('customer.index', app()->getLocale());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $lang, $id)
    {
        $customer = Customer::FindOrFail($id);
        return view('user.customers.show')->withCustomer($customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $lang, $id)
    {
        $customer = Customer::FindOrFail($id);
        return view('user.customers.edit')->withCustomer($customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lang, $id)
    {
        $customer = Customer::FindOrFail($id);
        $customer->update($request->input());
        return redirect()->route('customer.edit', [app()->getLocale(),$customer->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }

    public function findCustomer($query){
        $customer = Customer::where('first_name', 'LIKE', "%{$query}%")->orWhere('mobile', 'LIKE', "%{$query}%")->orWhere('last_name', 'LIKE', "%{$query}%")->get();
        return FindCustomerResource::collection($customer);
    }

    public function addCustomer(Request $request){
        $customer = Customer::create($request->input());
        return new FindCustomerResource($customer);
    }
}

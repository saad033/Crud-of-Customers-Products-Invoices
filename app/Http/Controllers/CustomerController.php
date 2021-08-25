<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

          return view('crud.customers.createCustomer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $customers = DB::table('customers')->get();

        return view('crud.customers.customer',['customers'=>$customers]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $this->validate($request, [
            'name' => 'required|min:5|max:20',
            'address' => 'required',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11'

         ]);
        // dd($request->all());
         $customer = new Customer();
         $customer->name = $request->name;
         $customer->address = $request->address;
         $customer->phone_number  = $request->number;
         $customer->save();
         return view('crud.customers.createCustomer',['customers'=>$customer])->with('status','Record Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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
        $customer= Customer::find($id);


        return view('crud.customers.editCustomer',['customer'=>$customer]);
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


        $this->validate($request, [
            'name' => 'required|min:5|max:20',
            'address' => 'required',
            'number' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11'

         ]);
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->address =$request->address;
        $customer->phone_number = $request->number;
        $customer->save();

        return redirect(route('customer_post'))->with('status','Record Updated');
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
        $customer = DB::table('customers')->delete($id);
        // $customer->delete();

        return redirect(route('customer_post'))->with('status','Record Deleted');

    }
}

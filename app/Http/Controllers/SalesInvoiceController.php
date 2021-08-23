<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;

class SalesInvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    // protected $invoice;
    
    // public function __construct($invoice)
    // {
    //    return $this->invoice = $invoice;
    // }



    public function index()
    {
        //
        return view('crud.invoices.salesInvoice');
        
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
        
        $products = DB::table('products')->get();
        // dd($customers,$products);

         return view('crud.invoices.salesInvoice',compact('customers','products'));
      


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
      
        // dd($request->all());
        $post = new Invoice();
        $post->customer_id = $request->name;
        $post->product_id = $request->product_name;
        $post->address = $request->address;
        $post->phone_number = $request->phone_number;
        $post->short_description = $request->desc;
        $post->qty = $request->qty;
        $post->sale_price = $request->value;
        $post->total = $request->total;
        $post->tax = $request->tax;
        $post->after_vat = $request->after_vat;
        $post->save();
        return redirect(route('invoice_post'))->with('status','Post Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $invoice = new Invoice();
        $invoice_data = $invoice->select('invoices.*','customers.name as customer_name')
        ->leftJoin('customers','customers.id','invoices.customer_id')
            ->where('invoices.id',$id)->first();
            $product = Invoice::find($id);
            $product_data = $product->product;
            // dd($invoice_data,$product_data);
            return view('crud.invoices.salesInvoicePrint',compact('invoice_data','product_data'));
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
        $invoice = new Invoice();
        $invoice_data = $invoice->select('invoices.*','customers.name as customer_name')
        ->leftJoin('customers','customers.id','invoices.customer_id')
            ->where('invoices.id',$id)->first();
            $product = Invoice::find($id);
            $product_data = $product->product;

      
        return view('crud.invoices.editSalesInvoice',compact('invoice_data','product_data'));
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
        $post = Invoice::find($id);
        $post->customer_id = $request->name;
        $post->product_id = $request->product_name;
        $post->address = $request->address;
        $post->phone_number = $request->phone_number;
        $post->short_description = $request->desc;
        $post->qty = $request->qty;
        $post->sale_price = $request->value;
        $post->total = $request->total;
        $post->tax = $request->tax;
        $post->after_vat = $request->after_vat;
        $post->save();
        return redirect(route('invoice_post'))->with('status','Post Added');

        

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
        $invoice = DB::table('invoices')->delete($id);
        return redirect(route('invoice_post'))->with('status','Record Deleted');

    }   
}

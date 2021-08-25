<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;


class DashboardController extends Controller
{
    //
    public function index($id)
    {
        $invoice = new Invoice();
        $invoice_data = $invoice->select('invoices.*','products.product_name as name')
            ->leftJoin('products','products.id','invoices.product_id')
             ->where('invoices.id',$id)
          ->with('customers')
            ->first();
//        $invoice = new Invoice();
//        $invoice_data = $invoice->select('invoices.*','customers.name as customer_name')
//            ->leftJoin('customers','customers.id','invoices.customer_id')
//            ->where('invoices.customer_id',$id)
//            ->with('customers')
//            ->find($id);
//        $invoice_data = DB::table('invoices')->get();
            //dd($invoice_data);
             return view('crud.invoices.invoiceDashboard',compact('invoice_data'));
    }

}

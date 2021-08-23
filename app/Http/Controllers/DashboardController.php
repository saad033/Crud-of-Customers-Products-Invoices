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
    public function show()
    {
        $invoice = new Invoice();
        $invoice_data = $invoice->select('invoices.*','customers.name as customer_name')
        ->leftJoin('customers','customers.id','invoices.customer_id')->first();
            $products = DB::table('products')->get();
            // dd($invoice_data,$products);
             return view('crud.invoices.invoiceDashboard',compact('invoice_data','products'));
    }

}

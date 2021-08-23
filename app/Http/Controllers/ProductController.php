<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('crud.products.createProducts'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = DB::table('products')->get();
        return view('crud.products.product',['products'=>$products]);
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
        $request->validate([
            'product_name'=>'required',
            'short_description'=>'required',
            'sale_price'=>'required',
            'quantity'=>'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $product = new Product();
        $product->product_name = $request->product_name;
        $product->short_description = $request->short_description;
        $product->sale_price = $request->sale_price;

        $product->quantity = $request->quantity;

            /* File Loaded and Moved into the folder uploads/images */
        if($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('/uploads/images', $fileName, 'public');
            $request->file->move(public_path('images'), $fileName);

            $product->images = $filePath;


            // $product->product_id = $request->customer_id;
            $product->save();
            return redirect(route('product_list'))->with('status', 'Record Added');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


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
        $product= Product::find($id);
     

        return view('crud.products.editProducts',['product'=>$product]);
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

        $request->validate([
            'product_name'=>'required',
            'short_description'=>'required',
            'sale_price'=>'required',
            'quantity'=>'required',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->short_description = $request->short_description;
        $product->sale_price = $request->sale_price;

        $product->quantity = $request->quantity;

            /* File Loaded and Moved into the folder uploads/images */
        if($request->file()) {
            $fileName = time() . '_' . $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('/uploads/images', $fileName, 'public');
            $request->file->move(public_path('images'), $fileName);

            $product->images = $filePath;


            // $product->product_id = $request->customer_id;
            $product->save();
            return redirect(route('product_list'))->with('status', 'Record Updated');
        }


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
        return redirect(route('product_list'))->with('status','Record Deleted');

    }
}

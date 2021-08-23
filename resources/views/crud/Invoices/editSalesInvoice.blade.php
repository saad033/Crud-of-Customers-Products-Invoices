<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/css/style.css">

    <title>Sales Invoice</title>

</head>
<div class="bg-green-200 py-32 px-10 min-h-screen ">
    <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
        <form  method="POST" action="" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           
            <div class="md:flex">
            <div class="w-full">
            <div class="p-4 border-b-2"> <span class="text-lg font-bold text-gray-600">Sales Invoice</span> </div>
            <div class="p-3">
             <div class="mb-2"> <span class="text-sm">Customer's Name</span>
             <input type="text" value="{{$invoice_data->customer_name}}"name="customer_name"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
                     
            </div>
            <div class="mb-2"> <span class="text-sm">Products' Name</span>
           
            <input type="text" value="{{$product_data->product_name}}"name="product_name"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>
            <div class="mb-2"> <span class="text-sm">Address</span>
         
            <input type="text" value="{{$invoice_data->address}}" name="address"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">  
           </div>
           <div class="mb-2"> <span class="text-sm">Phone Number</span>
           <input type="text" value="{{$invoice_data->phone_number}}" name="phone_number"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>
            <div class="mb-2"> <span class="text-sm">Short Description</span>
            <input type="text" value="{{$invoice_data->short_description}}" name="short_description"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">  
            </div>
            <div class="mb-2"> <span class="text-sm"></span>
             <input type="hidden" value="{{$product_data->quantity}}"name="qty"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>
            <div class="mb-2"> <span class="text-sm"></span>

            <input type="hidden" value="{{$product_data->sale_price}}"name="product_name"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>
            <div class="mb-2"> <span class="text-sm"></span>

            <input type="hidden" value="{{$invoice_data->total}}"name="total"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>  
            <div class="mb-2"> <span class="text-sm"></span>

            <input type="hidden" value="{{$invoice_data->tax}}"name="tax"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>
            <div class="mb-2"> <span class="text-sm"></span>

            <input type="hidden" value="{{$invoice_data->after_vat}}"name="after_vat"class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>
            </div>
           
            <div>

        

            </div>

            <div class="mt-3 text-center pb-3"> <button class="w-full h-12 text-lg w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Sales Invoice</button> </div>
            </div>
         
            </div>
            </div>
        
            </form>
            
            @if (session()->has('status'))
            <div class="mt-5 shadow bg-purple-500 text-white font-bold py-2 px-4 rounded">
            {{session('status')}}
            @endif
            </div>
    </div>
</div>

<script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</script>
</body>
</html>

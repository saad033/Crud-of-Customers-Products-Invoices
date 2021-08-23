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
        <form  method="POST" action="{{ route('invoice_post') }}" enctype="multipart/form-data">
            @csrf
           
            <div class="md:flex">
            <div class="w-full">
            <div class="p-4 border-b-2"> <span class="text-lg font-bold text-gray-600">Sales Invoice</span> </div>
            <div class="p-3">
             <div class="mb-2"> <span class="text-sm">Customer's Name</span>
           
            <select class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300" id="exampleFormControlSelect1" name="name">
            @foreach($customers as $customer)
                        <option value="{{ $customer->id }}">{{ $customer->name }}</option>
              @endforeach
                </select>
            </div>
            <div class="mb-2"> <span class="text-sm">Products' Name</span>
           
            <select class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300" id="exampleFormControlSelect1" name="product_name">
            @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->product_name }}</option>
                        @endforeach
                </select>   
 
            </div>
            <div class="mb-2"> <span class="text-sm">Address</span>
         
            <select class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300" id="exampleFormControlSelect1" name="address">
            @foreach($customers as $customer)
                        <option value="{{ $customer->address }}">{{ $customer->address }}</option>
                        @endforeach
                </select>   
           </div>
           <div class="mb-2"> <span class="text-sm">Phone Number</span>
           <select class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300" id="exampleFormControlSelect1" name="phone_number">
           @foreach($customers as $customer)
                        <option value="{{ $customer->phone_number }}">{{ $customer->phone_number }}</option>
                        @endforeach       
                </select>
            
            </div>
            <div class="mb-2"> <span class="text-sm">Short Description</span>
            <select class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300" id="exampleFormControlSelect1" name="desc">
            @foreach($products as $product)
                        <option value="{{ $product->short_description }}">{{ $product->short_description }}</option>
                        @endforeach
                </select>  
            </div>
            <div class="mb-2"> <span class="text-sm">Quantity</span>
            <select class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300" id="exampleFormControlSelect1" name="qty">
            @foreach($products as $product)
                        <option value="{{ $product->quantity }}">{{ $product->quantity }}</option>
                        @endforeach
                </select>  
           
            </div>
            <div class="mb-2"> <span class="text-sm">Sale Price</span>

            <select class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300" id="exampleFormControlSelect1" name="value">
            @foreach($products as $product)
                        <option value="{{ $product->sale_price }}">{{ $product->sale_price }}</option>
                        @endforeach
                </select> 
                
            </div>
            @foreach($products as $row)
            <?php   
            $total =0;
            $tax = 0.2;
            $vat = 0;
            $afterVat = 0;  
            ?>
            <?php
            
                       $total =  $row->sale_price*$row->quantity;
                    //    $subTotal += $total;
                       $vat = $tax * $total;
                       $afterVat = $vat + $total;
                    ?>
            <div class="mb-2"> <span class="text-sm">Total</span>
            <input type="text" value="{{$total}}" name="total" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
            </div>
            <div class="mb-2"> <span>VAT</span>
            <input type="text" value="{{$vat}}"name="tax" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
          
            </div>
            
            <div class="mb-2"> <span>After Tax</span>
            <input type="text"  value="{{$afterVat}}"name="after_vat" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
          @endforeach
            </div>
            <!-- <div class="mb-2"> <span></span>
            @foreach($customers as $customer)
            <input type="text"  value="{{$customer->id}}"name="after_vat" class="h-12 px-3 w-full border-gray-200 border rounded focus:outline-none focus:border-gray-300">
          @endforeach
            </div> -->

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

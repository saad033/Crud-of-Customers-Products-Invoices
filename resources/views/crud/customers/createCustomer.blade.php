<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


    <title>Add Customer</title>
</head>
<body>

<div class="bg-green-200 py-32 px-10 min-h-screen ">
    <!--   tip; mx-auto -- jagab ilusti keskele  -->
    <div class="bg-white p-10 md:w-3/4 lg:w-1/2 mx-auto">
    <div class="container mt-5">
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


        <form action="{{route('customer_post')}}" method="POST">
            @csrf

            <!--       flex - asjad korvuti, nb! flex-1 - element kogu ylejaanud laius -->
            <div class="flex items-center mb-5">
                <!--         tip - here neede inline-block , but why? -->
                <label for="name" class="inline-block w-20 mr-6 text-right
                                 font-bold text-gray-600">Name</label>
                <input type="text" id="name" name="name":value="old('name')" placeholder="Name"
                       class="flex-1 py-2 border-b-2 border-gray-400 focus:border-green-400 form-control @error('name') is-invalid @enderror
                      text-gray-600 placeholder-gray-400
                      outline-none" required autofocus>
                      @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>

            <div class="flex items-center mb-10">
                <label for="address" class="inline-block w-20 mr-6 text-right form-control @error('address') is-invalid @enderror
                                    font-bold text-gray-600">Address</label>
                <input type="text" id="address" name="address":value="old('address')" placeholder="address"
                       class="flex-1 py-2 border-b-2 border-gray-400
                      text-gray-600
                      placeholder-gray-400" required autofocus>  <!-- check other class spec upper section -->
                      @error('address')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
                <div class="flex items-center mb-10">
                    <label for="phone number" class="inline-block w-20 mr-6 text-right form-control @error('number') is-invalid @enderror
                                    font-bold text-gray-600">Phone Number</label>
                    <input type="text" id="phone_number" name="number":value="old('phone_number')" placeholder="Phone Number"
                           class="flex-1 py-2 border-b-2 border-gray-400
                      text-gray-600
                      placeholder-gray-400" required >  <!-- check other class spec upper section -->
                      @error('number')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                </div>

            <div class="text-right">
{{--                <button class="py-3 px-8 bg-green-400 text-white font-bold">Submit</button>--}}
                <input type="submit" class="shadow bg-green-500 hover:bg-green-400 focus:shadow-outline focus-outline-none
        text-white font-bold py-2 px-4 rounded" value="POST">
            </div>

        </form>
        @if (session()->has('status'))
            <div class="mt-5 shadow bg-purple-500 text-white font-bold py-2 px-4 rounded">
                {{session('status')}}
         @endif
    </div>
</div>

</div>
</body>
</html>


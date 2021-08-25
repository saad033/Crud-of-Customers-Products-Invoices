<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Tailwind CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="public/css/style.css">

    <title>Sales Invoice</title>

</head>
<body>
<div class="container" id="printable">
    <div class="page-header">
    </div>
    <div class="container" style="padding-left:100px">
        <div class="row">
            <div class="col-xl-12 col-md-offset-3 body-main">
                <div class="col-xm-12">
                    <div class="row">
                        <!-- <div class="col-md-4"> <img class="img" alt="Invoce Template" src="" /> </div> -->

                        <div class="col-md-8 text-left">
                            <h4 style="color: #F81D2D;"><strong>Sales Invoice</strong></h4>
                            <p>{{$invoice_data->customer_name}}</p>
                            <p>{{$invoice_data->phone_number}}</p>
                            <p>{{$invoice_data->address}}</p>
                        </div>
                    </div> <br />
                    <div class="row">
                        <div class="col-md-12 text-center">
                            <h2>INVOICE</h>
                        </div>
                    </div> <br />
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>
                                        <h5>Description</h5>
                                    </th>
                                    <th>
                                        <h5>Amount</h5>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>

                                    <td class="col-md-9" value="">{{$invoice_data->product_name}}</td>
                                    <td class="col-md-3"><i class="fas fa-rupee-sign" area-hidden="true"></i>${{$invoice_data->sale_price}} </td>

                                </tr>

                                <tr>
{{--                                    <td class="text-right">--}}
{{--                                        <p> <strong> Taxes:</strong> </p>--}}
{{--                                        <p> <strong>Total Amount: </strong> </p>--}}

{{--                                        <p> <strong>Payable Amount: </strong> </p>--}}
{{--                                    </td>--}}
                                    <td>
{{--                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>${{$invoice_data->tax}} </strong> </p>--}}
{{--                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>${{$invoice_data->after_vat}}</strong> </p>--}}
{{--                                        <p> <strong><i class="fas fa-rupee-sign" area-hidden="true"></i>${{$invoice_data->after_vat}}</strong> </p>--}}
                                    </td>
                                </tr>
                                <tr style="color: #F81D2D;">
                                    <td class="text-right">
                                        <h4><strong>Total:</strong></h4>
                                    </td>
                                    <td class="text-left">

                                        <h4><strong><i class="fas fa-rupee-sign" area-hidden="true"></i>${{$invoice_data->sale_price}} </strong></h4>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        <a href="#" class="btn btn-primary" onclick="print()" style="margin-left:800px">Print</a>

                    </div>


                    <div>
                        <div class="col-md-12">
                            <p><b>Date :</b> <b>{{$invoice_data->created_at}}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</script>
<script src="/path/to/cdn/jquery.min.js">
$('.print').click(function(){
           window.print();
           return false;
});
</script>


</body>
</html>

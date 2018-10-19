{{--@extends('layouts.default')--}}
{{--@include('layouts.design')--}}

{{--@section('content1')--}}
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/css/bootstrap.min.css"
          integrity="sha384-AysaV+vQoT3kOAXZkl02PThvDr8HYKPZhNT5h/CXfBThSRXQ6jW5DO2ekP5ViFdi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>


    <script src="js/Java.js"></script>
    <link rel="stylesheet" href="css/Cas.css">
    {{--<link rel="stylesheet" href="custom_css/style.css">--}}


    <style>
        .stepper-widget {
            margin-right: 20px;
        }
    </style>

    <script>
        jQuery.noConflict();
    </script>

    <script src="stepper.widget.js"></script>

    <script>
        jQuery(document).on('ready', function () {
            jQuery('.stepper-widget').stepper();

            jQuery('.stepper-widget').on('stepperupdate', function (ev, data) {
                console.log(data.updateType);
            });
        });
    </script>
</head>
<body>


<div class="container">
    <h1>Cart</h1>

    <table class="table table-responsive">

        <tr>
            <th>Product</th>
            <th style="text-align: center">Quantity</th>
            <th>Price(BDT)</th>
            <th>Discount</th>
            <th>Total</th>
            <th>remove</th>

        </tr>


        @for($i=0 ;$i<3;$i++)
            <tr>
                <td>Product name</td>
                <td align="center">@include('cart.add')</td>
                <td>1000.00 BDT</td>
                <td>No</td>

                <td>
                    0.0 BDT
                </td>

                <td>
                    <a href="" class="btn btn-danger glyphicon glyphicon-remove"></a>
                </td>
            </tr>

        @endfor

    </table>
    <hr>

    <div class="row">
        <div class="col-sm-4"></div>
        <div class="col-sm-4"></div>
        <div class="col-sm-4" id="billing_section">
            <h2>Total: 0.0 BDT</h2>
            <a href="" class="btn btn-success hvr-wobble-top">Proceed to Checkout</a>
        </div>
    </div>


</div>



</body>
</html>
{{--@endsection--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Online Payment</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <style>

        *{
            box-sizing:border-box
        }
        .container{
            position: relative;
        }
        .container>.box{
            position: absolute;
            left:30%;
            top: 110px;
        }
        .form-control{
            width:200%;
        }


    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
    <div class="box">
        <h2>Payment Option</h2>
        <img src="../img/visa.png"  style="width:40px;height:50px;" >
        <img src="https://assets.nflxext.com/ffe/siteui/acquisition/payment/12_05_2017_icon_master_33x25.png"  style="width:40px;height:40px;" >
        <img src="../img/amex.png"  style="width:40px;height:50px;" >

        <div class="form-group">
            <input type="text" class="form-control form-control-lg" placeholder="First Name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" placeholder="Last Name" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" placeholder="Card Number" required>
        </div>
        <div class="form-group">
            <input type="date" class="form-control form-control-lg" placeholder="Expiration Date" required>
        </div>
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" placeholder="Security Code (CVV)" required>
        </div>

        <form action="{{route('order.confirm')}}">

            {{csrf_field()}}
            <input style="display: none" type="text" name="us_id" value="{{Auth::user()->id}}">
            <input style="display: none" type="text" name="tot_pr" value="{{$total_price}}">
            <input style="display: none" type="text" name="us_add" value="{{Auth::user()->address}}">
            <input style="display: none" type="text" name="us_ph" value="{{Auth::user()->phone_number}}">


            {{--data-toggle="modal" data-target="#myModal"--}}

            <p>You have to pay {{$total_price}} BDT.</p>
            <input type="submit" class="btn btn-success hvr-wobble-top" value="Confirm order"
                   data-toggle="modal" data-target="#myModal">

            {{--<a href="{{route('order.online.payment')}}" class="btn btn-info hvr-wobble-top" >Pay Online</a>--}}



            {{--greeting configuration with modal--}}

            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">

                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title"><b>CONGRATULATION</b></h4>
                        </div>
                        <div class="modal-body">
                            <p style="color:#44b448">
                                <b>
                                    your order successfully complete and you can apply next order with
                                    in 1 hour
                                </b>
                            </p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>

                    </div>
                </div>
            </div>

        </form>
    </div>
</div>

</body>
</html>

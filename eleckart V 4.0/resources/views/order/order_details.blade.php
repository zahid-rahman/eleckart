<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

    @include('layouts.design')
</head>
<body>
 <div class="container" style="margin-top:40px">
        <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="container">
                            <h2><b>order details</b></h2>
                      </div>
                  </div>
                  <div class="panel-body">
                        
        
        
                <h3>user information</h3>
            
            
                <table class="table">
            
            
                    <tr>
                        <th>user email</th>
                        <th>user address</th>
                        <th>user phone numbher</th>
            
                    </tr>
            
                    {{--{{dd($user)}}--}}
            
                    @foreach($user as $info)
            
                        <tr>
                            <td>{{$info->email}}</td>
                            <td>{{$info->address}}</td>
                            <td>{{$info->phone_number}}</td>
                        </tr>
            
                    @endforeach
                </table>
            
            
                <h3>Order</h3>
            
                <table class="table">
            
            
                    <tr>
                        <th>product name</th>
                        <th>product quantity</th>
            
                        <th>prices</th>
            
                    </tr>
            
            
                    @foreach($order_product as $item)
            
                    <tr>
                        <td hidden name="pro_id">{{$item->product_id}}</td>
                        <td>{{$item->product_name}}</td>
                        <td>{{$item->order_quantity}}</td>
                        <td>{{$item->total_price}}</td>
                    </tr>
                    @endforeach
                </table>
            
                <h3>Total price : {{$total_price}} BDT</h3>
            
            
                {{--<a href="" class="btn btn-success">Confirm order</a>--}}
            
            
                {{----}}
            
            
                
                <form action="{{route('order.confirm')}}">
            
                    {{csrf_field()}}
                    <input style="display: none" type="text" name="us_id" value="{{Auth::user()->id}}">
                    <input style="display: none" type="text" name="tot_pr" value="{{$total_price}}">
                    <input style="display: none" type="text" name="us_add" value="{{Auth::user()->address}}">
                    <input style="display: none" type="text" name="us_ph" value="{{Auth::user()->phone_number}}">
            
            
                    {{--data-toggle="modal" data-target="#myModal"--}}
                    <input type="submit" class="btn btn-success hvr-wobble-top" value="Confirm order"
                           data-toggle="modal" data-target="#myModal">
            
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
            
                <br>
                <a href="{{route('order.delete',['id'=>Auth::user()->id])}}" class="btn btn-danger hvr-wobble-top">cancle order</a>
         
            
        
                    </div>
                </div>
            </div>
        
        
</div>
 </div>
    
      

</body>
</html>

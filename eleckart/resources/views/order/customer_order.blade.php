@extends('layouts.default')
@extends('layouts.design')

@section('title')
    orders list
@endsection

@section('content-for-other-page')



        
         <div class="container">
                {{-- {{dd($cust_order)}} --}}
            @if(count($cust_order) == 0)
            <div class="container">
                <h2 align="center" style="margin:200px 0px 0px 0px;font-size:35px">
                        Nothing from your account has been ordered yet
                </h2>
            </div>
            @elseif($cust_order)

            <h2>{{Auth::user()->name}}'s all orders</h2><br>

               
            <table class="table table-responsive">
                <tr>
                    <th>No.</th>
                    <th>Order token number</th>
                    <th>Order place</th>
                    <th>Total price</th>
                    <th>status</th>
                    <th>order details</th>
                    <th>ordered time</th>
                </tr>


                @foreach($cust_order as $order)
                    @php
                        $sl = $loop->index+1
                    @endphp

                    <tr>
                        <td>{{$sl}}</td>
                        @if($order->status == "shipping")
                            <td><p style="color:tomato">{{$order->token_number}}</p></td>
                        @elseif($oreder->status == "delivered")
                            <td><p style="color:green">{{$order->token_number}}</p></td>
                        @endif
                        <td>{{$order->recipient_address}}</td>
                        <td>{{$order->total_price}} BDT</td>
                        <td>{{$order->status}}</td>
                    <td><a href="{{route('order.customer.info',['token'=>$order->token_number])}}">order information</a></td>
                        <td>{{$order->created_at}}</td>
                    </tr>
                @endforeach
    </table>

 
        @endif
         </div>
 





@endsection


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
                <h2 align="center">orders not found</h2>
            </div>
            @elseif($cust_order)
                <div class="container">
    <table class="table table-responsive">
        <tr>
            <th>No.</th>
            <th>Order token number</th>
            <th>Order place</th>
            <th>Total price</th>
            <th>status</th>
            <th>ordered time</th>
        </tr>


        @foreach($cust_order as $order)
            @php
                $sl = $loop->index+1
            @endphp

        <tr>
            <td>{{$sl}}</td>
            <td>{{$order->token_number}}</td>
            <td>{{$order->recipient_address}}</td>
            <td>{{$order->total_price}}</td>
            <td>{{$order->status}}</td>
            <td>{{$order->created_at}}</td>
        </tr>
            @endforeach
    </table>
</div>
 
            @endif

    </div>




@endsection


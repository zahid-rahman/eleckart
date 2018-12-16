@extends('layouts.default')
@include('layouts.design')

@section('title')
    vendor dashboard
@endsection

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

@section('content-for-other-page')
  {{-- {{$check}} --}}

   @foreach($check as $validation)

    {{-- {{dd($validation)}} --}}
    
    @if($validation->approval == "ban" || $validation->approval == "pending")
        @include('vendor.wating')
    @elseif($validation->approval == "approve")    

    <div class="container">
            <div class="row">
                    <div class="col-sm-3">
                        <ul id="vendor-navigation" class="nav nav-piles">
                            <li><a class="btn btn-primary" href="{{route('vendor.dashboard',['name'=>Auth::user()->name])}}">Dashboard</a></li>
                            <li><a class="btn btn-primary" href="{{route('vendor.products')}}">Product</a></li>
                            <li><a class="btn btn-primary" href="{{route('vendor.profile.setting',['name'=>Auth::user()->id])}}">profile setting</a></li>
            
                        </ul>
                    </div>
            
                    <div class="col-sm-9">
            
            
                            <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <div class="container">
                                                <p id="sales_rev_title">Dasboard</p>
                                        </div>
                                    </div>
                                    <div class="panel-body">
            
                                            <div id="container">
                                                    <div class="row">

                                                           

                                                        <div class="col-sm-12">
                                                            <div class="jumbotron container" id="total_brand">
                                                                <h3>total brands</h3>
                                                                <p>{{$tot_a_b}}</p>
                                    
                                                            </div>
                                    
                                                            <div class="jumbotron container" id="total_proudct">
                                                                <h3>total Products</h3>
                                                                <p>{{$tot_p}}</p>
                                    
                                                            </div>
                                    
                                                            {{--<div class="jumbotron container" id="total_comp_order">--}}
                                                                {{--<h3>total complete orders</h3>--}}
                                                                {{--<p>0</p>--}}
                                    
                                                            {{--</div>--}}
                                    




                                                        </div>
                                                    </div>
                                                </div> 
            
                                    </div>
                            </div>
            
                      
                    </div>
            
                </div>
       </div>
    
    


    @endif
   @endforeach


 


@endsection
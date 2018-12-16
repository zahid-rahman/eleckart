@extends('layouts.default')
@extends('layouts.design')

@section('title')
    order information
@endsection

@section('content-for-other-page')



        <div class="container">
            
        <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <div class="container">
                        <h2>ordered product information</h2>
                    </div>
                </div>
                  <div class="panel-body">
                       
                        <table class="table table-responsive">
                                    <tr>
                                        <th>Sl</th>
                        
                                        <th>Product name</th>
                                        <th>Product price</th>
                                        <th>total product</th>
                                    </tr>
                        
                                    @foreach($orederd_product_info as $item)
                                    @php
                                      $sl = $loop->index+1;    
                                    @endphp
                                    <tr>
                                        <td>{{$sl}}</td>
                                        <td>{{$item->product_name}}</td>
                                        <td>{{$item->product_price}}</td>
                                    <td>{{$item->ordered_product_quantity}}</td>
                                    </tr>
                        
                                    @endforeach
                        
                                </table>
                            
                    </div>
                </div>
             </div>
        </div>

   
    

@endsection


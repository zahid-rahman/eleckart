@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Vendor ban
@endsection

@section('content-for-other-page')
    


    <div class="container">
            <div class="row">
                    <div class="col-sm-3">
                        <ul id="vendor-navigation" class="nav nav-piles">
                            <li><a class="btn btn-primary" href="{{route('admin')}}">Dashboard</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.vendor')}}">Vendors</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.order')}}">shipping order</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.orderdeliver')}}">delivered order</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.claimed.order')}}">claimed order</a></li>                               
                            <li><a class="btn btn-primary" href="{{route('admin.product')}}">product</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.customer')}}">customer</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.categories')}}">categories</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.brands')}}">brands</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.feedback')}}">feedback</a></li>

                        </ul>
                    </div>
            
                    <div class="col-sm-9">
                        <div id="container">
                                @foreach($data as $vendor_datas)
                                @if($vendor_datas->approval == "approve")
                                <div class="panel-group">
                                        <div class="panel panel-default">
                                         
                                            <div class="panel-body">

                                             
                                              <h2>{{$vendor_datas ->email}}</h2>
                                              <p color="red">wanna ban this vendor account ?</p>
                                                    {{ csrf_field() }}
                                                    <form action="{{route('admin.vendor.ban',['email'=>$vendor_datas->email])}}" method="post">
                                                        <button type="submit" class="btn btn-success">yes</button>
                                                    <input type="text" value="{{$vendor_datas->id}}" name="v_id" hidden>
                                                        <a href="{{route('admin.vendor')}}" class="btn btn-danger">no</a>    
                                                    </form> 

                      
                                             
                                            </div>
                                               
                                        </div>
                                        @elseif($vendor_datas->approval == "ban")    

                                        <div class="panel panel-default">
                                         
                                                <div class="panel-body">
    
                                                 
                                                  <h2>{{$vendor_datas ->email}}</h2>
                                                  <p color="red">wanna unban this vendor account ?</p>
    
                                                        <form action="{{route('admin.vendor.approve',['email'=>$vendor_datas->email])}}" method="post">
                                                            {{ csrf_field() }}
                                                    <input type="text" value="{{$vendor_datas->id}}" name="v_id" hidden>
                                                            
                                                            <button type="submit" class="btn btn-success">yes</button>
                                                            <a href="{{route('admin.vendor')}}" class="btn btn-danger">no</a>    
                                                        </form>
                                  
                                                 
                                                </div>
                                                   
                                            </div>

                                            @elseif($vendor_datas->approval == "pending") 
                                            <div class="panel panel-default">
                                         
                                                    <div class="panel-body">
        
                                                     
                                                      <h2>{{$vendor_datas ->email}}</h2>
                                                      <p color="red">wanna approve this vendor account ?</p>
        
                                                            <form action="{{route('admin.vendor.approve',['email'=>$vendor_datas->email])}}" method="post">
                                                                <input type="text" name="v_a_email" value="{{$vendor_datas ->email}}" hidden>
                                                                <button type="submit" class="btn btn-success">yes</button>
                                                                <a href="{{route('admin.vendor')}}" class="btn btn-danger">no</a>    
                                                            </form>
        
                          
                                                     
                                                    </div>
                                                       
                                                </div>
    

                                        @endif
            
                                @endforeach
            
                        </div>
            
                    </div>
            
                </div>
    </div>

  <script>
    // $('#myModalBan').removeData("modal").modal({backdrop: 'static', keyboard: false})
  </script>

   

@endsection




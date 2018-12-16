@extends('layouts.default')
{{--@include('layouts.design')--}}

@section('title')
    vendor dashboard
@endsection

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

@section('content-for-other-page')

    <div class="container">
        <div class="row">
            <div class="col-sm-3">
                <ul id="vendor-navigation" class="nav nav-piles">
                    <li><a class="btn btn-primary" href="{{route('vendor.dashboard',['name'=>Auth::user()->name])}}">Dashboard</a>
                    </li>
                    <li><a class="btn btn-primary" href="{{route('vendor.products')}}">Product</a></li>
                    <li><a class="btn btn-primary"
                           href="{{route('vendor.profile.setting',['name'=>Auth::user()->id])}}">profile setting</a>
                    </li>

                </ul>
            </div>

            <div class="col-sm-9">
                <div id="container">
                    <div class="panel-group">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <p id="product_title">Profile setting</p>
                            </div>
                            <div class="panel-body">


                                <div class="panel-group" id="accordion">
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a style="text-decoration: none" data-toggle="collapse" data-parent="#accordion" href="#collapse1">Company name change</a>
                                            </h4>
                                        </div>
                                        <div id="collapse1" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                @foreach($vendor_info as $info)
                                                    <form action="{{route('vendor.update.company_name',['id'=>$info->id])}}" method="post">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <label>Company name</label>
                                                            <input type="text" class="form-control" name="c_name"
                                                                   placeholder="Product name/Product title" value="{{$info->com_name}}" required>
                                                        </div>


                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"  value="update">
                                                        </div>


                                                    </form>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a style="text-decoration: none" data-toggle="collapse" data-parent="#accordion" href="#collapse4">Phone Number change</a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                @foreach($vendor_info as $info)
                                                    <form action="{{route('vendor.update.phone',['id'=>$info->id])}}" method="post">
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <label>Phone Number</label>
                                                            <input type="text" class="form-control" name="phone_number"
                                                                   placeholder="enter phone number" value="{{$info->phone_number}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"  value="update">
                                                        </div>


                                                    </form>
                                                @endforeach

                                            </div>
                                        </div>
                                    </div>
                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a style="text-decoration: none" data-toggle="collapse" data-parent="#accordion" href="#collapse2">Address change</a>
                                            </h4>
                                        </div>
                                        <div id="collapse2" class="panel-collapse collapse">
                                            <div class="panel-body">

                                                @foreach($vendor_info as $info)
                                                    <form action="{{route('vendor.update.address',['id'=>$info->id])}}" method="post" >
                                                        {{csrf_field()}}
                                                        <div class="form-group">
                                                            <label>Address</label>
                                                            <input type="text" class="form-control" name="address"
                                                                   placeholder="enter address" value="{{$info->address}}" required>
                                                        </div>

                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"  value="update">
                                                        </div>


                                                    </form>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>

                                    <div class="panel panel-default">
                                        <div class="panel-heading">
                                            <h4 class="panel-title">
                                                <a style="text-decoration: none" data-toggle="collapse" data-parent="#accordion" href="#collapse3">Password change</a>
                                            </h4>
                                        </div>
                                        <div id="collapse3" class="panel-collapse collapse">
                                            <div class="panel-body">

                                                @foreach($vendor_info as $info)
                                                    <form action="{{route('vendor.password.update',['id'=>$info->id])}}" method="post">
                                                        {{csrf_field()}}
                                                        {{--<div class="form-group">--}}
                                                            {{--<label>old password</label>--}}
                                                            {{--<input type="password" class="form-control" name="old_password"--}}
                                                                   {{--placeholder="old password" >--}}
                                                        {{--</div>--}}

                                                        {{--<p style="color:red">--}}
                                                            {{--@if($errors->any())--}}
                                                                {{--{{$errors->first('old_password')}}--}}
                                                            {{--@endif--}}

                                                        {{--</p>--}}




                                                        <div class="form-group">
                                                            <label>new password</label>
                                                            <input type="password" class="form-control" name="new_password"
                                                                   placeholder="new password" >
                                                        </div>

                                                        <p style="color:red">
                                                            @if($errors->any())
                                                                {{$errors->first('new_password')}}
                                                            @endif

                                                        </p>

                                                        <div class="form-group">
                                                            <label>Retype new password</label>
                                                            <input type="password" class="form-control" name="retype_new_password"
                                                                   placeholder=" retype new password" >
                                                        </div>


                                                        <p style="color:red">
                                                            @if($errors->any())
                                                                {{$errors->first('retype_new_password')}}
                                                            @endif

                                                        </p>


                                                        <div class="form-group">
                                                            <input type="submit" class="btn btn-primary"  value="update">
                                                        </div>

                                                    </form>
                                                @endforeach


                                            </div>
                                        </div>
                                    </div>
                                </div>


                                {{-------------------------}}


                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>



@endsection
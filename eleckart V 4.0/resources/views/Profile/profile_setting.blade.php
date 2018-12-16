@extends('layouts.default')
{{--@include('layouts.design')--}}

@section('title')
    Customer Profile Settings
@endsection

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

@section('content-for-other-page')

    <div class="container">
        <div class="row">
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
                                                <a style="text-decoration: none" data-toggle="collapse" data-parent="#accordion" href="#collapse4">Phone Number change</a>
                                            </h4>
                                        </div>
                                        <div id="collapse4" class="panel-collapse collapse">
                                            <div class="panel-body">
                                                @foreach($customer as $info)
                                                    <form action="{{route('customer_update_phone',['id'=>$info->id])}}" method="post">
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

                                                @foreach($customer as $info)
                                                    <form action="{{route('customer_update_address',['id'=>$info->id])}}" method="post" >
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

                                                @foreach($customer as $info)
                                                    <form action="{{route('customer_profile_password',['id'=>$info->id])}}" method="post">
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
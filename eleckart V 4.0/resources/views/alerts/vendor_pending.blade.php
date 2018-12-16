@extends('layouts.default')
@include('layouts.design')

@section('title')
    pending vendor account
@endsection

@section('content-for-other-page')

    <div class="container">
        <div class="alert alert-warning">

            <div class="container">
                <h2> <span class="glyphicon glyphicon-alert"></span> Pending!!</h2><br>
                <p> your account is now pending</p>
                <p>your account will be active after verification</p>
                <p>if you want to contact with us then click the following link    <a href="{{route('contact')}}">contact us</a></p>



            </div>

        </div>
    </div>
@endsection


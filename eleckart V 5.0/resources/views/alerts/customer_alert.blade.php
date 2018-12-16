@extends('layouts.default')
@include('layouts.design')

@section('title')
    alert customer
@endsection

@section('content-for-other-page')
    
<div class="container">
    <div class="alert alert-danger">
        
        <div class="container">
            <h2> <span class="glyphicon glyphicon-alert"></span> Warning!!</h2><br>
            <p>you'r account has been blocked for 7 days</p>
            <p>blockage reason</p>
            <ul>
                <li>Unusual behaviour</li>
                <li>Unauthorized product reviews</li>
                <li>Illigal activities</li>
            </ul>
            <p>if you want to contact with us then click the following link    <a href="{{route('contact')}}">contact us</a></p>
     
        
    
        </div>

    </div>
</div>
@endsection       


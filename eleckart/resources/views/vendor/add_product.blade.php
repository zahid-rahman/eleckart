@extends('layouts.default')
@include('layouts.design')

@section('title')
    create product
@endsection
{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

@section('content-for-other-page')
    <div class="container">
        <h3>Add Product</h3>
        <br>
        <br>
        <form>
            <div class="form-group">
                <label>Product name</label>
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Email">
            </div>
            <div class="form-group">
                <label>brand name</label>
                <select id="brand_names">
                    @for($i=0;$i<4;$i++)
                        <option value="volvo">Volvo</option>
                    @endfor
                </select>
            </div>

            <div class="form-group">
                <label for="exampleInputFile">File input</label>
                <input type="file" id="exampleInputFile">

            </div>

            <div class="form-group">
                <textarea class="content" name="example"></textarea>
            </div>


            <button type="submit" class="btn btn-default hvr-wobble-top">Submit</button>
        </form>
    </div>






@endsection
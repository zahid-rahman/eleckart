{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
  {{--<title>Bootstrap Example</title>--}}
  {{--<meta charset="utf-8">--}}
  {{--<meta name="viewport" content="width=device-width, initial-scale=1">--}}
  {{--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">--}}
  {{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>--}}
  {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>--}}
  {{--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>--}}
  {{--<link rel="stylesheet" href="css/style.css">--}}

{{--</head>--}}

{{--<body>--}}

@extends('layouts.default')
@include('layouts.design')


@section('content1')
    <div id="header1" align="center">

      <img src="image/bg-banner-01.jpg" alt="Snow">
       <span class="title">
          <h2 class="center" text-align="center">
            Accesories
          </h2>
          <p class="center" text-align="center">
            New Arrivals accesories Collection 2018
          </p>
        </span>

  </div>
  </br>

  <div class="container">
  			<div class="row">
  				<div class="col-sm-6 col-md-4 col-lg-3 p-b-50">
  					<div class="leftbar p-r-20 p-r-0-sm">
  						<!--  -->
  						<h4 class="m-text14 p-b-7">
  							Categories
  						</h4>

              <div class="row">
                  <div class="col-md-4" style="background-color:lavender;">
                    <a href="{{route('index')}}" class="s-text13 active1">
                      All
                    </a>
                  </div>
                </div>

                <div class="row">
                    <div class="col-md-4" style="background-color:lavenderblush;">
                      <a href="{{route('womenpage')}}" class="s-text13 active1">
                        Women
                      </a>
                    </div>
                  </div>
                  <div class="row">
                      <div class="col-md-4" style="background-color:lavender;">
                        <a href="{{route('menpage')}}" class="s-text13 active1">
                          Men
                        </a>
                      </div>
                    </div>

                    <div class="row">
                        <div class="col-md-4" style="background-color:lavenderblush;">
                          <a href="{{route('kidpage')}}" class="s-text13 active1">
                            Kids
                          </a>
                        </div>
                      </div>

                      <div class="row">
                          <div class="col-md-4" style="background-color:lavender;">
                            <a href="{{route('accesoriespage')}}" class="s-text13 active1">
                              Accesories
                            </a>
                          </div>
                        </div>

  						<div class="filter-price p-t-22 p-b-50 bo3">

  							<div class="wra-filter-bar">
  								<div id="filter-bar" class="noUi-target noUi-ltr noUi-horizontal"><div class="noUi-base"><div class="noUi-origin" style="left: 0%;"><div class="noUi-handle noUi-handle-lower" data-handle="0" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="0.0" aria-valuetext="50.00" style="z-index: 5;"></div></div><div class="noUi-connect" style="left: 0%; right: 0%;"></div><div class="noUi-origin" style="left: 100%;"><div class="noUi-handle noUi-handle-upper" data-handle="1" tabindex="0" role="slider" aria-orientation="horizontal" aria-valuemin="0.0" aria-valuemax="100.0" aria-valuenow="100.0" aria-valuetext="200.00" style="z-index: 4;"></div></div></div></div>
  							</div>

  							<div class="flex-sb-m flex-w p-t-16">
                  <div class="w-size11">

  								</div>
  							</div>
  						</div>

              <div class="search-product pos-relative bo4 of-hidden">
  						</div>
  					</div>
  				</div>

  				<div class="col-sm-6 col-md-8 col-lg-9 p-b-50">
  					<!--  -->
            <div class="flex-sb-m flex-w p-b-35">
  						<div class="flex-w">
  							<div class="rs2-select2 bo4 of-hidden w-size12 m-t-5 m-b-5 m-r-10">
                  <div class="row">
                      <div class="col-sm-3">
                      <div class="dropdown">
                        <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                            Default Sorting
                        </button>
                        <div class="dropdown-menu">
                          <a class="dropdown-item" href="#">  Default Sorting</a>
                          <a class="dropdown-item" href="#">Popularity</a>
                          <a class="dropdown-item" href="#">Price: low to high</a>
                          <a class="dropdown-item" href="#">Price: high to low</a>
                          </div>
                        </div>
                      </div>

            <div class="col-sm-3">
              <div class="dropdown">
                <button type="button" class="btn btn-default btn-lg dropdown-toggle" data-toggle="dropdown">
                    Price
                </button>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#"> $0.00 - $50.00</a>
                  <a class="dropdown-item" href="#">$50.00 - $100.00</a>
                  <a class="dropdown-item" href="#">$100.00 - $150.00</a>
                  <a class="dropdown-item" href="#">$150.00 - $200.00</a>
                  <a class="dropdown-item" href="#">$200.00+</a>

                  </div>
                </div>
              </div>
  					 </div>
           </div>
  			</div>
      </br>

  					<!-- Product -->
  					<div class="row">
  						<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">
  							<!-- Block2 -->
  							<div class="block2">
  								<div class="block2-img wrap-pic-w of-hidden pos-relative block2-labelnew">
  									<img src="image/it3.png" alt="IMG-PRODUCT">

  									<div class="block2-overlay trans-0-4">
  										<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">
  											<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>
  											<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>
  										</a>

  										<div class="block2-btn-addcart w-size1 trans-0-4">
  											<!-- Button -->
  											<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">
  												Add to Cart
  											</button>
  										</div>
  									</div>
  								</div>

  								<div class="block2-txt p-t-20">
  									<a href="product-detail.html" class="block2-name dis-block s-text3 p-b-5">
  										Herschel supply co 25l
  									</a>

  									<span class="block2-price m-text6 p-r-5">
  										$75.00
  									</span>
  								</div>
  							</div>
  						</div>
  				</div>
  			</div>
  		</div>

@endsection
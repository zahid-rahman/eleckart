@extends('layouts.default')
@include('layouts.design')

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
    {{--<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>--}}
    {{--<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>--}}
    {{--<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>--}}
@endsection

{{--page title--}}
@section('title')
    product name
@endsection

@section('content1')




    <div class="product_details_section">
        <div class="row">
            <div class="col-sm-6">
                <div class="product_image">


                    <div class="exzoom" id="exzoom">
                        <!-- Images -->
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>

                                @foreach($product_img as $pics)
                                    <li><img style="background: #ffffff;" src="{{$pics->product_image}}"/></li>
                                @endforeach

                            </ul>
                        </div>
                        <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                        <div class="exzoom_nav"></div>
                        <!-- Nav Buttons -->
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>

                    {{--<p id="simple_title"><strong>Details</strong></p>--}}
                    {{--@foreach($product_details as $details)--}}
                        {{--<p id="description" style="margin-bottom:100px"> {{$details->product_details}}</p>--}}
                    {{--@endforeach--}}
                </div>
                {{--product details--}}



            </div>


                {{--<div class="product_details" style="border:1px solid black;">--}}
                    {{--@foreach($product_details as $details)--}}
                        {{--<p id="description"> {{$details->product_details}}</p>--}}
                    {{--@endforeach--}}
                {{--</div>--}}



            <div class="col-sm-6">

               @foreach($product_details as $details)

               <p hidden>
                    {{ $mostviewed = count(DB::table('mostvieweds')->where('product_id',$details->product_id)->get())  }}

            </p>

            @if($mostviewed == 0 )

                    <p hidden>
                            {{ DB::table('mostvieweds')->insert(
                                ['product_id' => $details->product_id, 'counter' => 0]
                            )
                        }}

                    </p>


                    @else


                    @endif


                <div class="product_details">
                    {{--<h2><strong>Product name</strong></h2>--}}
                    {{--<h4>brand name</h4>--}}
                    {{--{{$product_details}}--}}

                    {{--<hr>--}}

                    {{--<h5>price : 0.00 BDT</h5>--}}
                    {{--<h5>discount : 0%</h5>--}}
                    {{--<p id="simple_title"><strong>Details</strong></p>--}}
                    {{--<p id="description">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>--}}

                    <h2><strong>{{$details->product_name}}</strong></h2>
                    <h4 id="brand_name">{{$details->brand_name}}</h4>

                    <hr>

                    <p hidden>
                        {{DB::table('products')->where( 'product_id','=',$details->product_id)->update(
                               ['product_avg_rating' => $avg]
                            )
                    }}

                    </p>
                    {{--{{dd($avg)}}--}}
                    @for($i = 0; $i < 5; $i++)

                        @if($avg != 0)
                            <span  class="fa fa-star signed" ></span>
                            <p hidden>

                                {{$avg = $avg - 1}}
                            </p>

                        @else
                            <span  class="fa fa-star" ></span>

                        @endif

                    @endfor






                    <h5>price : {{$details->product_price}} BDT</h5>
                    <h5>discount : 0%</h5>
                    <span style="color :grey" class="glyphicon glyphicon-eye-open"></span> {{$p_counter}}
                    <p style="visibility: hidden" id="simple_title"><strong>Details</strong></p>
                    {{--<p id="description"> {{$details->product_details}}</p>--}}

                    @if(Auth::check() && Auth::user()->role == "user")


                        <form action="{{route('cart.add')}}">

                            {{csrf_field()}}

                            <div class="form-group">
                                <input style="display: none" name="u_id" value="{{Auth::user()->id}}" hidden>

                            </div>
                            <div class="form-group">
                                <input style="display: none" name="p_id" value="{{$details->product_id}}" hidden>
                            </div>
                            <div class="form-group">
                                {{-- editor --}}
                                <input style="display: none" name="t_price" value="{{$details->product_price}}" hidden>
                            </div>

                            <input type="submit" class="btn btn-success hvr-wobble-top" value="add to cart">

                        </form>


                        {{--@endif--}}


                    @else
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success hvr-wobble-top" data-toggle="modal" data-target="#myModal">
                            add to cart
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title"><b>Alert</b></h4>
                                    </div>
                                    <div class="modal-body">
                                        <p style="color:#ff484a"><b>user Log in required</b></p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>

                                </div>
                            </div>
                        </div>

                    @endif


                    {{--rating and review--}}


                   @endforeach


                </div>


            </div>
        </div>

        <div class="container">

            <div class="col-sm-6">

                <p id="simple_title"><strong>Details</strong></p>
                @foreach($product_details as $details)
                    <p id="description" style="margin-bottom:100px"> {{$details->product_details}}</p>
                @endforeach
            </div>

        </div>


        <div class="container">

            <h3>Rating</h3>

            <span  class="fa fa-star checked star" onmouseover="starmark(this)" onclick="starmark(this)" id="1one"></span>

            <span  class="fa fa-star checked star" onmouseover="starmark(this)" onclick="starmark(this)" id="2one"></span>

            <span class="fa fa-star checked star" onmouseover="starmark(this)" onclick="starmark(this)" id="3one"></span>

            <span  class="fa fa-star checked star" onmouseover="starmark(this)" onclick="starmark(this)" id="4one"></span>

            <span class="fa fa-star checked star" onmouseover="starmark(this)" onclick="starmark(this)" id="5one"></span>

            <br/><br/>

             <div class="form-group">

                 @foreach($product_details as $item)

                     {{--{{dd(Auth::)}}--}}




                 @if(Auth::check() && Auth::user()->role == "user")




                     <form action="{{route('review.rating')}}" method="post">

                         {{csrf_field()}}

                         <input type="text" name="user_rating" id="result" hidden>
                         <input type="text" name="user_id"  value="{{Auth::user()->id}}" hidden>
                         <input type="text" name="product_id"  value="{{$item->product_id}}" hidden>
                         <textarea class=" form-control" cols="10" rows="5" name="user_review" id="user_review" placeholder="Enter comment"></textarea>
                         <br>
                         <button onclick="showRating();check_for_alert()" class="btn btn-success">submit</button>

                         <br>
                         <br>
                         <br>
                         <div class="alert alert-danger" id="alert_box" style="visibility: hidden;">Submit both review and rating</div>

                         <script>
                             function check_for_alert() {

                                 var rating_value = document.getElementById("result").value;
                                 var review_value = document.getElementById("user_review").value;
                                // alert(rating_value);
                                // alert(review_value);

                                 if (rating_value == 0 && review_value == "") {
                                     document.getElementById("alert_box").style.visibility = "visible";
                                 }
                             }
                         </script>

                     </form>
                     @else
                         <form >



                             <input type="text" name="user_rating" id="result" hidden>
                             <input type="text" name="user_id"   hidden>
                             <input type="text" name="product_id"  hidden>
                             <br>
                             <textarea class=" form-control" cols="10" rows="5" name="user_review" placeholder="Enter comment" required></textarea>

                             <br>

                             <button type="button" class="btn btn-success hvr-wobble-top" data-toggle="modal" data-target="#myModalrev">
                                 submit
                             </button>

                             <div class="modal fade" id="myModalrev" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                 <div class="modal-dialog" role="document">
                                     <div class="modal-content">

                                         <div class="modal-header">
                                             <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                             <h4 class="modal-title"><b>Alert</b></h4>
                                         </div>
                                         <div class="modal-body">
                                             <p style="color:#ff484a"><b>user Log in required</b></p>
                                         </div>
                                         <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                         </div>

                                     </div>
                                 </div>
                             </div>



                         </form>
                    @endif

                 @endforeach

                 {{--for rating visibility--}}

             </div>


            <br/> <br/>





            <h3>Comments & Reviews</h3>
            <br>

             <div class="col-sm-6">

                 @foreach($ratingreview as $value)
                 <div class="panel panel-default">
                     <div class="panel-heading"> <h4 style="color:cadetblue"><strong>{{$value->name}}</strong></h4></div>

                     <div class="panel-body">


                         <b>Rating :</b>
                         @for($i = 0; $i < 5; $i++)
                             @if($value->rating_number != 0)
                            <span  class="fa fa-star signed" ></span>
                                <p hidden>

                                    {{$value->rating_number = $value->rating_number - 1}}
                                </p>

                                 @else
                                 <span  class="fa fa-star" ></span>

                             @endif

                         @endfor

                         {{--<span  class="fa fa-star"  ></span>--}}

                         {{--<span class="fa fa-star" ></span>--}}

                         {{--<span  class="fa fa-star"  ></span>--}}

                         {{--<span class="fa fa-star" ></span>--}}


                         <br>
                         <b>Review :</b>
                         {{$value->review}}


                     </div>


                 </div>

                 @endforeach

             </div>
             <div class="col-sm-3"></div>
             <div class="col-sm-3"></div>




        </div>





    </div>



    {{--<script>--}}
        {{--$(function () {--}}

            {{--$("#exzoom").exzoom({--}}
                {{--// options here--}}
                {{--"autoPlay": false--}}

            {{--});--}}

        {{--});--}}
    {{--</script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
    {{--<script src="../js/jquery.exzoom.js"></script>--}}

    <script>
        var rating = 0;

        function starmark(item) {
            var count = item.id[0];
            rating = count;
            var subid= item.id.substring(1);

            for(var i = 0; i < 5; i++) {
                if(i < count) {
                    document.getElementById((i+1)+subid).style.color="orange";
                }

                else {
                    document.getElementById((i+1)+subid).style.color="black";
                }
            }
        }

        function showRating() {
            document.getElementById("result").value = rating;
        }
    </script>
@endsection

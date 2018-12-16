@extends('layouts.default')
@include('layouts.design')
{{--page title--}}
@section('title')
    cart
@endsection

@section('content-for-other-page')

 <div class="container">
        <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      <div class="container">
                            <h1>Cart</h1>
                      </div>
                  </div>
                  <div class="panel-body">
                        {{--<div class="container">--}}
                
        
                                <table class="table table-responsive">
                        
                                    <tr>
                                        <th>Product</th>
                                        <th style="text-align: center">change Quantity</th>
                                        <th>total quantity</th>
                                        <th>Price(BDT)</th>
                                        <th>Discount</th>
                        
                                        <th>remove</th>
                        
                                    </tr>
                        
                        
                                    @foreach($cart_value as $cart_item)
                                        <tr>
                                            <td>{{$cart_item->product_name}}</td>
                                            <td align="center">
                                                {{--@include('cart.add')--}}
                                                    <form action="{{route('cart.update')}}" method="post">
                                                        {{csrf_field()}}
                        
                                                        <div class="amount_container" serial="1">

                                                            <input type="text" name="p_id" value="{{$cart_item->product_id}}" hidden>

                                                            <button class="plus" role="incrementer">+</button>
                                                            <input class="quantity" id="p_qun" name="pro_qun" type="text" role="amount" value="{{$cart_item->order_quantity}}" readonly/>
                                                            <button  class="minus" role="decrementer">-</button>

                                                            @if($cart_item->discount == 0)
                                                            <input type="text" name="price" value="{{$cart_item->product_price}}" hidden>
                                                            @elseif($cart_item->discount > 0)
                                                                <input type="text" name="price" value="{{$cart_item->discount_product_price}}" hidden>

                                                            @endif
                                                            <input type="text" name="pro_id" value="{{$cart_item->product_id}}" hidden>
                                                            <input type="submit" class="hvr-wobble-top" id="price_update" value="update">
                                                        </div>
                                                        {{-- <input type="number" name="pro_qun" min="1" value="1" id="max_min_qun"> --}}

                                            
                                                    </form>




                                            </td>
                        
                                            <td>
                                                {{$cart_item->order_quantity}}
                                            </td>
                                            <td class="pro_price">{{$cart_item->total_price}}</td>
                        
                                            <td>{{$cart_item->discount}} %</td>
                        
                        
                                            <td>
                        
                                                <form action="{{route('delete.single.cart')}}">
                                                    {{csrf_field()}}
                                                    <input style="display: none" name="ct_id" value="{{$cart_item->cart_id}}">
                                                    <input style="display: none" name="pr_id" value="{{$cart_item->product_id}}">
                                                    <button type="submit" class="btn btn-default glyphicon glyphicon-trash"></button>
                        
                                                </form>
                        
                                                {{--<a href="{{route('delete.single.cart',}}" ></a>--}}
                                            </td>
                                        </tr>
                        
                                    @endforeach
                        
                                </table>

                      @if(Session::has('message'))
                          <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                      @endif

                                <hr>
                        
                                <div class="row">
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4"></div>
                                    <div class="col-sm-4" id="billing_section">
                                        <h2>Total: {{$total_price}} BDT</h2>
                        
                                        @if($total_price != 0)
                        
                                            {{--</form>--}}
                                            @php
                                                $id = Auth::user()->id;
                        
                                            @endphp
                        
                        
                                            <a href="{{route('order.detials',['id'=>$id])}}" class="btn btn-success hvr-wobble-top">Procud to
                                                Checkout</a>
                        
                                        @else
                        
                                        <!-- Button trigger modal -->
                        
                                            <button type="button" class="btn btn-success hvr-wobble-top" data-toggle="modal"
                                                    data-target="#myModal">
                                                Procud to Checkout
                                            </button>
                        
                        
                                            <!-- Modal -->
                                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                        
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                                                        aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title"><b>Alert</b></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <p style="color:#ff484a"><b>your cart is empty</b></p>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                        
                                                    </div>
                                                </div>
                                            </div>
                        
                                        @endif
                        
                                        {{--<a href="" class="btn btn-success hvr-wobble-top">Proceed to Checkout</a>--}}
                        
                        
                                        <a href="{{route('delete.cart')}}" class="btn btn-danger hvr-wobble-top">clear the cart</a>
                                    </div>
                                </div>
                            {{--</div>--}}
                                    
                    </div>
          
                </div>
            </div>
        
 </div>
    
    <script>
        var count = 1;
        document.getElementById("p1").value = count;
        document.getElementById("decr").disabled = true;

        function increment() {
            count++;
            if (count >= 1) {
                document.getElementById("decr").disabled = false;
            }
            document.getElementById("p1").value = count;
        }

        function decrement() {
            --count;
            if (count <= 1) {
                document.getElementById("decr").disabled = true;
            }

            document.getElementById("p1").value = count;
        }

        function order_alert() {
            alert('hello');
        }

    </script>

    <script>
        $(window).on("load", function () {

            //  $decrementerBtn.prop('disabled', true);

            $("[role='incrementer']").click(function (evt) {
                evt.preventDefault();

                $incrementerBtn = $(this);
                $amountBox = $incrementerBtn.siblings("[role='amount']");
                //$price = $incrementerBtn.siblings("[role='pro_price']");
                $newVal = parseInt($amountBox.val()) + 1;


                {{--$.ajax({--}}
                {{--url:"{{url('/cart')}}",--}}
                {{--method:"GET",--}}
                {{--data:{--}}
                {{--newval : cat_id,--}}
                {{--qty: qty--}}
                {{--},--}}
                {{--success: function( data ) {--}}
                {{--// console.log(data);--}}
                {{--}--}}
                {{--});--}}


                $amountBox.val($newVal);

                $decrementerBtn = $incrementerBtn.siblings("[role='decrementer']");

                if ($newVal >= 1) {
                    $decrementerBtn.prop('disabled', false);
                }
            });

            $("[role='decrementer']").click(function (evt) {
                evt.preventDefault();

                $decrementerBtn = $(this);

                $amountBox = $decrementerBtn.siblings("[role='amount']");
                $newVal = parseInt($amountBox.val()) - 1;
                $amountBox.val($newVal);

                if ($newVal <= 1) {
                    $decrementerBtn.prop('disabled', true);
                }
            });


            $price = $(".pro_price").val()
            console.log($newVal);


        });


    </script>




@endsection
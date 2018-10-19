@extends('layouts.default')
@include('layouts.design')

@section('title')
    vendor dashboard
@endsection

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

@section('content-for-other-page')

    <div class="row">
        <div class="col-sm-3">
            <ul id="vendor-navigation" class="nav nav-piles">
                <li><a class="btn btn-success" href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                <li><a class="btn btn-success" href="{{route('vendor.products')}}">Product</a></li>
                <li><a class="btn btn-success" href="{{route('vendor.brands')}}">Brands</a></li>

            </ul>
        </div>

        <div class="col-sm-9">
            <div id="container">
                <div class="row">
                    <div class="col-sm-6">
                        <p id="sales_rev_title">Sales revenue</p>
                        <div class="chart">

                            <div id="piechart"></div>
                            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                            <script type="text/javascript">
                                // Load google charts
                                google.charts.load('current', {'packages': ['corechart']});
                                google.charts.setOnLoadCallback(drawChart);

                                // Draw the chart and set the chart values
                                function drawChart() {
                                    var data = google.visualization.arrayToDataTable([
                                        ['Task', 'revenue per month'],
                                        ['category 1', 100],
                                        ['category 2', 200],
                                        ['category 3', 400],
                                        ['category 4', 200],
                                        ['category 5', 800],
                                        ['category 5', 200]
                                    ]);

                                    // Optional; add a title and set the width and height of the chart
                                    var options = {'width': 550, 'height': 400};

                                    // Display the chart inside the <div> element with id="piechart"
                                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                                    chart.draw(data, options);
                                }
                            </script>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="jumbotron container" id="total_brands">
                            <h3>total brands</h3>
                            <p>0</p>

                        </div>

                        <div class="jumbotron container" id="total_proudcts">
                            <h3>total Products</h3>
                            <p>0</p>

                        </div>

                        {{--<div class="jumbotron container" id="total_comp_order">--}}
                            {{--<h3>total complete orders</h3>--}}
                            {{--<p>0</p>--}}

                        {{--</div>--}}

                        <div class="jumbotron container" id="total_revr">
                            <h3>total revenue</h3>
                            <p>0 BDT</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>




@endsection
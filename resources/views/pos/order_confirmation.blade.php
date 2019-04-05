@extends('layouts.app')

@section('title')
@endsection



@section('content')
    <div class="content-page">
        <!-- Start content -->
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <!-- <div class="panel-heading">
                                <h4>Invoice</h4>
                            </div> -->
                            <div class="panel-body">
                                <div class="clearfix">
                                 <div class="pull-right">
                                        <h4>Order Date # <br>
                                            <strong>{{$order->order_date}}</strong>
                                        </h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-md-12">

                                        <div class="pull-left m-t-30">
                                            <address>
                                                <strong>Name: {{ $order->name }}</strong><br>
                                                <strong>Shop Name: {{ $order->shopname }}<br></strong>
                                                Address: {{ $order->address }}<br>
                                                City: {{ $order->city }}<br>
                                                Phone: {{ $order->phone }}
                                            </address>
                                        </div>
                                        <div class="pull-right m-t-30">
                                            <p><strong>Today Date: </strong> {{date("l jS \of F Y ") }}</p>
                                            <p class="m-t-10"><strong>Order Status: </strong> <span class="label label-pink">Pending</span></p>

                                            <p class="m-t-10"><strong>Order ID:</strong>{{ $order->id }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="m-h-50"></div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="table-responsive">
                                            <table class="table m-t-30">
                                                <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Product name</th>
                                                    <th>Product Code</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total</th>
                                                </tr></thead>
                                                <tbody>
                                                @php
                                                    $key=1
                                                @endphp
                                                @foreach($order_details as $cont)
                                                    <tr>
                                                        <td>{{$key++}}</td>
                                                        <td>{{ $cont->product_name }}</td>
                                                        <td>{{ $cont->product_code }}</td>
                                                        <td>{{ $cont->quantity }}</td>
                                                        <td>{{ $cont->unitcost }}</td>
                                                        <td>{{ $cont->unitcost*$cont->quantity }}</td>

                                                    </tr>
                                                @endforeach

                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            <div class="row" style="border-radius: 0px;">

                                        <div class="col-md-3 col-md-9">
                                            <h4 class="">Payment: {{ $order->payment_status  }}</h4>
                                            <h4 class="">Pay:{{  $order->pay }}</h4>
                                            <h4 class="">Due:{{ $order->due }}</h4>
                                        </div>

                                    <div class="col-md-3 col-md-offset-9">
                                        <p class="text-right"><b>Sub-total:</b> {{ $order->sub_total  }}</p>
                                        <p class="text-right">VAT{{  $order->vat }}</p>
                                        <hr>
                                        <h3 class="text-right">Total: {{ $order->total }}</h3>
                                    </div>
                                </div>
                                <hr>
                                @if($order->order_status =='success')

                                    @else
                                    <div class="hidden-print">
                                        <div class="pull-right">
                                            <a href="#" onclick="window.print()" class="btn btn-inverse waves-effect waves-light"><i class="fa fa-print"></i></a>
                                            <a href="{{route('order_done',$order->id)}}" class="btn btn-primary waves-effect waves-light">Done</a>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                    </div>

                </div>


@endsection

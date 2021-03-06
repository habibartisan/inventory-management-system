@extends('layouts.app')

@section('title')
@endsection



@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                        <ol class="breadcrumb pull-right">
                            <li><a href="#">Echobvel</a></li>
                            <li class="active">IT</li>
                        </ol>
                    </div>
                </div>

                <!-- Start Widget -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Pending :: Product</h3>


                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#Id</th>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Quantity</th>
                                                <th>Total Amunt</th>
                                                <th>Payment</th>
                                                <th>Order Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product as $key=>$row)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->order_date }}</td>
                                                    <td>{{ $row->total_products }}</td>
                                                    <td>{{ $row->total }}</td>
                                                    <td>{{ $row->payment_status }}</td>
                                                    <td><span class="badge badge-danger"> {{ $row->order_status }}</span></td>
                                                    <td>
                                                        <a href="{{ route('view-pending-sig',$row->id) }}" class="btn btn-sm btn-primary">View</a>
                                                        <a href="{{--{{ route('delete-product',$row->id) }}--}}" class="btn btn-sm btn-danger" id="delete">Delete</a>

                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
@endsection


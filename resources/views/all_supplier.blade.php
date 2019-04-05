@extends('layouts.app')

@section('content')
    <div class="content-page">
        <div class="content">
            <div class="container">
                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <h4 class="pull-left page-title">Welcome !</h4>
                    </div>
                </div>



                <!-- Horizontal form -->


                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Employees</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>Image</th>
                                                <th>Salary</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($supplier as $key=>$row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td>{{ $row->phone }}</td>
                                                    <td>{{ $row->address }}</td>
                                                    <td><img src="{{ $row->photo }}" style="height: 60px; width: 60px;"></td>
                                                    <td>{{ $row->salary }}</td>
                                                    <td>
                                                        <a href="{{ route('edit-supplier',$row->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                        <a href="{{ route('delete-supplier',$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                        <a href="{{ route('view-supplier', $row->id) }}" class="btn btn-sm btn-primary">View</a>
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

            </div> <!-- End row -->




        </div>
    </div>
@endsection

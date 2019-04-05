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



                <div class="row">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title">All Customers</h3>
                            </div>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table id="datatable" class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Phone</th>
                                                <th>Address</th>
                                                <th>E-mail</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>


                                            <tbody>
                                            @foreach($companyinf as $key=>$row)
                                                <tr>
                                                    <td>{{ $row->company_name }}</td>
                                                    <td>{{ $row->company_phone }}</td>
                                                    <td>{{ $row->company_address }}</td>
                                                    <td>{{ $row->company_email }}</td>
                                                    <td>
                                                        <a href="{{ route('delete-customer',$row->id) }}" class="btn btn-sm btn-danger" id="delete">Delete</a>
                                                        <a href="{{ route('view-customer', $row->id) }}" class="btn btn-sm btn-primary">View</a>
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
    </div>

    <script type="text/javascript">
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#image')
                        .attr('src', e.target.result)
                        .width(80)
                        .height(80);
                };
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>

@endsection

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
                <div class="col-md-8" style="margin-left: 150px">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="panel-title">Show Company Information</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_name" class="form-control" id="inputEmail3" value="{{$view->company_name}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company E-mail</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="company_email" class="form-control" id="inputEmail3" value="{{$view->company_email}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Phone</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="company_phone" class="form-control" id="inputEmail3" value="{{$view->company_phone}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_address" class="form-control" id="inputEmail3" value="{{$view->company_address}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_mobile" class="form-control" id="inputEmail3" value="{{$view->company_mobile}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_city" class="form-control" id="inputEmail3" value="{{$view->company_city}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_country" class="form-control" id="inputEmail3" value="{{$view->company_country}}" disabled>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Zipcode</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="company_zipcode" class="form-control" id="inputEmail3" value="{{$view->company_zipcode}}" disabled>
                                    </div>
                                </div>
                        </div> <!-- panel-body -->
                    </div> <!-- panel -->
                </div> <!-- col -->

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

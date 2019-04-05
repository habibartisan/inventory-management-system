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
                        <div class="panel-heading"><h3 class="panel-title">Add Company Information</h3>
                        </div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="{{route('insert.setting')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_name" class="form-control" id="inputEmail3" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company E-mail</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="company_email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Phone</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="company_phone" class="form-control" id="inputEmail3" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_address" class="form-control" id="inputEmail3" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Mobile</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_mobile" class="form-control" id="inputEmail3" placeholder="Mobile">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_city" class="form-control" id="inputEmail3" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Country</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="company_country" class="form-control" id="inputEmail3" placeholder="Country">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Company Zipcode</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="company_zipcode" class="form-control" id="inputEmail3" placeholder="Zipcode">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Show photo</label>
                                    <div class="col-sm-9">
                                        <img id="image" src="#"  style="margin-left:10px"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Company Logo</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="company_logo" class="form-control" accept="image/*"  required onchange="readURL(this);">
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Submit</button>
                                    </div>
                                </div>
                            </form>
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

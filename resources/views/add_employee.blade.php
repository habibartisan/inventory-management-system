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
                        <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="{{route('insert.employee')}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control" id="inputEmail3" placeholder="Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">E-mail</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" class="form-control" id="inputEmail3" placeholder="Phone">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" class="form-control" id="inputEmail3" placeholder="Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Experience</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="experience" class="form-control" id="inputEmail3" placeholder="Experience">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nid_no</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="nid_no" class="form-control" id="inputEmail3" placeholder="Nid_no">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Salary</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="salary" class="form-control" id="inputEmail3" placeholder="Salary">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Vacation</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="vacation" class="form-control" id="inputEmail3" placeholder="Vacation">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="city" class="form-control" id="inputEmail3" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Show photo</label>
                                    <div class="col-sm-9">
                                        <img id="image" src="#"  style="margin-left:10px"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Photo</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="photo" class="form-control" accept="image/*"  required onchange="readURL(this);">
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

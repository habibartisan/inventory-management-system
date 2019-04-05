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
                    </div>
                </div>



                <!-- Horizontal form -->
                <div class="col-md-8" style="margin-left: 150px">
                    <div class="panel panel-info">
                        <div class="panel-heading"><h3 class="panel-title">Add Supplier</h3></div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="{{route('insert.supplier')}}" method="post" enctype="multipart/form-data">
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
                                    <label for="inputEmail3" class="col-sm-3 control-label">Shop</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="shop" class="form-control" id="inputEmail3" placeholder="shop">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Account Holder</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="accountholder" class="form-control" id="inputEmail3" placeholder="Account Holder">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Account Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="accountnumber" class="form-control" id="inputEmail3" placeholder="Account Number">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Bank Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bankname" class="form-control" id="inputEmail3" placeholder="bank Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Branch Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="branchname" class="form-control" id="inputEmail3" placeholder="Branch Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="city" class="form-control" id="inputEmail3" placeholder="City">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Supplier Type</label>
                                    <div class="col-sm-9">
                                        <select name="type" id="" class="form-control">
                                            <option value="1">Distributor</option>
                                            <option value="2">Whole Seller</option>
                                            <option value="3">Broch</option>
                                        </select>
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
                                        <button type="submit" class="btn btn-info waves-effect waves-light">Sign in</button>
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

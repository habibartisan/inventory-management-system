@extends('layouts.app')

@section('title')
@endsection

@push('css')
@endpush



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
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Update Supplier Information</h3></div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="panel-body">
                            <form class="form-horizontal" role="form" action="{{route('update.supplier',$edit->id)}}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" value="{{ $edit->name }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">E-mail</label>
                                    <div class="col-sm-9">
                                        <input type="email" name="email" value="{{ $edit->email }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="phone" value="{{ $edit->phone }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="address" value="{{ $edit->address }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Shop</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="shop" value="{{ $edit->shop }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Account Holder</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="accountholder" value="{{ $edit->accountholder }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Account Number</label>
                                    <div class="col-sm-9">
                                        <input type="number" name="accountnumber" value="{{ $edit->accountnumber }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Bank Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="bankname" value="{{ $edit->bankname }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Branch Name</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="branchname" value="{{ $edit->branchname }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="city" value="{{ $edit->city }}" class="form-control" id="inputEmail3">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Supplier Type</label>
                                    <div class="col-sm-9">
                                        <select name="type" value="{{ $edit->type }}"  id="" class="form-control">
                                            <option value="1">Distributor</option>
                                            <option value="2">Whole Seller</option>
                                            <option value="3">Broch</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Show New photo</label>
                                    <div class="col-sm-9">
                                        <img id="image" src="#"  style="margin-left:10px"/>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-sm-3 control-label">New Photo</label>
                                    <div class="col-sm-9">
                                        <input type="file" name="photo" class="form-control" accept="image/*"  required onchange="readURL(this);">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-sm-3 control-label">Old Photo</label>
                                    <div class="col-sm-9">
                                        <img src="{{ url($edit->photo) }}" name="oldphoto" style="height: 80px; width: 80px;">
                                    </div>
                                </div>
                                <div class="form-group m-b-0">
                                    <div class="col-sm-offset-3 col-sm-9">
                                        <button type="submit" class="btn btn-purple waves-effect waves-light">Update</button>
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

@section('subcontent')
@endsection

@push('js')
@endpush
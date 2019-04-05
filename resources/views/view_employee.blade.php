@extends('layouts.app')

@section('title')
@endsection

@push('css')
@endpush



@section('content')

    <div class="content-page">
        <div class="content">
            <div class="container">

                <!-- Horizontal form -->
                <div class="col-md-8" style="margin-left: 150px">
                    <div class="panel panel-default">
                        <div class="panel-heading"><h3 class="panel-title">Add Employee</h3></div>
                        <div class="panel-body">
                            <form class="form-horizontal" role="form">
                                <img src="{{ url($singledata->photo) }}" style="height: 100px; width: 100px; margin-left: 250px; margin-bottom:15px ;">

                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Name</label>
                                    <div class="col-sm-9">
                                        <input  value="{{ $singledata->name }}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">E-mail</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->email}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Phone</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->phone}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Address</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->address}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Axperience</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->experience}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Nid_no</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->nid_no}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Salary</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->salary}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">Vacation</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->vacation}}" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail3" class="col-sm-3 control-label">City</label>
                                    <div class="col-sm-9">
                                        <input  value="{{$singledata->	city}}" class="form-control" readonly>
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
@endsection



@push('js')
@endpush
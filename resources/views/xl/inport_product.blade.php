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

                <!-- Start Widget -->
                <div class="row">
                    <!-- Basic example -->
                    <div class="col-md-2"></div>
                    <div class="col-md-8 ">
                        <div class="panel panel-info">
                            <div class="panel-heading">
                                <a href="{{ route('export_route') }}" class="pull-right btn btn-danger btn-sm">Download Xlsx</a>
                                <h3 class="panel-title pull-laft  text-white">Product Import</h3>

                            </div>

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
                                <form role="form" action="{{ route('import_route') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="exampleInputPassword20">Xlsx File Import</label>
                                            <input type="file" class="form-control" name="import_file" required>
                                        </div>
                                        <button type="submit" class="btn btn-success waves-effect waves-light">Upload</button>
                                </form>
                            </div><!-- panel-body -->
                        </div> <!-- panel -->
                    </div> <!-- col-->
                    <div class="row">
                        <div class="col-md-8">
                            <div class="container">
                                <strong class=" text-danger">Please download the xlsx file and clear it | Now you write your all products by listing and import it again | Thank You.</strong>
                            </div>
                        </div>
                    </div>
                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>


@endsection
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
                                <h3 class="panel-title">Take Attendence</h3>
                            </div>
                            <h3 class="text-center text-success">Today {{date('d-m-y')}} {{date("D")}}</h3>
                            <div class="panel-body">
                                <div class="row">
                                    <div class="col-md-12 col-sm-12 col-xs-12">
                                        <table class="table table-striped table-bordered">
                                            <thead>
                                            <tr>
                                                <th>#id</th>
                                                <th>Name</th>
                                                <th>Photo</th>
                                                <th>Attendence</th>

                                            </tr>
                                            </thead>


                                            <tbody>
                                            <form action="{{ route('insert_attendence')}}" method="post">
                                                @csrf
                                            @foreach($usr as $key=>$row)
                                                <tr>
                                                    <td>{{ $key + 1 }}</td>
                                                    <td>{{ $row->name }}</td>
                                                    <td><img src="{{ $row->photo }}" style="height: 60px; width: 60px;"></td>
                                                    <input type="hidden" name="user_id[]" value="{{ $row->id }}">
                                                 <td>

                                                    <input type="radio" name="attendence[{{ $row->id }}]" value="Present" required=""> Present
                                                    <input type="radio" name="attendence[{{ $row->id }}]" value="Absence">Absence

                                                 </td>
                                                    <input type="hidden" name="att_date" value="{{ date("d/m/y") }}">
                                                    <input type="hidden" name="att_year" value="{{ date("Y") }}">
                                                    <input type="hidden" name="month" value="{{ date("F") }}">
                                                    <input type="hidden" name="edit_date" value="{{ date("d_m_y") }}">
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                        <button type="submit" class="btn btn-success" >Take Attendence</button>
                                        </form>


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

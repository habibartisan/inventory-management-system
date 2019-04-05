<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use App\Attendence;
use Illuminate\Support\Facades\DB;

class AttendenceController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function TakeAttendence()
    {

        $usr = Employee::all();
        return view('attendence.take_attendence', compact('usr'));
    }

    public function InsertAttendence(Request $request)
    {
        $request->validate([

        ]);
        $date = $request->att_date;
        $att_date = Attendence::where('att_date', $date)->first();

        if ($att_date) {
            $notification = array(
                'messege' => 'Today Attendence Already Taken ',
                'alert-type' => 'error'
            );
            return Redirect()->back()->with($notification);
        } else {
            foreach ($request->user_id as $id) {
                $data[] = [
                    "user_id" => $id,
                    "attendence" => $request->attendence[$id],
                    "att_date" => $request->att_date,
                    "att_year" => $request->att_year,
                    "month" => $request->month,
                    "edit_date" => date("d_m_y")

                ];
            }
            $att = DB::table('attendences')->insert($data);
            if ($att) {
                $notification = array(
                    'messege' => 'Successfully Attendence Taken ',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            } else {
                $notification = array(
                    'messege' => 'error ',
                    'alert-type' => 'success'
                );
                return Redirect()->back()->with($notification);
            }
        }

    }


      public function AllAttendence(){
          $all_att=Attendence::select('att_date')->groupBy('att_date')->get();
         return view('attendence.Aal_attendence',compact('all_att'));
      }

      //show
    public function editattendence($edit_date)
    {
        echo "Hi";

        /*$date=DB::table('attendences')->where('edit_date',$edit_date)->first();

        $data=DB::table('attendences')->join('employees','attendences.user_id','employees.id')->select('employees.name','employees.photo','attendences.*')->where('edit_date',$edit_date)->get();
        return view('edit_attendence', compact('data','date'));*/




    }
}

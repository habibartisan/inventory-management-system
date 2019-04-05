<?php

namespace App\Http\Controllers;
use DB;
use App\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
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

    // Employee Add here
    public function index()
    {

        return view('add_employee');
    }

    //Employee Insert here
    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required|unique:employees|max:255',
            'address' => 'required',
            'phone' => 'required|max:13',
            'photo' => 'required',
            'salary' => 'required',
        ]);
        $post = new Employee;
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->address = $request->address;
        $post->experience = $request->experience;
        $post->nid_no = $request->nid_no;
        $post->salary = $request->salary;
        $post->vacation = $request->vacation;
        $post->city = $request->city;
        $image = $request->file('photo');

        if ($image) {
            $image_name = str_random(10);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/employee/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $post->photo = $image_url;
                $employee = $post->save();
                if ($employee) {
                    $notification = array(
                        'messege' => 'Successfully Employee Inserted ',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                } else {
                    $notification = array(
                        'messege' => 'error ',
                        'alert-type' => 'success'
                    );
                    return Redirect()->back()->with($notification);
                }

            } else {

                return Redirect()->back();

            }
        } else {
            return Redirect()->back();
        }
    }

    //Employee All view here
    public function Employee()
    {

        $employees = Employee::all();
        return view('all_employee', compact('employees'));
    }

    //Employee Single View here
    public function viewEmployee($id)
    {

        $singledata = Employee::find($id);
        return view('view_employee', compact('singledata'));
    }


    //Employee Delete here
    public function deleteemployee($id)
    {

        $dlt = Employee::find($id);
        $photo = $dlt->photo;
        unlink($photo);
        $dltuser = $dlt->delete();

        if ($dltuser) {
            $notification = array(
                'messege' => 'Successfully Employee Deleted ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.employee')->with($notification);
        } else {
            $notification = array(
                'messege' => 'error ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

    }


    //Employee Edit here

    public function editemployee($id)
    {

        $edit = Employee::findorfail($id);
        return view('edit_employee', compact('edit'));
    }

    //Employee Update here
    public function updateemployee(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255',
            'nid_no' => 'required',
            'address' => 'required',
            'phone' => 'required|max:13',
            'salary' => 'required'
        ]);

        $upde = Employee::findorfail($id);
        $upde->email = $request->email;
        $upde->phone = $request->phone;
        $upde->address = $request->address;
        $upde->experience = $request->experience;
        $upde->nid_no = $request->nid_no;
        $upde->salary = $request->salary;
        $upde->vacation = $request->vacation;
        $upde->city = $request->city;
        $image = $request->photo;

        if ($image) {
            $image_name=str_random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/employee/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $upde->photo=$image_url;
                $img=Employee::find($id)->first();
                $image_path = $img->photo;
                $done=unlink($image_path);
                $user=$upde->save();
                if ($user) {
                    $notification=array(
                        'messege'=>'Customer Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.customer')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            // return Redirect()->back();
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $upde->photo=$oldphoto;
                $user=$upde->save();
                if ($user) {
                    $notification=array(
                        'messege'=>'Customer Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.customer')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }

    }
}

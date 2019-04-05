<?php

namespace App\Http\Controllers;
use App\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
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

    public function Setting(){
        return view('setting.set_view');
    }

    public function insertsetting(Request $request){
        $request->validate([
            'company_name' => 'required',
            'company_address' => 'required',
            'company_phone' => 'required|max:12',
            'company_city' => 'required',
            'company_country' => 'required',
            'company_zipcode' => 'required'
        ]);
        $post = new Setting;
        $post->company_name = $request->company_name;
        $post->company_email = $request->company_email;
        $post->company_phone = $request->company_phone;
        $post->company_address = $request->company_address;
        $post->company_city = $request->company_city;
        $post->company_country = $request->company_country;
        $post->company_zipcode = $request->company_zipcode;
        $image = $request->file('company_logo');

        if ($image) {
            $image_name = str_random(10);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/company_logo/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $post->company_logo = $image_url;
                $employee = $post->save();
                if ($employee) {
                    $notification = array(
                        'messege' => 'Successfully Settings Inserted ',
                        'alert-type' => 'success'
                    );
                    return Redirect()->route('show')->with($notification);
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

     public function show(){
         $companyinf=Setting::all();
         return view('setting.just_view',compact('companyinf'));
     }
     public function edit($id){
         $edit=Setting::find($id);
         return view('setting.just_view',compact('edit'));
     }

     //single view

    public function viewcustomer($id){
        $view=Setting::find($id);
        return view('setting.single_view',compact('view'));
    }

    //Delete

    public function deletecustomer($id){
        $dlt = Setting::find($id);
        $photo = $dlt->company_logo;
        unlink($photo);
        $dltuser = $dlt->delete();

        if ($dltuser) {
            $notification = array(
                'messege' => 'Successfully Company Name Deleted ',
                'alert-type' => 'success'
            );
            return Redirect()->route('setting')->with($notification);
        } else {
            $notification = array(
                'messege' => 'error ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }
}

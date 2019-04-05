<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;
class SupplierController extends Controller
{

    public function index(){

        return view('add_supplier');
    }

    //Insert
   public function store(Request $request)
   {

       $request->validate([
           'name' => 'required|max:255',
           'email' => 'required',
           'phone' => 'required|unique:suppliers|max:13',
           'address' => 'required',
           'photo' => 'required',
           'city' => 'required',
       ]);
       $post = new Supplier;
       $post->name = $request->name;
       $post->email = $request->email;
       $post->phone = $request->phone;
       $post->address = $request->address;
       $post->shop = $request->shop;
       $post->accountholder = $request->accountholder;
       $post->accountnumber = $request->accountnumber;
       $post->bankname = $request->bankname;
       $post->branchname = $request->branchname;
       $post->city = $request->city;
       $post->type = $request->type;
       $image = $request->file('photo');

       if ($image) {
           $image_name = str_random(10);
           $ext = strtolower($image->getClientOriginalExtension());
           $image_full_name = $image_name . '.' . $ext;
           $upload_path = 'public/supplier/';
           $image_url = $upload_path . $image_full_name;
           $success = $image->move($upload_path, $image_full_name);
           if ($success) {
               $post->photo = $image_url;
               $supplier = $post->save();
               if ($supplier) {
                   $notification = array(
                       'messege' => 'Successfully Employee Inserted ',
                       'alert-type' => 'success'
                   );
                   return Redirect()->route('all-supplier')->with($notification);
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

    //Supplier All view here
    public function AllSupplier(){

        $supplier=Supplier::all();
        return view('all_supplier',compact('supplier'));
    }

    public function ViewSupplier($id){
        $singledata=Supplier::find($id);
        return view('view_supplier',compact('singledata'));
    }

    //Employee Delete here
    public function DeleteSupplier($id){

        $dlt=Supplier::find($id);
        $photo=$dlt->photo;
        unlink($photo);
        $dltuser =$dlt->delete();

        if ($dltuser) {
            $notification=array(
                'messege'=>'Successfully Employee Deleted ',
                'alert-type'=>'success'
            );
            return Redirect()->route('all-supplier')->with($notification);
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }

    }

    //edit
    public function EditSupplier($id){
        $edit=Supplier::findorfail($id);
        return view('edit_supplier',compact('edit'));
    }

    //update
    public function UpdateSupplier(Request $request,$id){

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required',
            'phone' => 'required|unique:suppliers|max:13',
            'address' => 'required',
            'photo' => 'required',
            'city' => 'required',
        ]);
        $post=Supplier::findorfail($id);
        $post->name = $request->name;
        $post->email = $request->email;
        $post->phone = $request->phone;
        $post->address = $request->address;
        $post->shop = $request->shop;
        $post->accountholder = $request->accountholder;
        $post->accountnumber = $request->accountnumber;
        $post->bankname = $request->bankname;
        $post->branchname = $request->branchname;
        $post->city = $request->city;
        $post->type = $request->type;
        $image=$request->photo;

        if ($image) {
            $image_name=str_random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/supplier/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $post->photo=$image_url;
                $img=Supplier::find($id)->first();
                $image_path = $img->photo;
                unlink($image_path);
                $user=$post->save();

                if ($user) {
                    $notification=array(
                        'messege'=>'Employee Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.employee')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }

        }

    }

}

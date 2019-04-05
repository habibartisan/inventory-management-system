<?php

namespace App\Http\Controllers;
use App\Advance_salarie;
use App\Categorie;
use DB;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function AddAdvancedSalary(){

        return view('emp.addv_advancedsalary');
    }

    public function InsertAdvanced(Request $request)
   {

      $month=$request->month;

      $advanced=Advance_salarie::where('month',$month)
                       ->first();
       if($advanced === NULL){

           $addds = new Advance_salarie;
           $addds->employee_id = $request->emp_id;
           $addds->month = $request->month;
           $addds->advanced_salary = $request->advanced_salary;
           $addds->year = $request->year;
           $advanced = $addds->save();
           if ($advanced) {
               $notification = array(
                   'messege' => 'Successfully Advanced Paid ',
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
       }else{
           $notification=array(
               'messege'=>'Oopss !! Allready advanced Paid in this month! ',
               'alert-type'=>'error'
           );
           return Redirect()->back()->with($notification);
       }


      }

      public function AllSalary(){

          $salary=DB::table('advance_salaries')
              ->join('employees','advance_salaries.employee_id','employees.id')
              ->select('advance_salaries.*','employees.name','employees.salary','employees.photo')
              ->orderBy('id','DESC')
              ->get();
          return view('emp.all_avdancedsalary',compact('salary'));

      }

      public function PaySalary(){

          $employee=DB::table('employees')->get();
          return view('emp.paysalary', compact('employee'));
      }



      //Category
     public function AddCategory(){
           return view('cat.add_category');
    }
    public function InsertCategory(Request $request){
        $request->validate([
            'cat_name'=>'required|unique:categories'
        ]);

        $data=new Categorie;
        $data->cat_name=$request->cat_name;
        $advanced=$data->Save();
        if ($advanced) {
            $notification = array(
                'messege' => 'Successfully Advanced Paid ',
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

    //All ca
    public function AllCategory(){
        $category=Categorie::all();
        return view('cat.all_category',compact('category'));
    }

    //Dele
    public function DeleteCategory($id){
        $dlt=Categorie::find($id)->delete();
        if ($dlt) {
            $notification=array(
                'messege'=>'Successfully Category Deleted ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'error ',
                'alert-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function EditCategory($id){
        $cat=DB::table('categories')->where('id',$id)->first();
        return view('cat.edit_category')->with('cat',$cat);
    }

    //updt
    public function UpdateCategory(Request $request,$id){
        $data= Categorie::findorfail($id);
        $data->cat_name=$request->cat_name;
        $advanced=$data->Save();
        if ($advanced) {
            $notification = array(
                'messege' => 'Successfully Advanced Paid ',
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

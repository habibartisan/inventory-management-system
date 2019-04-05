<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expense;

class ExpenseController extends Controller
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

    public function AddExpense(){

       return view('expense.add_expense');
    }

    public function InserExpense(Request $request){

        $request->validate([
            'details'=>'required',
            'amount'=>'required'
        ]);

       $post = new Expense;
        $post->details=$request->details;
        $post->amount=$request->amount;
        $post->month=$request->month;
        $post->date=$request->date;
        $post->year=$request->year;

        $advanced=$post->Save();
        if ($advanced) {
            $notification = array(
                'messege' => 'Successfully Expense Insert ',
                'alert-type' => 'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        } else {
            $notification = array(
                'messege' => 'error ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

    }

    //Today Expense

    public function TodayExpense(){

          $date=date('d/m/y');
        $today=Expense::where('date',$date)->get();

         return view('expense.today_expense',compact('today'));
    }

    //Today Expense Edit
    public function EditTodayExpense($id){
        $tdy=Expense::findorfail($id);
        return view('expense.edit_today_expense',compact('tdy'));
    }

    //Today Expense Update

    public function UpdateExpense(Request $request,$id){

        $post = Expense::findorfail($id);
        $post->details=$request->details;
        $post->amount=$request->amount;
        $post->month=$request->month;
        $post->date=$request->date;
        $post->year=$request->year;

        $advanced=$post->Save();
        if ($advanced) {
            $notification = array(
                'messege' => 'Successfully Expense Update ',
                'alert-type' => 'success'
            );
            return Redirect()->route('today.expense')->with($notification);
        } else {
            $notification = array(
                'messege' => 'error ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }


    //Monthly Expense
    public function MonthlyExpense(){

         $month=date("F");
         $expense=Expense::where('month',$month)->get();
         return view('expense.monthly_expense',compact('expense'));
    }

    //Yearly Expense
    public function YearlyExpense(){
        $year=date("Y");
        $year=Expense::where('year',$year)->get();
         return view('expense.yearly_expense',compact('year'));
    }

    //Previous Yearly Expense

    public function PreviousYearlyExpense(){

        $year= date("Y",strtotime('-1 year'));
        $year=Expense::where('year',$year)->get();

         return view('expense.previous_yearly_expense',compact('year'));
    }

    //All Month Expense View------=============-------

    public function JanuaryExpense()
    {
        $month="January";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }

    public function FebruaryExpense()
    {
        $month="February";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }

    public function MarchExpense()
    {
        $month="March";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function AprilExpense()
    {
        $month="April";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function JuneExpense()
    {
        $month="June";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function JulyExpense()
    {
        $month="July";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));

    }
    public function AugustExpense()
    {
        $month="August";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function SeptemberExpense()
    {
        $month="September";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function OctoberExpense()
    {
        $month="October";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function NovemberExpense()
    {
        $month="November";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function DecemberExpense()
    {
        $month="December";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
    public function MayExpense()
    {
        $month="May";
        $expense=Expense::where('month',$month)->get();
        return view('expense.monthly_expense',compact('expense'));
    }
}

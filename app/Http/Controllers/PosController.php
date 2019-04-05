<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use DB;
class PosController extends Controller
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

    public function pos()
    {
        $product = DB::table('products')
            ->join('categories', 'products.cat_id', 'categories.id')
            ->select('categories.cat_name', 'products.*')
            ->get();
        $categories = DB::table('categories')->get();
        $customers = DB::table('customers')->get();

        return view('.pos.pos', compact('product', 'categories', 'customers'));

    }

    public function pending()
    {

        $product = DB::table('orders')
            ->join('customers', 'orders.customer_id', 'customers.id')
            ->select('customers.name', 'orders.*')
            ->where('order_status', 'pending')
            ->get();
        return view('pos.pending', compact('product'));
    }

    public function viewpendingsig($id)
    {

        $order = DB::table('orders')
            ->join('customers', 'orders.customer_id', 'customers.id')
            ->select('customers.*', 'orders.*')
            ->where('orders.id', $id)
            ->first();

        $order_details = DB::table('orderdetails')
            ->join('products', 'orderdetails.product_id', 'products.id')
            ->select('orderdetails.*', 'products.product_name', 'products.product_code')
            ->where('order_id', $id)
            ->get();

        return view('pos.order_confirmation', compact('order', 'order_details'));

    }

    public function orderdone($id)
    {
         $approve=DB::table('orders')->where('id',$id)->update(['order_status'=>'success']);
        //$approve = Order::where('id', $id)->update(['order_status' => 'success']);

        if ($approve) {
            $notification = array(
                'messege' => 'Successfully Order Confirmed ! And All Products Delevered',
                'alert-type' => 'success'
            );
            return Redirect()->route('seccessorder')->with($notification);
        } else {
            $notification = array(
                'messege' => 'error ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

        //success order
        public function seccessorder()
        {
            $success=DB::table('orders')
                ->join('customers','orders.customer_id','customers.id')
                ->select('customers.name','orders.*')->where('order_status','success')->get();
            return view('pos.success',compact('success'));
        }




}

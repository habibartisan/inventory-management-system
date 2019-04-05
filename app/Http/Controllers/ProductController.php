<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use DB;
use App\Exports\ProductsExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\productsImport;

class ProductController extends Controller
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

    public function AddProduct(){
        return view('product.add_product');
    }

    public function InsertProduct(Request $request){

        $request->validate([

            'product_name' => 'required|unique:products',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'expire_date' => 'required',
            'selling_price' => 'required',
            'buying_price' => 'required'
        ]);

        $post = new Product;
        $post->product_name = $request->product_name;
        $post->product_code = $request->product_code;
        $post->cat_id = $request->cat_id;
        $post->sup_id = $request->sup_id;
        $post->product_garage = $request->product_garage;
        $post->product_route = $request->product_route;
        $post->buy_date = $request->buy_date;
        $post->expire_date = $request->expire_date;
        $post->buying_price = $request->buying_price;
        $post->selling_price = $request->selling_price;
        $image=$request->file('product_image');

        if ($image) {
            $image_name = str_random(10);
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . '.' . $ext;
            $upload_path = 'public/Products/';
            $image_url = $upload_path . $image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            if ($success) {
                $post->product_image = $image_url;
                $employee = $post->save();
                if ($employee) {
                    $notification = array(
                        'messege' => 'Successfully Product Inserted ',
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

            } else {

                return Redirect()->back();

            }
        } else {
            return Redirect()->back();
        }

    }

    public function AllProduct(){
        $product=Product::all();
        return view('product.all_product',compact('product'));
    }

    //Delete
    public function DeleteProduct($id){
        $dlt=Product::findorfail($id);
        $photo = $dlt->product_image;
        unlink($photo);
        $dltuser = $dlt->delete();

        if ($dltuser) {
            $notification = array(
                'messege' => 'Successfully Employee Deleted ',
                'alert-type' => 'success'
            );
            return Redirect()->route('all.product')->with($notification);
        } else {
            $notification = array(
                'messege' => 'error ',
                'alert-type' => 'success'
            );
            return Redirect()->back()->with($notification);
        }

    }

    //View
    public function ViewProduct($id){
       $prod=DB::table('products')
            ->join('categories','products.cat_id','categories.id')
            ->join('suppliers','products.sup_id','suppliers.id')
            ->select('categories.cat_name','products.*','suppliers.name')
            ->where('products.id',$id)
            ->first();

      return view('product.view_product',compact('prod'));
    }

    //edit

    public function EditProduct($id){
        $prod=Product::findorfail($id);
        return view('product.edit_product',compact('prod'));
    }

    //Update

    public function UpdateProduct(Request $request,$id){
        $request->validate([

            'product_name' => 'required',
            'cat_id' => 'required',
            'sup_id' => 'required',
            'expire_date' => 'required',
            'selling_price' => 'required',
            'buying_price' => 'required'
        ]);
        $post=Product::findorfail($id);
        $post->product_name = $request->product_name;
        $post->product_code = $request->product_code;
        $post->cat_id = $request->cat_id;
        $post->sup_id = $request->sup_id;
        $post->product_garage = $request->product_garage;
        $post->product_route = $request->product_route;
        $post->buy_date = $request->buy_date;
        $post->expire_date = $request->expire_date;
        $post->buying_price = $request->buying_price;
        $post->selling_price = $request->selling_price;
        $image = $request->product_image;

        if ($image) {
            $image_name=str_random(10);
            $ext=strtolower($image->getClientOriginalExtension());
            $image_full_name=$image_name.'.'.$ext;
            $upload_path='public/Products/';
            $image_url=$upload_path.$image_full_name;
            $success=$image->move($upload_path,$image_full_name);
            if ($success) {
                $post->product_image=$image_url;
                $img=Product::find($id)->first();
                $image_path = $img->product_image;
                $done=unlink($image_path);
                $user=$post->save();
                if ($user) {
                    $notification=array(
                        'messege'=>'Customer Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('all.product')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }else{
            // return Redirect()->back();
            $oldphoto=$request->old_photo;
            if ($oldphoto) {
                $post->product_image=$oldphoto;
                $user=$post->save();
                if ($user) {
                    $notification=array(
                        'messege'=>'Customer Update Successfully',
                        'alert-type'=>'success'
                    );
                    return Redirect()->route('product.all_product')->with($notification);
                }else{
                    return Redirect()->back();
                }
            }
        }
    }



    //Imput data

    public function importproduct(){

        return view('xl.inport_product');
    }

    //insert

    public function export(){
        return Excel::download(new ProductsExport,'Products.xlsx');
    }

    //imput
    public function import(){

        $import=Excel::import(new ProductsImport, $request->file('import_file'));
        if ($import) {
            $notification=array(
                'messege'=>'Product Import Successfully',
                'alert-type'=>'success'
            );
            return Redirect()->route('all.product')->with($notification);
        }else{
            return Redirect()->back();
        }
    }
}

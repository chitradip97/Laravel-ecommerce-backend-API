<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use App\Models\customer_details;
use App\Models\category;
use App\Models\products;
use App\Models\products_images;
use App\Models\admin_register;
use App\Models\orders;
use App\Models\user_register;

class userController extends Controller
{
    public function product_search($id)
    {
        //$s= products::find($id);
        $products_details=products::where('id','=',$id)->get();
        //  $products_details=DB::table('products_images')->where('product_name','=',$Product_name)->get();
         foreach($products_details as $data)
         {
             $Product_name=$data->product_name;
         }
        //$Product_name=$products_details->Product_name;
        // dd($Product_name);
        $Quary=['product_name'=>$Product_name];
          $p=products_images::where('product_name','=',$Product_name)->get();
        //   dd($p);
        //  $products_images=DB::table('products_images')->where('product_name',$Product_name)->get();
        //  dd($products_images);
        // $s->delete();
        if(isset($p))
        {
            return response()->json(['result'=>$products_details,'result2'=>$p]);
        }
        
    }

    public function add_user_register(Request $req)
    {
        $s=new user_register;
        $s->user_name=$req->input('Name');
        $s->phone=$req->input('Number');
        $s->email=$req->input('Email');
        $s->password=$req->input('Password');
        $s->save();
        return response()->json(['result'=>$s]);
    }
    public function view_user_register()
    {
        return user_register::all();
    }
}

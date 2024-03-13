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
use App\Models\payment_details;
use App\Models\shipping_details;
use App\Models\Shipping_products;

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

    public function add_order(Request $req)
    {
        $shipping_id=rand(10000,99999);
        $a= new shipping_details;
        $a->id=$shipping_id;
        $a->Customer_id=$req->input('Customer_id');
        $a->Shipping_Fname=$req->input('shipping_Fname');
        $a->Shipping_Lname=$req->input('shipping_Lname');
        $a->Phone=$req->input('phone');
        $a->Email=$req->input('email');
        $a->Address=$req->input('address');
        $a->City=$req->input('city');
        $a->Dist=$req->input('dist');
        $a->House=$req->input('house');
        $a->Pin=$req->input('pin');

        $b=new payment_details;
        $b->Shipping_id=$shipping_id;
        $b->Cardname=$req->input('cardname');
        $b->Card_number=$req->input('Cardnumber');
        $b->Expairy=$req->input('Expairy');
        $b->Cvv=$req->input('Cvv');
        $b->Total_amount=$req->input('grandtotal');
        
        $c=new Shipping_products;
        $c->Shipping_id=$shipping_id;
        $c->Product_id=$req->input('product_id');
        $c->Product_category=$req->input('product_category');
        $c->Product_brand=$req->input('product_brand');
        $c->Product_name=$req->input('product_name');
        $c->Product_quantity=$req->input('product_quantity');

        foreach($request->cart as $item => $value)
    $data[$value]=array(
        'test_id'=>$request->test_id,
        'test_type'=>$value,
        'user_id'=>$test_result[$item],
        'test_by'=>$request->test_by,
    );
        $a->save();
        $b->save();
        $c->save();

        return response()->json(['result'=>$a,'result2'=>$b,'result3'=>$c]);
        
    }
}

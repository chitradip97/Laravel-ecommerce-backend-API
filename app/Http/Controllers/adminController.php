<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customer_details;
use App\Models\category;
use App\Models\products;
use App\Models\products_images;
use App\Models\admin_register;
use App\Models\orders;

class adminController extends Controller
{
    public function view_customer(){
        return customer_details::all();
    }
    public function view_customer_Del($id){
        $s= customer_details::find($id);
        $s->delete();
        return response()->json(['result'=>$s]);
    }
    public function add_category(Request $req)
    {
        $s=new category;
        $s->category_name=$req->input('catName');
        $s->category_stock=$req->input('catStock');
        $s->save();
        return response()->json(['result'=>$s]);
    }
    public function view_category(){
        return category::all();
    }
    public function category_Del($id)
    {
        $s= category::find($id);
        $s->delete();
        return response()->json(['result'=>$s]);
    }
    public function category_Update($id,Request $req)
    {
        $s= category::find($id);
        $s->category_name=$req->input('name');
        $s->category_stock=$req->input('stock');
        $s->save();
        return response()->json(['result'=>$s]);
    }
    public function add_product(Request $req)
    {
        $s=new products;
        $s->category_name=$req->input('category');
        $s->product_name=$req->input('prodName');
        $s->Brand_name=$req->input('brandName');
        $s->product_desc=$req->input('proddesc');
        $s->product_price=$req->input('prodprice');
        $s->product_quantity=$req->input('prodqnty');
        
           $product_image=$req->file('profimg');
        // //   var_dump($req->file('prodimg'));
            $img_file_name=time().'.'.$product_image->getClientOriginalName();
            $data_location='Product_images';
            $product_image->move($data_location,$img_file_name);
            $s->product_image='Product_images/'.$img_file_name;
            $s->save();
         //$s->product_image=$req->input('prodName');
         $imageData=[];
                if($files=$req->file('images'))
                {
                    foreach($files as $key=>$file){
                        $extension=$file->getClientOriginalExtension();
                        $filename=$key.'-'.time().'.'.$extension;
                        $path="uploads/";
                        $file->move($path,$filename);
                        $imageData[]=[
                            'product_name'=>$req->input('prodName'),
                            'image_path'=>$path.$filename,
                        ];
                    }
                }
                products_images::insert($imageData);


        // $s->save();
        return response()->json(['result1'=>$imageData,'resust2'=>$s]);
        
        // return response()->json(['result'=>$s]);
    }
    public function view_product(){
        return products::all();
    }
    public function product_Del($id)
    {
        $s= products::find($id);
        $s->delete();
        return response()->json(['result'=>$s]);
    }
    public function product_Update($id,Request $req)
    {
        $s= products::find($id);
         $s->product_price=$req->input('price');
         $s->product_quantity=$req->input('quantity');
        $s->save();
        return response()->json(['result'=>$s]);
    }
    public function add_register(Request $req)
    {
        $s=new admin_register;
        $s->Admin_name=$req->input('Name');
        $s->phone=$req->input('Number');
        $s->email=$req->input('Email');
        $s->password=$req->input('Password');
        $s->save();
        return response()->json(['result'=>$s]);
    }
    public function view_register()
    {
        return admin_register::all();
    }
    public function view_orders(){
        return orders::all();
    }
}

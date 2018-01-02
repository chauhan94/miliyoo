<?php

namespace App\Http\Controllers;

use App\Category;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;


class ProductController extends Controller
{
    public function products(){
        $products = Product::all();
        $categories = Category::all();
        return view('product.product', ['products' => $products,'categories' => $categories]);
    }

    public function AddProductsByRetailers(Request $request){

            $name = $request->name;
            $license = $request->license;
            $price = $request->price;
            $address = $request->address;
            $details = $request->details;
            $category_id = $request->category_sel;
            $quantity = $request->quantity;
            $is_admin_product = 0;
            $product_id = 'miliyoo'.time();

        $path = public_path() . '/assets/images/product_image';



        \File::isDirectory($path) or \File::makeDirectory($path, 0777, true, true);
//        $ext = pathinfo(storage_path().'/uploads/categories/featured_image.jpg', PATHINFO_EXTENSION);

//        print_r( \File::mimeType($request->image));


        $ext=pathinfo( $request->image->getClientOriginalName(),PATHINFO_EXTENSION);


        $image_name=time().".".$ext;

        if ($request->image->move(public_path("assets/images/product_image/"),$image_name)) {

            $result=Product::where('name',$name)->first();
            if($result) {
                return response()->json(['status'=>false,'message'=>'Item already exist '.$name]);
////        Item::insert('insert into items (name,category,description,price) values(?,?,?,?),[$itemname,$category,$detail,$price]');

            }

            $res = Product::insert(['product_id' =>$product_id,  'category_id' => $category_id, 'name' => $name, 'details' => $details, 'license_no' => $license, 'status' => 1, 'address' => $address, 'quantity' => $quantity,  'image' => $image_name, 'price' => $price, 'is_admin_product' => $is_admin_product]);


            if($res){
                return response()->json(['status'=>true,'message'=>'New Item added successfully.']);
            }else{
                return response()->json(['status'=>false,'message'=>'Item not added.']);
            }

        }





    }


    public function DeleteProduct(Request $request){

        $id=$request->id;

        $result=Product::where('id',$id)->delete();

        if($result){

            return response()->json(['status'=>true,'result'=>$result]);
        }else{
            return response()->json(['status'=>false, 'msg' => 'something went wrong.']);
        }

    }


    public function EditProduct(Request $request){

        $id=$request->id;

        $result=Product::where('id',$id)->get();


        if($result){
            $result[0]->image="/assets/images/product_image/".$result[0]->image;
            return response()->json(['status'=>true,'result'=>$result]);
        }else{
            return response()->json(['status'=>false]);
        }

    }

    public function UpdateProduct(Request $request){

        $id=$request->product_id;
        $name = $request->e_name;
        $price = $request->e_price;
        $address = $request->e_address;
        $details = $request->e_details;

        $license=$request->e_license;
        $quantity=$request->e_quantity;
        $cat_id=$request->e_category_sel;

//        $exist_product=Product::where('name',$name)->whereRaw('!(id='.$id.')')->count();
//        if($exist_product){
//            return response()->json(['status'=>false,'message'=>'product already exist.'.$name]);
//        }


        if($request->edit_image!='' && $request->edit_image!=null) {
            $path = public_path() . '/assets/images/product_image';

            \File::isDirectory($path) or \File::makeDirectory($path, 0777, true, true);

            $ext = pathinfo($request->edit_image->getClientOriginalName(), PATHINFO_EXTENSION);


            $image_name = time() . "." . $ext;


            if ($request->edit_image->move(public_path("assets/images/product_image/"), $image_name)) {
                $url=Product::where('id',$id)->get();
//                print_r($url);
                $img=$url[0]->image;
                \File::delete('/assets/images/product_image' .$img);
//                unlink(URL::to('/').'/images/items' .$img);

                $result=Product::where('id',$id)->update(['category_id'=>$cat_id,'name'=>$name,'details'=>$details,'license_no'=>$license,'price'=>$price,'image'=>$image_name,'address'=>$address,'quantity'=>$quantity]);


            }
        }else{
            $result=Product::where('id',$id)->update(['category_id'=>$cat_id,'name'=>$name,'details'=>$details,'license_no'=>$license,'price'=>$price,'address'=>$address]);

        }





        if($result){

            return response()->json(['status'=>true,'result'=>$result]);
        }else{
            return response()->json(['status'=>false]);
        }

    }



    public function ChangeProductStatus(Request $request){

        if($request->status == 1) {
            $res = Product::where('id', $request->id)->update(['status' => 0]);
        }else{
            $res = Product::where('id', $request->id)  ->update(['status' => 1]);
        }
//        $queries = \DB::getQueryLog();
//        return dd($queries);

        if($res){
            return  response()->json(['status'=>true, 'message'=> 'Product Status updated.']);
        }else{
            return  response()->json(['status'=>false, 'message'=> 'product Status not updated.']);

        }

    }

    public function ChangeProductAdvertisingStatus(Request $request){

        if($request->status == 1) {
            $res = Product::where('id', $request->id)->update(['is_retailer_advertising' => 0]);
        }else{
            $res = Product::where('id', $request->id)  ->update(['is_retailer_advertising' => 1]);
        }
//        $queries = \DB::getQueryLog();
//        return dd($queries);

        if($res){
            return  response()->json(['status'=>true, 'message'=> 'Product Advertising Status updated.']);
        }else{
            return  response()->json(['status'=>false, 'message'=> 'product Status not updated.']);

        }

    }


}

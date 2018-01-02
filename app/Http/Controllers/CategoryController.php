<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function category(){
        $categories =Category::all();
        return view('category.category', ['categories' => $categories]);
    }

    public function ChangeCategoryStatus(Request $request){
        if($request->status == 1) {
            $res = Category::where('id', $request->id)->update(['status' => 0]);
        }else{
            $res = Category::where('id', $request->id)  ->update(['status' => 1]);
        }
//        $queries = \DB::getQueryLog();
//        return dd($queries);

        if($res){
            return  response()->json(['status'=>true, 'message'=> 'Category Status updated.']);
        }else{
            return  response()->json(['status'=>false, 'message'=> 'Category Status not updated.']);

        }
    }

    public function AddCategory(Request $request){



        $result=Category::where('name',$request->category)->count();
        if($result){
            return response()->json(['status'=>false,'message'=>'Category already exist '.$request->category]);
        }

        $res=Category::insert(['name'=>$request->category]);
        if($res){
            return response()->json(['status'=>true,'message'=>'New category added.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Category not added.']);
        }

    }


    public function EditCategory(Request $request){

        $id = $request->id;
        $category_name = $request->category;

        $count=Category::where('name',$category_name)->whereRaw('!(id='.$id.')')->count();
        if($count){
            return response()->json(['status'=> false,'message'=>'Category already exist '.$category_name]);
        }

        $res = Category::where('id',$id)
            ->update(['name'=>$category_name]);

        if($res){
            return response()->json(['status'=>true,'message'=>'update category added.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Category not Updated.']);
        }

    }
}

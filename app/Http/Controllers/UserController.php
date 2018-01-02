<?php

namespace App\Http\Controllers;

use App\Retailer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function users(){

        $users = DB::table('users')->paginate(1);

        return view('main.users', ['users' => $users]);
    }


    public function adminBlocksUser(Request $request){
//        DB::connection()->enableQueryLog();
        if($request->status == 1) {
            $res = User::where('id', $request->id)->update(['status' => 0]);
        }else{
            $res = User::where('id', $request->id)  ->update(['status' => 1]);
        }
//        $queries = \DB::getQueryLog();
//        return dd($queries);

        if($res){
           return  response()->json(['status'=>true, 'message'=> 'User Status updated.']);
        }else{
          return  response()->json(['status'=>false, 'message'=> 'User Status not updated.']);

        }
    }




//    public function index()
//    {
//
//        $users = DB::table('users')->paginate(15);
//        print_r($users);
//
//        return view('user.index', ['users' => $users]);
//    }

}

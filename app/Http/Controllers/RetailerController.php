<?php

namespace App\Http\Controllers;

use App\CurrentOrder;
use App\Driver;
use App\Retailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RetailerController extends Controller
{
    public function retailersAdmin(Request $request){
        $retailers = Retailer::all();

        return view('retailer.retailer-admin', ['retailers' => $retailers]);
    }

    public function retailers(Request $request){

        $retailers = Retailer::where('id',$request->session()->get('retailer_id'))->get();

        return view('retailer.retailer', ['retailers' => $retailers]);
    }

    public function loginView(Request $request){

        return view('retailer_auth/retailer-sign-in');

    }

    public function AssignDriverByRetailer(Request $request){

        $driver_id = $request->driver_id;
        $order_id = $request->order_id;



        $result = CurrentOrder::where('id',$order_id)->update(['driver_id' => $driver_id]);

           if($result){
               return response()->json(['status'=>true,'message'=>'Driver assigned successfully.']);
           }else{
               return response()->json(['status'=>false,'message'=>'Something went wrong.']);
           }

    }










    public function signupView(){
        return view('retailer_auth/retailer-sign-up');
    }



    public function login(Request $request){
        $rules=[
            'email'=> 'required|email',
            'password' => 'required|min:3'
        ];
        $valid=validateRetailParams($request,$rules);
        if($valid!==true) {
//            dd($valid);
//            return redirect('/admin/login')->with('login_err', ['msg' => $valid['message'], 'email' => $request->email, 'password' => $request->password]);
            return response()->json(['status'=> false,'message'=> $valid['message']]);
        }

        $result=DB::table('retailers')
            ->select('is_verified','id','user_name','email')
            ->where('email','=', $request->email)
            ->first();


        if($result->is_verified == 0) {
            return response()->json(['status'=>false,'message'=>['your account not verified.']]);

        }




        if( Auth::guard('retailers')->attempt(['email' => $request->email, 'password' => $request->password])){

            $request->session()->put('retailer_id', $result->id);
            $request->session()->put('user_name', $result->user_name);
            $request->session()->put('email', $result->email);
            return response()->json(['status'=> true,'message'=> ['Login Successful.']]);
//        return redirect('/chk');
        }else{
//        return redirect('/admin/login')->with('login_err',['msg' => ['Invalid login Credentials.']]);
            return response()->json(['status'=> false,'message'=> ['Invalid Login Credentials']]);

        }
//      dd(Auth::guard('admins'));

    }

    public function Signup(Request $request){


            $username = $request->name;
            $email = $request->email;
            $password = $request->password;
            $pass=Hash::make($password);
            $license_no = $request->license_no;
            $phone = $request->phone;
            $address = $request->address;


        $result=Retailer::where('email',$email)->first();
        if($result) {
            return response()->json(['status'=>false,'message'=>'Email already exist'.$email]);
////        Item::insert('insert into items (name,category,description,price) values(?,?,?,?),[$itemname,$category,$detail,$price]');

        }

        $res = Retailer::insert(['user_name' =>$username,  'email' => $email, 'password' => $pass, 'license_no' => $license_no, 'mobile_no' => $phone, 'address' => $address]);


        if($res){
            return response()->json(['status'=>true,'message'=>'Registered successfully.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Something went wrong.']);
        }

    }




    public function logout(){
//        dd('hello');
        Auth::guard('retailers')->logout();
        if(Auth::guard('retailers')->check()){
            return redirect('/retailer/retailer');
        }else{
            return redirect('/retailer/login');
        }


    }
}

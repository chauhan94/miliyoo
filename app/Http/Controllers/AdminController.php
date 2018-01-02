<?php

namespace App\Http\Controllers;
use App\Admin;
use App\Retailer;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\URL;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class AdminController extends Controller
{

    public function loginView(){
        return view('auth/sign-in');
    }

    public function signupView(){
        return view('auth/sign-up');
    }


    public function login(Request $request){

        $rules=[
            'email'=> 'required|email',
            'password' => 'required|min:3'
        ];
        $valid=validateParams($request,$rules);
        if($valid!==true) {
//            dd($valid);
//            return redirect('/admin/login')->with('login_err', ['msg' => $valid['message'], 'email' => $request->email, 'password' => $request->password]);
       return response()->json(['status'=> false,'message'=> $valid['message']]);
        }



    if( Auth::guard('admins')->attempt(['email' => $request->email, 'password' => $request->password])){
        return response()->json(['status'=> true,'message'=> ['Login Successful.']]);
//        return redirect('/chk');
    }else{
//        return redirect('/admin/login')->with('login_err',['msg' => ['Invalid login Credentials.']]);
        return response()->json(['status'=> false,'message'=> ['Invalid Login Credentials']]);

    }
//      dd(Auth::guard('admins'));

    }

    public function ForgotPassword(){
//        dd(URL::to('/'));
        return view('auth/forgot-password');
    }

    public function sendResetMail(Request $request)
    {

        $res = Admin::where('email', $request->email)->get();
        if ($res->count()) {
            $token = Hash::make(time());
            $res1 = Admin::where('email', $request->email)->update(['token' => $token]);
            if ($res1) {


                $data['name'] = $res[0]->name;
                $data['url'] = URL::to('/') . '/admin/resetPassword?email=' . $request->email . '&token=' . $token;

                $data['email'] = $request->email;
                $data['from'] = 'care@miliyoo.com';
                $data['subject'] = 'Miliyoo Password Reset';

                if (htmlmail('AdminResetPass', $data)) {
                    $resp['status'] = true;
                    $resp['message'] = 'Mail sent.';
                } else {
                    $resp['status'] = false;
                    $resp['message'] = 'Mail not sent.';
                }


            } else {
                $resp['status'] = false;
                $resp['message'] = 'Internal server Error.';
            }

        } else {
            $resp['status'] = false;
            $resp['message'] = 'This email is not registerd with Miliyoo.';
        }
        return response()->json($resp);

    }

    public function resetPassword(Request $request){

        if($request->token==NULL|| $request->token==''){
            return view('ResetPassword')->with(['update'=>0]);
        }
        $res = Admin::where('email', $request->email)->where('token',$request->token)->get();
        if ($res->count()) {
//        dd($res);
            return view('auth/ResetPassword')->with(['update'=>1]);
        }else{
            return view('ResetPassword')->with(['update'=>0]);
        }

    }

    public function updateAdminPassword(Request $request){
        $pass=Hash::make($request->password);
        if($request->token==NULL|| $request->token==''){
            return view('auth/ResetPassword')->with(['update'=>0]);
        }
        $res = Admin::where('email', $request->email)->where('token',$request->token)->update(['password'=>$pass, 'token'=>NULL]);
        if ($res) {
            return response()->json(['status'=>true,'message'=>'Password updated successfully.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Password not updated.Try Again.']);

        }
    }

    public function RetailerVerify(Request $request){

        if($request->status == 1) {
            $res = Retailer::where('id', $request->id)->update(['is_verified' => 0]);
        }else{
            $res = Retailer::where('id', $request->id)  ->update(['is_verified' => 1]);
        }

        if($res){
            return  response()->json(['status'=>true, 'message'=> 'Retailer  Status has been updated.']);
        }else{
            return  response()->json(['status'=>false, 'message'=> 'Retailer  Status not updated.']);

        }

    }



    public function chk(){
        echo Auth::guard('admins')->check();
        dd(Auth::guard('admins')->user());
    }

    public function logout(){
//        dd('hello');
       Auth::guard('admins')->logout();
       if(Auth::guard('admins')->check()){
           return redirect('/admin/retailers');
       }else{
           return redirect('/admin/login');
       }


    }




}

<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Driver;
use Illuminate\Http\Request;


class DriverController extends Controller
{
    public function drivers(Request $request){
        $drivers =Driver::where('is_admin_driver', 1)->get();;
        return view('driver.driver', ['drivers' => $drivers]);
    }

    public function Retailerdrivers(Request $request){
        $drivers =Driver::where('is_admin_driver', 0)->get();
        return view('driver.driver-retailer', ['drivers' => $drivers]);
    }



    public function AddDriverByAdmin(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $pass=Hash::make($password);


        $result=Driver::where('email',$email)->count();
        if($result){
            return response()->json(['status'=>false,'message'=>'This driver email already exist '.$email]);
        }

        $res=Driver::insert(['name'=>$name,'email'=>$email,'password'=>$pass,'is_admin_driver'=>1]);
        if($res){
            return response()->json(['status'=>true,'message'=>'New Driver added.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Driver not added.']);
        }

    }

    public function AddDriverByRetailer(Request $request){

        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        $pass=Hash::make($password);
        $Retailer_id = $request->session()->get('retailer_id');




        $result=Driver::where('email',$email)->count();
        if($result){
            return response()->json(['status'=>false,'message'=>'This driver email already exist '.$email]);
        }

        $res=Driver::insert(['name'=>$name,'email'=>$email,'password'=>$pass,'is_admin_driver'=>0, 'retailer_id'=>$Retailer_id]);
        if($res){
            return response()->json(['status'=>true,'message'=>'New Driver added.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Driver not added.']);
        }

    }

    public function RemoveDriver(Request $request){

        $driver_id = $request->driver_id;

        $res = Driver::where('id', $driver_id)->delete();
        if($res){
            return response()->json(['status'=>true,'message'=>'Driver Deleted successfully.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Driver not deleted.']);
        }

    }

    public function RemoveDriverByRetailer(Request $request){
//        where('name',$name)->whereRaw('!(id='.$id.')')->count();
        $driver_id = $request->driver_id;

        $res = Driver::where('id', $driver_id)->where('is_admin_driver', 0)->delete();
        if($res){
            return response()->json(['status'=>true,'message'=>'Driver Deleted successfully.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Driver not deleted.']);
        }

    }


}

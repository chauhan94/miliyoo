<?php

namespace App\Http\Controllers;

use App\Setting;
use Illuminate\Http\Request;

class ChargesController extends Controller
{
    public function DeliveryFeeCharges(){

        $result = Setting::all();
        return view('charges/charges', ['charges' => $result]);


    }


    public function AddFeeCharges(Request $request){

            $fee_charges = $request->fee_charges;
            $delivery_charges = $request->delivery_charges;


        $res = Setting::insert(['delivery_charges' =>$delivery_charges,'order_fee' => $fee_charges]);


        if($res){
            return response()->json(['status'=>true,'message'=>'New charges added successfully.']);
        }else{
            return response()->json(['status'=>false,'message'=>'Charges not added.']);
        }


    }

    public function EditFeeCharges(Request $request){

            $id = $request->id;
            $fee_charges = $request->fee_charges;
            $delivery_charges = $request->delivery_charges;


        $result=Setting::where('id',$id)->update(['order_fee'=>$fee_charges,'delivery_charges'=>$delivery_charges]);



        if($result){

            return response()->json(['status'=>true,'message'=>'charges updated!']);
        }else{
            return response()->json(['status'=>false]);
        }


    }
}

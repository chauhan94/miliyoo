<?php

namespace App\Http\Controllers;
use App\CompletedOrder;
use App\CurrentOrder;
use App\Driver;
use Illuminate\Http\Request;
use App\Http\Traits\OrdersTrait;

class OrderController extends Controller
{
    use OrdersTrait;


    public function GetAllPendingOrders(Request $request){//call when we click on pending order

        $currOrder=$this->getAllCurrentOrders();



        $Retailer_id = $request->session()->get('retailer_id');
        $drivers=Driver::where('retailer_id', $Retailer_id)->get();
        return view('orders.pending',['type'=>$request->type,'CurrentOrders'=> $currOrder,'drivers'=>$drivers]);

    }

    public function GetAllCompleteOrders(Request $request){

               $date=date('Y-m-d');

       if($request->date!=0){

            $dates=date_create($request->date);//change date format here
            $date = date_format($dates,"Y-m-d");

       }

            $currOrder=$this->getAllCompletedOrders($date);



        $Retailer_id = $request->session()->get('retailer_id');
        $drivers=Driver::where('retailer_id', $Retailer_id)->get();
        return view('orders.complete',['type'=>$request->type,'CurrentOrders'=> $currOrder,'drivers'=>$drivers]);

    }

    public function OrdersView(Request $request){//call when we refresh the page of order screen


        $currOrder=$this->getAllCurrentOrders();
        $Retailer_id = $request->session()->get('retailer_id');
        $drivers=Driver::where('retailer_id', $Retailer_id)->get();

        return response()->view('orders.orderview',['type'=>1,'CurrentOrders'=> $currOrder,'drivers'=>$drivers]);

    }

    public function completedOrders(Request $request){


        $order=$this->getCurrentOrderbyId($request->order_id);
        if($order==[]){
            $resp['status']=true;
            $resp['message']='Order not Exist.';
            return response()->json($resp);
        }else{
            $order_id=$order[0]->id;
            $drivers = $order['drivers']->name;
            $order_date=$order[0]->order_date;
            $address=$order[0]->address;
            $user_id = $order[0]->user_id;

            $res=CompletedOrder::insert(['order_id'=>$order_id,'order_date'=>$order_date,'address'=>$address,'status'=>1,'driver'=>$drivers,'user_id'=>$user_id]);
//       dd($res);
            if($res){
                CurrentOrder::where('id',$request->order_id)->delete();
                $resp['status']=true;
                $resp['message']='Order delivered.';
                return response()->json($resp);

            }else{
                $resp['status']=true;
                $resp['message']='Order not status not updated.';
                return response()->json($resp);
            }
        }

    }

    public function cancelOrders(Request $request){

        $order=$this->getCurrentOrderbyId($request->order_id);
//        dd($order);
        if($order==[]){
            $resp['status']=true;
            $resp['message']='Order not Exist.';
            return response()->json($resp);
        }else{
            if($order['drivers'] == []){
                $drivers = 'Not Assign';
            }
            else{
                $drivers = $order['drivers']->name;
            }
            $order_id=$order[0]->id;
            $order_date=$order[0]->order_date;
            $address=$order[0]->address;
            $user_id = $order[0]->user_id;
            $status = $order[0]->status;
            if($status==2 || $status == 3){
                $resp['status']=false;
                $resp['message']='Sorry!!! You can\'t cancel order right now.';
                return response()->json($resp);
            }
//            $cid=$
            $res=CompletedOrder::insert(['order_id'=>$order_id,'order_date'=>$order_date,'address'=>$address,'status'=>0,'driver'=>$drivers,'user_id'=>$user_id]);
//       dd($res);
            if($res){
                CurrentOrder::where('id',$request->order_id)->delete();
//                $msg=$this->sendNewOrderMessage('Order #'.$request->id.' is cancelled by user.');
                $resp['status']=true;
                $resp['message']='Order Cancelled';
                return response()->json($resp);

            }else{
                $resp['status']=false;
                $resp['message']='Order not Cancelled.';
                return response()->json($resp);
            }
        }

    }

    public function ChangeOrderStatus(Request $request){

        $order_id = $request->order_id;
        $order_status = $request->status;

        $res = CurrentOrder::where('id',$order_id)->update(['status' => $order_status]);

        if($res){
            return response()->json(['status'=>true,'message'=>'Updated']);
        }else{
            return response()->json(['status'=>false]);
        }

    }
}

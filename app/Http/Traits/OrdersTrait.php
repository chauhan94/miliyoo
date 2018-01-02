<?php
namespace App\Http\Traits;

use App\CompletedOrder;
use App\CurrentOrder;
use App\Driver;
use App\Order;
use App\RetailerAddress;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


trait OrdersTrait{
    function getCurrentOrders($uid){
        $finalOrders=[];
        $currOrders=CurrentOrder::where('cid',$uid)->orderBy('order_date','desc')->get();
        if($currOrders->count()){
            foreach ($currOrders as $order){
               $order_items= Order::where('order_id',$order->id)->get();
                $order_items=DB::select("select i.name,i.is_veg,i.is_combo,oi.price,oi.quantity from items i,order_items oi where i.id=oi.item_id and oi.order_id=".$order->id);
                $order['items']=$order_items;
                $address=CustomerAddress::where('id',$order->address_id)->get();
                $order['address']=$address[0];
                $finalOrders[]=$order;
            }
            return $currOrders;
        }else{
            return [];
        }
    }

    function getCurrentOrdersBydate($date){

        $finalOrders=[];
        $currOrders=CurrentOrder::where('order_date',$date)->orderBy('order_date','desc')->get();
        if($currOrders->count()){
            foreach ($currOrders as $order){

                $order_items= Order::where('order_id',$order->id)->get();
                $order_items=DB::select("select i.name,i.is_veg,i.is_combo,oi.price,oi.quantity from items i,order_items oi where i.id=oi.item_id and oi.order_id=".$order->id);
                $order['items']=$order_items;
                $address=CustomerAddress::where('id',$order->address_id)->get();
                $order['address']=$address[0];
                $finalOrders[]=$order;
            }
            return $currOrders;
        }else{
            return [];
        }
    }

    function getAllCurrentOrders(){
        $finalOrders=[];
        $currOrders=CurrentOrder::all();
        if($currOrders->count()){
            foreach ($currOrders as $order){
                $order_items= Order::where('order_id',$order->id)->get();

//                DB::connection()->enableQueryLog();
                $order_items=DB::select("select p.name,om.product_price,om.quantity from products p,orders_mappings om where p.id=om.product_id and om.order_id=".$order->id);
//                $queries = \DB::getQueryLog();
//        return dd($queries);


                $order['items']=$order_items;

                $customer=User::where('id',$order->user_id)->get();


//                dd($orderPartner);
                $order['customer']=$customer[0];
                $finalOrders[]=$order;
            }
            return $currOrders;
        }else{
            return [];
        }
    }

    function getCompletedOrders($uid,$date){
        $finalOrders=[];
        if($date==0)
        $currOrders=CompletedOrder::where('cid',$uid)->orderBy('order_date','desc')->get();
        else{
            $st=$date." 00:00:00";
            $end=$date." 23:59:59";

            $currOrders = CompletedOrder::where('cid',$uid)->whereRaw('order_date > \''. $st.'\' and order_date < \''.$end.'\'')->orderBy('order_date', 'desc')->get();
        }
        if($currOrders->count()){
            foreach ($currOrders as $order){
//               $order_items= Order::where('order_id',$order->order_id)->get();
                $order_items=DB::select("select i.name,i.is_veg,i.is_combo,oi.price,oi.quantity from items i,order_items oi where i.id=oi.item_id and oi.order_id=".$order->order_id);
                $order['items']=$order_items;
                $address=CustomerAddress::where('id',$order->address_id)->get();
                $customer=Customer::where('id',$order->cid)->get();
                $order['customer']=$customer[0];
                $order['address']=$address[0];
                $finalOrders[]=$order;
            }
            return $currOrders;
        }else{
            return [];
        }
    }

   function getAllCompletedOrders($date){
        $finalOrders=[];
       if($date==0) {
           $currOrders = CompletedOrder::orderBy('order_date', 'desc')->get();
       }else {
           $st=$date." 00:00:00";
           $end=$date." 23:59:59";

//           DB::connection()->enableQueryLog();
           $currOrders = CompletedOrder::whereRaw('order_date > \''. $st.'\' and order_date < \''.$end.'\'')->orderBy('order_date', 'desc')->get();
//                   $queries = \DB::getQueryLog();
//        return dd($queries);
//           dd($currOrders);
       }
        if($currOrders->count()){

                foreach ($currOrders as $order){
                    $order_items=DB::select("select p.name,p.price,p.quantity from products p,orders_mappings om where p.id=om.product_id and om.order_id=".$order->order_id);
                    $order['items']=$order_items;
                    $customer=User::where('id',$order->user_id)->get();
                    $order['customer']=$customer[0];
                    $finalOrders[]=$order;
            }
            return $currOrders;
        }else{
            return [];
        }
    }

    function getCurrentOrderbyId($id){
//       $final =[];
        $order=CurrentOrder::where('id',$id)->get();

        if($order->count()){

            $driver_id=$order[0]->driver_id;
            if($driver_id == 0){
                $order['drivers'] = [];
                return $order;
            }

            else{

                $drivers=Driver::where('id', $driver_id)->get();
                $order['drivers'] = $drivers[0];
                return $order;
            }


        }else
            return [];
    }

    public function sendNewOrderMessage($message){
        mail('care@bhukkadbites.com','Order Status',$message);
        $username="BHUKAD";

        $password="9971103052";



        $sender="BHUKAD"; //ex:INVITE

        $mobile_number='8920206970';

        $url="http://login.bulksmsgateway.in/sendmessage.php?user=".urlencode($username)."&password=".urlencode($password)."&mobile=".urlencode($mobile_number)."&message=".urlencode($message)."&sender=".urlencode($sender)."&type=".urlencode('3');

        $ch = curl_init($url);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $curl_scraped_page = curl_exec($ch);

        curl_close($ch);
        return $curl_scraped_page;
    }

}
?>

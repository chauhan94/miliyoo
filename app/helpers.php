<?php


function validateParams($request,$rules){
    $valid=Validator::make($request->all(),$rules);
    if($valid->fails()){
        $er=array();
        foreach ($valid->errors()->all() as $msg){
            array_push($er,$msg);
        }
        $resp['status']=false;
        $resp['param_err']=true;
        $resp['message']=$er;
        return $resp;

    }
    return true;

}

function validateRetailParams($request,$rules){
    $valid=Validator::make($request->all(),$rules);
    if($valid->fails()){
        $er=array();
        foreach ($valid->errors()->all() as $msg){
            array_push($er,$msg);
        }
        $resp['status']=false;
        $resp['param_err']=true;
        $resp['message']=$er;
        return $resp;

    }
    return true;

}

function generateOTP(){
    return rand(111111,999999);
}


function ContactMail($data){
    $mailTo = 'care@bhukkadbites.com';
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$data['from']."\r\n";

    $message="<html><body>";
    $message.="<div>";
    $message.="<div style='background:linear-gradient(red,white);border:2px solid black;broder-radius:2px;'>";
    $message.="<div style='text-align:center;margin:40px;'><img src='".URL::to('/')."/images/bb_logo.png' height=100% ></div>";

    $message.="<div style='font-size:18px;color:black;padding:18px;'>";
    $message.="<span style='margin:20px;'>Hi Team,</span><br/><br/>";
    $message.="<span style='margin-left:40px;float:left;font-size:17px;display: inline-block;'>".$data['message']."
            </span><br/><br/>";
    $message.="<span style='margin-left:40px;float:left;font-size:17px;display: inline-block;'>Contact Details:
            </span><br/>";
    $message.="<span style='margin-left:40px;float:left;font-size:17px;display: inline-block;'>Name:".$data['name']."
            </span><br/>";
    $message.="<span style='margin-left:40px;float:left;font-size:17px;display: inline-block;'>Email:".$data['from']."
            </span><br/>";
    $message.="<span style='margin-left:40px;float:left;font-size:17px;display: inline-block;'>Phone.".$data['phone']."
            </span><br/><br/>";
    $message.="<span>Thanks,<br/>Bhukkad Bites Team";
    $message.="</span>";
    $message.="</div></div></div>";
    $message.="</body></html>";

    if(mail($mailTo, $data['subject'], $message, $headers)){
        return true;
    }else{
        return false;
    }





}




function htmlmail($type,$data){
    $headers  = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: '.$data['from']."\r\n";
    $msg='';
    switch ($type){
        case 'adminResetPass':
            $msg=adminResetPass($data);
            break;
        case 'customerResetPass':
            $msg=customerResetPass($data);
            break;

        default:
            $msg="<h5>Hi,<br>Welcome to Miliyoo.</h5>";
            break;
    }

    if(mail($data['email'], $data['subject'], $msg, $headers)){
        return true;
    }else{
        return false;
    }


}


function adminResetPass($data){



    $message="<html><body>";
    $message.="<div>";
    $message.="<div style='border:2px solid black;broder-radius:2px;'>";
    $message.="<div style='text-align:center;margin:40px;'><img src='".URL::to('/')."/images/logo.png'></div>";
    $message.="<div style='font-size:18px;color:black;padding:18px;'>";
    $message.="<span style='margin:20px;'>Hi ".ucfirst($data['name']).",</span><br/><br/>";
    $message.="<span style='margin-left:40px;float:left;font-size:17px;display: inline-block;'>Please <a href='".$data['url']."'>Click Here</a> to reset your password.This is one time generated link.
            </span><br/><br/>";
    $message.="<span>Thanks,<br/>Miliyoo Team";
    $message.="</span>";
    $message.="</div></div></div>";
    $message.="</body></html>";

//dd($message);
//
    return $message;

}



function customerResetPass($data){



    $message="<html><body>";
    $message.="<div>";
    $message.="<div style='background:linear-gradient(red,white);border:2px solid black;broder-radius:2px;'>";
    $message.="<div style='text-align:center;margin:40px;'><img src='".URL::to('/')."/images/bb_logo.png' height=100% ></div>";
    $message.="<div style='font-size:18px;color:black;padding:18px;'>";
    $message.="<span style='margin:20px;'>Hi ".ucfirst($data['name']).",</span><br/><br/>";
    $message.="<span style='margin-left:40px;float:left;font-size:17px;display: inline-block;'>Please <a href='".$data['url']."'>Click Here</a> to reset your password.This is one time generated link.
            </span><br/><br/>";
    $message.="<span>Thanks,<br/>Bhukkad Bites Team";
    $message.="</span>";
    $message.="</div></div></div>";
    $message.="</body></html>";


//    echo($message);
    return $message;
}


?>
<?php 
ini_set('allow_url_fopen',1);
require_once 'db.php';
require_once 'vendor/autoload.php';
use Twilio\Rest\Client;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
header("Cache-Control: no-cache");
// $base_url='';
//DEFINE('BASEURL','http://property.nmx.com/dealer/');
DEFINE('BASEURL','http://yards360.com/');

class Common extends DB
{ 
    public  function registerbyEmail($data) {  

        // echo "<pre>";
        // print_r($data);
        // die;
        //$pass = md5($data['password']); 
        $created=date('Y-m-d'); 
        $otp = mt_rand(100000, 999999);

        date_default_timezone_set('Asia/Kolkata');

        $currentDate = date("H:i:s");
        $currentDate_timestamp = strtotime($currentDate);
        $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);

        $checkuser = $this->db->query("Select user_id from user_registration where email='".$data['userEmail']."'");  
        $result = mysqli_num_rows($checkuser);  
        if ($result == 0) {  

            $register = $this->db->query("INSERT INTO user_registration SET auth_type='Normal',fname='".$data['userName']."',lname = '".$data['lastName']."',email='".$data['userEmail']."',password='".$data['password']."',otp='".$otp."',time_expire='".$endDate_months."',is_active='0',created_at= '$created',status='0'") or die(mysqli_error($this->db));
           // $uid = mysqli_insert_id($this->db);
            if($register){

    //            $to = $data['userEmail'];
    //            $subject = "Rest & Go OTP";

    //            $message = "
    //            <html>
    //            <head>
    //            <title>Rest & Go OTP</title>
    //            </head>
    //            <body>
    //            <h3>Use this OTP</h3>
    //            <p>$otp</p>
    //            </body>
    //            </html>
    //            ";

    // //echo $message;

    //                     // Always set content-type when sending HTML email
    //            $headers = "MIME-Version: 1.0" . "\r\n";
    //            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //                     // More headers
    //            $headers .= 'From: <info@netmaxims.in>' . "\r\n";
    //            $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";

    //            $mail = mail($to,$subject,$message,$headers);

             return $otp;
         }else{
            return $otp;
        }

            //return $register;  
    }else{
        return 3;
    }  
}
      // For User Registration1//
public  function registerbyMobile($data) {  

        // echo "<pre>";
        // print_r($data);
        // die;
        //$pass = md5($data['password']); 
    $created=date('Y-m-d'); 
    $otp = mt_rand(100000, 999999);

    date_default_timezone_set('Asia/Kolkata');

    $currentDate = date("H:i:s");
    $currentDate_timestamp = strtotime($currentDate);
    $endDate_months = strtotime("+2 minutes", $currentDate_timestamp);

    $checkuser = $this->db->query("Select user_id from user_registration where mob_no='".$data['mobno']."'");  
    $result = mysqli_num_rows($checkuser);  
    if ($result == 0) {  

        $register = $this->db->query("INSERT INTO user_registration SET auth_type='Normal',fname='".$data['userName']."',lname = '".$data['lastName']."',mob_no='".$data['mobno']."',password='".$data['password']."',otp='".$otp."',time_expire='".$endDate_months."',is_active='0',created_at= '$created',status='0'") or die(mysqli_error($this->db));
           // $uid = mysqli_insert_id($this->db);
        if($register){

    //            $to = $data['userEmail'];
    //            $subject = "Rest & Go OTP";

    //            $message = "
    //            <html>
    //            <head>
    //            <title>Rest & Go OTP</title>
    //            </head>
    //            <body>
    //            <h3>Use this OTP</h3>
    //            <p>$otp</p>
    //            </body>
    //            </html>
    //            ";

    // //echo $message;

    //                     // Always set content-type when sending HTML email
    //            $headers = "MIME-Version: 1.0" . "\r\n";
    //            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    //                     // More headers
    //            $headers .= 'From: <info@netmaxims.in>' . "\r\n";
    //            $headers .= 'Cc: kanchan.netmaximus@gmail.com' . "\r\n";

    //            $mail = mail($to,$subject,$message,$headers);

         return $otp;





     }else{
        return $otp;
    }

            //return $register;  
}else{
    return 3;
}  
}


public  function propertyCategory($property_type) {  
    $result=$this->db->query("SELECT * FROM property_category where property_type='$property_type' and cat_status='1'") or die(mysqli_query($this->db));
    
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}  


public  function searchresultbuy($data,$dealer_id) {  
          // var_dump($data);die;
    $property_type=1;
    if($data['cat_id']==26){

        if(empty($data['price_range_min'] && $data['plot_area'] && $data['plot_size_area_value'])){

            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND property_type!='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."'") or die(mysqli_query($this->db)); 
        }else{

            // echo "SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']." AND status='1' AND Plot_Area_Unit='".$data['plot_size_area_value']."' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND Plot_Area='".$data['plot_area']."' AND property_type!='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."'";die;
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND Plot_Area_Unit='".$data['plot_size_area_value']."' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND Plot_Area='".$data['plot_area']."' AND property_type!='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']."") or die(mysqli_query($this->db)); 
        }

    }else if($data['cat_id']==27){
        if(empty($data['price_range_min'] && $data['plot_area'] && $data['plot_size_area_value'] && $data['cons_status'] && $data['show_bkh'])){
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND property_type!='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."'") or die(mysqli_query($this->db)); 
        }else{
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND Super_Built_Up_Area_Unit='".$data['plot_size_area_value']."' AND construction_status='".$data['cons_status']."' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND Super_Built_Up_Area='".$data['plot_area']."' AND Bedroom='".$data['show_bkh']."' AND property_type!='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']."") or die(mysqli_query($this->db)); 
        }

    }else{
        if(empty($data['price_range_min'] && $data['plot_area'] && $data['plot_size_area_value'] && $data['cons_status'] && $data['show_bkh'])){
         $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1'  AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND property_type!='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."'") or die(mysqli_query($this->db)); 
     }else{
        $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND construction_status=".$data['cons_status']." AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND Plot_Area_Unit='".$data['plot_size_area_value']."'  AND cat_id='".$data['cat_id']."' AND Bedroom='".$data['show_bkh']."' AND Plot_Area='".$data['plot_area']."' AND property_type!='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']." ") or die(mysqli_query($this->db)); 
    }

}



$num=mysqli_num_rows($result);
if($num>0){
 while($row = mysqli_fetch_array($result)){
    $data1[]=$row;
} 
}else{
    $data1='';
}


return $data1;
}



public  function searchresultrent($data,$dealer_id) {  
    $property_type=1;//for rent only
    if($data['cat_id']==26){

        if(empty($data['price_range_min'] && $data['plot_area'] && $data['plot_size_area_value'])){
            // echo "SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND property_option='0' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND property_type='".$property_type."'";
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND property_type='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."'") or die(mysqli_query($this->db)); 
        }else{
             // echo "SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND Plot_Area_Unit='".$data['plot_size_area_value']."' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND Plot_Area='".$data['plot_area']."' AND property_type='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']."";die;
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND Plot_Area_Unit='".$data['plot_size_area_value']."' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND Plot_Area='".$data['plot_area']."' AND property_type='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']."") or die(mysqli_query($this->db)); 
        }

    }else if($data['cat_id']==27){

        if(empty($data['price_range_min'] && $data['plot_area'] && $data['plot_size_area_value'] && $data['cons_status'] && $data['show_bkh'])){
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND property_type='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."'") or die(mysqli_query($this->db)); 
        }else{
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND Super_Built_Up_Area_Unit='".$data['plot_size_area_value']."' AND construction_status='".$data['cons_status']."' AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND Super_Built_Up_Area='".$data['plot_area']."' AND Bedroom='".$data['show_bkh']."' AND property_type='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']."") or die(mysqli_query($this->db)); 
        }

    }else{
        if(empty($data['price_range_min'] && $data['plot_area'] && $data['plot_size_area_value'] && $data['cons_status'] && $data['show_bkh'])){
         $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1'  AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND cat_id='".$data['cat_id']."' AND property_type='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."'") or die(mysqli_query($this->db)); 
     }else{
        $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['choose_type']."' AND status='1' AND construction_status=".$data['cons_status']." AND city LIKE '".$data['searching']."%' OR sector LIKE '".$data['searching']."%' AND Plot_Area_Unit='".$data['plot_size_area_value']."'  AND cat_id='".$data['cat_id']."' AND Bedroom='".$data['show_bkh']."' AND Plot_Area='".$data['plot_area']."' AND property_type='".$property_type."' AND property_option='0' AND dealer_id!='".$dealer_id."' AND price BETWEEN ".$data['price_range_min']." AND ".$data['price_range_max']."") or die(mysqli_query($this->db)); 
    }



}  
$num=mysqli_num_rows($result);
if($num>0){
 while($row = mysqli_fetch_array($result)){
    $data1[]=$row;
} 
}else{
    $data1='';
}
//var_dump($data1);die;

return $data1;
}


public  function propertysize() {  
    $result=$this->db->query("SELECT * FROM property_size where size_status='1'") or die(mysqli_query($this->db));
    
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}
return $data;
}  



// Get requirement after add any property
public  function getRequirementFromProperty($data,$property_for,$property_option) {
    // echo '<pre>';
    // var_dump($data);
    // echo $property_for;

    if($property_for=='0'){
         // echo $property_option;
        $price=$data['price'];
        $amt_price=$price*20/100;
        $min_price=$price-$amt_price;
        $max_price=$price+$amt_price;
        if($property_option=='0'){
           if($data['cat_id']==26){
            // echo "SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."' AND price BETWEEN ".$min_price." AND ".$max_price."";die;
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."' AND price BETWEEN ".$min_price." AND ".$max_price."") or die(mysqli_query($this->db)); 
        }else if($data['cat_id']==27){
        // echo "SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['show_bkh']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option=".$property_option." AND city='".$data['city']."%' AND sector='".$data['sector']."%' AND cat_id='".$data['cat_id']."'";die;
            $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['Bedroom']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'") or die(mysqli_query($this->db)); 
        }else{
         // echo "SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['Bedroom']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'";die;
           $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['Bedroom']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'") or die(mysqli_query($this->db)); 
       }
   }else{
    if($data['cat_id']==26){
        // echo "SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND price BETWEEN ".$min_price." AND ".$max_price."";
        $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."' AND price BETWEEN ".$min_price." AND ".$max_price."") or die(mysqli_query($this->db)); 
    }else if($data['cat_id']==27){
         // echo "SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['Bedroom']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."%' AND sector='".$data['sector']."%' AND cat_id='".$data['cat_id']."'";
        $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['Bedroom']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'") or die(mysqli_query($this->db)); 
    }else{
        //echo "SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['show_bkh']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option=".$property_option." AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."'";die;
       $result=$this->db->query("SELECT * FROM residential_properties where property_for='".$data['property_for']."' AND Bedroom='".$data['Bedroom']."' AND price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'") or die(mysqli_query($this->db)); 
   }
}
}else{
    $price=$data['Expected_Price'];
    $amt_price=$price*20/100;
    $min_price=$price-$amt_price;
    $max_price=$price+$amt_price;
    if($property_option=='0'){
        if($data['cat_id']=='30'){
            // echo "SELECT * FROM commercial_properties where property_for='".$data['property_for']."' AND Expected_Price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND Super_Area='".$data['Super_Area']."' AND Super_Area_Unit='".$data['Super_Area_Unit']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'";die;
            $result=$this->db->query("SELECT * FROM commercial_properties where property_for='".$data['property_for']."' AND Expected_Price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND Super_Area='".$data['Super_Area']."' AND Super_Area_Unit='".$data['Super_Area_Unit']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'") or die(mysqli_query($this->db));
        }
    }else{
      $result=$this->db->query("SELECT * FROM commercial_properties where property_for='".$data['property_for']."' AND Expected_Price BETWEEN ".$min_price." AND ".$max_price." AND status='1' AND property_option='".$property_option."' AND city='".$data['city']."' AND Super_Area='".$data['Super_Area']."' AND Super_Area_Unit='".$data['Super_Area_Unit']."' AND sector='".$data['sector']."' AND cat_id='".$data['cat_id']."' AND dealer_id!='".$data['dealer_id']."'") or die(mysqli_query($this->db));
  }
}


$num=mysqli_num_rows($result);
if($num>0){
 while($row = mysqli_fetch_array($result)){
    $data1[]=$row;
} 
}else{
    $data1='';
}
// var_dump($data1);
return $data1;
}  



/*Get Requirement by Dealer Id*/
public  function getResiRequirementByDealerId($dealer_id) {  
   // echo "SELECT * FROM residential_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1'";die;
    $result=$this->db->query("SELECT * FROM residential_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data1[]=$row;
    } 
}else{
    $data1='';
}

if(!empty($data1)){
    // echo '<pre>';
    // var_dump($data1);die;
    foreach($data1 as $data){
        // echo '<pre>';
        // var_dump($data);
        $property_for=$data['property_for'];
        $property_option='0';
        $getresult1=$this->getRequirementFromProperty($data,$property_for,$property_option);
        if(!empty($getresult1)){
            $getresult[]=$getresult1;
        }
    }
    if(!empty($getresult)){
        return $getresult;
    }else{
        $getresult='';
    }
}

}
/*Close Get Requirement By Dealer Id*/

/*Get Expired Requirement By Dealer id*/
public  function getResiExpRequirementByDealerId($dealer_id) {  

    $today=date('Y-m-d H:i:s');
    // echo "SELECT * FROM residential_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1' and expired_by>'".$today."'";die;
    $result=$this->db->query("SELECT * FROM residential_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1' and expired_by>'".$today."'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data1[]=$row;
    } 
}else{
    $data1='';
}

}


/*Close Get Expired Requirement By Dealer Id*/




/*Get Commercial Requirement by dealer Id*/
public  function getCommRequirementByDealerId($dealer_id) {  
   // echo "SELECT * FROM residential_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1'";die;
    $result=$this->db->query("SELECT * FROM commercial_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data1[]=$row;
    } 
}else{
    $data1='';
}

if(!empty($data1)){
    // echo '<pre>';
    // var_dump($data1);die;
    foreach($data1 as $data){
        // echo '<pre>';
        // var_dump($data);
        $property_for=$data['property_for'];
        $property_option='0';
        $getresult1=$this->getRequirementFromProperty($data,$property_for,$property_option);
        if(!empty($getresult1)){
            $getresult[]=$getresult1;
        }
    }
    if(!empty($getresult)){
        return $getresult;
    }else{
        $getresult='';
    }
}

}
/*Close Get Commercial Requirement by Dealer Id*/

/*Get Expired Commercial Requirement By Dealer Id*/
public  function getExpCommRequirementByDealerId($dealer_id) {  
   // echo "SELECT * FROM residential_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1'";die;
    $today=date('Y-m-d H:i:s');
    $result=$this->db->query("SELECT * FROM commercial_properties where dealer_id='".$dealer_id."' and property_option='1' and property_for='0' and status='1' and expired_by>'".$today."'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data1[]=$row;
    } 
}else{
    $data1='';
}

}


/*Close Get Expired Commercial Requirement By Dealer Id*/




/*Get Favorite Residential Properties by Dealer Id*/
public  function getFavResiPropertyByDealerId($dealer_id) {  
  // echo "SELECT fav_requirement.fav_id,residential_properties.* FROM fav_requirement INNER JOIN residential_properties ON fav_requirement.property_id=residential_properties.property_id where fav_requirement.dealer_id='".$dealer_id."'";die;
    $result=$this->db->query("SELECT fav_requirement.fav_id,residential_properties.* FROM fav_requirement INNER JOIN residential_properties ON fav_requirement.property_id=residential_properties.property_id where fav_requirement.dealer_id='".$dealer_id."'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}

 // var_dump($data);die;
return $data;
}
/*Close Get Favorite Residencial Properties by Dealer Id*/




/*Get Sell Fav Properties*/
public  function getsellFavResiPropertyByDealerId($dealer_id) {  
  // echo "SELECT fav_requirement.fav_id,residential_properties.* FROM fav_requirement INNER JOIN residential_properties ON fav_requirement.property_id=residential_properties.property_id where fav_requirement.dealer_id='".$dealer_id."'";die;
    $result=$this->db->query("SELECT sell_fav_requirement.sell_fav_id,residential_properties.* FROM sell_fav_requirement INNER JOIN residential_properties ON sell_fav_requirement.property_id=residential_properties.property_id where sell_fav_requirement.dealer_id='".$dealer_id."'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}

 // var_dump($data);die;
return $data;
}

/*Get Sell Fav Properties Close*/

/*Get Favorite Commercial Properties By Dealer Id*/
/*Get Favorite Residential Properties by Dealer Id*/
public  function getFavCommPropertyByDealerId($dealer_id) {  
  // echo "SELECT fav_requirement.fav_id,residential_properties.* FROM fav_requirement INNER JOIN residential_properties ON fav_requirement.property_id=residential_properties.property_id where fav_requirement.dealer_id='".$dealer_id."'";die;
    $result=$this->db->query("SELECT fav_requirement.fav_id,commercial_properties.* FROM fav_requirement INNER JOIN commercial_properties ON fav_requirement.property_id=commercial_properties.property_id where fav_requirement.dealer_id='".$dealer_id."'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}

 // var_dump($data);die;
return $data;
}
/*Close Get Favorite Commercial Properties By Dealer Id*/

/*Get fav prperty Exist or Not by dealer id*/
public  function getFavPropertyByDealerId($property_id,$dealer_id) {  
    $result=$this->db->query("SELECT fav_id FROM fav_requirement where dealer_id='".$dealer_id."' and property_id='".$property_id."'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
        return true;
    }else{
        return false;
    }
}

/*Close Get fav prperty Exist or Not by dealer id*/

// get subcategory from residential category
public  function residentialsubCategory($resi_cat_id) {  
   // echo "SELECT * FROM property_subcategory where cat_id='".$resi_cat_id."' and property_type='0' and status='1'";die;
    $result=$this->db->query("SELECT * FROM property_subcategory where cat_id='".$resi_cat_id."' and property_type='0' and status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}


// get subcategory from residential category
public  function property_option($resi_cat_id) {  
  // echo "SELECT * FROM property_subchildcategory where cat_id='".$resi_cat_id."' and property_type='0' and property_option='0' and status='1'";die;
    $result=$this->db->query("SELECT * FROM property_subchildcategory where cat_id='".$resi_cat_id."' and property_type='0' and property_option='0' and status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}

// get subcategory from residential category
public  function property_option_for_requirement($resi_cat_id) {  
   // echo "SELECT * FROM property_subchildcategory where cat_id='".$resi_cat_id."' and property_type='0' and property_option='1' and status='1'";
    $result=$this->db->query("SELECT * FROM property_subchildcategory where cat_id='".$resi_cat_id."' and property_type='0' and property_option='1' and status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}



// get subcategory from commercial category
public  function commercialsubCategory($comm_cat_id) {  
    // echo "SELECT * FROM property_subcategory where cat_id='".$resi_cat_id."' and property_type='0' and status='1'";die;
    $result=$this->db->query("SELECT * FROM property_subcategory where cat_id='".$comm_cat_id."' and property_type='1' and status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}

// get childcategory from sub category
public  function childsubCategory($subcat_id,$property_option,$property_type) {  
     // echo "SELECT * FROM property_subchildcategory where subcat_id='".$subcat_id."' and status='1' and property_option='".$property_option."' and property_type='".$property_type."'";die;
    $result=$this->db->query("SELECT * FROM property_subchildcategory where subcat_id='".$subcat_id."' and status='1' and property_option='".$property_option."' and property_type='".$property_type."'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}

// get childcategory from sub category
public  function childsubCategory_requirement($subcat_id,$property_option,$property_type) {  
  // echo "SELECT * FROM property_subchildcategory where subcat_id='".$subcat_id."' and status='1' and property_option='".$property_option."' and property_type='".$property_type."'";die;
  $result=$this->db->query("SELECT * FROM property_subchildcategory where subcat_id='".$subcat_id."' and status='1' and property_option='".$property_option."' and property_type='".$property_type."'") or die(mysqli_query($this->db));
  $num=mysqli_num_rows($result);
  if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}



public  function propertytypesize($subchildcat_id) {  
    // echo "SELECT * FROM property_subchildcategory where subcat_id='".$subcat_id."' and status='1'";die;
    $result=$this->db->query("SELECT * FROM unit_size where child_subcat_id='".$subchildcat_id."' and status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
        $data1=mysqli_fetch_array($result);
        $data2=explode(',',$data1['unit_size']);
        for($i=0;$i<=count($data2)-1;$i++){
            $data[]=array('size'=>$data2[$i]);
        }
    }else{
        $data='';
    }
    return $data;
}


public  function checkOTPByEmail($otp,$email) { 
    // /echo "SELECT * FROM user_registration where email='$email' and otp='$otp'";die;
    $result=$this->db->query("SELECT * FROM user_registration where email='$email' and otp='$otp'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);
    if($num=='1'){
       $register = $this->db->query("UPDATE user_registration SET is_active='1' where email='$email'") or die(mysqli_error($this->db));
       if($register){
        return 1;
    }
}else{
   return 0;
}

}
public  function checkOTPByMob($otp,$mob) { 

    $result=$this->db->query("SELECT * FROM user_registration where mob_no='$mob' and otp='$otp'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);  
    if($num=='1'){
       $register = $this->db->query("UPDATE user_registration SET is_active='1' where mob_no='$mob'") or die(mysqli_error($this->db));
       if($register){
        return 1;
    }
}else{
   return 0;
}

}



/*Update and Insert property Views*/
public function addViews($dealer_id,$property_id){
    $result=$this->db->query("SELECT * FROM property_views where property_id=".$property_id."") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);
    $num=mysqli_num_rows($result);  
    if($num=='1'){
       $register = $this->db->query("UPDATE property_views SET views=views+1 where property_id=".$property_id."") or die(mysqli_error($this->db));
       if($register){
        return 1;
    }
}else{
  $table='property_views';
  $data=array('dealer_id'=>$dealer_id,'property_id'=>$property_id,'views'=>'1');
  $result=$this->insert($table,$data);
  return 2;
}
}


/*Close Update and Insert property Views*/


/*Views Count From Unique Users*/
public function getViewfromUnique($property_id){
    // echo "SELECT DISTINCT(dealer_id) FROM property_views where property_id=".$property_id."";die;
   $result=$this->db->query("SELECT DISTINCT(dealer_id) FROM property_views where property_id=".$property_id."") or die(mysqli_query($this->db));

   $num=mysqli_num_rows($result);
   if($num>0){
        // echo 'chirag';
     while($row = mysqli_fetch_array($result)){
      $data[]=$row;
  }
  return $data;
}else{
    return $data='';
}
}


/*Close Vies Count From Unique Users*/



public  function ResendOTP($otp) {  

    $result=$this->db->query("UPDATE user_registration INNER JOIN users ON users.user_id=users_info.user_id SET users.status='2',users_info.status='2' where users.user_id='$user_id'") or die(mysqli_query($this->db));
    $row = mysqli_fetch_array($result);  
    return $row;  
}   



    //Update user account for deactivation users_info and users
public  function DeactivateAccount($user_id) {  


    $created=date('Y-m-d');

    $register = $this->db->query("UPDATE users_info INNER JOIN users ON users.user_id=users_info.user_id SET users.status='2',users_info.status='2' where users.user_id='$user_id'") or die(mysqli_error($conn));
    if($register){
        $data['result']=1;
        return $data;
    }else{
        return 0;
    }

            //return $register;   
}



public  function loginbymob($mob,$password) {  
    $check = $this->db->query("SELECT * FROM user_registration where mob_no='$mob' and password='$password' and is_active='1'") or die(mysqli_query($this->db));
    $result = mysqli_num_rows($check);  
    if ($result == 1) {  
        $data = mysqli_fetch_array($check); 
        $result1['result']='1';
        $result1['user_id'] = $data['user_id']; 
        //$result1['status']=$data['status'];

    } else {  
     $result1['result']='0';
 }  
 return $result1;
}  



    // check password and update new password
public  function checkpassword($current_password,$user_id,$new_password) {  
    $pass = md5($current_password);
    $pass1 = md5($new_password);  
    $date=date('Y-m-d');
        //$date=date('2018-02-29 00:00:00');
    $date1 = strtotime($date);

    $check = $this->db->query("SELECT * FROM users where password='$pass' and user_id='$user_id'") or die(mysqli_query($this->db));
    $result = mysqli_num_rows($check);  
    if ($result == 1) {  
      $update = $this->db->query("UPDATE users SET password='$pass1' where user_id='$user_id'") or die(mysqli_query($this->db));
      return 1;
  } else {  
    return 0;  
}  
}  


    // Close friend list
// Check Friend 

// Get all Area/sector from cities

// get subcategory from residential category
public  function getAreaSector($city_id) {  
   // echo "SELECT * FROM property_subcategory where cat_id='".$resi_cat_id."' and property_type='0' and status='1'";die;
    $result=$this->db->query("SELECT * FROM location where city_id='".$city_id."' AND status='1'") or die(mysqli_query($this->db));
    $num=mysqli_num_rows($result);
    if($num>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    } 
}else{
    $data='';
}


return $data;
}






                                // Close fetch Profile visits



public  function session() {  
    if (isset($_SESSION['login'])) {  
        return $_SESSION['login'];  
    }  
}  

public  function logout() {  
    $_SESSION['login'] = false;  
    session_destroy();  
}  

    // Get user details using user_id

public function UserInfo($user_id){

    $selectuser = $this->db->query("SELECT users.*,users_info.* FROM users_info INNER JOIN users ON users.user_id=users_info.user_id where users.user_id='$user_id'");
    $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
    return $fetch;
}

     // Get user details using user_id

public function GetAllUsers(){

    $selectuser = $this->db->query("SELECT * FROM users WHERE status='1'");
    while($fetch=mysqli_fetch_array($selectuser)){
        $data[]=$fetch;
    }
    return $data;
}

     // Get user details using user_id

public function deleteproperty($property_id){

    $selectuser = $this->db->query("DELETE FROM residential_properties WHERE property_id='".$property_id."'");
    return 1;
}


/*Delete Commercial Property*/
public function deletePropertyComm($property_id){

    $selectuser = $this->db->query("DELETE FROM commercial_properties WHERE property_id='".$property_id."'");
    return 1;
}

/*Close Delete Commercial Property*/

/*Add Requirement in fav list of dealer*/
public function addFavRequirement($property_id,$dealer_id){
    $table='fav_requirement';
    $data=array('dealer_id'=>$dealer_id,'property_id'=>$property_id,'status'=>'1');
    $result=$this->insert($table,$data);
    return 1;
}

/*Close Requirement in fav list of dealer*/
public function addSellFavRequirement($property_id,$dealer_id){
    $table='sell_fav_requirement';
    $data=array('dealer_id'=>$dealer_id,'property_id'=>$property_id,'status'=>'1');
    $result=$this->insert($table,$data);
    return 1;
}

/*Remove Requirement in fav list of dealer*/
public function delFavRequirement($property_id,$dealer_id){
    $selectuser = $this->db->query("DELETE FROM fav_requirement WHERE property_id='".$property_id."' and dealer_id='".$dealer_id."' and status='1'");
    return 1;
}

/*Close Requirement in Remove fav list of dealer*/
public function delSellFavRequirement($property_id,$dealer_id){
    $selectuser = $this->db->query("DELETE FROM sell_fav_requirement WHERE property_id='".$property_id."' and dealer_id='".$dealer_id."' and status='1'");
    return 1;
}



     // Get user details by user_id in user_info

public function UserInfobyId($id){
    $selectuser = $this->db->query("SELECT * FROM  user_registration where user_id='$id'");
    $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
    return $fetch;
}
    // Get user details using user_id

public function UserImage($user_id){
    $selectuser = $this->db->query("SELECT * FROM users where user_id='$user_id'");
    $fetch=mysqli_fetch_array($selectuser);
        // foreach ($fetch as $user) {
        //     $data[]=$user;
        // }
    return $fetch;
}

    // User search result on user dashboard by default
public function UserSearchResult(){

    // $time=$data[0]['time'];
    // $time1=$data[0]['time1'];
    // $date11=$data[0]['date'];
    // $date22=$data[0]['date1'];
    // $date = date("Y-m-d", strtotime($date11));
    // $date1 = date("Y-m-d", strtotime($date22));
    // $longitude=$data[0]['longitude'];
    // $latitude=$data[0]['latitude'];
    // $longitude=28.3743;
    // $latitude=77.3293;
    // if(!empty($time && $time1)){
    if(1==1){
       $selectuser = $this->db->query("  SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='04:00' and ci_hotels.check_out>='06:00' AND ci_room_type.status='1' AND  ci_room_type.adult_person_capacity>=3 AND ci_room_type.child_capacity>=2 AND ci_hotels.any='3' OR ci_hotels.any='1'  ORDER BY ((ci_hotels.hotel_latitude- 28.367976)*(ci_hotels.hotel_latitude- 28.367976)) + ((ci_hotels.hotel_longitude - 77.329549)*(ci_hotels.hotel_longitude- 77.329549)) ASC") or die(mysqli_error($this->db));
    //$selectuser = $this->db->query("SELECT users.username,users_info.* FROM users_info INNER JOIN users ON users_info.user_id=users.user_id where vegetarian='".$data['vegetarian']."' and users_info.status='0'") or die(mysqli_error($this->db));
   }else{
    $selectuser = $this->db->query("  SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.check_in<='04:00' and ci_hotels.check_out>='06:00' AND ci_room_type.status='1' AND  ci_room_type.adult_person_capacity>=3 AND ci_room_type.child_capacity>=2 AND ci_hotels.any='1'  ORDER BY ((ci_hotels.hotel_latitude- 28.367976)*(ci_hotels.hotel_latitude- 28.367976)) + ((ci_hotels.hotel_longitude - 77.329549)*(ci_hotels.hotel_longitude- 77.329549)) ASC") or die(mysqli_error($this->db));
}


    // $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id WHERE ci_hotels.check_in<='$date' and ci_hotels.check_out>='$date1' AND ci_hotels.hotel_status='1' ORDER BY ((ci_hotels.hotel_latitude-$latitude)*(ci_hotels.hotel_latitude-$latitude)) + ((ci_hotels.hotel_longitude - $longitude)*(ci_hotels.hotel_longitude- $longitude)) ASC") or die(mysqli_error($this->db));
    //$selectuser = $this->db->query("SELECT users.username,users_info.* FROM users_info INNER JOIN users ON users_info.user_id=users.user_id where vegetarian='".$data['vegetarian']."' and users_info.status='0'") or die(mysqli_error($this->db));
$fetch_num=mysqli_num_rows($selectuser);
if($fetch_num>0){
  while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1[]=$fetch;
}


return $fetch1;
}else{
  return 0;
}
}

public function Hoteldetailbyid($id){


   $selectuser = $this->db->query("SELECT ci_hotels.*,ci_room_type.* FROM ci_hotels INNER JOIN ci_room_type ON ci_hotels.hotel_id=ci_room_type.hotel_id AND ci_hotels.hotel_status=ci_room_type.status WHERE ci_hotels.hotel_id = $id") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
   $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      // while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1=$fetch;
      // }
    return $fetch1;
}else{
  return 0;
}
}

public function Roomdetailbyid($id){


   $selectuser = $this->db->query("SELECT * FROM ci_room_type  WHERE room_type_id = $id") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
   $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      // while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1=$fetch;
      // }
    return $fetch1;
}else{
  return 0;
}
}


/*Get CategoryName from category id*/
public function getCategoryName($id){
// echo "SELECT property_category.cat_name,property_subcategory.subcat_name FROM property_category  LEFT JOIN property_subcategory ON property_category.cat_id=property_subcategory.cat_id WHERE property_category.cat_id = $id";

   $selectuser = $this->db->query("SELECT property_category.cat_name,property_subcategory.subcat_name FROM property_category  LEFT JOIN property_subcategory ON property_category.cat_id=property_subcategory.cat_id WHERE property_category.cat_id = $id") or die(mysqli_error($this->db));  
   $fetch_num=mysqli_num_rows($selectuser);
   $fetch=mysqli_fetch_array($selectuser);
   if($fetch_num>0){
      // while($fetch=mysqli_fetch_array($selectuser)){
    $fetch1=$fetch;
      // }
    return $fetch1;
}else{
  return 0;
}
}


/*Close Category*/


// Get Property from dealers
public function getdealerproperty($dealer_id,$type){

    $property_option=0;//for only sell and rent case
    $today=date('Y-m-d h:i:s');

    switch ($type) {
        case 'Active':
        $selectproperties = $this->db->query("SELECT residential_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM residential_properties INNER JOIN property_category ON residential_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON residential_properties.subcat_id=property_subcategory.subcat_id where residential_properties.dealer_id='".$dealer_id."' AND residential_properties.property_option='".$property_option."' AND expired_by>='".$today."'") or die(mysqli_error($this->db)); 
        break;

        case 'Expired':
        $selectproperties = $this->db->query("SELECT residential_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM residential_properties INNER JOIN property_category ON residential_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON residential_properties.subcat_id=property_subcategory.subcat_id where residential_properties.dealer_id='".$dealer_id."' AND residential_properties.property_option='".$property_option."' AND expired_by<'".$today."'") or die(mysqli_error($this->db)); 
        break;
        
        default:
        $selectproperties = $this->db->query("SELECT residential_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM residential_properties INNER JOIN property_category ON residential_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON residential_properties.subcat_id=property_subcategory.subcat_id where residential_properties.dealer_id='".$dealer_id."' AND residential_properties.property_option='".$property_option."'") or die(mysqli_error($this->db)); 
        break;
    }
    
    $fetch_num=mysqli_num_rows($selectproperties);
    if($fetch_num>0){
       while($fetch=mysqli_fetch_array($selectproperties)){
        $fetch1[]=$fetch;
    }
    return $fetch1;
}else{
  return 0;
}
}

/*Get Dealer Coomercial Properties*/
public function getDealerCommProperty($dealer_id,$type){

    $property_option=0;//for only sell and rent case
    $today=date('Y-m-d h:i:s');
    switch ($type) {
        case 'Active':
        $selectproperties = $this->db->query("SELECT commercial_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM commercial_properties INNER JOIN property_category ON commercial_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON commercial_properties.subcat_id=property_subcategory.subcat_id where commercial_properties.dealer_id='".$dealer_id."' AND commercial_properties.property_option='".$property_option."' AND expired_by>='".$today."'") or die(mysqli_error($this->db));  
        break;

        case 'Expired':
        $selectproperties = $this->db->query("SELECT commercial_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM commercial_properties INNER JOIN property_category ON commercial_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON commercial_properties.subcat_id=property_subcategory.subcat_id where commercial_properties.dealer_id='".$dealer_id."' AND commercial_properties.property_option='".$property_option."' AND expired_by<'".$today."'") or die(mysqli_error($this->db));  
        break;
        
        default:
        $selectproperties = $this->db->query("SELECT commercial_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM commercial_properties INNER JOIN property_category ON commercial_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON commercial_properties.subcat_id=property_subcategory.subcat_id where commercial_properties.dealer_id='".$dealer_id."' AND commercial_properties.property_option='".$property_option."'") or die(mysqli_error($this->db));  
        break;
    }

    $fetch_num=mysqli_num_rows($selectproperties);
    if($fetch_num>0){
       while($fetch=mysqli_fetch_array($selectproperties)){
        $fetch1[]=$fetch;
    }
    return $fetch1;
}else{
  return 0;
}
}



/*Get Dealer Commercial Properties Close*/

public function getdealerpropertyrequriment($dealer_id){

     $property_option=1;//for only purchase

     $selectproperties = $this->db->query("SELECT residential_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM residential_properties INNER JOIN property_category ON residential_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON residential_properties.subcat_id=property_subcategory.subcat_id where residential_properties.dealer_id='".$dealer_id."' AND residential_properties.property_option='".$property_option."'") or die(mysqli_error($this->db));  
     $fetch_num=mysqli_num_rows($selectproperties);
     if($fetch_num>0){
       while($fetch=mysqli_fetch_array($selectproperties)){
        $fetch1[]=$fetch;
    }
    return $fetch1;
}else{
  return 0;
}
}


public function getpropertybyid($id,$property_for){

    switch ($property_for) {
        case 0:
        $selectproperties = $this->db->query("SELECT * FROM residential_properties  WHERE property_id ='".$id."'") or die(mysqli_error($this->db));  
        break;
        
        case 1:
        $selectproperties = $this->db->query("SELECT * FROM commercial_properties  WHERE property_id ='".$id."'") or die(mysqli_error($this->db));  
        break;
    }

    $fetch_num=mysqli_num_rows($selectproperties);

    if($fetch_num>0){
      $fetch1=mysqli_fetch_array($selectproperties);
      return $fetch1;
  }else{
      return 0;
  }
}



public function GetRoomtypeByHotelId($data){

   $selectuser = $this->db->query("SELECT * FROM ci_room_type WHERE hotel_id = '$data'") or die(mysqli_error($this->db));


   $fetch_num=mysqli_num_rows($selectuser);
   if($fetch_num>0){
      while($fetch=mysqli_fetch_array($selectuser)){
        $fetch1[]=$fetch;
    }


    return $fetch1;
}else{
  return 0;
}
}



     // Get user details using user_id

public function update($tablename,$data,$condition){
   if (count($data) > 0) {
    foreach ($data as $key => $value) {

        $value = "'$value'";
        $updates[] = "$key = $value";
    }
}
if (count($condition) > 0) {
    foreach ($condition as $key => $value) {

        $value = "'$value'";
        $conditions[] = "$key = $value";
    }
}
$implodeArray = implode(', ', $updates);
$implodeArray1 = implode(', ', $conditions);
 // echo "UPDATE $tablename SET $implodeArray  where  $implodeArray1";die;
$selectuser = $this->db->query("UPDATE $tablename SET $implodeArray  where  $implodeArray1") or die(mysqli_error($this->db));

if($selectuser){
    return '1';
}else{
    return '0';
}
}



/*Update response*/

function responseSocial($table,$dealer_id,$property_id,$track){
  switch ($track) {
    case '1':
    $selectuser = $this->db->query("UPDATE $table SET whatsapp='1'  where  dealer_id='$dealer_id' AND property_id='$property_id'") or die(mysqli_error($this->db));
    break;
    case '2':
    $selectuser = $this->db->query("UPDATE $table SET call_to_user='1'  where  dealer_id='$dealer_id' AND property_id='$property_id'") or die(mysqli_error($this->db));
    break;
    case '3':
    $selectuser = $this->db->query("UPDATE $table SET mail='1'  where  dealer_id='$dealer_id' AND property_id='$property_id'") or die(mysqli_error($this->db));
    break;
}

}

/*Close update response*/


public function insert($table, $data) {
    $key = array_keys($data);
    $val = array_values($data);
    // echo "INSERT INTO $table (" . implode(', ', $key) . ") "
    //    . "VALUES ('" . implode("', '", $val) . "')";die;
    $sql = $this->db->query("INSERT INTO $table (" . implode(', ', $key) . ") "
       . "VALUES ('" . implode("', '", $val) . "')") or die(mysqli_error($this->db));

    if($sql){
        return '1';
    }else{
        return '0';
    }

}





	// start user by user id

public function UserbyId($user_id){

    $selectuser = $this->db->query("SELECT * FROM users where user_id='$user_id'");
    $fetch=mysqli_fetch_array($selectuser);

    return $fetch;
}


/*For get data from response tracker from dealer_id and property_id*/
public function getResponseTrack($dealer_id,$property_id){
    $selectuser = $this->db->query("SELECT * FROM response_tracker where dealer_id='".$dealer_id."' and property_id='".$property_id."'");
    $fetch=mysqli_num_rows($selectuser);
    return $fetch;
}

/*Close For get data from response tracker from dealer_id and property_id*/

/*For get data from response tracker from dealer_id and property_id*/
public function getResponseTrackDetail($dealer_id,$property_id){
    $selectuser = $this->db->query("SELECT * FROM response_tracker where dealer_id='".$dealer_id."' and property_id='".$property_id."'");
    $fetch=mysqli_num_rows($selectuser);
    if($fetch>0){
     $fetch=mysqli_fetch_array($selectuser);
     return $fetch;
 }else{
    return 0;
}

}

/*Close For get data from response tracker from dealer_id and property_id*/



public  function ViewFetchFriend($user_id) {
    $created=date('Y-m-d hh:ii:ss');  

    $result = $this->db->query("SELECT users.fname,users.lname,users.dob,users_info.user_image,add_friend.* FROM add_friend INNER JOIN users_info ON add_friend.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where add_friend.receiver_user_id='$user_id' OR add_friend.sender_user_id='$user_id' and add_friend.status='1' GROUP BY add_friend.sender_user_id") or die(mysqli_error($this->db)); 
    $result1 = mysqli_num_rows($result);
    if($result1>0){
     while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    }
    return $data;
}else{
    return 0;
}

        //echo $row['name'];  
}





public  function SearchResult($user_id) {
    $created=date('Y-m-d hh:ii:ss');
    //echo "SELECT users.username,users.picture,users_info.*,friends.* FROM friends INNER JOIN users_info ON friends.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where friends.receiver_user_id='$user_id' group by friends.sender_user_id";die;
    $result = $this->db->query("SELECT users.username,users.picture,users_info.* FROM friends INNER JOIN users_info ON friends.sender_user_id=users_info.user_id INNER JOIN users ON users_info.user_id=users.user_id where friends.receiver_user_id='$user_id' group by friends.sender_user_id") or die(mysqli_error($this->db));
    //$result = $this->db->query("INSERT INTO friends(friend_id,sender_user_id,receiver_user_id,friend_status,created,modified) values('','$sender_id','$user_id','0','$created','$created')") or die(mysqli_error($this->db));
    $result1 = mysqli_num_rows($result);
    if($result1>0){
      while($row = mysqli_fetch_array($result)){
        $data[]=$row;
    }
    return $data;
}else{
  return 0;
}

    //echo $row['name'];
}

/////////////////////////////////////////////////////////////
public  function register($data) 
{  
        // echo "<pre>";
        // print_r($data);die;
    $created=date('Y-m-d'); 
    $password = md5($data['password']);
    $checkuser = $this->db->query("Select * from dealer where dealer_email='".$data['email']."'");  
    $result = mysqli_num_rows($checkuser); 

    if ($result == 0)
    { 
            //echo "ffff";die;
        $register = $this->db->query("INSERT INTO dealer SET dealer_type='Dealer',dealer_phone='".$data['phone']."',dealer_first_name='".$data['fname']."',dealer_last_name='".$data['lname']."',dealer_email='".$data['email']."',dealer_password='".$password."',dealer_createdat= '$created',dealer_modifiedat= '$created',dealer_status='0',dealer_firm_name='".$data['dealer_firm_name']."',dealer_address='".$data['dealer_address']."',city='".$data['city']."',sector='".$data['sector']."',mob_verified='1'") or die(mysqli_error($this->db));
        if($register)
        {
            // session_start();
            // $_SESSION['email']=$data['email'];
            $this->verifyEmail($data['email']);
            echo "1";
        }
        else
        {
            echo "0";
                //return "0";
        }
    }
    else
    {
        echo "2";
        //return "2";
    }  
}



public function register_mail($data){
    $from = $data['email'];
    $subject = 'Thank you for registering with Property App!!';
    $message = '<html>

    <body>
    <h3>Dear '.$data['fullname'].'</h3>
    <p>Greetings! Hope you are having a good day.</p>
    <p>Thank you for registering with us. We have received your registration request. Your request will be approved soon. </p>
    <p>Thanks</p>
    <p>Property App Team</p>
    </body>
    </html>

    ';    
    $this->mail($subject,$message,$from);

    $from1 = 'admin@gmail.com';
    $subject1 = 'New Registration Request';
    $message1 = '<html>

    <body>
    <h3>Dear Admin</h3>
    <p>New registration request has been received. Please check your dashboard for the approval. </p>

    <p>Thanks</p>
    <p>Property App Team</p>
    </body>
    </html>

    ';

    $this->adminmail($subject1,$message1,$from1);
}

    // dealer expire
public  function expire() 
{          

    $expireuser = $this->db->query("SELECT * FROM dealer WHERE dealer_type = 'Dealer'") or die(mysqli_error($this->db));
             // and projects.user_id!='$user_id'
    $num=mysqli_num_rows($expireuser);
    if($num>0){
     while($result1=mysqli_fetch_array($expireuser)){
      $created_date = $result1['dealer_createdat'];
                          // echo "<pre>";
                          // print_r($result1['dealer_email']);

      $setting = $this->db->query("Select * from setting"); 
      $setting_result = mysqli_fetch_array($setting);

      $expire_date = $setting_result['setting_expire_date'];

            $now = time(); // or your date as well
            $your_date = strtotime($created_date);
            $datediff = $now - $your_date;

            $date1 =  round($datediff / (60 * 60 * 24));

            $remaindate = $expire_date - $date1;
            $remaindate1 = $expire_date - $remaindate;

            if ($remaindate1 == 10 || $remaindate1 == 5 || $remaindate1==2) {
              $from = $result1['dealer_email'];
              $subject = 'Oops! Expiration of subscribed package with Property App';
              $message = '<html>

              <body>
              <h3>Dear '.$result1['dealer_first_name'].'</h3>
              <p>We are sad to inform that your subscribed package is about to expire in next '.$remaindate1.' days. </p>
              <p>Kindly get it renewed timely for uninterrupted service. </p>
              <p>PS: We also love hearing from you and helping you with any issues you have. Please reply to this email if you want to ask a question or just say Hi!</p>
              <p>Thanks</p>
              <p>Property App Team</p>
              </body>
              </html>

              ';    $this->mail($subject,$message,$from);
          }

          if ($date1 > $expire_date) {
            $get = $this->db->query("SELECT * FROM dealer WHERE `dealer_createdat` < CURRENT_DATE - INTERVAL $expire_date DAY and dealer_type = 'Dealer'"); 
                //$getresult = mysqli_fetch_array($get);
            //      echo "<pre>";
            // print_r($getresult);
            while ($getresult = mysqli_fetch_array($get)) {
                $em = $getresult['dealer_email'];

                $updatestatus = $this->db->query("update dealer SET dealer_status='2' where dealer_email= '$em' ") or die(mysqli_error($this->db));

                $from = $getresult['dealer_email'];
                $subject = 'Oops! Expiration of subscribed package with Property App';
                $message = '<html>

                <body>
                <h3>Dear '.$getresult['dealer_first_name'].'</h3>
                <p>We are sad to inform that your subscribed package has been expired </p>
                <p>Kindly get it renewed timely for uninterrupted service. </p>
                <p>PS: We also love hearing from you and helping you with any issues you have. Please reply to this email if you want to ask a question or just say Hi!</p>
                <p>Thanks</p>
                <p>Property App Team</p>
                </body>
                </html>

                ';    
                $this->mail($subject,$message,$from);

            }


        }


        $data[]=$result1;
    }
    return $data;
}else{
    return 0;
}
}

    // end dealer expire

/*Check user from email id*/
public function checkUser($data)
{
 $checkuser = $this->db->query("Select * from dealer where dealer_email='".$data['email']."'");  
 $result = mysqli_num_rows($checkuser);
 return $result;
}



/*Close check user email id*/

    //login
public  function login($email,$password) 
{          
    $created=date('Y-m-d'); 
    $password = md5($password);
        //echo "Select * from dealer where dealer_email='".$email."' and dealer_password='$password'";die;

    $checkuser = $this->db->query("SELECT * FROM dealer where dealer_email='".$email."' and dealer_password='".$password."' and dealer_type = 'Dealer' AND dealer_status='1'");  
    $result = mysqli_num_rows($checkuser);  
    if ($result > 0)
    { 
     $result1 = mysqli_fetch_array($checkuser);
            // session_set_cookie_params(0);
     session_start();
     $_SESSION['dealer_id'] = $result1['dealer_id'];
     $_SESSION['dealer_name'] = $result1['dealer_first_name'];
     $_SESSION['dealer_email'] = $result1['dealer_email'];
     $_SESSION['dealer_photo'] = $result1['dealer_photo'];
     $_SESSION['dealer_phone']=$result1['dealer_phone'];

     return 1;
 }else{
    return 0;
}
}

public  function updateprofile($data,$realname) 
{  

      // echo $realname;die;
    // var_dump($data);die;
    $created=date('Y-m-d'); 
    $email = $data['dealer_email'];
    $fname = $data['dealer_fname'];
    $lname = $data['dealer_lname'];
    $dealer_phone_second=$data['dealer_phone_second'];
    $dealer_telephone_no=$data['dealer_telephone_no'];
    $dealer_company_profile=$data['dealer_company_profile'];
    $img = $realname;
    if($realname==0){
       $register = $this->db->query("update dealer SET dealer_type='Dealer',dealer_phone='".$data['dealer_phone']."',dealer_first_name='".$fname."',dealer_last_name='".$lname."',dealer_address='".$data['dealer_address']."',sector='".$data['sector']."',dealer_phone_second='".$dealer_phone_second."',dealer_telephone_no='".$dealer_telephone_no."',dealer_company_profile='".$dealer_company_profile."',dealer_modifiedat= '$created' where dealer_email='$email'") or die(mysqli_error($this->db));
   }else{
       $register = $this->db->query("update dealer SET dealer_type='Dealer',dealer_phone='".$data['dealer_phone']."',dealer_first_name='".$fname."',dealer_last_name='".$lname."',dealer_photo='".$img."',dealer_address='".$data['dealer_address']."',dealer_modifiedat= '$created' where dealer_email='$email'") or die(mysqli_error($this->db));
   }
   if($register)
   {
    return "1";
}
else
{
    return "0";
}
}


    // forgot password

public function UserForgotPassword($email){
    $selectuser = $this->db->query("SELECT * FROM dealer where dealer_email='$email'");
    $fetch=mysqli_fetch_array($selectuser);
    
    if($fetch){
        $tablename='dealer';
        $rand=rand(00000,99999);
        $pass=md5($rand);
        $data=array('dealer_hashkey'=>$pass);
        $condition=array('dealer_id'=>$fetch['dealer_id']);
        $updateuser=$this->update($tablename,$data,$condition);
        // $from = 'chirag.netmaxims@gmail.com';
        $to=$fetch['dealer_email'];
        // $subject = 'Forgot your Password for Property App?';
        $message = '<!doctype html>
   <html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">
    <body style="background:#fafafa; width:100%;height:600px;text-align: center;margin: 0 auto;height: 600px;border-top: 4px solid #6b4fbb;">
   
    <table style="box-shadow: 1px 1px 6px #ccc;background:white;width:55%;height:300px; text-align: center;margin: 0 auto;display: block; position: relative;margin-top: 140px;" >
      <thead style="background:#fafafa">
        <tr style="background:#fafafa"> <img alt="GitLab" src="http://yards360.com/image/yards360logoemail.png" style="padding-bottom: 30px;text-align:center;margin: 0 auto;display:block">
        </tr>
    </thead>
    <tbody style="position: relative">
    <tr>
    <td style="position: absolute; top: 43px;border: 1px solid #ededed;padding-bottom:35px">
    <h4 style="padding-top:30px;text-align:center;margin:0 auto;display:block;color: black;letter-spacing: 1px;font-size: 22px;
    ">Dear '.$fetch['dealer_first_name'].'</h4>
      <p style="font-size: 15px;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;">Someone, hopefully you, has requested to reset the password for your yards360 account on<a href="http://yards360.com/" style="padding-left:15px;">http://yards360.com/</a></p>
      <p style="font-size: 15px;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;">If you did not perform this request, you can safely ignore this email.</p>
      <p style="font-size: 15px;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;">Otherwise, click the link below to complete the process.</p>
    <p style="font-size: 15px;font-weight: 600;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;"><br><br><a href="'.BASEURL.'reset_password.php?key='.$pass.'" style="color: #1155cc;
    letter-spacing: 1px;">Reset Password Link.</a></p>
    </td>
    </tr>
    </tbody>
    
     <tfoot style="float: left;">
    <tr>
      <td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;">Your Trusted Partner,<a href="http://yards360.com" style="padding-left: 15px;color:#1155cc">yards360.com</a></p></td>
    </tr>

    <tr style="display: block;"><td><h3 style="margin-top: 0px;margin-bottom: 0px;">We would love to hear from you,</h3></td></tr>
    <tr style="display: block;"><td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;margin-top: 6px;">Call at 9999077365</p></tr></tr>
  </tfoot>

    </table>
    </body> 
    </html>
        ';    
        $subject='RESET PASSWORD LINK';
    // $message='Dear '.$data['name'].' Your Otp is '.$data['otp'].'';
        $from='info@yards360.com';
    //Load Composer's autoloader
        require 'mail/autoload.php';
        $mail = new PHPMailer(true); 

        try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@yards360.com';                 // SMTP username
    $mail->Password = 'info@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@yards360.com', 'yards360');
    $mail->addAddress($to, 'yards360');     // Add a recipient
     // $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';
    $mail= $mail->send();
        // $this->mail($to,$subject,$message,$from);
    return 1;
}catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}
}    // end forgot password


/*Verify Email Function*/
public function verifyEmail($email){
    $selectuser = $this->db->query("SELECT * FROM dealer where dealer_email='$email'");
    $fetch=mysqli_fetch_array($selectuser);
    
    if($fetch){
        $tablename='dealer';
        $rand=rand(00000,99999);
        $pass=md5($rand);
        $data=array('dealer_hashkey'=>$pass);
        $condition=array('dealer_id'=>$fetch['dealer_id']);
        $updateuser=$this->update($tablename,$data,$condition);
        // $from = 'chirag.netmaxims@gmail.com';
        $to=$fetch['dealer_email'];
        // $subject = 'Forgot your Password for Property App?';
        $message = '<!doctype html>
   <html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">
    <body style="background:#fafafa; width:100%;height:600px;text-align: center;margin: 0 auto;height: 600px;border-top: 4px solid #6b4fbb;">
   
    <table style="box-shadow: 1px 1px 6px #ccc;background:white;width:55%;height:300px; text-align: center;margin: 0 auto;display: block; position: relative;margin-top: 140px;" >
      <thead style="background:#fafafa">
        <tr style="background:#fafafa"> <img alt="GitLab" src="http://yards360.com/image/yards360logoemail.png" style="padding-bottom: 30px;text-align:center;margin: 0 auto;display:block">
        </tr>
    </thead>
    <tbody style="position: relative">
    <tr>
    <td style="position: absolute; top: 43px;border: 1px solid #ededed;padding-bottom:35px">
    <h4 style="padding-top:30px;text-align:center;margin:0 auto;display:block;color: black;letter-spacing: 1px;font-size: 22px;
    ">Dear '.$fetch['dealer_first_name'].'</h4>
      <p style="font-size: 15px;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;">Thanks for signing up to Yards360!<a href="http://yards360.com/" style="padding-left:15px;">http://yards360.com/</a></p>
      <p style="font-size: 15px;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;">To get started, click the link below to confirm your account.</p>
    <p style="font-size: 15px;font-weight: 600;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;"><br><br><a href="'.BASEURL.'verify_email.php?key='.$pass.'" style="color: #1155cc;
    letter-spacing: 1px;">Verify Email Link.</a></p>
    </td>
    </tr>
    </tbody>
    
     <tfoot style="float: left;">
    <tr>
      <td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;">Your Trusted Partner,<a href="http://yards360.com" style="padding-left: 15px;color:#1155cc">yards360.com</a></p></td>
    </tr>

    <tr style="display: block;"><td><h3 style="margin-top: 0px;margin-bottom: 0px;">We would love to hear from you,</h3></td></tr>
    <tr style="display: block;"><td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;margin-top: 6px;">Call at 9999077365</p></tr></tr>
  </tfoot>

    </table>
    </body> 
    </html>
        ';    
        $subject='EMAIL VERIFY LINK';
    // $message='Dear '.$data['name'].' Your Otp is '.$data['otp'].'';
        $from='info@yards360.com';
    //Load Composer's autoloader
        require 'mail/autoload.php';
        $mail = new PHPMailer(true); 
        try {
    //Server settings

    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@yards360.com';                 // SMTP username
    $mail->Password = 'info@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to
    //Recipients
    $mail->setFrom('info@yards360.com', 'yards360');
    $mail->addAddress($to, 'yards360');     // Add a recipient
     // $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';
    $mail= $mail->send();
        // $this->mail($to,$subject,$message,$from);
    return 1;
}catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}
}


/*Close Verify Email Function*/





/*Reset Password*/
public function resetPassword($data){
    $selectuser = $this->db->query("SELECT * FROM dealer where dealer_hashkey='".$data['key']."'");
    $fetch=mysqli_fetch_array($selectuser);
    
    if($fetch){
        $tablename='dealer';
        $data1=array('dealer_password'=>$data['password']);
        $condition=array('dealer_hashkey'=>$data['key']);
        // var_dump($condition);die;
        $updateuser=$this->update($tablename,$data1,$condition);
        // $from = 'chirag.netmaxims@gmail.com';
        $to=$fetch['dealer_email'];
        // $subject = 'Forgot your Password for Property App?';
        $message = '<html>
        <body>
        <h3>Dear '.$fetch['dealer_first_name'].'</h3>
        <p>Greetings! Hope you are having a good day.</p>
        <p>Your Password Has been Changed Successfully..</p>
        <p>Thanks</p>
        <p>Property App Team</p>
        </body>
        </html>
        ';    
        $subject='Password Changed';
    // $message='Dear '.$data['name'].' Your Otp is '.$data['otp'].'';
        $from='info@yards360.com';
    //Load Composer's autoloader
        require 'mail/autoload.php';
        $mail = new PHPMailer(true); 

        try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@yards360.com';                 // SMTP username
    $mail->Password = 'info@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@yards360.com', 'yards360');
    $mail->addAddress($to, 'yards360');     // Add a recipient
     // $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';
    $mail= $mail->send();
        // $this->mail($to,$subject,$message,$from);
    return 1;
}catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}
}  



/*Close Reset PAssword*/ 


/*Verify Email*/
public function verifyEmailMatch($data){
    $selectuser = $this->db->query("SELECT * FROM dealer where dealer_hashkey='".$data['key']."'");
    $fetch=mysqli_fetch_array($selectuser);
    
    if($fetch){
        $tablename='dealer';
        $data1=array('email_verified'=>1);
        $condition=array('dealer_hashkey'=>$data['key']);
        // var_dump($condition);die;
        $updateuser=$this->update($tablename,$data1,$condition);
        // $from = 'chirag.netmaxims@gmail.com';
        $to=$fetch['dealer_email'];
        // $subject = 'Forgot your Password for Property App?';
        $message = '<html>
        <body>
        <h3>Dear '.$fetch['dealer_first_name'].'</h3>
        <p>Greetings! Hope you are having a good day.</p>
        <p>Your Email Has been Verified..</p>
        <p>Thanks</p>
        <p>Property App Team</p>
        </body>
        </html>
        ';    
        $subject='Email Verified';
    // $message='Dear '.$data['name'].' Your Otp is '.$data['otp'].'';
        $from='info@yards360.com';
    //Load Composer's autoloader
        require 'mail/autoload.php';
        $mail = new PHPMailer(true); 

        try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@yards360.com';                 // SMTP username
    $mail->Password = 'info@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@yards360.com', 'yards360');
    $mail->addAddress($to, 'yards360');     // Add a recipient
     // $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';
    $mail= $mail->send();
        // $this->mail($to,$subject,$message,$from);
    return 1;
}catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}

}
}

/*Close Verify Email*/


public  function UserChangePasswordNew($new_password,$email) 
{  

    $new_password = md5($new_password);
        //echo "update dealer SET dealer_password='$new_password' where dealer_email='$email'";die;
    $changepassword = $this->db->query("update dealer SET dealer_password='$new_password' where dealer_email='$email'") or die(mysqli_error($this->db));
    if($changepassword)
    {             

     $from = $email;
     $subject = 'Password Reset';
     $message = '<html>

     <body>
     <h3>Dear '.$fetch['dealer_first_name'].'</h3>

     <p>Greetings! Hope you are having a good day.</p>
     <p>Password has been changed for your Property App account. You can now log in (<a href="http://yards360.com">Login</a>) using your new password. </p>

     <p>If you did not changed the password, please let us know immediately by replying this email.</p>
     <p>Thanks</p>
     <p>Property App Team</p>
     </body>
     </html>

     ';    $this->mail($subject,$message,$from);

     return "1";
 }
 else
 {
    return "0";
}
}


// Requirement Match mail
public function requirementMatchMail($search){

    if($search)
    {             

        $from='info@yards360.com';
        $to = 'chirag.netmaxims@gmail.com';
        $subject = 'Requirement Mail';
        $message = '<html>

        <body>
        <h3>Dear '.'Dealer Name'.'</h3>

        <p>Greetings! Hope you are having a good day.</p>
        <p>Your Requirement has been Matched with our property</p>


        <p>Thanks</p>
        <p>Property App Team</p>
        </body>
        </html>

        ';    
        $this->mail($to,$subject,$message,$from);

        return "1";
    }
    else
    {
        return "0";
    }
}


// OTP Verification Mail
public function otpVerification($data){

    $subject='OTP FOR MOBILE VERIFICATION';
    $message='
 <!doctype html>
   <html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">
    <body style="background:#fafafa; width:100%;height:600px;text-align: center;margin: 0 auto;height: 600px;border-top: 4px solid #6b4fbb;">
   
    <table style="box-shadow: 1px 1px 6px #ccc;background:white;width:55%;height:300px; text-align: center;margin: 0 auto;display: block; position: relative;margin-top: 140px;" >
      <thead style="background:#fafafa">
	    <tr style="background:#fafafa"> <img alt="GitLab" src="http://yards360.com/image/yards360logoemail.png" style="padding-bottom: 30px;text-align:center;margin: 0 auto;display:block">
	    </tr>
    </thead>
    <tbody style="position: relative">
    <tr>
    <td style="position: absolute; top: 43px;border: 1px solid #ededed;padding-bottom:35px">
    <h4 style="padding-top:30px;text-align:center;margin:0 auto;display:block;color: black;letter-spacing: 1px;font-size: 22px;
    ">Dear '.$data['fname'].'</h4>
    <p style="font-size: 15px;font-weight: 600;;text-align:center;margin:0 auto;display:block;padding: 10px;color: black;letter-spacing: 1px;">Your Otp is '.$data['otp'].'<br><br><a href="http://yards360.com" style="color: blue;
    letter-spacing: 1px;">http://yards360.com.</a></p>
    <span style="padding: 10px;color: black;letter-spacing: 1px;">If you did not perform this request, you can safely ignore this email. Otherwise, click the link below to complete the process.</span>
    </td>
    </tr>
    </tbody>
    
     <tfoot style="float: left;">
    <tr>
      <td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;">Your Trusted Partner,<a href="http://yards360.com" style="padding-left: 15px;color:#1155cc">yards360.com</a></p></td>
    </tr>

    <tr style="display: block;"><td><h3 style="margin-top: 0px;margin-bottom: 0px;">We would love to hear from you,</h3></td></tr>
    <tr style="display: block;"><td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;margin-top: 6px;">Call at 9999077365</p></tr></tr>
  </tfoot>

    </table>
    </body> 
    </html> 
    ';
    /*Dear '.$data['fname'].' Your Otp is '.$data['otp'].*/
    $from=$data['email'];
    $msg='YourOtpIs'.$data['otp'];
       $this->smsApi($msg,$data['phone']);
    //Load Composer's autoloader
    require 'mail/autoload.php';
    $mail = new PHPMailer(true); 
    
    try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@yards360.com';                 // SMTP username
    $mail->Password = 'info@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('info@yards360.com', 'yards360');
    $mail->addAddress($from, 'yards360');     // Add a recipient
    $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';


    $mail= $mail->send();
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}

/*Send text on mobile*/
public function smsApi($msg,$mobile){
    // echo $msg;
    // echo $msg;
    // echo $mobile;
   
    file('http://198.24.149.4/API/pushsms.aspx?loginID=taru123&password=taru@123&mobile='.$mobile.'&text='.$msg.'&senderid=CHPSMS&route_id=2&Unicode=0');
}


/*Close sent text msg to mob*/




public  function showDealerrDetail($email) 
{ 
        //echo "select * from dealer where dealer_email='$email'";
 $query = $this->db->query("select * from dealer where dealer_email='$email'") or die(mysqli_error($this->db));
 $result = mysqli_fetch_array($query);
 if($result)
 {
    return $result;
}
else
{
    return "0";
}
}



public  function getDealerInfobyId($id) 
{ 
        //echo "select * from dealer where dealer_email='$email'";
 $query = $this->db->query("select * from dealer where dealer_id='".$id."'") or die(mysqli_error($this->db));
 $result = mysqli_fetch_array($query);
 if($result)
 {
    return $result;
}
else
{
    return "0";
}
}



public  function mail($subject,$message,$from) 
{
    //Load Composer's autoloader
    require 'mail/autoload.php';
    $mail = new PHPMailer(true); 
    
    try {
    //Server settings
    // $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    // $mail->isSMTP();                                      // Set mailer to use SMTP
    // $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    // $mail->SMTPAuth = true;                               // Enable SMTP authentication
    // $mail->Username = 'info@yards360.com';                 // SMTP username
    // $mail->Password = 'info@123';                           // SMTP password
    // $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    // $mail->Port = 25;    
      $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@yards360.com';                 // SMTP username
    $mail->Password = 'info@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    // $mail->setFrom('info@yards360.com', 'yards360');
    // $mail->addAddress($from, 'yards360');     // Add a recipient
    $mail->setFrom('info@yards360.com', 'yards360');
    $mail->addAddress($from, 'yards360');
    $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';


    $mail= $mail->send();
    echo '1';
} catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
} 


public  function adminmail($subject1,$message1,$from1) 
{
    //Load Composer's autoloader
    require 'mail/autoload.php';
    $mail = new PHPMailer(true); 
    
    try {
    //Server settings
   $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'yards360.com';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'info@yards360.com';                 // SMTP username
    $mail->Password = 'info@123';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                // TCP port to connect to
    //Recipients
    $mail->setFrom('info@yards360.com', 'yards360');
    $mail->addAddress($from1, 'yards360');     // Add a recipient
    $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject1;
    $mail->Body    = $message1;
    $mail->AltBody = '';

    $mail= $mail->send();
    
    if($mail) {
//print "<p style='color: white;font-size: 15px;position: relative;top: 23px;'>Thank you for contacting us.We have received your request and shall get back to you at the earliest.</p>";
    } else {
//print "<p style='color:white;font-size:13px''>Problem in Sending Mail.</p>";
    }
} catch (Exception $e) {
   // echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
}



public function sendWhatsapp(){
    $sid    = "AC531d1283dcacc21748e849fcbcf9d29b";
    $token  = "387af36294a09e87d08e9b7b60b50deb";
    $twilio = new Client($sid, $token);

    $message = $twilio->messages
                  ->create('whatsapp:+919560855334', // Text this number
                     array(
                        "from" => "whatsapp:+14155238886",
                         "body" => "Your Yummy Cupcakes Company order of 1 dozen frosted cupcakes has shipped and should be delivered on July 10, 2019. Details: http://www.yards360.com/"
                     )
                 );

                  print($message->sid);
              }




               public function accountExpired(){
                  $created=date('Y-m-d'); 
                  $checkuser = $this->db->query("SELECT * FROM dealer where dealer_type = 'Dealer' AND dealer_status='1'");  

                  $result = mysqli_num_rows($checkuser);  

                  if ($result > 0)

                  { 
                     $setting = $this->db->query("Select * from setting"); 

                     $setting_result = mysqli_fetch_array($setting);

                     $expire_date = $setting_result['setting_expire_date'];

                     while($result1 = mysqli_fetch_array($checkuser)){

                         $created_date = $result1['dealer_createdat'];

                         $now=date('Y-m-d H:i:s');
                         $expired_by=date('Y-m-d H:i:s', strtotime($created_date. ' + 5 day'));

                       // $your_date = strtotime($created_date);

                       // $datediff = $now - $your_date;

                       // $date1 =  round($datediff / (60 * 60 * 24));

                       // $remaindate = $expire_date - $date1;

                       // $remaindate1 = $expire_date - $remaindate;



                         if ($now>$expired_by) {
                            // $to=$result1['dealer_email'];

                          $from = $result1['dealer_email'];

                          $subject = 'Oops! Expiration of subscribed package with Property App';

                          $message = '<html>

                          <body>

                          <h3>Dear '.$result1['dealer_first_name'].'</h3>

                          <p>We are sad to inform that your subscribed package has been expired soon</p>

                          <p>Kindly get it renewed timely for uninterrupted service. </p>

                          <p>PS: We also love hearing from you and helping you with any issues you have. Please reply to this email if you want to ask a question or just say Hi!</p>

                          <p>Thanks</p>

                          <p>Property App Team</p>

                          </body>

                          </html>

                          ';    

                          $this->mail($subject,$message,$from);
                          // echo "UPDATE dealer SET dealer_status='2' where dealer_email='".$result1['dealer_email']."'";
                          $updatestatus = $this->db->query("UPDATE dealer SET dealer_status='2' where dealer_email='".$result1['dealer_email']."'") or die(mysqli_error($this->db));
                      }
                      
                  }

              }


          }



          public function propertyExpired(){
              $exp=date('Y-m-d H:i:s'); 
              // echo "SELECT residential_properties.property_code,dealer.* FROM residential_properties INNER JOIN dealer ON residential_properties.dealer_id=dealer.dealer_id where residential_properties.status='1' and expired_by<'".$exp."'";die;
              $checkuser = $this->db->query("SELECT residential_properties.property_code,dealer.* FROM residential_properties INNER JOIN dealer ON residential_properties.dealer_id=dealer.dealer_id where residential_properties.status='1' and expired_by<'".$exp."'");  

              $result = mysqli_num_rows($checkuser);  

              if ($result > 0)

              { 
                 

                 while($result1 = mysqli_fetch_array($checkuser)){

                       // $your_date = strtotime($created_date);

                       // $datediff = $now - $your_date;

                       // $date1 =  round($datediff / (60 * 60 * 24));

                       // $remaindate = $expire_date - $date1;

                       // $remaindate1 = $expire_date - $remaindate;


                  
                            // $to=$result1['dealer_email'];

                      $from = $result1['dealer_email'];

                      $subject = 'Oops! Expiration of Your Property';

                      $message = '<html>

                      <body>

                      <h3>Dear '.$result1['dealer_first_name'].'</h3>

                      <p>We are sad to inform that your property has been expired</p>

                      <p>Property Code '.$result1['property_code'].'</p>

                      <p>PS: We also love hearing from you and helping you with any issues you have. Please reply to this email if you want to ask a question or just say Hi!</p>

                      <p>Thanks</p>

                      <p>Property App Team</p>

                      </body>

                      </html>

                      ';    

                      $this->mail($subject,$message,$from);
                          // echo "UPDATE dealer SET dealer_status='2' where dealer_email='".$result1['dealer_email']."'";
                      $updatestatus = $this->db->query("UPDATE residential_properties SET status='3' where property_code='".$result1['property_code']."'") or die(mysqli_error($this->db));
                  

              }

          }


      }
 
          } 
          ?>
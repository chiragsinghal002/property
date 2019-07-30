<?php 
require_once 'db.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
header("Cache-Control: no-cache");
// $base_url='';
// DEFINE('BASEURL','http://property.nmx.com/dealer/');

class Automated_mail extends DB{
	public  function getDealerInfobyId() 
	{ 
        //echo "select * from dealer where dealer_email='$email'";
		$query = $this->db->query("select * from dealer where dealer_status='1' and dealer_type='Dealer'") or die(mysqli_error($this->db));
		while($result = mysqli_fetch_array($query)){
			$data[]=$result;
		}
		return $data;
	}


	public function getResidencialProperty($dealer_id){
 		$property_option=0;//for only sell and rent case	}
 		$today=date('Y-m-d h:i:s');
 		
 		$selectproperties = $this->db->query("SELECT residential_properties.*,property_category.cat_name,property_subcategory.subcat_name FROM residential_properties INNER JOIN property_category ON residential_properties.cat_id=property_category.cat_id LEFT JOIN property_subcategory ON residential_properties.subcat_id=property_subcategory.subcat_id where residential_properties.dealer_id!='".$dealer_id."' AND residential_properties.property_option='".$property_option."' ORDER BY RAND()
 			LIMIT 1,5;") or die(mysqli_error($this->db)); 
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

 	public function getNotifiedUser($message,$to){
 		
 		 $subject='Properties Found';
    // $message='Dear '.$data['name'].' Your Otp is '.$data['otp'].'';
        $from='webmail@netmaxims.in';
    //Load Composer's autoloader
        require 'mail/autoload.php';
        $mail = new PHPMailer(true); 

        try {
    //Server settings
    $mail->SMTPDebug = 0;                                 // Enable verbose debug output
    $mail->isSMTP();                                      // Set mailer to use SMTP
    $mail->Host = 'netmaxims.in';  // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                               // Enable SMTP authentication
    $mail->Username = 'kanchan@netmaxims.in';                 // SMTP username
    $mail->Password = 'kanchan@netmaxims';                           // SMTP password
    $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 25;                                    // TCP port to connect to

    //Recipients
    $mail->setFrom('webmail@netmaxims.in', 'netmaxims');
    $mail->addAddress($to, 'netmaxims');     // Add a recipient
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
 ?>
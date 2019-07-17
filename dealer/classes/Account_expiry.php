<?php
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
     $created_date = $result1['dealer_createdat'];

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
              $from = $email;
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

              ';    
              $this->mail($subject,$message,$from);
          }

          if ($date1 < $expire_date and $result1['dealer_status'] = '1') {
            // session_set_cookie_params(0);
              session_start();
              $_SESSION['dealer_id'] = $result1['dealer_id'];
              $_SESSION['dealer_name'] = $result1['dealer_first_name'];
              $_SESSION['dealer_email'] = $result1['dealer_email'];
              $_SESSION['dealer_photo'] = $result1['dealer_photo'];

              return 1;
          }
          else{

            $updatestatus = $this->db->query("UPDATE dealer SET dealer_status='2' where dealer_email='$email'") or die(mysqli_error($this->db));

            $from = $email;
            $subject = 'Oops! Expiration of subscribed package with Property App';
            $message = '<html>

            <body>
            <h3>Dear '.$result1['dealer_first_name'].'</h3>
            <p>We are sad to inform that your subscribed package has been expired </p>
            <p>Kindly get it renewed timely for uninterrupted service. </p>
            <p>PS: We also love hearing from you and helping you with any issues you have. Please reply to this email if you want to ask a question or just say Hi!</p>
            <p>Thanks</p>
            <p>Property App Team</p>
            </body>
            </html>

            ';    $this->mail($subject,$message,$from);
            if ($updatestatus) {
            //echo "2";
             return 2;
         }


     }

 }
 else
 {
            //echo "sssss";die;
    return "0";
}  
}
?>
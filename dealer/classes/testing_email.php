<?php 
require_once 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
define('BASEURL','yards360.com');
$to='saurav.netmaxims@gmail.com';
        // $subject = 'Forgot your Password for Property App?';
        $message = '<!doctype html>
   <html>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">  

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <body style="background:#fafafa; width:100%;height:600px;text-align: center;margin: 0 auto;height: 600px;border-top: 4px solid #6b4fbb;">
   
    <table style="box-shadow: 1px 1px 6px #ccc;background:white;width:55%;text-align: center;margin: 0 auto;display: block; position: relative;margin-top: 140px;" >
      <thead style="background:#fafafa">
        <tr style="background:#fafafa"> <img alt="GitLab" src="http://yards360.com/image/yards360logoemail.png" style="padding-bottom: 30px;text-align:center;margin: 0 auto;display:block">
        </tr>
    </thead>
    <tbody style="position: relative">
     
     <tr>
       <td><h4 style="margin-top: 0px; color: #3cb54a;padding-left: 27px;padding-top: 13px;font-size: 25px;margin-bottom: 15px;">Residential <span style="color: blue;padding-right: 8px;">Studio Apartment</span>In Sector 12 faridabad</h4></td>
     </tr>

     <tr>
       <td style="float: left;"><p style="padding-left: 27px;margin-top: 0px;color: #3cb54a;font-size: 18px;letter-spacing: 1px;margin-bottom: 0px;">Price:<span style="color: black;font-size: 18px;padding-left: 10px;margin-bottom: 0px;"><i class="fa fa-inr"></i>23/-</span></p>
       </td>

       <td style="float: left;"><p style="margin-top: 0px;
    letter-spacing: 1px;padding-left: 32px;color: #3cb54a;font-size: 18px;margin-bottom: 0px;">Plot area: <span style="padding-left: 20px;">Bedroom:</span> <span style="color: black">3BHK</span></p> 
    </td>
     </tr>

     <tr>
       <td style="float: left;"><p style="padding-left: 27px;font-size:18px;color:black;">Category:<span>Appartment/  Flat / Builder Floor</span></p></td>
     </tr>
    
    </tbody>
    
     <tfoot style="float: left;padding-top: 55px;">
    <tr>
      <td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;">Your Trusted Partner,<a href="http://yards360.com" style="padding-left: 15px;color:#1155cc">yards360.com</a></p></td>
    </tr>

    <tr style="display: block;"><td><h3 style="margin-top: 0px;margin-bottom: 0px;">We would love to hear from you,</h3></td></tr>
    <tr style="display: block;"><td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;margin-top: 6px;">Call at 9999077365</p></tr>
  </tfoot>

    </table>
    </body> 
    </html>';    
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
     $mail->addCC('chirag.netmaxims@gmail.com');
    //Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = $subject;
    $mail->Body    = $message;
    $mail->AltBody = '';
    $mail= $mail->send();
        // $this->mail($to,$subject,$message,$from);
    echo 'check your email';
}catch (Exception $e) {
    echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
}
?>
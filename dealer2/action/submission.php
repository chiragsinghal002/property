<?php
  require_once '../Object.php';
 //  $common=new Common();
//error_reporting(0);
header("Cache-Control: no-cache");



if (isset($_POST['submit'])) {
    // echo "<pre>";
    // print_r($_POST);die;

  $data['fullname']=$_POST['fullname'];

  $data['email']=$_POST['email1'];

  $data['phone']=$_POST['phone'];

  $data['password']=$_POST['pass'];
  $data['dealer_firm_name']=$_POST['shop_name'];
  $data['dealer_address']=$_POST['address']; 
  $data['city']=$_POST['city'];
  $data['sector']=$_POST['sector'];
//var_dump($data);die;
  // $common=new Common();
 // $register = new Common;
  $show = $common->register($data);
   //var_dump($how);die;
  //echo $add=$user->registerbyEmail($data);

}

// End Register

//Login
if(!empty($_GET['action']) && $_GET['action']=="login")
{
    if($_GET['email']=="" || $_GET['password']=="")
    {
        echo "Please fill all the fields";
        return;
    }
    if(!empty($_GET['email']) && !filter_var($_GET['email'], FILTER_VALIDATE_EMAIL))
    {
        echo "Please enter valid email id";
        return;
    }

   
    $show = $common->login($_GET);
   
    if($show==1)
    {
        echo "Successfully logged in";
        return;
    }
    else
    {
       echo "Wrong Credentials, Please try again!!";
       return;
    }
}


if(isset($_POST['email'])){
 // var_dump($_POST);die;
 $email=$_POST['email'];
 $password=$_POST['password'];
 $show = $common->login($email,$password);
 // session_start();
  // var_dump($_SESSION);
// var_dump($show);die;
  //$result=$user->loginbyemail($mobilelogin,$mobpassword);
  // return $result;
 if($show=='1'){
  echo '1';
}
elseif ($show=='2') {
  echo '2';
}
else{
  echo '0';
}

    //echo $result;



}

// Login

// forgot
// if(!empty($_GET['action']) && $_GET['action']=="forgot")
// {
//     if($_GET['email']=="")
//     {
//         echo "Please fill email fields";
//         return;
//     }
//     $register = new Common;
//     $show = $register->UserForgotPassword($_GET['email']);
//     // echo "<pre>";
//     // print_r($show);die;
//     if($show==1)
//     {

//         header("location:../forgot.php?mes=Successfully password sent");
//     }
//     else
//     {
//         header("location:../forgot.php?mes=No email exists");
//     }
// }

if(isset($_POST['forgotemail'])){

   //var_dump($_POST);die;

 $forgotemail=$_POST['forgotemail'];

   //$password=$_POST['password'];


 $show = $common->UserForgotPassword($forgotemail);

  //$result=$user->loginbyemail($mobilelogin,$mobpassword);
  // return $result;

 if($show=='1'){

  echo '1';
}else{
  echo '0';
}

    //echo $result;



}

// end forgot

// change
if(!empty($_POST['action']) && $_POST['action']=="changepass")
{
  if($_POST['old_password']=="" || $_POST['new_password']=="" || $_POST['confirm_password']=="")
  {
    header("location:../changepass.php?mes=Please fill all details");
  }
  elseif($_POST['old_password']==$_POST['new_password'])
  {
    header("location:../changepass.php?mes=Old and new password should not be same");
  }
  elseif($_POST['confirm_password']!=$_POST['new_password'])
  {
    header("location:../changepass.php?mes=New and confirm password should be same");
  }
  else
  {

    $show = $common->UserChangePasswordNew($_POST['new_password'],$_POST['email']);
    if($show==1)
    {
      header("location:../changepass.php?mes=Successfully password changed");
    }
    else
    {
      header("location:../changepass.php?mes=Some error occurred");
    }
  }
}


if(!empty($_POST['action']) && $_POST['action']=="changepassword")
{
  if($_POST['old_password']=="" || $_POST['new_password']=="" || $_POST['confirm_password']=="")
  {
    header("location:../changepassword.php?mes=Please fill all details");
  }
  elseif($_POST['old_password']==$_POST['new_password'])
  {
    header("location:../changepassword.php?mes=Old and new password should not be same");
  }
  elseif($_POST['confirm_password']!=$_POST['new_password'])
  {
    header("location:../changepassword.php?mes=New and confirm password should be same");
  }
  else
  {
        //$register = new Common;
    $show = $common->UserChangePasswordNew($_POST['new_password'],$_POST['email']);
    if($show==1)
    {
      header("location:../changepassword.php?mes=Successfully password changed");
    }
    else
    {
      header("location:../changepassword.php?mes=Some error occurred");
    }
  }
}

// update profile
if(isset($_POST['updateprofile']))
{
   // echo 'chirag';die;
  if($_POST['dealer_fname']=="" || $_POST['dealer_lname']=="" || $_POST['dealer_phone']=="" || $_POST['dealer_address']=="")
  {
    header("location:../updateprofile.php?mes=Please enter all details!!");
  }
  // var_dump($_FILES);die;
  if(!empty($_FILES['dealer_photo']['name'])){
   $tmpname = $_FILES['dealer_photo']['tmp_name'];
   $realname = time().$_FILES['dealer_photo']['name'];
   $path = '../image/uploads/'.$realname;
   $show = $common->updateprofile($_POST,$realname);
   if($show==1)
   {
    move_uploaded_file($tmpname,$path);
    header("location:../updateprofile.php?mes=Successfully updated");
  }
}else{
   $show = $common->updateprofile($_POST,$realname=0);
   if($show==1)
   {
    header("location:../updateprofile.php?mes=Successfully updated");
  }
}

}

?>
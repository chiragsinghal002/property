<?php 
include "Object.php";
 $show = $common->expire();


?>
<!doctype html>

<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">

    <meta name="description" content="" />

    <meta name="keywords" content="" />

    <link rel="shortcut icon" href="" />

    <title>Login Page</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

   <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">


    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <link href="css/loading.css" rel="stylesheet" type="text/css" />

    <script src="js/jequary.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>
    <script src="js/mainfunction.js"></script>


<link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">



<!-- jQuery library -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>



<!-- Latest compiled JavaScript -->

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

</head>

<body>

  

 <!-- Parent div -->



 <div class="bgimg">
     
     <img src="image/BG.jpg">
 	<div class="container-fluid"> 
      <div class="row">
      	<!-- Logo of 6 cols -->

      	 <div class="col-md-6">

      	 	 <div class="logo">

      	 	 	<a href="index.php"> <img src="image/logo.png" class="imglogo"></a>

      	 	 </div>

      	 </div>
      	 <!-- Rest part of cols -->

      	 <div class="col-md-6">

      	 	<div class="sigbtn registration1">

      	 	<!-- Div for tool free -->

      	 	<div class="tollfree">

      	 		 <p class="para">CALL US TOOL FREE</p>

      	 		 <p class="para1">1800-00-0000</p>

      	 	</div>

            <!-- Div for signup btn -->

            <div class="homesignup_btn">

            	<a href="registration.php"><input type="button" name="signup" value="SIGNUP" class="btn btn-success"></a>

            </div>

            </div>

      	 	

           <!-- Diiv for Form -->

      	
		<div class="frmdiv registration">

						  <h2>LOGIN</h2>

                <input type="hidden" name="action" value="login" />

            <div id="signin-status" class="replay"></div>

						  <div class="input-container">

						    <i class="glyphicon glyphicon-user"></i>

						    <input class="input-field" type="email" placeholder="Email" id="email" name="email">
						  </div>  
              <div class="input-msg" style="color: red;margin-left: 26px;"><span id="email-info" class="info"></span></div>

              

						  <div class="input-container">

						    <i class="glyphicon glyphicon-lock"></i>

						    <input class="input-field" type="password" placeholder="Password" id="password" name="password">

						  </div>
              <div class="input-msg" style="color: red;margin-left: 26px;"><span id="password-info" class="info"></span></div>



                          <div class="form-group">

                          	<!--<input type="checkbox" name="rememberme" id="rememberme" class="rembr"> <span class="rembr1"> Remember Me</span>-->

                          	<a href="forgot.php">Forgot Password?</a>

                          </div>


       <div id="successRegister"></div>
						  <input type="submit" class="btn btn-success12" value="LOGIN" onClick="validateLogin();" />

<!-- <button class="postprorp_submitbtn" type="Submit" name="submit" onclick="validateLogin()"><span>SUBMIT</span></button> -->
      	 		</div>
      	 		
          
      	 	</div>

      	 </div>



      </div>

 	</div>


</body>

</html>

<script type="text/javascript">
  function login() {
                $.ajax({

                  url: "action/submission.php",

                  type: "POST",

                  data:'email='+$("#email").val()+'&password='+$("#password").val(),

                  success:function(data){
                     // alert(data);

                  console.log(data);

                    if(data=='0'){
                
                        $("#signin-status").html('Wrong Email or Password');
    
                   }
                   if(data=='2'){
                
                        $("#signin-status").html('Your account has been expired !!');
    
                   }
                   if(data=='1'){
                   // console.log('chirag1');
                    // window.location.href='user-profile.php';
                     window.location.href='post_property.php';
                   }
                     }
                   });

              }

              function validateLogin() {

                  //alert('chirag');

                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');                  

                  if($("#email").val()=="") {

                    $("#email-info").html("This field is required");

                    $("#email").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                    $("#email-info").html("This is not a valid email format");

                    $("#email").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#password").val()=="") {

                    $("#password-info").html("This field is required");

                    $("#password").css('background-color','#FFFFDF');

                    valid = false;

                  }                       


                      if(valid==true){

                        login();

                      }

                      return valid;

                    }

                  
                 // test login section end 
</script>


<style>
     body,html{
        overflow-y:hidden!important;
        overflow-x:hidden!important;
        
    }
    .frmdiv{
            height: 510px;
    }
    
  
    
    @media only screen and (max-width: 375px) 
{
     .frmdiv{
            height: 400px!important;
    }
}

    
</style>

<!-- <style type="text/css">

.frmdiv.registration {
    padding-top: 20px;
    position: relative;
    top: 123px!important  ;
    background: #090911;
    width: 370px;
    height: 380px;
}

.sigbtn:before {
    content: '';
    border: 2px solid #fff;
    height: 382px;
    width: 331px;
    position: absolute;
    top: 11em;
    border-radius: 5px;
    left: -1em;
}

#successRegister {
    background-color: red;
    text-align: center;
    border-radius: 5px;
    margin: 3px;
    font-size: 16px;
    font-weight: bolder;
    color: white;
}

</style>  -->
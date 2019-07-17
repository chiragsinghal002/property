<?php
if(!empty($_GET['email']))
{
    header("location:action/submission.php?email=$_GET[email]&action=forgot");
}
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

    <title>Forgot Password</title>

    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">

    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <link href="css/style.css" rel="stylesheet" type="text/css" />

    <link href="css/loading.css" rel="stylesheet" type="text/css" />

    <script src="js/jequary.min.js"></script>

    <script src="js/bootstrap.min.js"></script>

    <script src="js/main.js"></script>


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

      	 	  <a href="index.php"><img src="image/logo.png" class="imglogo"></a>

      	 	 </div>

      	 </div>



      	 <!-- Rest part of cols -->



      	 <div class="col-md-6">

      	 	<div class="sigbtn">

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

      	 

      	 		<div class="frmdiv">
<?php
if(!empty($_GET['mes']))
{
    echo $_GET['mes'];
}
?>
      	 			<!-- <form> -->

						  <h2>FORGOT PASSWORD?</h2>

              <div id="forgot-status"></div>

						  <div class="input-container">

						    <i class="fa fa-envelope" aria-hidden="true"></i>

						    <input class="input-field" type="email" placeholder="Email" name="email" id="forgotemail">

						  </div>

               <div class="input-msg" style="color: red;margin-left: 26px;margin-top: 26px;"><span id="forgotemail-info" class="info"></span></div>


                          <div class="form-group forgot">

                          	<!--<input type="checkbox" name="rember" class="rembr"> <span class="rembr1"> Remember Me</span>-->

                          	<a href="index.php">Login Here !</a>

                          </div>


						        <input type="submit" class="btn btn-success196" value="Submit" onClick="validateforgot();"></nput>



                    <!-- </form> -->

      	 		</div>	

      	 	</div>

      	 </div>



      </div>

 	</div>




</body>

</html>

<script type="text/javascript">
  function forgot() {
     //alert('chirag');
                $.ajax({

                  url: "action/submission.php",

                  type: "POST",

                  data:'forgotemail='+$("#forgotemail").val(),
                  success:function(data){
                    //alert(data);

                  //console.log(data);

                    if(data=='0'){
                
                        $("#forgot-status").html('No email exists');
    
                   }
                   if(data=='1'){
                    $("#forgot-status").html("Password sent at your Email Id"); 
                     //window.location.href='post_property.php';
                   }
                     }
                   });

              }

              function validateforgot() {

                  //alert('chirag');

                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');                  

                  if($("#forgotemail").val()=="") {

                    $("#forgotemail-info").html("This field is required");

                    $("#forgotemail").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if(!$("#forgotemail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                    $("#forgotemail-info").html("This is not a valid email format");

                    $("#forgotemail").css('background-color','#FFFFDF');

                    valid = false;

                  }                                      


                      if(valid==true){

                        forgot();

                      }

                      return valid;

                    }

                  
                 // test login section end 
</script>

<style>
    .input-container i {
    padding-left: 12px;
}

.input-field {
    height: 35px;
    width: 80%;
    border: 0px;
    outline: none!important;
    font-family: 'Lato', sans-serif;
    padding-left: 10px;
}

.input-container {
    background: white;
    border: 1px solid black;
    width: 330px;
    position: relative;
    left: 24px;
    height: 47px;
    line-height: 47px;
    top: 20px;
}

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




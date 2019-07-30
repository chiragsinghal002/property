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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


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

		<!--      <img src="image/BG.jpg"> -->








        <div class="container-fluid">

            <div class="row">

                <div class="col-md-7">

                    <div class="logo">

                        <a href="index.php"> <img src="image/yards360logo.png" class="imglogo"> </a>

                    </div>

                </div>

                <div class="col-md-5">

                    <div class="sigbtn registration1">

                        <div class="top-social">
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>

                        <div class="tollfree">

                            <p class="para">CALL US</p>

                            <p class="para1">9999077365</p>

                        </div>

                      <!--   <div class="homesignup_btn">

                            <a href="registration.php">
                                <input type="button" name="signup" value="MY ACCOUNT" class="btn btn-success">
                            </a>

                        </div> -->

                    </div>

                </div>

            </div>

        </div>











        <!-- Div for Form -->



        <div class="frmdiv forgot">
          <?php
          if(!empty($_GET['mes']))
          {
             echo $_GET['mes'];
         }
         ?>
         <!-- <form> -->

             <h2>Forgot Password?</h2>

             <div id="forgot-status"></div>

             <div class="input-container forgot-container">

                <i class="fa fa-envelope" aria-hidden="true"></i>

                <input class="input-field" type="email" placeholder="Email" name="email" id="forgotemail">

            </div>

            <div class="input-msg" style="color: red;margin-left: 26px;margin-top: 26px;"><span id="forgotemail-info" class="info"></span></div>




            <input type="button" class="btn btn-success196" value="Forgot Password" onClick="return forgot()"></input>


  <div class="form-group forgot">

                <!--<input type="checkbox" name="rember" class="rembr"> <span class="rembr1"> Remember Me</span>-->

                <p>Click here to <a href="index.php">  Login !</a>

            </div>
            <!-- </form> -->

        </div>	

    </div>

</div>



</div>

</div>






<!-- footer-area -->

<div class="footer-area">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-6">
                <div class="footer-menu">
                    <ul>
                        <li><a href="#">About Us</a></li>
                        <li><a href="#">FAQ's</a></li>
                        <li><a href="#">Contact Us</a></li>
                        <li><a href="#">Terms & Conditions</a></li>
                        <li class="last-policy"><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="footer-email">
                    <p>Copyright © 2019 Yards360.com | Designed & Developed By <a href="http://netmaxims.com/" target="_blank">NetMaxims</a> </p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- close -->







</body>

</html>

<script type="text/javascript">
  function forgot() {
    $(".form-control").css('background-color','');

    $(".info").html('');                  

    if($("#forgotemail").val()=="") {

     $("#forgotemail-info").html("This field is required");

     $("#forgotemail").css('background-color','#FFFFDF');

     return false;

 }

 if(!$("#forgotemail").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

     $("#forgotemail-info").html("This is not a valid email format");

     $("#forgotemail").css('background-color','#FFFFDF');

     return false;

 }
     //alert('chirag');
     $.ajax({

     	url: "action/submission.php",

     	type: "POST",

     	data:'forgotemail='+$("#forgotemail").val(),
     	success:function(data){
                    //alert(data);

                    console.log(data);

                    if(data=='0'){

                     $("#forgot-status").html('No email exists');

                 }
                 if(data=='1'){
                    Swal.fire(
                        'Success!',
                      'Password has been Sent to your Mail !',
                      'success'
                      )
                    // $("#forgotemail").reset();
                    $("#forgot-status").html("Password sent at your Email Id"); 
                     //window.location.href='post_property.php';
                 }
             }
         });

 }


                 // test login section end 
             </script>

             <style>
             	.input-container i {
             		padding-left: 12px;
             	}

             	.input-field {
             	
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


             /*	.frmdiv{
             		height: 510px;
             	}
                */

                @media only screen and (max-width: 375px) 
                {
             	/*	.frmdiv{
             			height: 400px!important;
                         }*/
                     }





                 </style>





                 <style type="text/css">

                    input:-webkit-autofill,
                    input:-webkit-autofill:hover, 
                    input:-webkit-autofill:focus,
                    textarea:-webkit-autofill,
                    textarea:-webkit-autofill:hover,
                    textarea:-webkit-autofill:focus,
                    select:-webkit-autofill,
                    select:-webkit-autofill:hover,
                    select:-webkit-autofill:focus {

                      -webkit-text-fill-color: black !important;
                      -webkit-box-shadow: 0 0 0px 1000px white inset !important;
                      transition: background-color:white !important;
                  }

                  input#forgotemail {
                    position: relative;
                    top: 0px;
                }

            </style>

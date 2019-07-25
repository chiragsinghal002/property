<?php 
include_once'Object.php';
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
    <title>Dashboard login</title>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/loading.css" rel="stylesheet" type="text/css" />
    <script src="js/jequary.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script src="js/main.js"></script>
    <script src="js/mainfunction.js"></script>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.7/js/select2.min.js"></script>
</head>

<body>





    <!-- Parent div -->

    <div class="bgimg">

        <!--   <img src="image/bgg.jpg"> -->

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

                            <p class="para">CALL US TOLL FREE</p>

                            <p class="para1">1800-00-0000</p>

                        </div>
                        <?php if(!empty($_SESSION)):?>
                        <div class="homesignup_btn">
                            <a href="registration.php">
                                <input type="button" name="signup" value="MY ACCOUNT" class="btn btn-success">
                            </a>
                        </div>
                    <?php endif;?>
                    </div>

                </div>

            </div>

        </div>

        <div class="registarion-home-area">
            <div class="container">
                <div class="row">

                    <div class="col-sm-6"></div>

                    <div class="col-sm-6 submition-form">

                        <div class="registration-form-top">
                           <!--  <div class="tabs">
                                <button type="button" class="btn btn-success">Login</button>                        
                                        <button type="button" class="btn act" onclick="register_show();" id="2">Register</button>
                                    <p class="new"> <a>Create Account</a></p>
                                </div> -->

                                <div class="frmdiv registration login" id="login_div_show">
                               <!--  <div class="tabs">
                                    <a href="index.php" class="login">login</a>
                                    <a href="registration.php">
                                        <button type="button" class="btn btn-success">Register</button>
                                    </a>
                                    <p class="new">Welcome Back !</p>
                                </div> -->
                                <!--<h2>REGISTRATION</h2>--->
                                <!-- <p class="welcome-back">Welcome Back !</p> -->
                                <div id="signin-status"></div>

                                <!-- <input type="hidden" name="action" id="action" value="register" /> -->

                                <div class="input-container">

                                    <i class="glyphicon glyphicon-user"><span>*</span></i>

                                    <input class="input-field" type="text" placeholder="Username / Email" id="email" name="email">
                                    <div class="input-msg" style="color: red;margin-left: 26px;"><span id="email-info" class="info"></span></div>
                                </div>

                                <input type="hidden" id="otpnext" value="">

                                

                                <div class="input-container">

                                    <i class="glyphicon glyphicon-lock"><span>*</span></i>

                                    <input class="input-field" type="password" placeholder="Password" id="password" name="password">
                                    <div class="input-msg" style="color: red;margin-left: 26px;"><span id="password-info" class="info"></span></div>
                                </div>

                                <div class="form-group">

                                    <input type="checkbox" name="rememberme" id="rememberme" class="rembr"> <span class="rembr1">Remember Me</span>

                                    <a href="forgot.php" class="forgot">Forgot Password ?</a>

                                </div>

                                <div id="successRegister"></div>
                                <!-- <input type="submit" class="btn btn-success1200" value="REGISTRATION" onClick="return ValidateRegister();" /> -->
                                <input type="button" class="btn btn-success1200" onClick="return login();" value="LOG IN" />

                                <p class="new">Not a member?  &nbsp; <a href="registration.php"> Create Account</a></p>

                                <div class="image-gallery">
                                    <img src="image/login-pic.jpg" />
                                </div>

                            </div>
                        </div>
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
                            <li><a href="about_us.php">About Us</a></li>
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
    <!-- <script type="text/javascript">
        function login_show(){
            $("#login_div_show").show();
            $("#register_div_show").hide();
            $("#1").addClass('btn-success');
            $("#2").removeClass('btn-success');
        }
        function register_show(){
             $("#login_div_show").hide();
            $("#register_div_show").show();
              $("#2").addClass('btn-success');
             $("#1").removeClass('btn-success');
          
        }
    </script> -->
    <script type="text/javascript">
      function login() {
       $(".form-control").css('background-color','');

       $(".info").html('');                  

       if($("#email").val()=="") {

        $("#email-info").html("This field is required");

        $("#email").css('background-color','#FFFFDF');

        return false;

    }

    if(!$("#email").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

        $("#email-info").html("This is not a valid email format");

        $("#email").css('background-color','#FFFFDF');

        return false;

    }

    if($("#password").val()=="") {

        $("#password-info").html("This field is required");

        $("#password").css('background-color','#FFFFDF');

        return false;

    }    
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


                 // test login section end 
             </script>

             <script type="text/javascript">
                function registration() {
            // alert('kanchan');
            //console.log('chirag');
            var fullname = $("#fullname").val();
            var email1 = $("#email1").val();
            var phone = $("#Phone").val();
            var pass = $("#password").val();
            var shop_name = $("#shop_name").val();
            var address = $("#address").val();
            var city = $("#city").val();
            var sector = $("#sector").val();
            $.ajax({
                url: "action/submission.php",
                type: 'POST',
                data: {
                    'submit': 1,
                    fullname: fullname,
                    email1: email1,
                    phone: phone,
                    pass: pass,
                    shop_name: shop_name,
                    address: address,
                    city: city,
                    sector: sector
                },
                success: function(data) {
                    console.log(data);
                    if (data == '2') {
                        $("#otp_error").html('Email Id Already Exist');
                    }

                    if (data == 1) {
                        Swal.fire(
                            'Good job!',
                            'You Have Successfully Registration with us!',
                            'success'
                            )
                        window.location.href = 'index.php';
                    }
                }
            });

        }

        function generateOtp() {
            var fullname = $("#fullname").val();
            var email1 = $("#email1").val();
            var phone = $("#Phone").val();
            $.ajax({
                url: "ajax_new.php",
                type: 'POST',
                data: {
                    'submit_otp': 1,
                    fullname: fullname,
                    email1: email1,
                    phone: phone
                },
                success: function(data) {
                    console.log(data);
                    var text = JSON.parse(data);
                    $("#otpnext").val(text.otp);
                    // console.log(text.otp);
                }
            })

        }

        function validateotp() {
            var otp = $("#otp").val();
            if (otp == '') {
                $("#otp_error").html('Please Enter this field');
            } else {
                var otp_user = $("#otpnext").val();
                if (otp == otp_user) {
                    registration();
                    $("#otp-msg").hide();
                } else {
                    $("#otp-msg").show();
                }
            }

        }

        function ValidateRegister() {

            var valid = true;

            $(".form-control").css('background-color', '');

            $(".info").html('');

            if ($("#fullname").val() == "") {

                $("#fname_error").html("This field is required");

                $("#fullname").css('background-color', '#FFFFDF');

                valid = false;

            }

            if ($("#email1").val() == "") {

                $("#email-info").html("This field is required");

                $("#email1").css('background-color', '#FFFFDF');

                valid = false;

            }

            if (!$("#email1").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                $("#email-info").html("This is not a valid email format");

                $("#email1").css('background-color', '#FFFFDF');

                valid = false;

            }

            if ($("#Phone").val() == "") {

                $("#Phone-info").html("This field is required");

                $("#Phone").css('background-color', '#FFFFDF');

                valid = false;

            }

            if ($("#password").val() == "") {

                $("#password-info").html("This field is required");

                $("#password").css('background-color', '#FFFFDF');

                valid = false;

            }

            if ($("#shop_name").val() == "") {

                $("#shop_name-info").html("This field is required");

                $("#shop_name").css('background-color', '#FFFFDF');

                valid = false;

            }

            if ($("#sector").val() == "") {
                $("#sector-info").html("This field is required");
                valid = false;
            }

            if (valid == true) {
                $("#myModal").modal('show');
                // registration();
                generateOtp();

            }

            return valid;

        }
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('.js-example-basic-single').select2();
        });
    </script>

    <div class="modal fade" id="myModal" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <span id="otp-msg" style="display: none;">
                <div class="alert alert-danger">
                  <strong>Failed!</strong> Your Otp Doesn't Match.
              </div>
          </span>

          <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Please enter the One-Time Password to verify the account</h4>
                <h5 class="modal-subhead">A one time password has been send to xx-xx-xx-xx</h5>
            </div>
            <div class="modal-body otp">
                <!-- <input type="text" name="otp" class="otp" id="otp" minlength="4" maxlength="4" placeholder="Enter Your OTP"> -->
                <input type="text" name="otp" class="otp" id="" minlength="1" maxlength="1">
                <input type="text" name="otp" class="otp" id="" minlength="1" maxlength="1">
                <input type="text" name="otp" class="otp" id="" minlength="1" maxlength="1">
                <input type="text" name="otp" class="otp" id="" minlength="1" maxlength="1">
                <span id="otp_error" style="color: red;"></span>
            </div>
            <input type="button" class="btn-success validt" value="Validate" onclick="validateotp()">
            <a href="" class="resend">resend one time password</a>
        </div>

    </div>
</div>
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
                                <button type="button" class="btn btn-success" onclick="login_show();" id="1">Login</button>                        
                                        <button type="button" class="btn act" onclick="register_show();" id="2">Register</button>
                                    <p class="new"> <a>Create Account</a></p>
                                  </div> -->
                                  <div class="frmdiv registration">
                                 <!-- <div class="tabs">
                                <button type="button" class="btn" onclick="login_show();">Login</button>                        
                                        <button type="button" class="btn btn-success" onclick="register_show();">Register</button>
                                    <p class="new">New to yards360 ? <a>Register with us</a></p>
                                  </div> -->
                                  <!--<h2>REGISTRATION</h2>--->
                                  <div id="register-status"></div>

                                  <input type="hidden" name="action" id="action" value="register" />

                                  <div class="input-container new">

                                    <i class="glyphicon glyphicon-user"><span>*</span></i>

                                    <input class="input-field new" type="text" placeholder="First Name" id="fname" name="fname">
                                    <!-- <div class="input-msg" style="color: red;margin-left: 26px;"><span id="fname_error" class="info"></span></div>

                                      <i class="glyphicon glyphicon-user"><span>*</span></i> -->

                                      <input class="input-field" type="text" placeholder="Last Name" id="lname" name="lname">
                                      <div class="input-msg" style="color: red;margin-left: 26px;"><span id="fname_error" class="info"></span></div>
                                    </div>

                                    <div class="input-container star">

                                      <i class="fa fa-envelope" aria-hidden="true"><span>*</span></i>
                                      <input class="input-field" type="email" placeholder="Email(Your Username)" id="email1" name="email">
                                      <div class="input-msg" style="color: red;margin-left: 26px;"><span id="email-info" class="info"></span></div>
                                    </div>
                                    <input type="hidden" id="otpnext" value="">

                                    <div class="input-container star">

                                      <i class="fa fa-phone" aria-hidden="true"><span>*</span></i>

                                      <input class="input-field" type="text" placeholder="Phone / Mobile" id="Phone" name="phone">
                                      <div class="input-msg" style="color: red;margin-left: 26px;"><span id="Phone-info" class="info"></span></div>
                                    </div>

                                    <div class="input-container">
                                      <i class="glyphicon glyphicon-lock"><span>*</span></i>
                                      <input class="input-field" type="password" placeholder="Password" id="password" name="password">
                                      <div class="input-msg" style="color: red;margin-left: 26px;"><span id="password-info" class="info"></span></div>
                                    </div>

                                    <div class="input-container">

                                      <i class="glyphicon glyphicon-briefcase"><span>*</span></i>

                                      <input class="input-field" type="text" placeholder="Business Name" id="shop_name" name="shop_name">
                                      <div class="input-msg" style="color: red;margin-left: 26px;"><span id="shop_name-info" class="info"></span></div>
                                    </div>

                                    <div class="input-container">


                                      <i class="glyphicon glyphicon-home"><span>*</span></i>

                                      <input class="input-field" type="text" placeholder="Address" id="address" name="address">
                                      <!-- <textarea class="input-field" name="address" id="address">Enter Your Address</textarea> -->
                                      <div class="input-msg" style="color: red;margin-left: 26px;"><span id="address-info" class="info"></span></div>
                                    </div>
                                    <div class="input-container">

                                      <i class="glyphicon glyphicon-equalizer"><span></span></i>

                                      <select name="citys" class="city input-field" id="city">
                                        <!-- <option value="" style="color: #ccc;">--Select City--</option> -->
                                        <option value="faridabad">Faridabad</option>
                                      </select>

                                    </div>
                                    <div class="input-container reg-secter">

                                      <i class="glyphicon glyphicon-globe"><span>*</span></i>

                                      <!-- <input class="input-field" type="text" placeholder="Area/Sector" id="shop_name" name="shop_name"> -->
                                      <?php $location=$common->getAreaSector(1);?>
                                      <!-- <input type="text" name="sector" placeholder="Area/Sector" class="ginputfield" id="sector"> -->

                                      <select id="sector" name="sector"   class="js-example-basic-single sector input-field" style="width:330px;">
                                        <option value=""></option>
                                        <?php foreach($location as $data){
                                          echo '<option value="'.$data['sector_area'].'">'.$data['sector_area'].'</option>';
                                        }?>
                                      </select>
                                    </div>
                                    <div class="input-msg"  style="color: red;margin-left: 26px;"><span id="sector-info" class="info"></span></div>

                                    <div class="form-group">

                                      <!--<input type="checkbox" name="rememberme" id="rememberme" class="rembr"> <span class="rembr1"> Remember Me</span>-->

                                      <!--        <a href="index.php">Login Here !</a> -->

                                    </div>

                                    <div id="successRegister"></div>
                                    <!-- <input type="submit" class="btn btn-success1200" value="REGISTRATION" onClick="return ValidateRegister();" /> -->
                                    <input type="button"  class="btn btn-success1200" onClick="return ValidateRegister();" value="Register Now" />

                                    <p class="login-link">Already member? &nbsp; <a href="index.php">Log In</a></p>

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
                      function registration() {
            // alert('kanchan');
            //console.log('chirag');
            var fname = $("#fname").val();
            var lname = $("#lname").val();
            // var fullname=fname + ' ' + lname;
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
                fname: fname,
                lname:lname,
                email1: email1,
                phone: phone,
                pass: pass,
                shop_name: shop_name,
                address: address,
                city: city,
                sector: sector
              },
              beforeSend:function(){
                let timerInterval
                Swal.fire({
                  title: 'We are Sending a verification link!',
                  html: 'Please Wait...',
                  timer: 15000,
                  onBeforeOpen: () => {
                    Swal.showLoading()
                    timerInterval = setInterval(() => {
                      Swal.getContent().querySelector('strong')
                      .textContent = Swal.getTimerLeft()
                    }, 100)
                  },
                  onClose: () => {
                    clearInterval(timerInterval)
                  }
                }).then((result) => {
                  if (
    // Read more about handling dismissals
    result.dismiss === Swal.DismissReason.timer
    ) {
                    console.log('I was closed by the timer')
                }
              })
              },
              success: function(data) {
                console.log(data);
                if (data == 1) {
                 
                  window.location.href = 'index.php';
                }
              }
            });

          }

          function checkUser(){
           var email1 = $("#email1").val();
           $.ajax({
            url: "ajax_new.php",
            type: 'POST',
            data: {
              'checkemail': 1,
              email1: email1
            },
            success: function(data) {
              console.log(data);
              if(data==1){
                $("#register-status").html('Email Id Already Exist');
              }else{
                $("#myModal").modal('show');
                generateOtp();
              }

                    // console.log(text.otp);
                  }
                })
         }

         function generateOtp() {
          var fname = $("#fname").val();
          var lname = $("#lname").val();
            // var fullname=fname + ' ' + lname;
            var email1 = $("#email1").val();
            var phone = $("#Phone").val();
            $.ajax({
              url: "ajax_new.php",
              type: 'POST',
              data: {
                'submit_otp': 1,
                fname: fname,
                lname:lname,
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
            var otp1 = $("#otp1").val();
            var otp2 = $("#otp2").val();
            var otp3 = $("#otp3").val();
            var otp4 = $("#otp4").val();
            var otp = otp1 + otp2 + otp3 + otp4;
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

            if ($("#fname").val() == "") {

              $("#fname_error").html("This field is required");

              $("#fname").css('background-color', '#FFFFDF');

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


            if (!$("#Phone").val().match(/^\d*(?:\.\d{1,2})?$/)) {

              $("#Phone-info").html("Wrong Format");

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

            if ($("#address").val() == "") {

              $("#address-info").html("This field is required");

              $("#address").css('background-color', '#FFFFDF');

              valid = false;

            }

            if ($("#sector").val() == "") {
              $("#sector-info").html("This field is required");
              $("#sector").css('background-color', '#FFFFDF');
              valid = false;
            }

            if (valid == true) {

                 // registration();

                 checkUser();

               }

               return valid;

             }
           </script>
           <script type="text/javascript">
            $(document).ready(function() {
              $('.js-example-basic-single').select2();
            });
          </script>
          <script type="text/javascript">
            $(document).ready(function() {
              $selectElement = $('#sector').select2({
                placeholder: "Area/Sector",
                allowClear: true
              });
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
                  <button type="button" class="close" data-dismiss="modal"><!-- &times; -->  X</button>
                  <h4 class="modal-title">Please enter the One-Time Password to verify the account</h4>
                  <h5 class="modal-subhead">A one time password has been send to xx-xx-xx-xx</h5>
                </div>
                <div class="modal-body otp">
                  <!-- <input type="text" name="otp" class="otp" id="otp" minlength="4" maxlength="4" placeholder="Enter Your OTP"> -->
                  <input type="text" name="otp" class="otp" id="otp1" minlength="1" maxlength="1">
                  <input type="text"  name="otp" class="otp" id="otp2" minlength="1" maxlength="1">
                  <input type="text"  name="otp" class="otp" id="otp3" minlength="1" maxlength="1">
                  <input type="text"  name="otp" class="otp" id="otp4" minlength="1" maxlength="1">
                  <span id="otp_error" style="color: red;"></span>
                </div>
                <input type="button" class="btn-success validt" value="Validate" onclick="validateotp()">
                <!-- <a href="" class="resend">resend one time password</a> -->
              </div>

            </div>
          </div>
          <script type="text/javascript">
            $(".otp").keyup(function () {
                        // console.log('next');
                        if (this.value.length == this.maxLength) {
                          $(this).next('.otp').focus();
                        }
                      });
                    </script>
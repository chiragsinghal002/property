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

      	 	 <a href="index.php"> <img src="image/logo.png" class="imglogo"> </a>

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

						  <h2>REGISTRATION STEP 2</h2>
              <div id="register-status"></div>

                <input type="hidden" name="action" value="register" />                

              <div class="input-container">

                <i class="glyphicon glyphicon-user"><span>*</span></i>

                <input class="input-field" type="text" placeholder="FIRM NAME" id="firm_name" name="firm_name">

              </div>
              <div class="input-msg" style="color: red;margin-left: 26px;"><span id="fullname-info" class="info"></span></div> 
              
              


						  <div class="input-container">

						    <i class="glyphicon glyphicon-user"><span>*</span></i>
						    <input class="input-field" type="text" placeholder="Adress" id="address" name="address">

						  </div> 
              <div class="input-msg" style="color: red;margin-left: 26px;"><span id="address-info" class="info"></span></div> 

                        



						
             



                          <div class="form-group">

                          	<!--<input type="checkbox" name="rememberme" id="rememberme" class="rembr"> <span class="rembr1"> Remember Me</span>-->

                          	<a href="index.php">Login Here !</a>

                          </div>


                      <div id="successRegister"></div>
						  <input type="submit" class="btn btn-success1200" value="REGISTRATION" onClick="return ValidateRegister();" />


      	 		</div>
      	 		
          
      	 	</div>

      	 </div>



      </div>

 	</div>


</body>

</html>

<script type="text/javascript">
 function registration() {
                    //alert('kanchan');

                //console.log('chirag');

                $.ajax({

                  url: "action/submission.php",

                  type: "POST",

                  data:'fullname='+$("#fullname").val()+'&email1='+$("#email1").val()+'&phone='+$("#phone").val()+'&password='+$("#password").val(),

                  success:function(data){                  

                    if(data=='2'){
                      
                     $("#email-info").html("Email Already Exist");

                     $("#email1").css('background-color','#FFFFDF');

                   }

                   if(data==1){
                    window.location='';
                   }                 

                       

                     }
                   });

              }

              function ValidateRegister() {
                  
                  var valid = true;

                  $(".form-control").css('background-color','');

                  $(".info").html('');

                  if($("#fullname").val()=="") {

                    $("#fullname-info").html("This field is required");

                    $("#fullname").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  

                  if($("#email1").val()=="") {

                    $("#email-info").html("This field is required");

                    $("#email1").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if(!$("#email1").val().match(/^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/)) {

                    $("#email-info").html("This is not a valid email format");

                    $("#email1").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#Phone").val()=="") {

                    $("#Phone-info").html("This field is required");

                    $("#Phone").css('background-color','#FFFFDF');

                    valid = false;

                  }

                  if($("#password").val()=="") {

                    $("#password-info").html("This field is required");

                    $("#password").css('background-color','#FFFFDF');

                    valid = false;

                  }                 

                      if(valid==true){
                      
                        registration();

                      }

                      return valid;

                    }

                  </script>



<style type="text/css">


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

.frmdiv h2 {
    margin-left: 24px;
    color: #41cc56;
    font-family: 'Lato', sans-serif;
    margin-top: 0px!important;
}
input.btn.btn-success1200 {
    color: #fff;
    background-color: #5cb85c;
    border-radius: 100px;
    height: 36px;
    width: 164px;
    margin: 0 auto;
    display: block;
    margin-top: 38px;
}
i.fa.fa-envelope {
    padding-left: 25px;
    padding-right:9px;
}
i.fa.fa-phone {
    padding-left: 27px;
    font-size: 17px;
    padding-right:9px;
    
}


@media only screen and (max-width: 375px) 
    {    
        
        body,html{
    overflow-y:hidden;
    overflow-x:hidden;
      }
        .frmdiv.registration {
                width: 300px!important;
                top:20px!important;
                height:400px!important;
        }
        .sigbtn:before {
             top:100px!important;
             width:312px!important;
             left:1em!important;
             
        }
    }
</style>


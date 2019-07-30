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
  <div class="container-fluid">
        <div class="row">

        <!-- Logo of 6 cols -->

         <div class="col-md-6">

           <div class="logo">

            <img src="image/logo.png" class="imglogo">

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

            <div class="btn1">

              <input type="submit" name="signup" value="SIGNUP" class="btn btn-success">

            </div>

            </div>        

           <!-- Diiv for Form --> 
          

           <form class="form-horizontal" action="action/submission.php" method="post">
            <div class="frmdiv registration">

              <h2>YOUR NEW <br/> HOME AWAITS</h2>
               <span style="color:red; font-size:16px;"><?php
  if(!empty($_GET['mes']))
  {
  echo $_GET['mes'];
  }
  ?>
  </span>

                <input type="hidden" name="action" value="changepassword" />     
                <input type="hidden" name="email" value="<?php echo trim($_GET['email']); ?>" />  

              <div class="input-container">

                <i class="glyphicon glyphicon-lock"></i>

                <input class="input-field" type="password" placeholder="Old Password:"  name="old_password">

              </div>


              <div class="input-container">

                <i class="glyphicon glyphicon-lock"></i>

                <input class="input-field" type="password" placeholder="New Password:"  name="new_password">

              </div>  

              <div class="input-container">

                <i class="glyphicon glyphicon-lock"></i>

                <input class="input-field" type="password" placeholder="Confirm Password:"  name="confirm_password">

              </div>
              
              <div class="form-group">

                <input type="checkbox" name="rememberme" id="rememberme" class="rembr"> <span class="rembr1"> Remember Me</span>

                <a href="index.php">Login Here !</a>

              </div>


              <input type="submit" name="submit" class="btn btn-success1" value="SUBMIT" />


            </div>
            
          </form>
          </div>

         </div>



      </div>

  </div>


</body>

</html>



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

</style>
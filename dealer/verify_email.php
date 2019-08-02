<?php include_once'include/header.php';

include_once 'Object.php';

?>

<?php 

if(isset($_GET['key'])){

	$data['key']=$_GET['key'];

	$common->verifyEmailMatch($data);

}

?>

<!DOCTYPE html>

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

                       <!--  <div class="homesignup_btn">

                            <a href="index.php">
                                <input type="button" name="signup" value="MY ACCOUNT" class="btn btn-success">
                            </a>

                        </div> -->

                    </div>

                </div>

            </div>

        </div>











        <!-- Div for Form -->



        <div class="frmdiv forgot">

        	<!-- <form> -->

        		<h2>Thank you for Verifying your Email!</h2>
        		 <div class="form-group forgot">

                <!--<input type="checkbox" name="rember" class="rembr"> <span class="rembr1"> Remember Me</span>-->

                <p>Click here to <a href="index.php">  Login !</a>

            </div>
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
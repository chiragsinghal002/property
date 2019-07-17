<?php 
include("action/logincheck.php");

include_once'include/header.php';
include_once'include/sidebar.php';
include_once('classes/Common.php');
$showDealerrDetail = new Common;
$showdetailDealer = $showDealerrDetail->showDealerrDetail($_SESSION['dealer_email']);
//echo $showdetailDealer['dealer_phone'];
// var_dump($showdetailDealer);
?>
<!--Main Div Of Chane Password Fleds  -->
<div class="buyrentdiv">

	<!-- Old Password Inside Content -->

	<div class="change_password">
		<?php 
		if(!empty($_GET['mes']))
		{
			echo $_GET['mes'];
		}
		?>
		<style>
			.image-upload>input {
				display: none;
			}
		</style>
		<form class="form-horizontal" method="post" action="action/submission.php" enctype="multipart/form-data" data-toggle="validator" role="form">

			<!-- <input type="hidden" name="action" value="updateprofile" /> -->

			<div class="form-group">
				<label class="control-label col-sm-2" for="pwd">User Image</label>
				<div class="col-sm-10"> 
					<div class="image-upload">
						<label for="file-input">
							<?php if(!empty($showdetailDealer['dealer_photo']))
							{
								echo '<img id="blah" width="100px" class="Updtprofe_userimg" src="image/uploads/'.$showdetailDealer['dealer_photo'].'"/>';  
							}else{
								echo '<img id="blah" src="image/admin.png"/>';
							} ?>
						</label>
					</div>

				</div>
			</div>

			<div class="form-group has-feedback">
				<label class="control-label col-sm-2" for="email">Email</label>
				<div class="col-sm-10">
					<input type="email" name="dealer_email" readonly="" value="<?php echo $_SESSION['dealer_email']; ?>" />
					<?php if($showdetailDealer['email_verified']=='1'){echo '<span style="color:green;">'.'Email is Verified'.'</span>';}else{echo '<span style="color:red;">'.'Email Verification Required'.'</span>';}?>
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				<div class="help-block with-errors"></div>
				</div>
				
			</div>

			<div class="form-group has-feedback">
				<label class="control-label col-sm-2" for="email">Full Name</label>
				<div class="col-sm-10">
					
					<input required type="text" name='dealer_fname' value="<?php if(!empty($showdetailDealer['dealer_first_name'])){ echo $showdetailDealer['dealer_first_name']; } ?>" class="form-control" id="email" required="" placeholder="Please Enter First Name">
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				<div class="help-block with-errors"></div>
				</div>
				
			</div>

			

			<div class="form-group has-feedback">
				<label class="control-label col-sm-2" for="pwd">Mobile No</label>
				<div class="col-sm-10"> 
					<input required type="tel" name='dealer_phone' minlength="10" maxlength="10" class="form-control"  value="<?php if(!empty($showdetailDealer['dealer_phone'])){ echo $showdetailDealer['dealer_phone']; } ?>" id="pwd" placeholder="Please Enter Phone"/>
					<?php if($showdetailDealer['mob_verified']=='1'){echo '<span style="color:green;">'.'Mobile is Verified'.'</span>';}else{echo '<span style="color:red;">'.'Mobile Verification Required'.'</span>';}?>
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				<div class="help-block with-errors"></div>
				</div>
			</div>

			<div class="form-group has-feedback">
				<label class="control-label col-sm-2" for="pwd">Address</label>
				<div class="col-sm-10"> 
					<input required type="text" name='dealer_address' class="form-control" id="pwd" placeholder="Please Enter Address" value="<?php if(!empty($showdetailDealer['dealer_address'])){ echo $showdetailDealer['dealer_address']; } ?>">
					<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
				<div class="help-block with-errors"></div>
				</div>
			</div>

			

			<div class="form-group">
				<!-- <label class="control-label col-sm-2" for="pwd">User Image</label> -->
				<div class="col-sm-10"> 
					<div class="image-upload">
						<label for="file-input">
							<input name="dealer_photo" type="file" onchange="readURL(this);"/>

						</label>

						
					</div>

				

				</div>
			</div>

			<div class="form-group">
				<label class="control-label col-sm-2" for="pwd"></label>
				<div class="col-sm-10"> 
					<div class="chanepass_button">
						<!-- <button type="submit" class="btn btn-default">SUBMIT</button> -->
						<input type="submit" class="" name="updateprofile" value="update">
					</div>
				</div>
			</div>
</form>

</div>  



</div> 

</div>  

</div>



<!-- Footer -->
<div class="col-sm-12 footer_last">
	<!-- Content of Footer -->
	<div class="footer_contnt">

		<div class="footer_labels">
			<img src="image/footerlogo1.png" class="footer_img">
		</div>   

		<div class="footer_labels">
			<h2>REAL ESTATE IN INDIA</h2>
			<ul>
				<li>Mumbai</li>
				<li>Bangalore</li>
				<li>Chennai</li>
				<li>Hyderabad</li>
			</ul>
		</div>


		<div class="footer_labels">
			<h2>PROPERTY.COM LINKS</h2>
			<ul>
				<li>Mobile Apps</li>
				<li>National Home</li>
				<li>Buy Our Service</li>
				<li>Residential property</li>
			</ul>
		</div>


		<div class="footer_labels">
			<h2>COMPANY</h2>
			<ul>
				<li>About Us </li>
				<li>Contact Us</li>
				<li>Careers with Us</li>
				<li>Terms & Conditions</li>
			</ul>
		</div>


		<div class="footer_labels">
			<h2>Address</h2>
			<ul>
				<li>Info Edge (India) Ltd.</li>
				<li>B-8, Sector 132,</li>
				<li>Noida, 201301</li>
			</ul>
		</div>  

	</div>


</div>   


</div>
</div>

</div>


<div class="footer_copyright">
	<p>© Copyright 2019 Property.com . Designed & Developed by Netmaxims</p>
</div> 




</body>
</html>



<script type="text/javascript">

	$(function(){
		$('[data-toggle="tooltip"]').tooltip();
		$(".side-nav .collapse").on("hide.bs.collapse", function() {                   
			$(this).prev().find(".fa").eq(1).removeClass("fa-angle-right").addClass("fa-angle-down");
		});
		$('.side-nav .collapse').on("show.bs.collapse", function() {                        
			$(this).prev().find(".fa").eq(1).removeClass("fa-angle-down").addClass("fa-angle-right");        
		});
	})    


</script>



<style type="text/css">

	.buyrentdiv {
		padding-bottom: 75px!important;
	}
	.row.extracolor1 {
		background: lightgray;
	}

	.extracolor2{
		background: #0f1926;
	}

	.fff {
		padding-left: 0px;
	}
</style>
<script type="text/javascript">
	function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(200);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }
</script>
<?php 
include("action/logincheck.php");
include_once'include/header.php';
include_once'include/sidebar.php';
// include_once('classes/Common.php');
// $showDealerrDetail = new Common;
// echo $showdetailDealer['dealer_phone'];
 // var_dump($showdetailDealer);
?>
<!--Main Div Of Chane Password Fleds  -->
<div class="buyrentdiv">

	<!-- Old Password Inside Content -->

	<div class="change_password">
		<p class="succmsg">
		<?php 
		if(!empty($_GET['mes']))
		{
			echo $_GET['mes'];
		}
		?>
	</p>
		<style>
			.image-upload>input {
				display: none;
			}
		</style>

		<?php if($showdetailDealer['email_verified']!=='1'){ ?>
			<?php include("include/verified.php"); ?>
			<?php } ?>

			<form class="form-horizontal" method="post" action="action/submission.php" enctype="multipart/form-data" data-toggle="validator" role="form">

				<!-- <input type="hidden" name="action" value="updateprofile" /> -->

				<div class="form-group">
				<!-- 	<label class="control-label col-sm-1 usimg" for="pwd">User Image</label> -->
					<div class="col-sm-9"> 
						<div class="image-upload">
							
							<div class="image-upload">
								<label for="file-input">
									<!-- <input name="dealer_photo" type="file" onchange="readURL(this);"/> -->
									<button class="addfiles"><i class="fa fa-pencil"></i></button>
									<input id="fileupload" type="file" name="dealer_photo" style='display: none;' onchange="readURL(this);">
								</label>

								
							</div>
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

				<div class="row">
				<div class="col-sm-6 col-xs-6">
				<div class="uppro-container">
						<i class="glyphicon glyphicon-user"></i>
						<input required type="text" name='dealer_fname' value="<?php if(!empty($showdetailDealer['dealer_first_name'])){ echo $showdetailDealer['dealer_first_name']; } ?>" class="uppro_input" required="" placeholder="Please Enter First Name">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>

			</div>
			<div class="col-sm-6 col-xs-6">
				<div class="uppro-container">
						<i class="glyphicon glyphicon-user"></i>
						<input required type="text"  name='dealer_lname' value="<?php if(!empty($showdetailDealer['dealer_last_name'])){ echo $showdetailDealer['dealer_last_name']; } ?>" class="uppro_input updt_buss" required="" placeholder="Please Enter last Name">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					</div>

			</div>
		</div>
		<div class="row">
				<div class="col-sm-6 col-xs-6">
					<div class="uppro-container">

						<i class="fa fa-whatsapp"></i>
						<input type="text" class="uppro_input" name="dealer_telephone_no" placeholder="Telephone Number" value="<?php if(!empty($showdetailDealer['dealer_telephone_no'])){ echo $showdetailDealer['dealer_telephone_no']; } ?>">
		
					</div>

			</div>	
				<div class="col-sm-6 col-xs-6">
					<div class="uppro-container">
						<i class="glyphicon glyphicon-home"></i>
						<input type="text" class="uppro_input bussiness_input" name="dealer_firm_name" placeholder="Bussinees Name" value="<?php if(!empty($showdetailDealer['dealer_firm_name'])){ echo $showdetailDealer['dealer_firm_name']; } ?>" disabled>
					<a href="mailto: info@yards360.com" style="color: red;" class="uplock"><i class="fa fa-lock" aria-hidden="true"></i></a>
					</div>

			</div>	
		</div>	

			<div class="row">
				<div class="col-sm-6">

				<div class="uppro_mobiles">
					
					 <i class="fa fa-phone" aria-hidden="true"></i>
					
						<input required type="tel" name='dealer_phone' minlength="10" maxlength="10" class="uppro_mob"  value=" <?php if(!empty($showdetailDealer['dealer_phone'])){ echo $showdetailDealer['dealer_phone']; } ?>" id="pwd" placeholder="Please Enter Phone" readonly/>
						<?php if($showdetailDealer['mob_verified']=='1'){echo '<span style="color:green;" class="check-color">'.'<i class="fa fa-check" aria-hidden="true"></i>'.'</span>';}else{echo '<span style="color:red;">'.'<i class="fa fa-times" aria-hidden="true"></i>'.'</span>';}?>
						<a href="mailto: info@yards360.com" style="color: red;" class="uplock"><i class="fa fa-lock" aria-hidden="true"></i></a>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
					
						 <input type="text" class="uppro_mob" name="dealer_phone_second" placeholder="Mobile Number" value="<?php if(!empty($showdetailDealer['dealer_phone_second'])){ echo $showdetailDealer['dealer_phone_second']; } ?>">
						
			
				</div>

				</div>
				<div class="col-sm-6">
				<div class="uppro-container">
						<i class="glyphicon glyphicon-home"></i>
						<input required type="text" name='dealer_address' class="uppro_input" id="pwd" placeholder="Please Enter Address" value="<?php if(!empty($showdetailDealer['dealer_address'])){ echo $showdetailDealer['dealer_address']; } ?>">
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
						</div>
				
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6 col-xs-6">
				<div class="uppro-container">
						<i class="glyphicon glyphicon-home"></i>
						 <?php $location=$common->getAreaSector(1);?>
                                      <!-- <input type="text" name="sector" placeholder="Area/Sector" class="ginputfield" id="sector"> -->

                                      <select id="sector" name="sector"   class="js-example-basic-single sector uppro_input" style="width:330px;">
                                        <option value=""></option>
                                        <?php foreach($location as $data){
                                        	 $selected=($data['sector_area'] == $showdetailDealer['sector'])? "selected" : "";
                                          echo '<option value="'.$data['sector_area'].'" '.$selected.'>'.$data['sector_area'].'</option>';
                                        }?>
                                      </select>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
				</div>
			</div>
		<div class="col-sm-6 col-xs-6">

				<div class="uppro-container">
						<i class="glyphicon glyphicon-home"></i>
						<!-- <input required type="text" name='dealer_city' class="form-control" id="pwd" placeholder="Please Enter Address" value="<?php if(!empty($showdetailDealer['city'])){ echo $showdetailDealer['city']; } ?>"> -->
						 <select name="dealer_city" class="city input-field  uppro_input" id="city">
                                        <!-- <option value="" style="color: #ccc;">--Select City--</option> -->
                                        <option value="faridabad">Faridabad</option>
                                      </select>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
		
				</div>
			</div>
		</div>
				

		<div class="row">
				<div class="col-sm-6">
				<div class="uppro-container">
						 <i class="fa fa-envelope" aria-hidden="true"></i>
						<input type="email"  id="email" class="uppro_input upemail" name="dealer_email" readonly value="<?php echo $_SESSION['dealer_email']; ?>" />
						<?php if($showdetailDealer['email_verified']=='1'){echo '<span style="color:green;" class="check-color">'.'<i class="fa fa-check" aria-hidden="true"></i>'.'</span>';}else{
							echo '<span style="color:red;">';
							echo '<a  onclick="email_verify();" href="#">';
							echo '<i class="fa fa-times" aria-hidden="true"></i>';
							echo '</a>';
							echo '</span>';
						}?>
						<a href="mailto: info@yards360.com" style="color: red;" class="uplock"><i class="fa fa-lock" aria-hidden="true"></i></a>
						<span class="glyphicon form-control-feedback" aria-hidden="true"></span>
						<div class="help-block with-errors"></div>
				
					
				</div>
			</div>
			<div class="col-sm-6">
				<div class="uppro-container">
						 <i class="glyphicon glyphicon-lock" aria-hidden="true"></i>

			<input type="Password" class="uppro_input"  placeholder="Password" value="11111111">
			</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-12">
				
				<textarea rows="2" class="uptxtarea"  name="dealer_company_profile" placeholder="Company Profile"><?php if(!empty($showdetailDealer['dealer_company_profile'])){ echo $showdetailDealer['dealer_company_profile']; } ?></textarea>

			</div>
		</div>
				

			<!-- <div class="form-group">
				
				<div class="col-sm-10"> 
					<div class="image-upload">
						<label for="file-input">
							<input name="dealer_photo" type="file" onchange="readURL(this);"/>

						</label>

						
					</div>

				

				</div>
			</div> -->

			<div class="form-group">
			
					<div class="chanepass_button">
						<!-- <button type="submit" class="btn btn-default">SUBMIT</button> -->
						<input type="submit" class="btn btn-success updatepro" name="updateprofile" value="submit">
					</div>
			</div>
		</form>

	</div>  



</div> 

</div>  

</div>


<script type="text/javascript">
	function email_verify(){
		var email_ver=$("#email").val();
		// console.log(email);
		$.ajax({
			url: "action/submission.php",
			type: "POST",
			data:{'email_verify':1,email_ver:email_ver},
			beforeSend: function() {
        // setting a timeout
        Swal.fire(
        	'Success!',
        	'Link has been Sent to your Mail !',
        	'success'
        	)
    },
    success:function(data){
                    //alert(data);
                    

                   	// console.log(data);



                   }
               });
		
	}
</script>









<!-- Footer Area -->


<!-- Close Footer Area --> 


</div>
</div>

</div>


<?php include_once'include/footer.php';?>


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
	$('.addfiles').on('click', function() { $('#fileupload').click();return false;});

</script>



<style type="text/css">

	.buyrentdiv {
		padding-bottom: 120px!important;
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
 <script type="text/javascript">
            $(document).ready(function() {
              $('.js-example-basic-single').select2();
            });
          </script>
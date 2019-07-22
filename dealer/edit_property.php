<?php 
include_once'include/header.php';
include_once'include/sidebar.php';
if(isset($_GET['id'])){
	$id=base64_decode($_GET['id']);
	$property_for=base64_decode($_GET['prop_for']);
	$propertydata=$common->getpropertybyid($id,$property_for);
	// echo '<pre>';
	//   var_dump($propertydata);
}
if(isset($_GET['msg'])){
	$msg=$_GET['msg'];
}

?>
<!-- Div for Grey Background -->
<div class="main1 ">
	<?php if(!empty($msg)){echo '<span style="color:red;">'.$msg.'</span>';}?>
	<form id="form">
		<div class="container extrapaddng">
			<div class="min-drop">
			<div class="min-drop">
				<div class="menu-drop">
					<p>List Property<span style="color: red;">*</span></p>
				</div>
				<div class="drop-html">
					<div class="dropdown">
						<input type="radio" name="property_for" id="property_for" value="0" onchange="property_type(this.value)" <?php echo ($propertydata['property_for']==0)?'checked':'' ?> disabled>Residential
						<input type="radio" name="property_for" id="property_for" value="1" onchange="property_type(this.value)" <?php echo ($propertydata['property_for']==1)?'checked':''?> disabled>Commercial
						<!-- <select id="property_for" class="listprop_select" onchange="property_type(this.value)" name="property_for">
							<option value="">--select--</option>
							<option value="0">Residential</option>
							<option value="1">Commercial</option>
						</select> -->
					</div>
					<span id="property_for_error" style="color: red;display: none;">*Please select any one</span>
				</div>

			</div><br>
			<input type="hidden" id="property_id" value="<?php echo $id;?>">


			<div class="min-drop" id="commercial_type">

				
				<div class="menu-drop">
					<p> For:<span style="color:red;">*</span></p>
					</div>
					<div class="drop-html">
					<div class="dropdown">
						<input type="radio" name="property_type1" id="property_type_new" onchange="sell_div(this.value)" value="0"<?php echo ($propertydata['property_option']==0)?'checked':'' ?> disabled>Sell
						<input type="radio" name="property_type1" id="property_type_new" onchange="sell_div(this.value)" value="1"<?php echo ($propertydata['property_option']==1)?'checked':'' ?> disabled>Rent
						<!-- <select  class="listprop_select" onchange="sell_div(this.value)" name="property_type1" id="property_type_new">
							<option value="">--select--</option>
							<option value="0">Sell</option>
							<option value="1">Rent</option>
						</select> -->
					</div>
				</div>
				
				
				<span id="property_type_new_error" style="color: red;display: none;">*Please select any one</span>
				<!-- </div> -->
			</div>

			<div class="min-drop" id="sell_type">

				
				<div class="menu-drop">
					<p> Sell Type:<span style="color:red;">*</span></p>
				</div>
				<!-- Div for Dropdown -->
				<div class="drop-html" >
					<div class="dropdown">
						<input type="radio" name="property_sell_type" id="property_sell_type" onchange="show_address(this.value)" value="0"<?php echo ($propertydata['property_type']==0)?'checked':'' ?> disabled>Resale
						<input type="radio" name="property_sell_type" id="property_sell_type" onchange="show_address(this.value)" value="1"<?php echo ($propertydata['property_type']==1)?'checked':'' ?> disabled>New Booking
						<!-- <select  name="property_type1" id="property_sell_type" class="listprop_select" onchange="show_address(this.value)">
							<option value="">--select--</option>
							<option value="0">Resale</option>
							<option value="1">New Booking</option>
						</select> -->
					</div>
					<span id="property_sell_type_error" style="color: red;display: none;">*Please select any one</span>
				</div>
			</div>
			</div>
			<!-- Propety Type: -->
			<div id="location_div" class="row ediloc">
					<div class="col-sm-2">
					<div class="typeheading">
						<p>City:<span style="color:red;">*</span></p>
					</div>
					</div>
					<div class="col-sm-4">
					<div class="drop-html1	">
						<div class="dropdown">
<!-- 							<select id="city" name="city">
								<option value="faridabad"<?php if($propertydata['city']=="faridabad") echo 'selected="selected"'; ?> disabled>Faridabad</option>
							</select> -->
							<p><?php echo $propertydata['city'];?></p>
						</div>
					</div>
					</div>
				
				<div class="col-sm-2">
					<div class="typeheading">
						<p>Area/Sector:<span style="color:red;">*</span></p>
					</div>
					</div>
					<div class="col-sm-4">
					<div class="drop-html1	">
						<div class="dropdown">
							<div class="drop-html1">
								<?php $location=$common->getAreaSector(1);?>
								<!-- <input type="text" name="sector" placeholder="Area/Sector" class="ginputfield" id="sector"> -->

								<!-- <select id="sector" name="sector" class="js-example-basic-single">
									<option value=""></option>
									<?php foreach($location as $data){ ?>
										<option value="<?php echo $data['sector_area'];?>"<?php if($data['sector_area']==$propertydata['sector']) echo 'selected="selected"'; ?> disabled><?php echo $data['sector_area'];?></option>
									<?php } ?>

								</select> -->
								<p><?php echo $propertydata['sector'];?></p>
								<span id="sector_error" style="color:red;display: none;">*Select Sector</span>
							</div>
						</div>
					</div>
		</div>
				
			</div>
			<div class="proptype">
				<p>Property Type:</p><h5><?php if($propertydata['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?></h5>
			</div>
			

			<div class="row">
				<div class="col-sm-2">
				<div class="typeheading">
					<p>Category Name:</p>
				</div>
				</div>
				<div class="col-sm-4">
				<div class="drop-html1	">
					<div class="dropdown">
						<div class="drop-html1">
							<?php $cat=$common->getCategoryName($propertydata['cat_id']);?>
							<p><?php echo $cat['cat_name'];?></p>
							<span id="sector_error" style="color:red;display: none;">*Select Sector</span>
						</div>
					</div>
				</div>
				</div>
			</div>
			<?php if($propertydata['property_for']=='0'){ ?>

				<?php if(!empty($propertydata['Plot_Area'])):?>
					<div class="apprtmnt">
						<div class="typeheading">
							<p>Plot Area</p>
						</div>
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Plot_Area'].' '.$propertydata['Plot_Area_Unit'];?></p>

								</div>
							</div>
						</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Carpet_Area'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Carpet Area</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Carpet_Area'].' '.$propertydata['Carpet_Area_Unit'];?></p>
								</div>
							</div>
						</div>
						</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Super_Built_Up_Area'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Super Built Up Area</p>
						</div>
							</div>
								<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Super_Built_Up_Area'].' '.$propertydata['Super_Built_Up_Area_Unit'];?></p>
								</div>
							</div>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Bedroom'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Bedroom</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Bedroom'];?></p>
								</div>
							</div>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Bathroom'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Bathroom</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Bathroom'];?></p>
								</div>
							</div>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Furnishing_Status'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Furnishing Status</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Furnishing_Status'];?></p>
								</div>
							</div>
									</div>
						</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Property_on_Floor'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Property On Floor</p>
						</div>
							</div>
								<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Property_on_Floor'];?></p>
								</div>
							</div>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Floors_In_Buliding'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Floors In Buliding</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Floors_In_Buliding'];?></p>
								</div>
							</div>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Car_Parking_Space'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Car Parking Space</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Car_Parking_Space'];?></p>
								</div>
							</div>
						</div>
					</div>
						</div>
				<?php endif;?>
			<?php }else{ ?>
						<?php if(!empty($propertydata['Super_Area'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Super Area</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Super_Area'].' '.$propertydata['Super_Area_Unit'];?></p>

								</div>
							</div>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Carpet_Area'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Carpet Area</p>
						</div>
						</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Carpet_Area'].' '.$propertydata['Carpet_Area_Unit'];?></p>
								</div>
							</div>
						</div>
					</div>
						</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Built_Up_Area'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Built Up Area</p>
						</div>
							</div>
							<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Built_Up_Area'].' '.$propertydata['Built_Up_Area_Unit'];?></p>
								</div>
							</div>
						</div>
					</div>
						</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Wash_Room'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Wash Room</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Wash_Room'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Pantry'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Pantry</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Pantry'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Status'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Status</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Status'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Furnishing_Status'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Furnishing Status</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Furnishing_Status'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Parking_Space'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Parking Space</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Parking_Space'].' '.$propertydata['Parking_Space_Unit'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Ownership'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Ownership</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Ownership'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>	
				<?php if(!empty($propertydata['Facing'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Facing</p>
						</div>
					</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Facing'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>	
				<?php if(!empty($propertydata['Possesion'])):?>
					<div class="row">
						<div class="col-sm-2">
						<div class="typeheading">
							<p>Possesion</p>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Possesion'];?></p>
								</div>
							</div>
						</div>
					</div>
					</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Amenities'])):?>
					<div class="row">
							<div class="col-sm-2">
						<div class="typeheading">
							<p>Amenities</p>
						</div>
					</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Amenities'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>
				<?php if(!empty($propertydata['Maintenance'])):?>
					<div class="row">
							<div class="col-sm-2">
						<div class="typeheading">
							<p>Maintenance</p>
						</div>
					</div>
						<div class="col-sm-4">
						<div class="drop-html1	">
							<div class="dropdown">
								<div class="drop-html1">
									<p><?php echo $propertydata['Maintenance'].' '.$propertydata['Maintenance_Unit'];?></p>
								</div>
							</div>
						</div>
					</div>
				</div>
				<?php endif;?>	
						


			<?php } ?>


			<div class="row">
			 <div class="col-sm-2">
				<div class="typeheading">
					<p>Expected Price:<span style="color: red;">*</span></p>
				</div>
			</div>
					<div class="col-sm-4">
				<div class="drop-html1 edtproexpr">
					<input type="number" name="price" placeholder="Exp. Price" class="ginputfield" id="price" value="<?php if(!empty($propertydata['property_for']=='0')){echo $propertydata['price'];}else{echo $propertydata['Expected_Price'];}?>" onkeyup="price_check(this.value)" name="exp_price" min="1">
					<span id="price_error" style="color:red;display: none;">Select Price*</span>
					
					<!-- <select class="selectofplotarea" id="price_unit" name="price_unit">
						<option value="lakhs">Lakhs</option>
						<option value="crores">Crores</option>
					</select> -->
				</div>
			</div>
				<span id="word_result"></span>

				

			</div> 

			<div class="edneg" id="negotiable_div">
				<div class="row">
						<div class="col-sm-2">
				<div class="typeheading">
					<p>Negotiable:</p>
				</div>
			</div>
					<div class="col-sm-4">
				<div class="drop-html1">

					<select class="selectofplotarea" id="negotiable" name="negotiable">
						<option value="Yes"<?php if($propertydata['negotiable']=="Yes") echo 'selected="selected"'; ?>>Yes</option>
						<option value="No"<?php if($propertydata['negotiable']=="No") echo 'selected="selected"'; ?>>No</option>
					</select>
				</div>
			</div>
			 </div>

					<div class="row">
							<div class="col-sm-2">
				<div class="typeheading">
					<p>Loan Approval:</p>
				</div>
			</div>
	<div class="col-sm-4">
				<div class="drop-html1">

					<select class="selectofplotarea" id="loan_approval" name="loan_approval">
						<option value="1"<?php if($propertydata['loan_approval']=="1") echo 'selected="selected"'; ?>>Yes</option>
						<option value="0"<?php if($propertydata['loan_approval']=="0") echo 'selected="selected"'; ?>>No</option>
					</select>
				</div>

				</div>
			</div>

			</div> 
			



			<!-- Add Construction Status -->
			<div class="row" id="construction_status">
					<div class="col-sm-2">
				<div class="typeheading">
					<p>Construction Status:</p>
				</div>
			</div>
					<div class="col-sm-4">
				<div class="drop-html1">
					<div class="dropdown edprcon">
						<select id="status1" name="construction_status">
							<option value="0"<?php if($propertydata['construction_status']=="0") echo 'selected="selected"'; ?>>Under Construction</option>
							<option value="1"<?php if($propertydata['construction_status']=="1") echo 'selected="selected"'; ?>>Ready to Move</option>

						</select>
					</div>
				</div>
			</div>

			</div>

			<!-- Status -->
			<div class="apprtmnt" id="status" style="display: none;">

				<div class="typeheading">
					<p>Status:</p>
				</div>

				<div class="drop-html1">
					<div class="dropdown">
						<select id="status1" name="status">
							<option value="1">Active</option>
							

						</select>
					</div>
				</div>

			</div>
			<!-- Dashboard Submit Button -->

			<div class="apprtmnt">
				<input class="postprorp_submitbtn" type="button" name="submit" value="Submit" onclick="return form_submit()"></input>
			</div>
		</div>  
	</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once'include/footer.php';?>


</body>
</html>
<script type="text/javascript">
	
	function form_submit(){
		// console.log('chirag');	
		var price=$("#price").val();
		var negotiable=$("#negotiable").val();
		var loan_approval=$("#loan_approval").val();
		var cons_status=$("#status1").val();
		var property_id=$("#property_id").val();
		var prop_for=$("#property_for").val();
		if(price==''){
			$("#price_error").show();
			return false;
		}else{
			$("#price_error").hide();
		}

		$.ajax({
			url:'ajax_new.php',
			method:'post',
			data:{'update_property':1,price:price,negotiable:negotiable,loan_approval:loan_approval,cons_status:cons_status,property_id:property_id,prop_for:prop_for},
			success:function(data){
				console.log(data);
				window.location.href = 'result.php';
				// alert('Property Added successfully');
				// window.location.reload();
			}
		})
	}
</script>
<script>
	/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
	var dropdown = document.getElementsByClassName("dropdown-btn");
	var i;

	for (i = 0; i < dropdown.length; i++) {
		dropdown[i].addEventListener("click", function() {
			this.classList.toggle("active");
			var dropdownContent = this.nextElementSibling;
			if (dropdownContent.style.display === "block") {
				dropdownContent.style.display = "none";
			} else {
				dropdownContent.style.display = "block";
			}
		});
	}
</script>
<script type="text/javascript">
	var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
	var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

	function inWords (num) {
		if ((num = num.toString()).length > 9) return 'overflow';
		n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
		if (!n) return; var str = '';
		str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
		str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
		str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
		str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
		str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
		return str;
	}

</script>

<style type="text/css">
	body{
		overflow-x: hidden;
	}
</style>





<style type="text/css">
	

	.carousel-control {
		padding-top:10%;
		width:5%;
	}

	@media only screen and (max-width: 375px){
		.col-sm-12.footer_last {
			margin-top: -1px;
			padding-top: 20px;
		}
	}


</style>
<script type="text/javascript">
	function price_check(value){
		
		var cat_id=$("#category_id").val();
		if(cat_id==26){
			$("#construction_status").hide();
		}else{
			$("#construction_status").show();
		}

		if(value>0){
			$("#negotiable_div").show();
			document.getElementById('word_result').innerHTML = inWords(document.getElementById('price').value);
			$("#price_error").hide();
		}else{
			$("#negotiable_div").hide();
			document.getElementById('word_result').innerHTML = inWords(document.getElementById('price').value);
			$("#construction_status").hide();
			$("#price_error").html('Price will be Greater than Zero');
			
		}

	}
</script>



<script type="text/javascript">
	$(document).ready(function() {
		$('#myCarousel').carousel({
			interval: 10000
		})
		$('#myCarousel').on('slid.bs.carousel', function() {
    	//alert("slid");
    });
	});
</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('#myCarousel1').carousel({
			interval: 10000
		})
		$('#myCarousel1').on('slid.bs.carousel', function() {
    	//alert("slid");
    });
	});
	

</script>





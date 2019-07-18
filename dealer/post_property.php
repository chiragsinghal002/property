<?php 
include_once'include/header.php';
include_once'include/sidebar.php';
 // session_start();
  // var_dump($_SESSION);
if(isset($_GET['msg'])){
	$msg=$_GET['msg'];
}
?>
<!-- Div for Grey Background -->
<div class="main1">
	<?php if($showdetailDealer['email_verified']!=='1'){ ?>
		<?php include("include/verified.php"); ?>
	<?php } ?>

	<?php if(!empty($msg)){echo '<span style="color:red;">'.$msg.'</span>';}?>
	<form id="form">
		<div class="container extrapaddng">
			<div class="min-drop">
				<div class="menu-drop">
					<p>List Property for :</p>
				</div>
				<div class="drop-html">
					<div class="dropdown">
						<input type="radio" name="property_for" id="property_for" value="0" onchange="property_type(this.value)">Residential
						<input type="radio" name="property_for" id="property_for" value="1" onchange="property_type(this.value)">Commercial
						<!-- <select id="property_for" class="listprop_select" onchange="property_type(this.value)" name="property_for">
							<option value="">--select--</option>
							<option value="0">Residential</option>
							<option value="1">Commercial</option>
						</select> -->
					</div>
					<span id="property_for_error" style="color: red;display: none;">*Please select any one</span>
				</div>

				<div class="min-drop" id="commercial_type" style="display: none;">

					
					<div class="menu-drop">
						<p> For :</p>
					</div>
					<div class="drop-html">
						<div class="dropdown rent">
							<input type="radio" name="property_type1" id="property_type_new" onchange="sell_div(this.value)" value="0">Sell
							<input type="radio" name="property_type1" id="property_type_new" onchange="sell_div(this.value)" value="1">Rent
						<!-- <select  class="listprop_select" onchange="sell_div(this.value)" name="property_type1" id="property_type_new">
							<option value="">--select--</option>
							<option value="0">Sell</option>
							<option value="1">Rent</option>
						</select> -->
					</div>
					
					
					
					<span id="property_type_new_error" style="color: red;display: none;">*Please select any one</span>
					<!-- </div> -->
				</div>
			</div>

		</div>



		

		<div class="min-drop" id="sell_type" style="display: none;">

			
			<div class="menu-drop">
				<p> Sell Type : </p>
			</div>
			<!-- Div for Dropdown -->
			<div class="drop-html" >
				<div class="dropdown">
					<input type="radio" name="property_sell_type" id="property_sell_type" onchange="show_address(this.value)" value="0">Resale
					<input type="radio" name="property_sell_type" id="property_sell_type" onchange="show_address(this.value)" value="1">New Booking
						<!-- <select  name="property_type1" id="property_sell_type" class="listprop_select" onchange="show_address(this.value)">
							<option value="">--select--</option>
							<option value="0">Resale</option>
							<option value="1">New Booking</option>
						</select> -->
					</div>
					<span id="property_sell_type_error" style="color: red;display: none;">*Please select any one</span>
				</div>
			</div>
			<!-- Propety Type: -->
			<div id="location_div" style="display: none;">
				<div class="apprtmnt">
					<div class="typeheading">
						<p>City : </p>
					</div>
					<div class="drop-html1	">
						<div class="dropdown">
							<select id="city" name="city">
								<option value="faridabad">Faridabad</option>
							</select>
						</div>
					</div>
				</div>
				<div class="apprtmnt">
					<div class="typeheading">
						<p>Area/Sector : </p>
					</div>
					<div class="drop-html1	">
						<div class="dropdown">
							<div class="drop-html1">
								<?php $location=$common->getAreaSector(1);?>
								<!-- <input type="text" name="sector" placeholder="Area/Sector" class="ginputfield" id="sector"> -->

								<select id="sector" name="sector" class="js-example-basic-single">
									<option value=""></option>
									<?php foreach($location as $data){
										echo '<option value="'.$data['sector_area'].'">'.$data['sector_area'].'</option>';
									}?>

								</select>
								<span id="sector_error" style="color:red;display: none;">*Select Sector</span>
							</div>
						</div>
					</div>
				</div>
				<div class="apprtmnt">
					<div class="typeheading">
						<p>Google Location : </p>
					</div>
					<div class="drop-html1">
						<input type="text" name="google_location" placeholder=" Text " class="ginputfield" id="google_location">
					</div>
					<span id="google_location_error" style="color:red;display: none;">*Enter Google Location</span>
				</div>

				<!-- <div class="apprtmnt">

					<div class="typeheading">
						<p>Block:</p>
					</div>

					<div class="drop-html1	">
						<div class="dropdown">
							<div class="drop-html1">
								<input type="text" name="block" placeholder="Block" class="ginputfield" id="block">
								<span id="sector_error" style="color:red;display: none;">*Select Block</span>
							</div>
						</div>
					</div>

				</div> -->

				<!-- <div class="apprtmnt">

					<div class="typeheading">
						<p>Landmark:</p>
					</div>

					<div class="drop-html1	">
						<div class="dropdown">
							<div class="drop-html1">
								<input type="text" name="landmark" placeholder="Landmark" class="ginputfield" id="landmark">
								<span id="landmark_error" style="color:red;display: none;">*Select Landmark</span>
							</div>
						</div>
					</div>

				</div> -->
			</div>
			<div class="proptype">
				<!-- <p>Property Type :</p> --><span id="category_id_error" style="color:red;display: none;">*Select Any Category</span>
			</div>
			<!-- Residential: -->
			<div class="btnslidr"> 				  	  	  	  
				<ul class="nav nav-tabs">
					<li class="active" id="residential_tab"><a data-toggle="tab"  href="#Residential" onclick="residential()">Residential</a></li>
					<li class="active" onclick="commercial()" id="commercial_tab" style="display: none;"><a data-toggle="tab" href="#Comm">Commercial</a></li>
				</ul>
			</div>
			<div class="tab-content">
				<div id="residential_slider" class="tab-pane fade in active">
					<div class="product-slider">
						<div id="carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<?php 
								$residential=$common->propertyCategory(0);
						// echo '<pre>';
								?>
							</div>
						</div>
						<div class="well">
							<div id="myCarousel" class="carousel slide">
								<!-- Carousel items -->
								<div class="carousel-inner">
									<?php 
									// echo '<pre>';
									// var_dump($residential);die;?>
									<div class="item active">
										<div class="row">
											<?php $i=1; 
											foreach($residential as $data):?>
												<?php if($i<5):?>
													<div class="col-sm-3"><a href="#x" class="thumbnail"><img src="image/<?php echo $data['cat_image'];?>" alt="Image" class="img-responsive" id="<?php echo $data['cat_id'];?>" onclick="residential_cat(this.id)">
													</a>
													<p><?php echo $data['cat_name'];?></p>

												</div>
											<?php endif;?>
											<?php $i++;endforeach;?>
										</div>
									</div>
									
									<?php if(count($residential)>4):?>
										<div class="item">
											<div class="row">
												<?php $j=1; 
												foreach($residential as $data):?>
													<?php if($j>4):?>
														<div class="col-sm-3"><a href="#x" class="thumbnail"><img src="image/<?php echo $data['cat_image'];?>" alt="Image" class="img-responsive" id="<?php echo $data['cat_id'];?>" onclick="residential_cat(this.id)">
														</a>
														<p><?php echo $data['cat_name'];?></p>
													</div>
												<?php endif;?>
												<?php $j++;endforeach;?>
											</div>
										</div>
									<?php endif;?>

									<!--/item-->

									<!--/item-->

									<!--/item-->
								</div>
								<!--/carousel-inner--> 
						
							</div>
							<!--/myCarousel-->
						</div>

					</div>
					
				</div>


				<!-- Default Commercial Pics -->

				<div id="commercial_slider" class="tab-pane fade in active" style="display: none;">
					<div class="product-slider">
						<?php 
						$commercial=$common->propertyCategory(1);?>
						<div class="well">
							<div id="myCarousel1" class="carousel slide">
								<div class="carousel-inner">
									<?php 
									// echo '<pre>';
									// var_dump($commercial);?>
									<div class="item active">
										<div class="row">
											<?php $k=1; 
											foreach($commercial as $data):
												?>
												<?php if($k<7):?>
													<div class="col-sm-2"><a href="#x" class="thumbnail"><img src="image/<?php echo $data['cat_image'];?>" alt="Image" class="img-responsive" id="<?php echo $data['cat_id'];?>" onclick="commercial_cat(this.id)">
													</a>
													<p><?php echo $data['cat_name'];?></p>
												</div>
											<?php endif;?>
											<?php $k++;endforeach;?>
										</div>
									</div>
									<!-- <?php if(count($commercial)>4):?>
										<div class="item">
											<div class="row">
												<?php $l=1; 
												foreach($commercial as $data):?>
													<?php if($l>4):?>

														<div class="col-sm-3"><a href="#x" class="thumbnail"><img src="image/<?php echo $data['cat_image'];?>" alt="Image" class="img-responsive" id="<?php echo $data['cat_id'];?>" onclick="commercial_cat(this.id)">
														</a>
														<p><?php echo $data['cat_name'];?></p>

													</div>
												<?php endif;?>
												<?php $l++;endforeach;?>
											</div>
										</div>
									<?php endif;?> -->


								</div>
							
							</div>
							<!--/myCarousel-->
						</div>
						
					</div>
				</div>

			</div>  
			<input type="hidden" id="subcat_id" name="subcat_id">

			<div id="result">
				
			</div>

			<!-- Child Sub-Categry -->
			<div id="result1">
				
			</div>
			
			<input type="hidden" id="category_id" name="category_id" value="">


			<p class="price-heading prc-hd"> PRICING AREA</p>


			<div class="row">
				<div class="col-sm-2">
				<div class="typeheading">
					<p>Expected Price:<span style="color: red;">*</span></p>
				</div>
				</div>
				<div class="col-sm-8">
				<div class="drop-html1">
					<input type="number" name="price" placeholder="Exp. Price" class="ginputfield" id="price" value="" onkeyup="price_check(this.value)" name="exp_price" min="1" max="999999999">
					<span id="price_error" style="color:red;display: none;">Select Price*</span>
					
					<!-- <select class="selectofplotarea" id="price_unit" name="price_unit">
						<option value="lakhs">Lakhs</option>
						<option value="crores">Crores</option>
					</select> -->
				</div>
				<span id="word_result"></span>

				
			</div> 
			</div> 
			<div class="row">
			<div class="apprtmnt" id="negotiable_div" style="display: none;">
				<div class="col-sm-2">
				<div class="typeheading">
					<p>Negotiable:</p>
				</div>
				</div>
				<div class="col-sm-4">
				<div class="drop-html1">

					<select class="selectofplotarea" id="negotiable" name="negotiable">
						<option value="Yes">Yes</option>
						<option value="No">No</option>
					</select>
				</div>
				</div>
				<div class="typeheading">
					<p>Loan Approval:</p>
				</div>

				<div class="drop-html1">

					<select class="selectofplotarea" id="loan_approval" name="loan_approval">
						<option value="1">Yes</option>
						<option value="0">No</option>
					</select>
				</div>

				

			</div> 
			</div>




			<!-- Add Construction Status -->
			<div class="apprtmnt" id="construction_status" style="display: none;">

				<div class="typeheading">
					<p>Construction Status:</p>
				</div>

				<div class="drop-html1">
					<div class="dropdown">
						<select id="status1" name="construction_status">
							<option value="0">Under Construction</option>
							<option value="1">Ready to Move</option>

						</select>
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

<script type="text/javascript" src="js/jquery.placeholder.label.js"></script>
<?php include_once'include/footer.php';?>


</body>
</html>
<script type="text/javascript">
	function sell_div(value){
		// alert(value);
		if(value==0){
			$("#sell_type").show();
			$("#location_div").hide();
		}
		if(value==''){
			// alert('1');
			$("#sell_type").hide();
			$("#location_div").hide();
		}
		if(value==1){
			$("#sell_type").hide();
			$("#location_div").show();
		}
	}

	function residential(){
	// alert('chirag');
}
function commercial(){
	// alert('commercial');
}
function residential_cat(id){
	  // alert(id);
	  $("#category_id").val(id);
	  // $("#" + id).addClass('Color');
	  $.ajax({
	  	url:'ajax.php',
	  	type:'post',
	  	data:{'resi_cat_id':id},
	  	success:function(data){
	  		// console.log(data);
	  		if(data!==''){
	  			$("#subcat").show();
	  			$("#result").show();
	  			$("#result").html(data);
	  			$("#result1").hide(data);
	  		}else{
	  			$("#result").hide();
	  			$("#result1").hide();
	  		}

	  	}
	  })
	}
	function commercial_cat(id){
		// alert(id);
		$("#category_id").val(id);
		$.ajax({
			url:'ajax.php',
			type:'post',
			data:{'comm_cat_id':id},
			success:function(data){
				console.log(data);
				if(data!==''){
					$("#subcat").show();
					$("#result").show();
					$("#result").html(data);
					$("#result1").hide(data);
				}else{
					$("#result").hide();
					$("#result1").hide();
				}

			}
		})
	}

	function child_sub_cat(value){
	// alert(value);
	$("#subcat_id").val(value);
	var p_for=$("input[name='property_for']:checked").val();
	 // alert(p_for);
	$.ajax({
		url:'ajax.php',
		type:'post',
		data:{'subcat_id':value,p_for:p_for},
		success:function(data){
			 // alert(data);
			 console.log(data);
			 if(data!==''){
			 	$("#child_subcat").show();
			 	$("#result1").show(data);
			 	$("#result1").html(data);
			 }
			}
		})
}

function select_property(value){
	  // alert(value);
	  $("#child_id").val(value);
	  $.ajax({
	  	url:'ajax.php',
	  	type:'post',
	  	data:{'subchildcat_id':value},
	  	success:function(data){
			   // alert(data);
			   console.log(data);
			   if(data!==''){
			   	$("#select_property_type").show();
			   	$("#google_location").show();
			   	$("#google_location1").show();
			   	$("#constructon_status").show();
			   	$("#sector_div").show();
			   	$("#address_div").show();
			   	$("#landmark_div").show();
			   	$("#status").show();
			   	$("#select_type").html(data);
			   }else{
			   	$("#google_location").show();
			   	$("#google_location1").show();
			   	$("#constructon_status").show();
			   	$("#sector_div").show();
			   	$("#address_div").show();
			   	$("#landmark_div").show();
			   	$("#status").show();
			   }

			}
		})
	}

	function form_submit(){
		// console.log('chirag');

		property_for = $("input[name='property_for']:checked").val();
		// alert(property_for);
		if(property_for>=0){
			$("#property_for_error").hide();
		}else{
			
			$("#property_for_error").show();
			// property_for.focus();
			return false;
		}


		var property_type=$("input[name='property_type1']:checked").val();
		if(property_type>=0){
			$("#property_type_new_error").hide();
		}else{
			
			$("#property_type_new_error").show();
			// property_type.focus();
			return false;
		}


		if(property_type==0){
			var property_sell_type=$("input[name='property_sell_type']:checked").val();
			if(property_sell_type>=0){
				$("#property_sell_type_error").hide();
			}else{
				
				$("#property_sell_type_error").show();
				return false;
			}
		}

		var sector =$("#sector").val();
		if(sector==''){
			$("#sector_error").show();
			return false;
		}else{
			$("#sector_error").hide();
		}


		var google_location=$("#google_location").val();
		if(google_location==''){
			$("#google_location_error").show();
			return false;
		}else{
			$("#google_location_error").hide();
		}


		var cat_id=$("#category_id").val();
		if(cat_id==''){
			$("#category_id_error").show();
			// cat_id.focus();
			return false;
		}else{
			$("#category_id_error").hide();
		}		


		var price=$("#price").val();
		if(price==''){
			$("#price_error").show();
			return false;
		}else{
			$("#price_error").hide();
		}

		$.ajax({
			url:'ajax_new.php',
			method:'post',
			data:$('#form').serialize(),
			success:function(data){
				console.log(data);
				window.location.href = 'post_property.php?msg=Property Added successfully';
				// alert('Property Added successfully');
				// window.location.reload();
			}
		})
	}


// validation code end
function select_size(value){
	$("#select_type_val").val(value);
}

function property_type(value){
	// alert(value);
	if(value==0){
		$("#residential_tab").show();
		$("#commercial_tab").hide();
		$("#residential_slider").show();
		$("#commercial_slider").hide();
	}
	if(value==1){
		$("#residential_tab").hide();
		$("#commercial_tab").show();
		$("#residential_slider").hide();
		$("#commercial_slider").show();
	}

	if(value==''){
		$('#location_div').css('display','none');
		$('#commercial_type').css('display','none');
		$("#result").hide();
		$("#result1").hide();
	}else{
		$('#commercial_type').css('display','block');
	}
}

function show_address(value){
	if(value==''){
		$('#location_div').css('display','none');
		$("#result").hide();
		$("#result1").hide();
	}else{
		$('#location_div').css('display','block');
	}
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
	$('img').click(function(){
    $('.selected').removeClass('selected');
    $(this).addClass('selected');
});

</script>
 <script type="text/javascript">
    $(document).ready(function (){
      $('input[placeholder]').placeholderLabel();
    })
    </script>
<script type="text/javascript">
    $(document).ready(function (){
  $('input[placeholder]').placeholderLabel({

    // placeholder color
    placeholderColor: "#ffffff!important", 

    // label color
    labelColor: "#4AA2CC",

    // size of label
    labelSize: "14px"
    // size of color
     color: "#000000!important";

    // font style
    fontStyle: "normal", 

    // uses border color
    useBorderColor: true, 

    // displayed in the input
    inInput: true, 

    // time to move
    timeMove: 200 
    
  });
})
  </script>
<style type="text/css">
	img{margin:10px;}
.selected{
    box-shadow:0px 12px 22px 1px #333;
    border: 2px solid #000000;
}
</style>
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
	<span id="success" style="color: red;"><?php if(!empty($msg)){echo $msg;}else{}?></span>
	<form id="form">
		<div class="container extrapaddng pstreq">
			<div class="min-drop">
			<div class="min-drop">
				<div class="menu-drop">
					<p>List Property For:</p>
				</div>
				<div class="drop-html">
					<div class="dropdown">
						<input type="radio" name="property_for" id="property_for" value="0" onchange="property_type(this.value)">Residential
						<input type="radio" name="property_for" id="property_for" value="1" onchange="property_type(this.value)">Commercial
						<span id="property_for_error" style="color: red;display: none;">*This Field is Required</span>
					</div>
				</div>
			</div>
			<div class="min-drop" id="commercial_type" style="display: none;">
				<div class="menu-drop">
					<p>For:</p>
				</div>
				<!-- Div for Dropdown -->
				<div class="drop-html" >
					<div class="dropdown">
						<!-- <select class="listprop_select" onchange="sell_div(this.value)" name="property_type_for" id="property_type_for">
							<option value="">--select--</option>
							<option value="0">Buy</option>
							<option value="1">Rent</option>
						</select> -->
						<input type="radio" name="property_type_for" id="property_type_for" onchange="sell_div(this.value)" value="0">Sell
							<input type="radio" name="property_type_for" id="property_type_for" onchange="sell_div(this.value)" value="1">Rent
						<span id="property_type_for_error" style="color: red;display: none;">*This Field is Required</span>
					</div>
				</div>
			</div>
		
			<div class="min-drop" id="sell_type" style="display: none;">
				<div class="menu-drop">
					<p>Buy Type:</p>
				</div>
				<!-- Div for Dropdown -->
				<div class="drop-html" >
					<div class="dropdown">
						<!-- <select class="listprop_select" onchange="show_address(this.value)" id="sell_type_new">
							<option value="">--select--</option>
							<option value="0">Resale</option>
							<option value="1">New Booking</option>
						</select> -->
						<input type="radio" name="property_sell_type" id="sell_type_new" onchange="show_address(this.value)" value="0">Resale
					<input type="radio" name="property_sell_type" id="sell_type_new" onchange="show_address(this.value)" value="1">New Booking
						<span id="sell_type_new_error" style="color: red;display: none;">*This Field is Required</span>
					</div>
				</div>
			</div>
			</div>
			<!-- Propety Type: -->
			<div id="location_div" style="display: none;">
				<div class="apprtmnt">
					<div class="typeheading">
						<p>City:</p>
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
						<p>Area/Sector:</p>
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
								<span id="sector_error" style="color:red;display: none;">*This Sector Field is Required</span>
							</div>
						</div>
					</div>
				</div>
				<?php //var_dump($location);?>
				<div class="apprtmnt">
					<div class="typeheading">
						<p>Google Location*:</p>
					</div>
					<div class="drop-html1">
						<input type="text" name="google_location" placeholder="Text " class="ginputfield">
					</div>
				</div>
			</div>
			<div class="proptype">
				<p>Property Type:</p><span id="category_id_error" style="color:red;display: none;">*Select Any Category</span>
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

<div class="row prct">
	<div class="col-sm-2">
		<div class="typeheading">
			<p>Budget Price:</p>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="drop-html1">
			<input type="number" name="price" placeholder="Budget Price" class="ginputfield" id="price" value="" onkeyup="price_check(this.value)" name="exp_price">
			<span id="price_error" style="color:red;display: none;">Select Price*</span>

<!-- <select class="selectofplotarea" id="price_unit" name="price_unit">
<option value="lakhs">Lakhs</option>
<option value="crores">Crores</option>
</select> -->
</div>
</div>
<span id="word_result"></span>



</div> 

<div class="" id="negotiable_div" style="display: none;">
	<div class="row">
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
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select>
	</div>
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
<div class="row">
	<input class="postprorp_submitbtn" type="button" name="submit" onclick="return form_submit()" value="Submit">
</div>
</div>  
</form>
</div>
</div>
</div>
</div>
</div>
<?php include_once'include/footer.php';?>
<script src="js/post-requirement.js"></script>
<script type="text/javascript" src="js/jquery.placeholder.label.js"></script>
</body>
</html>
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

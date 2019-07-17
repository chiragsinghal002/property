<?php 
include_once'include/header.php';
include_once'include/sidebar.php';?>

<?php 
if(isset($_GET['property_id'])){
	$getproperty_id=base64_decode($_GET['property_id']);
	$getproperty_for=base64_decode($_GET['property_for']);
	$getproperty_option='0';
	$data1=$common->getpropertybyid($getproperty_id,$getproperty_for);
			 var_dump($data);
}
?>

<div class="buyrentdiv">  
	<?php if($showdetailDealer['email_verified']!=='1'){ ?>
		<?php include("include/verified.php"); ?>
	<?php } ?>




	<!-- Active & Delete buttons -->

	<div class="resulttopbtn">

		<button id="all" onclick="change_div(this.id);">All</button>

		<button id="active" onclick="change_div(this.id);">Active</button>

		<button id="expired" onclick="change_div(this.id);">Expired</button>
		<button id="favorite" onclick="change_div(this.id);">Favorite</button>

	</div>

	<input type="hidden" id="dealer_id" value="<?php echo $_SESSION['dealer_id'];?>">
	<!-- Active Properties div Only -->
	<div id="active_properties">
		<?php 
  // include_once'Object.php';
// session_start();
		$type='Active';
		$getrequirementresi1=$common->getRequirementFromProperty($data1,$getproperty_for,$getproperty_option);
		$getrequirementcomm=$common->getCommRequirementByDealerId($_SESSION['dealer_id']);
    //var_dump($getrequirementresi);
    // var_dump($comm_properties);
		if(!empty($getrequirementresi1)){
			$prop=count($getrequirementresi1);
		}else{
			$prop=0;
		}

		if(!empty($getrequirementcomm)){
			$comm_prop=count($getrequirementcomm);
		}else{
			$comm_prop=0;
		}
		$total_pro=$prop+$comm_prop;
		?>
		<div class="resultactiveprdcts">
			<p><?php echo $total_pro;?> Active Properties</p>

		</div>

		<!--  Land For Sale: -->
		<?php if(!empty($getrequirementresi1)){?>

			<?php foreach($getrequirementresi1 as $data){?>
				<?php $cat=$common->getCategoryName($data['cat_id']); 
    //var_dump($cat);

				$data['cat_name']=$cat['cat_name'];
				$data['subcat_name']=$cat['subcat_name'];
				?>
				<div class="landforsale">
					<div class="row">
						<div class="col-sm-8">
							<!-- Land for Sale: -->   
							<div class="contentoflandfor">
								<h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;For&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
								<p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['price']).'/-';?></span></p>    
								<p>Plot area:<span><?php if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo $data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo $data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else{}?></span></p>
								<?php if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}?>   

							</div>
							<!-- Active and Posted On -->         
							<div class="expireon">
								<p><?php echo $data['property_code'];?><span>Active</span></p>
								<p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
							</div>

							<!-- Expire On -->  
							<div class="extnddurtion">
								<p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by']));?> <span></span></p> 
								<p>Category:<span><?php echo $data['cat_name'];?></span></p>        
							</div>

							<!-- Summary Views: -->
       <!--  <div class="summryviews">
         <p>Summary views:132 / Detail views: 13</p>
         <span>view 1 Responses</span>
     </div> -->
 </div>

 <div class="col-sm-4">
 	<div class="btnsdledblckdiv">  
 		<!-- Assist to User -->
       <!--  <div class="editbutton">
         <p>Assist to subuser</p>
         <a href="edit_property.php?id=<?php echo base64_encode($data['property_id']);?>&&prop_for=<?php echo base64_encode($data['property_for']);?>"><button class="edtbtn"><i class="fa fa-check-square-o" aria-hidden="true"></i><span>EDIT</span></button></a> 
     </div> -->

     <!-- Delete Button -->

     <div class="deletebutton">
     	<?php $getResult=$common->getFavPropertyByDealerId($data['property_id'],$_SESSION['dealer_id']);?>
     	<?php if($getResult==false){?>
     		<button class="dtebtn" onclick="fav(this.value)" value="<?php echo $data['property_id'];?>" id="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>fav</button>         <?php }else{ ?>
     			<button class="dtebtn" style="background-color: red;" onclick="unfav(this.value)" value="<?php echo $data['property_id'];?>" id="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>fav</button>
     		<?php } ?>                                          

     	</div>

     </div>  
 </div>
</div>  
</div>
<?php } ?>
<?php } ?>
<!-- For Commercial Properties -->
<?php if(!empty($getrequirementcomm)){?>
	<?php foreach($getrequirementcomm as $data){?>

		<div class="landforsale">
			<div class="row">
				<div class="col-sm-8">
					<!-- Land for Sale: -->   
					<div class="contentoflandfor">
						<h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;For&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
						<p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['Expected_Price']).'/-';?></span></p>    
						<p>Plot area:<span><?php if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo $data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo $data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else{echo $data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}?></span></p>
						<?php if($data['Wash_Room']>0){echo '<p>'.'Washroom:'.'<span>'.$data['Wash_Room'].'</span>'.'</p>';}?>   

					</div>
					<!-- Active and Posted On -->         
					<div class="expireon">
						<p><?php echo $data['property_code'];?><span>Active</span></p>
						<p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
					</div>
					<div class="extnddurtion">
						<p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by']));?> <span></span></p> 
						<p>Category:<span><?php echo $data['cat_name'];?></span></p>

					</div>



					<!-- Summary Views: -->



       <!--  <div class="summryviews">

         <p>Summary views:132 / Detail views: 13</p>



         <span>view 1 Responses</span>

     </div> -->
 </div>
 <div class="col-sm-4">
 	<div class="btnsdledblckdiv">  
 		<!-- Assist to User -->

 		<!-- Delete Button -->

 		<div class="deletebutton">

 			<button class="dtebtn" onclick="del_comm(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                    
 		</div>
 	</div>  
 </div>
</div>  
</div>
<?php } ?>
<?php } ?>
</div>
<!-- Close Active Properties Div  -->
<!-- Close Commercial Properties  -->
<!-- Open All Properties Listing Div-->

<div id="all_properties">
	<?php 
  // include_once'Object.php';
// session_start();
	$type='All';
	$getrequirementresi2=$common->getRequirementFromProperty($data1,$getproperty_for,$getproperty_option);
	  // var_dump($getrequirementresi2);
	$getrequirementcomm=$common->getCommRequirementByDealerId($_SESSION['dealer_id']);
    // var_dump($comm_properties);
	if(!empty($getrequirementresi2)){
		$prop=count($getrequirementresi2);
	}else{
		$prop=0;
	}

	if(!empty($getrequirementcomm)){
		$comm_prop=count($getrequirementcomm);
	}else{
		$comm_prop=0;
	}
	$total_pro=$prop+$comm_prop;
	?>
	<div class="resultactiveprdcts">
		<p><?php echo $total_pro;?> Active Properties</p>

	</div>

	<!--  Land For Sale: -->
	<?php if(!empty($getrequirementresi2)){?>
		<?php foreach($getrequirementresi2 as $data){?>
			<?php 
			$a=$common->addViews($_SESSION['dealer_id'],$data['property_id']);
			$cat=$common->getCategoryName($data['cat_id']); 
    //var_dump($cat);
			$today=date('Y-m-d H:i:s');
			$data['cat_name']=$cat['cat_name'];
			$data['subcat_name']=$cat['subcat_name']; ?>
			<div class="landforsale">
				<div class="row">
					<div class="col-sm-8">
						<!-- Land for Sale: -->   
						<div class="contentoflandfor">
							<h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;For&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
							<p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['price']).'/-';?></span></p>    
							<p>Plot area:<span><?php if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo $data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo $data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else{}?></span></p>
							<?php if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}?>   

						</div>
						<!-- Active and Posted On -->         
						<div class="expireon">
							<p><?php echo $data['property_code'];?><span><?php echo $today<$data['expired_by']?'Active':'Expired';?></span></p>
							<p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
						</div>

						<!-- Expire On -->  
						<div class="extnddurtion">
							<p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by']));?> <span></span></p> 
							<p>Category:<span><?php echo $data['cat_name'];?></span></p>        
						</div>

						<!-- Summary Views: -->
       <!--  <div class="summryviews">
         <p>Summary views:132 / Detail views: 13</p>
         <span>view 1 Responses</span>
     </div> -->
 </div>
 <?php  $propdealinfo=$common->getDealerInfobyId($data['dealer_id']);
 $dealerinfo=$common->getDealerInfobyId($_SESSION['dealer_id']);
			// $count=count($getResponse);
 echo '<input type="hidden" id="phone_no" value="'.$propdealinfo['dealer_phone'].'">';
 echo '<input type="hidden" id="fname" value="'.$propdealinfo['dealer_first_name'].'">';
 echo '<input type="hidden" id="lname" value="'.$propdealinfo['dealer_last_name'].'">';
 echo '<input type="hidden" id="firm_name" value="'.$propdealinfo['dealer_firm_name'].'">';
 echo '<input type="hidden" id="dealer_email" value="'.$propdealinfo['dealer_email'].'">';
 $getResponse=$common->getResponseTrackDetail($_SESSION['dealer_id'],$data['property_id']);
 ?>
 <div class="col-sm-4">
 	<div class="btnsdledblckdiv">  
 		<div class="deletebutton">

 			<button class="dtebtn" onclick="interest(this.value);" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>Interested</button>                                                   
 		</div><br>
 		<div class="deletebutton">
 			<?php if($getResponse['mail']==1){
 				echo '<a href="mailto:'.$propdealinfo['dealer_email'].'" id='.$data['property_id'].' style="background:red;">'.'MAIL'.'</a>';
 			}else{
 				echo '<a href="mailto:'.$propdealinfo['dealer_email'].'" onclick="mail(this.id)" id='.$data['property_id'].'>'.'MAIL'.'</a>';
 			}        ?>                                           
 		</div><br>
 		<div class="deletebutton">

 			<?php if($getResponse['whatsapp']==1){
 				echo '<a target="_blank" href="https://wa.me/'.$propdealinfo['dealer_phone'].'" id='.$data['property_id'].' style="background:red;">'.'WHATSAPP'.'</a>';
 			}else{
 				echo '<a target="_blank" href="https://wa.me/'.$propdealinfo['dealer_phone'].'" onclick="whatsapp(this.id)" id='.$data['property_id'].'>'.'WHATSAPP'.'</a>';
 			}    ?>                                              
 		</div><br>
 		<div class="deletebutton">
 			<?php 
 			if($getResponse['call_to_user']==1){
 				echo '<span id='.$data['property_id'].' onclick="show_call()" style="background:red;">'.'CALL'.'</span>';
 			}else{
 				echo '<span id='.$data['property_id'].' onclick="call_to(this.id)">'.'CALL'.'</span>';
 			} ?>
 			
 		</div>

 	</div>  
 </div>
</div>  
</div>
<?php } ?>
<?php } ?>
<!-- For Commercial Properties -->
<?php if(!empty($getrequirementcomm)){?>
	<?php foreach($getrequirementcomm[0] as $data){?>
		<?php $cat=$common->getCategoryName($data['cat_id']); 
    //var_dump($cat);
		$data['cat_name']=$cat['cat_name'];
		$data['subcat_name']=$cat['subcat_name']; ?>
		<div class="landforsale">
			<div class="row">
				<div class="col-sm-8">
					<!-- Land for Sale: -->   
					<div class="contentoflandfor">
						<h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;For&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
						<p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['Expected_Price']).'/-';?></span></p>    
						<p>Plot area:<span><?php if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo $data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo $data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else{echo $data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}?></span></p>
						<?php if($data['Wash_Room']>0){echo '<p>'.'Washroom:'.'<span>'.$data['Wash_Room'].'</span>'.'</p>';}?>   

					</div>
					<!-- Active and Posted On -->         
					<div class="expireon">
						<p><?php echo $data['property_code'];?><span>Active</span></p>
						<p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
					</div>
					<div class="extnddurtion">
						<p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by']));?> <span></span></p> 
						<p>Category:<span><?php echo $data['cat_name'];?></span></p>

					</div>
					<!-- Summary Views: -->
       <!--  <div class="summryviews">
         <p>Summary views:132 / Detail views: 13</p>
         <span>view 1 Responses</span>
     </div> -->
 </div>
 <?php  $propdealinfo=$common->getDealerInfobyId($data['dealer_id']);
			// $count=count($getResponse);
 echo '<input type="hidden" id="phone_no" value="'.$propdealinfo['dealer_phone'].'">';
 echo '<input type="hidden" id="fname" value="'.$propdealinfo['dealer_first_name'].'">';
 echo '<input type="hidden" id="lname" value="'.$propdealinfo['dealer_last_name'].'">';
 echo '<input type="hidden" id="firm_name" value="'.$propdealinfo['dealer_firm_name'].'">';
 echo '<input type="hidden" id="dealer_email" value="'.$propdealinfo['dealer_email'].'">';
 ?>
 <div class="col-sm-4">
 	<div class="btnsdledblckdiv">  
 		<div class="deletebutton">
 			<button class="dtebtn" onclick="del_comm(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                    
 		</div>
 		<div class="deletebutton">
 			<button class="dtebtn" onclick="del_comm(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                    
 		</div>
 		<div class="deletebutton">
 			<button class="dtebtn" onclick="del_comm(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                    
 		</div>
 	</div>  
 </div>
</div>  
</div>
<?php } ?>
<?php } ?>

</div>





<!-- Close All Properties Listing Div -->


<!-- Open Expired Properties Listing Div -->
<div id="expired_properties">
	<?php 
  // include_once'Object.php';
// session_start();
	$type='Expired';
	$getexprequirementresi3=$common->getRequirementFromProperty($data1,$getproperty_for,$getproperty_option);
	$getexprequirementcomm=$common->getExpCommRequirementByDealerId($_SESSION['dealer_id']);
       // var_dump($getexprequirementresi3);
	if(!empty($getexprequirementresi3)){
		$aa=0;$today=date('Y-m-d H:i:s');
		foreach($getexprequirementresi3 as $a){
			if($today>$a['expired_by']){
				$aa=$aa+1;
			}
		}
		$exp_prop=$aa;
	}else{
		$exp_prop=0;
	}

	if(!empty($getexprequirementcomm)){
		$exp_comm_prop=count($getexprequirementcomm);
	}else{
		$exp_comm_prop=0;
	}
	$total_exp_pro=$exp_prop+$exp_comm_prop;
	?>
	<div class="resultactiveprdcts">
		<p><?php echo $total_exp_pro;?> Active Products</p>

	</div>

	<!--  Land For Sale: -->
	<?php if(!empty($getexprequirementresi3)){?>
		<?php foreach($getexprequirementresi3 as $data){?>
			<?php 
			
    // echo $expiry=$data['expired_by'];
			if($today>$data['expired_by']):
				?>
				<?php $cat=$common->getCategoryName($data['cat_id']); 
    //var_dump($cat);
				$data['cat_name']=$cat['cat_name'];
				$data['subcat_name']=$cat['subcat_name']; ?>
				<div class="landforsale">
					<div class="row">
						<div class="col-sm-8">
							<!-- Land for Sale: -->   
							<div class="contentoflandfor">
								<h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;For&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
								<p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['price']).'/-';?></span></p>    
								<p>Plot area:<span><?php if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo $data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo $data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else{}?></span></p>
								<?php if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}?>   

							</div>
							<!-- Active and Posted On -->         
							<div class="expireon">
								<p><?php echo $data['property_code'];?><span>Active</span></p>
								<p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
							</div>

							<!-- Expire On -->  
							<div class="extnddurtion">
								<p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by']));?> <span></span></p> 
								<p>Category:<span><?php echo $data['cat_name'];?></span></p>        
							</div>

							<!-- Summary Views: -->
       <!--  <div class="summryviews">
         <p>Summary views:132 / Detail views: 13</p>
         <span>view 1 Responses</span>
     </div> -->
 </div>

 <div class="col-sm-4">
 	<div class="btnsdledblckdiv">  
 		<!-- Assist to User -->
 		<div class="editbutton">
 			<!-- <p>Assist to subuser</p> -->
 			<a href="edit_property.php?id=<?php echo base64_encode($data['property_id']);?>&&prop_for=<?php echo base64_encode($data['property_for']);?>"><button class="edtbtn"><i class="fa fa-check-square-o" aria-hidden="true"></i><span>EDIT</span></button></a> 
 		</div>



 		<!-- Delete Button -->

 		<div class="deletebutton">

 			<button class="dtebtn" onclick="del(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                                   

 		</div>

 	</div>  
 </div>
</div>  
</div>
<?php endif;?>
<?php } ?>
<?php } ?>
<!-- For Commercial Properties -->
<?php if(!empty($getexprequirementcomm)){?>
	<?php foreach($getexprequirementcomm as $data){?>
		<?php $cat=$common->getCategoryName($data['cat_id']); 
    //var_dump($cat);
		$data['cat_name']=$cat['cat_name'];
		$data['subcat_name']=$cat['subcat_name']; ?>
		<?php 
		$today=date('Y-m-d H:i:s');
    // echo $expiry=$data['expired_by'];
		if($today>$data['expired_by']):
			?>
			<div class="landforsale">
				<div class="row">
					<div class="col-sm-8">
						<!-- Land for Sale: -->   
						<div class="contentoflandfor">
							<h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;For&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
							<p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['Expected_Price']).'/-';?></span></p>    
							<p>Plot area:<span><?php if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo $data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo $data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else{echo $data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}?></span></p>
							<?php if($data['Wash_Room']>0){echo '<p>'.'Washroom:'.'<span>'.$data['Wash_Room'].'</span>'.'</p>';}?>   

						</div>
						<!-- Active and Posted On -->         
						<div class="expireon">
							<p><?php echo $data['property_code'];?><span>Active</span></p>
							<p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
						</div>
						<div class="extnddurtion">
							<p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by']));?> <span></span></p> 
							<p>Category:<span><?php echo $data['cat_name'];?></span></p>

						</div>



						<!-- Summary Views: -->



       <!--  <div class="summryviews">

         <p>Summary views:132 / Detail views: 13</p>



         <span>view 1 Responses</span>

     </div> -->
 </div>
 <div class="col-sm-4">
 	<div class="btnsdledblckdiv">  
 		<!-- Assist to User -->
 		<div class="editbutton">
 			<!-- <p>Assist to subuser</p> -->
 			<a href="edit_property.php?id=<?php echo base64_encode($data['property_id']);?>&&prop_for=<?php echo base64_encode($data['property_for']);?>"><button class="edtbtn"><i class="fa fa-check-square-o" aria-hidden="true"></i><span>EDIT</span></button></a>
 		</div>
 		<!-- Delete Button -->

 		<div class="deletebutton">

 			<button class="dtebtn" onclick="del_comm(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                    
 		</div>
 	</div>  
 </div>
</div>  
</div>
<?php endif;?>
<?php } ?>
<?php } ?>
</div>
<!-- Close Expired Properties Listing Div -->
<!-- Open Favorite Properties Div -->

<div id="favorite_properties">
	
</div>


<!-- Close Favorite Properties Div -->

</div> 
</div>  
</div>
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





</script>






<style type="text/css">

	body{

		overflow-y: scroll;

	}

</style>
<script type="text/javascript">
	function del(value){
		if (confirm("Are you sure want to delete?")) {
        // your deletion code
        $.ajax({
        	url:'ajax.php',
        	type:'post',
        	data:{property_id:value},
        	success:function(data){
        		document.location.reload(true);
        	}
        })
    }
    return false;
}
function del_comm(value){
	if (confirm("Are you sure want to delete?")) {
        // your deletion code
        $.ajax({
        	url:'ajax.php',
        	type:'post',
        	data:{property_id_comm:value},
        	success:function(data){
        		document.location.reload(true);
        	}
        })
    }
    return false;
}

/*Ajax for fav Property*/
function fav(value){
	if (confirm("Are you sure want to Fav?")) {
		var dealer_id=$("#dealer_id").val();
        // your deletion code
        $.ajax({
        	url:'ajax.php',
        	type:'post',
        	data:{'fav_property':1,req_property_id:value,dealer_id:dealer_id},
        	success:function(data){
            // document.location.reload(true);
            console.log(data);
            $("#" + value).attr("onclick","unfav(this.value)");
            $("#" + value).css('background-color','red');

        }
    })
    }
    return false;
}

/*Close Ajax Fav Property*/


/*Ajax for Unfav Property*/
function unfav(value){
	if (confirm("Are you sure want to unFav?")) {
		var dealer_id=$("#dealer_id").val();
        // your deletion code
        $.ajax({
        	url:'ajax.php',
        	type:'post',
        	data:{'unfav_property':1,req_property_id:value,dealer_id:dealer_id},
        	success:function(data){
            // document.location.reload(true);
            console.log(data);
            $("#" + value).attr("onclick","fav(this.value)");
            $("#" + value).css('background-color','green');

        }
    })
    }
    return false;
}

/*Close Ajax unFav Property*/

function change_div(id){
	if(id=='active'){
		$("#active_properties").show();
		$("#expired_properties").hide();
		$("#all_properties").hide();
		$("#all").removeClass('color');
		$("#active").addClass('color');
		$("#expired").removeClass('color');
		$("#favorite_properties").hide();
		$("#favorite").removeClass('color');
	}else if(id=='expired'){
		$("#active_properties").hide();
		$("#expired_properties").show();
		$("#all_properties").hide();
		$("#all").removeClass('color');
		$("#active").removeClass('color');
		$("#expired").addClass('color');
		$("#favorite_properties").hide();
		$("#favorite").removeClass('color');

	}else if(id=='favorite'){
		$("#active_properties").hide();
		$("#expired_properties").hide();
		$("#all_properties").hide();
		$("#all").removeClass('color');
		$("#active").removeClass('color');
		$("#expired").removeClass('color');
		$("#favorite_properties").show();
		$("#favorite").addClass('color');
		var property_id=$("#property_id").val();
		var property_for=$("#property_for").val();
		$.ajax({
			url:'ajax_new.php',
			type:'post',
			data:{'favourite':1},
			success:function(data){
				$("#favorite_properties").html(data);
			}
		})
	}else{
		$("#active_properties").hide();
		$("#expired_properties").hide();
		$("#all_properties").show();
		$("#all").addClass('color');
		$("#active").removeClass('color');
		$("#expired").removeClass('color');
		$("#favorite_properties").hide();
		$("#favorite").removeClass('color');
	}
}
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$("#active_properties").css('display','none');
		$("#expired_properties").css('display','none');
		$("#favorite_properties").css('display','none');
		$("#all_properties").show();
		$("#all").addClass('color');
	}) 
</script>
<script type="text/javascript">
	function mail(id){
		var dealer_id=$("#dealer_id").val();
		$.ajax({
			url:'ajax.php',
			type:'post',
			data:{'social_track':3,dealer_id:dealer_id,id:id},
			success:function(data){
				console.log(data);
			}
		})
	}

	function whatsapp(id){
		var dealer_id=$("#dealer_id").val();
		$.ajax({
			url:'ajax.php',
			type:'post',
			data:{'social_track':1,dealer_id:dealer_id,id:id},
			success:function(data){
				console.log(data);
			}
		})
	}

	function call_to(id){
		var dealer_id=$("#dealer_id").val();
		$.ajax({
			url:'ajax.php',
			type:'post',
			data:{'social_track':2,dealer_id:dealer_id,id:id},
			success:function(data){
				console.log(data);
				show_call();
			}
		})
	}
	function show_call(){
		var ph=$("#phone_no").val();
		var fname=$("#fname").val();
		var lname=$("#lname").val();
		var firm_name=$("#firm_name").val();
		Swal.fire({
			title: 'Dealer' +' '+ fname + ' ' + lname +',<br>'+' '+ 'Firm Name' +' ' + firm_name +'<br>' +'Contact Number is' + ' ' +ph,
			animation: true,
			customClass: {
				popup: 'animated tada'
			}
		})
	}

	function interest(value){
		var ph=$("#phone_no").val();
		var fname=$("#fname").val();
		var lname=$("#lname").val();
		var firm_name=$("#firm_name").val();
		var prop_for=$("#prop_for").val();
		var dealer_email=$("#dealer_email").val();
		$.ajax({
			url:'ajax.php',
			type:'post',
			data:{'automated_mail':2,ph:ph,fname:fname,lname:lname,firm_name:firm_name,propertyid:value,propertyfor:prop_for,dealer_email:dealer_email},
			beforeSend:function(){
				Swal.fire({
					type: 'success',
					title: 'Thank You For Your Response',
					showConfirmButton: true
				})
			},
			success:function(data){
				console.log(data);
      // show_call();
  }
})
	}
</script>
<style type="text/css">
	.color{
		background-color: #cfcfcf!important;
	}
</style>



<?php 
include_once'Object.php';
session_start();
// var_dump($_SESSION);
if(isset($_POST['property_for'])){
	       // var_dump($_POST);die;
	$date=date('Y-m-d H:i:s');
	$expiry=date('Y-m-d H:i:s', strtotime($date. ' + 30 days'));
	$property_option='1';
	$property_for=$_POST['property_for'];
	$property_code=rand(00000000,99999999);
	if($_POST['property_for']=='0'){
		$table='residential_properties';
		$data=array('property_code'=>$property_code,'dealer_id'=>$_SESSION['dealer_id'],'property_for'=>$_POST['property_for'],'property_type'=>$_POST['property_type1'],'property_option'=>0,'cat_id'=>$_POST['category_id'],'subcat_id'=>$_POST['subcat_id'],'city'=>$_POST['city'],'sector'=>$_POST['sector'],'landmark'=>$_POST['landmark'],'block'=>$_POST['block'],'min_price'=>$_POST['min_price'],'max_price'=>$_POST['max_price'],'Plot_Area'=>$_POST['Plot_Area'],'Plot_Area_Unit'=>$_POST['Plot_Area_Unit'],'Carpet_Area'=>$_POST['Carpet_Area'],'Carpet_Area_Unit'=>$_POST['Carpet_Area_Unit'],'Super_Built_Up_Area'=>$_POST['Built_Up_Area'],'Super_Built_Up_Area_Unit'=>$_POST['Built_Up_Area_Unit'],'Bedroom'=>$_POST['Bedroom'],'Bathroom'=>$_POST['Bathroom'],'Furnishing_Status'=>$_POST['Furnishing_Status'],'Property_on_Floor'=>$_POST['Property_on_Floor'],'Floors_In_Buliding'=>$_POST['Floors_In_Buliding'],'Car_Parking_Space'=>$_POST['Car_Parking_Space'],'Others'=>implode(',',$_POST['Others']),'price'=>$_POST['price'],'price_unit'=>$_POST['price_unit'],'negotiable'=>$_POST['negotiable'],'loan_approval'=>$_POST['loan_approval'],'construction_status'=>$_POST['construction_status'],'status'=>$_POST['status'],'expired_by'=>$expiry);
		$search=$common->getRequirementFromProperty($data,$property_for,$property_option);
	}else{
		$table='commercial_properties';
		// var_dump($_POST);
		$Amenities=implode(',',$_POST['Amenities']);
		$data=array('property_code'=>$property_code,'dealer_id'=>$_SESSION['dealer_id'],'property_for'=>$_POST['property_for'],'property_type'=>$_POST['property_type1'],'property_option'=>0,'cat_id'=>$_POST['category_id'],'subcat_id'=>$_POST['subcat_id'],'city'=>$_POST['city'],'sector'=>$_POST['sector'],'landmark'=>$_POST['landmark'],'block'=>$_POST['block'],'Super_Area'=>$_POST['Super_Area'],'Super_Area_Unit'=>$_POST['Super_Area_Unit'],'Carpet_Area'=>$_POST['Carpet_Area'],'Carpet_Area_Unit'=>$_POST['Carpet_Area_Unit'],'Built_Up_Area'=>$_POST['Built_Up_Area'],'Built_Up_Area_Unit'=>$_POST['Built_Up_Area_Unit'],'Wash_Room'=>$_POST['Wash_Room'],'Pantry'=>$_POST['Pantry'],'Furnishing_Status'=>$_POST['Furnishing_Status'],'Status'=>$_POST['Status'],'Parking_Space'=>$_POST['Parking_Space'],'Parking_Space_Unit'=>$_POST['Parking_Space_Unit'],'Ownership'=>$_POST['Ownership'],'Rooms'=>$_POST['Rooms'],'Quality_Rating'=>$_POST['Quality_Rating'],'Facing'=>$_POST['Facing'],'Possesion'=>$_POST['Possesion'],'Amenities'=>$Amenities,'Description'=>$_POST['Description'],'Maintenance'=>$_POST['Maintenance'],'Maintenance_Unit'=>$_POST['Maintenance_Unit'],'Expected_Rent'=>$_POST['Expected_Rent'],'Expected_Price'=>$_POST['price'],'negotiable'=>$_POST['negotiable'],'loan_approval'=>$_POST['loan_approval'],'property_status'=>1,'expired_by'=>$expiry);
		$search=$common->getRequirementFromProperty($data,$property_for,$property_option);
	}
	
	 // var_dump($data);die;
	$result=$common->insert($table,$data);
	if(!empty($search)){
		$from = "info@netmaxims.in";
		$subject = "".count($search)." Property Matched";
		foreach($search as $data){
			$cat_name=$common->getCategoryName($data['cat_id']);
			$message = 'Property Code:-';
			$message .=$data['property_code'].'<br>';
			$message .='Property Category:-'.$cat_name['cat_name'].'<br>';
			$message .='City:-'.$data['city'].'<br>';
			$message .='Sector:-'.$data['sector'].'<br>';
		}
		// $headers = "MIME-Version: 1.0" . "\r\n";
		// $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  //                       // More headers
		// $headers .= 'from:<webmail@netmaxims.in>' . "\r\n";
  //           // $headers .= 'Cc: bhawna@netmaxims.com' . "\r\n";
		// $headers .= 'Cc: chirag@netmaxims.in' . "\r\n";

		// $mail=mail($to,$subject,$txt,$headers);
		// if($mail){
		// 	echo 'successfully';
		// }else{
		// 	echo 'Not Successfully';
		// }
		$common->mail($subject,$message,$from);
		// $subject,$message,$from
	}
	
	
}


if(isset($_POST['submit_otp'])){
	$data['fname']=$_POST['fname'];
	$data['email']=$_POST['email1'];
	$data['phone']=$_POST['phone'];
	$data['otp']=rand(0000,9999);
	$result=$common->otpVerification($data);
	$msg=array('status'=>1,'otp'=>$data['otp']);
	// return $msg;
	echo json_encode($msg);
}

if(isset($_POST['location'])){
	$result=$common->getAreaSector(1);
	foreach($result as $data){
		$data1[]=$data['sector_area'];
	}
	echo json_encode($data1);
}

if(isset($_POST['checkemail'])){
	$data['email']=$_POST['email1'];
	echo $result=$common->checkUser($data);
	
}

if(isset($_POST['update_property'])){
	// var_dump($_POST);
	if($_POST['prop_for']=='0'){
		$tablename='residential_properties';
		$data=array('price'=>$_POST['price'],'negotiable'=>$_POST['negotiable'],'construction_status'=>$_POST['cons_status'],'loan_approval'=>$_POST['loan_approval']);
		$condition=array('property_id'=>$_POST['property_id']);
		$result=$common->update($tablename,$data,$condition);
		echo '1';
	}else{
		$tablename='commercial_properties';
		$data=array('Expected_Price'=>$_POST['price'],'negotiable'=>$_POST['negotiable'],'loan_approval'=>$_POST['loan_approval']);
		$condition=array('property_id'=>$_POST['property_id']);
		$result=$common->update($tablename,$data,$condition);
		echo '1';
	}
}



if(isset($_POST['favourite'])){
  // include_once'Object.php';
// session_start();
	
	$type='All';
	$getrequirementresi=$common->getFavResiPropertyByDealerId($_SESSION['dealer_id']);
  // var_dump($getrequirementresi);die;
	$getrequirementcomm=$common->getCommRequirementByDealerId($_SESSION['dealer_id']);
    // var_dump($comm_properties);
	if(!empty($getrequirementresi)){
		$prop=count($getrequirementresi);
	}else{
		$prop=0;
	}

	if(!empty($getrequirementcomm)){
		$comm_prop=count($getrequirementcomm);
	}else{
		$comm_prop=0;
	}
	$total_pro=$prop+$comm_prop;
	
	echo '<div class="resultactiveprdcts">';
	echo '<p>'.$total_pro.' '.'Active Properties'.'</p>';

	echo '</div>';
	if(!empty($getrequirementresi)){
		foreach($getrequirementresi as $data){
			$cat=$common->getCategoryName($data['cat_id']); 
    //var_dump($cat);
			$today=date('Y-m-d H:i:s');
			$data['cat_name']=$cat['cat_name'];
			$data['subcat_name']=$cat['subcat_name'];
			echo '<div class="landforsale">';
			echo '<div class="row">';
			echo '<div class="col-sm-8">';
			
			echo '<div class="contentoflandfor">';
			echo '<h4>';
			if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}
			echo '&nbsp';
			echo '<span style="color: blue;">';
			if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}
			echo '</span>';
			echo '&nbsp';
			echo 'For';
			echo '&nbsp';
			echo $data['sector'].' '.$data['city'];
			echo '</h4>';
			echo '<p>'.'Price:'.'<span>';
			echo '<i class="fa fa-inr">';
			echo '</i>';
			echo number_format($data['price']).'/-';
			echo '</span>';
			echo '</p>';    
			echo '<p>'.'Plot area:'.'<span>';
			if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo $data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo $data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else{}
			echo '</span>';
			echo '</p>';
			if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}  

			echo '</div>';
			
			echo '<div class="expireon">';
			echo '<p>';
			echo $data['property_code'];
			echo '<span>';
			echo $today<$data['expired_by']?'Active':'Expired';
			echo '</span>';
			echo '</p>';
			echo '<p class="postedon">';
			echo 'Posted On:';
			echo '<span style="border: none;">';
			echo date('d M Y',strtotime($data['posted_by']));
			echo '</span>';
			echo '</p>';
			echo '</div>';

			
			echo '<div class="extnddurtion">';
			echo '<p>';
			echo 'Expiry On:';
			echo date('d M Y',strtotime($data['expired_by']));
			echo '<span>';
			echo '</span>';
			echo '</p>'; 
			echo '<p>'.'Category:'.'<span>';
			echo $data['cat_name'];
			echo '</span>';
			echo '</p>';        
			echo '</div>';
			echo '</div>';
			echo '<div class="col-sm-4">';
			
			echo '</div>';
			echo '</div>';  
			echo '</div>';
		}
	}
	/*for Commercial Properties*/
	if(!empty($getrequirementcomm)){
		foreach($getrequirementcomm[0] as $data){
			$cat=$common->getCategoryName($data['cat_id']); 
			
			$data['cat_name']=$cat['cat_name'];
			$data['subcat_name']=$cat['subcat_name'];
			echo '<div class="landforsale">';
			echo '<div class="row">';
			echo '<div class="col-sm-8">';
			
			echo '<div class="contentoflandfor">';
			echo '<h4>';
			if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}
			echo '&nbsp';
			echo '<span style="color: blue;">';
			if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}
			echo '</span>';
			echo '&nbsp'.'For'.'&nbsp';
			echo $data['sector'].' '.$data['city'];
			echo '</h4>';
			echo '<p>'.'Price:'.'<span>';
			echo '<i class="fa fa-inr">';
			echo '</i>';
			echo number_format($data['Expected_Price']).'/-';
			echo '</span>';
			echo '</p>';    
			echo '<p>'.'Plot area:'.'<span>';
			if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo $data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo $data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else{echo $data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}
			echo '</span>';
			echo '</p>';
			if($data['Wash_Room']>0){echo '<p>'.'Washroom:'.'<span>'.$data['Wash_Room'].'</span>'.'</p>';}   

			echo '</div>';
			
			echo '<div class="expireon">';
			echo '<p>';
			echo $data['property_code'];
			echo '<span>'.'Active'.'</span>';
			echo '</p>';
			echo '<p class="postedon">';
			echo 'Posted On:';
			echo '<span style="border: none;">';
			echo date('d M Y',strtotime($data['posted_by']));
			echo '</span>';
			echo '</p>';
			echo '</div>';
			echo '<div class="extnddurtion">';
			echo '<p>'.'Expiry On:';
			echo date('d M Y',strtotime($data['expired_by']));
			echo  '<span>';
			echo '</span>';
			echo '</p>'; 
			echo '<p>'.'Category:'.'<span>';
			echo $data['cat_name'];
			echo '</span>';
			echo '</p>';

			echo '</div>';
			echo '</div>';
			
			echo '</div>';  
			echo '</div>';
		}
	}

}




?>

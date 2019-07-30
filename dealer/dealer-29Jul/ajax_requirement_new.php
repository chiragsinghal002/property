<?php 
include_once'Object.php';
session_start();
if(isset($_POST['property_for'])){
	         // var_dump($_POST);
	$date=date('Y-m-d H:i:s');
	$expiry=date('Y-m-d H:i:s', strtotime($date. ' + 30 days'));	
	$property_code=rand(00000000,99999999);
	$property_for=$_POST['property_for'];
	$property_option='0';
	if($_POST['property_for']=='0'){
		$table='residential_properties';
		$data=array('property_code'=>$property_code,'dealer_id'=>$_SESSION['dealer_id'],'property_for'=>$_POST['property_for'],'property_type'=>$_POST['property_type_for'],'property_option'=>1,'cat_id'=>$_POST['category_id'],'subcat_id'=>$_POST['subcat_id'],'city'=>$_POST['city'],'sector'=>$_POST['sector'],'min_price'=>$_POST['min_price'],'max_price'=>$_POST['max_price'],'Plot_Area'=>$_POST['Plot_Area'],'Plot_Area_Unit'=>$_POST['Plot_Area_Unit'],'Carpet_Area'=>$_POST['Carpet_Area'],'Carpet_Area_Unit'=>$_POST['Carpet_Area_Unit'],'Super_Built_Up_Area'=>$_POST['Super_Built_Up_Area'],'Super_Built_Up_Area_Unit'=>$_POST['Super_Built_Up_Area_Unit'],'Bedroom'=>$_POST['Bedroom'],'Bathroom'=>$_POST['Bathroom'],'Furnishing_Status'=>$_POST['Furnishing_Status'],'Property_on_Floor'=>$_POST['Property_on_Floor'],'Floors_In_Buliding'=>$_POST['Floors_In_Buliding'],'Car_Parking_Space'=>$_POST['Car_Parking_Space'],'Others'=>implode(',',$_POST['Others']),'price'=>$_POST['price'],'price_unit'=>$_POST['price_unit'],'negotiable'=>$_POST['negotiable'],'loan_approval'=>$_POST['loan_approval'],'construction_status'=>$_POST['construction_status'],'status'=>$_POST['status'],'expired_by'=>$expiry);
		$search=$common->getRequirementFromProperty($data,$property_for,$property_option);
	}else{
		$table='commercial_properties';
		$data=array('property_code'=>$property_code,'dealer_id'=>$_SESSION['dealer_id'],'property_option'=>1,'property_for'=>$_POST['property_for'],'property_type'=>$_POST['property_type_for'],'cat_id'=>$_POST['category_id'],'subcat_id'=>$_POST['subcat_id'],'city'=>$_POST['city'],'sector'=>$_POST['sector'],'landmark'=>$_POST['landmark'],'block'=>$_POST['block'],'Super_Area'=>$_POST['Super_Area'],'Super_Area_Unit'=>$_POST['Super_Area_Unit'],'Carpet_Area'=>$_POST['Carpet_Area'],'Carpet_Area_Unit'=>$_POST['Carpet_Area_Unit'],'Built_Up_Area'=>$_POST['Built_Up_Area'],'Built_Up_Area_Unit'=>$_POST['Built_Up_Area_Unit'],'Wash_Room'=>$_POST['Wash_Room'],'Pantry'=>$_POST['Pantry'],'Furnishing_Status'=>$_POST['Furnishing_Status'],'Status'=>$_POST['Status'],'Parking_Space'=>$_POST['Parking_Space'],'Parking_Space_Unit'=>$_POST['Parking_Space_Unit'],'Ownership'=>$_POST['Ownership'],'Rooms'=>$_POST['Rooms'],'Quality_Rating'=>$_POST['Quality_Rating'],'Facing'=>$_POST['Facing'],'Possesion'=>$_POST['Possesion'],'Amenities'=>$_POST['Amenities'],'Description'=>$_POST['Description'],'Maintenance'=>$_POST['Maintenance'],'Maintenance_Unit'=>$_POST['Maintenance_Unit'],'Expected_Rent'=>$_POST['Expected_Rent'],'Expected_Price'=>$_POST['price'],'price_unit'=>$_POST['price_unit'],'negotiable'=>$_POST['negotiable'],'loan_approval'=>$_POST['loan_approval'],'property_status'=>1,'expired_by'=>$expiry);
		// var_dump($data);
		 // $search=$common->getRequirementFromProperty($data,$property_for,$property_option);
	}
	  // var_dump($search);

	$result=$common->insert($table,$data);
	if(!empty($search)){
		$from =$_SESSION['dealer_email'];
		$subject = "".count($search)." Property Matched From Your Requirement";

		foreach($search as $data){
			$cat_name=$common->getCategoryName($data['cat_id']);
			$message = 'Property Code:-';
			$message .=$data['property_code'].'<br>';
			$message .='Property Category:-'.$cat_name['cat_name'].'<br>';
			$message .='City:-'.$data['city'].'<br>';
			$message .='Sector:-'.$data['sector'].'<br>';
			$message .='<a href="yards360.com/list_requriment.php">Yards360.com</a>';
			$requirementDealer=$common->getDealerInfobyId($data['dealer_id']);
			$torequirementDealer=$requirementDealer['dealer_email'];
			$subject1="".count($search)." Property Matched";
			$common->mail($subject1,$message,$torequirementDealer);
			$msg=count($search).'PropertyMatched';
			 $common->smsApi($msg,$requirementDealer['dealer_phone']);
		}
		$common->mail($subject,$message,$from);
		$msg1=count($search).'PropertyMatchedFromYourRequirement';
		 $common->smsApi($msg1,$_SESSION['dealer_phone'];);
		
		return 1;
	}else{
		return 1;
	}
	
}

?>
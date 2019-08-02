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

		if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo 'Plot Area'.' '.$data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else{echo 'Super Built Area'.' '.$data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}

		$search=$common->getRequirementFromProperty($data,$property_for,$property_option);
		$cat_name=$common->getCategoryName($data['cat_id']);
		$message1 ='<!doctype html>
		<html>
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">  

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<body style="background:#fafafa; width:100%;height:650px;text-align: center;margin: 0 auto;height: 600px;border-top: 4px solid #6b4fbb;">

		<table style="box-shadow: 1px 1px 6px #ccc;background:white;width:55%;text-align: center;margin: 0 auto;display: block; position: relative;margin-top: 140px;" >
		<thead style="background:#fafafa">
		<tr style="background:#fafafa"> <img alt="GitLab" src="http://yards360.com/image/yards360logoemail.png" style="padding-bottom: 30px;text-align:center;margin: 0 auto;display:block">
		</tr>
		</thead>';
		$message2='<tbody style="position: relative">
		<tr>
		<td><h4 style="margin-top: 0px; color: #3cb54a;padding-left: 27px;padding-top: 13px;font-size: 25px;margin-bottom: 15px;">Residential <span style="color: blue;padding-right: 8px;">'.$cat_name['cat_name'].'</span>In '.$data['sector'].' '.$data['city'].'</h4></td>
		</tr>

		<tr>
		<td style="float: left;"><p style="padding-left: 27px;margin-top: 0px;color: #3cb54a;font-size: 18px;letter-spacing: 1px;margin-bottom: 0px;">Price:<span style="color: black;font-size: 18px;padding-left: 10px;margin-bottom: 0px;"><i class="fa fa-inr"></i>&#8377;'.$data['price'].'/-</span></p>
		</td>

		<td style="float: left;"><p style="margin-top: 0px;
		letter-spacing: 1px;padding-left: 32px;color: #3cb54a;font-size: 18px;margin-bottom: 0px;">';
		if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){$message2 .='Plot Area'.' '.$data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){$message2 .='Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else{$message2 .='Super Built Area'.' '.$data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}
		$message2 .='<span style="padding-left: 20px;"></span> <span style="color: black"></span></p> 
		</td>
		</tr>

		<tr>
		<td style="float: left;"><p style="padding-left: 27px;font-size:18px;color:black;">Category:<span>'.$cat_name['cat_name'].'</span></p></td>
		</tr>

		</tbody>';
		$message3 ='<tfoot style="float: left;padding-top: 55px;">
		<tr>
		<td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;">Your Trusted Partner,<a href="http://yards360.com" style="padding-left: 15px;color:#1155cc">yards360.com</a></p></td>
		</tr>

		<tr style="display: block;"><td><h3 style="margin-top: 0px;margin-bottom: 0px;">We would love to hear from you,</h3></td></tr>
		<tr style="display: block;"><td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;margin-top: 6px;">Call at 9999077365</p></tr>
		</tfoot>

		</table>
		</body> 
		</html>';
		$message4=$message1.$message2.$message3;

	}else{

		$table='commercial_properties';

		$data=array('property_code'=>$property_code,'dealer_id'=>$_SESSION['dealer_id'],'property_option'=>1,'property_for'=>$_POST['property_for'],'property_type'=>$_POST['property_type_for'],'cat_id'=>$_POST['category_id'],'subcat_id'=>$_POST['subcat_id'],'city'=>$_POST['city'],'sector'=>$_POST['sector'],'landmark'=>$_POST['landmark'],'block'=>$_POST['block'],'Super_Area'=>$_POST['Super_Area'],'Super_Area_Unit'=>$_POST['Super_Area_Unit'],'Carpet_Area'=>$_POST['Carpet_Area'],'Carpet_Area_Unit'=>$_POST['Carpet_Area_Unit'],'Built_Up_Area'=>$_POST['Built_Up_Area'],'Built_Up_Area_Unit'=>$_POST['Built_Up_Area_Unit'],'Wash_Room'=>$_POST['Wash_Room'],'Pantry'=>$_POST['Pantry'],'Furnishing_Status'=>$_POST['Furnishing_Status'],'Status'=>$_POST['Status'],'Parking_Space'=>$_POST['Parking_Space'],'Parking_Space_Unit'=>$_POST['Parking_Space_Unit'],'Ownership'=>$_POST['Ownership'],'Rooms'=>$_POST['Rooms'],'Quality_Rating'=>$_POST['Quality_Rating'],'Facing'=>$_POST['Facing'],'Possesion'=>$_POST['Possesion'],'Amenities'=>$_POST['Amenities'],'Description'=>$_POST['Description'],'Maintenance'=>$_POST['Maintenance'],'Maintenance_Unit'=>$_POST['Maintenance_Unit'],'Expected_Rent'=>$_POST['Expected_Rent'],'Expected_Price'=>$_POST['price'],'price_unit'=>$_POST['price_unit'],'negotiable'=>$_POST['negotiable'],'loan_approval'=>$_POST['loan_approval'],'property_status'=>1,'expired_by'=>$expiry);
		$cat_name=$common->getCategoryName($data['cat_id']);
		$message1 ='<!doctype html>
		<html>
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">  

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<body style="background:#fafafa; width:100%;height:650px;text-align: center;margin: 0 auto;height: 600px;border-top: 4px solid #6b4fbb;">

		<table style="box-shadow: 1px 1px 6px #ccc;background:white;width:55%;text-align: center;margin: 0 auto;display: block; position: relative;margin-top: 140px;" >
		<thead style="background:#fafafa">
		<tr style="background:#fafafa"> <img alt="GitLab" src="http://yards360.com/image/yards360logoemail.png" style="padding-bottom: 30px;text-align:center;margin: 0 auto;display:block">
		</tr>
		</thead>';
		$message2='<tbody style="position: relative">

		<tr>
		<td><h4 style="margin-top: 0px; color: #3cb54a;padding-left: 27px;padding-top: 13px;font-size: 25px;margin-bottom: 15px;">Residential <span style="color: blue;padding-right: 8px;">'.$cat_name['cat_name'].'</span>In '.$data['sector'].' '.$data['city'].'</h4></td>
		</tr>

		<tr>
		<td style="float: left;"><p style="padding-left: 27px;margin-top: 0px;color: #3cb54a;font-size: 18px;letter-spacing: 1px;margin-bottom: 0px;">Price:<span style="color: black;font-size: 18px;padding-left: 10px;margin-bottom: 0px;"><i class="fa fa-inr"></i>&#8377;'.$data['price'].'/-</span></p>
		</td>

		<td style="float: left;"><p style="margin-top: 0px;
		letter-spacing: 1px;padding-left: 32px;color: #3cb54a;font-size: 18px;margin-bottom: 0px;">Plot area:'.$data['Plot_Area'].' '.$data['Plot_Area_Unit'].' <span style="padding-left: 20px;"></span> <span style="color: black"></span></p> 
		</td>
		</tr>

		<tr>
		<td style="float: left;"><p style="padding-left: 27px;font-size:18px;color:black;">Category:<span>'.$cat_name['cat_name'].'</span></p></td>
		</tr>

		</tbody>';
		$message3 ='<tfoot style="float: left;padding-top: 55px;">
		<tr>
		<td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;">Your Trusted Partner,<a href="http://yards360.com" style="padding-left: 15px;color:#1155cc">yards360.com</a></p></td>
		</tr>

		<tr style="display: block;"><td><h3 style="margin-top: 0px;margin-bottom: 0px;">We would love to hear from you,</h3></td></tr>
		<tr style="display: block;"><td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;margin-top: 6px;">Call at 9999077365</p></tr>
		</tfoot>

		</table>
		</body> 
		</html>';
		$message4=$message1.$message2.$message3;

	}

	

	$result=$common->insert_id($table,$data);

		$property_id=base64_encode($result);
		$property_for1=base64_encode($_POST['property_for']);
	if(!empty($search)){

		$from =$_SESSION['dealer_email'];

		$subject = "".count($search)." Property Matched From Your Requirement";
		$message ='<!doctype html>
		<html>
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&display=swap" rel="stylesheet">  

		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
		<body style="background:#fafafa; width:100%;text-align: center;margin: 0 auto;border-top: 4px solid #6b4fbb;">

		<table style="box-shadow: 1px 1px 6px #ccc;background:white;width:55%;text-align: center;margin: 0 auto;display: block; position: relative;margin-top: 140px;" >
		<thead style="background:#fafafa">
		<tr style="background:#fafafa"> <img alt="GitLab" src="http://yards360.com/image/yards360logoemail.png" style="padding-bottom: 30px;text-align:center;margin: 0 auto;display:block">
		</tr>
		</thead>';


		foreach($search as $data){

			$cat_name=$common->getCategoryName($data['cat_id']);
			
			$message .='<tbody style="position: relative;">

			<tr>
			<td><h4 style="margin-top: 0px; color: #3cb54a;padding-left: 27px;padding-top: 13px;font-size: 25px;margin-bottom: 15px;">Residential <span style="color: blue;padding-right: 8px;">'.$cat_name['cat_name'].'</span>In '.$data['sector'].' '.$data['city'].'</h4></td>
			</tr>

			<tr>
			<td style="float: left;"><p style="padding-left: 27px;margin-top: 0px;color: #3cb54a;font-size: 18px;letter-spacing: 1px;margin-bottom: 0px;">Price:<span style="color: black;font-size: 18px;padding-left: 10px;margin-bottom: 0px;"><i class="fa fa-inr"></i>&#8377;'.$data['price'].'/- </span></p>
			</td>

			<td style="float: left;"><p style="margin-top: 0px;
			letter-spacing: 1px;padding-left: 32px;color: #3cb54a;font-size: 18px;margin-bottom: 0px;"><span style="padding-left: 20px;color: black">';
			if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){$message .='Plot Area'.' '.$data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){$message .='Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else{$message .='Super Built Area'.' '.$data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}
			$message .='</span></p> 
			</td>
			</tr>

			<tr style="    border-bottom: 2px solid red !important;">
			<td style="float: left;"><p style="padding-left: 27px;font-size:18px;color:black;">Category:<span>'.$cat_name['cat_name'].'</span></p></td>
			</tr>

			</tbody>';
			
			

			$requirementDealer=$common->getDealerInfobyId($data['dealer_id']);

			$torequirementDealer=$requirementDealer['dealer_email'];

			$subject1='1'." Property Matched";

			$common->mail($subject1,$message4,$torequirementDealer);

			$msg=urlencode('1'." Property Matched");

			$common->smsApi($msg,$requirementDealer['dealer_phone']);
			// var_dump($data);
			// $property_id=$data['property_id'];
			// $property_for=$data['property_for'];

		}
		$message .='<tfoot style="width: 100%;">
		<tr>
		<td style="margin-left: 30px;margin-top: 17px;display: block;"><a style="background-color: #3cb54a;color:#ffffff;font-size: 24px;padding: 0px 24px;border: none;border-radius: 5px;text-transform: capitalize;" href="http://yards360.com/getrequirement.php?property_id='.base64_encode($property_id).'&&property_for='.base64_encode($property_for1).'">View Matched Properties</a>

		</td>
		<td style="float:left;"><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;">Your Trusted Partner,<a href="http://yards360.com" style="padding-left: 15px;color:#1155cc">yards360.com</a></p></td>
		</tr>

		<tr style="display: block;"><td><h3 style="margin-top: 0px;margin-bottom: 0px;">We would love to hear from you,</h3></td></tr>
		<tr style="display: block;"><td><p style="color: black;letter-spacing: 1px;font-size: 15px;padding-left: 0px;margin-top: 6px;">Call at 9999077365</p></tr>
		</tfoot>

		</table>
		</body> 
		</html>';

// echo $message;
		$common->mail($subject,$message,$from);

		$msg1=urlencode(count($search)."Property Matched From Your Requirement");

		$common->smsApi($msg1,$_SESSION['dealer_phone']);

		

		return 1;

	}else{

		return 1;

	}

	

}



?>
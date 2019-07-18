<?php 
include_once'Object.php';
session_start();
if(isset($_POST['resi_cat_id'])){
	$resi_cat_id=$_POST['resi_cat_id'];
	$property_option='0';
	$result=$common->residentialsubCategory($resi_cat_id);
	 // var_dump($result);
	if(!empty($result)){

		echo '<div class="row 1">';
		echo '<div class="col-sm-2">';
		echo '<div class="typeheading">';
		echo '<p>'.'Subcategory Name'.'</p>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-sm-4">';
		echo '<div class="drop-html1">';
		echo '<div class="dropdown">';
		echo '<select onchange=child_sub_cat(this.value)>';
		echo '<option value="">'.'--select--'.'</option>';
		foreach($result as $data){
			echo '<option value="'.$data['subcat_id'].'">'.$data['subcat_name'].'</option>';
		}
		echo '</select>';
		echo '</div>';
		echo '</div>';
		echo '</div>'; 
		echo '</div>'; 

	}else{

		$data=$common->property_option($resi_cat_id);
		if(!empty($data)){
			echo '<p class="price-heading">'.'PLOT AREA'.'</p>';
			foreach($data as $data1){
				$value=explode(',',$data1['values']);
				if($data1['selection_type']==1){
					echo '<div class="row">';
					echo '<div class="col-sm-2">';
					echo '<div class="typeheading">';
					echo '<p>'.$data1['subchild_name'].'</p>';
					echo '</div>';
					echo '</div>';
					echo '<div class="col-sm-2">';
					echo '<div class="drop-html1">';
					echo '<div class="dropdown">';
					echo '<select name="'.$data1['subchild_name'].'">';
					echo '<option value="">'.'--select--'.'</option>';
					foreach($value as $v){
						echo '<option value="'.$v.'">'.$v.'</option>';
					}
					echo '</select>';
					echo '</div>';
					echo '</div>';
					echo '</div>'; 
					echo '</div>'; 
				}else if($data1['selection_type']==2){

				}else if($data1['selection_type']==3){
					echo '<div class="row">';
					echo '<div class="col-sm-2">';
					echo '<div class="typeheading">';
					echo '<p>'.$data1['subchild_name'].'</p>';
					echo '</div>';
					echo '</div>';
					echo '<div class="col-sm-8">';
					echo '<div class="drop-html1">';
					echo '<div class="dropdown ck">';
					foreach($value as $v){
						echo '<input type="checkbox" name="'.$data1['subchild_name'].'[]'.'" value="'.$v.'">'.$v.'';
					}
					echo '</div>';
					echo '</div>';
					echo '</div>';
					echo '</div>'; 

				}else if($data1['selection_type']==4){
					//echo '<p class="price-heading">'.'PLOT AREA'.'</p>';

					echo '<div class="row ">';
					echo '<div class="col-sm-2">';
					echo '<div class="typeheading">';
					echo '<p>'.$data1['subchild_name'].'</p>';
					echo '</div>';
					echo '</div>';
					echo '<div class="col-sm-3 ">';
					echo '<input type="text" name="'.$data1['subchild_name'].'" placeholder="Plot Area" class="ginputfield" id="plot_area" value="">';
					echo '</div>';
					echo '<div class="col-sm-4 ">';
					echo '<div class="drop-html1">';
					echo '<div class="dropdown">';
					echo '<select name="'.$data1['subchild_name'].'_'.'Unit'.'">';
					echo '<option value="">'.'--select--'.'</option>';
					foreach($value as $v){
						echo '<option value="'.$v.'">'.$v.'</option>';
					}
					echo '</select>';
					echo '</div>';
					echo '</div>';
					echo '</div>'; 
					echo '</div">';
					echo '</div>'; 
				}else{

				}
			}
		}else{

		}
		
	}
	
}

if(isset($_POST['comm_cat_id'])){
	$comm_cat_id=$_POST['comm_cat_id'];
	$property_option='0';
	$result=$common->commercialsubCategory($comm_cat_id);
	 // var_dump($result);die;
	
	if(!empty($result)){
		
		echo '<div class="row">';
		echo '<div class="col-sm-2">';
		echo '<div class="typeheading">';
		echo '<p>'.'Subcategory Name'.'</p>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-sm-4">';
		echo '<div class="drop-html1">';
		echo '<div class="dropdown">';
		echo '<select onchange=child_sub_cat(this.value)>';
		echo '<option >'.'--select--'.'</option>';
		foreach($result as $data){
			echo '<option value="'.$data['subcat_id'].'">'.$data['subcat_name'].'</option>';
		}
		echo '</select>';
		echo '</div>';
		echo '</div>';
		echo '</div>'; 
		echo '</div>';

	}else{
		$data=$common->property_option($comm_cat_id);
		if(!empty($data)){
			foreach($data as $data1){
				$value=explode(',',$data1['values']);
				if($data1['selection_type']==1){
					
					echo '<div class="apprtmnt">';
					echo '<div class="typeheading">';
					echo '<p>'.$data1['subchild_name'].'</p>';
					echo '</div>';

					echo '<div class="drop-html1">';
					echo '<div class="dropdown">';
					echo '<select name="'.$data1['subchild_name'].'">';
					echo '<option value="">'.'--select--'.'</option>';
					foreach($value as $v){
						echo '<option value="'.$v.'">'.$v.'</option>';
					}
					echo '</select>';
					echo '</div>';

					echo '</div>';
					echo '</div>'; 
				}else if($data1['selection_type']==2){

				}else if($data1['selection_type']==3){
					echo '<div class="apprtmnt">';
					echo '<div class="typeheading">';
					echo '<p>'.$data1['subchild_name'].'</p>';
					echo '</div>';
					echo '<div class="drop-html1">';
					echo '<div class="dropdown">';
					foreach($value as $v){
						echo '<input type="checkbox" name="'.$data1['subchild_name'].'[]'.'" value="'.$v.'">'.$v.'<br>';
					}
					echo '</div>';
					echo '</div>';
					echo '</div>'; 

				}else if($data1['selection_type']==4){
					echo '<div class="apprtmnt">';
					echo '<div class="typeheading">';
					echo '<p>'.$data1['subchild_name'].'</p>';
					echo '</div>';
					echo '<input type="text" name="'.$data1['subchild_name'].'" placeholder="Plot Area" class="ginputfield" id="plot_area" value="">';
					echo '<div class="drop-html1">';
					echo '<div class="dropdown">';
					echo '<select name="'.$data1['subchild_name'].'_'.'Unit'.'">';
					echo '<option value="">'.'--select--'.'</option>';
					foreach($value as $v){
						echo '<option value="'.$v.'">'.$v.'</option>';
					}
					echo '</select>';
					echo '</div>';
					echo '</div>';
					echo '</div>'; 
				}else{

				}
			}
		}else{

		}
	}
	
}

if(isset($_POST['subcat_id'])){
	$subcat_id=$_POST['subcat_id'];
	$property_option='0';
	$property_type=$_POST['p_for'];
	  // var_dump($_POST);
	$result=$common->childsubCategory($subcat_id,$property_option,$property_type);
	   // var_dump($result);die;
	if(!empty($result)){
		// $data=$common->property_option($resi_cat_id);
		foreach($result as $data1){
			$value=explode(',',$data1['values']);
			if($data1['selection_type']==1){
				echo '<div class="row">';
				echo '<div class="col-sm-2">';
				echo '<div class="typeheading">';
				echo '<p>'.$data1['subchild_name'].'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-4">';
				echo '<div class="drop-html1">';
				echo '<div class="dropdown">';
				echo '<select name="'.$data1['subchild_name'].'">';
				echo '<option value="">'.'--select--'.'</option>';
				foreach($value as $v){
					echo '<option value="'.$v.'">'.$v.'</option>';
				}
				echo '</select>';
				echo '</div>';
				echo '</div>';
				echo '</div>';
				echo '</div>';

			}else if($data1['selection_type']==2){

			}else if($data1['selection_type']==3){

				echo '<div class="row">';
				echo '<div class="col-sm-2">';
				echo '<div class="typeheading">';
				echo '<p>'.$data1['subchild_name'].'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-8 ">';
				echo '<div class="drop-html1">';
				echo '<div class="dropdown ck">';
				foreach($value as $v){
					echo '<input type="checkbox" name="'.$data1['subchild_name'].'[]'.'" value="'.$v.'">'.$v.'';
				}
				echo '</div>';
				echo '</div>';
				echo '</div>'; 
				echo '</div>'; 
			}else if($data1['selection_type']==4){
				echo '<div class="row lfpd">';
				echo '<div class="col-sm-2">';
				echo '<div class="typeheading">';
				echo '<p>'.$data1['subchild_name'].'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-3">';
				echo '<input type="text" name="'.$data1['subchild_name'].'" placeholder="Plot Area" class="ginputfield" id="plot_area" value="">';
				echo '</div>';
				echo '<div class="col-sm-4">';
				echo '<div class="drop-html1">';
				echo '<div class="dropdown">';
				echo '<select name="'.$data1['subchild_name'].'_'.'Unit'.'">';
				echo '<option value="">'.'--select--'.'</option>';
				foreach($value as $v){
					echo '<option value="'.$v.'">'.$v.'</option>';
				}
				echo '</select>';
				echo '</div>';
				echo '</div>';
				echo '</div>'; 
				echo '</div>'; 
			}else{
				
			}
		}
	}
	
}


if(isset($_POST['subchildcat_id'])){
	$subchildcat_id=$_POST['subchildcat_id'];
	$result=$common->propertytypesize($subchildcat_id);
	   // var_dump($result);die;
	
	if(!empty($result)){
		echo '<select onchange=select_size(this.value)>';
		echo '<option value="">'.'--select--'.'</option>';
		foreach($result as $data){
			echo '<option value="'.$data['size'].'">'.$data['size'].'</option>';
		}
		echo '</select>';
	}else{

	}
	
}



if(isset($_POST['submit_requirement'])){
	  // var_dump($_POST);die;
	$date=date('Y-m-d H:i:s');
	$expiry=date('Y-m-d H:i:s', strtotime($date. ' + 30 days'));
	$table='properties';
	$property_code=rand(00000000,99999999);
	$data=array('property_code'=>$property_code,'dealer_id'=>'1','property_name'=>$_POST['property_name'],'property_for'=>$_POST['property_for'],'property_type'=>'1','cat_id'=>$_POST['category_id'],'subcat_id'=>$_POST['subcat_id1'],'subchildcat_id'=>$_POST['child_id'],'city'=>$_POST['city'],'sector'=>$_POST['sector'],'landmark'=>$_POST['landmark'],'address'=>$_POST['address'],'construction_status'=>$_POST['constructon_status'],'price'=>$_POST['price'],'price_unit'=>$_POST['price_unit'],'plot_area'=>$_POST['plot_area'],'plot_size_area'=>$_POST['plot_size_area'],'status'=>2,'expired_by'=>$expiry);
	// var_dump($data);
	$result=$common->insert($table, $data);
	
}

if(isset($_POST['edit_submit'])){
	 // var_dump($_POST);die;
	$property_id=$_POST['property_id1'];
	// $aa=$_POST['plot_area'].$_POST['plot_size_area']
	$tablename='residential_properties';
	$data=array('property_name'=>$_POST['property_name'],'property_for'=>$_POST['property_for'],'city'=>$_POST['city'],'sector'=>$_POST['sector'],'landmark'=>$_POST['landmark'],'address'=>$_POST['address'],'construction_status'=>$_POST['constructon_status'],'price'=>$_POST['price'],'price_unit'=>$_POST['price_unit'],'plot_area'=>$_POST['plot_area'],'plot_size_area'=>$_POST['plot_size_area'],'status'=>$_POST['status']);
	// var_dump($data);
	$condition=array('property_id'=>$property_id);
	$result=$common->update($tablename,$data,$condition);
	
}


// Delete property code
if(isset($_POST['property_id'])){
	$property_id=$_POST['property_id'];
	$result=$common->deleteproperty($property_id);
	if($result==1){
		echo '1';
	}
}

/*Delete a Property From Commercial*/
if(isset($_POST['property_id_comm'])){
	$property_id=$_POST['property_id_comm'];
	$result=$common->deletePropertyComm($property_id);
	if($result==1){
		echo '1';
	}
}

/*Close Delete Property Commercial*/


/*Fav a Requirement Property By dealer*/
if(isset($_POST['fav_property'])){
	$property_id=$_POST['req_property_id'];
	$dealer_id=$_POST['dealer_id'];
	$result=$common->addFavRequirement($property_id,$dealer_id);
	if($result==1){
		echo '1';
	}
}


/*Close fav requirement Property By Dealer*/

/*Unfav a Requirement Property by Dealer*/

if(isset($_POST['unfav_property'])){
	$property_id=$_POST['req_property_id'];
	$dealer_id=$_POST['dealer_id'];
	$result=$common->delFavRequirement($property_id,$dealer_id);
	if($result==1){
		echo '1';
	}
}


/*Close Unfav Requirement Property by Dealer*/



if(isset($_POST['search_buy'])){
	     // var_dump($_POST);die;
	//var_dump($_SESSION);die;
	$result2=$common->searchresultbuy($_POST,$_SESSION['dealer_id']);
	     // var_dump($result2);

	$dealerinfo=$common->getDealerInfobyId($_SESSION['dealer_id']);
	if(!empty($result2)){
		$count=count($result2);
		echo '<div class="alert alert-success">';
		echo '<strong>'.'Success!'.'</strong>'.$count.'Results Founds'.'</a>';
		echo '</div>';
		foreach($result2 as $data2){
			$a=$common->addViews($_SESSION['dealer_id'],$data2['property_id']);
			$cat_name=$common->getCategoryName($data2['cat_id']);
			$getResponse=$common->getResponseTrackDetail($_SESSION['dealer_id'],$data2['property_id']);
			
			$propdealinfo=$common->getDealerInfobyId($data2['dealer_id']);
			// $count=count($getResponse);
			// var_dump($propdealinfo);die;
			echo '<input type="hidden" id="phone_no" value="'.$propdealinfo['dealer_phone'].'">';
			echo '<input type="hidden" id="fname" value="'.$propdealinfo['dealer_first_name'].'">';
			echo '<input type="hidden" id="lname" value="'.$propdealinfo['dealer_last_name'].'">';
			echo '<input type="hidden" id="firm_name" value="'.$propdealinfo['dealer_firm_name'].'">';
			echo '<input type="hidden" id="dealer_email" value="'.$propdealinfo['dealer_email'].'">';
			echo '<div class="godrejdiv">';
			echo '<h4>';
			if($data2['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color:red;"><?php echo $cat_name['cat_name'];?></span>&nbsp;For&nbsp;<?php echo $data2['sector'].' '.$data2['city'];
			echo '</h4>';
			echo '<div class="serach_extrabtn">';
			echo '<button onclick="interest(this.value)" value='.$data2['property_id'].'>'.'Interested'.'</button>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4">';
			echo '<div class="proprtydiv">';
			echo '<input type="hidden" id="prop_for" value='.$data2['property_for'].'>';
			echo '<p>'.'<span>'.'ID:-'.''.$data2['property_code'].'</span>'.'</p>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="sqrftdiv">';
			echo '<h4>';
			echo 'Plot area';
			echo '&nbsp';
			if(!empty($data2['Plot_Area'] && $data2['Plot_Area_Unit'])){echo $data2['Plot_Area'].' '.$data2['Plot_Area_Unit'];}else if(!empty($data2['Super_Built_Up_Area'] && $data2['Super_Built_Up_Area_Unit'])){echo $data2['Super_Built_Up_Area'].' '.$data2['Super_Built_Up_Area_Unit'];}else if(!empty($data2['Carpet_Area'] && $data2['Carpet_Area_Unit'])){echo $data2['Carpet_Area'].' '.$data2['Carpet_Area_Unit'];}else{}
			echo '</h4>';
			echo '<h4>';
			if($data2['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data2['Bedroom'].'BHK'.'</span>'.'</p>';}
			echo '</h4>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="bhkdiv">';
			echo '<button class="mailbtn">';
			echo '<i class="fa fa-envelope-o" aria-hidden="true">';
			echo '</i>';
			if($getResponse['mail']==1){
				echo '<a href="mailto:'.$propdealinfo['dealer_email'].'" id='.$data2['property_id'].' style="background:red;">'.'MAIL'.'</a>';
			}else{
				echo '<a href="mailto:'.$propdealinfo['dealer_email'].'" onclick="mail(this.id)" id='.$data2['property_id'].'>'.'MAIL'.'</a>';
			}
			
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4">';
			echo '<div class="residntlapartdiv">';
			echo '<h5>'.'Price'.'<i class="fa fa-inr"></i>'.'<span>'.number_format($data2['price']).'/-'.'</span>'.'</h5>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="bhkdiv">';
			echo '<button class="whtsapbtn">';
			echo '<i class="fa fa-whatsapp" aria-hidden="true">';
			echo '</i>';
			if($getResponse['whatsapp']==1){
				echo '<a target="_blank" href="https://wa.me/'.$propdealinfo['dealer_phone'].'" id='.$data2['property_id'].' >'.'WHATSAPP'.'</a>';
			}else{
				echo '<a target="_blank" href="https://wa.me/'.$propdealinfo['dealer_phone'].'" onclick="whatsapp(this.id)" id='.$data2['property_id'].'>'.'WHATSAPP'.'</a>';
			}
			
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4">';
			echo '<div class="postdondiv">';
			echo '<h6>';
			echo 'posted on';
			echo  date('d M Y',strtotime($data2['posted_by']));
			echo 'by';
			echo '<span>';
			echo '(Dealer)';
			echo '</span>';
			echo '</h6>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="callbtndiv">';
			echo '<button class="callbtn">';
			echo '<i class="fa fa-phone" aria-hidden="true">';
			echo '</i>';
			if($getResponse['call_to_user']==1){
				echo '<span id='.$data2['property_id'].' onclick="show_call()" >'.'CALL'.'</span>';
			}else{
				echo '<span id='.$data2['property_id'].' onclick="call_to(this.id)">'.'CALL'.'</span>';
			}
			
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}else{
		echo '<div class="alert alert-danger">';
		echo '<strong>'.'OOPS!'.'</strong>'.'No Results Founds'.'</a>';
		echo '</div>';
	}
}

if(isset($_POST['search_rent'])){
	     // var_dump($_POST);die;
	//var_dump($_SESSION);die;
	$result2=$common->searchresultrent($_POST,$_SESSION['dealer_id']);
	     // var_dump($result2);

	$dealerinfo=$common->getDealerInfobyId($_SESSION['dealer_id']);
	if(!empty($result2)){
		$count=count($result2);
		echo '<div class="alert alert-success">';
		echo '<strong>'.'Success!'.'</strong>'.$count.'Results Founds'.'</a>';
		echo '</div>';
		foreach($result2 as $data2){
			$a=$common->addViews($_SESSION['dealer_id'],$data2['property_id']);
			$cat_name=$common->getCategoryName($data2['cat_id']);
			$getResponse=$common->getResponseTrackDetail($_SESSION['dealer_id'],$data2['property_id']);
			
			$propdealinfo=$common->getDealerInfobyId($data2['dealer_id']);
			// $count=count($getResponse);
			// var_dump($propdealinfo);die;
			echo '<input type="hidden" id="phone_no" value="'.$propdealinfo['dealer_phone'].'">';
			echo '<input type="hidden" id="fname" value="'.$propdealinfo['dealer_first_name'].'">';
			echo '<input type="hidden" id="lname" value="'.$propdealinfo['dealer_last_name'].'">';
			echo '<input type="hidden" id="firm_name" value="'.$propdealinfo['dealer_firm_name'].'">';
			echo '<input type="hidden" id="dealer_email" value="'.$propdealinfo['dealer_email'].'">';
			echo '<div class="godrejdiv">';
			echo '<h4>';
			if($data2['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color:red;"><?php echo $cat_name['cat_name'];?></span>&nbsp;For&nbsp;<?php echo $data2['sector'].' '.$data2['city'];
			echo '</h4>';
			echo '<div class="serach_extrabtn">';
			echo '<button onclick="interest(this.value)" value='.$data2['property_id'].'>'.'Interested'.'</button>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4">';
			echo '<div class="proprtydiv">';
			echo '<input type="hidden" id="prop_for" value='.$data2['property_for'].'>';
			echo '<p>'.'<span>'.'ID:-'.''.$data2['property_code'].'</span>'.'</p>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="sqrftdiv">';
			echo '<h4>';
			echo 'Plot area';
			echo '&nbsp';
			if(!empty($data2['Plot_Area'] && $data2['Plot_Area_Unit'])){echo $data2['Plot_Area'].' '.$data2['Plot_Area_Unit'];}else if(!empty($data2['Super_Built_Up_Area'] && $data2['Super_Built_Up_Area_Unit'])){echo $data2['Super_Built_Up_Area'].' '.$data2['Super_Built_Up_Area_Unit'];}else if(!empty($data2['Carpet_Area'] && $data2['Carpet_Area_Unit'])){echo $data2['Carpet_Area'].' '.$data2['Carpet_Area_Unit'];}else{}
			echo '</h4>';
			echo '<h4>';
			if($data2['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data2['Bedroom'].'BHK'.'</span>'.'</p>';}
			echo '</h4>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="bhkdiv">';
			echo '<button class="mailbtn">';
			echo '<i class="fa fa-envelope-o" aria-hidden="true">';
			echo '</i>';
			if($getResponse['mail']==1){
				echo '<a href="mailto:'.$propdealinfo['dealer_email'].'" id='.$data2['property_id'].' style="background:red;">'.'MAIL'.'</a>';
			}else{
				echo '<a href="mailto:'.$propdealinfo['dealer_email'].'" onclick="mail(this.id)" id='.$data2['property_id'].'>'.'MAIL'.'</a>';
			}
			
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4">';
			echo '<div class="residntlapartdiv">';
			echo '<h5>'.'Price'.'<i class="fa fa-inr"></i>'.'<span>'.number_format($data2['price']).'/-'.'</span>'.'</h5>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="bhkdiv">';
			echo '<button class="whtsapbtn">';
			echo '<i class="fa fa-whatsapp" aria-hidden="true">';
			echo '</i>';
			if($getResponse['whatsapp']==1){
				echo '<a target="_blank" href="https://wa.me/'.$propdealinfo['dealer_phone'].'" id='.$data2['property_id'].' >'.'WHATSAPP'.'</a>';
			}else{
				echo '<a target="_blank" href="https://wa.me/'.$propdealinfo['dealer_phone'].'" onclick="whatsapp(this.id)" id='.$data2['property_id'].'>'.'WHATSAPP'.'</a>';
			}
			
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4">';
			echo '<div class="postdondiv">';
			echo '<h6>';
			echo 'posted on';
			echo  date('d M Y',strtotime($data2['posted_by']));
			echo 'by';
			echo '<span>';
			echo '(Dealer)';
			echo '</span>';
			echo '</h6>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '</div>';
			echo '<div class="col-sm-4">';
			echo '<div class="callbtndiv">';
			echo '<button class="callbtn">';
			echo '<i class="fa fa-phone" aria-hidden="true">';
			echo '</i>';
			if($getResponse['call_to_user']==1){
				echo '<span id='.$data2['property_id'].' onclick="show_call()" >'.'CALL'.'</span>';
			}else{
				echo '<span id='.$data2['property_id'].' onclick="call_to(this.id)">'.'CALL'.'</span>';
			}
			
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}else{
		echo '<div class="alert alert-danger">';
		echo '<strong>'.'OOPS!'.'</strong>'.'No Results Founds'.'</a>';
		echo '</div>';
	}
}
?>
<?php 
if(isset($_POST['social_track'])){
	$track=$_POST['social_track'];
	$dealer_id=$_POST['dealer_id'];
	$property_id=$_POST['id'];
	$table='response_tracker';
	$date=date('Y-m-d H:i:s');
	$res=$common->getResponseTrack($dealer_id,$property_id);
	if($res==0){
		switch ($track) {
			case '1':
			$data=array('dealer_id'=>$dealer_id,'property_id'=>$property_id,'mail'=>0,'whatsapp'=>1,'call_to_user'=>0,'created_at'=>$date);
			break;
			case '2':
			$data=array('dealer_id'=>$dealer_id,'property_id'=>$property_id,'mail'=>0,'whatsapp'=>0,'call_to_user'=>1,'created_at'=>$date);
			break;
			case '3':
			$data=array('dealer_id'=>$dealer_id,'property_id'=>$property_id,'mail'=>1,'whatsapp'=>0,'call_to_user'=>0,'created_at'=>$date);
			break;
		}

		$common->insert($table,$data);
	}else{
		$condition=array('dealer_id'=>$dealer_id,'property_id'=>$property_id);
		// var_dump($condition);
		$common->responseSocial($table,$dealer_id,$property_id,$track);
	}

}


if(isset($_POST['automated_mail'])){
	// var_dump($_POST);
	$property_info=$common->getpropertybyid($_POST['propertyid'],$_POST['propertyfor']);
	$dealerinfo=$common->getDealerInfobyId($property_info['dealer_id']);
	$contact_person=$common->getDealerInfobyId($_SESSION['dealer_id']);
	 // var_dump($property_info);
	 // var_dump($dealerinfo);
	 // var_dump($_POST);die;
	$from = $dealerinfo['dealer_email'];
	$subject = 'Interested People Mailed you';
	$message = '<html>
	<body>
	<h3>Dear '.$dealerinfo['dealer_first_name'].'</h3>
	<p>Greetings! Hope you are having a good day.</p>
	<p>Property Details</p>
	<p>Properyty Code:- '.$property_info['property_code'].'</p>
	<p>City:- '.$property_info['city'].'</p>
	<p>Area/Sector:- '.$property_info['sector'].'</p>
	<p>Price:- '.number_format($property_info['price']).'</p>
	<h2>Contact Details</h2>
	<p>Person Name:- '.$contact_person['dealer_first_name'].' '.$contact_person['dealer_last_name'].'</p>
	<p>Email:- '.$contact_person['dealer_email'].'</p>
	<p>Contact No:- '.$contact_person['dealer_phone'].'</p>
	<p>Firm Name:- '.$contact_person['dealer_firm_name'].'</p>
	<p>Thanks</p>
	<p>Property App Team</p>
	</body>
	</html>
	';
	echo $result= $common->mail($subject,$message,$from);

}
?>

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
    labelSize: "14px",
    // size of color
    color: "#000000!important",

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
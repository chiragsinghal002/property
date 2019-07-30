<?php 
include_once'Object.php';

if(isset($_POST['resi_cat_id'])){
	$resi_cat_id=$_POST['resi_cat_id'];
	$property_option='1';
	$result=$common->residentialsubCategory($resi_cat_id);
	 // var_dump($result);
	if(!empty($result)){
		echo '<div class="row">';
		echo '<div class="col-sm-2 col-xs-6">';
		echo '<div class="typeheading">';
		echo '<p>'.'Subcategory Name'.'</p>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-sm-4 col-xs-6">';
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
		$data=$common->property_option_for_requirement($resi_cat_id);

		if(!empty($data)){
			foreach($data as $data1){
			$value=explode(',',$data1['values']);
			if($data1['selection_type']==1){
				echo '<div class="row">';
				echo '<div class="col-sm-2 col-xs-6">';
				echo '<div class="typeheading">';
				echo '<p>'.$data1['subchild_name'].'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-4 col-xs-6">';
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
				echo '<div class="apprtmnt c">';
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
				echo '<div class="row">';
				echo '<div class="col-sm-2 col-xs-6">';
				echo '<div class="typeheading">';
				echo '<p>'.$data1['subchild_name'].'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-4 col-xs-6">';
				echo '<input type="text" name="'.$data1['subchild_name'].'" placeholder="Plot Area" class="ginputfield" id="plot_area" value="">';
				echo '</div>';
				echo '<div class="col-sm-4 col-xs-6">';
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
		}else{

		}
		
	}
	
}

if(isset($_POST['comm_cat_id'])){
	$comm_cat_id=$_POST['comm_cat_id'];
	$property_option='1';
	$result=$common->commercialsubCategory($comm_cat_id);
	 // var_dump($result);die;
	
	if(!empty($result)){
		echo '<div class="row">';
		echo '<div class="col-sm-2 col-xs-6">';
		echo '<div class="typeheading">';
		echo '<p>'.'Subcategory Name'.'</p>';
		echo '</div>';
		echo '</div>';
		echo '<div class="col-sm-4 col-xs-6">';
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
		$data=$common->property_option_for_requirement($comm_cat_id);
		if(!empty($data)){
			foreach($data as $data1){
			$value=explode(',',$data1['values']);
			if($data1['selection_type']==1){
				echo '<div class="apprtmnt f">';
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
				echo '<div class="apprtmnt g">';
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
				echo '<div class="apprtmnt h">';
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
	$property_option='1';
	$property_type=$_POST['p_for'];
	$result=$common->childsubCategory_requirement($subcat_id,$property_option,$property_type);
	 // var_dump($result);die;
	if(!empty($result)){
		// $data=$common->property_option_for_requirement($resi_cat_id);
		foreach($result as $data1){
			$value=explode(',',$data1['values']);
			if($data1['selection_type']==1){
				echo '<div class="row">';
				echo '<div class="col-sm-2 col-xs-6">';
				echo '<div class="typeheading">';
				echo '<p>'.$data1['subchild_name'].'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-4 col-xs-6">';
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
				echo '<div class="apprtmnt k">';
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
				echo '<div class="row">';
				echo '<div class="col-sm-2 col-xs-6">';
				echo '<div class="typeheading">';
				echo '<p>'.$data1['subchild_name'].'</p>';
				echo '</div>';
				echo '</div>';
				echo '<div class="col-sm-4 col-xs-6">';
				echo '<input type="text" name="'.$data1['subchild_name'].'" placeholder="Plot Area" class="ginputfield" id="plot_area" value="">';
				echo '</div>';
				echo '<div class="col-sm-4 col-xs-6">';
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


if(isset($_POST['search_buy'])){
	    // var_dump($_POST);die;
	$result2=$common->searchresultbuy($_POST);
	 // var_dump($result2);die;
	if(!empty($result2)){
		foreach($result2 as $data2){
			echo '<div class="godrejdiv">';
			echo '<h4>'.$data2['property_name'].'</h4>';
			echo '<div class="row">';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="proprtydiv">';
			echo '<h5>'.'Property Id:'.$data2['property_code'].'</h5>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="sqrftdiv">';
			echo '<h4>'.$data2['plot_area'].''.$data2['plot_size_area'].'</h4>';
			echo '<h4>'.$data2['Bedroom'].' '.'BHK'.'</h4>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="bhkdiv">';
			echo '<button class="mailbtn">';
			echo '<i class="fa fa-envelope-o" aria-hidden="true">';
			echo '</i>';
			echo '<span>'.'MAIL'.'</span>';
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="residntlapartdiv">';
			echo '<h5>'.$data2['property_name'].'</h5>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="bhkdiv">';
			echo '<button class="whtsapbtn">';
			echo '<i class="fa fa-whatsapp" aria-hidden="true">';
			echo '</i>';
			echo '<span>'.'WHATSAPP'.'</span>';
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4 col-xs-6">';
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
			echo '<div class="col-sm-4 col-xs-6">';
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="callbtndiv">';
			echo '<button class="callbtn">';
			echo '<i class="fa fa-phone" aria-hidden="true">';
			echo '</i>';
			echo '<span>'.'CALL'.'</span>';
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}else{
		echo 'result not found';
	}
}

if(isset($_POST['search_rent'])){
	// var_dump($_POST);
	$result2=$common->searchresultrent($_POST);
	
	if(!empty($result2)){
		foreach($result2 as $data2){
			echo '<div class="godrejdiv">';
			echo '<h4>'.$data2['property_name'].'</h4>';
			echo '<div class="row">';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="proprtydiv">';
			echo '<h5>'.'Property Id:'.$data2['property_code'].'</h5>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="sqrftdiv">';
			echo '<h4>'.$data2['plot_area'].''.$data2['plot_size_area'].'</h4>';
			echo '<h4>'.$data2['Bedroom'].' '.'BHK'.'</h4>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="bhkdiv">';
			echo '<button class="mailbtn">';
			echo '<i class="fa fa-envelope-o" aria-hidden="true">';
			echo '</i>';
			echo '<span>'.'MAIL'.'</span>';
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="residntlapartdiv">';
			echo '<h5>'.$data2['property_name'].'</h5>';
			echo '</div>'; 
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="bhkdiv">';
			echo '<button class="whtsapbtn">';
			echo '<i class="fa fa-whatsapp" aria-hidden="true">';
			echo '</i>';
			echo '<span>'.'WHATSAPP'.'</span>';
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '<div class="row">';
			echo '<div class="col-sm-4 col-xs-6">';
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
			echo '<div class="col-sm-4 col-xs-6">';
			echo '</div>';
			echo '<div class="col-sm-4 col-xs-6">';
			echo '<div class="callbtndiv">';
			echo '<button class="callbtn">';
			echo '<i class="fa fa-phone" aria-hidden="true">';
			echo '</i>';
			echo '<span>'.'CALL'.'</span>';
			echo '</button>';
			echo '</div>'; 
			echo '</div>';
			echo '</div>';
			echo '</div>';
		}
	}else{
		echo 'result not found';
	}
}
?>
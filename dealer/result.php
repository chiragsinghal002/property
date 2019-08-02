<?php 
include_once'include/header.php';
include_once'include/sidebar.php';?>

<div class="buyrentdiv">  
<?php if($showdetailDealer['email_verified']!=='1'){ ?>
      <?php include("include/verified.php"); ?>
      <?php } ?>


 <div class="resulttopbtn" style="background: #17e22f;color: white;font: menu;">

  <h3>All Properties</h3>

 </div><br><br>

  <!-- Active & Delete buttons -->

  <div class="resulttopbtn">

   <button id="all" onclick="change_div(this.id);">All</button>

   <button id="active" onclick="change_div(this.id);">Active</button>

   <button id="expired" onclick="change_div(this.id);">Expired</button>

 </div>


 <!-- Active Properties div Only -->
 <div id="active_properties">
  <?php 
  // include_once'Object.php';
// session_start();
  $type='Active';
  $properties=$common->getdealerproperty($_SESSION['dealer_id'],$type);
  $comm_properties=$common->getDealerCommProperty($_SESSION['dealer_id'],$type);
    // var_dump($comm_properties);
  if(!empty($properties)){
    $prop=count($properties);
  }else{
    $prop=0;
  }

  if(!empty($comm_properties)){
    $comm_prop=count($comm_properties);
  }else{
    $comm_prop=0;
  }
  $total_pro=$prop+$comm_prop;
  ?>
  <div class="resultactiveprdcts">
    <p><?php echo $total_pro;?> Active Properties</p>

  </div>

  <!--  Land For Sale: -->
  <?php if(!empty($properties)){?>
   <?php foreach($properties as $data){?>

    <div class="landforsale">
      <div class="row">
        <div class="col-sm-8">
         <!-- Land for Sale: -->   
         <div class="contentoflandfor">
           <h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;In&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
           <p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['price']).'/-';?></span></p>    
          <p><?php if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo 'Plot Area'.' '.$data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo 'Super Built Area'.' '.$data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else{}?></p>
           <?php if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}?>   
           
         </div>
         <!-- Active and Posted On -->         
         <div class="expireon">
           <p><?php echo $data['property_code'];?><span>Active</span></p>
           <p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
         </div>

         <!-- Expire On -->  
         <?php $viewResult=$common->getViewfromUnique($data['property_id']);
         if(!empty($viewResult)){
          $countViews=count($viewResult);
         }else{
          $countViews=0;
         }
          
         ?>
         <div class="extnddurtion">
          <p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by'])).', ';?> <span><?php echo $countViews.' '.'Views'.', ';?></span>
             <?php if(!empty($propertyMatched)):?>
              <a href="buy_matched.php?property_id=<?php echo base64_encode($data['property_id']);?>&&property_for=<?php echo base64_encode($data['property_for']);?>"><?php echo count($propertyMatched).' '.'Property Matched';?></a>
            <?php endif;?>
             <?php if(empty($propertyMatched)):?>
              <a href="#"><?php echo '0'.' '.'Property Matched';?></a>
            <?php endif;?>
          </p> 
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
<?php } ?>
<?php } ?>
<!-- For Commercial Properties -->
<?php if(!empty($comm_properties)){?>
 <?php foreach($comm_properties as $data){?>

  <div class="landforsale">
    <div class="row">
      <div class="col-sm-8">
       <!-- Land for Sale: -->   
       <div class="contentoflandfor">
         <h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;In&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
         <p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['Expected_Price']).'/-';?></span></p>    
         

          <p><?php if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo 'Super Area Unit'.' '.$data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else if(!empty($data['Built_Up_Area'] && $data['Built_Up_Area_Unit'])){echo 'Built Area'.' '.$data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}else{}?></p>
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
  $properties=$common->getdealerproperty($_SESSION['dealer_id'],$type);
  $comm_properties=$common->getDealerCommProperty($_SESSION['dealer_id'],$type);
    // var_dump($comm_properties);
  if(!empty($properties)){
    $prop=count($properties);
  }else{
    $prop=0;
  }

  if(!empty($comm_properties)){
    $comm_prop=count($comm_properties);
  }else{
    $comm_prop=0;
  }
  $total_pro=$prop+$comm_prop;
  ?>
  <div class="resultactiveprdcts">
    <p><?php echo $total_pro;?> Active Properties</p>

  </div>

  <!--  Land For Sale: -->
  <?php if(!empty($properties)){?>
   <?php foreach($properties as $data){?>

    <div class="landforsale">
      <div class="row">
        <div class="col-sm-8">
         <!-- Land for Sale: -->   
         <div class="contentoflandfor">
           <h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;In&nbsp;<?php echo $data['sector'].' '.ucfirst($data['city']);?></h4>
           <p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['price']).'/-';?></span></p>    
          <p><?php if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo 'Plot Area'.' '.$data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo 'Super Built Area'.' '.$data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else{}?></p>
           <?php if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}?>   
           
         </div>
         <!-- Active and Posted On -->         
         <div class="expireon">
           <p><?php echo $data['property_code'];?><span>Active</span></p>
           <p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
         </div>

         <!-- Expire On -->  
         <?php $viewResult=$common->getViewfromUnique($data['property_id']);
         if(!empty($viewResult)){
          $countViews=count($viewResult);
         }else{
          $countViews=0;
         }
          
         ?>
         <div class="extnddurtion">
            <?php 
          $property_for=$data['property_for'];
          $property_option='1';
          $propertyMatched=$common->getRequirementFromProperty($data,$property_for,$property_option);
         // var_dump($propertyMatched);
          ?>
          <p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by'])).', ';?> <span><?php echo $countViews.' '.'Views'.', '?></span>
            
                <?php if(!empty($propertyMatched)):?>
              <a href="buy_matched.php?property_id=<?php echo base64_encode($data['property_id']);?>&&property_for=<?php echo base64_encode($data['property_for']);?>"><?php echo count($propertyMatched).' '.'Property Matched';?></a>
            <?php endif;?>
             <?php if(empty($propertyMatched)):?>
              <a href="#"><?php echo '0'.' '.'Property Matched';?></a>
            <?php endif;?>
           
        </p> 
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
         <a href="edit_property.php?id=<?php echo base64_encode($data['property_id']);?>&&prop_for=<?php echo base64_encode($data['property_for']);?>"><button class="edtbtn"><i class="fa fa-edit"></i><span>EDIT</span></button></a> 
       </div>



       <!-- Delete Button -->

       <div class="deletebutton">

        <button class="dtebtn" onclick="del(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                                   

      </div>

    </div>  
  </div>
</div>  
</div>
<?php } ?>
<?php } ?>
<!-- For Commercial Properties -->
<?php if(!empty($comm_properties)){?>
 <?php foreach($comm_properties as $data){?>

  <div class="landforsale">
    <div class="row">
      <div class="col-sm-8">
       <!-- Land for Sale: -->   
       <div class="contentoflandfor">
         <h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;In&nbsp;<?php echo $data['sector'].' '.ucfirst($data['city']);?></h4>
         <p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['Expected_Price']).'/-';?></span></p>    
          <p><?php if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo 'Super Area Unit'.' '.$data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else if(!empty($data['Built_Up_Area'] && $data['Built_Up_Area_Unit'])){echo 'Built Area'.' '.$data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}else{}?></p>
         <?php if($data['Wash_Room']>0){echo '<p>'.'Washroom:'.'<span>'.$data['Wash_Room'].'</span>'.'</p>';}?>   

       </div>
       <!-- Active and Posted On -->         
       <div class="expireon">
         <p><?php echo $data['property_code'];?><span>Active</span></p>
         <p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
       </div>
        <?php $viewResult=$common->getViewfromUnique($data['property_id']);
         if(!empty($viewResult)){
          $countViews=count($viewResult);
         }else{
          $countViews=0;
         }
          
         ?>
       <div class="extnddurtion">
          <?php 
          $property_for=$data['property_for'];
          $property_option='1';
          $propertyMatched=$common->getRequirementFromProperty($data,$property_for,$property_option);
         // var_dump($propertyMatched);
          ?>
        <p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by'])).', ';?> <span><?php echo $countViews.' '.'Views'.', '?></span></p> 
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
  $properties=$common->getdealerproperty($_SESSION['dealer_id'],$type);
  $comm_properties=$common->getDealerCommProperty($_SESSION['dealer_id'],$type);
    // var_dump($comm_properties);
  if(!empty($properties)){
    $prop=count($properties);
  }else{
    $prop=0;
  }

  if(!empty($comm_properties)){
    $comm_prop=count($comm_properties);
  }else{
    $comm_prop=0;
  }
  $total_pro=$prop+$comm_prop;
  ?>
  <div class="resultactiveprdcts">
    <p><?php echo $total_pro;?> Active Properties</p>

  </div>

  <!--  Land For Sale: -->
  <?php if(!empty($properties)){?>
   <?php foreach($properties as $data){?>

    <div class="landforsale">
      <div class="row">
        <div class="col-sm-8">
         <!-- Land for Sale: -->   
         <div class="contentoflandfor">
           <h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;In&nbsp;<?php echo $data['sector'].' '.ucfirst($data['city']);?></h4>
           <p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['price']).'/-';?></span></p>    
          <p><?php if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo 'Plot Area'.' '.$data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo 'Super Built Area'.' '.$data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else{}?></p>
           <?php if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}?>   
           
         </div>
         <!-- Active and Posted On -->         
         <div class="expireon">
           <p><?php echo $data['property_code'];?><span>Active</span></p>
           <p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>
         </div>

         <!-- Expire On -->  
         <?php $viewResult=$common->getViewfromUnique($data['property_id']);
         if(!empty($viewResult)){
          $countViews=count($viewResult);
         }else{
          $countViews=0;
         }
          
         ?>
         <div class="extnddurtion">
          <p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by'])).', ';?> <span><?php echo $countViews.' '.'Views'.', ';?></span></p> 
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
<?php } ?>
<?php } ?>
<!-- For Commercial Properties -->
<?php if(!empty($comm_properties)){?>
 <?php foreach($comm_properties as $data){?>

  <div class="landforsale">
    <div class="row">
      <div class="col-sm-8">
       <!-- Land for Sale: -->   
       <div class="contentoflandfor">
         <h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<span style="color: blue;"><?php if(!empty($data['subcat_name'])){echo $data['subcat_name'];}else{echo $data['cat_name'];}?></span>&nbsp;In&nbsp;<?php echo $data['sector'].' '.ucfirst($data['city']);?></h4>
         <p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['Expected_Price']).'/-';?></span></p>    
         <p><?php if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo 'Super Area Unit'.' '.$data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else if(!empty($data['Built_Up_Area'] && $data['Built_Up_Area_Unit'])){echo 'Built Area'.' '.$data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}else{}?></p>
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
<?php } ?>
<?php } ?>
</div>



<!-- Close Expired Properties Listing Div -->

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

    function change_div(id){
      if(id=='active'){
        $("#active_properties").show();
        $("#expired_properties").hide();
        $("#all_properties").hide();
        $("#all").removeClass('color');
        $("#active").addClass('color');
        $("#expired").removeClass('color');
      }else if(id=='expired'){
       $("#active_properties").hide();
       $("#expired_properties").show();
       $("#all_properties").hide();
       $("#all").removeClass('color');
        $("#active").removeClass('color');
        $("#expired").addClass('color');

     }else{
       $("#active_properties").hide();
       $("#expired_properties").hide();
       $("#all_properties").show();
      $("#all").addClass('color');
        $("#active").removeClass('color');
        $("#expired").removeClass('color');
     }
   }
 </script>

 <script type="text/javascript">
  $(document).ready(function(){
    $("#active_properties").hide();
    $("#expired_properties").hide();
    $("#all_properties").show();
    $("#all").addClass('color');
  }) 
</script>
<style type="text/css">
  .color{
    background-color: #cfcfcf!important;
  }
</style>



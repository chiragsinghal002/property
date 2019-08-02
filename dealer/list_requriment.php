<?php 
include_once'include/header.php';
include_once'include/sidebar.php';?>
<?php 
//session_start();
  // include_once'Object.php';
$properties=$common->getdealerpropertyrequriment($_SESSION['dealer_id']);
   // var_dump($properties);
?>
<div class="buyrentdiv">  
  <?php if($showdetailDealer['email_verified']!=='1'){ ?>
    <?php include("include/verified.php"); ?>
  <?php } ?>




  <!-- Active & Delete buttons -->

  <!-- <div class="resulttopbtn">

   <button style="background: #cfcfcf">All</button>

   <button>Active</button>



   <div class="dropdown">

    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Category

      <span class="caret"></span></button>

      <ul class="dropdown-menu">

        <li><a href="#">HTML</a></li>

        <li><a href="#">CSS</a></li>

        <li><a href="#">JavaScript</a></li>

      </ul>

    </div>



    <div class="dropdown">

      <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">More Filters

        <span class="caret"></span></button>

        <ul class="dropdown-menu">

          <li><a href="#">HTML</a></li>

          <li><a href="#">CSS</a></li>

          <li><a href="#">JavaScript</a></li>

        </ul>

      </div>



    </div> -->







    <!-- 3 Active Products: Lxtend Duration  -->
    <div class="resulttopbtn" style="background: #17e22f;color: white;font: menu;">

      <h3>All Requirements</h3>

    </div><br><br>


    <div class="resultactiveprdcts">



      <p><?php if(!empty($properties)){echo count($properties);}else{echo '0';}?> Active Requirements</p>



    <!--  <ul>

       <li><a href="#">Delete</a></li>

       <li><a href="#">Extend Duration</a></li>

       <li class="bordrnone1"><a href="#">Assign to Sub-user</a></li>

     </ul> -->

   </div>







   <!--  Land For Sale: -->
   <?php if(!empty($properties)){?>
     <?php foreach($properties as $data){
      // var_dump($data);
      ?>

      <div class="landforsale">
        <div class="row">
          <div class="col-sm-8">
           <!-- Land for Sale: -->   
           <div class="contentoflandfor">
             <h4><?php if($data['property_for']==0){echo 'Residential';}else{echo 'Commercial';}?>&nbsp;<?php echo $data['cat_name'];?>&nbsp;In&nbsp;<?php echo $data['sector'].' '.$data['city'];?></h4>
             <p>Price:<span><i class="fa fa-inr"></i><?php echo number_format($data['price']).'/-';?></span></p>    
             <p><?php  if(!empty($data['Plot_Area'] && $data['Plot_Area_Unit'])){echo 'Plot Area'.' '.$data['Plot_Area'].' '.$data['Plot_Area_Unit'];}else if(!empty($data['Carpet_Area'] && $data['Carpet_Area_Unit'])){echo 'Carpet Area'.' '.$data['Carpet_Area'].' '.$data['Carpet_Area_Unit'];}else if(!empty($data['Super_Built_Up_Area'] && $data['Super_Built_Up_Area_Unit'])){echo 'Super Built Area'.' '.$data['Super_Built_Up_Area'].' '.$data['Super_Built_Up_Area_Unit'];}else if(!empty($data['Super_Area'] && $data['Super_Area_Unit'])){echo 'Super Area Unit'.' '.$data['Super_Area'].' '.$data['Super_Area_Unit'];}else if(!empty($data['Built_Up_Area'] && $data['Built_Up_Area_Unit'])){echo 'Built Area'.' '.$data['Built_Up_Area'].' '.$data['Built_Up_Area_Unit'];}else{}?></p>
             <?php if($data['Bedroom']>0){echo '<p>'.'Bedroom:'.'<span>'.$data['Bedroom'].'BHK'.'</span>'.'</p>';}?>   
           </div>
           <!-- Active and Posted On -->         
           <div class="expireon">
             <p><?php echo $data['property_code'];?><span>Active</span></p>
             <p class="postedon">Posted On: <span style="border: none;"><?php echo date('d M Y',strtotime($data['posted_by']));?></span></p>



           </div>



           <!-- Expire On -->  



           <div class="extnddurtion">
            <?php 
            $property_for=$data['property_for'];
            $property_option='0';
            $propertyMatched=$common->getRequirementFromProperty($data,$property_for,$property_option);
        // var_dump($propertyMatched);
            ?>
            <p>Expiry On: <?php echo date('d M Y',strtotime($data['expired_by'])).', ';?>
            <?php if(!empty($propertyMatched)):?>
             <a href="getrequirement.php?property_id=<?php echo base64_encode($data['property_id']);?>&&property_for=<?php echo base64_encode($data['property_for']);?>"><?php echo count($propertyMatched).' '.'Property Matched';?></a>
           <?php endif;if(empty($propertyMatched)):?>
           <span style="color: blue;"><?php echo '0'.' '.'Property Matched';?></span>
         <?php endif;?>
       </p> 
       <p>Category:<span><?php echo $data['cat_name'];?></span></p>
       <?php if(!empty($data['subcat_name'])){echo  '<p>'.'SubCat:'.'<span>'.$data['subcat_name'].'</span>'.'</p>';}?>
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

         <a href="edit_requirement.php?id=<?php echo base64_encode($data['property_id']);?>&&prop_for=<?php echo base64_encode($data['property_for']);?>"><button class="edtbtn"><i class="fa fa-edit"></i><span>EDIT</span></button></a>            

       </div>



       <!-- Delete Button -->

       <div class="deletebutton">

        <button class="dtebtn" onclick="del(this.value)" value="<?php echo $data['property_id'];?>"><i class="fa fa-trash-o" aria-hidden="true"></i>DELETE</button>                                                   

      </div>



      <!-- Block Button -->



      <!-- <div class="blockbutton">

       <button class="blckbtn"><i class="fa fa-ban" aria-hidden="true"></i>BLOCK</button>

     </div> -->



   </div>  



 </div>



</div>  

</div>

<?php } ?>
<?php } ?>


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
  </script>






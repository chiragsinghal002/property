<?php 

include("action/logincheck.php");

if(empty($_SESSION)){

  header('location:index.php');

}

// $dealerinfo=$common->getDealerInfobyId($_SESSION['dealer_id']);

// var_dump($dealerinfo);

$showdetailDealer = $common->showDealerrDetail($_SESSION['dealer_email']);



?>

<body>



  <div class="stripmob">

    <div class="row">

      <div class="col-sm-6 col-xs-6">

           <!-- Logo For Search Page -->

           <!--  <img src="image/inner-logo.png" class="srchimg"> -->

           <img src="image/yards360logo.png" class="srplogo">

       

      </div>

      <div class="col-sm-6 col-xs-6">

  <button class="openbtn" onclick="openNav()">☰</button>

</div>

</div>

</div>

  <!-- Sidebar of Search propety: -->

  <div class="sidebar">

    <div class="">



      <div class="row">



        <!-- 2 Columns  For Side Bar -->

        <div id="mySidebar" class="col-sm-2 sidebar_tab">


          <div class="row">
            
          <!-- Logo For Search Page -->
        <div class="col-sm-12 col-xs-9">
          <div class="searchlogo">

           <!--  <img src="image/inner-logo.png" class="srchimg"> -->

           <img src="image/yards360logo.png" class="srchimg">

          </div>
            </div>
            <div class="col-sm-0 col-xs-2">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>
            </div>


              </div>





          <!-- Admn image in search property -->







          <div class="searchadmnlogo">

            <?php   

            if (!empty($showdetailDealer['dealer_photo'])) {

              ?>

             

              <div class="sidebar-top">



                <img  src="image/uploads/<?php echo $showdetailDealer['dealer_photo'];?>" class="admnimg">

               

                <?php 

              }

              else{

                ?>

                 

                <div class="sidebar-top">

                 

                  <img src="image/admin.png" class="admnimg">

                    

                  <?php

                }



                ?>







                <p><?php echo ' <span class="nmclr">'.$showdetailDealer['dealer_first_name'].'!<span><br>' . 'Master User';?></p>


                  <a href="updateprofile.php" class="update_lnk"><i class="fa fa-pencil"></i>modify</a>
              </div>

              <div class="srchlogoutbtn">

                <!-- <a href="logout.php"><button class="srchlgoutbtn">Logout</button></a> -->

              </div>

              <!-- Dropdown Manage Property  -->

              <div class="collapse navbar-collapse navbar-ex1-collapse">

         <!--

 <button onclick="myFunction()" id="amit">

 <img src="image/toggle.png" /> </button>

-->



<ul class="nav navbar-nav side-nav" id="myDIV">
<a href="#" class="myyards360">My Yards360</a>
  <li>

    <!-- <a href="updateprofile.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user"></i>Update Profile</a> -->



  </li>

  <p>MANAGE LISTING</p>

<?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>
<li><a href="post_property.php" >Post Property</a></li>
<?php endif; ?>
<li><a href="result.php">All Properties</a></li>
<?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>
<li><a href="#">My Matched Properties</a></li>
<?php endif;?>
<p>MANAGE REQUIREMENT</p>
<?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>
<li> <a href="post_requirement.php" >Post Requirement</a></li>
<?php endif; ?>
<?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>
<li> <a href="list_requriment.php" >All Requirements</a></li>
<?php endif;?>
<li> <a href="match_sell_property.php" >MY Matched Requirements</a></li>
<li> <a href="search.php">Search Property</a></li>
<li> <a href="#.php" >My Subscription Status</a></li>
<li> <a href="#.php" >Manage Subuser</a></li>
<!--   <li>
    <a href="result.php" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-home"></i>My Property</a>



 <ul id="submenu-2" class="collapse">



<li><a href="result.php"><i class="fa fa-angle-double-right"></i>My Property</a></li>



</ul>



</li> -->

<!-- <?php 

if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):

  ?>

  <li>



    <a href="post_property.php"><i class="fa fa-building"></i>Sell Rent</a>



  </li>

<?php endif;?> -->



<!-- <?php 

if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):

  ?>

  <li>



    <a href="match_sell_property.php"><i class="fa fa-building"></i>Match Sell Property</a>



  </li>

<?php endif;?> -->





<!-- <li>



  <a href="search.php"><i class="fa fa-home"></i>Search Property</a>



</li> -->

<!-- <?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>

  <li><a href="post_requirement.php"><i class="fa fa-pencil-square-o"></i>Buy Rent</a></li>

<?php endif;?> -->

<!-- <?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>

  <li><a href="list_requriment.php"><i class="fa fa-pencil-square-o"></i>List Property</a></li>

<?php endif;?> -->

<!-- <?php 

if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):

  ?>

<li><a href="getrequirement.php"><i class="fa fa-pencil-square-o"></i>Mat. Requirement</a></li>

<?php endif;?> -->

</ul>



</div>

</div>  

</div>

<!-- Rest of the Part n 10 Columns -->

<div class=" col-sm-10 fff">



  <div class="">

    <div class="">

      <!-- Logout Button -->

<!-- <div class="srchlogoutbtn">

<a href="logout.php"><button class="srchlgoutbtn">LOGOUT</button></a>

</div> -->





<script>





  function openNav() {

    document.getElementById("mySidebar").style.width = "250px";



  }



  function closeNav() {

    document.getElementById("mySidebar").style.width = "0";



  }







/* 

function myFunction() {

  var x = document.getElementById("myDIV");

  if (x.style.display === "none") {

    x.style.display = "block";

  } else {

    x.style.display = "none";

  }

}

*/





</script>




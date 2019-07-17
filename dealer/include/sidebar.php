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
  <button class="openbtn" onclick="openNav()">☰</button>
  <!-- Sidebar of Search propety: -->
  <div class="sidebar">
    <div class="">

      <div class="row">

        <!-- 2 Columns  For Side Bar -->
        <div id="mySidebar" class="col-sm-2 sidebar_tab">
          <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">×</a>

          <!-- Logo For Search Page -->
          <div class="searchlogo">
           <!--  <img src="image/inner-logo.png" class="srchimg"> -->
           <img src="image/yards360logo.png" class="srchimg">
          </div>



          <!-- Admn image in search property -->



          <div class="searchadmnlogo">
            <?php   
            if (!empty($showdetailDealer['dealer_photo'])) {
              ?>

              <div class="sidebar-top">
                <img src="image/uploads/<?php echo $showdetailDealer['dealer_photo'];?>" class="admnimg">
                <?php 
              }
              else{
                ?>
                <div class="sidebar-top">
                  <img src="image/admin.png" class="admnimg">
                  <?php
                }

                ?>



                <p><?php echo 'Welcome'.' '.$showdetailDealer['dealer_first_name'];?></p>

              </div>
              <div class="srchlogoutbtn">
                <a href="logout.php"><button class="srchlgoutbtn">Logout</button></a>
              </div>
              <!-- Dropdown Manage Property  -->
              <div class="collapse navbar-collapse navbar-ex1-collapse">
			   <!--
 <button onclick="myFunction()" id="amit">
 <img src="image/toggle.png" /> </button>
-->

<ul class="nav navbar-nav side-nav" id="myDIV">
  <li>
    <a href="updateprofile.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user"></i>Update Profile</a>

  </li>
  <li>

    <a href="result.php" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-home"></i>My Property</a>

<!--  <ul id="submenu-2" class="collapse">

<li><a href="result.php"><i class="fa fa-angle-double-right"></i>My Property</a></li>

</ul> -->

</li>
<?php 
if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):
  ?>
  <li>

    <a href="post_property.php"><i class="fa fa-building"></i>Sell Property</a>

  </li>
<?php endif;?>


<li>

  <a href="search.php"><i class="fa fa-home"></i>Search Property</a>

</li>
<?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>
  <li><a href="post_requirement.php"><i class="fa fa-pencil-square-o"></i>Buy Property</a></li>
<?php endif;?>
<?php if($showdetailDealer['mob_verified']==1 && $showdetailDealer['email_verified']==1):?>
  <li><a href="list_requriment.php"><i class="fa fa-pencil-square-o"></i>List Requirement</a></li>
<?php endif;?>
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


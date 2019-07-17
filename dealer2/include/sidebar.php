<?php 
include("action/logincheck.php");

// echo "<pre>";
// print_r($_SESSION);
$dealerinfo=$common->getDealerInfobyId($_SESSION['dealer_id']);
// var_dump($dealerinfo);
?>
<body>
<!-- Sidebar of Search propety: -->
<div class="sidebar">
<div class="">

<div class="row">

<!-- 2 Columns  For Side Bar -->
<div class="col-sm-2">
<!-- Logo For Search Page -->
<div class="searchlogo">
<img src="image/property.png" class="srchimg">
</div>



<!-- Admn image in search property -->



<div class="searchadmnlogo">
  <?php   
   if (!empty($dealerinfo['dealer_photo'])) {
    ?>
<img src="image/uploads/<?php echo $dealerinfo['dealer_photo'];?>" class="admnimg">
    <?php 
   }
   else{
    ?>
<img src="image/admin.png" class="admnimg">
    <?php
   }

  ?>



<p><?php echo $dealerinfo['dealer_first_name'];?></p>
<!-- Dropdown Manage Property  -->
<div class="collapse navbar-collapse navbar-ex1-collapse">
<ul class="nav navbar-nav side-nav">
<li>
<a href="updateprofile.php" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user"></i>Update Profile</a>

</li>
<li>

<a href="result.php" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-home"></i>My Property</a>

<!--  <ul id="submenu-2" class="collapse">

<li><a href="result.php"><i class="fa fa-angle-double-right"></i>My Property</a></li>

</ul> -->

</li>

<li>

<a href="post_property.php"><i class="fa fa-building"></i>Post Property</a>

</li>

<li>

<a href="search.php"><i class="fa fa-home"></i>Search Property</a>

</li>

<li><a href="post_requirement.php"><i class="fa fa-pencil-square-o"></i>Post Requirement</a></li>

<li><a href="list_requriment.php"><i class="fa fa-pencil-square-o"></i>List Requirement</a></li>

<li><a href="changepass.php"><i class="fa fa-pencil-square-o"></i>Change Password</a></li>

</ul>

</div>
</div>  
</div>
<!-- Rest of the Part n 10 Columns -->
<div class="col-sm-10 fff">
<div class="">
<div class="">
<!-- Logout Button -->
<div class="srchlogoutbtn">
<a href="logout.php"><button class="srchlgoutbtn">LOGOUT</button></a>
</div>
</div>
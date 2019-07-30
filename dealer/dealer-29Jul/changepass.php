  <?php 
  include("action/logincheck.php");

  include_once'include/header.php';
  include_once'include/sidebar.php';

  ?>

  <!--Main Div Of Chane Password Fleds  -->

  <div class="buyrentdiv">

  <!-- Old Password Inside Content -->
  <span style="color:red; font-size:16px;"><?php
  if(!empty($_GET['mes']))
  {
  echo $_GET['mes'];
  }
  ?>
  </span>
  <div class="change_password">

  <form class="form-horizontal" action="action/submission.php" method="post">
  <input type="hidden" name="action" value="changepass" />     
  <input type="hidden" name="email" value="<?php echo $_SESSION['dealer_email']; ?>" />     

  <div class="form-group">
  <label class="control-label col-sm-2" >Old Password:</label>
  <div class="col-sm-10">
  <input type="password" class="form-control" name="old_password" placeholder=" Old Password" required="">
  </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-2">New Password:</label>
  <div class="col-sm-10"> 
  <input type="password" class="form-control" name="new_password"   placeholder="New password" required="">
  </div>
  </div>

  <div class="form-group">
  <label class="control-label col-sm-2" >Confirm Password:</label>
  <div class="col-sm-10"> 
  <input type="password" class="form-control" name="confirm_password"  placeholder="Confirm password" required="">
  </div>
  </div>


  <div class="form-group">
  <label class="control-label col-sm-2"></label>
  <div class="col-sm-10">
  <input type="submit" name="submit" class="changepass_button" value="SUBMIT">
  </div>
  </div>  




  </form>

  </div>  



  </div> 

  </div>  

  </div>



  <!-- Footer -->
  <div class="col-sm-12 footer_last">
  <!-- Content of Footer -->
  <div class="footer_contnt">

  <div class="footer_labels">
  <img src="image/footerlogo1.png" class="footer_img">
  </div>   

  <div class="footer_labels">
  <h2>REAL ESTATE IN INDIA</h2>
  <ul>
  <li>Mumbai</li>
  <li>Bangalore</li>
  <li>Chennai</li>
  <li>Hyderabad</li>
  </ul>
  </div>


  <div class="footer_labels">
  <h2>PROPERTY.COM LINKS</h2>
  <ul>
  <li>Mobile Apps</li>
  <li>National Home</li>
  <li>Buy Our Service</li>
  <li>Residential property</li>
  </ul>
  </div>


  <div class="footer_labels">
  <h2>COMPANY</h2>
  <ul>
  <li>About Us </li>
  <li>Contact Us</li>
  <li>Careers with Us</li>
  <li>Terms & Conditions</li>
  </ul>
  </div>


  <div class="footer_labels">
  <h2>Address</h2>
  <ul>
  <li>Info Edge (India) Ltd.</li>
  <li>B-8, Sector 132,</li>
  <li>Noida, 201301</li>
  </ul>
  </div>  

  </div>   

  </div>   


  </div>
  </div>

  </div> 




  <div class="footer_copyright">
  <p>© Copyright 2019 Property.com . Designed & Developed by Netmaxims</p>
  </div> 




  </body>
  </html>


<style>
    .buyrentdiv {
            padding-bottom: 220px!important;
    }
</style>


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
  .buyrentdiv {
  background: lightgrey;
  padding: 72px;
  padding-bottom: 160px;
  }
  </style>
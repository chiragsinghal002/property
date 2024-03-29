<!DOCTYPE html>
<html>
<head>
	<title>Dashboard page</title>

   
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,400i" rel="stylesheet">

	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="UTF-8">
    <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width">
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <link rel="shortcut icon" href="" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link href="css/bootstrap.css" rel="stylesheet" type="text/css" />
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/loading.css" rel="stylesheet" type="text/css" />
     
       <!-- <script src="js/jequary.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script> -->   
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">


 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> 


<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>	

</head>
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
   	   	   	    	<img src="image/admin.png" class="admnimg">
                  <p>Admin</p>
   	   	   	   
                  
                      <!-- Dropdown Manage Property  -->
                                 
                   <div class="collapse navbar-collapse navbar-ex1-collapse">
                              <ul class="nav navbar-nav side-nav">
                                  <li>
                                      <a href="#" data-toggle="collapse" data-target="#submenu-1"><i class="fa fa-user"></i>Manage People<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                                      <ul id="submenu-1" class="collapse">
                                          <li><a href="#"><i class="fa fa-angle-double-right"></i>a</a></li>
                                          <li><a href="#"><i class="fa fa-angle-double-right"></i>b</a></li>
                                          <li><a href="#"><i class="fa fa-angle-double-right"></i>c</a></li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="#" data-toggle="collapse" data-target="#submenu-2"><i class="fa fa-home"></i>Post a Property<i class="fa fa-fw fa-angle-down pull-right"></i></a>
                                      <ul id="submenu-2" class="collapse">
                                          <li><a href="#"><i class="fa fa-angle-double-right"></i>a</a></li>
                                          <li><a href="#"><i class="fa fa-angle-double-right"></i>a</a></li>
                                          <li><a href="#"><i class="fa fa-angle-double-right"></i>a</a></li>
                                      </ul>
                                  </li>
                                  <li>
                                      <a href="investigaciones/favoritas"><i class="fa fa-building"></i>Manage Property</a>
                                  </li>
                                  <li>
                                      <a href="sugerencias"><i class="fa fa-home"></i>Search Property</a>
                                  </li>
                                  <li>
                                      <a href="faq"><i class="fa fa-pencil-square-o"></i>Post Requirement</a>
                                  </li>
                              </ul>
                          </div>

   	   	   
      </div>  
</div>

   	   	   <!-- Rest of the Part n 10 Columns -->
                   
                                 <!-- Rest Part of 9 cols -->
            
                 <div class="col-sm-10 padd">
            
                     <!-- Div for Logout btn -->
                 <div class="top-btn">
                   <a href="#" class="logout" type="Submit">Logout</a>
                </div>
                  
                     <!-- Div for Grey Background -->
                    <div class="main1">
                        <div class="container">
                  <div class="min-drop">
                          
                          <!-- Div for List Prop: -->
                    <div class="menu-drop">
                       <p>List Property For:</p>
                       <p>Property Name:</p>

                     </div>
                     <!-- Div for Dropdown -->
                  <div class="drop-html">
                     <div class="dropdown">
		                  <select class="dashboard_radiusbtn">
		                    <option>Select Rent</option>  
		                    <option>ssss</option>
		                  </select><br><br>
                        
                        <input type="text" name="proprtyname" placeholder=" Property Name" class="propnameinput">
                    </div>
                  </div>

                  </div>
                 
                  <!-- Propety Type: -->
                     <div class="proptype">
                        <p>Property Type:</p>
                     </div>

                  <!-- Residential: -->
                      
                
                              <div class="btnslidr">                      
                      <ul class="nav nav-tabs">
                        <li class="active"><a data-toggle="tab" href="#Residential">Residential</a></li>
                        <li><a data-toggle="tab" href="#Comm">Commercial</a></li>
                      
                      </ul>
                                </div>
                                 <!-- Dono kaian div -->
  
                                   <div class="tab-content">

                                         <!-- Deafut Resdental Pics -->
                        <div id="Residential" class="tab-pane fade in active">
                                    
                                        <div class="product-slider">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">

                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+02"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+03"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+04"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+05"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+06"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+07"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+08"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+09"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+10"> </div>
                              </div>
                            </div>
                            <div class="clearfix">
                              <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                  <div class="item active">
                                   
                                    <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+02"></div>
                                    <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+03"></div>
                                    <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+04"></div>
                                    <div data-target="#carousel" data-slide-to="4" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+05"></div>
                                  </div>
                                  <div class="item">
                                   
                                    <div data-target="#carousel" data-slide-to="6" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+07"></div>
                                    <div data-target="#carousel" data-slide-to="7" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+08"></div>
                                    <div data-target="#carousel" data-slide-to="8" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+08"></div>
                                    <div data-target="#carousel" data-slide-to="9" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+10"></div>
                                  </div>
                                </div>
                                <!-- /carousel-inner --> 
                                <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> </div>
                              <!-- /thumbcarousel -->   
                              
                            </div>
                          </div>
                                         </div>
                         

                                 <!-- Default Commercial Pics -->

                                      <div id="Comm" class="tab-pane fade">
                                      <div class="product-slider">
                            <div id="carousel" class="carousel slide" data-ride="carousel">
                              <div class="carousel-inner">

                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+02"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+03"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+04"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+05"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+06"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+07"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+08"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+09"> </div>
                                <div class="item"> <img src="http://placehold.it/1600x700?text=Product+10"> </div>
                              </div>
                            </div>
                            <div class="clearfix">
                              <div id="thumbcarousel" class="carousel slide" data-interval="false">
                                <div class="carousel-inner">
                                  <div class="item active">
                                    <div data-target="#carousel" data-slide-to="0" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+01"></div>
                                    <div data-target="#carousel" data-slide-to="1" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+02"></div>
                                    <div data-target="#carousel" data-slide-to="2" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+03"></div>
                                    <div data-target="#carousel" data-slide-to="3" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+04"></div>
                                    <div data-target="#carousel" data-slide-to="4" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+05"></div>
                                  </div>
                                  <div class="item">
                                    <div data-target="#carousel" data-slide-to="5" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+06"></div>
                                    <div data-target="#carousel" data-slide-to="6" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+07"></div>
                                    <div data-target="#carousel" data-slide-to="7" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+08"></div>
                                    <div data-target="#carousel" data-slide-to="8" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+08"></div>
                                    <div data-target="#carousel" data-slide-to="9" class="thumb"><img src="http://placehold.it/100x80?text=Thumb+10"></div>
                                  </div>
                                </div>
                                <!-- /carousel-inner --> 
                                <a class="left carousel-control" href="#thumbcarousel" role="button" data-slide="prev"> <i class="fa fa-angle-left" aria-hidden="true"></i> </a> <a class="right carousel-control" href="#thumbcarousel" role="button" data-slide="next"><i class="fa fa-angle-right" aria-hidden="true"></i> </a> </div>
                              <!-- /thumbcarousel -->   
                              
                            </div>
                          </div>
                                       </div>

                                   </div>  
                                 
                    <!-- Type Of Apartement: -->
                    <div class="apprtmnt">
                      
                                <div class="typeheading ">
                                  <p>Type of Apartment/Flat/Builder Floor</p>
                                </div>

                                <div class="drop-html1  ">
                         <div class="dropdown">
                      <select class="dashboard_radiusbtn">
                        <option>Type of Flat</option>
                        <option>sasssa</option>

                      </select>
                      </div>
                           </div>

                    </div>
                        
                        <!-- Sub-Categry -->
                           
                            <div class="apprtmnt">
                      
                                <div class="typeheading">
                                  <p>Subcategry</p>
                                </div>

                                <div class="drop-html1  ">
                         <div class="dropdown">
                      <select>
                        <option>Select Subcategory</option>
                        <option>sasssa</option>

                      </select>
                      </div>
                           </div>

                    </div> 

                          <!-- Child Sub-Categry -->
                           
                      <div class="apprtmnt">
                      
                                <div class="typeheading">
                                  <p>Child Sub Category</p>
                                </div>

                                <div class="drop-html1  ">
                         <div class="dropdown">
                      <select>
                        <option>Select Child</option>
                        <option>sasssa</option>

                      </select>
                      </div>
                           </div>

                    </div>    
                     
                    <!-- Google Location div -->
                        <div class="apprtmnt">
                      
                                <div class="typeheading">
                                  <p>Google Location</p>
                                </div>

                                <div class="drop-html1  ">
                          <input type="text" name="comment" placeholder="Google Location" class="ginputfield">
                           </div>

                     </div> 

                      <!-- Plot Area  div -->
                        <div class="apprtmnt">
                      
                                <div class="typeheading">
                                  <p>Plot Area</p>
                                </div>

                                <div class="drop-html1  ">
		                          <input type="text" name="comment" placeholder=" Plot Area" class="ginputfield"> 
		                          <select class="selectofplotarea">
		                          	<option>Select Plot Area</option>
		                          	<option>123 Sq.Yard</option>
		                          	<option>125 Sq.Yard</option>
		                          </select>
                           </div>

                     </div>   



                     <!-- Price div -->
                        <div class="apprtmnt">
                      
                                <div class="typeheading">
                                  <p>Price</p>
                                </div>

                                <div class="drop-html1  ">
                                     <input type="text" name="comment" placeholder=" Price" class="ginputfield">

                                     <select class="selectofplotarea">
                                     	<option>Crores</option>
                                     	<option>Lakhs</option>
                                     </select>
                               </div>

                     </div> 


                    
                         
                       
                   
                    <!-- Add Construction Status -->
                     <div class="apprtmnt">
                      
                                <div class="typeheading">
                                  <p>Add constructon Status</p>
                                </div>

                                <div class="drop-html1  ">
			                         <div class="dropdown">
			                      <select>
			                        <option>Select Ready to</option>
			                        <option>sasssa</option>

			                      </select>
			                      </div>
                             </div>

                    </div>

                    <!-- Status -->
                     <div class="apprtmnt">
                      
                                <div class="typeheading">
                                  <p>Status</p>
                                </div>

                                <div class="drop-html1  ">
                         <div class="dropdown">
                      <select>
                        <option>Select Status</option>
                        <option>Active</option>
                        <option>Inactive</option>


                      </select>
                      </div>
                           </div>

                    </div>
                    <!-- Dashboard Submit Button -->

                    <div class="apprtmnt">
                       <button class="btn btn-danger" type="Submit" name="Submit"><span>SUBMIT</span></button>
                    </div>
                </div>  
              </div>
            </div>

   	   </div>
   </div>



</div>






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
<?php include_once'include/header.php';?>
<?php include_once'include/sidebar.php';?>
<style>
* {
  box-sizing: border-box;
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}


.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
div#searchingautocomplete-list {
    color: black;
}
</style>
<!--Nav Tabs & Pills  -->
<div class="buyrentdiv">
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" onclick="buy_tab();">Buy</a></li>
    <li><a data-toggle="tab" href="#menu1" onclick="rent_tab();">Rent</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <!-- All Residental -->
     <div class="allresidntl">
      <div class="row">
       <!-- All Residental Button -->
       <div class="col-sm-3 padding-first">
        <div class="dropdown res">
          <button class="residntlbtn dropdown-toggle" type="button"  data-toggle="dropdown"><span id="buy_res">All Residential</span>
            <span class="caret"></span></button>
            <ul class="dropdown-menu" role="menu">
              <li role="presentation"><!-- <input type="radio" name="choose_type" value="0"> -->Residential<br>
                <?php $rescat=$common->propertyCategory(0);
                                // var_dump($rescat);
                ?>
                <ul>
                  <?php foreach($rescat as $data):?>
                    <!-- <input type="radio" name="residntl" onchange='buy_res_checkbox()' onclick="buy_res_checkbox_value(this.value)" value="<?php echo $data['cat_id'];?>"><?php echo $data['cat_name'];?><br> -->
                    <li style="cursor: pointer;" id="<?php echo $data['cat_id'];?>" onclick="buy_res_checkbox_value(this.id);"><?php echo $data['cat_name'];?></li>
                  <?php endforeach;?>
                </ul>
              </li>
              <li role="presentation">Commercial<br>
                <?php $commercat=$common->propertyCategory(1);
                                // var_dump($commercat);
                ?>
                <ul>
                  <?php foreach($commercat as $data):?>
                   <!-- <input type="radio" name="commdntl" onchange='buy_comm_checkbox()' value="<?php echo $data['cat_id'];?>"><?php echo $data['cat_name'];?><br> -->
                   <li style="cursor: pointer;" id="<?php echo $data['cat_id'];?>" onclick="buy_comm_checkbox_value(this.id);"><?php echo $data['cat_name'];?></li>
                 <?php endforeach;?>

               </ul>
             </li>
             
           </ul>
           <span id="buy_cat_id_error" style="color: red;display: none;">*This Field is Required</span>
           <input type="hidden" id="buy_cat_id">
           <input type="hidden" id="buy_property_type">
         </div>
       </div>
       <!-- Type Location field -->
       <div class="col-sm-7 padding-minus">
        <form autocomplete="off">
            <div class="autocomplete" style="width:584px;">
         <input type="text" name="searchbar" placeholder="Type Locaton or Project/Society" value="" id="searching" class="srchfield" onclick="buy_show_strip();" onkeyup="location_valid(this.value);">
       </div>
        </form>
      
         <span id="searching_error" style="color: red;display: none;">*This Field is Required</span>
       </div>
       <!-- Seaech Green Button -->
       <div class="col-sm-2 padding-search">
        <input type="button" class="srchbtn" onclick="return buy_search();" value="SEARCH">
      </div>
    </div>
  </div>
</div>
<div id="menu1" class="tab-pane fade">
 <div class="allresidntl">
  <div class="row">
   <!-- All Residental Button -->
   <div class="col-sm-3 padding-first">
    <div class="dropdown res">
      <button class="residntlbtn dropdown-toggle" type="button"  data-toggle="dropdown"><span id="rent_res">All Residential</span>
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" >
          <li role="presentation">Residential<br>
            <?php $rescat=$common->propertyCategory(0);
                                // var_dump($rescat);
            ?>
            <ul>
              <?php foreach($rescat as $data):?>
                <!-- <li><input type="radio" onchange='rent_res_checkbox()' name="rent_residntl" value="<?php echo $data['cat_id'];?>"><?php echo $data['cat_name'];?></li><br> -->
                 <li style="cursor: pointer;" id="<?php echo $data['cat_id'];?>" onclick="rent_res_checkbox_value(this.id);"><?php echo $data['cat_name'];?></li>
              <?php endforeach;?>
            </ul>
          </li>
          <li role="presentation">Commercial<br>
            <?php $commercat=$common->propertyCategory(1);
                                // var_dump($commercat);
            ?>
            <ul>
              <?php foreach($commercat as $data):?>
                <li style="cursor: pointer;" id="<?php echo $data['cat_id'];?>" onclick="rent_comm_checkbox_value(this.id);"><?php echo $data['cat_name'];?></li>
              <?php endforeach;?>
            </ul>
          </li>
        </ul>
        <span id="rent_cat_id_error" style="color: red;display: none;">*This Field is Required</span>
         <input type="hidden" id="rent_cat_id">
           <input type="hidden" id="rent_property_type">
      </div>
    </div>
    <!-- Type Location field -->
    <div class="col-sm-7 padding-minus">
     <input type="text" name="searchbar" placeholder=" Type Locaton or Project/Society" value="" id="rent_searching" class="srchfield" onclick="rent_show_strip();">
     <span id="rent_searching_error" onkeyup="rent_location_valid(this.value);" style="color: red;display: none;">*This Field is Required</span>
   </div>
   <!-- Seaech Green Button -->
   <div class="col-sm-2 padding-search">
    <input type="button" class="srchbtn" onclick="return rent_search();" value="SEARCH">
  </div>
</div>
</div>                <!-- All Residental -->

</div>
</div>
<!-- Select Multiple Buttons -->
<div class="slctmiulbtns" style="display: none;">
  <select name="constuction_status" id="cons_status">
   <option value="">Constructon Status</option>
   <option value="0">Under Construction</option>
   <option value="1">Ready to Move</option>
 </select>
 
 <div id="plot_area">
   <input type="text" id="plot_area1" class="pricebtn_inputfld" value="" placeholder="enter size eg. 12">
   <?php 
   $sizeofproperty=$common->propertysize();
   ?>
   <select class="selectofplotarea" id="plot_size_area_value">
    <option>Select Plot Area</option>
    <?php foreach($sizeofproperty as $data){?>
      <option value="<?php echo $data['property_size'];?>"><?php echo $data['property_size'];?></option>
    <?php } ?>
  </select>
</div>
 
<!-- Price RangeMin and max -->
<div class="dropdown_pricerange">
  <!-- <input type="text" name="" placeholder="Min-Price"> -->
  <input type="number" name="price" placeholder="Min Price" class="ginputfield" id="price_range_min" value="" onkeyup="price_check(this.value)" min="1">
  <input type="number" name="price" placeholder="Max Price" class="ginputfield" id="price_range_max" value="" onkeyup="price_check1(this.value)" min="1">
</div>
<span id="word_result"></span>
<span id="word_result1"></span>
<select id="show_bkh" style="display: none;">
 <?php for($i=1;$i<=9;$i++){?>
   <option value="<?php echo $i;?>"><?php echo $i;?> BHK</option>
 <?php } ?>
</select>
  <!-- <button class="clrbtn">Clear All</button> -->
</div>
<!-- Sort by -->
<!-- <div class="sortbydiv">
 <h5>Sort By:</h5>
 <select>
   <option>Date:Newest</option>
   <option>12/12/2019</option>
   <option>14/12/2019</option>
 </select>
</div> -->
<!-- Goodrej Golf Links -->
<br><br><br><br><br><br>

<div id="search_div">
  <span id="search_loading" style="display: none;">
    <img src="Loading_icon.gif">
  </span>

</div>
<!-- COPY OF ABOVE -->
</div> 
</div>  
</div>
</div>
</div>
</div>
</body>
<script type="text/javascript" src="js/search.js"></script>
<?php include_once'include/footer.php';?>
</html>
<style type="text/css">
  input.srchfield {
    color: #222;
    padding-left: 6px;
    outline: none;
  }
  .pricebtn_inputfld{
    outline: none;
  }

  .buyrentdiv {
    background: lightgrey;
    padding: 72px;
    padding-bottom: 286px;
  }

  /*.slctmiulbtns {
    background: white;
    height: 49px;
    margin-top: 2px;
    display: inline-flex;
    width: 100%;
}

div#plot_area {
    margin-left: 21px;
}*/
</style>
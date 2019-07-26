<?php include_once'include/header.php';?>
<?php include_once'include/sidebar.php';?>
<?php 
$dealer_info=$common->getDealerInfobyId($_SESSION['dealer_id']);
// var_dump($dealer_info);
?>
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
        height: auto;
    max-height: 350px;
    overflow-x: hidden;
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
  <?php if($showdetailDealer['email_verified']!=='1'){ ?>
      <?php include("include/verified.php"); ?>
      <?php } ?>
  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home" onclick="buy_tab();">Buy</a></li>
    <li><a data-toggle="tab" href="#home" onclick="rent_tab();">Rent</a></li>
  </ul>
  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
     <!-- All Residental -->
     <div class="allresidntl">
      <div class="row">
       <!-- All Residental Button -->
       <div class="col-sm-3  padding-first">
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





     <!-- Select Multiple Buttons -->
<div class="slctmiulbtns src-btn resdivshow" style="display: none;">
  <!-- Price RangeMin and max -->
<div class="dropdown_pricerange src_prc">
  <!-- <input type="text" name="" placeholder="Min-Price"> -->
  <input type="number" name="price" placeholder="Min Price"  alt="Min Price" class="ginputfield" id="price_range_min" value="" onkeyup="price_check(this.value)" min="1">
  <input type="number" name="price" placeholder="Max Price" alt="Max Price" class="ginputfield" id="price_range_max" value="" onkeyup="price_check1(this.value)" min="1">
  <select id="show_bkh" style="display: none;">
 <?php for($i=1;$i<=9;$i++){?>
   <option value="<?php echo $i;?>"><?php echo $i;?> BHK</option>
 <?php } ?>
</select>
</div>
  <select name="constuction_status" id="cons_status">
   <option value="">Constructon Status</option>
   <option value="0">Under Construction</option>
   <option value="1">Ready to Move</option>
 </select>
 
 <div id="plot_area" class="plt_area">
  <input type="text" id="plot_area1" class="pricebtn_inputfld" value="" placeholder="Area">
   <select class="selectofplotarea" id="plot_size_area_value">
    <?php 
   $sizeofproperty=$common->propertysize();
   ?>
    <option>Select Plot Area</option>
    <?php foreach($sizeofproperty as $data){?>
      <option value="<?php echo $data['property_size'];?>"><?php echo $data['property_size'];?></option>
    <?php } ?>
  </select>
   
   
  
</div>

<div class="srcwrd">
<span id="word_result"></span>
<span id="word_result1"></span>
</div>


<!-- <button class="clrbtn">Clear All</button> -->
</div>





     <!-- Seaech Green Button -->
     <div class="col-sm-2 padding-search">
      <input type="button" class="srchbtn" id="search_button" onclick="return buy_search();" value="SEARCH">
    </div>
  </div>
</div>
</div>
<!-- <div id="menu1" class="tab-pane fade">
 <div class="allresidntl">
  <div class="row">
  
   <div class="col-sm-3 padding-first">
    <div class="dropdown res">
      <button class="residntlbtn dropdown-toggle" type="button"  data-toggle="dropdown"><span id="rent_res">All Residential</span>
        <span class="caret"></span></button>
        <ul class="dropdown-menu" role="menu" >
          <li role="presentation">Residential<br>
            <?php $rescat=$common->propertyCategory(0);
                               
            ?>
            <ul>
              <?php foreach($rescat as $data):?>
              
                <li style="cursor: pointer;" id="<?php echo $data['cat_id'];?>" onclick="rent_res_checkbox_value(this.id);"><?php echo $data['cat_name'];?></li>
              <?php endforeach;?>
            </ul>
          </li>
          <li role="presentation">Commercial<br>
            <?php $commercat=$common->propertyCategory(1);
                            
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
   
    <div class="col-sm-7 padding-minus">
      <form autocomplete="off">
          <div class="autocomplete" style="width:584px;">
           <input type="text" name="searchbar" placeholder="Type Locaton or Project/Society" value="" id="searching" class="srchfield" onclick="rent_show_strip();" onkeyup="location_valid(this.value);">
         </div>
       </form>
     <input type="text" name="searchbar" placeholder=" Type Locaton or Project/Society" value="" id="rent_searching" class="srchfield" onclick="rent_show_strip();">
     <span id="rent_searching_error" onkeyup="rent_location_valid(this.value);" style="color: red;display: none;">*This Field is Required</span>
   </div>
   
   <div class="col-sm-2 padding-search">
    <input type="button" class="srchbtn" onclick="return rent_search();" value="SEARCH">
  </div>
</div>
</div>                

</div> -->
</div>

<!-- Select Multiple Buttons -->
<div class="slctmiulbtns src-btn resdivhide" style="display: none;">
  <!-- Price RangeMin and max -->
<div class="dropdown_pricerange src_prc">
  <!-- <input type="text" name="" placeholder="Min-Price"> -->
  <input type="number" name="price" placeholder="Min Price"  alt="Min Price" class="ginputfield" id="price_range_min" value="" onkeyup="price_check(this.value)" min="1">
  <input type="number" name="price" placeholder="Max Price" alt="Max Price" class="ginputfield" id="price_range_max" value="" onkeyup="price_check1(this.value)" min="1">
  <select id="show_bkh" style="display: none;">
 <?php for($i=1;$i<=9;$i++){?>
   <option value="<?php echo $i;?>"><?php echo $i;?> BHK</option>
 <?php } ?>
</select>
</div>
  <select name="constuction_status" id="cons_status">
   <option value="">Constructon Status</option>
   <option value="0">Under Construction</option>
   <option value="1">Ready to Move</option>
 </select>
 
 <div id="plot_area" class="plt_area">
  <input type="text" id="plot_area1" class="pricebtn_inputfld" value="" placeholder="Area">
   <select class="selectofplotarea" id="plot_size_area_value">
    <?php 
   $sizeofproperty=$common->propertysize();
   ?>
    <option>Select Plot Area</option>
    <?php foreach($sizeofproperty as $data){?>
      <option value="<?php echo $data['property_size'];?>"><?php echo $data['property_size'];?></option>
    <?php } ?>
  </select>
   
   
  
</div>

<div class="srcwrd">
<span id="word_result"></span>
<span id="word_result1"></span>
</div>


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
<input type="hidden" id="dealer_id" value="<?php echo $_SESSION['dealer_id'];?>">

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
<script type="text/javascript" src="js/jquery.placeholder.label.js"></script>
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
   /* background: lightgrey;*/
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
  <script type="text/javascript">
    function mail(id){
      var dealer_id=$("#dealer_id").val();
      $.ajax({
        url:'ajax.php',
        type:'post',
        data:{'social_track':3,dealer_id:dealer_id,id:id},
        success:function(data){
          console.log(data);
        }
      })
    }

    function whatsapp(id){
     var dealer_id=$("#dealer_id").val();
     $.ajax({
      url:'ajax.php',
      type:'post',
      data:{'social_track':1,dealer_id:dealer_id,id:id},
      success:function(data){
        console.log(data);
          Swal.fire({
        type: 'success',
        title: 'Thank You For Your Response',
        showConfirmButton: true
      })
      }
    })
   }

   function call_to(id){
     var dealer_id=$("#dealer_id").val();
     $.ajax({
      url:'ajax.php',
      type:'post',
      data:{'social_track':2,dealer_id:dealer_id,id:id},
      success:function(data){
        console.log(data);
        show_call();
      }
    })
   }
   function show_call(){
    var ph=$("#phone_no").val();
    var fname=$("#fname").val();
    var lname=$("#lname").val();
    var firm_name=$("#firm_name").val();
    Swal.fire({
      title: 'Dealer' +' '+ fname + ' ' + lname +',<br>'+' '+ 'Firm Name' +' ' + firm_name +'<br>' +'Contact Number is' + ' ' +ph,
      animation: true,
      customClass: {
        popup: 'animated tada'
      }
    })
  }

  function interest(value){
   var ph=$("#phone_no").val();
   var fname=$("#fname").val();
   var lname=$("#lname").val();
   var firm_name=$("#firm_name").val();
   var prop_for=$("#prop_for").val();
   var dealer_email=$("#dealer_email").val();
   $.ajax({
    url:'ajax.php',
    type:'post',
    data:{'automated_mail':2,ph:ph,fname:fname,lname:lname,firm_name:firm_name,propertyid:value,propertyfor:prop_for,dealer_email:dealer_email},
    beforeSend:function(){
      Swal.fire({
        type: 'success',
        title: 'Thank You For Your Response',
        showConfirmButton: true
      })
    },
    success:function(data){
      console.log(data);
      // show_call();
    }
  })
 }
</script>
  <script type="text/javascript">
    $(document).ready(function (){
      $('.src-btn input[placeholder]').placeholderLabel();
    })
    </script>
<script type="text/javascript">
    $(document).ready(function (){
  $('.src-btn input[placeholder]').placeholderLabel({

    // placeholder color
    placeholderColor: "#000000!important", 

    // label color
    labelColor: "#000000!important",

    // size of label
    labelSize: "14px",
    // size of color
     color: "#000000!important";

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
<style type="text/css">
  h5{
    color: #3cb54a !important;
  }
  h5 i span{
    color: black !important;
    font-weight: 400 !important;
  }
  .serach_extrabtn button {
    float: right;
    position: relative;
    /* right: 4em; */
    border-radius: 100px;
    background: #3cb54a;
    color: white;
    border: none;
    width: 114px;
    height: 32px;
    right: 15px;
  }
 .mailbtn a {
    color: #ffffff;
}
</style>
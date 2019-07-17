<body>  
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add subCategory</h4>
              
                  <!-- <p class="card-description">
                    Basic form elements
                  </p> -->
                  <?php if(isset($msg) || validation_errors() !== ''): ?>
                  <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                  </div>
                <?php endif; ?>
                <?php echo form_open_multipart(base_url('index.php/add/childsubcategory'), 'class="forms-sample needs-validation" novalidate' )?>
                <!--  <form class="forms-sample"> -->

                  <div class="form-group">
                    <label for="property_type">Property Type</label>
                    <select name="property_type" class="form-control form-control-lg" id="property_type" required="required" onchange="property_type1(this.value)">
                      <option value="">Select</option>
                      <option value="0">Residential</option>
                      <option value="1">Commercial</option>

                    </select>
                    <div class="invalid-feedback" style="margin-top: 10px;">
                      This field is required
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="property_type">Property Option</label>
                    <select name="property_option" class="form-control form-control-lg" id="property_type">

                      <option value="0">Sale/Rent</option>
                      <option value="1">Purchase</option>

                    </select>
                  <!--   <div class="invalid-feedback" style="margin-top: 10px;">
                      This field is required
                    </div> -->
                  </div>


                  <div class="form-group">
                    <label for="cat_name">Category Name</label>
                    <select name="category_name" class="form-control form-control-lg" id="category_name" required="required" onchange="category_name1(this.value)">
                      <option value="">Select Category</option>
                      

                    </select>

                    <div class="invalid-feedback">
                      This field is required
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cat_name">SubCategory Name</label>
                    <select name="subcategory_name" class="form-control form-control-lg" id="subcat_id">
                      <option value="">Select subCategory</option>
                      

                    </select>

                   <!--  <div class="invalid-feedback">
                      This field is required
                    </div> -->
                  </div>

                  <div class="form-group">
                    <label for="cat_name">SubchildCategory Name</label>
                    <input type="text" name="subchildcategory_name" class="form-control" id="" placeholder="Name" required="required">
                    <br>

                    <div class="invalid-feedback">
                      This field is required
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cat_status">Is Mandatory</label>
                    <select name="is_mandatory" class="form-control form-control-lg">
                      <option value="0">No</option>
                      <option value="1">Yes</option>


                    </select>

                  </div>


                  <div class="form-group">
                    <label for="cat_status">Min/Max Option</label>
                    <select name="min_max_option" class="form-control form-control-lg">
                      <option value="0">No</option>
                      <option value="1">Yes</option>

                    </select>

                  </div>

                  <div class="form-group">
                    <label for="cat_status">Selection Type</label>
                    <select name="selection_type" class="form-control form-control-lg">
                      <option value="1">Dropdown</option>
                      <option value="2">Radio</option>
                      <option value="3">Checkbox</option>
                      <option value="4">Input&Dropdown</option>

                    </select>

                  </div>



                  <div class="form-group">

                    <label for="cat_name">Add Values</label>

                    <input type="text" name="value[]" class="form-control" id="" placeholder="Add Values" required="required"><input type="button" value="Add" onclick="add(this.value)"/>

                    <br>



                    <div class="invalid-feedback">

                      This field is required

                    </div>

                  </div>
                  <span id="fooBar">&nbsp;</span><br><br>

                  <div class="form-group">
                    <label for="cat_status">Status</label>
                    <select name="subchildcat_status" class="form-control form-control-lg" id="cat_status" required="required">
                      <option value="1">Active</option>
                      <option value="0">Inactive</option>

                    </select>
                    <div class="invalid-feedback">
                      This field is required
                    </div>
                  </div>

                  <input type="submit" name="submit" value="Submit" class="btn btn-success mr-2">
<!-- 
  <button type="submit" class="btn btn-success mr-2">Submit</button> -->
  <button class="btn btn-light"><a href="<?= base_url() ?>index.php/listing/">Cancel</a></button>
  <?php echo form_close(); ?>
</div>
</div>
</div>

</div>
</div>
<!-- content-wrapper ends -->
<script type="text/javascript">
  function property_type1(val){
    // alert(val);
    $.ajax({
      url:'get_category',
      type:'post',
      data:{'type':val},
      success:function(data){
              // alert(data);
              $("#category_name").html(data);
            }
          })
  }

  function category_name1(val){
     // alert(val);
     $.ajax({
      url:'get_subcategorybasedoncategory',
      type:'post',
      data:{'cat_id':val},
      success:function(data){
               // alert(data);
               $("#subcat_id").html(data);
             }
           })
   }

   function add(val) {

      // alert(val);

  //Create an input type dynamically.

  var element = document.createElement("input");



  //Assign different attributes to the element.

  element.setAttribute("type", "text");

  element.setAttribute("value", "");

  element.setAttribute("name", "value[]");

  element.setAttribute("class", "form-control");

  element.setAttribute("placeholder", "value");

  element.setAttribute("required", "required");





  var foo = document.getElementById("fooBar");



  //Append the element in page (in span).

  foo.appendChild(element);



}
</script>

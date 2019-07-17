<body>  
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add subCategory</h4>
               <button>sasas</button>
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
                <?php echo form_open_multipart(base_url('index.php/add/subcategory'), 'class="forms-sample needs-validation" novalidate' )?>
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
                    <label for="cat_name">Category Name</label>
                    <select name="category_name" class="form-control form-control-lg" id="category_name" required="required">
                      <option value="">Select Category</option>
                      

                    </select>

                    <div class="invalid-feedback">
                      This field is required
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cat_name">SubCategory Name</label>
                    <input type="text" name="subcategory_name" class="form-control" id="" placeholder="Name" required="required">
                    <br>

                    <div class="invalid-feedback">
                      This field is required
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="cat_status">Status</label>
                    <select name="subcat_status" class="form-control form-control-lg" id="cat_status" required="required">
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
</script>

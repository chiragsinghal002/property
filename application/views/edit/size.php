<body>  
  <!-- partial -->
  <div class="main-panel">
    <div class="content-wrapper">
      <div class="row">

        <div class="col-md-6 grid-margin stretch-card">
          <div class="card">
            <div class="card-body">
              <h4 class="card-title">Add Size</h4>
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
                <?php echo form_open_multipart(base_url('index.php/edit/size/'), 'class="forms-sample needs-validation" novalidate' )?>
                <!--  <form class="forms-sample"> -->
                  <div class="form-group">
                    <label for="dietary_name">Add Size</label>
                    <input type="text" name="size_name" class="form-control" id="" placeholder="Enter Size Eg sq.ft" required="required">
                    <br>

                    <div class="invalid-feedback">
                      This field is required
                    </div>
                  </div>


                  <div class="form-group">
                    <label for="dietary_status">Status</label>
                    <select name="status" class="form-control form-control-lg" id="status" required="required">
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
  <button class="btn btn-light">Cancel</button>
  <?php echo form_close(); ?>
</div>
</div>
</div>
            
          </div>
        </div>
        <!-- content-wrapper ends -->
        
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Dealer-Login</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= base_url() ?>public/vendors/iconfonts/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="<?= base_url() ?>public/vendors/css/vendor.bundle.addons.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= base_url() ?>public/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= base_url() ?>public/images/favicon.png" />

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper auth-page">
      <div class="content-wrapper d-flex align-items-center auth auth-bg-1 theme-one">
        <div class="row w-100">
          <div class="col-lg-4 mx-auto">
            <?php if(isset($msg) || validation_errors() !== ''): ?>
                <div class="alert alert-warning alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                    <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                    <?= validation_errors();?>
                    <?= isset($msg)? $msg: ''; ?>
                </div>
                <?php endif; ?>
            <div class="auto-form-wrapper">
              <?php echo form_open_multipart(base_url('index.php/auth/forgot/'), 'class="needs-validation" novalidate' )?>
              <!-- <form action="<?= base_url() ?>index.php/auth/login/" class="needs-validation" novalidate> -->
                <div class="form-group">
                  <label class="label" for="dealer_email">Email</label>
                  <div class="input-group">
                    <input type="email" name="dealer_email" class="form-control" value="admin@gmail.com" placeholder="Email" id="dealer_email" required="required">
                     
                    <div class="input-group-append">
                      <span class="input-group-text">
                        <i class="mdi mdi-check-circle-outline"></i>
                      </span>
                    </div>
                    <div class="invalid-feedback">
              This field is required
            </div>
                  </div>                 
                </div>
               
                <div class="form-group">
                  <input type="submit" name="submit" value="Submit" class="btn btn-primary submit-btn btn-block">
                  <!-- <button type="submit" name="submit" class="btn btn-primary submit-btn btn-block">Login</button> -->
                </div>
                 <?php echo form_close(); ?>
               <!--  </form> -->               
                
                <div class="text-block text-center my-3">
                  <!-- <span class="text-small font-weight-semibold">Not a member ?</span> -->
                  <a href="<?= base_url()?>index.php/auth/login/" class="text-black text-small">Login</a>
                </div>
              
            </div>
            <ul class="auth-footer">
              <li>
                <a href="#">Conditions</a>
              </li>
              <li>
                <a href="#">Help</a>
              </li>
              <li>
                <a href="#">Terms</a>
              </li>
            </ul>
            <p class="footer-text text-center">copyright © 2018 Bootstrapdash. All rights reserved.</p>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?= base_url() ?>public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url() ?>public/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- inject:js -->
  <script src="<?= base_url() ?>public/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>public/js/misc.js"></script>
  <!-- endinject -->


<!-- for validation -->
<script type="text/javascript">
 // Example starter JavaScript for disabling form submissions if there are invalid fields
 (function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>

<!-- end for validation -->
</body>

</html>
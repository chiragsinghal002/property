<footer class="footer">
          <div class="container-fluid clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2019
              <a href="https://www.netmaxims.com/" target="_blank">Netmaxims</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with
              <i class="mdi mdi-heart text-danger"></i>
            </span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

  <!-- plugins:js -->
  <script src="<?= base_url() ?>public/vendors/js/vendor.bundle.base.js"></script>
  <script src="<?= base_url() ?>/vendors/js/vendor.bundle.addons.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="<?= base_url() ?>public/js/off-canvas.js"></script>
  <script src="<?= base_url() ?>public/js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?= base_url() ?>public/js/dashboard.js"></script>
  <!-- End custom js for this page-->


  <style>
.custom-select.is-invalid~.invalid-feedback, .custom-select.is-invalid~.invalid-tooltip, .form-control.is-invalid~.invalid-feedback, .form-control.is-invalid~.invalid-tooltip, .was-validated .custom-select:invalid~.invalid-feedback, .was-validated .custom-select:invalid~.invalid-tooltip, .was-validated .form-control:invalid~.invalid-feedback, .was-validated .form-control:invalid~.invalid-tooltip {
    display: block;
}
.invalid-feedback {
    display: none;
    width: 100%;
     margin: -10px 0px 9px;
    font-size: 89%;
    color: #dc3545;
    text-transform: capitalize;
}

</style>
<script>
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
</body>

</html>
<body>  

      <!-- partial -->

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">

           

            <div class="col-md-6 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Edit Dealer</h4>

                  <!-- <p class="card-description">

                    Basic form elements

                  </p> -->

                  <?php if(isset($msg) || validation_errors() !== ''): ?>

          <div style="color: red;" class="alert alert-warning alert-dismissible">

            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

            <h4><i class="icon fa fa-warning"></i> Alert!</h4>

            <?= validation_errors();?>

            <?= isset($msg)? $msg: ''; ?>

          </div>

        <?php endif; ?>

                <?php echo form_open_multipart(base_url('index.php/edit/dealers/'.$dealers['dealer_id']), 'class="forms-sample needs-validation" novalidate' )?>

                 <!--  <form class="forms-sample"> -->

                    <div class="form-group">

                      <label for="dealer_name">Name</label>

                      <input type="text" name="dealer_name" value="<?= $dealers['dealer_first_name']; ?>" class="form-control" id="dealer_name" placeholder="Name" required="required">                    

                      <br>



                      <div class="invalid-feedback">

              This field is required

            </div>

                    </div>





                    <div class="form-group">

                      <label for="dealer_email">Email</label>

                      <input type="email" name="dealer_email" class="form-control" id="dealer_email" value="<?php echo $dealers['dealer_email'] ;?>" placeholder="Email" required="required">

                      <br>



                      <div class="invalid-feedback">

              This field is required

            </div>

                    </div>



                     <div class="form-group">

                      <label for="dealer_phone">Phone</label>

                      <input type="text" name="dealer_phone" value="<?= $dealers['dealer_phone']; ?>" class="form-control" id="dealer_phone" placeholder="Name" required="required">                    

                      <br>



                      <div class="invalid-feedback">

              This field is required

            </div>

                    </div>



<!-- Start -->

<!-- <div class="form-group">

                      <label for="dealer_email">Password</label>

                      <input type="email" name="dealer_email" class="form-control" id="dealer_email" value="<?php echo $dealers['dealer_password'] ;?>" placeholder="Email" required="required">

                      <br>



                      <div class="invalid-feedback">

              This field is required

            </div>

                    </div> -->



<div class="form-group">

                      <label for="dealer_city">City</label>

                      <input type="text"  class="form-control"  value="<?php echo $dealers['city'] ;?>" placeholder="Email" >

                      <br>
 

                    </div>








                    <div class="form-group">

                      <label for="dealer_address">Address</label>

                      <input type="text" class="form-control"  value="<?php echo $dealers['dealer_address'] ;?>" placeholder="Email" >

                      <br>

                    </div>





                   <div class="form-group">

                      <label for="dealer_sector">Sector</label>

                      <input type="text"  class="form-control"  value="<?php echo $dealers['sector'] ;?>" placeholder="Email" >

                      <br>

                    </div>


<!-- Close -->





                    <div class="form-group">

                      <label for="dealer_status">Status</label>

                       <select name="dealer_status" class="form-control form-control-lg" id="dealer_status" required="required">

                         <option value="1" <?php echo ($dealers['dealer_status']==1 ? 'selected' : '');?>>Active</option>

                         <option value="0" <?php echo ($dealers['dealer_status']==0 ? 'selected' : '');?>>Inactive</option>

                                           

                    </select>

                     <div class="invalid-feedback">

              This field is required

            </div>

                    </div>

                                  

                    <input type="submit" name="submit" value="Submit" class="btn btn-success mr-2">

<!-- 

                    <button type="submit" class="btn btn-success mr-2">Submit</button> -->

                    <button class="btn btn-light"><a href="<?= base_url() ?>index.php/listing/dealers/">Cancel</a></button>

                  <?php echo form_close(); ?>

                </div>

              </div>

            </div>

            <!-- <div class="col-md-5 d-flex align-items-stretch">

              <div class="row flex-grow">

                <div class="col-12 grid-margin">

                  <div class="card">

                    <div class="card-body">

                      <h4 class="card-title">Basic input groups</h4>

                      <p class="card-description">

                        Basic bootstrap input groups

                      </p>

                      <div class="form-group">

                        <div class="input-group">

                          <div class="input-group-prepend">

                            <span class="input-group-text">@</span>

                          </div>

                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">

                        </div>

                      </div>

                      <div class="form-group">

                        <div class="input-group">

                          <div class="input-group-prepend">

                            <span class="input-group-text">$</span>

                          </div>

                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">

                          <div class="input-group-append">

                            <span class="input-group-text">.00</span>

                          </div>

                        </div>

                      </div>

                      <div class="form-group">

                        <div class="input-group">

                          <div class="input-group-prepend">

                            <span class="input-group-text">$</span>

                          </div>

                          <div class="input-group-prepend">

                            <span class="input-group-text">0.00</span>

                          </div>

                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

                <div class="col-12 grid-margin stretch-card">

                  <div class="card">

                    <div class="card-body">

                      <h4 class="card-title">Colored input groups</h4>

                      <p class="card-description">

                        Input groups with colors

                      </p>

                      <div class="form-group">

                        <div class="input-group">

                          <div class="input-group-prepend bg-info">

                            <span class="input-group-text bg-transparent">

                              <i class="mdi mdi-shield-outline text-white"></i>

                            </span>

                          </div>

                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon1">

                        </div>

                      </div>

                      <div class="form-group">

                        <div class="input-group">

                          <div class="input-group-prepend bg-primary border-primary">

                            <span class="input-group-text bg-transparent">

                              <i class="mdi mdi mdi-menu text-white"></i>

                            </span>

                          </div>

                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon2">

                        </div>

                      </div>

                      <div class="form-group">

                        <div class="input-group">

                          <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="colored-addon3">

                          <div class="input-group-append bg-primary border-primary">

                            <span class="input-group-text bg-transparent">

                              <i class="mdi mdi-menu text-white"></i>

                            </span>

                          </div>

                        </div>

                      </div>

                      <div class="form-group">

                        <div class="input-group">

                          <div class="input-group-prepend bg-primary border-primary">

                            <span class="input-group-text bg-transparent text-white">$</span>

                          </div>

                          <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)">

                          <div class="input-group-append bg-primary border-primary">

                            <span class="input-group-text bg-transparent text-white">.00</span>

                          </div>

                        </div>

                      </div>

                    </div>

                  </div>

                </div>

              </div>

            </div> -->

            <!-- <div class="col-md-7 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Input size</h4>

                  <p class="card-description">

                    This is the default bootstrap form layout

                  </p>

                  <div class="form-group">

                    <label>Large input</label>

                    <input type="text" class="form-control form-control-lg" placeholder="Username" aria-label="Username">

                  </div>

                  <div class="form-group">

                    <label>Default input</label>

                    <input type="text" class="form-control" placeholder="Username" aria-label="Username">

                  </div>

                  <div class="form-group">

                    <label>Small input</label>

                    <input type="text" class="form-control form-control-sm" placeholder="Username" aria-label="Username">

                  </div>

                </div>

                <div class="card-body">

                  <h4 class="card-title">Selectize</h4>

                  <div class="form-group">

                    <label for="exampleFormControlSelect1">Large select</label>

                    <select class="form-control form-control-lg" id="exampleFormControlSelect1">

                      <option>1</option>

                      <option>2</option>

                      <option>3</option>

                      <option>4</option>

                      <option>5</option>

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleFormControlSelect2">Default select</label>

                    <select class="form-control" id="exampleFormControlSelect2">

                      <option>1</option>

                      <option>2</option>

                      <option>3</option>

                      <option>4</option>

                      <option>5</option>

                    </select>

                  </div>

                  <div class="form-group">

                    <label for="exampleFormControlSelect3">Small select</label>

                    <select class="form-control form-control-sm" id="exampleFormControlSelect3">

                      <option>1</option>

                      <option>2</option>

                      <option>3</option>

                      <option>4</option>

                      <option>5</option>

                    </select>

                  </div>

                </div>

              </div>

            </div> -->

            <!-- <div class="col-md-6 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Checkbox Controls</h4>

                  <p class="card-description">Checkbox and radio controls</p>

                  <form class="forms-sample">

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group">

                          <div class="form-check">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input"> Default

                            </label>

                          </div>

                          <div class="form-check">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input" checked> Checked

                            </label>

                          </div>

                          <div class="form-check">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input" disabled> Disabled

                            </label>

                          </div>

                          <div class="form-check">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input" disabled checked> Disabled checked

                            </label>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <div class="form-radio">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios1" value="" checked> Option one

                            </label>

                          </div>

                          <div class="form-radio">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="optionsRadios" id="optionsRadios2" value="option2"> Option two

                            </label>

                          </div>

                        </div>

                        <div class="form-group">

                          <div class="form-radio disabled">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="optionsRadios2" id="optionsRadios3" value="option3" disabled> Option three is disabled

                            </label>

                          </div>

                          <div class="form-radio disabled">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="optionsRadio2" id="optionsRadios4" value="option4" disabled checked> Option four is selected and disabled

                            </label>

                          </div>

                        </div>

                      </div>

                    </div>

                  </form>

                </div>

              </div>

            </div> -->

            <!-- <div class="col-md-6 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Checkbox Flat Controls</h4>

                  <p class="card-description">Checkbox and radio controls with flat design</p>

                  <form class="forms-sample">

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group">

                          <div class="form-check form-check-flat">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input"> Default

                            </label>

                          </div>

                          <div class="form-check form-check-flat">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input" checked> Checked

                            </label>

                          </div>

                          <div class="form-check form-check-flat">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input" disabled> Disabled

                            </label>

                          </div>

                          <div class="form-check form-check-flat">

                            <label class="form-check-label">

                              <input type="checkbox" class="form-check-input" disabled checked> Disabled checked

                            </label>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group">

                          <div class="form-radio form-radio-flat">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="flatRadios1" id="flatRadios1" value="" checked> Option one

                            </label>

                          </div>

                          <div class="form-radio form-radio-flat">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="flatRadios2" id="flatRadios2" value="option2"> Option two

                            </label>

                          </div>

                        </div>

                        <div class="form-group">

                          <div class="form-radio form-radio-flat disabled">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="flatRadios3" id="flatRadios3" value="option3" disabled> Option three is disabled

                            </label>

                          </div>

                          <div class="form-radio form-radio-flat disabled">

                            <label class="form-check-label">

                              <input type="radio" class="form-check-input" name="flatRadios4" id="flatRadios4" value="option4" disabled checked> Option four is selected and disabled

                            </label>

                          </div>

                        </div>

                      </div>

                    </div>

                  </form>

                </div>

              </div>

            </div> -->

            <!-- <div class="col-12 grid-margin">

              <div class="card">

                <div class="card-body">

                  <h4 class="card-title">Horizontal Two column</h4>

                  <form class="form-sample">

                    <p class="card-description">

                      Personal info

                    </p>

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">First Name</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" />

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Last Name</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" />

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Gender</label>

                          <div class="col-sm-9">

                            <select class="form-control">

                              <option>Male</option>

                              <option>Female</option>

                            </select>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Date of Birth</label>

                          <div class="col-sm-9">

                            <input class="form-control" placeholder="dd/mm/yyyy" />

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Category</label>

                          <div class="col-sm-9">

                            <select class="form-control">

                              <option>Category1</option>

                              <option>Category2</option>

                              <option>Category3</option>

                              <option>Category4</option>

                            </select>

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Membership</label>

                          <div class="col-sm-4">

                            <div class="form-radio">

                              <label class="form-check-label">

                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios1" value="" checked> Free

                              </label>

                            </div>

                          </div>

                          <div class="col-sm-5">

                            <div class="form-radio">

                              <label class="form-check-label">

                                <input type="radio" class="form-check-input" name="membershipRadios" id="membershipRadios2" value="option2"> Professional

                              </label>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <p class="card-description">

                      Address

                    </p>

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Address 1</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" />

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">State</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" />

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Address 2</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" />

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Postcode</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" />

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="row">

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">City</label>

                          <div class="col-sm-9">

                            <input type="text" class="form-control" />

                          </div>

                        </div>

                      </div>

                      <div class="col-md-6">

                        <div class="form-group row">

                          <label class="col-sm-3 col-form-label">Country</label>

                          <div class="col-sm-9">

                            <select class="form-control">

                              <option>America</option>

                              <option>Italy</option>

                              <option>Russia</option>

                              <option>Britain</option>

                            </select>

                          </div>

                        </div>

                      </div>

                    </div>

                  </form>

                </div>

              </div>

            </div> -->

          </div>

        </div>

        <!-- content-wrapper ends -->

        
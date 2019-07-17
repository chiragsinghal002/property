<?php 
$cur_tab = $this->uri->segment(2)==''?'dashboard': $this->uri->segment(2); 
// echo "<pre>";
// print_r($_SESSION); 
?>
<div class="container-fluid page-body-wrapper">
<nav class="sidebar sidebar-offcanvas" id="sidebar">
        <ul class="nav">
          <li class="nav-item nav-profile">
            <div class="nav-link">
              <div class="user-wrapper">
                <div class="profile-image">
                  <img src="<?= base_url() ?>public/images/faces/face1.jpg" alt="profile image">
                </div>
                <div class="text-wrapper">
                  <p class="profile-name"><?= ucwords($this->session->userdata('name')); ?></p>
                  <div>
                    <small class="designation text-muted"><?= ucwords($this->session->userdata('usertype')); ?></small>
                    <span class="status-indicator online"></span>
                  </div>
                </div>
              </div>
            <!--   <button class="btn btn-success btn-block">New Project
                <i class="mdi mdi-plus"></i>
              </button> -->
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>index.php/dashboard">
              <i class="menu-icon mdi mdi-television"></i>
              <span class="menu-title">Dashboard</span>
            </a>
          </li>
          <!-- <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basica" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Dealers</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basica">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/listing/dealers">Dealers List</a>
                </li>             
              </ul>
            </div>
          </li> -->

          <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>index.php/listing/dealers">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Dealers </span>
            </a>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
                <a href=""> <span class="menu-title">Category</span> </a>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/listing/">Category List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/category">Add Category</a>
                </li>
              </ul>
            </div>
          </li>

          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic1" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Sub Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic1">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/listing/subcategory">SubCategory List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/subcategory">Add SubCategory</a>
                </li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic2" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">ChildSub Category</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic2">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/listing/subchildcategory">ChildsubCategory List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/childsubcategory">Add ChildsubCategory</a>
                </li>
              </ul>
            </div>
          </li>
           <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basic3" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Manage Setting</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basic3">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/listing/unit_size">Unit & Size</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/unit_size">Add Unit & Size</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/size">Add Size</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/price_range">Add Price Range</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/bedroom">Add Bedroom</a>
                </li>
              </ul>
            </div>
          </li>


          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basics7" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Property Type</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basics7">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/listing/property_type">Property Type List</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/add/property_type">Add Property Type</a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link" data-toggle="collapse" href="#ui-basics9" aria-expanded="false" aria-controls="ui-basic">
              <i class="menu-icon mdi mdi-content-copy"></i>
              <span class="menu-title">Manage Property</span>
              <i class="menu-arrow"></i>
            </a>
            <div class="collapse" id="ui-basics9">
              <ul class="nav flex-column sub-menu">
                <li class="nav-item">
                  <a class="nav-link" href="<?= base_url() ?>index.php/listing/manage_property">Property List</a>
                </li>
              </ul>
            </div>
          </li>
         

           <li class="nav-item">
            <a class="nav-link" href="<?= base_url() ?>index.php/auth/logout">
              <i class="menu-icon mdi mdi-backup-restore"></i>
              <span class="menu-title">Logout </span>
            </a>
          </li>
         
         
        </ul>
      </nav>
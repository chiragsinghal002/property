<body>
  
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
           <!--  <?php 
              var_dump($subcategory);
            ?> -->
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Unit Size List</h4>
                  <button class="unitsize_btn"><a href="<?= base_url() ?>index.php/add/unit_size">Add Unit & Size</a></button>
                  <!-- <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Category Name</th>
                          <th>SubCategory Name</th>
                           <th>ChildCategory Name</th>
                           <th>Units</th>
                          <th>Property Type</th>
                          <th>Status</th>
                          
                                               
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $i = 1;
                        foreach($subchildcategory as $row){
                          
                         ?>
                       
                        <tr>
                         <td>
                            <?php echo $i++;?>
                          </td>
                          <td><?php echo $row['cat_name'];?></td>
                          <td><?php echo $row['subcat_name'];?></td>
                          <td><?php echo $row['subchild_name'];?></td>
                           <td><?php echo $row['unit_size'];?></td>
                          <td>
                            <?php echo ($row['property_type']==0)?'Residential':'Commercial';?></td>
                          <td>
                            <?php echo ($row['status']==1)?'Active':'Inactive';?></td>
                          </td>
                          <!-- <td>
                           <a href="<?= base_url('index.php/edit/category/'.$row['subcat_id']); ?>"><button type="button" class="btn btn-success btn-fw">Edit</button></a>
                        <a href="<?= base_url('index.php/delete/category/'.$row['subcat_id']); ?>"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm_alert(this);">Delete</button></a>
                          </td> -->
                          
                        </tr>
                       <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
                       
           </div>
        </div>
        <!-- content-wrapper ends -->
        <script type="text/javascript">
                function confirm_alert(node) {
                  return confirm("Are You Sure Want to Delete this ?");
                }
              </script>
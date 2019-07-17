<body>
  
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category List</h4>

              <form method="get" class="grid-none" action="<?= base_url('index.php/listing/'); ?>">
            <input type="text" name="cat_name" value="<?php if(!empty($_GET['cat_name'])){ echo $_GET['cat_name']; } ?>" placeholder="Category" />&nbsp;
           
            <input type="submit" name="submit" value="Search" />
       <!--  <a href="<?= base_url('admin/hotels/'); ?>">Reset</a> -->
         </form>

                  <button class="categry_btn"> <a href="<?= base_url() ?>index.php/add/category">Add Category</a></button>
                  <!-- <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Name</th>
                          <th> Status</th>
                          <th> Action</th>
                                               
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $i = 1;
                        foreach($all_info as $row){
                          
                         ?>
                       
                        <tr>
                         <td>
                            <?php echo $i++;?>
                          </td>
                          <td><?php echo $row['cat_name'];?></td>
                          <td>
                            <?php echo ($row['cat_status']==1)?'Active':'Inactive';?></td>
                          </td>
                          <td>
                           <a href="<?= base_url('index.php/edit/category/'.$row['cat_id']); ?>"><button type="button" class="btn btn-success btn-fw">Edit</button></a>
                        <a href="<?= base_url('index.php/delete/category/'.$row['cat_id']); ?>"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm_alert(this);">Delete</button></a>
                          </td>
                          
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
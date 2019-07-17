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
                  <h4 class="card-title">Property Options List</h4>
                  <form method="get" class="grid-none" action="<?= base_url('index.php/listing/subchildcategory'); ?>">                

                  <select name="cat_id">
                     <option value="">Select Category</option>
               <?php  
                 foreach ($categoryfilter as $key) { 
                 

                  ?>
                      <option value="<?php echo $key['cat_id'];?>"
                        <?php if(!empty($_GET['cat_id']) && $_GET['cat_id'] == $key['cat_id']){ echo 'selected'; } ?>
                        ><?php echo $key['cat_name'];?></option>
                      <?php
                    }                 
                  ?> 
                  </select>&nbsp;

                  <select name="subcat_id">
                     <option value="">Select Subcategory</option>
               <?php  
                 foreach ($subcategory as $subcat) { 
                  // echo "<pre>";
                  // print_r($subcat);
                  ?>
                      <option value="<?php echo $subcat['subcat_id'];?>"
                        <?php if(!empty($_GET['subcat_id']) && $_GET['subcat_id'] == $subcat['subcat_id']){ echo 'selected'; } ?>
                        ><?php echo $subcat['subcat_name'];?></option>
                      <?php
                    }                 
                  ?> 
                  </select>&nbsp;

                    <input type="text" name="subchild_name" value="<?php if(!empty($_GET['subchild_name'])){ echo $_GET['subchild_name']; } ?>" placeholder="ChildCategory Name" />&nbsp;

                     <select name="property_type" >
                      <option value="">Select</option>
                      <?php echo $_GET['property_type'];?>
                     <option value="1"<?php if(!empty($_GET['property_type']) && $_GET['property_type'] == 1){ echo 'selected'; }else{} ?>>Commercial</option>
                     <option value="0"<?php if(!empty($_GET['property_type']) && $_GET['property_type'] == 0){ echo 'selected'; }else{} ?>>Residential</option>
                      
                    </select>&nbsp;                                
                   
             
            
           
            <input type="submit" name="submit" value="Search" />
       <!--  <a href="<?= base_url('admin/hotels/'); ?>">Reset</a> -->
         </form>
                   <button class="subchild_btn"><a href="<?= base_url() ?>index.php/add/childsubcategory">Add Option for property</a></button>
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
                          <th>Property Type</th>
                          <th> Status</th>
                          <th> Action</th>
                                               
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
                          <td><?php if(!empty($row['subcat_name'])){echo $row['subcat_name'];}else{}?></td>
                            <td><?php if(!empty($row['subchild_name'])){echo $row['subchild_name'];}else{}?></td>
                          <td>
                            <?php echo ($row['property_type']==0)?'Residential':'Commercial';?></td>
                          <td>
                            <?php echo ($row['status']==1)?'Active':'Inactive';?></td>
                          </td>
                          <td>
                           <a href="<?= base_url('index.php/edit/category/'.$row['subcat_id']); ?>"><button type="button" class="btn btn-success btn-fw">Edit</button></a>
                        <a href="<?= base_url('index.php/delete/subchildcategory/'.$row['subchild_id']); ?>"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm_alert(this);">Delete</button></a>
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
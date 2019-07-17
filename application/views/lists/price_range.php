<body>
  
      <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
            
            
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Prize Range List</h4>
                  <!-- <p class="card-description">
                    Add class
                    <code>.table-striped</code>
                  </p> -->
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>S.No.</th>
                          <th>Min Range</th>
                           <th>Max Range</th>
                          <th> Status</th>
                          <th> Action</th>
                                               
                        </tr>
                      </thead>
                      <tbody>
                       <?php 
                        $i = 1;
                        foreach($price_range as $row){
                          
                         ?>
                       
                        <tr>
                         <td>
                            <?php echo $i++;?>
                          </td>
                          <td><?php echo $row['min_range'];?></td>
                          <td><?php echo $row['max_range'];?></td>
                          <td>
                            <?php echo ($row['status']==1)?'Active':'Inactive';?></td>
                          </td>
                          <td>
                           <a href="<?= base_url('index.php/edit/price_range/'.$row['id']); ?>"><button type="button" class="btn btn-success btn-fw">Edit</button></a>
                        <a href="<?= base_url('index.php/delete/price_range/'.$row['id']); ?>"><button type="button" class="btn btn-danger btn-fw" onclick="return confirm_alert(this);">Delete</button></a>
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
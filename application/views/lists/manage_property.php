<body> 

      <div class="main-panel">

        <div class="content-wrapper">

          <div class="row">       

            

            <div class="col-lg-12 grid-margin stretch-card">

              <div class="card">

                <div class="card-body">

                  <!-- <h4 class="card-title">Dealers List</h4> -->
                  
                <!--  <input type="text" name="search_text" id="search_text" placeholder="Search by Customer Details">

                 <div id="result">
                   
                 </div> -->
                  <!-- <p class="card-description">

                    Add class

                    <code>.table-striped</code>

                  </p> -->
                  <?php //var_dump($dealers);?>

                  <div class="table-responsive">

                    <table class="table table-striped">

                      <thead>

                        <tr>

                          <th>S.No.</th>

                          <th>Name</th>

                          <th>Email</th>

                           <th>Phone</th>
                           <th>City</th>
                           <th>Address</th>
                           <th>Sector</th>

                          <th>Status</th>

                          <th> Action</th>

                                               

                        </tr>

                      </thead>

                      <tbody>

                       <?php 

                        $i = 1;

                        foreach($dealers as $row){ 

                          // echo "<pre>";

                          // print_r($row);

                          ?>

                       

                        <tr>

                         <td>

                            <?php echo $i++;?>

                          </td>

                          <td><?php echo $row['dealer_first_name'];?></td>

                          <td><?php echo $row['dealer_email'];?></td>

                          <td><?php echo $row['dealer_phone'];?></td>
                           
                           <td><?php echo $row['city'];?></td>

                          <td><?php echo $row['dealer_address'];?></td>

                            <td><?php echo $row['sector'];?></td>                          



                          

                          <td>

                              <?php echo ($row['dealer_status']==1)?'Active':'Inactive';?></td> 
                             <!-- <select>
                              <option><?php echo $row['dealer_status']?></option>
                             
                            </select> --> 

                          </td>

                          <td>

                           <a href="<?= base_url('index.php/listing/getAllProperties/'.$row['dealer_id']); ?>"><button type="button" class="btn btn-success btn-fw">View Property</button></a>

                          

                     

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






$(document).ready(function(){
  load_data();
  function load_data(query)
  {
    $.ajax({
      url:"fetch.php",
      method:"post",
      data:{query:query},
      success:function(data)
      {
        $('#result').html(data);
      }
    });
  }
  
  $('#search_text').keyup(function(){
    var search = $(this).val();
    if(search != '')
    {
      load_data(search);
    }
    else
    {
      load_data();      
    }
  });
});

     </script>


        
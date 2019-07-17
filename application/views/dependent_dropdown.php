<!DOCTYPE html>
<html>
<head>
    <title>Codeigniter Dependent Dropdown Example with demo</title>
    <link rel="stylesheet" href="http://www.expertphp.in/css/bootstrap.css">    
    <script src="http://demo.expertphp.in/js/jquery.js"></script>
</head>

<body>
<div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">Populate dropdown using ajax in codeigniter</div>
      <div class="panel-body">

            <div class="form-group">
                <label for="title">Select Country:</label>
                <select name="country" class="form-control">
                    <option value="">Select Country</option>
                    <?php
                        if(!empty($countries)){
                            foreach ($countries as $value) {

                                ?>
                                <option value="<?php echo $value['cuisines_id'];?>"><?php echo $value['cuisines_name'];?></option>
                                <?php
                                //echo "<option value='".$value['cuisine_id']."'>".$value['cuisines_name']."</option>";
                            }
                        }else{
                            echo '<option value="">Country not available</option>';
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="title">Select State:</label>
                <select name="state" class="form-control">
                </select>
            </div>


      </div>
    </div>
</div>

<script type="text/javascript">

    $(document).ready(function() {
        $('select[name="country"]').on('change', function() {
            var countryId = $(this).val();
            alert(countryId);
            if(countryId) {
                $.ajax({
                    url: 'dependent-dropdown/ajax/'+countryId,
                    type: "GET",
                    dataType: "json",
                    success:function(data) {
                        alert(data);
                        $('select[name="state"]').empty();
                        $.each(data, function(key, value) {
                            $('select[name="state"]').append('<option value="'+ value.id +'">'+ value.name +'</option>');
                        });
                    }
                });
            }else{
                $('select[name="state"]').empty();
            }
        });
    });
</script>


</body>
</html>
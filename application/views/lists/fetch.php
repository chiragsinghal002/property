<?php
$connect = mysqli_connect("localhost", "root", "", "property");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
	SELECT * FROM dealer 
	WHERE dealer_first_name LIKE '%".$search."%'";
}
else
{
	$query = "
	SELECT * FROM dealer ORDER BY dealer_id";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>Phone</th>
							<th>Email</th>
							<th>Type</th>
							
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["dealer_phone"].'</td>
				<td>'.$row["dealer_email"].'</td>
				<td>'.$row["dealer_type"].'</td>
				
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>
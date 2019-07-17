<?php include_once'include/header.php';
	include_once 'Object.php';
?>
<?php 
	if(isset($_GET['key'])){
		$data['key']=$_GET['key'];
		$common->verifyEmailMatch($data);
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Verify Email</title>
</head>
<body>
	<p>Your Email Has Been Verified</p>
</body>
</html>
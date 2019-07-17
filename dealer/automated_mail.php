<?php include_once'Object.php';?>
<?php 
	$result=$automated->getDealerInfobyId();
	foreach($result as $user){
		$data=$automated->getResidencialProperty($user['dealer_id']);

		$to=$user['dealer_email'];

		foreach($data as $userproperty){
			//  echo '<pre>';
			//  var_dump($userproperty);
			// echo 'chirag';
			
			$message .=$userproperty['property_id'];
			$message .=$userproperty['property_code'].'<br>';
			

		}
		$automated->getNotifiedUser($message,$to);
	}
?>
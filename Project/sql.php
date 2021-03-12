<?php
	session_start();

	$db = mysqli_connect("localhost","root","usbw","project");
	$errors = [];

	if(!isset($_POST['code'])) {$code = 0;};
	if(isset($_POST['code'])) {$code = $_POST['code'];};

	if($code != 0) 
	{
		$query = "SELECT * FROM code WHERE 	code = '$code'";
		$result = mysqli_query($db, $query);
		$result = mysqli_fetch_assoc($result);

		if($result) 
		{
			$query2 = "DELETE FROM `code` WHERE code = '$code'";
			mysqli_query($db, $query2);
			header('location: login.php');
		}

		else 
		{
			array_push($errors, "Oeps! deze code bestaat niet...");
		}
	}
?>
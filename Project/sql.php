<?php
	session_start();

	$db = mysqli_connect("localhost","root","usbw","project");
	$errors = [];

	if(!isset($_POST['code'])) {$code = 0;};
	if(isset($_POST['code'])) {$code = $_POST['code'];};

	if($code != 0) 
	{
		$query = "SELECT code FROM code WHERE 	code = '$code'";
		$result = mysqli_query($db, $query);
		$result = mysqli_fetch_assoc($result);

		if($result) 
		{
			$query2 = "SELECT klas FROM code WHERE 	code = '$code'";
			$_SESSION['klas'] = mysqli_query($db, $query2)->fetch_object()->klas;
			$query3 = "DELETE FROM `code` WHERE code = '$code'";
			mysqli_query($db, $query3);
			$_SESSION['klasConfirm'] = true;
			header('location: login.php');
		}

		else 
		{
			array_push($errors, "Oeps! deze code bestaat niet...");
		}
	}
	function getKlasNames($id) {
		$db = mysqli_connect("localhost","root","usbw","project");
		$query = mysqli_query($db,"SELECT `vn`, `tv`, `an`, `llnr` FROM `leerlingen` WHERE klas = '$id'");
		
		$_SESSION['namen'] = array();
		
		while($row  = mysqli_fetch_assoc($query)){
			$_SESSION['namen'][]  = $row;
		}
		
	}

?>

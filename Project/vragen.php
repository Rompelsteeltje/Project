<?php
	include('sql.php');
	include('errors.php');
	
	if(!isset($_SESSION["count"])){$_SESSION["count"] = 0;}
	if($_SESSION["count"] >= 79){$_SESSION["count"] = 0;}
	
	if(isset($_POST[$_SESSION["count"]]))
	{
		echo "<br>" . $_SESSION['userNumber'] . "<br>";
		echo $_SESSION["count"] . "<br>";
		echo $_POST[$_SESSION['nameAnswer']] . "<br>";
		
		storeAnswer($_SESSION['userNumber'], $_SESSION["count"], $_POST[$_SESSION['nameAnswer']]);
		$_SESSION["count"]++;
	}
	Makecode("1A");
	$_SESSION['nameAnswer'] = "vraag" . $_SESSION["count"];
?>

<form action="/Project/vragen.php" method="post">
	<a><?php getQuestion($_SESSION["count"]);?></a><br>
	<input type="radio" name="<?php echo $_SESSION['nameAnswer']; ?>" value="0" required>
	<label for="<?php echo $_SESSION['nameAnswer']; ?>">Dat is zo</label><br>
	<input type="radio" name="<?php echo $_SESSION['nameAnswer']; ?>" value="1">
	<label for="<?php echo $_SESSION['nameAnswer']; ?>">Dat weet ik niet</label><br>
	<input type="radio" name="<?php echo $_SESSION['nameAnswer']; ?>" value="2">
	<label for="<?php echo $_SESSION['nameAnswer']; ?>">Dat is niet zo</label><br>
	<input type="submit" name="<?php echo $_SESSION["count"]; ?>" value = "volgende vraag">
</form>

<?php 
	include('sql.php');
	include('errors.php');
	
	
	getKlasNames($_SESSION['klas']);
	$names = $_SESSION['namen'];
	
	
	$length = count($names) - 1;
	
	
	$currentSubmitLogin = "inlog1";
	
	if(isset($_POST['inlog1']))
	{
		unset($_SESSION['klasConfirm']);
		$currentSubmitLogin = "inlog2";
	}
	if(isset($_POST['inlog2']))
	{
		$_SESSION['userNumber'] = $_POST['selectNamen'];
		header('location: vragen.php');
	}	
?>
<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<div class="input">	
			<div class="header">
				<h2>vul je gegevens in<h2>
			</div>
			
			<form action="/Project/login.php" method="post">
				<?php if(!isset($_SESSION['klasConfirm']))
				{?>
				<select name="selectNamen">
				<?php 
					for($i=0; $i<=$length; $i++){
						echo '<option value="' . $names[$i]['llnr'] . '">' . $names[$i]['vn'] . ' ' . $names[$i]['tv'] . ' ' . $names[$i]['an'] . '</option>';
					}

				?>
				</select>
				<?php 
				} 
				else
				{
					echo "<h1> Is " . $_SESSION['klas'] . " jouw klas?</h1> <br>";
				}
				?>
				<input type="submit" name="<?php echo $currentSubmitLogin ?>" value="Volgende">
			
				
			</form>
		</div>		
	</body>
</html>
<HTML>
	<head>
		<title>Docent</title>
	</head>
	<body>
		<div class="input">	
			<div class="header">
				<h2>vul je gegevens in<h2>
			</div>
			
			<form action="docentlogin.php" method="post">
			<?php include('sql.php') ?>
			<?php include('errors.php') ?>
				<div>
					<label for="naam">naam : </label>
					<input type="text" name="naam"> 
				</div>
				
				<div>
					<label for="ww">wachtwoord : </label>
					<input type="password" name="ww"> 
				</div>
				
				<div>
					<input type="submit" name="docentLogin">
				
			</form>
		</div>		
	</body>
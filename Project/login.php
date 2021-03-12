<html>
	<head>
		<title>Login</title>
	</head>
	<body>
		<div class="input">	
			<div class="header">
				<h2>vul je gegevens in<h2>
			</div>
			
			<form action="/login.php" method="post">
			<?php include('sql.php') ?>
			<?php include('errors.php') ?>
				<div>
					<label for="naam">naam : </label>
					<input type="text" name="naam" required>
				</div>
				
				<div>
					<label for="klas">klas : </label>
					<input type="text" name="klas" required> 
				</div>
				
				<div>
					<label for="geslacht">geslacht : </label>
					<input type="text" name="gesalcht" required> 
				</div>
			</form>
		</div>		
	</body>
</html>
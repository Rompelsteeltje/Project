<?php
	
	
	



?>






<HTML>
	<head>
		<title>Docent</title>
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
					<label for="dnaam">naam : </label>
					<input type="text" name="dnaam" required> 
				</div>
				
				<div>
					<label for="dww">wachtwoord : </label>
					<input type="password" name="dww" required> 
				</div>
				
			</form>
		</div>		
	</body>
	
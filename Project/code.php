<HTML>
	<head>
		<title>Login</title>
	</head>
	<body>
		<div class="input">	
			<div class="header">
				<h2>vul je code in<h2>
			</div>
			<form action="/Project/code.php" method="post">
				<?php include('sql.php'); ?>
				<?php include('errors.php') ?>
				<?php include('calculate.php'); ?>
				<div>
					<label for="code">code : </label>
					<input type="text" name="code" > 
					<input type="submit" name="submit" value="(pijltje)">
					
				</div>
				
				
			</form>
			<div>
				<form action="/Project/docentlogin.php" method ="post">
					<input type="submit" name="docent" value="Ik ben docent(e)">
				</form>
			</div>
		</div>		
	</body>
</HTML>
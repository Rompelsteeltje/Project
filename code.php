<HTML>
    <head>
		<link rel="stylesheet" type="text/css" href="inlogpagina.css">
        <title>Code</title>
    </head>
    <body>
        <body class="body">
			<div id="header"> 
				Code 
				<img src="achtergrond/logo.svg" height="30px">
			</div>
			<div id="wrapper">
				<div id="main">
					<div class="input">
						Vul hieronder de code in die je hebt gekregen van je docent(e)
						<form action="/Project/code.php" method="post">
							<?php include('sql.php'); ?>
							<?php include('errors.php') ?>
							<div id="codeholder">
								<input type="text" id="code" name="code" placeholder="Vul hier je code in..."> 
								<input type="submit" id="submit1" name="submit" value="verzend">
							</div>
						</form>
						<div>
							<form action="/Project/docent.php" method ="post">
							Docenten kunnen via onderstaande knop inloggen<br>
								<input type="submit" id="submit2" name="docent" value="Ik ben docent(e)">
							</form>
						</div>
					</div>
				</div>
			</div>
		<div id="footer">
		</div>
    </body>
</HTML>
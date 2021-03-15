<HTML>
    <head>
		<link rel="stylesheet" type="text/css" href="inlogpagina.css">
        <title>Tabel</title>
    </head>
    <body>
        <body class="body">
			<div id="header"> 
				Tabel
				<img src="achtergrond/logo.svg" height="30px">
			</div>
			<div id="wrapper">
				<div id="main">
					<form action="docentleerlingen.php" method="post">
						<select name="selectDocentKlas" id="select">
							<option value="dummy" selected disabled>Kies een klas</option>
							<?php 
								for($i=0; $i<5; $i++)
								{
									echo '<option value="' . 4 . '">' . 4 . '</option>';
								}
							?>
						</select>
						<input type="submit" id="submit1" name="docentGetResults" value="Vraag resultaten op">
					</form>
					<form action="code.php">
						<table id="tabel">
							<tr>
								<th>kolom1</th>
								<th>kolom2</th>
							</tr>
							<tr>
								<td><input type="submit" id="submit3" name="naam" value="klfajsddklfhaslkdfhakldhjsfklahsdfkahsdkfl"></td>
								<td>kolom2</td>
							</tr>
							<tr>
								<td><input type="submit" id="submit3" name="naam" value="naam"></td>
								<td>kolom2</td>
							</tr>
							<tr>
								<td><input type="submit" id="submit3" name="naam" value="naam"></td>
								<td>kolom2</td>
							</tr>
							<tr>
								<td><input type="submit" id="submit3" name="naam" value="naam"></td>
								<td>kolom2</td>
							</tr>
						</table>
					</form>
					<div id="radio">
						<form action="/Project/vragen.php" method="post">
							<a><?php //getQuestion($_SESSION["count"]);?></a><br>
							<input type="radio" name="<?php echo $_SESSION['nameAnswer']; ?>" value="0" required>
							<label for="<?php echo $_SESSION['nameAnswer']; ?>">Dat is zo</label><br>
							<input type="radio" name="<?php echo $_SESSION['nameAnswer']; ?>" value="1">
							<label for="<?php echo $_SESSION['nameAnswer']; ?>">Dat weet ik niet</label><br>
							<input type="radio" name="<?php echo $_SESSION['nameAnswer']; ?>" value="2">
							<label for="<?php echo $_SESSION['nameAnswer']; ?>">Dat is niet zo</label><br>
							<input type="submit" id="submit2" name="<?php echo $_SESSION["count"]; ?>" value="Volgende vraag">
						</form>
					</div>
				</div>
			</div>
		<div id="footer">
		</div>
    </body>
</HTML>
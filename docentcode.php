  
<?php 
	include('sql.php');
	include('errors.php');
	getKlassen();
	
	
	if(isset($_POST['docentGetCodes']))
	{
		makeCode($_POST['selectDocentKlas']);
		unset($_POST['selectGetCodes']);
	}
	
	if(isset($_POST['docentDestroyCodes']))
	{
		destroyCodes($_POST['selectDocentKlas']);
		unset($_POST['selectDestroyCodes']);
	}
	
?>
<form action="docentcode.php" method="post">
	<select name="selectDocentKlas">
		<option value="dummy" selected disabled>Kies je klas</option>
		<?php 
			for($i=0; $i<count($_SESSION['docentKlassen']); $i++)
			{
				echo '<option value="' . $_SESSION['docentKlassen'][$i]['klas'] . '">' . $_SESSION['docentKlassen'][$i]['klas']. '</option>';
			}
		?>
	</select>
	<input type="submit" name="docentGetCodes" value="Vraag codes op">
	<input type="submit" name="docentDestroyCodes" value="Verwijder alle codes voor deze klas">
	
</form>
<ul>
<?php
	if(isset($_POST['docentGetCodes']))
	{
		
		for($i=0; $i < count($_SESSION['codes']); $i++)
		{
			echo "<li>" . $_SESSION['codes'][$i] . "</li>";
			
		}
	}
?>
</ul>
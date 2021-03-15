<?php 
	include('sql.php');
	include('errors.php');
	getKlassen();
	if(isset($_POST['docentGetResults']))
	{
		
		unset($_POST['selectGetResults']);
	}
	
?>
<form action="docentleerlingen.php" method="post">
	<select name="selectDocentKlas">
		<option value="dummy" selected disabled>Kies je klas</option>
		<?php 
			for($i=0; $i<count($_SESSION['docentKlassen']); $i++)
			{
				echo '<option value="' . $_SESSION['docentKlassen'][$i]['klas'] . '">' . $_SESSION['docentKlassen'][$i]['klas']. '</option>';
			}
		?>
	</select>
	<input type="submit" name="docentGetResults" value="Vraag resultaten op">
</form>
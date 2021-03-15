<?php 
	include('sql.php');
	include('errors.php');
	include('calculate.php');
	
	getKlassen();
	
	if(isset($_POST['docentGetResults']))
	{
		
		unset($_POST['selectGetResults']);
	}
	

	
	/*
	echo "<pre>";
	var_dump($results->definiteResults);
	echo "</pre>";
	*/
?>
<form action="docentleerlingen.php" method="post">
	<select name="selectDocentKlas" required>
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
<?php
	if(isset($_POST['docentGetResults']))
	{
		if(isset($_POST['selectDocentKlas']))
		{
			countllnr($_POST['selectDocentKlas']);
			$results = getResults($_POST['selectDocentKlas']);
			$results = sortResultsByLlnr($results);
	
		
?>
		<table style="width:100%">
		  <tr>
			<th>naam</th>
			<th>llnr</th>
			<th>geslacht</th>
			<th>C</th>
			<th>H</th>
			<th>L</th>
			<th>P</th>
			<th>R</th>
			<th>S</th>
			<th>U</th>
			<th>V</th>
			<th>W</th>
			<th>Z</th>
		  </tr>
			<?php
			$loop = [];
			for ($i = 0; $i < count($results); $i++)
			{
				$allResults = new Normering($results[$i]);
				getNamellnr($allResults->llnr);
				echo "<tr>" ;
					echo "<td>" . $_SESSION['leerlingName'] . "</td>";
					echo "<td>" . $allResults->llnr . "</td>";
					echo "<td>" . $allResults->geslacht . "</td>";
					for ($j = 0; $j < 10; $j++)
					{
						echo "<td>" . $allResults->definiteResults[$j][1] . "</td>";
					}
			}
		}
		  ?>
		</table>
		
<?php
}
?>
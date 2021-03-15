  
<?php 
	include('sql.php');
	include('errors.php');
	include('calculate.php');
	
	getKlassen();
	
	if(isset($_POST['docentGetResults']))
	{
		
		unset($_POST['selectGetResults']);
	}
	
	$results = getResults("");
	$results = sortResultsByLlnr($results);
	$results = new Normering($results[0]);
	/*
	echo "<pre>";
	var_dump($results->definiteResults);
	echo "</pre>";
	*/
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
	for ($i = 0; $i <
	  <tr>
		<td>Jill</td>
		<td>Smith</td>
		<td>50</td>
	  </tr>
	 
  ?>
</table>
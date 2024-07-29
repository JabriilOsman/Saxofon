<?php
	include "db_forbindelse.php";
	$forbindelse = mysqli_connect('localhost', 'root', '');

	//Velger databasen
	mysqli_select_db($forbindelse,'mindb');
	//Først hente ut data fra tabell Avtaler
	$sql_beskjed= "DELETE FROM Beskjed WHERE Beskjed_id='$_GET[Beskjed_id]'";


	if (@mysqli_query($forbindelse,$sql_beskjed)) {
		header("refresh:0.5; url=beskjed.php");
	}
	else{
		echo "Klarte ikke å slette";
	}

	?>

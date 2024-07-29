<?php
	include "db_forbindelse.php";
	$forbindelse = mysqli_connect('localhost', 'root', '');

	//Velger databasen
	mysqli_select_db($forbindelse,'mindb');
	//Først hente ut data fra tabell Avtaler
	$sql_avtaler= "DELETE FROM Avtaler WHERE Avtale_id='$_GET[Avtale_id]'";


	if (@mysqli_query($forbindelse,$sql_avtaler)) {
		header("refresh:0.5; url=minside.php");
	}
	else{
		echo "Klarte ikke å slette";
	}

	?>

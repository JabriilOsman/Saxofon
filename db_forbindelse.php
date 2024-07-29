<?php

$snavn= "localhost";
$un= "root";
$passord = "";

$db_navn = "mindb";

$forbindelse = mysqli_connect($snavn, $un, $passord, $db_navn);

if (!$forbindelse) {
	echo "Forbindelse mislykkets!";
}
?>


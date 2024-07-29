<?php

//Forbindelse
include "db_forbindelse.php";
	//Nå hente ut data fra tabell Beskjed
	$sql_beskjed = "SELECT * FROM Beskjed ORDER BY b_Navn";
	$resultat_beskjed = mysqli_query($forbindelse, $sql_beskjed);

?>

<!DOCTYPE html>
<html>
<head>
	<link rel=" stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/0ed0f6f26c.js" crossorigin="anonymous"></script>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Beskjed</title>
</head>
<body>
	<nav>
            <div class="logo">
            <h1><a href="index.html"><img src="logo.png" alt=""> </a> </h1>
            </div>

                <ul class="linker">
                <li><a href="index.html"> HJEM </a> </li>
                    <li><a href="minside.php"> AVTALER </a> </li>
                    <li><a href="beskjed.php"> BESKJEDER </a> </li>
                    <li><a href="index.html"> LOGG UT </a> </li>
                </ul>
            </nav>

            <script type="text/javascript">
                window.addEventListener("scroll", function(){
                    var nav = document.querySelector("nav");
                    nav.classList.toggle("sticky", window.scrollY > 0)
                })
            </script>


		<section id="beskjed-delen">
		<div class="avtaler">
		<h2> Beskjed fra kunder </h2> 
        <table>
			<!-- Tabell for Beskjed -->
		<tr>
			<!--<th>Beskjed_ID</th>-->
			<th>Navn</th>
			<th>E-post</th>
			<th>Telefon</th>
			<th>Beskjed</th>
			<th>Slett</th> 
		</tr>
		<?php $i=0;
			 while ($row = mysqli_fetch_array($resultat_beskjed)) { ?>
			<tr>
				<!--<td><?php //echo $row['Beskjed_id']; ?> </td> -->
				<td><?php echo $row['b_Navn']; ?></td>
				<td><?php echo $row['b_Epost']; ?></td>
				<td><?php echo $row['b_Telefon']; ?></td>
				<td><?php echo $row['b_Beskjed']; ?></td>
				<td><a href="slettBeskjed.php?Beskjed_id=<?php echo $row["Beskjed_id"]; ?>">&#x274C;</a></td>
			</tr>
		<?php $i++;
		 } ?>
	</table>
	</div> 
		</section>


</body>


</html>
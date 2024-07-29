<?php
	
//Forbindelse
include "db_forbindelse.php";

	//Først hente ut data fra tabell Avtaler
	$sql_avtaler= "SELECT * FROM Avtaler order BY Dato";
	$resultat_avtaler = mysqli_query($forbindelse,$sql_avtaler);
	
	//Nå hente ut data fra tabell Beskjed
	$sql_beskjed = "SELECT * FROM Beskjed";
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
	<title>Avtaler</title>
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

    <section id="avtaledelen">
	<div class="avtaler">
	<h2> Booking avtaler </h2> 
	<table>
	<!-- Tabell for Avtaler -->
		<tr>
		<!--<th>Avtale_ID</th> -->
			<th>Fornavn</th> 
			<th>Etternavn</th>
			<th>Telefon</th>
			<th>Tjeneste</th>
			<th>Dato</th>
			<th>Klokkeslett</th>
			<th>Slett</th>
		</tr>
		
		<?php $i=0;
			while ($row = mysqli_fetch_array($resultat_avtaler)) { ?>
			<tr>
				<!--	<td><?php// echo $row['Avtale_id']; ?></td>-->
				<td><?php echo $row['Fornavn']; ?></td>
				<td><?php echo $row['Etternavn']; ?></td>
				<td><?php echo $row['Telefon']; ?></td>
				<td><?php echo $row['Tjeneste']; ?></td>
				<td><?php echo $row['Dato']; ?></td>
				<td><?php echo $row['Klokkeslett']; ?></td>
				<td><a href="slett.php?Avtale_id=<?php echo $row["Avtale_id"]; ?>">&#x274C;</a></td>
	</tr>

		<?php $i++;
		 } ?>
		</div>
		</table>
		</section>


</body>


</html>


	</table>

</body>
</html>
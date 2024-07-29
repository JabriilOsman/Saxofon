<?php

//Forbindelse
	$forbindelse = mysqli_connect('localhost', 'root', '', 'mindb');
	//Først hente ut data fra tabell Avtaler
	$sql_avtaler= "SELECT * FROM Avtaler ORDER BY dato";
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
	<title></title>
</head>
<body>
	<nav>
            <div class="logo">
            <h1><a href="index.html"> Saxoføn </a> </h1>
            </div>

                <ul class="linker">
                <li><a href="index.html"> HJEM </a> </li>
                    <li><a href="booking.php"> BOOKING </a> </li>
                    <li><a href="kontakt_oss.php"> KONTAKT OSS </a> </li>
                    <li><a href="logginn.html"> LOGG INN </a> </li>
                </ul>
            </nav>

    <section id="avtaledelen">
	<div class="avtaler">
	<h2> Booking avtaler </h2> 
	<table>
	<!-- Tabell for Avtaler -->
	<thead>
		<tr>
			<th>Fornavn</th> 
			<th>Etternavn</th>
			<th>Telefon</th>
			<th>Tjeneste</th>
			<th>Dato</th>
		</tr>
    </thead>

		
		<?php while ($row = mysqli_fetch_array($resultat_avtaler)) { ?>
			<tr>
				<td><?php echo $row['Fornavn']; ?></td>
				<td><?php echo $row['Etternavn']; ?></td>
				<td><?php echo $row['Telefon']; ?></td>
				<td><?php echo $row['Tjeneste']; ?></td>
				<td><?php echo $row['Dato']; ?></td>
			</tr>
		<?php } ?>
		</div>
		</table>
		</section>
		
		<section id="beskjed-delen">
		<div class="avtaler">
		<h2> Beskjed fra kunder </h2> 
        <table>
			<!-- Tabell for Beskjed -->
		<thead>	
			<tr>
				<th>Navn</th>
				<th>E-post</th>
				<th>Telefon</th>
				<th>Beskjed</th>
		</tr>

		</thead>

		<?php while ($row = mysqli_fetch_array($resultat_beskjed)) { ?>
			<tr>
				<td><?php echo $row['b_Navn']; ?></td>
				<td><?php echo $row['b_Epost']; ?></td>
				<td><?php echo $row['b_Telefon']; ?></td>
				<td><?php echo $row['b_Beskjed']; ?></td>
			</tr>
		<?php } ?>
		</div> 
	    </table>
	   </section>


</body>

<!--  Footer  -->
<footer>
<table class="footertable"> 
                    <tr> 
                        <th>Åpningstider</th> 
                        <th>Kontakt oss</th> 
                        <th>Sosiale medier</th> 

                        
                    </tr> 
                    <tr> 
                        <td>Man-Lør: 11:00-19:00</td> 
                        <td>Tlf: 45555898</td> 
                        <td><a href="https://www.facebook.com/Saxofon.frisor"  class="fa fa-facebook"></a></td> 
                    </tr> 
                    <tr> 
                        <td>Søndag: STENGT</td> 
                        <td>Epost: saxofon@hotmail.com</td> 
                        <td><a href="https://www.instagram.com/saxofon_oslo/"  class="fa fa-instagram" aria-hidden="true"></a></td> 
                    </tr> 
                    <tr>
                        
                    </tr>
                    <tr> 
                        <td></td> 
                        <td>Adresse: Fredensborgveien 22, 0177 Oslo</td> 
                    </tr> 
                    
                </table> 
</footer>
</html>
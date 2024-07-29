<!DOCTYPE html>
<html>
	<head>
		<link rel=" stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/0ed0f6f26c.js" crossorigin="anonymous"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kontakt oss</title>
	</head>
	
	<body>
	<nav>
            <div class="logo">
			<h1><a href="index.html"><img src="logo.png" alt=""> </a> </h1>
            </div>


                <ul class="linker">
                    <li><a href="index.html"> HJEM </a> </li>
                    <li><a href="booking.php"> BOOKING </a> </li>
                    <li><a href="kontakt_oss.php"> KONTAKT OSS </a> </li>
                    <li><a href="logginn.php"> LOGG INN </a> </li>
                </ul>
            </nav>

			<script type="text/javascript">
                window.addEventListener("scroll", function(){
                    var nav = document.querySelector("nav");
                    nav.classList.toggle("sticky", window.scrollY > 0)
                })
            </script>


				   

		

		
	
		<section id="kontaktoss">
		<div class="kontakt-tabell">
		<form action="kontakt_oss.php" method="post" id="kontaktskjema">
			<h2>Legg igjen en beskjed</h2>
			<h3>Fyll ut feltene(Epost og tlf er valgfritt):</h3>
			<label for="navn">Navn:</label>
			<input type="text" name="navn" size="20">

			<label for="epost">Epost:</label>
			<input type="email" name="epost" size="20">

			<label for="telefon">Telefon:</label>
			<input type="text" name="telefon" size="10">

			<label for="beskjed">Beskjed:</label>
			<textarea name="beskjed" placeholder="Skriv beskjed her..." cols="30" rows="5"></textarea>
			<input type="submit" value="Send beskjed">
		</form>
	</div>
		</section>

		<!--<?php 
		//Get Beksjed's last id (highest)	
		$dbc= mysqli_connect("localhost","root","","mindb");
			
		$sql_beskjed_h= "SELECT MAX(beskjed_ID) AS 'id' FROM beskjed ";
		$resultat_beskjed_h = mysqli_query($dbc,$sql_beskjed_h);
		$idfind= mysqli_fetch_assoc($resultat_beskjed_h);
		$idcounter=$idfind['id'];
		mysqli_close($dbc);



		//
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$problem= FALSE;
				if(!empty($_POST['navn'])&&!empty($_POST['beskjed'])){
					$navn=trim(strip_tags($_POST['navn']));
					$epost=trim(strip_tags($_POST['epost']));
					$tlf=trim(strip_tags($_POST['telefon']));
					$beskjed=trim(strip_tags($_POST['beskjed']));					
				}
				else{
					echo "<p style="."color:red".">Fyll ut alle feltene:<br></p>";
					$problem=TRUE;
				}
				if(!$problem){
					//Turn idcounter to an int
					$idcounter = (int)$idcounter;
					//Add 1 to id
					$id = $idcounter + 1;

					$dbc= mysqli_connect("localhost","root","","mindb");
					$query= "INSERT INTO Beskjed (beskjed_id ,b_Navn, b_Epost, b_Telefon, b_Beskjed) VALUES ('$id' ,'$navn', '$epost', 
					'$tlf','$beskjed')";
					if (@mysqli_query($dbc, $query)){
					echo "<p>Beskjeden er sendt!</p>";					
					}
					else{
						echo "<p style="."color:red".">Kunne ikke sendte beskjed fordi:<br>".
						mysqli_error($dbc).". 
						</p><p>The query being run was: ".$query."</p>";
					}
					mysqli_close($dbc);
				}
				
			}

			?>-->

<footer class="footer">
                <div class="container">
                    <div class="row">
                        <div class="footer-col">
                            <h4>Åpningstider</h4>
                            <ul>
                                <li>Man-Lør: 11:00-19:00</li>
                                <li>Søndag: STENGT</li>
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4>Kontakt oss</h4>
                            <ul>
                                 <li><a href="tel:45555898">Tlf: 45555898</a></li>
                                 <li><a href="mailto:saxofon@hotmail.com">saxofon@hotmail.com</a></li>
                                 <li>Adresse: Fredensborgveien 22, 0177 Oslo</li>
                                
                            </ul>
                        </div>
                        <div class="footer-col">
                            <h4 id="sosiale-medier">Sosiale medier</h4>
                            <div class="social-links">
                                <a href="#"><i class="fab fa-facebook-f"></i></a>
                                <a href="#"><i class="fab fa-instagram"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
           </footer>
	

	</body>
	
	</footer>

</html>

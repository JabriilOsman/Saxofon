<!DOCTYPE html>
<html>
	<head>
		<link rel=" stylesheet" href="style.css">
		<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
		<script src="https://kit.fontawesome.com/0ed0f6f26c.js" crossorigin="anonymous"></script>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Booking</title>
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



		<?php 
			//Get avtaler's last id (highest)	
			$dbc= mysqli_connect("localhost","root","","mindb");
			
			$sql_avtaler_h= "SELECT MAX(avtale_ID) AS 'id' FROM Avtaler ";
			$resultat_avtaler_h = mysqli_query($dbc,$sql_avtaler_h);
			$idfind= mysqli_fetch_assoc($resultat_avtaler_h);
			$idcounter=$idfind['id'];
			mysqli_close($dbc);
			
			//Get the user input in the form, so it can be sent to the database
			if($_SERVER['REQUEST_METHOD'] == 'POST'){
				$problem= FALSE;
				if(!empty($_POST['fornavn'])&&!empty($_POST['etternavn'])&&!empty($_POST['telefon'])
					&&!empty($_POST['tjeneste'])&&!empty($_POST['dato'])&&!empty($_POST['klokkeslett'])){
					$fnavn=trim(strip_tags($_POST['fornavn']));
					$enavn=trim(strip_tags($_POST['etternavn']));
					$tlf=trim(strip_tags($_POST['telefon']));
					$tjeneste=trim(strip_tags($_POST['tjeneste']));
					$dato=trim(strip_tags($_POST['dato']));	
					$klokkeslett=trim(strip_tags($_POST['klokkeslett']));							
				}
				else{
					echo "<p style="."color:red".">Fyll ut alle feltene:<br></p>";
					$problem=TRUE;
				}
				if(!$problem){
					$dbc= mysqli_connect("localhost","root","","mindb");
					//Turn idcounter to an int
					$idcounter = (int)$idcounter;
					//Add 1 to id
					$id = $idcounter + 1;
					//Get input from user and add to database
					$query= "INSERT INTO Avtaler (Avtale_ID,Fornavn, Etternavn, Telefon, Tjeneste, Dato, Klokkeslett) VALUES ('$id','$fnavn', '$enavn', 
					'$tlf','$tjeneste','$dato','$klokkeslett')";
					$query2= "INSERT INTO Alle_avtaler (Avtale_ID,Fornavn, Etternavn, Telefon, Tjeneste, Dato, Klokkeslett) VALUES ('$id','$fnavn', '$enavn', 
					'$tlf','$tjeneste','$dato','$klokkeslett')";
					
					if (@mysqli_query($dbc, $query)){
					echo "<p>Timen er bestilt! Info om timen er sendt på SMS.</p>";					
					}
					else{
						echo "<p style="."color:red".">Kunne ikke legge til timen fordi:<br>".
						mysqli_error($dbc).". 
						</p><p>The query being run was: ".$query."</p>";
					}
					if (@mysqli_query($dbc, $query2)){
					echo "<br>";					
					}
					
					mysqli_close($dbc);
					
				}
				
			}
			
			
			
		?>
		<section id="bestill">
		<div class="kontakt-tabell">
		<form action="booking.php" method="post">
			<h2>Bestille time</h2>
			<label for="fornavn">Fornavn:</label>
			<input type="text" name="fornavn" size="20">

			<label for="etternavn">Etternavn:</label>
			<input type="text" name="etternavn" size="20">

			<label for="telefon">Telefon:</label>
			<input type="tel" name="telefon" placeholder="000-00-000" size="20">

			
			<label for="tjeneste">Velg tjeneste:</label>
			<div class="box">
			<select id="tjeneste" name="tjeneste">
				<option value="Herreklipp">Herreklipp  - fra 370 kr</option>
				<option value="Dameklipp">Dameklipp  - fra 500 kr</option>
				<option value="Barneklipp">Barneklipp  - fra 290 kr</option>
				<option value="Farge">Farge/klipp  - fra 1300 kr</option>
				<option value="Folie">Folie/klipp-langt  - fra 2200 kr</option>
			</select>
		</div>
			
			
			<label for="dato">Dato:</label>
			<input type="date" name="dato" size="20" id="datePickerId" onchange="klokkeFunksjon(event)">
			
			
			
			<!-- Sets minimum date from current date -->
			<script>
			datePickerId.min = new Date().toISOString().split("T")[0];
			</script>
			
			<!-- User cant book on sundays -->
			<script>
			const picker = document.getElementById('datePickerId');
			picker.addEventListener('input', function(e){
			  var day = new Date(this.value).getUTCDay();
			  if([0].includes(day)){
				e.preventDefault();
				this.value = '';
				alert('Stengt på søndager');
			  }
			});
			</script>	
			
			
			<?php 	
			echo "<label for='Klokkeslett'>Klokkeslett:</label>";
					
			//Get date from user to check dates
			$dbc= mysqli_connect("localhost","root","","mindb");
			$query3= "SELECT * FROM `tidspunkter`";
			$resultat_kl = mysqli_query($dbc,$query3);
			
			//Show the available sessions for that date
			echo '<div class="box">';
			echo '<select id="klokkeslett" name="klokkeslett">';
			while ($row = mysqli_fetch_assoc($resultat_kl)) {
				echo '<option>' . $row['Klokkeslett'] . '</option>';
			}
			echo '</select>';
			echo '</div>';
			mysqli_close($dbc);
			
			
			?>


			<input type="submit" name="submit" value="Bestill time">
		</form>
		</div>

		</section>

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
	

</html>

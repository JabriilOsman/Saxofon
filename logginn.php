<!DOCTYPE html>
<html>
<head>
	<title>Logg inn</title>
	<link rel="stylesheet" href="style.css">
	<link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
	<meta charset="UTF-8">
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

     <form action="logginn2.php" method="post">
     	<div class="logginn">
     	<h2>LOGG INN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Brukernavn</label>
     	<input type="text" name="brukernavn" placeholder="Oppgi brukernavn"><br>

     	<label>Passord</label>
     	<input type="password" name="passord" placeholder="Oppgi Passord"><br>

     	<input type="submit" value="Logg inn"></input>
     </form>
</body>
</html>
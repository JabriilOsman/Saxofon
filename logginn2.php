 <?php 
session_start(); 
include "db_forbindelse.php";

if (isset($_POST['brukernavn']) && isset($_POST['passord'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$brukernavn = validate($_POST['brukernavn']);
	$passord = validate($_POST['passord']);

	if (empty($brukernavn)) {
		header("Location: logginn.php?error=Brukernavn er nødvendig");
	    exit();
	}else if(empty($passord)){
        header("Location: logginn.php?error=Passord er nødvendig");
	    exit();
	}else{
		$sql = "SELECT * FROM Logginn WHERE Brukernavn='$brukernavn' AND Passord='$passord'";

		$resultat = mysqli_query($forbindelse, $sql);

		if (mysqli_num_rows($resultat) === 1) {
			$row = mysqli_fetch_assoc($resultat);
            if ($row['Brukernavn'] === $brukernavn && $row['Passord'] === $passord) {
         
            	header("Location: minside.php");
		        exit();
            }else{
				header("Location: logginn.php?error=Feil brukernavn eller passord");
		        exit();
			}
		}else{
			header("Location: logginn.php?error=Feil brukernavn eller passord");
	        exit();
		}
	}
	
}else{
	header("Location: logginn.php");
	exit();
}
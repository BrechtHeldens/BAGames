<?php
session_start();

echo '<head>
  <title>BA Games</title>

  <!--css-->
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/main.css">

  <!--js-->
  <script src="js/jquery-3.2.1.js"></script>
  <script src="js/bootstrap.js"></script>

</head>';

function formulier($gebruikersnaam,$naam,$voornaam,$email){
echo '<form action="registreer.php" method="post">
			<table>
					<tr><td><label>Gebruikersnaam</label></td><td><input type="text" name ="gebruikersnaam" value="'.$gebruikersnaam.'"></td></tr>
					<tr><td><label>Naam</label></td><td><input type="text" name = "naam" value="'.$naam.'"></td></tr>
					<tr><td><label>Voornaam</label></td><td><input type="text" name = "voornaam" value="'.$voornaam.'"></td></tr>
					<tr><td><label>E-mail</label></td><td><input type="text" name = "email" value="'.$email.'"></td></tr>
					<tr><td><label>Wachtwoord</label></td><td><input type="password" name = "wachtwoord"></td></tr>
					<tr><td><label>Wachtwoord bevestigen</label></td><td><input type="password" name = "wachtwoord2"></td></tr>
					<tr><td colspan=2><input type="submit" value="Registreer" name="submit"></td></tr>
			</table>
			</form>';
}

echo '<div class="full-image" id="inlog">
		<div class="kader">
			<center>
				<img src="../images/baheaderlogo.png">';

if(isset($_POST['submit']))
	{
		include "../handelingen/connect.php";

		$naam = $_POST['naam'];
		$voornaam = $_POST['voornaam'];
		$email = $_POST['email'];
		$wachtwoord = $_POST['wachtwoord'];
		$wachtwoord2 = $_POST['wachtwoord2'];
		$gebruikerstype = 0;
		$credits = 0;
		$bio = "";

		$gebruikersnaam = $_POST['gebruikersnaam'];

		// unieke gebruikersnaam checken //


		$sql = "SELECT * FROM tblgebruikers WHERE gebruikersnaam = '".$gebruikersnaam."'";
		$qry = $mysqli->query($sql);
		$databaseUser = $qry->fetch_assoc();


if ($databaseUser["gebruikersnaam"] == null){


		if ($naam == Null || $voornaam == Null|| $email == Null|| $wachtwoord == Null|| $wachtwoord2 == Null)
		{
			echo '<p class="error">Alle velden moeten ingevuld worden!</p>';
			formulier($gebruikersnaam, $naam,$voornaam,$email);
		}
		else{
// wachtwoord bevestigen
		if ($wachtwoord == $wachtwoord2){

		$sql = "INSERT INTO tblgebruikers (gebruikersnaam,naam,voornaam,email,wachtwoord,gebruikerstype,credits,bio) VALUES (?,?,?,?,MD5(?),'".$gebruikerstype."','".$credits."','".$bio."')";
		$stmt = $mysqli->prepare($sql);

		if (!$stmt) {
        echo "false";
    }
		$stmt->bind_param("sssss",$gebruikersnaam,$naam,$voornaam,$email,$wachtwoord);
		if($stmt->execute()){
			echo "<label>U bent succesvol geregistreerd!<br></label>";
		}
		else
		{
			echo "error regestratie: " . $mysqli->error."<br>";
		}
		$mysqli->close();
		}

		else{
			echo '<p class="error">Je wachtwoorden komen niet overeen!</p>';
			formulier($gebruikersnaam, $naam,$voornaam,$email);
		}
		}
		}
		else{
			echo '<p class="error">Je gebruikersnaam is al in gebruik!</p><br>';
			formulier("", $naam,$voornaam,$email);
				}
	}

	else
	{
	echo '<p>Kies een unieke gebruikersnaam.</p>';
			formulier("","","","");
	}

	echo '			</center>
						</div>
					<div class="opschuiven"><a href="inloggen.php">◄ Ga terug naar de login pagina</a></div>
					</div>';

?>

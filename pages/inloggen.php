<!DOCTYPE html>
<html>

  <?php
  include '../handelingen/connect.php';

  //Sessie starten
  session_start();

  echo '
    <head>
      <title>BA Games</title>

      <!--css-->
      <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
      <link rel="stylesheet" type="text/css" href="../css/main.css">

      <!--js-->
      <script src="js/jquery-3.2.1.js"></script>
      <script src="js/bootstrap.js"></script>

    </head>

    <div class="full-image" id="inlog">
		  <div class="kader">
			   <center>
			     <img src="../images/baheaderlogo.png">';


           if(isset($_POST['inloggen'])){

	            $gebruikersnaam = $_POST['gebruikersnaam'];
              $wachtwoord = $_POST['wachtwoord'];

              $sql='SELECT * FROM tblgebruikers WHERE gebruikersnaam ="'.$gebruikersnaam.'"';
              $resultaat = $mysqli->query($sql);
              $row = $resultaat->fetch_assoc();

              if(($gebruikersnaam == $row['gebruikersnaam']) AND (md5($wachtwoord) == $row['wachtwoord'])){

                $_SESSION["gebruikersnaam"] = $row["gebruikersnaam"];
                $_SESSION["gebruikersid"] = $row["gebruikersid"];
                $_SESSION["gebruikerstype"] = $row["gebruikerstype"];

                $done = True;

                if($done){

                  header("Location: ../index.php");
                  exit;
                }

              } else {

                echo '
                <p class="error">Gebruikersnaam of wachtwoord is incorrect. Probeer het opnieuw.</p>
                <table>
                  <form method="post" action="inloggen.php">
                    <tr><td><label>Gebruikersnaam</label></td></tr>
                    <tr><td><input type="text" name="gebruikersnaam"></td></tr>
                    <tr><td><label>Wachtwoord</label></td></tr>
                    <tr><td><input type="password" name="wachtwoord"></td></tr>
                    <tr><td><input type="submit" name="inloggen" value="Log in"> </td></tr>
                  </form>
                </table>
                <br>
                <hr>
                <br>
                <p>Nog geen lid? <span><a href ="registreer.php">Registreer</a></span></p>';

               }
             } else {

               echo'
               <table>
                <form method="post" action="inloggen.php">
                  <tr><td><label>Gebruikersnaam</label></td></tr>
                  <tr><td><input type="text" name="gebruikersnaam"></td></tr>
                  <tr><td><label>Wachtwoord</label></td></tr>
                  <tr><td><input type="password" name="wachtwoord"></td></tr>
                  <tr><td><input type="submit" name="inloggen" value="Log in"> </td></tr>
                </form>
              </table>
              <br>
              <hr>
              <br>
              <p>Nog geen lid? <span><a href ="registreer.php">Registreer</a></span></p>';
            }

            echo '
          </center>
        </div>
        <div class="opschuiven"><a href="../index.php">◄ Ga terug naar de homepage</a></div>
      </div>';
    ?>
</html>

<?php
  include 'connect.php';
  session_start();

  if (!isset($_GET["gebruikersnaam"])) {
    $_GET["gebruikersnaam"] = "";
  }
  $gebruikersnaam = $_GET["gebruikersnaam"];

?>
<html>
  <head>
    <title>Gebruikers met "<?php echo $gebruikersnaam; ?>" - BA Games</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
  </head>
  <body>
    <div class="container">
      <div class="row">
        BAgames
        <!-- Zet hier een header ofzo -->



      </div>

      <?php
        // -------------------- ZOEKBALK ---------------------------
        echo '<center>
                <form method="post" action="../pages/friends.php">
                  <input type="text" name="zoekBalk" placeholder="Zoek naar een gebruiker..." value="'.$gebruikersnaam.'" id="zoekBalk">
                  <input type="submit" name="zoeken" value="zoeken">
                </form>
                <p id="lijnZoekbalk"></p>
              </center>';
        //----------------------------------------------------------

        // ======================= LIJST VAN GEBRUIKERS DIE DE ZOEKTERM MATCHEN ====================================
        echo '<center><table>';

        $formule = "select * from tblgebruikers where gebruikersnaam LIKE '".$gebruikersnaam."%'";
        $voerUit = $mysqli->query($formule);

        while($gebruikers = $voerUit->fetch_assoc()){

          //JE EIGEN PROFIEL VERBERGEN
          if ($gebruikers["gebruikersnaam"] != $_SESSION["gebruikersnaam"]) {

          //GEZOCHTE GEBRUIKER(S)
            echo '<tr>
                    <td class="zoekTable" id="zoekNaam">'.$gebruikers["gebruikersnaam"].'</a></td>';

          //KIJKEN OF MEN MET DE GEBRUIKER BEVRIEND IS
            $formule = "select vriendschapid, vrienden from tblfriendlist where vriendid = ".$gebruikers["gebruikersid"];
            $voerUit2 = $mysqli->query($formule);
            $gezochteGebruiker = $voerUit2->fetch_assoc();

            $formule = "select vriendschapid, vrienden from tblfriendlist where gebruikersid = ".$gebruikers["gebruikersid"];
            $voerUit3 = $mysqli->query($formule);
            $gezochteGebruiker2 = $voerUit3->fetch_assoc();

          // ----------- ALS MEN NIET BEVRIEND IS MET DE GEZOCHTE GEBRUIKER ----------------
            if ($gezochteGebruiker["vriendschapid"] == null && $gezochteGebruiker2["vriendschapid"] == null) {
              echo '<td><a href="addFriend.php?vriendid='.$gebruikers["gebruikersid"].'">Voeg toe als vriend</a></td>';

            } else if ($gezochteGebruiker["vrienden"] == 0 || $gezochteGebruiker2["vrienden"] == 0){
              echo '<td><a href="readdFriend.php?vriendid='.$gebruikers["gebruikersid"].'">Voeg toe als vriend</a></td>';

            } else {
              echo '<td><a href="deleteFriend.php?vriendid='.$gebruikers["gebruikersid"].'">Jullie zijn vrienden</a></td>
                    <td><a href="../pages/chat.php?vriendschapid='.$gebruikers["gebruikersid"].'">Stuur Bericht</a></td>';
            }
          // -------------------------------------------------------------------------------

            echo '</tr>';
          }
        }

        echo '</table></center>';
        // ===========================================================================================================
        ?>
    </div>
  </body>
</html>

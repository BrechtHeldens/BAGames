<?php
  include '../handelingen/connect.php';
  session_start();

  if (!isset($_GET["gebruikersnaam"])) {
    $_GET["gebruikersnaam"] = "";
  }
  $gebruikersnaam = $_GET["gebruikersnaam"];

?>
<html>
  <head>
    <title>Vrienden - BA Games</title>
    <!--css-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!--js-->
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/bootstrap.js"></script>
  </head>
  <body>



      <?php

      //ALS OP DE KNOP WORDT GEDRUKT
      if (isset($_POST["zoeken"])) {
        header("Location: ../handelingen/searchFriends.php?gebruikersnaam=".$_POST['zoekBalk']."");
        die;

      // -------------------- ZOEKBALK ---------------------------
      } else {
        echo '<center>
                  <form method="post" action="friends.php">
                    <input type="text" name="zoekBalk" placeholder="Zoek naar een gebruiker..." value="'.$gebruikersnaam.'" id="zoekBalk">
                    <input type="submit" name="zoeken" value="Zoeken">
                  </form>
                  <p id="lijnZoekbalk"></p>
              </center>';
      }
      //----------------------------------------------------------

      echo '<h1 style="text-align:center">Vriendenlijst</h1>';

      // ============== ALLE VRIENDEN UIT DE DATABANK HALEN =========================================
      echo '<center><table>';

      $formule = "select * from tblfriendlist where gebruikersid = '".$_SESSION['gebruikersid']."' and vrienden = '1'";
      $voerUit = $mysqli->query($formule);

      while($friendid = $voerUit->fetch_assoc()){

        //HUN GEBRUIKERSNAAM HALEN
        $formule = "select gebruikersnaam, gebruikersid from tblgebruikers where gebruikersid = ".$friendid['vriendid']."";
        $voerUit2 = $mysqli->query($formule);
        $friend = $voerUit2->fetch_assoc();

        echo '<tr>
                <td class="">'.$friend["gebruikersnaam"].'</td>
                <td><a href="chat.php?vriendschapid='.$friendid["vriendschapid"].'">Stuur Bericht</a></td>
                <td><a href="../handelingen/deleteFriend.php?vriendid='.$friend["gebruikersid"].'">Verwijder als vriend</a></td>
              </tr>';

      }
      //- - - -- - - - -- - - -- - - - - - -- - - - - -- - - - - -- - - - - -

      $formule = "select * from tblfriendlist where vriendid = '".$_SESSION['gebruikersid']."' and vrienden = '1'";
      $voerUit = $mysqli->query($formule);

      while ($friendid = $voerUit->fetch_assoc()) {

        //HUN GEBRUIKERSNAAM HALEN
        $formule = "select gebruikersnaam, gebruikersid from tblgebruikers where gebruikersid = ".$friendid['gebruikersid']."";
        $voerUit2 = $mysqli->query($formule);
        $friend = $voerUit2->fetch_assoc();

        echo '<tr>
                <td class="">'.$friend["gebruikersnaam"].'</td>
                <td><a href="chat.php?vriendschapid='.$friendid["vriendschapid"].'">Stuur Bericht</a></td>
                <td><a href="../handelingen/deleteFriend.php?vriendid='.$friend["gebruikersid"].'">Verwijder als vriend</a></td>
              </tr>';

      }

      echo '</table></center>';
      //===============================================================================================

      ?>
  </body>
</html>

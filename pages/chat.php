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
    <title>Chat - BA Games</title>
    <!--css-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!--js-->
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/bootstrap.js"></script>
  </head>
  <body>


    <?php
      $chatVriend = $_GET["vriendschapid"];
      echo "<div class='container'>";

      // ========================= NAAM OPHALEN ================================
      $formule = "select * from tblfriendlist where vriendschapid = ".$chatVriend;
      $voerUit = $mysqli->query($formule);
      $friend = $voerUit->fetch_assoc();

      if ($friend["gebruikersid"] == $_SESSION["gebruikersid"]) {
        $vriendid = $friend['vriendid'];
      } else {
        $vriendid = $friend['gebruikersid'];
      }

      $formule = "select gebruikersnaam from tblgebruikers where gebruikersid = ".$vriendid;
      $voerUit = $mysqli->query($formule);
      $vriend = $voerUit->fetch_assoc();

      echo "<a href='friends.php'><img src='../images/back_arrow.png' style='width: 10%'/></a>
            <h1 style='text-align:center'>".$vriend['gebruikersnaam']."</h1>
            <p style='border-top: 1px solid #ddd'></p>";
      // =======================================================================

      // ======================================== CHAT OPHALEN ====================================================
      $formule = "select * from tblchat where vriendschapid = ".$chatVriend;
      $voerUit = $mysqli->query($formule);

      while ($chat = $voerUit->fetch_assoc()) {

        //ALS JIJ HET BERICHT HEBT GESTUURD
        if ($chat["verzenderid"] == $_SESSION["gebruikersid"]) {
          echo "<div class='row'>
                <p class='pull-right'>".$chat['bericht']."</p>";
        } else {
          echo "<div class='row'>
                <p class='pull-left'>".$chat['bericht']."</p>";
        }

        echo "</div>";
      }
      //=============================================================================================================

      // -------------------- BERICHT VERSTUREN ---------------------
      echo '<p style="border-top: 1px solid #ddd"></p>
            <form method="post" action="../handelingen/sendChat.php?vriendschapid='.$chatVriend.'">
              <input type="text" name="bericht" placeholder="Stuur een bericht..." style="width: 90%"/>
              <input type="submit" value="Verstuur" style="width: 9%"/>
            </form>';
      // ------------------------------------------------------------
    ?>

  </body>
</html>

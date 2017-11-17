<html>
  <head>
    <title>BA Games</title>

    <!--css-->
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <!--js-->
    <script src="../js/jquery-3.2.1.js"></script>
    <script src="../js/bootstrap.js"></script>

  </head>
  <body>
    <?php

    include "../handelingen/connect.php";
    session_start();
    include "header.php";

    if(isset($_GET['nummer'])){

      $upd = "UPDATE tblspellen SET online = ".$_GET['online']." WHERE spelid=".$_GET['nummer'];
      $resultaat = $mysqli->query($upd);

    }

    $sql = "select * from tblspellen";
    $resultaat = $mysqli->query($sql);

    echo '
    <div class="container-fluid">
      <p id="bagamestitel">Offline zetten</p>
      <center>
        <div id="uitleg">
          <p>■Hier kunt u een game offline halen. U kunt het spel onzichtbaar maken voor de gebruikers.</p>
        </div>
      </center>';

      $teller = 0;
      while ($row = $resultaat->fetch_assoc()) {

        if ($teller % 3 == 0){
          echo '<div class="row">';
        }

        echo '
        <div class="col-xs-4" id="gameframe">
          <center>
            <p id="gametitel">
              <a href='.$row['beginpagina'].'.php>'.$row['spelnaam'].'</a>
            </p>
            <a href='.$row['beginpagina'].'.php><img src="../images/'.$row['afbeelding'].'" id="gamefoto"></a>
          </center>';

          if ($row["online"]==0){
            echo '<center>
                    <a href="offline.php?nummer='.$row['spelid'].'&online=1">Online zetten</a>
                    <br>
                    <br>
                  </center>';
          }
          else
          {
            echo '<center>
                    <a href="offline.php?nummer='.$row['spelid'].'&online=0">Offline zetten</a>
                    <br>
                    <br>
                  </center>';
          }

          echo '</div>';

          if ($teller % 3 == 2){
            echo '</div>';
          }

          $teller++;
        }

        if ($teller % 3 != 2){
          echo '</div>';
        }

        echo '</div>';

      ?>
    </body>
</html>

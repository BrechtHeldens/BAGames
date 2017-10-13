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
echo "hier kunt u een game offline halen.<br>";

if(isset($_GET['nummer'])){
$upd = "UPDATE tblspellen SET online = ".$_GET['online']." WHERE spelid=".$_GET['nummer'];
$resultaat = $mysqli->query($upd);

}

$sql = "select * from tblspellen";
$resultaat = $mysqli->query($sql);

echo '<div class="container-fluid">
      <div class="row">
        <p id="bagamestitel">Ba Games</p>';

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
                  echo '<center><a href="offline.php?nummer='.$row['spelid'].'&online=1">Online zetten</a></center>';
          }
          else{
                  echo '<center><a href="offline.php?nummer='.$row['spelid'].'&online=0">Offline zetten</a></center>';
              }

          echo '</div>';



}


?>
</html>
</body>

<!DOCTYPE html>
<html>
  <head>
    <title>Betaling</title>
    <script>

    function toShop(){
      window.location="redirect.php";
    }

    </script>
  </head>
<?php
include "../handelingen/connect.php";
$beloningid = $_GET["beloning"];
$bestaat = "false";
if($beloningid <= 0 || $beloningid/$beloningid != 1){
  //Fout in URL
  echo "<center><h1>Error</h1></center>
  <center><h4>Er is een fout opgetreden, <a href='../pages/winkelmenu.php'>ga terug naar de winkel</a></h4></center>";
} else {
  //Correcte URL - Check of het id bestaat
  $qry = "SELECT * FROM tblbeloningen WHERE beloningid = '".$beloningid."';";
  $row = $mysqli->query($qry);
  if($col = $row->fetch_assoc()){
    //Beloning is gevonden
    $prijs = $col["prijs"];

    $qry = "SELECT * FROM tblgebruikers WHERE gebruikersid = '1';";
    $row = $mysqli->query($qry);
    $col = $row->fetch_assoc();

    $credits = $col["credits"];

    if($credits - $prijs >= 0){
      $credits = $credits - $prijs;
      //Update in de databank
      $qry = "UPDATE tblgebruikers SET credits = ".$credits." WHERE gebruikersid = '1'";
      $row = $mysqli->query($qry);

      echo "<center><h1>Je aankoop is geslaagd!</h1></center>
      <center><button onclick='toShop()'>Ga terug naar de winkel</button></center>";

    } else {
      echo "<center><h1>Te weinig credits!</h1></center>
      <center><button onclick='toShop()'>Ga terug naar de winkel</button></center>";
    }

  } else {
    //Beloning is onbekend
    echo "<center><h1>Error</h1></center>
    <center><h4>Er is een fout opgetreden, <a href='../pages/winkelmenu.php'>ga terug naar de winkel</a></h4></center>";
  }
}
?>

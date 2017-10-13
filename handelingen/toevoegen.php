<?php
include "connect.php";

if(isset($_POST["submit"])){
  //Form bestaat
  $qry = "INSERT INTO tblbeloningen (beloningid, beloningnaam, prijs, spelid) VALUES (NULL, '".$_POST['naam']."', '".$_POST['prijs']."', '".$_POST['spelid']."')";
  $row = $mysqli->query($qry);

  header("Location: ../pages/winkelmenu.php");
  die();
} else {
  //Maak form aan
  echo "<center>
  <form method='post' action='toevoegen.php'>
  <table>
    <tr><td>Spel</td><td><input type='text' name='spelid' placeholder='Geef hier het ID' required></td></tr>
    <tr><td>Naam</td><td><input type='text' name='naam' required></td></tr>
    <tr><td>Prijs</td><td><input type='number' name='prijs' required></td></tr>
    <tr><td colspan='2'><input type='submit' name='submit' value='Maak beloning'></td></tr>
  </table>
  </form>
  </center>";
}



?>

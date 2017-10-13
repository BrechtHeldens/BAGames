<?php
include "../handelingen/connect.php";
session_start();
include "header.php";
?>
<html>
  <head>
    <title>profiel</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">
  </head>

  <body>
    <header class="header">
    </header>
  </body>
</html>

<?php
echo "<h1>Profiel bijwerken</h1>";

if(isset($_POST["knop"])){

$wijzigen ="update tblgebruikers set  voornaam = '".$_POST['voornaam']."',naam ='".$_POST['naam']."', bio ='".$_POST['bio']."' where gebruikersid = '".$_POST['bijgewerkt']."'";
$resultaat = $mysqli->query($wijzigen);

  echo "Uw profiel is bijgewerkt!";
	echo "<br><br>";
	echo "<a href=../pages/profiel.php>Terug naar profiel</a>";
}

else {
  $bijwerken = $_GET['bijwerken'];
  $sql = "select * from tblgebruikers where gebruikersid  =".$bijwerken;
  $resultaat = $mysqli->query($sql);
  $row = $resultaat->fetch_assoc();

  echo '<form method="post" action=profielaanpassen.php>
    <table>
    <tr>
      <td>
    voornaam:
      </td>
      <td>
    <input type="text" name="voornaam" value="'.$row['voornaam'].'">
      </td>
    </tr>




    <tr>
      <td>
    naam:
      </td>
      <td>
    <input type="text" name="naam" value="'.$row['naam'].'">
      </td>
    </tr>


    <tr>
      <td>
    bio:
      </td>
      <td>
    <input type="text" name="bio" value="'.$row['bio'].'">
    </td>
    </tr>


  <tr>
    <td>
    <input type="submit" name="knop" value="wijzig">
    <input type="hidden" name="bijgewerkt" value='.$bijwerken.'>
    </td>
  </tr>
      </table></form>';
}

?>

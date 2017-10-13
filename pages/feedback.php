<?php
  include "../handelingen/connect.php";
  include 'header.php';
  session_start();
  $_SESSION['gebruikersid'] = 1;
  echo "<h1>Feedback geven.</h1>";

  if (isset($_POST["knop"])) {
    $sql = "insert into tblfeedback (titel, tekst, type, gebruikersid)
    values ('".$_POST['titel']."','".$_POST['tekst']."','".$_POST['type']."','".$_SESSION['gebruikersid']."')";

    echo $sql;

    echo "<br>";
    echo "Je feedback is succesvol doorgestuurd.";
    $resultaat = $mysqli->query($sql);

  } else {
    echo '
    <form method="post" action="feedback.php">
      <table>
        <tr>
          <td>Titel:</td>
          <td><input type="text" name="titel"></td>
        </tr>

        <tr>
          <td>Klacht:</td>
          <td><input type="text" name="tekst"></td>
        </tr>

        <tr>
          <td>Type:</td>
          <td><select name="type">
                <option value=1>Feedback</option>
                <option value=2>report</option>
              </select>
          </td>
        </tr>

        <tr>
          <td style="text-align:center"><input type="submit" name = "knop" value="indienen"></td>
        </tr>

      </table>
    </form>';

  }

  echo "<a href=games.php>Ga terug</a>";

?>

<?php
  session_start();
  include "../handelingen/connect.php";
  include 'header.php';

  echo "<div class='feedback'>
          <center>
            <h1>Feedback geven.</h1>";

  if (isset($_POST["knop"])) {
    $sql = "insert into tblfeedback (titel, tekst, type, gebruikersid)
    values ('".$_POST['titel']."','".$_POST['tekst']."','".$_POST['type']."','".$_SESSION['gebruikersid']."')";

    echo "<br>";
    echo "<p>Je feedback is succesvol doorgestuurd.</p>";
    $resultaat = $mysqli->query($sql);

  } else {
    echo '
    <form method="post" action="feedback.php">
      <table>
        <tr>
          <td>Titel:</td>
        </tr>

        <tr>
          <td><input type="text" name="titel"></td>
        </tr>

        <tr>
          <td>Klacht:</td>
        </tr>

        <tr>
          <td><textarea type="text" name="tekst"></textarea></td>
        </tr>

        <tr>
          <td>Type:</td>
        </tr>

        <tr>
          <td><select name="type">
                <option value=1>Feedback</option>
                <option value=2>Report</option>
              </select>
          </td>
        </tr>

        <tr>
          <td style="text-align:center"><input type="submit" name = "knop" value="indienen"></td>
        </tr>

      </table>
    </form>';

  }

  echo "    <a href=games.php>◄ Ga terug</a>
          </center>
        </div>";
?>

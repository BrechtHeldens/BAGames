<?php
include '../handelingen/connect.php';
session_start();
//Sessie destroy
session_destroy();
echo "Je bent uitgelogd";
print "<br><a href='../index.php'>Ga terug naar home pagina</a>";
?>

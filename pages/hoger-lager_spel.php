<?php
session_start();
include 'header.php';
?>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

  </head>

  <body>
    <div class="kaarten" id="kaartAchtergrond">
      <div id="score">
      </div>
      <section class="container">
        <div id="card">
          <div class="front"><img src="../kaartendek/kaartbg.png"></div>
          <div class="back"><img id="kaart" src=""></div>
        </div>
      </section>

      <center>
        <div id="options">
          <div id="tekst">
          </div>
          <p><button id="flip">Flip Card</button></p>

          <p id="gameMessage"></p>
          <button id="hoger">Hoger</button>
          <button id="lager">Lager</button>
        </div>



        <button onclick="start()" id="start">Start</button>
      </center>


      <script src="../js/utils.js"></script>
      <script src="../js/cardflip.js"></script>
      <script src="../js/hogerLager.js"></script>


    </div>
  </body>
</html>

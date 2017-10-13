<?php
include '../handelingen/connect.php';
session_start();

?>

<html>
  <head>
    <title>Friends - BA Games</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="../css/css.css">
  </head>

<style>

  #canvas{

    border: 1px solid black;
    margin-top: 2em;
    margin-left: 1em;
    background-size: 100%
  }

  #veld{

    border: 1px solid black;
    margin-top: 2em;
    margin-left: 1em;
    background-size: 100%
  }

</style>

<script>

  window.onload = function()
  {
    draw();
    teken();
  }

  function draw(){
    var c = document.getElementById("canvas");
    var ctx = c.getContext("2d");
    ctx.fillStyle = "lightblue";
    ctx.fillRect(0,0,c.width,c.height);

    ctx.strokeStyle = "black";
    ctx.lineWidth = 2;

    for (var i = 0; i < 800; i=i+80) {
      ctx.moveTo(i,0)
      ctx.lineTo(i,800);
      ctx.stroke();
    }

    for (var j = 0; j < 800; j=j+80) {
      ctx.moveTo(0,j)
      ctx.lineTo(1500,j);
      ctx.stroke();
    }
  }

function teken(){
  var a = document.getElementById("veld");
  var b = a.getContext("2d");
  b.fillStyle = "lightblue";
  b.fillRect(0,0,a.width,a.height);

  b.strokeStyle = "black";
  b.lineWidth = 2;

  for (var i = 0; i < 800; i=i+80) {
      b.moveTo(i,0)
      b.lineTo(i,800);
      b.stroke();
    }

  for (var j = 0; j < 800; j=j+80) {
    b.moveTo(0,j)
    b.lineTo(1500,j);
    b.stroke();
  }

}

</script>



<body onload="draw()" bgcolor="lightgreen" onload="teken()">

  <div class="row">
    <canvas id="canvas" width="800" height="640">
      canvas not supported
    </canvas>
    <canvas id="veld" width="800" height="640">
      canvas not supported
    </canvas>
  </div>

var vorigeKaart;
var kaarten = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52];
var speelKaarten = [];
var kaartenLength = 7;
var vorigeRonde = 0;
var ronde = 1;
var option;
var waardevorigeronde;
var waardehuidigeronde;
var score;


function start() { //om het spel te starten
  var creatingGame = true;
  var eindeSpel = true;
  score = 0;

  document.getElementById("tekst").innerHTML = "";
  document.getElementById("gameMessage").innerHTML = "";

  while (creatingGame) {
    for (var i = 0; i < kaartenLength; i++) { //om een 7 random kaarten te treken
      var random = Math.round(Math.random()*52); //52 mogenlijke opties
      var vorige;

      do{
        var random = Math.round(Math.random()*52);
      }while(random === 0);

      if (random != vorige){
          speelKaarten[i] = random;
          vorige = random;
          console.log(speelKaarten[i]);
      }else{
        i--;
      }
    }
    var begin = "../kaartendek/" + speelKaarten[0] + ".png";
    document.getElementById("kaart").src=""+begin;
    creatingGame = false;
  }

  console.log(speelKaarten);

    while (eindeSpel) {
        //De knoppen tonen
        document.getElementById("card").style.visibility="visible";
        document.getElementById("tekst").innerHTML="Kies een optie";
        document.getElementById("options").style.visibility="visible";
        document.getElementById("start").style.visibility="hidden";
        document.getElementById("score").style.visibility="visible";
        document.getElementById("score").innerHTML = "SCORE:" + score;

        if (ronde <= 6 ) {
            document.getElementById("hoger").onclick = hoger;
            document.getElementById("lager").onclick = lager;
        }
        eindeSpel = false;
    }
}

function hoger() {
  console.log(speelKaarten[ronde]);
  var string = "../kaartendek/" + speelKaarten[ronde] + ".png";
  document.getElementById("kaart").src=""+string; //Om de ge kaart op het beeld te vervangen door de kaart in speelkaarten reeks
    waardevorigeronde = speelKaarten[vorigeRonde] % 13;
    waardehuidigeronde = speelKaarten[ronde] % 13;

    if (waardevorigeronde === 0){
      waardevorigeronde = 13;
    }else if(waardehuidigeronde === 0){
      waardehuidigeronde = 13;
    }

    if (waardehuidigeronde >= waardevorigeronde) { //als de gebruiker het juist heeft

        vorigeRonde = ronde;
        ronde += 1;
        score += 1;
        document.getElementById("score").innerHTML = "SCORE:" + score;
        document.getElementById("gameMessage").innerHTML="Goed geraden!";
        document.getElementById("gameMessage").style.color = "#15490e";

    }else{ //als de gebruiker verkeerd raad
     //Om de ge kaart op het beeld te vervangen door de kaart in speelkaarten reeks
        document.getElementById("gameMessage").innerHTML="Jammer! Fout geraden! <br> Uw score is: " + score;
        document.getElementById("gameMessage").style.color = "#a51d1d";
        document.getElementById("hoger").style.visibility="hidden";
        document.getElementById("lager").style.visibility="hidden";
        document.getElementById("start").style.visibility="visible";
        document.getElementById("start").innerHTML = "restart";
        document.getElementById('start').addEventListener( 'click', function(){
          card.toggleClassName('flipped');
          document.getElementById('flip').style.visibility="visible";
        }, false);
    }
}

function lager() {
  console.log(speelKaarten[ronde]);
  var string = "../kaartendek/" + speelKaarten[ronde] + ".png";
  document.getElementById("kaart").src=""+string; //Om de ge kaart op het beeld te vervangen door de kaart in speelkaarten reeks
  waardevorigeronde = speelKaarten[vorigeRonde] % 13;
  waardehuidigeronde = speelKaarten[ronde] % 13;

  if (waardevorigeronde === 0){
    waardevorigeronde = 13;
  }else if(waardehuidigeronde === 0){
    waardehuidigeronde = 13;
  }

  if (waardehuidigeronde <= waardevorigeronde){ //als de gebruiker het juist heeft
      vorigeRonde = ronde;
      ronde += 1;
      score += 1;
      document.getElementById("score").innerHTML = "SCORE:" + score;
      document.getElementById("gameMessage").innerHTML="Goed geraden!";
      document.getElementById("gameMessage").style.color = "#15490e";
    }else{ //als de gebruiker verkeerd raad
      document.getElementById("gameMessage").innerHTML="Jammer! Fout geraden! \n Uw score is: " + score;
      document.getElementById("gameMessage").style.color = "#a51d1d";
      document.getElementById("hoger").style.visibility="hidden";
      document.getElementById("lager").style.visibility="hidden";
      document.getElementById("start").style.visibility="visible";
      document.getElementById("start").innerHTML = "restart";
      document.getElementById('start').addEventListener( 'click', function(){
        card.toggleClassName('flipped');
        document.getElementById('flip').style.visibility="visible";
      }, false);
    }
}

var spelStarten = function startSpel(){
  document.getElementById("start").onclick = start;
}

window.addEventListener('DOMContentLoaded', spelStarten, false);

var init = function() {
var card = document.getElementById('card');
var isGeflipt = {
  boolean: false
};

document.getElementById('flip').addEventListener( 'click', function(){
  card.toggleClassName('flipped');
  document.getElementById('flip').style.visibility="hidden";
  document.getElementById('hoger').style.visibility="visible";
  document.getElementById('lager').style.visibility="visible";
  isGeflipt.boolean = true;
}, false);
};

window.addEventListener('DOMContentLoaded', init, false);

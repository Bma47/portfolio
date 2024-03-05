var div = document.getElementById("white");
var div2 = document.getElementById("red");
var div3 = document.getElementById("h1")
var div4 = document.getElementById("p")

function getRandomColor() {
  var letters = '0123456789ABCDEF';
  var color = '#';
  for (var i = 0; i < 6; i++ ) {
    color += letters[Math.floor(Math.random() * 16)];
  }
  return color;
}

function changeColor(){
  div.style.backgroundColor= getRandomColor();
  div2.style.backgroundColor= getRandomColor();
}

function changeFontColor(){
  div3.style.color= getRandomColor();
  div4.style.color= getRandomColor();
}

setInterval(changeColor,1);
setInterval(changeFontColor,1000)
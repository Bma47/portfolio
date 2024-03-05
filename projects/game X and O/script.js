let title = document.getElementById('title')
let beurt = 'x';
let vierkant = [];


  
function einde(num1,num2,num3){
    title.innerHTML = `${vierkant[num1]} gewonnen`;
    document.getElementById('item'+num1).style.background = '#33cc33';
    document.getElementById('item'+num2).style.background = '#33cc33';
    document.getElementById('item'+num3).style.background = '#33cc33';

    confetti();


    setInterval(function(){title.innerHTML += '.'}, 1000);
    setTimeout(function(){location.reload ()}, 3000)
  }
  
  function startConfetti() {
    confetti({
      particleCount: 200, // Change this to increase the number of confetti particles
      spread: 180,
      origin: { y: 0.6 }
    });
    setTimeout(function() {
      confetti.stop();
    }, 3000);
  }
 


function gewonnen()
{
    for (let i = 1; i<10; i++)
    {
        vierkant[i] = document.getElementById('item' + i).innerHTML;
    }
    if(vierkant[1] == vierkant[2] && vierkant[2] == vierkant[3] && vierkant[1] != '')   // != ''niet leeg
    {
        einde(1,2,3);
    }
    else  if(vierkant[4] == vierkant[5] && vierkant[5] == vierkant[6] && vierkant[5] != '')
    {
        einde(4,5,6);

    }
    else  if(vierkant[7] == vierkant[8] && vierkant[8] == vierkant[9] && vierkant[8] != '')
    {
        einde(7,8,9);

    }
    else  if(vierkant[1] == vierkant[4] && vierkant[4] == vierkant[7] && vierkant[1] != '')
    {
        einde(1,4 ,7);

    }
    else  if(vierkant[2] == vierkant[5] && vierkant[5] == vierkant[8] && vierkant[5] != '')
    {
        einde(2,5,8);

    }
    else  if(vierkant[3] == vierkant[6] && vierkant[6] ==  vierkant[9] && vierkant[3] != '')
    {
        einde(3,6,9);

    }
    else  if(vierkant[1] == vierkant[5] && vierkant[5] ==  vierkant[9] && vierkant[1] != '')
    {
        einde(1,5,9);

    }
    else  if(vierkant[3] == vierkant[5] && vierkant[5] ==  vierkant[7] && vierkant[3] != '')
    {
        einde(3,5,7);

    }
}

function game(id)
{
    let element = document.getElementById(id);
if(beurt === 'x' && element.innerHTML == '')
{
element.innerHTML = 'x';
beurt = 'o';
title.innerHTML = 'o';

}
else if(beurt === 'o' && element.innerHTML == '')
{
    element.innerHTML = 'o';
    beurt = 'x';
    title.innerHTML = 'x';
}
gewonnen();
}

function reset() {
    for (let i = 1; i < 10; i++) {
      document.getElementById('item' + i).innerHTML = '';
      document.getElementById('item' + i).style.background = '';
    }
    title.innerHTML = 'X vs O';
    beurt = 'x';
    vierkant = [];
  }
  
  function computerMove() {
    let squareNum;
    do {
      squareNum = Math.floor(Math.random() * 9) + 1;
    } while (vierkant[squareNum] !== '');
    let square = document.getElementById('item' + squareNum);
    square.innerHTML = beurt;
    beurt = (beurt === 'x') ? 'o' : 'x';
    title.innerHTML = beurt;
    gewonnen();
  }
  
  function game(id) {
    let element = document.getElementById(id);
    if (beurt === 'x' && element.innerHTML == '') {
      element.innerHTML = 'x';
      beurt = 'o';
      title.innerHTML = 'o';
      gewonnen();
      if (beurt === 'o') {
        computerMove();
      }
    } else if (beurt === 'o' && element.innerHTML == '') {
      element.innerHTML = 'o';
      beurt = 'x';
      title.innerHTML = 'x';
      gewonnen();
      if (beurt === 'o') {
        computerMove();
      }
    }
  }
  
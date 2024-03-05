let mario = document.querySelector('.mario');
let pipe = document.querySelector('.pipe');
let grass = document.querySelector('.grass');
let textStart = document.querySelector('text-start')
let audioStart = new Audio('./audio/theme.mp3')
let audioGameOver = new Audio('./audio/gameover.mp3')
let floor1 = document.querySelector('.floor-1')
let floor2 = document.querySelector('.floor-2')
let floor3 = document.querySelector('.floor-3')
let displayScore = document.getElementById('score');
let score= 0;

const start = () => {

    pipe.classList.add('pipe-animation');
    mario.src = './images/mario.gif';
    mario.style.width = '150px';
    mario.style.marginLeft = '50px';

    function grassAnimation(){
        grass.classList.add('grass-animation');
            }setInterval(grassAnimation, 8000); // elke 8 seconde  


    function floorAnimation1(){
          floor1.classList.add('floor-animation-1');
}setInterval(floorAnimation1, 0);

    function floorAnimation2(){
        floor2.classList.add('floor-animation-2');
}setInterval(floorAnimation2, 0);
                           
    function floorAnimation3(){
        floor3.classList.add('floor-animation-3');
}setInterval(floorAnimation3, 3100); 
            
            intervalId = setInterval(ShowScore, 1000);

    audioStart.play();
}

document.addEventListener('keydown', start);



const jump = () => {
    mario.classList.add('jump');

    setTimeout(() => {
        mario.classList.remove('jump');
    }, 1500); 
}

document.addEventListener('keydown', jump);



const checkGameOver = setInterval(() => {
    const pipePosition = pipe.offsetLeft;

    const marioPosition = +window.getComputedStyle(mario).bottom.replace('px', '');
    const grassPosition = grass.offsetLeft;
    const floorPosition1 = floor1.offsetLeft;
    const floorPosition2 = floor2.offsetLeft;
    const floorPosition3 = floor3.offsetLeft;

   
        if (pipePosition <= 120 && pipePosition > 0 && marioPosition < 50 ) {
            clearInterval(intervalId);

            pipe.style.animation = 'none';
            pipe.style.left = `${pipePosition}px`;

            mario.style.animation = 'none';
            mario.style.bottom = `${marioPosition}px`;

            mario.src = './images/game-over.png';
            mario.style.width = '75px';
            mario.style.marginLeft = '50px';

            grass.style.animation = 'none';
            grass.style.left = `${grassPosition}px`;

            floor1.style.animation = 'none';
            floor1.style.left = `${floorPosition1}px`;

            floor2.style.animation = 'none';
            floor2.style.left = `${floorPosition2}px`;

            floor3.style.animation = 'none';
            floor3.style.left = `${floorPosition3}px`;


            document.getElementById("text-start").innerHTML=("Game Over <br> Your Score is " + score ) ; 
            document.getElementById("text-start").style.color = "red";
            document.getElementById("text-start").style.background = "black";
            document.getElementById("text-start").style.borderRadius = "30px";

            function stopAudioStart(){
                audioStart.pause();
                }stopAudioStart();

            audioGameOver.play();

            function stopAudio(){
                audioGameOver.pause();
                }setTimeout(stopAudio, 8000);

              
               

                

         }
         




}, 10);

function ShowScore(){
    score++;
    displayScore.innerHTML= score;
}
    clearInterval(intervalId);


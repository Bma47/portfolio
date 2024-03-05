const movingElement = document.getElementById("logo");
let x = 0;
let y = 0;
let xSpeed = 2;
let ySpeed = 3;

function updatePosition() {
    x += xSpeed;
    y += ySpeed;
    movingElement.style.transform = `translate(${x}px, ${y}px)`;

    // Check for screen boundaries and change direction 
    if (x + movingElement.clientWidth > window.innerWidth || x < 0) {
        xSpeed = -xSpeed;
        window.open('../html/alert.html', '_blank', 'location=no, menubar=no, toolbar=no, scrollbars=no, resizable=no');

    }
    if (y + movingElement.clientHeight > window.innerHeight || y < 0) {
        ySpeed = -ySpeed;
        window.open('..html/alert.html', '_blank', 'location=no, menubar=no, toolbar=no, scrollbars=no, resizable=no');
    }
    requestAnimationFrame(updatePosition);
}

//start animation
requestAnimationFrame(updatePosition);
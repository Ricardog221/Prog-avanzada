const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

let squareX = 50;
let squareY = 50;
const size = 50;
let velocityX = 0;
let velocityY = 0;

function getRandomColor() {
    let r = Math.floor(Math.random() * 256);
    let g = Math.floor(Math.random() * 256);
    let b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

let currentColor = getRandomColor(); 

function drawSquare() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); 
    ctx.fillStyle = currentColor;
    ctx.fillRect(squareX, squareY, size, size);
    
}

function updatePosition() {
  
    squareX += velocityX;
    squareY += velocityY;

    if (squareX > canvas.width) {
        squareX = -size;
    }
    
    if (squareX + size < 0) {
        squareX = canvas.width;
    }
    
    if (squareY > canvas.height) {
        squareY = -size;
    }
   
    if (squareY + size < 0) {
        squareY = canvas.height;
    }

    drawSquare(); 
    requestAnimationFrame(updatePosition); 
}

window.addEventListener('keydown', function(event) {
    let step = 4;

    switch (event.key) {
        case'ArrowUp':
            velocityX=0;
            velocityY = -step;
            currentColor = getRandomColor();    
            break;
    
        case 'ArrowDown':
            velocityX=0;
            velocityY = step;
        currentColor = getRandomColor(); 
            break;
        
        case 'ArrowLeft':
            velocityY=0;
            velocityX = -step;
            currentColor = getRandomColor(); 
            break;
        case 'ArrowRight':
            velocityY=0;
            velocityX = step;
            currentColor = getRandomColor(); 

            break;


    }
  
});

requestAnimationFrame(updatePosition);


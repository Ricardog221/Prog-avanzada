const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

let squareX = 50;
let squareY = 50;
const size = 50;
let velocityX = 0;
let velocityY = 0;


let targetX = Math.random() * (canvas.width - size);
let targetY = Math.random() * (canvas.height - size);

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

    
    ctx.fillStyle = 'red';
    ctx.fillRect(targetX, targetY, size, size);
}

function updatePosition() {
    
    squareX += velocityX;
    squareY += velocityY;

    
    if (squareX > canvas.width) squareX = -size;
    if (squareX + size < 0) squareX = canvas.width;
    if (squareY > canvas.height) squareY = -size;
    if (squareY + size < 0) squareY = canvas.height;

    
if (squareX < targetX + size && squareX + size > targetX &&
    squareY < targetY + size && squareY + size > targetY) {

    targetX = Math.random() * (canvas.width - size);
    targetY = Math.random() * (canvas.height - size);
}

    drawSquare(); 
    requestAnimationFrame(updatePosition); 
}

window.addEventListener('keydown', function(event) {
    let step = 10;

    if (event.key === 'ArrowUp') {
        velocityY = -step;
        currentColor = getRandomColor(); 
    } else if (event.key === 'ArrowDown') {
        velocityY = step;
        currentColor = getRandomColor(); 
    } else if (event.key === 'ArrowLeft') {
        velocityX = -step;
        currentColor = getRandomColor(); 
    } else if (event.key === 'ArrowRight') {
        velocityX = step;
        currentColor = getRandomColor(); 
    }
});

window.addEventListener('keyup', function(event) {
    if (event.key === 'ArrowUp' || event.key === 'ArrowDown') {
        velocityY = 0;
    }
    if (event.key === 'ArrowLeft' || event.key === 'ArrowRight') {
        velocityX = 0;
    }
});

requestAnimationFrame(updatePosition);




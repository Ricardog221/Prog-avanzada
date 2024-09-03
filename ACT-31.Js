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

class CollisionRect {
    constructor(x, y, width, height) {
        this.x = x;
        this.y = y;
        this.width = width;
        this.height = height;
    }

    draw() {
        ctx.fillStyle = 'blue';
        ctx.fillRect(this.x, this.y, this.width, this.height);
    }

    isColliding(x, y, size) {
        return (
            x < this.x + this.width &&
            x + size > this.x &&
            y < this.y + this.height &&
            y + size > this.y
        );
    }
}

let collisionRect = new CollisionRect(50, 150, 400, 100);

function drawSquare() {
    ctx.clearRect(0, 0, canvas.width, canvas.height); 

    collisionRect.draw();

    ctx.fillStyle = currentColor;
    ctx.fillRect(squareX, squareY, size, size);

   
    ctx.fillStyle = 'red';
    ctx.fillRect(targetX, targetY, size, size);
}

function updatePosition() {
    
    let newX = squareX + velocityX;
    let newY = squareY + velocityY;

    if (newX > canvas.width) newX = -size;
    if (newX + size < 0) newX = canvas.width;
    if (newY > canvas.height) newY = -size;
    if (newY + size < 0) newY = canvas.height;

    if (!collisionRect.isColliding(newX, newY, size)) {
        squareX = newX;
        squareY = newY;
    }

    if (squareX < targetX + size && squareX + size > targetX &&
        squareY < targetY + size && squareY + size > targetY) {
        
        do {
            targetX = Math.random() * (canvas.width - size);
            targetY = Math.random() * (canvas.height - size);
        } while (collisionRect.isColliding(targetX, targetY, size)); 
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
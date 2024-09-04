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

let collisionRects = [
    new CollisionRect(100, 50, 200, 50),  
    new CollisionRect(100, 300, 200, 50) 
];

let targetX = Math.random() * (canvas.width - size);
let targetY = Math.random() * (canvas.height - size);

function drawSquare() {
    
    ctx.clearRect(0,0,canvas.width,canvas.height);
    
    collisionRects.forEach(rect => rect.draw());

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

       
        let isColliding = collisionRects.some(rect => rect.isColliding(newX, newY, size));

        if (!isColliding) {
            squareX = newX;
            squareY = newY;
        }

        
        if (squareX < targetX + size && squareX + size > targetX &&
            squareY < targetY + size && squareY + size > targetY) {
           

         
            do {
                targetX = Math.random() * (canvas.width - size);
                targetY = Math.random() * (canvas.height - size);
            } while (collisionRects.some(rect => rect.isColliding(targetX, targetY, size)));
        }
    

    drawSquare(); 
    requestAnimationFrame(updatePosition); 
}




window.addEventListener('keydown', function(event) {
    let step = 10;

    if (event.key === 'ArrowUp') {
        velocityY = -step;
        velocityX=0;
        currentColor = getRandomColor(); 
    } else if (event.key === 'ArrowDown') {
        velocityY = step;
        velocityX=0;
        currentColor = getRandomColor(); 
    } else if (event.key === 'ArrowLeft') {
        velocityX = -step;
        velocityY=0;
        currentColor = getRandomColor(); 
    } else if (event.key === 'ArrowRight') {
        velocityX = step;
        velocityY=0;
        currentColor = getRandomColor(); 
    }
});
requestAnimationFrame(updatePosition);








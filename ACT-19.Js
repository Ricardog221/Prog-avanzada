const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

let squareX = 50;
let squareY = 50;
const size = 50; 

function getRandomColor() {
    const r = Math.floor(Math.random() * 256);
    const g = Math.floor(Math.random() * 256);
    const b = Math.floor(Math.random() * 256);
    return `rgb(${r}, ${g}, ${b})`;
}

function drawSquare(x, y) {
    const randomColor = getRandomColor(); 
    ctx.fillStyle = randomColor;
    ctx.fillRect(x, y, size, size);
}

window.addEventListener('keydown', function(event) {
    const step = 10; 

    drawSquare(squareX, squareY);

    switch (event.key) {
        case 'ArrowUp':
            if (squareY - step >= 0) squareY -= step;
            break;
        case 'ArrowDown':
            if (squareY + step + size <= canvas.height) squareY += step;
            break;
        case 'ArrowLeft':
            if (squareX - step >= 0) squareX -= step;
            break;
        case 'ArrowRight':
            if (squareX + step + size <= canvas.width) squareX += step;
            break;
    }

    drawSquare(squareX, squareY);
});

drawSquare(squareX, squareY);


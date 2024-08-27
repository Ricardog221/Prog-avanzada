const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');
let isDrawing = false;  
 function getMousePosition(canvas, event) {
        const rect = canvas.getBoundingClientRect();
        return {
            x: event.clientX - rect.left,
            y: event.clientY - rect.top
        };
    }

    function getRandomColor() {
        const r = Math.floor(Math.random() * 256);
        const g = Math.floor(Math.random() * 256);
        const b = Math.floor(Math.random() * 256);
        return `rgba(${r}, ${g}, ${b}, 0.5)`;
    }

    function drawCircle(x, y) {
        ctx.beginPath();
        const radius = 25;
        ctx.arc(x, y, radius, 0, 2 * Math.PI, false);
        const randomColor = getRandomColor();
        ctx.fillStyle = randomColor;
        ctx.fill();
        ctx.strokeStyle = randomColor;
        ctx.stroke();
    }

    function drawSquare(x, y) {
        const size = 50;
        const randomColor = getRandomColor();
        ctx.fillStyle = randomColor;
        ctx.fillRect(x - size / 2, y - size / 2, size, size);
        ctx.strokeStyle = randomColor;
        ctx.strokeRect(x - size / 2, y - size / 2, size, size);
    }

   
    function drawTrail(x, y) {
        ctx.beginPath();
        const radius = 5; 
        ctx.arc(x, y, radius, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'black'; 
        ctx.fill();
    }

    
    canvas.addEventListener('mousedown', function(event) {
        isDrawing = true;  
    });

    
    canvas.addEventListener('mouseup', function(event) {
        isDrawing = false;  
    });

    
    canvas.addEventListener('mousemove', function(event) {
        if (isDrawing) {  
            const mousePos = getMousePosition(canvas, event);
            drawTrail(mousePos.x, mousePos.y);
        }
    });

    canvas.addEventListener('click', function(event) {
        const mousePos = getMousePosition(canvas, event);
        

        if (Math.random() > 0.5) {
            drawCircle(mousePos.x, mousePos.y);
        } else {
            drawSquare(mousePos.x, mousePos.y);
        }
    });



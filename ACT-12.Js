const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

function getMousePosition(canvas, event) {
        const rect = canvas.getBoundingClientRect();
        return {
            x: event.clientX - rect.left,
            y: event.clientY - rect.top
        };
    }

    function drawCircle(x, y) {
        ctx.beginPath();
        const radius = 35; 
        ctx.arc(x, y, radius, 0, 2 * Math.PI, false);
        ctx.fillStyle = 'red'; 
        ctx.fill();
        ctx.strokeStyle = 'black'; 
        ctx.stroke();
    }

    canvas.addEventListener('click', function(event) {
        const mousePos = getMousePosition(canvas, event);
        drawCircle(mousePos.x, mousePos.y);
    });




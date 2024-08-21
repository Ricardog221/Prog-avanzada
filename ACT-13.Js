const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

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
        const radius = 35; 
        ctx.arc(x, y, radius, 0, 2 * Math.PI, false);
        const randomColor = getRandomColor(); 
        ctx.fillStyle = randomColor; 
        ctx.fill();
        ctx.strokeStyle = randomColor; 
        ctx.stroke();
    }

    canvas.addEventListener('click', function(event) {
        const mousePos = getMousePosition(canvas, event);
        drawCircle(mousePos.x, mousePos.y);
    });


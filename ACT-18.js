const canvas = document.getElementById('myCanvas');
const ctx = canvas.getContext('2d');

    function getRandomColor() {
        const r = Math.floor(Math.random() * 256);
        const g = Math.floor(Math.random() * 256);
        const b = Math.floor(Math.random() * 256);
        return `rgb(${r}, ${g}, ${b})`;
    }

    function getRandomPosition(size) {
        const x = Math.random() * (canvas.width - size);
        const y = Math.random() * (canvas.height - size);
        return { x, y };
    }

    function  drawRandomSquareWithKey(key) {
        const size = 50; 
        const randomColor = getRandomColor();
        const randomPos = getRandomPosition(size);

        ctx.fillStyle = randomColor;
        ctx.fillRect(randomPos.x, randomPos.y, size, size);

        ctx.strokeStyle = 'black';
        ctx.strokeRect(randomPos.x, randomPos.y, size, size);


       ctx.fillStyle='black';
       ctx.font='20px Arial';
       ctx.textAlign='center';
       ctx.textBaseline='middle';
       ctx.fillText(key,randomPos.x+size/2,randomPos.y+size/2);
    }

    window.addEventListener('keydown', function(event) {
        const keyPressed=event.key;
        drawRandomSquareWithKey(keyPressed);
    });



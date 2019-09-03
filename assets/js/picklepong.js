const canvas = document.getElementById('canvas')

const FPS = 60;
let dt = 0.9;

let set = false;

let dpi = window.devicePixelRatio;
//fix pixelated element
    function fix_dpi() {
    //get CSS height
    //the + prefix casts it to an integer
    //the slice method gets rid of "px"
    let style_height = +getComputedStyle(canvas).getPropertyValue("height").slice(0, -2);
    //get CSS width
    let style_width = +getComputedStyle(canvas).getPropertyValue("width").slice(0, -2);
    //scale the canvas
    canvas.setAttribute('height', style_height * dpi);
    canvas.setAttribute('width', style_width * dpi);

}

fix_dpi()


let colors = {
    red: '#EF172F',
    blue: '#121237',
    white: '#fff',
    matBlue: '#17B4EF'
}

let sizes = {
    player: {
        width: 35,
        height: 200
    },
    ball: {
        radius: 40
    }
}

let position = {
    ball: {
        x: canvas.width / 2,
        y: canvas.height / 2
    }
}

let velocity = {
    player: {
        vx: 250,
        vy: 600
    },
    ball: {
        vx: 10,
        vy: 10
    }
}

if (canvas.getContext) {
    const context = canvas.getContext('2d')    

    class Player {
        constructor(color, x, y, width, height) {
            this.color = color;
            this.x = x;
            this.y = y;
            this.width = width;
            this.height = height;
        }
        draw() {
            context.fillStyle = this.color;
            context.fillRect(this.x, this.y, this.width, this.height);
        }
    }

    class Ball {
        constructor(x, y, radius, startAngle, endAngle, anticlockwise, color) {
            this.anticlockwise = anticlockwise;
            this.x = x;
            this.y = y;
            this.radius = radius;
            this.startAngle = startAngle;
            this.endAngle = endAngle;
            this.color = color;

        }
        drawCircle() {
            context.beginPath();
            context.arc(this.x, this.y, this.radius, this.startAngle, this.endAngle, this.anticlockwise);
            context.fillStyle=this.color;
            context.stroke();
        }
    }

    class Image {
        constructor(image, x, y, width, height) {
            this.image = image
            this.x = x
            this.y = y
            this.width = width
            this.height = height
        }
        draw() {
            context.drawImage(this.image, this.x, this.y, this.width, this.height);
        }
    }
    
    const ballImg = document.getElementById('ball')
    const ball = new Image(ballImg, position.ball.x, position.ball.y, sizes.ball.radius, sizes.ball.radius)
    
    const playerOne = new Player(colors.red,
        0,
        canvas.height/ 2 - sizes.player.height / 2,
        sizes.player.width,
        sizes.player.height)

    const playerTwo = new Player(colors.blue,
        canvas.width - sizes.player.width,
        canvas.height / 2 - sizes.player.height / 2,
        sizes.player.width,
        sizes.player.height)

        let resetSet = ()=>{
            ball.x = ball.x < 0 ? playerTwo.x - playerTwo.width : playerOne.x + playerOne.width / 2
            ball.y = ball.x < 0 ? playerTwo.y + playerTwo.height / 2 : playerOne.y + playerOne.height / 2
            dt = 0.9
            set = false
        }

    // TODO: make the next one in initialize function

    let ballMove = () => {
        if (ball.x < playerOne.x + playerOne.width / 2 && (ball.y >= playerOne.y && ball.y <= playerOne.y + playerOne.height)) {
            velocity.ball.vx *= -1
        }
        if (ball.x > playerTwo.x - playerTwo.width / 2 && (ball.y >= playerTwo.y && ball.y <= playerTwo.y + playerTwo.height)) {
            velocity.ball.vx *= -1
        }
        if(ball.y < 0 || ball.y > canvas.height) {
            velocity.ball.vy *= -1
        }
        
        setInterval(() => {
            dt += 0.01
            console.log(dt);
        }, 5000);

        if (dt > 4) {
            dt = 3
        }

        ball.x -= velocity.ball.vx * dt
        ball.y -= velocity.ball.vy * dt
    }

    let upDateGame = () => {
        let speedPlayerTwo = 0.5
        document.onkeypress = (e) =>{
            if(e.keyCode == 32){
                set = true
            }
        }
        document.onmousemove = (e) => {
            playerOne.y = e.clientY
            console.log(playerOne.y);
        }
        playerTwo.y = ball.y * speedPlayerTwo
        if (playerOne.y <= 0) {
            playerOne.y = 0
        } else if (playerOne.y > canvas.height - sizes.player.height) {
            playerOne.y = canvas.height - sizes.player.height
            speedPlayerTwo = Math.random() * 1
        }
        if (playerTwo.y <= 0) {
            playerTwo.y = 0
        } else if (playerTwo.y > canvas.height - sizes.player.height) {
            playerTwo.y = canvas.height - sizes.player.height
        }
        match()
    }

    let match = () => {
        if (ball.x < -40 ||ball.x > canvas.width + 40) {
            resetSet()
        }
    }

    let game = () => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        ball.draw()
        playerOne.draw()
        playerTwo.draw()
        if(set)ballMove()
    }

    setInterval(() => {
        upDateGame();
        game();
    }, 1000 / FPS)
} else {
    `<p>Désolé mais votre navigateur n'accepte pas le truc de fou que je voulais vous montrer</p>`
}
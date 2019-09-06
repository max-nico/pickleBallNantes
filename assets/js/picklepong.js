let infoToStart = document.createElement('div')
document.querySelector('.page-404').appendChild(infoToStart)
infoToStart.classList.add('infoStart')
infoToStart.innerHTML = `<p>Cliquer pour jouer !</p>`
document.innerHTML += `<p class="win">player</p>`

const canvas = document.getElementById('canvas')
let scorep1 = document.getElementById('scorep1')
let scorep2 = document.getElementById('scorep2')
let p1 = 0
let p2 = 0
let countClick = 0


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
        radius: 50
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
        canvas.height / 2 - sizes.player.height / 2,
        sizes.player.width,
        sizes.player.height)
    playerOne: {
        win: false
    }

    const playerTwo = new Player(colors.blue,
        canvas.width - sizes.player.width,
        canvas.height / 2 - sizes.player.height / 2,
        sizes.player.width,
        sizes.player.height)
    playerTwo: {
        win: false
    }

    let resetSet = () => {
        ball.x = ball.x < 0 ? playerTwo.x - playerTwo.width : playerOne.x + playerOne.width / 2
        ball.y = ball.x < 0 ? playerTwo.y + playerTwo.height / 2 : playerOne.y + playerOne.height / 2
        dt = 0.9
        set = false
        if (!set) {
            setTimeout(() => {
                playerTwo.y = Math.random() * canvas.height
            }, 1000);
        }
    }

    // TODO: make the next one in initialize function

    let ballMove = () => {
        let collide = false
        if (ball.x < playerOne.x + playerOne.width / 2 && (ball.y >= playerOne.y && ball.y <= playerOne.y + playerOne.height)) {
            velocity.ball.vx *= -1
            collide = true
        }
        if (ball.x > playerTwo.x - playerTwo.width / 2 && (ball.y >= playerTwo.y && ball.y <= playerTwo.y + playerTwo.height)) {
            velocity.ball.vx *= -1
            collide = true
        }
        if (ball.y < 0 || ball.y > canvas.height) {
            velocity.ball.vy *= -1
        }
        
        if (collide) {
            if (ball.x < playerOne.x + playerOne.width / 2 ) {
                velocity.ball.vx = -Math.floor(Math.random() * 10)
                if (velocity.ball.vx > -3) velocity.ball.vx = -3
            } 
            if (ball.x > playerTwo.x - playerTwo.width / 2) {
                velocity.ball.vx = Math.floor(Math.random() * 10)
                if (velocity.ball.vx < 3) velocity.ball.vx = 3
            }
        }

        setInterval(() => {
            dt += 0.01
        }, 5000);

        if (dt > 3) {
            dt = 3
        }

        ball.x -= velocity.ball.vx * dt
        ball.y -= velocity.ball.vy * dt
    }

    let upDateGame = () => {
        let speedPlayerTwo = 1
        document.onclick = (e) => {
            countClick++
            if (countClick > 1){
                set = true
            } else {
                setTimeout(() => {
                    infoToStart.style.display = "none"
                    set = true
                }, 2000);
            }
        }

        document.onmousemove = (e) => {
            playerOne.y = e.clientY
        }

        if (playerOne.y <= 0) {
            playerOne.y = 0
        }

        if (playerOne.y > canvas.height - sizes.player.height) {
            playerOne.y = canvas.height - sizes.player.height
            speedPlayerTwo = Math.random() * 1
            console.log(speedPlayerTwo);
        }
        
        if (set) playerTwo.y = ball.y * speedPlayerTwo * 0.6

        if (playerTwo.y <= 0) {
            playerTwo.y = 0
        } else if (playerTwo.y > canvas.height - sizes.player.height) {
            playerTwo.y = canvas.height - sizes.player.height
        }
        match()
    }
    
    let match = () => {
        
        if (ball.x < -40) {
            playerTwo.win = true
            p2++
            resetSet()
        }
        if (ball.x > canvas.width + 40) {
            playerOne.win = true
            p1++
            resetSet()
        }
    }
    
    let win = (point) => {
        if (p1 === point) {
        } 
    }
    let game = () => {
        context.clearRect(0, 0, canvas.width, canvas.height);
        ball.draw()
        playerOne.draw()
        playerTwo.draw()
        scorep1.innerHTML = p1
        scorep2.innerHTML = p2
        if (!set && playerOne.win) {
            ball.y = playerOne.y + (playerOne.height / 2 - ball.height / 2)
            ball.x = playerOne.x + ball.width / 2 + ball.width / 2
        }
        if (!set && playerTwo.win) {
            ball.y = playerTwo.y + (playerTwo.height / 2 - ball.height / 2)
            ball.x = playerTwo.x + ball.width / 2 - ball.width - ball.width / 2
        }
        if (set) ballMove()
    }

    setInterval(() => {
        upDateGame();
        game();
    }, 1000 / FPS)
} else {
    `<p>Désolé mais votre navigateur n'accepte pas le truc de fou que je voulais vous montrer</p>`
}
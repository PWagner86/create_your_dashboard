const slingshotWrapper = document.querySelector(".slingshot-wrapper");
const closeBtn = document.querySelector(".close-slingshot");
const restart = document.querySelector(".restart-slingshot");
const counter = document.querySelector(".counter");
const width = slingshotWrapper.clientWidth;
const height = slingshotWrapper.clientHeight;
let count = 0;

counter.innerHTML = count;

let engine = Matter.Engine.create();

let render = Matter.Render.create({
    element: slingshotWrapper,
    engine: engine,
    options: {
        width: width,
        height: height,
        wireframes: false
    }
});

render.canvas.classList.add("slingshot-game")

let ground = Matter.Bodies.rectangle( width - 300,600,500,20,{isStatic: true});

let mouse = Matter.Mouse.create(render.canvas);
let mouseConstraint = Matter.MouseConstraint.create(engine, {
    mouse: mouse,
    constraint:{
        render: {visible: false}
    }
});
render.mouse = mouse;

let ball = Matter.Bodies.circle(300, 500, 20);
let sling = Matter.Constraint.create({
    pointA: {x:300, y:500},
    bodyB: ball,
    stiffness: 0.05
})

let stack = Matter.Composites.stack(width - 520,270,8,4,0,0, function(x,y){
    return Matter.Bodies.polygon(x,y,8,30);
})

let firing = false;
Matter.Events.on(mouseConstraint, 'enddrag', function(e){
    if(e.body === ball) firing = true;
})
Matter.Events.on(engine, 'beforeUpdate', checkWin);

Matter.Events.on(engine, 'afterUpdate', function(){
    if(firing && Math.abs(ball.position.x -300) < 20 && Math.abs(ball.position.y-500) < 20){
        ball = Matter.Bodies.circle(300,500,20);
        Matter.World.add(engine.world, ball);
        sling.bodyB = ball;
        firing = false;
        count++;
        counter.innerHTML = count;


    }
})


Matter.World.add(engine.world,[stack, ground, ball, sling, mouseConstraint]);
Matter.Engine.run(engine);
Matter.Render.run(render);

closeBtn.addEventListener("click", ()=> {
    slingshotWrapper.style.display = "none";
})

restart.addEventListener("click", ()=> {

    console.log("click");
})

function checkWin(){
    if(stack.bodies.every(poly => poly.position.y > 600)){
        console.log("WIN");
    }
}
const slingshotWrapper = document.querySelector(".slingshot-wrapper");
const width = slingshotWrapper.clientWidth;
const height = slingshotWrapper.clientHeight;
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
    // return Matter.Bodies.rectangle(x,y,80,80);
    // let sides = Math.round(Matter.Common.random(2, 8));
    // return Matter.Bodies.polygon(x, y, sides, Matter.Common.random(20, 50));
    return Matter.Bodies.polygon(x,y,8,30);

})

let firing = false;
Matter.Events.on(mouseConstraint, 'enddrag', function(e){
    if(e.body === ball) firing = true;
})
Matter.Events.on(engine, 'afterUpdate', function(){
    if(firing && Math.abs(ball.position.x -300) < 20 && Math.abs(ball.position.y-500) < 20){
        ball = Matter.Bodies.circle(300,500,20);
        Matter.World.add(engine.world, ball);
        sling.bodyB = ball;
        firing = false;
    }
})

Matter.World.add(engine.world,[stack, ground, ball, sling, mouseConstraint]);
Matter.Engine.run(engine);
Matter.Render.run(render);
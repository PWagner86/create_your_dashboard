import Rain from './Rain.js';
import Snow from './Snow.js';

// Variablen
const cWrapper = <HTMLDivElement>document.querySelector(".canvas-wrapper");
const c = <HTMLCanvasElement>document.querySelector("#canvas");
const width: number = cWrapper.clientWidth;
const height: number = cWrapper.clientHeight;
const ctx = <CanvasRenderingContext2D>c.getContext("2d", {alpha: true});
let weatherString: string = "";
const place = <HTMLParagraphElement>document.querySelector(".city");
const xhttp: XMLHttpRequest = new XMLHttpRequest();
const drops: Rain[] = [];
const flakes: Snow[] = [];



// Events
resizing();




xhttp.onreadystatechange = function(){
    if(this.readyState == 4 && this.status == 200){
        const response = JSON.parse(xhttp.responseText);
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place.innerHTML}&appid=${response.weather}&units=metric`)
        .then(res => {
            res.json()
            .then(data => {
                // console.log(data);
                weatherString = data.weather[0].main;
                if(weatherString === "Rain" || weatherString === "Drizzle"){
                    for(let i: number = 0; i < 100; i++){
                        drops[i] = new Rain(ctx, width, height);
                    }                    
                    setInterval(redrawRain);               
                }else if(weatherString === "Snow"){
                    for(let i = 0; i < 200; i++){
                        flakes[i] = new Snow(ctx, width, height);
                    }      
                
                    setInterval(redrawSnow);                    
                }
            })
        })
        .catch(error => {
            console.log(error);
        })
    }
};
xhttp.open("GET", "../keys.json", true);
xhttp.send();

// Funktionen
function resizing(){
    c.height = height;
    c.width = width;
    redrawRain();
    redrawSnow();
}

function redrawRain(){
    ctx.clearRect(0, 0, width, height);
    drops.forEach(drop => drop.show());
    drops.forEach(drop => drop.fall());
}

function redrawSnow(){
    ctx.clearRect(0, 0, width, height);
    flakes.forEach(flake => flake.show());
    flakes.forEach(flake => flake.fall());
}



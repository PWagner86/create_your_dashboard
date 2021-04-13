import Clock from './Clock.js';
import News from './News.js';
import Weather from './Weather.js';
import {selectors, setSelectors} from './Position.js';

// Variables
const dashboard = <HTMLElement>document.querySelector(".dashboard-wrapper");
const maxWidth: number = 1700;
const navBtn = <HTMLElement>document.querySelector(".nav-btn");
const nav = <HTMLElement>document.querySelector(".dash-nav");
const colorBtn = <HTMLLIElement>document.querySelector(".color-btn");
const pickColorBtn = <HTMLInputElement>document.querySelector(".pick-color");
const colorForm = <HTMLDivElement>document.querySelector(".color-form-wrapper");
let navActive: boolean = false;
const clock: Clock = new Clock;
const weather: Weather = new Weather;
const news: News = new News;

// Das Dashboard soll bei einem Ultrawide-Screen nicht zu breit werden.
if(window.innerWidth > maxWidth){
    dashboard.style.width = `${maxWidth}px`;
}else{
    dashboard.style.width = `${window.innerWidth}px`;
}
// Events
// Navigation ein- und ausblenden
navBtn.addEventListener("click", ()=> {
    // console.log("hallo");
    if(navActive === false){
        navBtn.style.transform = "rotateZ(180deg)";
        nav.style.top = "0";
        navActive  = true;
    }else{
        navBtn.style.transform = "rotateZ(0deg)";
        nav.style.top = "-100vh";
        navActive = false;
    }
})

// Farbauswahl soll sichtbar werden, wenn Knopf gedrückt wird
colorBtn.addEventListener("click", ()=> {
    // console.log(colorForm);
    colorForm.style.display = "flex";
    navBtn.style.transform = "rotateZ(0deg)";
    nav.style.top = "-100vh";
    navActive = false;
})

// Beim Farbe ändern verschwindet die Farbauswahl wieder.
pickColorBtn.addEventListener("click", ()=> {
    colorForm.style.display = "none";
})

selectors[0].addEventListener("change", ()=> {
    setSelectors(0);
})
selectors[1].addEventListener("change", ()=> {
    setSelectors(1);
})
selectors[2].addEventListener("change", ()=> {
    setSelectors(2);
})
selectors[3].addEventListener("change", ()=> {
    setSelectors(3);
})


// Funktion um die Uhr aktuell zu halten
setInterval(clock.getTime, 500);
// Aktuallisiert das Wetter und die News alle 60 resp. 20 Sekunden
setInterval(weather.getData, 60000);
setInterval(news.getData, 20000); 

// Functions

import getTime from './Clock.js';
import getNews from './News.js';
import getWeather from './Weather.js';

// Variables
const dashboard: any = document.querySelector(".dashboard-wrapper");
const maxWidth: number = 1700;
const navBtn: any = document.querySelector(".nav-btn");
const nav: any = document.querySelector(".dash-nav");
const colorBtn: any = document.querySelector(".color-btn");
const pickColorBtn: any = document.querySelector(".pick-color");
const colorForm: any = document.querySelector(".color-form-wrapper");
let navActive: boolean = false;

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

// Funktion um die Uhr aktuell zu halten
getTime();
getWeather();
getNews();
// Aktuallisiert das Wetter und die News alle 60 resp. 20 Sekunden
setInterval(getWeather, 60000);
setInterval(getNews, 20000);
// Functions

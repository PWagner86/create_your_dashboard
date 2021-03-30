import getTime from './Clock.js';
import getWeather from './Weather.js';
// Variables
const navBtn: any = document.querySelector(".nav-btn");
const nav: any = document.querySelector(".dash-nav");
let navActive: boolean = false;

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
// Funktion um die Uhr aktuell zu halten
getTime();
getWeather();
// Functions

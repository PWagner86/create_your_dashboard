import Clock from './Clock.js';
import News from './News.js';
import Weather from './Weather.js';
import { selectors, setSelectors } from './Position.js';
// Variables
const dashboard = document.querySelector(".dashboard-wrapper");
const maxWidth = 1700;
const navBtn = document.querySelector(".nav-btn");
const nav = document.querySelector(".dash-nav");
const colorBtn = document.querySelector(".color-btn");
const pickColorBtn = document.querySelector(".pick-color");
const colorForm = document.querySelector(".color-form-wrapper");
let navActive = false;
const clock = new Clock;
const weather = new Weather;
const news = new News;
// Das Dashboard soll bei einem Ultrawide-Screen nicht zu breit werden.
if (window.innerWidth > maxWidth) {
    dashboard.style.width = `${maxWidth}px`;
}
else {
    dashboard.style.width = `${window.innerWidth}px`;
}
// Events
// Navigation ein- und ausblenden
navBtn.addEventListener("click", () => {
    // console.log("hallo");
    if (navActive === false) {
        navBtn.style.transform = "rotateZ(180deg)";
        nav.style.top = "0";
        navActive = true;
    }
    else {
        navBtn.style.transform = "rotateZ(0deg)";
        nav.style.top = "-100vh";
        navActive = false;
    }
});
// Farbauswahl soll sichtbar werden, wenn Knopf gedrückt wird
colorBtn.addEventListener("click", () => {
    // console.log(colorForm);
    colorForm.style.display = "flex";
    navBtn.style.transform = "rotateZ(0deg)";
    nav.style.top = "-100vh";
    navActive = false;
});
// Beim Farbe ändern verschwindet die Farbauswahl wieder.
pickColorBtn.addEventListener("click", () => {
    colorForm.style.display = "none";
});
selectors[0].addEventListener("change", () => {
    setSelectors(0);
});
selectors[1].addEventListener("change", () => {
    setSelectors(1);
});
selectors[2].addEventListener("change", () => {
    setSelectors(2);
});
selectors[3].addEventListener("change", () => {
    setSelectors(3);
});
// Functions

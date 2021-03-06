import Rain from './Rain.js';
import Snow from './Snow.js';
import Sun from './Sun.js';
import Star from './Star.js';
import Cloud from './Cloud.js';
// Variablen
const cWrapper = document.querySelector(".canvas-wrapper");
const c = document.querySelector("#canvas");
const width = cWrapper.clientWidth;
const height = cWrapper.clientHeight;
const ctx = c.getContext("2d", { alpha: true });
let weatherString = "";
const place = document.querySelector(".city");
const drops = [];
const flakes = [];
const stars = [];
const sun = new Sun(ctx, width, height);
const cloud = new Cloud(ctx, width, height);
// Events
resizing();
/*
Hier wird geprüft, wie das Wetter
an der Destination ist und dem
entsprechend wird der Canvas angepasst.
*/
fetch("../keys.json")
    .then(res => {
    res.json()
        .then(key => {
        fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place.innerHTML}&appid=${key.weather}&units=metric`)
            .then(res => {
            res.json()
                .then(data => {
                // console.log(data);
                weatherString = data.weather[0].main;
                // Lässt es im Hintergrund regnen
                if (weatherString === "Rain" || weatherString === "Drizzle" || weatherString === "Thunderstorm") {
                    for (let i = 0; i < 100; i++) {
                        drops[i] = new Rain(ctx, width, height);
                    }
                    setInterval(redrawRain);
                    // Lässt es im Hintergrund schneien
                }
                else if (weatherString === "Snow") {
                    for (let i = 0; i < 200; i++) {
                        flakes[i] = new Snow(ctx, width, height);
                    }
                    setInterval(redrawSnow);
                    // Lässt Sonne oder Sternen im Hintergrund scheinen
                }
                else if (weatherString === "Clear") {
                    if (data.weather[0].icon.includes('d')) {
                        redrawSun();
                    }
                    else {
                        for (let i = 0; i < 200; i++) {
                            stars[i] = new Star(ctx, width, height);
                        }
                        redrawStars();
                    }
                    // Lässt Wolken im Hintergrund vorbeiziehen
                }
                else if (weatherString === "Clouds" || weatherString === "Atmosphere") {
                    redrawClouds();
                }
            });
        })
            .catch(error => {
            console.log(error);
        });
    });
});
// Funktionen
function resizing() {
    c.height = height;
    c.width = width;
    redrawRain();
    redrawSnow();
    redrawStars();
    redrawClouds();
    redrawSun();
}
function redrawRain() {
    ctx.clearRect(0, 0, width, height);
    drops.forEach(drop => drop.show());
    drops.forEach(drop => drop.fall());
}
function redrawSnow() {
    ctx.clearRect(0, 0, width, height);
    flakes.forEach(flake => flake.show());
    flakes.forEach(flake => flake.fall());
}
function redrawStars() {
    ctx.clearRect(0, 0, width, height);
    stars.forEach(star => star.show());
}
function redrawSun() {
    ctx.clearRect(0, 0, width, height);
    sun.show();
}
function redrawClouds() {
    ctx.clearRect(0, 0, width, height);
    cloud.show();
}

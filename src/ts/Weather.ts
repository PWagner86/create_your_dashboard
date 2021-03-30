import {apiKeys} from './config.js';
export default function getWeather(){
    const city: any = document.querySelector(".city");
    const temp: any = document.querySelector(".degree");
    const icon: any = document.querySelector(".weather-icon");
    let place: string = "Winterthur";
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place}&appid=${apiKeys.weather}&units=metric`)
    .then(res => {
        res.json()
        .then(data => {
            // console.log(data);
            const cityData: any = data.name;
            const weatherIcon: any = data.weather[0].icon;
            const degree: any = Math.floor(data.main.temp);
            city.innerHTML = cityData;
            temp.innerHTML = `${degree}°C`;
            icon.src = ` http://openweathermap.org/img/wn/${weatherIcon}@2x.png`;
        })
    })
}
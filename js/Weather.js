import { apiKeys } from './config.js';
export default function getWeather() {
    const city = document.querySelector(".city");
    const temp = document.querySelector(".degree");
    const icon = document.querySelector(".weather-icon");
    let place = "Winterthur";
    fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place}&appid=${apiKeys.weather}&units=metric`)
        .then(res => {
        res.json()
            .then(data => {
            // console.log(data);
            const cityData = data.name;
            const weatherIcon = data.weather[0].icon;
            const degree = Math.floor(data.main.temp);
            city.innerHTML = cityData;
            temp.innerHTML = `${degree}°C`;
            icon.src = ` http://openweathermap.org/img/wn/${weatherIcon}@2x.png`;
        });
    });
}

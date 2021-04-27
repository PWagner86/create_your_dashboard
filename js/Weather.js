// Wetterklasse um Wetterdaten zu holen
export default class Weather {
    constructor() {
        this.getData();
        setInterval(this.getData, 60000);
    }
    getData() {
        const city = document.querySelector(".city");
        const temp = document.querySelector(".degree");
        const icon = document.querySelector(".weather-icon");
        const place = document.querySelector(".city");
        fetch("../keys.json")
            .then(res => {
            res.json()
                .then(keys => {
                fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place.innerHTML}&appid=${keys.weather}&units=metric`)
                    .then(res => {
                    res.json()
                        .then(data => {
                        // console.log(data);
                        const cityData = data.name;
                        const weatherIcon = data.weather[0].icon;
                        const degree = Math.floor(data.main.temp);
                        city.innerHTML = cityData;
                        temp.innerHTML = `${degree}°C`;
                        icon.src = `http://openweathermap.org/img/wn/${weatherIcon}@2x.png`;
                    });
                })
                    .catch(error => {
                    console.log(error);
                });
            });
        });
    }
}

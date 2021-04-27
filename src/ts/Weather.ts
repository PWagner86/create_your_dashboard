// Wetterklasse um Wetterdaten zu holen

export default class Weather{


    constructor(){
        this.getData();
        setInterval(this.getData, 60000);
    }

    private getData(){
        const city = <HTMLParagraphElement>document.querySelector(".city");
        const temp = <HTMLParagraphElement>document.querySelector(".degree");
        const icon = <HTMLImageElement>document.querySelector(".weather-icon");
        const place = <HTMLParagraphElement>document.querySelector(".city");

        fetch("../keys.json")
        .then(res => {
            res.json()
            .then(keys => {
                fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place.innerHTML}&appid=${keys.weather}&units=metric`)
                .then(res => {
                    res.json()
                    .then(data => {
                        // console.log(data);
                        const cityData: string = data.name ;
                        const weatherIcon = data.weather[0].icon;
                        const degree: number = Math.floor(data.main.temp);
                        city.innerHTML = cityData;
                        temp.innerHTML = `${degree}°C`;
                        icon.src = `http://openweathermap.org/img/wn/${weatherIcon}@2x.png`;
                    })
                })
                .catch(error => {
                    console.log(error);
                })
            })
        })
    }
}
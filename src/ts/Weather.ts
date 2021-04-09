export default function getWeather(){

    const city: any = document.querySelector(".city");
    const temp: any = document.querySelector(".degree");
    const icon: any = document.querySelector(".weather-icon");
    let place: any = document.querySelector(".city");

    // API-Key aufrufen
    const xhttp: any = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response: any = JSON.parse(xhttp.responseText);
            // console.log(response);
            fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place.innerHTML}&appid=${response.weather}&units=metric`)
            .then(res => {
                res.json()
                .then(data => {
                    // console.log(data);
                    const cityData: any = data.name;
                    const weatherIcon: any = data.weather[0].icon;
                    const degree: number = Math.floor(data.main.temp);
                    city.innerHTML = cityData;
                    temp.innerHTML = `${degree}°C`;
                    icon.src = ` http://openweathermap.org/img/wn/${weatherIcon}@2x.png`;
                })
            })
            .catch(error => {
                console.log(error);
            })       
        }
    };
    xhttp.open("GET", "../keys.json", true);
    xhttp.send();


}
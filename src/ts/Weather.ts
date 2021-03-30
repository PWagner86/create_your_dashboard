export default function getWeather(){

    const city: any = document.querySelector(".city");
    const temp: any = document.querySelector(".degree");
    const icon: any = document.querySelector(".weather-icon");
    let place: string = "Winterthur";

    // API-Key aufrufen
    const xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            const response = JSON.parse(xhttp.responseText);
            // console.log(response);
            fetch(`https://api.openweathermap.org/data/2.5/weather?q=${place}&appid=${response.weather}&units=metric`)
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
    };
    xhttp.open("GET", "../keys.json", true);
    xhttp.send();


}
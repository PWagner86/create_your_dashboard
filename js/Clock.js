// Uhrklass um Zeit und Datum anzuzeigen
export default class Clock {
    constructor() {
        setInterval(this.getTime, 500);
    }
    getTime() {
        let date = new Date;
        let year = date.getFullYear();
        let month = (date.getMonth() + 1);
        let day = date.getDate();
        let hour = date.getHours();
        let minutes = date.getMinutes();
        let dayData = date.getUTCDay();
        const clockDate = document.querySelector(".clock-date");
        const clockTime = document.querySelector(".clock-time");
        const clockDay = document.querySelector(".clock-day");
        const days = [
            "Sonntag",
            "Montag",
            "Dienstag",
            "Mittwoch",
            "Donnerstag",
            "Freitag",
            "Samstag"
        ];
        month = checkTime(month);
        day = checkTime(day);
        hour = checkTime(hour);
        minutes = checkTime(minutes);
        clockDate.innerHTML = `${day}.${month}.${year}`;
        clockTime.innerHTML = `${hour}:${minutes}`;
        clockDay.innerHTML = days[dayData];
        // Sorgt dafür, dass immer eine Null vorne steht, sollte die Zahl niedriger als 10 sein.
        function checkTime(i) {
            if (i < 10) {
                i = `0${i}`;
            }
            return i;
        }
    }
}

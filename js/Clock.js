// Funktion für die Uhr und das Datum
export default function getTime() {
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
    function checkTime(i) {
        if (i < 10) {
            i = `0${i}`;
        }
        return i;
    }
    month = checkTime(month);
    day = checkTime(day);
    hour = checkTime(hour);
    minutes = checkTime(minutes);
    clockDate.innerHTML = `${day}.${month}.${year}`;
    clockTime.innerHTML = `${hour}:${minutes}`;
    clockDay.innerHTML = days[dayData];
    setTimeout(getTime, 500);
}

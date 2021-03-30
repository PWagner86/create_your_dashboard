// Funktion für die Uhr und das Datum
export default function getTime(){
    let date: Date = new Date;
    let year: any = date.getFullYear();
    let month: any = (date.getMonth() + 1);
    let day: any = date.getDate();
    let hour: any = date.getHours();
    let minutes: any = date.getMinutes();
    let dayData: any = date.getUTCDay();
    const clockDate: any = document.querySelector(".clock-date");
    const clockTime: any = document.querySelector(".clock-time");
    const clockDay: any = document.querySelector(".clock-day");
    const days: Array<string> = [
        "Sonntag",
        "Montag",
        "Dienstag", 
        "Mittwoch", 
        "Donnerstag",
        "Freitag",
        "Samstag"
    ]

    function checkTime(i: any){
        if(i < 10){
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

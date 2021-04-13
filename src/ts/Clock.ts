// Uhrklass um Zeit und Datum anzuzeigen

export default class Clock {
    
    public getTime(){
        let date: Date = new Date;
        let year: number = date.getFullYear();
        let month: number | string = (date.getMonth() + 1);
        let day: number | string = date.getDate();
        let hour: number | string = date.getHours();
        let minutes: number | string = date.getMinutes();
        let dayData: number = date.getUTCDay();
        const clockDate = <HTMLParagraphElement>document.querySelector(".clock-date");
        const clockTime = <HTMLParagraphElement>document.querySelector(".clock-time");
        const clockDay = <HTMLParagraphElement>document.querySelector(".clock-day");
        const days: Array<string> = [
            "Sonntag",
            "Montag",
            "Dienstag", 
            "Mittwoch", 
            "Donnerstag",
            "Freitag",
            "Samstag"
        ]

        month = checkTime(month);
        day = checkTime(day);
        hour = checkTime(hour);
        minutes = checkTime(minutes);

        clockDate.innerHTML = `${day}.${month}.${year}`;
        clockTime.innerHTML = `${hour}:${minutes}`;
        clockDay.innerHTML = days[dayData];

        function checkTime(i: number | string){
            if(i < 10){
                i = `0${i}`;
            }
            return i;
        }
    }
}
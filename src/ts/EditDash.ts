export default class EditDash{

    private container: HTMLDivElement;

    constructor(value1: string, value2: string, value3: string, value4: string){
        this.container = <HTMLDivElement>document.createElement("div");
        this.container.classList.add("dash-edit-wrapper");
        this.container.innerHTML = `
            <div class="edit-wrapper">
                <div class="spot-wrapper">
                    <div class="spot1 spot"><h6>${value1}</h6></div>
                    <div class="spot2 spot"><h6>${value2}</h6></div>
                    <div class="spot3 spot"><h6>${value3}</h6></div>
                    <div class="spot4 spot"><h6>${value4}</h6></div>
                </div>
                <nav class="edit-nav">
                    <ul>
                        <li>${value1}</li>
                        <li>${value2}</li>
                        <li>${value3}</li>
                        <li>${value4}</li>
                    </ul>
                </nav>
            <div>
        `;
        document.body.append(this.container);
    }

    public selectContainer(container: HTMLDivElement, array: HTMLDivElement[]){

        if(array.length < 2 && array.indexOf(container) == -1){
            container.classList.add("selected");
            array.unshift(container);

            // console.log(container.clientTop);
            // console.log(container.clientLeft);    
            console.log(array);
            console.log(array.length);
        }
        
        if(array.length === 2){
            const firstTop: number = array[0].clientWidth;
            const firstLeft: number = array[0].clientLeft;
            const secondTop: number = array[1].clientTop;
            const secondLeft: number = array[1].clientLeft;
            console.log(firstTop);
            console.log(firstLeft);
            console.log(secondTop);
            console.log(secondLeft);
        }
    }
}
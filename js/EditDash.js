export default class EditDash {
    constructor(value1, value2, value3, value4) {
        this.container = document.createElement("div");
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
    selectContainer(container, array) {
        if (array.length < 2 && array.indexOf(container) == -1) {
            container.classList.add("selected");
            array.unshift(container);
            // console.log(container.clientTop);
            // console.log(container.clientLeft);    
            console.log(array);
            console.log(array.length);
        }
        if (array.length === 2) {
            const firstTop = array[0].clientWidth;
            const firstLeft = array[0].clientLeft;
            const secondTop = array[1].clientTop;
            const secondLeft = array[1].clientLeft;
            console.log(firstTop);
            console.log(firstLeft);
            console.log(secondTop);
            console.log(secondLeft);
        }
    }
}

export const selectors = document.querySelectorAll<HTMLSelectElement>("select");

// Sorgt dafür, dass das selektierte Element für die anderen Selektoren nicht mehr auswählbar ist.
export function setSelectors(value: number){
    if(selectors[value].value === "first"){
        selectors.forEach(selector => {
            selector[1].disabled = true;
        })
        selectors[value][1].disabled = false;

    }else if(selectors[value].value === "second"){
        selectors.forEach(selector => {
            selector[2].disabled = true;
        })
        selectors[value][2].disabled = false;

    }else if(selectors[value].value === "third"){
        selectors.forEach(selector => {
            selector[3].disabled = true;
        })
        selectors[value][3].disabled = false;

    }else if(selectors[value].value === "fourth"){
        selectors.forEach(selector => {
            selector[4].disabled = true;
        })
        selectors[value][4].disabled = false;
    }
}


export default function fetchEmail() {
    /*
    Diese Funktion soll asynchron prüfen,
    ob eine Email bereits vorhanden ist.
    */
    const errorEmail = document.querySelector(".error-msg-email");
    const mainError = document.querySelector(".main-error");
    const inputEmail = document.querySelector(".input-email");
    inputEmail.addEventListener("blur", () => {
        let formData = new FormData();
        formData.append('email', inputEmail.value);
        fetch('includes/helper/checkEmail.php', {
            method: "post",
            body: formData
        })
            .then(res => res.json())
            .then(data => {
            // console.log(data);
            if (data) {
                mainError.innerHTML = "Etwas ist schief gelaufen";
                errorEmail.innerHTML = "Email bereits vorhanden";
            }
            else {
                mainError.innerHTML = "";
                errorEmail.innerHTML = "";
            }
        })
            .catch(error => console.log(error));
    });
}

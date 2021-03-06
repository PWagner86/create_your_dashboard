import fetchEmail from './FetchEmail.js';
// Variabeln
const formWrapper = document.querySelector(".login-register-wrapper");
const switchBtn = document.querySelector(".switch");
const loginForm = document.querySelector(".login-form");
const registerForm = document.querySelector(".register-form");
const mainError = document.querySelector(".main-error");
const kind = document.querySelector(".avatar-select");
const username = document.querySelector(".username");
const pic = document.querySelector(".avatar-pic");
let url = "https://avatars.dicebear.com/api/male/fritz.svg";
// Events
/*
Hier wird dafür gesorgt,
wenn das Registrations-
formular fehlerhaft ausge-
füllt wurde, bei einem neuladen
der Seite, wieder das Registrations-
formular angezeigt wird.
*/
if (mainError.innerHTML === "Etwas ist schief gelaufen") {
    loginForm.style.display = "none";
    registerForm.style.display = "flex";
    switchBtn.innerHTML = "Zurück zum Login";
    formWrapper.style.flexDirection = "column-reverse";
}
/*
Wenn Butten geklickt wird,
wird zwischen den Formularen
hin und her gewechselt.
*/
switchBtn.addEventListener("click", () => {
    // console.log("clicked");
    if (loginForm.style.display === "flex" || loginForm.style.display === "") {
        loginForm.style.display = "none";
        registerForm.style.display = "flex";
        switchBtn.innerHTML = "Zurück zum Login";
        formWrapper.style.flexDirection = "column-reverse";
    }
    else {
        registerForm.style.display = "none";
        loginForm.style.display = "flex";
        switchBtn.innerHTML = "Registrieren";
        formWrapper.style.flexDirection = "column";
    }
});
/*
Hier wird der Avatar dynamisch
angepass, je nach Input des Users.
*/
pic.setAttribute("src", url);
username.addEventListener("keyup", () => {
    url = `https://avatars.dicebear.com/api/${kind.value}/${username.value}.svg`;
    pic.setAttribute("src", url);
});
kind.addEventListener("change", () => {
    url = `https://avatars.dicebear.com/api/${kind.value}/${username.value}.svg`;
    pic.setAttribute("src", url);
});
// Asynchroner Emailcheck.
fetchEmail();

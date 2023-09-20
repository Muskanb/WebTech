function setCookie(name, value, days) {
    const expires = new Date();
    expires.setTime(expires.getTime() + days * 24 * 60 * 60 * 1000);
    document.cookie = `${name}=${value};expires=${expires.toUTCString()};path=/`;
}

function getCookie(name) {
    const cookies = document.cookie.split("; ");
    for (const cookie of cookies) {
        const [cookieName, cookieValue] = cookie.split("=");
        if (cookieName === name) {
            return cookieValue;
        }
    }
    return null;
}

const enteredName = prompt("Please enter your name:");
    if (enteredName) {
        setCookie("userName", enteredName, 30);
        setCookie("lastAccess", new Date().toLocaleString(), 30);
        const welcomeMessage = document.getElementById("h1");
        welcomeMessage.textContent = `Welcome, ${enteredName}!`;
    }
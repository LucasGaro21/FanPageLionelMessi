const registerButton = document.querySelector(".btn-register");
const passwordInput = document.querySelector(".password")
const usernameInput = document.querySelector(".username")

registerButton.addEventListener("click", (e) => {
    if (passwordInput.value.length < 8) {
        e.preventDefault();
        alert("La contraseña debe ser mayor a 8 caracteres")
    } else if (usernameInput.value.length < 5) {
        e.preventDefault();
        alert("El nombre de usuario debe ser mayor a 5 caracteres")
    }
})
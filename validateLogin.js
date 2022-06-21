const loginButton = document.querySelector(".btn-login");
const passwordInput = document.querySelector(".password");

loginButton.addEventListener("click", (e) => {
    if (passwordInput.value.length < 8) {
        e.preventDefault();
        alert("La contraseña debe ser mayor a 8 caracteres")
    } 
})
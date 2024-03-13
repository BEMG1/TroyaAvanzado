function login() {
    var user = document.getElementById("username").value;
    var password = document.getElementById("password").value;
    var userminusculas = user.toLowerCase();
    console.log(userminusculas);
    console.log(password);

    if (userminusculas === "usuario" && password === "1234") {
        window.location.href = "./viewAdmin.html";
    } else if (userminusculas === "" || password === "" ) {
        alert("Campos vacios");
    } else {
        alert("Credenciales incorrectas");
    }
}

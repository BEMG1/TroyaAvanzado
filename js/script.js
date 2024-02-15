// Configura el tiempo de expiración en milisegundos (por ejemplo, 30 minutos)
var expiracion = 30 * 60 * 1000; // 30 minutos en milisegundos

// Configura un temporizador para cerrar la sesión después de expiracion milisegundos
setTimeout(function() {
    // Redirecciona a la página de cierre de sesión o realiza alguna otra acción de cierre de sesión
    window.location.href = '../controller/cerrarSesion.php'; // ajusta la URL según tu configuración
}, expiracion);

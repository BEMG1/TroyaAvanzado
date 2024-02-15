<?php

// Función para generar un token único
function generateToken() {
    return bin2hex(random_bytes(32)); // Utiliza una función segura para generar tokens
}

// Función para iniciar sesión y asignar un token
function startSession($userId) {
    $token = generateToken();
    $expiration = time() + 60; // Ejemplo: 1 hora de validez
    $_SESSION['id'] = $userId;
    $_SESSION['token'] = $token;
    $_SESSION['fecha_expiracion'] = $expiration;
}

// Función para verificar el token en cada solicitud
function checkToken() {
    if (isset($_SESSION['token']) && isset($_SESSION['fecha_expiracion'])) {
        $current_time = time();
        if ($current_time > $_SESSION['fecha_expiracion']) {
            // El token ha expirado, cerrar sesión
            endSession();
        } else {
            // Actualizar la fecha de expiración del token
            $_SESSION['fecha_expiracion'] = $current_time + 3600; // Ejemplo: extender por 1 hora más
        }
    } else {
        // No hay token, cerrar sesión
        endSession();
    }
}

// Función para cerrar sesión
function endSession() {
    // Realizar cualquier limpieza necesaria
    session_unset();
    session_destroy();
    // Redirigir al usuario a la página de inicio de sesión, por ejemplo
    header('Location: ../index.php');
    exit();
}

?>
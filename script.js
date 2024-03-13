$(document).ready(function() {
    // Obtener información del usuario mediante AJAX
    $.ajax({
        url: 'obtener_info_usuario.php',
        type: 'GET',
        success: function(response) {
            var data = JSON.parse(response);
            $('#user_name').text(data.nombre);
            $('#user_role').text(data.cargo === '1' ? 'Administrador' : 'Vendedor');
        }
    });

    // Cerrar sesión
    $('#cerrar_sesion').click(function(e) {
        e.preventDefault();
        $.ajax({
            url: '../controller/cerrarSesion.php',
            type: 'GET',
            success: function(response) {
                window.location.href = response;
            }
        });
    });
});

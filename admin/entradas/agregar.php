<?php

include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_producto=$_POST['opciones2'];

    // Verifica si se ha seleccionado una opción válida
    if (empty($id_producto) || $id_producto == "Seleccione...") {
       echo "Error: Por favor, seleccione una opción válida.";
       exit();
   }
    $cantidaddeentradas = $_POST['txtc_entrada'];
    $valordeentradas = $_POST['txtv_entrada'];

    // Insertar en la tabla de entradas
    mysqli_query($conn, "INSERT INTO entradas (idproductos, fechaentradas, horaentradas, cantidadentradas, valorentradas) 
                       VALUES ('$id_producto', CURRENT_DATE, CURRENT_TIME, '$cantidaddeentradas', '$valordeentradas')");

    // Actualizar la tabla de productos solo con la cantidad de entradas
    mysqli_query($conn, "UPDATE producto SET entradaproducto = entradaproducto + '$cantidaddeentradas' WHERE idproducto = '$id_producto'");

    // Redireccionar a la página de índice después del registro exitoso
    header("Location: ./index.php");
    exit();
}
?>
<html>
<head>
    <title>Entradas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="caja_popup2" id="formregistrar">
    <form class="contenedor_popup" method="post" action="agregar.php">
        <table>
            <tr><th colspan="2"> <H1>Nueva entrada</H1> </th></tr>
            <tr>
                <td>Id productos</td>
                <td><select name="opciones2" id="opciones2" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
            </tr>
            <tr>
                <td>Cantidad de entradas</td>
                <td><input type="number" name="txtc_entrada" required></td>
            </tr>
            <tr>
                <td>Valor de entradas</td>
                <td><input type="number" name="txtv_entrada" required></td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="button" onclick="cancelarFormulario()">cancelar</button>
                    <input type="submit" name="btnregistrar" value="registrar" onClick="Javascript: return confirm('¿desea registar esta entrada?');">
                </td>
            </tr>
        </table>
    </form>
</div>

<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../entradas/index.php');
            // Redirigir a la nueva página
            window.location.replace('../entradas/index.php');
        }
        $(document).ready(function () {
    function obtenerOpciones() {
        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpciones.php', // Ruta a tu script PHP en el servidor
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opciones2');
                opcionesSelect.empty();

                // Agrega la opción predeterminada
                opcionesSelect.append('<option value="">Seleccione...</option>');

                // Si hay opciones, las muestra
                if (data.length > 0) {
    data.forEach(function (opcion) {
        opcionesSelect.append('<option value="' + opcion.idproductos + '">' + opcion.nombreproducto + '</option>');
    });
}
            },
            error: function (error) {
                console.error('Error al obtener opciones desde la base de datos:', error);
            }
        });
    }

    // Llamada inicial para cargar las opciones al cargar la página
    obtenerOpciones();

    // Manejador de eventos cuando cambia el valor del campo opciones
    $('#opciones2').on('change', function () {
        var idproductos = $(this).val();

        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpciones.php', // Ruta a tu script PHP en el servidor
            data: { idproducto: idproductos },
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opcionesE'); // Mismo select
                opcionesSelect.empty();

                // Si hay opciones, las muestra
                if (data.length > 0) {
    data.forEach(function (opcion) {
        opcionesSelect.append('<option value="' + opcion.idproductos + '">' + opcion.nombreproducto + '</option>');
    });
}
            },
            error: function (error) {
                console.error('Error al obtener opciones desde la base de datos:', error);
            }
        });
    });
});


</script>

</body>
</html>
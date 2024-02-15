<?php

include_once("conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Se ha enviado el formulario, procesar la información
    $nombre = $_POST['txtnombre'];

    $categoria = $_POST['txtcategoria'];
    
    // $salida = $_POST['txtsalida'];

    // $stock = $_POST['txtstock'];
    $valor = $_POST['txtvalor'];
    $iva = 0.19;

    $documento = $_POST['txtdocumento'];


    // Insertar en la base de datos
    mysqli_query($conn, "INSERT INTO producto (nombreproducto, idcategoria, salidaproducto, entradaproducto, stockproducto, valorproducto, IVAproducto, documentoproveedor) VALUES('$nombre','$categoria','','','','$valor','$iva','$documento')");

    // Redireccionar a la página de índice después del registro exitoso
    header("Location: ../../../TroyaNW/admin/productos/index.php");
    exit();
}
?>
<html>
<head>
    <title>Agregar</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>
<body>
    <div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
            <table>
  <tr><th colspan="2"><h1>Nuevo Producto</h1></th></tr>	
<tr>
<td>Nombre producto</td>
<td><input type="text" name="txtnombre" require></td>
</tr>
<tr>
<td>Id categoria</td>
<td><select name="txtcategoria" id="opciones1" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
</tr>
<tr>
<td>Valor</td>
<td><input type="number" name="txtvalor" require></td>
</tr>
<tr>
<td>Documento proveedor</td>
<td><select name="txtdocumento" id="opciones2" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
</tr>
<tr>
<td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a este producto?');">
                    </td>
</tr>

</table>
</form>
</div>
<script>
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../prodcutos/index.php');
            // Redirigir a la nueva página
            window.location.replace('../productos/index.php');
        }
//opciones dinamicas categoria

        $(document).ready(function () {
    function obtenerOpciones() {
        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesCategorias.php', // Ruta a tu script PHP en el servidor
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opciones1');
                opcionesSelect.empty();

                // Agrega la opción predeterminada
                opcionesSelect.append('<option value="">Seleccione...</option>');

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion.idcategorias + '">' + opcion.nombrecategorias + '</option>');
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
    $('#opciones1').on('change', function () {
        var idproductos = $(this).val();

        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesCategorias.php', // Ruta a tu script PHP en el servidor
            data: { idproductos: idproductos },
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#Opciones');
                opcionesSelect.empty();

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    opcionesSelect.show();
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion.idcategorias + '">' + opcion.nombrecategorias + '</option>');
                    });
                } else {
                    // Si no hay opciones, oculta el select
                    opcionesSelect.hide();
                }
            },
            error: function (error) {
                console.error('Error al obtener opciones desde la base de datos:', error);
            }
        });
    });

});


//opciones dinamicas proveedor

$(document).ready(function () {
    function obtenerOpciones() {
        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesProveedor.php', // Ruta a tu script PHP en el servidor
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
                        opcionesSelect.append('<option value="' + opcion.documentoProveedor + '">' + opcion.nombreProveedor + '</option>');
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
            url: './obtenerOpcionesProveedor.php', // Ruta a tu script PHP en el servidor
            data: { idproductos: idproductos },
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opciones3');
                opcionesSelect.empty();

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    opcionesSelect.show();
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion.documentoProveedor + '">' + opcion.nombreProveedor + '</option>');
                    });
                } else {
                    // Si no hay opciones, oculta el select
                    opcionesSelect.hide();
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

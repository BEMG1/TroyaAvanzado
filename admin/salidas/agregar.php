<?php

include_once("conexion.php");
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   $id_producto=$_POST['opciones2'];

     // Verifica si se ha seleccionado una opción válida
     if (empty($id_producto) || $id_producto == "Seleccione...") {
        echo "Error: Por favor, seleccione una opción válida.";
        exit();
    }

    
   $n_ventas=$_POST['txtnventa'];
   $c_salidas=$_POST['txtcsal'];
   $v_salidas=$_POST['txtvsal'];
   

   mysqli_query($conn, "INSERT  INTO salidas ( idproductos, numeroventa, fechasalidas, horsalidas, cantidadsalidas, valorsalidas) VALUES 
   ('$id_producto','$n_ventas',CURRENT_DATE,CURRENT_TIME,'$c_salidas','$v_salidas')");

   mysqli_query($conn, "UPDATE producto SET salidaproducto = salidaproducto + '$c_salidas' where idproducto = '$id_producto'");

 
   header("Location: ../../../TroyaNW/admin/salidas/index.php");
exit();
}
?>
<html>
<head>
    <title>Salidas</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../../estile2_7.css">
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>
<div class="caja_popup2" id="formregistrar">
        <form class="contenedor_popup" method="post" action="agregar.php">
                <table>
                    <tr><th colspan="2"> Nueva salida </th></tr>
                    <tr>
                        <td>ID de producto</td>
                        <td><select name="opciones2" id="opciones2" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
                    <tr>
                        <td>Numero de venta</td>
                        <td><select name="txtnventa" id="opciones3" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
                    </tr>

                    <tr>
                        <td>Cantidad de salidas</td>
                        <td><input type="number" name="txtcsal" required></td>
                    </tr>
                    <tr>
                        <td>Valor salidas</td>
                        <td><input type="text" name="txtvsal" id="salidas" maxlength="11" oninput="formatoSeparadorMiles(this)" required></td>
                    </tr>
                    <tr>
                        <td colspan="2">
                        <button type="button" onclick="cancelarFormulario()">cancelar</button>
                        <input type="submit" name="btnregistrar" value="registrar" onClick="return confirm('¿desea registar a esta salida?');">
                        </td>
                    </tr>
                </table>
            </form>
        </div>
        <script>

function formatoSeparadorMiles(input) {
    // Obtener el valor actual del input
    let valor = input.value.replace(/[^\d]/g, ''); // Eliminar todo lo que no sea un dígito
    
    if (!valor) {
        // Si está vacío, no aplicar formato
        input.value = '';
        return;
    }

    // Aplicar el formato con separador de miles
    input.value = formatoNumeroConSeparador(valor);
    console.log(valor);
}


function formatoNumeroConSeparador(numero) {
    return parseFloat(numero).toLocaleString('es-ES');
}
        function cancelarFormulario() {
            window.history.replaceState(null, null, '../salidas/index.php');
            // Redirigir a la nueva página
            window.location.replace('../salidas/index.php');
        }

        $(document).ready(function () {
    function obtenerOpciones() {
        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesProdcuto.php', // Ruta a tu script PHP en el servidor
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
                        opcionesSelect.append('<option value="' + opcion.idproducto + '">' + opcion.nombreproducto + '</option>');
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
            url: './obtenerOpcionesProdcuto.php', // Ruta a tu script PHP en el servidor
            data: { idproducto: idproductos },
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opcionesP');
                opcionesSelect.empty();

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    opcionesSelect.show();
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion.idproducto + '">' + opcion.nombreproducto + '</option>');
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

//Obtener opciones ventas

$(document).ready(function () {
    function obtenerOpciones() {
        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesVentas.php', // Ruta a tu script PHP en el servidor
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opciones3');
                opcionesSelect.empty();

                // Agrega la opción predeterminada
                opcionesSelect.append('<option value="">Seleccione...</option>');

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion + '">' + opcion + '</option>');
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
    $('#opciones3').on('change', function () {
        var idproductos = $(this).val();

        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpciones.php', // Ruta a tu script PHP en el servidor
            data: { idproductos: idproductos },
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#OpcionesV');
                opcionesSelect.empty();

                // Si hay opciones, las muestra
                if (data.length > 0) {
                    opcionesSelect.show();
                    data.forEach(function (opcion) {
                        opcionesSelect.append('<option value="' + opcion + '">' + opcion + '</option>');
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
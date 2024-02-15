<?php

include_once("conexion.php");


$idsalidas = $_GET['idsalidas'];

$querybuscar = mysqli_query($conn, "SELECT * FROM salidas WHERE idsalidas=$idsalidas");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id_salidas=$mostrar['idsalidas'];
   $id_producto=$mostrar['idproductos'];
   $n_ventas=$mostrar['numeroventa'];
   $c_salidas=$mostrar['cantidadsalidas'];
   $v_salidas=$mostrar['valorsalidas'];
}
?>
<html>
    <head>
        <title> Salidas</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    </head>
    <body>
    <div class="caja_popup2" id="formmodificar">
    <form method="POST" class="contenedor_popup">
        <table>
            <tr><th colspan="2">Modificar salidas</th></tr>
            <tr >
                        <td>ID Salida</td>
                        <td ><input type="number" name="txtidsal" value="<?php echo $id_salidas;?>" disabled></td>
                    </tr>
                    <tr>
                        <td>ID producto</td>
                        <td><select name="opciones" id="opciones" style="width:170px;" required>
        <option>Seleccione...</option>
    </select>
                    </td>
                    </tr>
                    <tr>
                        <td>numero de venta</td>
                        <td><select name="txtnventa" id="opciones3" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
                    </tr>
                    <tr>
                    <td>cantidad de salida</td>
                        <td ><input type="number" name="txtcsal" value="<?php echo $c_salidas;?>" required></td>
                    </tr>
                    <tr>
                        <td>valor de salida</td>
                        <td><input type="number" name="txtvsal" value="<?php echo $v_salidas;?>" required></td>
                    </tr>
                    <tr>
            <td colspan="2">
            <input type = "button" value = "Cancelar" onclick = "history.back ()"> 
                <input type="submit" name="btnmodificar" value="modificar" onClick="Javascript: return confirm('¿deseas modificar esta salida?');"></td>
                </tr>
            </table>
    </form>
    <script>

        $(document).ready(function () {
    function obtenerOpciones() {
        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesProdcuto.php', // Ruta a tu script PHP en el servidor
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opciones');
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
    $('#opciones').on('change', function () {
        var idproductos = $(this).val();

        // Llamada AJAX para obtener las opciones desde la base de datos
        $.ajax({
            type: 'POST',
            url: './obtenerOpcionesProdcuto.php', // Ruta a tu script PHP en el servidor
            data: { idproducto: idproductos },
            dataType: 'json',
            success: function (data) {
                // Limpia y llena el select con las nuevas opciones
                var opcionesSelect = $('#opciones_idproductos');
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
<?php
if(isset($_POST['btnmodificar']))
{
    $id_salidas1=$id_salidas;
    $id_producto1=$_POST['opciones'];
    $n_ventas1=$_POST['txtnventa'];
    $c_salidas1=$_POST['txtcsal'];
    $v_salidas1=$_POST['txtvsal'];

    $querymodificar = mysqli_query($conn, "UPDATE salidas SET  idsalidas='$id_salidas1', idproductos='$id_producto1', numeroventa='$n_ventas1',cantidadsalidas='$c_salidas1', valorsalidas='$v_salidas1' WHERE idsalidas= $idsalidas");

    echo"<script>window.location='index.php'</script>";
}
?>
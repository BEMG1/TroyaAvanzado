<?php

include_once("conexion.php");

$identradas = $_GET['identradas'];

$querybuscar = mysqli_query($conn, "SELECT * FROM entradas WHERE identradas=$identradas");

while ($mostrar = mysqli_fetch_array($querybuscar)) {
    $id_e = $mostrar['identradas'];
    $id_p = $mostrar['idproductos'];
    $fecha_e = $mostrar['fechaentradas'];
    $hora_e = $mostrar['horaentradas'];
    $cantidad_e = $mostrar['cantidadentradas'];
    $valor_e = $mostrar['valorentradas'];
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
    <div class="caja_popup2" id="formmodificar">
        <form method="POST" class="contenedor_popup">
            <table>
                <tr>
                    <th colspan="2">Modificar Entradas</th>
                </tr>
                <tr>
                    <td>Id entradas</td>
                    <td><input type="number" value="<?php echo $id_e; ?>" disabled></td>
                </tr>
                <tr>
                    <td>Id productos</td>
                    <td><select name="opciones2" id="opciones2" style="width:170px;" required>
        <option>Seleccione...</option>
    </select>
                    </td>
                </tr>
                <tr>
                    <td>Cantidad de entradas</td>
                    <td><input type="number" name="txtc_entrada" value="<?php echo $cantidad_e; ?>" required></td>
                </tr>
                <tr>
                    <td>Valor de entradas</td>
                    <td><input type="number" name="txtv_entrada" value="<?php echo $valor_e; ?>" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="button" value="Cancelar" onclick="history.back()">
                        <input type="submit" name="btnmodificar" value="modificar" onClick="Javascript: return confirm('¿Deseas modificar la entrada?');">
                    </td>
                </tr>
            </table>
        </form>
    </div>

  <script>

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

<?php
if (isset($_POST['btnmodificar'])) {
    $id_e1 = $id_e;
    $id_p1 = $_POST['opciones2'];
    $cantidad_e1 = $_POST['txtc_entrada'];
    $valor_e1 = $_POST['txtv_entrada'];

    $querymodificar = mysqli_query($conn, "UPDATE entradas SET  identradas='$id_e1', idproductos='$id_p1', cantidadentradas='$cantidad_e1', valorentradas='$valor_e1' WHERE identradas= $id_e1");

    echo "<script>window.location='index.php'</script>";
}
?>
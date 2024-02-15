<?php

include_once("conexion.php");

$producto = $_GET['idproducto'];

$querybuscar = mysqli_query($conn, "SELECT * FROM producto WHERE idproducto=$producto");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $producto = $mostrar ['idproducto'];
    $nombre = $mostrar ['nombreproducto'];
    $categoria = $mostrar ['idcategoria'];
    $salida = $mostrar ['salidaproducto'];
    $entrada = $mostrar ['entradaproducto'];
    $stock = $mostrar ['stockproducto'];
    $valor = $mostrar ['valorproducto'];
    $iva = $mostrar ['IVAproducto'];
    $documento = $mostrar ['documentoproveedor'];
}
?>
<html>
<head>
<title>Productos</title>
<meta charset= "UTF-8">
<link rel="stylesheet" href="../../estile2_7.css">
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
<div class="caja_popup2" id="formmodificar">
<form method="POST" class="contenedor_popup">
    <table>

<tr><th colspan="2">Modificar producto</th></tr>
<tr>
    <td>Id producto</td>
    <td><input type="number" name= "txtproducto" value="<?php echo $producto;?>"
    disabled
     ></td>
</tr>
<tr>
    <td>Nombre producto</td>
    <td><input type="text" name= "txtnombre" value="<?php echo $nombre;?>"
    required ></td>
</tr>
<tr>
    <td>Categoria</td>
    <td><select name="txtcategoria" id="opciones1" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
</tr>
<tr>
    <td>Valor producto</td>
    <td><input type="number" name= "txtvalor" value="<?php echo $valor;?>"
    required ></td>
</tr>
<tr>
    <td>Documento proveedor</td>
    <td><select name="txtdocumento" id="opciones2" style="width:170px" required>
<option>Seleccione...</option>
</select></td>
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

<?php

 if(isset($_POST['btnmodificar']))
 {
    $productos1 = $producto;
    $nombre1 = $_POST['txtnombre'];
    $categoria1 = $_POST['txtcategoria'];
    $valor1 = $_POST['txtvalor'];
    $iva1 = 0.19;
    $documento1 = $_POST['txtdocumento'];

    $querymodificar = mysqli_query($conn, "UPDATE producto SET nombreproducto='$nombre1', idcategoria='$categoria1', valorproducto='$valor1', IVAproducto='$iva1',documentoproveedor='$documento1' WHERE idproducto=$productos1");

    echo "<script>window.location= 'index.php' </script>";





 }
 ?>
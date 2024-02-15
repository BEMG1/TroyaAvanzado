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
<link rel="stylesheet" href="../../estile2.css">
</head>

<body>
<div class="caja_popup2" id="formmodificar">
<form method="POST" class="contenedor_popup">
    <table>

<tr><th colspan="2">Modificar producto</th></tr>
<tr>
    <td>Id producto</td>
    <td><input type="number" name= "txtproducto" value="<?php echo $producto;?>"
    required ></td>
</tr>
<tr>
    <td>Nombre producto</td>
    <td><input type="text" name= "txtnombre" value="<?php echo $nombre;?>"
    required ></td>
</tr>
<tr>
    <td>Categoria</td>
    <td><input type="number" name= "txtcategoria" value="<?php echo $categoria;?>"
    required ></td>
</tr>
<tr>
    <td>Valor producto</td>
    <td><input type="number" name= "txtvalor" value="<?php echo $valor;?>"
    required ></td>
</tr>
<tr>
    <td>Documento proveedor</td>
    <td><input type="number" name= "txtdocumento" value="<?php echo $documento;?>"
    required ></td>
</tr>
<tr>
<td colspan="2">
<input type = "button" value = "Cancelar" onclick = "history.back ()"> 
<input type="submit" name="btnmodificar" value="Modificar"
onClick="javascript: return confirm ('¿Deseas modificar este producto?');">

</td>
</tr>
    </table>
</form>
</div>
</body>
</html>

<?php

 if(isset($_POST['btnmodificar']))
 {
    $productos1 = $_POST['txtproducto'];
    $nombre1 = $_POST['txtnombre'];
    $categoria1 = $_POST['txtcategoria'];
    $salida1 = $_POST['txtsalida'];
    $entrada1 = $_POST['txtentrada'];
    $stock1 = $_POST['txtstock'];
    $valor1 = $_POST['txtvalor'];
    $iva1 = 0.19;
    $documento1 = $_POST['txtdocumento'];

    $querymodificar = mysqli_query($conn, "UPDATE producto SET nombreproducto='$nombre1', idcategoria='$categoria1', salidaproducto='$salida1',entradaproducto='$entrada1', stockproducto='$stock1', valorproducto='$valor1', IVAproducto='$iva1',documentoproveedor='$documento1' WHERE idproducto=$productos1");

    echo "<script>window.location= 'index.php' </script>";





 }
 ?>
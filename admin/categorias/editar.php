<?php

include_once("conexion.php");


$idcategorias = $_GET['idcategorias'];

$querybuscar = mysqli_query($conn, "SELECT * FROM categorias WHERE idcategorias=$idcategorias");

while($mostrar = mysqli_fetch_array($querybuscar))
{
    $id_c = $mostrar['idcategorias'];
    $nombre_c = $mostrar['nombrecategorias'];
}
?>
<html>
    <head>
        <title>Categorias</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
    </head>
    <body>
    <div class="caja_popup2" id="formmodificar">
    <form method="POST" class="contenedor_popup">
        <table>
            <tr><th colspan="2">Modificar categoria</th></tr>
            <tr >
                        <td>Id categorias</td>
                        <td ><input type="number" name="txtidcategorias" value="<?php echo  $id_c;?>" required></td>
                    </tr>
                    <tr>
                        <td>Nombre de categorias</td>
                        <td><input type="texto" name="txtnombre_c" value="<?php echo $nombre_c;?>" required></td>
                    </tr>
                    <tr>
            <td colspan="2">
            <input type = "button" value = "Cancelar" onclick = "history.back ()"> 
                <input type="submit" name="btnmodificar" value="modificar" onClick="Javascript: return confirm('¿deseas modificar a esta categoria?');"></td>
                </tr>
            </table>
    </form>
    </body>
</html>
<?php
if(isset($_POST['btnmodificar']))
{
    $id_c1=$_POST['txtidcategorias'];
    $nombre_c1=$_POST['txtnombre_c'];

    $querymodificar = mysqli_query($conn, "UPDATE categorias SET nombrecategorias='$nombre_c1' WHERE idcategorias=$id_c1");

    echo"<script>window.location='index.php'</script>";
}

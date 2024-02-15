<?php

include_once("conexion.php");
include '../../controller/functions.php';
include '../../controller/config.php';
?>
<!DOCTYPE html>
<htlm>
    <head>
        <title> Categorias</title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
        <script src="../../js/script.js"></script>
</head>
<?php 

// Define la variable $currentPage con el nombre de la página actual
$currentPage = 'categorias'; 
?>


<body>
    <div class="contenedor_iniciales">
    <?php include('../desplegables_admin/desplegable_proveedor1_1.php');?>
    </div>
    <div class="barrabuscar">
        <form method="POST">
                <input type="text" name="txtbuscar" class="cajabuscar" placeholder="&#128270; Ingrese el id de la categoria">   
                <input type="submit" value="Buscar" name="btnbuscar" class="btnbuscar">
                 
        </form>
    </div>
    <table>
        <tr>
            <th colspan="2"><h1>Categorias</h1></th>
            <th><a class="a1" href="../../../TroyaNW/admin/categorias/agregar.php" onclick="abrirform()" ><img src="../../img/mas.svg" ></a></th>
        </tr>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>Acciones</th>
        </tr>
        <?php
        if (isset($_POST['btnbuscar'])) 
        {
            $buscar = $_POST['txtbuscar'];
            $querymatricula = mysqli_query($conn, "SELECT idcategorias, nombrecategorias FROM categorias WHERE idcategorias LIKE '" . $buscar . "%'");
        } 
        else 
        {
            $querymatricula = mysqli_query($conn, "SELECT * FROM categorias ORDER BY idcategorias ASC");
        }
        $numerofila = 0;
        while ($mostrar = mysqli_fetch_array($querymatricula)) 
        {
            $numerofila++;
            echo "<tr>";
            echo "<td>" . $mostrar['idcategorias'] ."</td>";
            echo "<td>" . $mostrar['nombrecategorias'] ."</td>";
            echo "<td  colspan=2 ><a class=a1 href=\"editar.php?idcategorias=$mostrar[idcategorias]\"><img  src='../../img/edita.svg'></a> <a class=a1 href=\"eliminar.php?idcategorias=$mostrar[idcategorias]\" onClick=\"return confirm('¿desea eliminar a $mostrar[nombrecategorias]?')\"><img src=../../img/delete.svg></a></td></tr>";
        }
        ?>
        </table>
        
        <script>
    function abrirform() {
            document.getElementById("formregistrar").style.display = "block";
        }
</script>
        
    </body>
    </html>
    
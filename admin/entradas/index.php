<?php
include_once("conexion.php");

?>
<htlm>
    <head>
        <title> Entradas </title>
        <meta charset="UTF-8">
 <link rel="stylesheet" href="../../estile2_7.css">
 <script src="../../js/script.js"></script>
</head>
<?php
$currentPage = 'entradas'; 
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
                <th colspan="6"><h1>Entradas</h1>
                <th><a class="a1" href="../../../TroyaNW/admin/entradas/agregar.php" id="editarLink"><img src="../../img/mas.svg" ></a></th>
            </tr>
            <th>Id</th>
            <th>Productos</th>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Cantidad</th>
            <th>Valor</th>
            <th>Acciones</th></tr>
        <?php
        if (isset($_POST['btnbuscar'])) 
        {
            $buscar = $_POST['txtbuscar'];
            $querymatricula = mysqli_query($conn, "SELECT entradas.identradas, producto.nombreproducto, entradas.fechaentradas, entradas.horaentradas, entradas.cantidadentradas, FORMAT(entradas.valorentradas, 'N0') as valorentrada FROM entradas, producto WHERE entradas.idproductos=producto.idproducto AND identradas LIKE '" . $buscar . "%'");
        } 
        else 
        {
            $querymatricula = mysqli_query($conn, "SELECT 
            entradas.identradas, 
            producto.nombreproducto, 
            entradas.fechaentradas, 
            entradas.horaentradas, 
            FORMAT(entradas.valorentradas, 'N0') as valorentrada,
            entradas.cantidadentradas 
        FROM 
            entradas 
        INNER JOIN 
            producto ON entradas.idproductos = producto.idproducto 
        ORDER BY 
            identradas ASC;");
        }
        $numerofila = 0;
        while ($mostrar = mysqli_fetch_array($querymatricula)) 
        {
            $numerofila++;
            echo "<tr>";
            echo "<td>" . $mostrar['identradas'] ."</td>";
            echo "<td>" . $mostrar['nombreproducto'] ."</td>";
            echo "<td>" . $mostrar['fechaentradas']."</td>";
            echo "<td>" . $mostrar['horaentradas']."</td>";
            echo "<td>" . $mostrar['cantidadentradas']."</td>";
            echo "<td>" . $mostrar['valorentrada']."</td>";
            echo "<td style='width=26%' colspan=2 ><a class=a1 href=\"editar.php?identradas=$mostrar[identradas]\"><img  src='../../img/edita.svg'></a> <a class=a1 href=\"eliminar.php?identradas=$mostrar[identradas]\" onClick=\"return confirm('¿desea eliminar a $mostrar[nombreproducto]?')\"><img src=../../img/delete.svg></a></td><tr>";
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
    
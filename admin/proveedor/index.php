<?php

include_once("conexion.php");

?>
<htlm>
    <head>
        <title> Proveedor </title>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="../../estile2_7.css">
</head>
<?php
$currentPage = 'proveedor'; 
?>
<body>
  
<div class="contenedor_iniciales">
    <?php include('../desplegables_admin/desplegable_proveedor1_1.php');?>
    </div>

    <div class="barrabuscar">
        <form method="POST">
            <input type="text" name="txtbuscar" class="cajabuscar"  placeholder="&#128270; Ingrese nombre del proveedor">
            <input type="submit" value="Buscar" name="btnbuscar" class="btnbuscar">
            </form></td>
</div>
        <table>
        <tr>
        <th colspan="7"><h1>Proveedores</h1>
        <th><a class="a1" href="./agregar.php"><img src="../../img/mas.svg"></a></th>
        </tr>
        <tr>
            <th>N°</th> 
            <th>Documento</th>
            <th>Tipo Documento</th>
            <th>Nombre</th>
            <th>Telefono</th>
            <th>Direccion</th>
            <th>Correo</th>
            <th>Acciones</th>
        </tr>
        
        <?php
        include('./contenidos/mostar.php');
        
        ?>
</table>
<script>
function abrirform() {
    document.getElementById("formregistrar").style.display = "block";
}
history.pushState(null, null, location.href);
  window.onpopstate = function(event) {
    history.go(1);
  };
</script>
</body>
</html>
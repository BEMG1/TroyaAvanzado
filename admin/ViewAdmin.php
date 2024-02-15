<?php 
include_once("conexion.php");?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Inicio</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../view_vendedor/menusito1_4.css">
    <style>
        /* Estilos para el cuadro emergente */
        .info-popover {
            position: relative;
            display: inline-block;
        }

        .info-icon {
            background-image: url('../img/user1.svg');
            background-repeat: no-repeat;
            font-size: 50px;
            color: transparent;
            cursor: pointer;
            position: absolute;
            left: 45vw;
            top: -48.7vh;
            width: 44px;
        }

        .info-content {
            display: none;
            position: absolute;
            left: 38vw;
            top: -40vh;
            width: 200px;
            background-color: white;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            color: black;
        }

        .info-popover:hover .info-content {
            display: block;
        }

        .btnCerrarSesion {
            background-color: transparent;
            border: none;
            cursor: pointer;
            position: absolute;
            left: 90vw;
            top: 2vh;
        }

        .btnCerrarSesion img {
            width: 45px;
            height: 25%;
        }

        .btnCerrarSesion:hover::after {
            content: "Cerrar Sesión"; /* Mensaje del tooltip */
            display: block;
            position: absolute;
            background-color: white;
            color: black;
            padding: 10px;
            border-radius: 5px;
            z-index: 1;
            left: -12px; /* Ajusta la posición del tooltip según tu diseño */
            font-size: 14px;
        }
        .contenedor1 {
          display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;

        }
        .contenedor {
            display: flex;
          justify-content: center;
          align-items: center;
          height: 100vh;
        }
    </style>
    <?php
    // Vista del rol administrador
session_start();

//validamos qu exista una sesion y ademas que le cargo que exixte sea igual a 1 (Administrador)
if(!isset($_SESSION['cargo']) || $_SESSION['cargo'] != 2){
}
?>
</head>

<body>

    <header>
        
        <div class="contenedor1">
            <div class="info-popover">
                <div class="info-icon">&#9432;</div>
                <div class="info-content">
                Usuario: <?php echo ucfirst($_SESSION['nombre']); ?><br>
                Cargo: <?php
                $cargousu = $_SESSION['cargo'];
                $Administrador = 'Administrador';
                $vendedor = 'vendedor';
                if ($cargousu == 1) {
                    echo $Administrador;
                } elseif ($cargousu == 2) {
                    echo $vendedor;
                } ?><br>
          
                </div>
            </div>
            <div class="contenedor">
    <a class="btnCerrarSesion" href="../controller/cerrarSesion.php">
        <img src="../img/Exit.svg" alt="cerrar sesion">
    </a>
</div>     
    </header>

    <div class="menu_fuera">
        


<nav>
<h2 class="iniciales">T.N.W.I</h2>
<ul>
&nbsp;
<li><a href="../admin/categorias/index.php">Categorias</a>
&nbsp;
<li><a href="../admin/clientes/Index.php">Clientes</a> 
&nbsp;
<li><a href="../admin/entradas/index.php">Entradas</a>
&nbsp;
<li><a href="../admin/pedidos/index.php">Pedidos</a> 
&nbsp;
<li><a href="../admin/productos/index.php">Productos</a>
&nbsp;
<li><a href="../admin/proveedor/index.php">Proveedor</a> 
&nbsp;
<li><a href="../admin/salidas/index.php">Salidas</a> 
&nbsp;
<li><a href="../admin/vendedores/index.php">Vendedores</a> 
&nbsp;
<li><a href="../admin/ventas/index.php">Ventas</a> 
</ul>         
</li>
</ul>
</ul>
</nav>
</div>
    

</body>

</html>





    





 

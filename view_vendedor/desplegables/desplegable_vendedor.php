<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="../desplegables/menu1_4.css">
  <style>
   

   ul#navbar {
     margin-left: 30px; /* Puedes ajustar el valor según tus necesidades */
   }
   ul#navbar li {
     display: inline-block; /* Para que los elementos estén en línea */
     margin-right: 10px; /* Puedes ajustar el espacio entre elementos */
   }

   ul#navbar li.current a {
     color: black; /* Puedes cambiar el color según tus preferencias */
     font-weight: bold; /* Otras propiedades de estilo según tus preferencias */
   }
   ul#navbar li.disabled a {
     pointer-events: none; /* Desactiva la interacción del usuario */
     color: black; /* Puedes cambiar el color según tus preferencias */
     border: 3px solid black;
   }
   </style>
</head>
<body>
<h2 class="iniciales1">T.N.W.I</h2>
  <ul id="navbar"> 
  <li <?php if ($currentPage == 'inicio') echo 'class="current disabled"'; ?>><a href="../ViewVendedor.php">Inicio</a></li>
  <li <?php if ($currentPage == 'clientes') echo 'class="current disabled"'; ?>><a href="../clientes/Index.php">Clientes</a></li>
    <li <?php if ($currentPage == 'pedidos') echo 'class="current disabled"'; ?>><a href="../pedidos/index.php">Pedidos</a></li>
    <li <?php if ($currentPage == 'pedidosproductos') echo 'class="current disabled"'; ?>><a href="../pedidosproductos/index.php">Pedidos-Productos</a></li>
    <li <?php if ($currentPage == 'productos') echo 'class="current disabled"'; ?>><a href="../productos/index.php">Productos</a></li>
    <li <?php if ($currentPage == 'salidas') echo 'class="current disabled"'; ?>><a href="../salidas/index.php">Salidas</a></li>
    <li <?php if ($currentPage == 'ventas') echo 'class="current disabled"'; ?>><a href="../ventas/index.php">Ventas</a></li>
  </ul>
  </ul>
</body>
</html>

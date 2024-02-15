<?php

if(isset($_POST['btnbuscar']))
{
    $buscar= $_POST['txtbuscar'];
    $queryprovedor=mysqli_query($cone, "SELECT proveedor.documentoProveedor, tipo_documento.nombredocumento, proveedor.nombreProveedor, proveedor.telefonoProveedor, proveedor.direccionProveedor, proveedor.correoProveedor, proveedor.catalogoProveedor FROM proveedor, tipo_documento WHERE proveedor.idtipo_documento=tipo_documento.idtipo_documento AND proveedor.nombreProveedor LIKE'".$buscar."%'");
}
else{
$queryprovedor= mysqli_query($cone, "SELECT proveedor.documentoProveedor, tipo_documento.nombredocumento, proveedor.nombreProveedor, proveedor.telefonoProveedor, proveedor.direccionProveedor, proveedor.correoProveedor, proveedor.catalogoProveedor FROM proveedor, tipo_documento WHERE proveedor.idTipo_documento = tipo_documento.idTipo_documento ORDER BY nombreProveedor ASC");
}
$numerofila=0;
while($mostrar = mysqli_fetch_array($queryprovedor))
{
    $numerofila++;
    echo "<tr>";
    echo "<td>".$numerofila."</td>";
    echo "<td>".$mostrar['documentoProveedor']."</td>";
    echo "<td>".$mostrar['nombredocumento']."</td>";
    echo "<td>".$mostrar['nombreProveedor']."</td>";
    echo "<td>".$mostrar['telefonoProveedor']."</td>";
    echo "<td>".$mostrar['direccionProveedor']."</td>";
    echo "<td>".$mostrar['correoProveedor']."</td>";
    echo "<td style='width=26%'><a class=a1 href=\"editar.php?documentoProveedor=$mostrar[documentoProveedor]\"><img  src='../../img/edita.svg'></a>  <a class=a1 href=\"eliminar.php?documentoProveedor=$mostrar[documentoProveedor]\" onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[nombreProveedor]?')\"><img src=../../img/delete.svg></a>";
    
}

?>

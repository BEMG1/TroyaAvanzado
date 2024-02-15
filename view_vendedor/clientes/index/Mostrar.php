<?php
$numerofila++;
echo "<tr>";
     echo"<td>".$numerofila."</td>";
     echo"<td>".$mostrar['documentoCliente']."</td>";
     echo"<td>".$mostrar['nombredocumento']."</td>";
     echo"<td>".$mostrar['nombreCliente']."</td>";
     echo"<td>".$mostrar['ApellidoCliente']."</td>"; 
     echo"<td>".$mostrar['direccionCliente']."</td>";
     echo"<td>".$mostrar['telefonoCliente']."</td>";
     echo"<td>".$mostrar['emailCliente']."</td>";
     echo"<td>".$mostrar['nombresexol']."</td>";
     ?>
        <td ><?php echo "<a class=a1 href=\"editar.php?documentoCliente=$mostrar[documentoCliente]\"><img  src='../../img/edita.svg'></a> <a class=a1 href=\"eliminar.php?documentoCliente=$mostrar[documentoCliente]\" onClick=\"return confirm('¿Estas seguro de eliminar a $mostrar[documentoCliente]?')\"><img src=../../img/delete.svg></a></tr>"?></td>
     <?php 
    

<table>
<tr><th colspan="5"><h1> Modificar cliente</h1></th></tr>
            <tr>
              <td>Numero de documento</td>
              <td><input type="text" name="txtnumero" value="<?php echo $doc;?>" ></td>
              <tr></tr>
              <td>Tipo de documento</td>
              <td><input type="number" name="txttipo" value="<?php echo $tdocumento;?>">
        </select><p></td><div class="info-popover">

<div class="info-icon">&#9432;</div>
<div class="info-content">
  Tipos de documento <br>T.I = 1<br>C.C = 2<br>C.E = 3<br>RUT = 4<br>NIT = 5
</div>
</div>
              <tr></tr>
              <td>Nombres </td>
              <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>"></td>
              <tr></tr>
              <td>Apellidos </td>
              <td><input type="text" name="txtapellidos" value="<?php echo $apellidos;?>"></td>
              <tr></tr>
              <td>Direccion</td>
              <td><input type="text" name="txtdireccion" value="<?php echo $direccion;?>"></td>
              <tr></tr>
              <td>Telefono</td>
              <td><input type="number" name="txttelefono" value="<?php echo $telefono;?>"></td>
              <tr></tr>
              <td>Correo electronico </td>
              <td><input type="text" name="txtcorreo" value="<?php echo $correo;?>"></td>
            </tr>
            <tr>
            </tr>
            <tr><td colspan="2"><input type="submit" name="btnmodificar" value="Modificar" onClick="Javascript: return confirm ('¿Deseas modificar este cliente?');"> <input type = "button" value = "Cancelar" onclick = "history.back ()"> </td></tr></table>
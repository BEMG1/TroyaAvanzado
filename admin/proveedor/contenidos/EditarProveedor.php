
<table>
<tr>
  <th colspan="2"><h1> Editar Proveedor</h1></th>
</tr>
      <tr>
          <td>Documento Provedor</td>
          <td><input type="number" value="<?php echo $documento;?>" disabled></td>
      </tr>      
      <tr>
          <td>Tipo Documento</th>
          <td> <select name="txttipodocumento" style="width:120px;" required>
                <option>Seleccione...</option>
                <option value="1" <?php echo ($tipo == 1) ? 'selected' : ''; ?>>T.I</option>
                <option value="2" <?php echo ($tipo == 2) ? 'selected' : ''; ?>>C.C</option>
                <option value="3" <?php echo ($tipo == 3) ? 'selected' : ''; ?>>C.E</option>
                <option value="4" <?php echo ($tipo == 4) ? 'selected' : ''; ?>>RUT</option>
                <option value="5" <?php echo ($tipo == 5) ? 'selected' : ''; ?>>NIT</option>
            </select></td>
      </tr> 
      <tr>
            <td>Nombre</th>
            <td><input type="text" name="txtnombre" value="<?php echo $nombre;?>"></td>
      </tr>
      <tr>
            <td>Telefono</th>
            <td><input type="number" name="txttel" value="<?php echo $telefono;?>"></td>
      </tr>
      <tr>
            <td>Direccion</th>
            <td><input type="text" name="txtdireccion" value="<?php echo $direccion;?>"></td>
      </tr>
      <tr>
            <td>Correo</th>
            <td><input type="email" name="txtcorreo" value="<?php echo $correo;?>"></th>
      </tr>
      <tr>
        <td colspan="2"><input type="submit" name="btnmodificar" value="Modificar" onClick="Javascript: return confirm ('¿Deseas modificar el proveedor?');"> <input type = "button" value = "Cancelar" onclick = "history.back ()"></td>
      </tr>
  
</table>
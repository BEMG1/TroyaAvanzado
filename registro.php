<?php

session_start();

if(isset($_SESSION['id'])){
    header('location: controller/redirec1.php');
  }
  
?>
<style>
    /* Estilo para alinear el botón con el campo de contraseña */
    .password-container {
      position: relative;
      width: 250px;
    }

    /* Estilo para ocultar la contraseña por defecto */
    #password {
      width: 100%;
      padding: 8px;
    }

    /* Estilo para el botón de mostrar/ocultar contraseña */
    .toggle-password {
      position: absolute;
      top: 71.5%;
      right: -3%;
      transform: translateY(-50%);
      cursor: pointer;
    }

  </style>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="sylesheet" href="css/font-awesome.min.css">

        <link rel="stylesheet" href="css/sweetalert.css">

        <link rel="stylesheet" href="css/4.css">
        


    </head>
    <body class="body2">

    <!--Formualario Login -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">

        <!-- Margen superior (css personalizado) -->
        <div class="spacing-1"></div>

        <form id="formulario_registro">

        <!-- Estructura del Formulario -->
        <fieldset>

              <legend class="center">Registro</legend>

        <!-- Caja de texto para Usuario -->
        <label class="sr-only" for="user">Nombre y apellidos</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" name="name" placeholder="Ingresa tu nombre y apellidos">
              
              </div>


        <!-- div espaciador -->
        <div class="spacing-2"></div>

        <!-- Caja de texto para email -->
       <label class="sr-only" for="user">Email</label>
              <div class="input-group">
                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                <input type="text" class="form-control" name="email" placeholder="Ingresa tu email">
              </div>
              
         <!-- div espaciador -->
         <div class="spacing-2"></div>

              <label class="sr-only" for="user">cargo</label>
              <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-user"></i></div>
              <select class="form-control" name="cargo" > 
                <option>Seleccione el cargo</option>   
<option value="1">Administrador</option>
<option value="2">Vendedor</option>
</select>
              </div>

          <!-- div espaciador -->
        <div class="spacing-2"></div>

       <!-- Botón para toggle de visibilidad -->
        <span class="toggle-password" onclick="togglePasswordVisibility()"><img id="toggleImage" src="./img/mostrar.svg"></span>

        <!-- div espaciador -->
        <div class="spacing-2"></div>

        <!-- Primer campo de contraseña -->
        <label class="sr-only" for="clave">Contraseña</label>
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-lock"></i></div>
          <input type="password" id="password1" autocomplete="off" class="form-control" name="clave" placeholder="Ingresa tu clave">
        </div>

        <!-- div espaciador -->
        <div class="spacing-2"></div>

        <!-- Segundo campo de contraseña -->
        <label class="sr-only" for="clave">Verificar contraseña</label>
        <div class="input-group">
          <div class="input-group-addon"><i class="fa fa-lock"></i></div>
          <input type="password" id="password2" autocomplete="off" class="form-control" name="clave2" placeholder="Verificar contraseña">
        </div>


        <!-- Animacion de load (solo sera visible cuando el cliente espere una respuesta del servidor )-->
        <div class="row" id="load" hidden="hidden">
                <div class="col-xs-4 col-xs-offset-4 col-md-2 col-md-offset-5">
                  <img src="img/load.gif" width="100%" alt="">
                </div>
                <div class="col-xs-12 center text-accent">
                  <span>Validando información...</span>
                </div>
              </div>
        <!-- Fin load -->

        <!-- bonton #login para activar la funcion click y enviar los datos mediante ajax -->
        <div class="row">
                <div class="col-xs-8 col-xs-offset-2">
                  <div class="spacing-2"></div>
                  <button type="button" class="btn btn-primary btn-block" name="button" id="registro">Registrarse</button>
                  <a type="button" href="../TroyaNW/index.php" class="btn btn-primary btn-block">Cancelar</a>
                </div>
              </div>

            </fieldset>
          </form>
        </div>
      </div>
    </div>
<!-- / Final del formulario Registro -->


<script>
  function togglePasswordVisibility() {
    var passwordField1 = document.getElementById('password1');
    var passwordField2 = document.getElementById('password2');
    var image = document.getElementById('toggleImage');
    if (passwordField1.type === "password" && passwordField2.type === "password") {
      passwordField1.type = "text";
      passwordField2.type = "text";
      image.src = "./img/ocultar.svg";
    } else {
      passwordField1.type = "password";
      passwordField2.type = "password";
      image.src = "./img/mostrar.svg";
    }
  }
</script>


  </script>
<!--Jquery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- sweetAlert js -->
<script src="js/sweetalert.min.js"></script>
<!-- Js -->
<script src="js/operaciones.js"></script>

    </body>
</html>
        





        







<?php

 session_start();

// isset verifica si existe una varible o se creo 
if(isset($_SESSION['id'])){
    header('location: controller/redirec1.php');
  }

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <link rel="stylesheet" href="css/bootstrap.min.css">

        <link rel="sylesheet" href="css/font-awesome.min.css">

        <link rel="stylesheet" href="css/sweetalert.css">

        <link rel="stylesheet" href="css/4.css">

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
      top: 74.5%;
      right: -3%;
      transform: translateY(-50%);
      cursor: pointer;
    }

  </style>

    </head>
    <body class="body2">

    <!-- las clases que vpy a utlizar en los divs son propias de Bootstrap -->

    <!--Formualario Login -->
    <div class="container">
      <div class="row">
        <div class="col-xs-12 col-md-4 col-md-offset-4">

        <!-- Margen superior (css personalizado) -->
        <div class="spacing-1"></div>

        <!-- Estructura del Formulario -->
        <fieldset>
        
  
        <legend class="center">Bienvenido</legend>
        <legend class="center">Troya NW </legend>


        <!-- Caja de texto para Usuario -->
        <label class="sr-only" for="user">Usuario</label>
        <div class="input-group">
          <div class="input-group-addon"><i class="far fa-user"></i></div>
          <input type="email" class="form-control" name="correoingreso" id="user" placeholder="Ingresa tu correo">
        </div>

            

        <!-- div espaciador -->
        <div class="spacing-2"></div>

        <!-- Caja de texto para la clave-->
        <label class="sr-only" for="clave">Contraseña</label>
            <div class="input-group">
              <div class="input-group-addon"><i class="fa fa-lock"></i></div>
              <input type="password"  autocomplete="off" class="form-control" id="clave" placeholder="Ingresa tu Contraseña ">
            </div>

            <!-- Botón para toggle de visibilidad -->
        <span class="toggle-password" onclick="togglePasswordVisibility()"><img id ="toggleImage" src="./img/mostrar.svg"></span>

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
                <button type="button" class="btn btn-primary btn-block" name="button" id="login">Iniciar sesion</button>
              </div>
            </div>

            <section class="text-accent center">
              <div class="spacing-2"></div>
              
              <p>
                ¿No tienes una cuenta? <a href="../TroyaNW/registro.php"><br> Crear Cuenta</a>
              </p>
            </section>

          </fieldset>
        </div>
      </div>
    </div>
    
<!-- / Final del formulario login -->

<!--Jquery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap js -->
<script src="js/bootstrap.min.js"></script>
<!-- sweetAlert js -->
<script src="js/sweetalert.min.js"></script>
<!-- Js -->
<script src="js/operaciones.js"></script>
<script>
  // Deshabilitar el botón de retroceso
  history.pushState(null, null, location.href);
  window.onpopstate = function(event) {
    history.go(1);
  };
// Funcion para mostrar contraseña
  function togglePasswordVisibility() {
    var passwordField1 = document.getElementById('clave');
    var image = document.getElementById('toggleImage');

    if (passwordField1.type === "password") {
      passwordField1.type = "text";
      image.src = "./img/ocultar.svg";
      
    } else {
      passwordField1.type = "password";
      image.src = "./img/mostrar.svg";
      
    }
  }
</script>

    </body>
</html>
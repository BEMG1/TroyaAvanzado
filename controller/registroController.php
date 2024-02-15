<?php

  $name   = $_POST['name'];
  $email  = $_POST['email'];
  $clave  = $_POST['clave'];
  $clave2 = $_POST['clave2'];
  $cargo = $_POST['cargo'];

  if(empty($email) || empty($clave) || empty($clave2) || empty($cargo))
  {

    echo 'error_1'; // Un campo esta vacio y es obligatorio

  }else{

    if($clave == $clave2){

      if(filter_var($email, FILTER_VALIDATE_EMAIL)) {

        # Incluimos la clase usuario
        require_once('../model/usuario.php');

        # Creamos un objeto de la clase usuario
        $usuario = new Usuario();

        # Llamamos al metodo login para validar los datos en la base de datos
        $usuario -> registroUsuario($name, $email, $clave, $cargo);


      }else{
        echo 'error_4';
      }


    }else{
      echo 'error_2';
    }

  }




?>

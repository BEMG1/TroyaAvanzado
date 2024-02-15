<?php

# Incluimos la clase de conexion para heredar los metodos de ella.
require_once('conexion.php');


class Usuario extends Conexion
{

  public function login($user, $clave)
  {
        /* parent es llamar un metodo de una clase
        heredada es decir al yo colocar parent::conectar, lo que hago es 
        llamar al metodo conectar de la clase patiende en este caso conexion 
        */

        # Nos conectamos a la base de datos 
        parent::conectar();

        /*
        Lo segundo que debemos  hacer es filtrar la informacion que el usuario
        ingresa, recuerde que nunca se debe confiar en los datos que el usuario
        envia, asi que teniendo en cuenta  eso  usare unos metodos de la clase conexion
        que ayudaran a realizar los filtros necesarios
        */

        /* el metodo salvar sirve para escapar cualquier comillas doble o simple y otros caracteres que puedan vulnerar nuestra consulta sql */
        $user  = parent::salvar($user);
        $clave = parent::salvar($clave);

        // si necesita filtrar las mayusculas y los acentos habilita las lineas 32 y 33 recuerda que en la base de datos debe estar filtrados tambie para una validacion correcta 
        /*$user = parent::filtrar($user);
        $clave = parent::filtrar($clave);*/

        /* para la validacion del usuario podemos hacer do cosas,
        validar que existe el email solamante y mostrar error en caso
        de que no, o validar ambos campos y mostrar un unico error,
        en este caso voy a validar el usuario con ambos campos.
        */

        //traenos el id y el nombre de la tabla usuarios donde el usuario sea igual al usuario ingresado y ademas la clase sea iguala la ingresada para el ese usuario.
        $consulta = 'SELECT id, nombre, cargo from usuarios where email="'.$user.'" and clave= MD5("'.$clave.'")';
        /* 
        Verificamos si el usuario exixte, la funcion verificaraRegistros 
        retorna el numero de las filas afectadas entre otras palabras si el usuario existe retornara 1  de los contrario 0 
        */
        
        $verificar_usuario = parent::verificarRegistros($consulta);

        // si la consulta es mayor a 0 el usuario exsite
        if($verificar_usuario > 0){

            /* ahora realizare la misma consulta  pero esta vez transformare el resultado en un arreglo, 
            tener mucho cuidado al usar el metod consultaArreglo ya que devuelve un arreglo de la primera fila encontrada es decir, como nostros solo validamos a un usuario no hay problama pero esta funcion  no funciona si vamos a validar una lista de usuarios
            */

            $user = parent::consultaArreglo($consulta);

            /* la variable user de la linea 57 papsa a ser un arreh¿glo con los campos consultados en la linea 42, entonces para acceder a los datos utlizamos $user[nombre_del_campo]
            */

            /* iniciare la session, recuerda con las variables de sesion
            podemos acceder a la informacion desde cualquier pagina simpre y cuando exista 
            una sesion ademas utlicemos el codigo dela linea 67
            */

            session_start();

            /*
            Las variables se sesion son faciles de usas, es como 
            declarar una varible, lo unico diferente es que obligatoriamente 
            debe usuar $_SESSION[] y el nombre de la varible ya no sera asi $nombre si no entre comillas dentro 
            de un arreglo de sesion es decir $_SESSION['mivarieble']; recuerda que como se declara la varieble
            en este archivo asi mismo lo debe llamar a los demas archivos.
            */

            $_SESSION['id']     = $user['id'];
            $_SESSION['nombre'] = $user['nombre'];
            $_SESSION['cargo']  = $user['cargo'];
            /* Colocamos cargo porque en los proyectos pueden existri archivos que solo puede ver un usuario con el cargo
            administrador y no un usuario estandar, asi que la variable global crago nos ayudara a verificar el crago del 
            usuario que ha iniciado sesion es decir los roles q maneja casa sistema

            */

            /* Tengamos en cuenta que para este caso se utlizara:
             cargo con valor: 1 es: Administrador
             cargo con valor:2 es : uusario estandar
             se pueden agregar mas cargos en este ejemplo solo uso 2
             */
            
            // Voy a verificar el cargo que tiene el usuario y asi mismo dar la respuesta de ajax para que redireccione
            if($_SESSION['cargo'] == 1){
                echo '../../TroyaNW/admin/ViewAdmin.php';
              }else if($_SESSION['cargo'] == 2){
                echo '../../TroyaNW/view_vendedor/ViewVendedor.php';
              }

            // fin de validacion de cargo

        }else{
            //El usuario y la clave son incorrectos 
            echo 'error_3';
        }


        # Cerramos la conexion
        parent::cerrar();
    }

    public function registroUsuario($name, $email, $clave, $cargo)
    {
      parent::conectar();

      $name  = parent::filtrar($name);
      $email = parent::filtrar($email);
      $clave = parent::filtrar($clave);
      $cargo = parent::filtrar($cargo);

        // validar que ek correo no exixte 
        $verificarCorreo = parent::verificarRegistros('SELECT id from usuarios where email="'.$email.'" ');


      if($verificarCorreo > 0){
        echo 'error_3';
      }else{

        parent::query('INSERT into usuarios(nombre, email, clave, cargo) values("'.$name.'", "'.$email.'", MD5("'.$clave.'"), "'.$cargo.'" )');

        session_start();
        
        if($cargo == 1){
        $_SESSION['nombre'] = $name;
        $_SESSION['cargo']  = 1;

        echo '../../TroyaNW/admin/ViewAdmin.php';
        }else if($cargo== 2){
          
          $_SESSION['nombre'] = $name;
          $_SESSION['cargo']  = 2;

        echo "../../TroyaNW/view_vendedor/Viewvendedor.php";
        }
      }

      parent::cerrar();
    }

  }


?>

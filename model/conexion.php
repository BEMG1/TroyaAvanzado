<?php

# Clase conexion: perimte conectar con la base de datos y ejecutar las consultas sql

class Conexion
{

    #Atributos de la clase conexion 
    private $mysqli = '';
    private $usuario = 'root';
    private $clave = '';
    private $server = 'localhost';
    private $db = 'troya';


# Funcion que permite conectarnos a la base de datos
public function conectar()
{
    # Creamos un objeto de conexion MySQLI
    $this->mysqli = new mysqli($this->server, $this->usuario, $this->clave, $this->db);

    # Validamos si existe un error al conectarno
    if($this->mysqli->connect_errno)
    {
        # Imprimir el error 
        echo 'fallo al conectar con MySQL: '. $this->mysqli->connect_error;
    }

} 


    # Funtion que retorna el objeto de MySQL
    public function query($consulta)
        {
        #mysqli_query Realiza una consulta a la base de datos
        return $this->mysqli->query($consulta);
        }


    # Funcion que retorna el numero de las filas afectadas por una consulta sql 
    public function verificarRegistros($consulta)
        {
        # mysqli_num_rows: Obtiene el numero de filas de una resultado de una consulta 
        return $verificarRegistros = mysqli_num_rows($this->mysqli->query($consulta));
        }

    # Funcion que retorna un arreglo con los registros de una consulta
    public function consultaArreglo($consulta)
        {
        # mysqli_fetch_array Obtiene una fila de los resultados como un array aosciativo, numerico o ambos
        return mysqli_fetch_array($this->mysqli->query($consulta));
        }


    # Funtion que perite cerrar una conexion de MySQL
    public function cerrar()
    {
        # Accedemos al atributo de conexion y cerramos la conexion
        $this->mysqli->close();
    }

    # Escapa los caracteres especiales de uns string para evitar las inyecciones de sql
    public function salvar($des)
        {
        /*
        mysqli_real_escape_string: Escapa de los caracteres especiales de una cadena 
        para usarla en una sentecia SQL, tomando en cuenta el conjunto de 
        caracteres actual de la conexion.
        */
        $string = $this->mysqli->real_escape_string($des);

        return $string;
      }

    #serie de filtros para almacenar en base de datos
    public function filtrar($string){

        $res = $this->salvar($string);

        # Asignamos los parametros de busqueda 
        $buscar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');
          $reemplazar = array('&aacute','&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');

        # str_replace: Remplaza todas las apareciones del string buscando con el string de remplazo
        $res = str_replace($buscar, $reemplazar, $string);

        # strtolower: Convierte una cadena a minusculas
        $res = strtolower($res);
        
        # trim: Elimina espacio en blanco ( u otro tipo de caracteres) del inicio y el final de la cadena
        $res = trim($res);

        return $res;
      }

    #convierte el acento de la base de datos en acento entendibles
    public function rescatar($string)
        {

        # Asiganamos los parametros de busqueda
        $buscar = array('&aacute','&eacute', '&iacute', '&oacute', '&uacute', '&Aacute', '&Eacute', '&Iacute', '&Oacute', '&Uacute', '&ntilde', '&Ntilde');
        $reemplazar = array('á', 'é', 'í', 'ó', 'ú', 'Á', 'É', 'Í', 'Ó', 'Ú', 'ñ', 'Ñ');

        $res = str_replace($buscar, $reemplazar, $string);

        return $res;
      }

} // fin de las clases

?>
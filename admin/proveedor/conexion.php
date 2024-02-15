<?php
$cone = new mysqli("localhost","root","","troya");

if ($cone->connect_errno)
{
    echo "No hay conexion: (" .$cone->connect_errno. ") " .$cone->connect_error;
}
?>
<?php
$conn = new mysqli("localhost", "root", "", "troya");

if ($conn->connect_errno)
{
    echo "NO HAY CONEXION: (" .$conn->connect_errno. ") " .$conn->connet_error;
}
?>
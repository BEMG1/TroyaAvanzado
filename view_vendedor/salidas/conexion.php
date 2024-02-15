<?php
$conn = new mysqli("localhost","root","","troya");
 
if($conn->connect_errno)
{
    echo"no hay conexion:(" .$conn -> connect_errno.")"  .$conn->connect_error;

} 
?>
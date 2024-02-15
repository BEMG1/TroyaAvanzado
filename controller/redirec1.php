<?php

  session_start();

  if($_SESSION['cargo'] == 1){
    header('location: ../../TroyaNW/admin/ViewAdmin.php');
  }else if($_SESSION['cargo'] == 2){
    header('location: ../../TroyaNW/view_vendedor/ViewVendedor.php');
  }
 ?> 
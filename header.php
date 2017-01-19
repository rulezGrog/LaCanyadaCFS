<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Login Administración La Canyada</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/bootstrap-datepicker.es.min.js"></script>
  <link rel="stylesheet" href="css/bootstrap-datepicker3.css">

  <link rel="stylesheet" href="css/lacanyada.css">

  <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="96x96" href="/img/favicon-96x96.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/img/favicon-16x16.png">
  <link rel="shortcut icon" href="/img/favicon.ico" type="image/x-icon">
  <link rel="icon" href="/img/favicon.ico" type="image/x-icon">

</head>

<?php
$mesactual = date('n');
if ($mesactual < 7){
  $temporada = date('Y')-1;
}else{
  $temporada = date('Y');
}
$_SESSION["temporada"] = $temporada;

require_once('fig.php'); //incluimos el config.php que contiene los datos de la conexión a la db y la sesión
// session_start();


        if(!isset($_SESSION['admin']) ) //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
        {

            require_once('login.php');

        }else{

            //SI se ha logeado, mostramos el nick y la opción de deslogearse
            //Este sería el menú que saldría a la gente que esta logeada, se puede modificar y añadir cosas
            // echo 'Bienvenido '.$_SESSION['usuario']; //ej Bienvenido Juan
            // echo '<br>Tu level es '.$_SESSION['level']; //mostramos el level del user
            if($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0)
            {
            //mostramos el link para ir a la pagina privada porque el user tiene level 1 (*Nota: el level por defecto es 2, por lo tanto no se le mostrará)
            //*Nota2: para cambiar el level a 1, se tiene k hacer manualmente por phpmyadmin

                require_once('funciones.php');

                require_once('headmenu.php');
            }

        }

?>

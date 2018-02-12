<?php
require('fig.php'); //incluimos el config.php que contiene los datos de la conexión a la db y la sesión

session_destroy(); //destruimos la sesion
// Header("Location: index.php"); //volvemos al login.php;
echo "<script> window.location.replace('index.php') </script>";

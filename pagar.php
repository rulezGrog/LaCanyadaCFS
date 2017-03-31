<?php

require_once('fig.php');

$tipoOperacion = $_GET['tipo'];

//Función que realiza un pago**************************************************************//
if ($tipoOperacion == 'pagar') {
    $id = $_GET['id'];
    $plazo = $_GET['plazo'];

    $inserta= "UPDATE jugadores SET $plazo='0' WHERE pedido='$id'";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
    $_SESSION["pagaOK"] = 1;
    Header("Location: cobros.php");
}

//Función que cambia un pago**************************************************************//
if ($tipoOperacion == 'cambiar') {
    $id = $_GET['id'];
    $plazo = $_GET['plazo'];
    $cuantia = $_POST['cuantia'];

    $inserta= "UPDATE jugadores SET $plazo='$cuantia' WHERE pedido='$id'";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());

    $_SESSION["pagaOK"] = 1;
    Header("Location: cobros.php");
}

//Función que da de alta una nueva temprada **************************************************************//
if ($tipoOperacion == 'newtemp') {
    $tabla = 'temp'.$_GET['temp'];

    $newTempTable = "CREATE TABLE $tabla LIKE jugadores";
    $resultado1 = mysql_query($newTempTable, $ilink) or die(mysql_error());

    $insertaNewTemp = "INSERT INTO $tabla SELECT * FROM jugadores";
    $resultado2 = mysql_query($insertaNewTemp, $ilink) or die(mysql_error());

    $deleteAll = "TRUNCATE jugadores";
    $resultDelete = mysql_query($deleteAll, $ilink) or die(mysql_error());

    $_SESSION["newTemp"] = 'NO';

    Header("Location: index.php");
}

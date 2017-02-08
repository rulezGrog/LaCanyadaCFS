<?php

$id = $_GET['id'];

//*********************DAMOS DE BAJA A UN SOCIO*************************//
if ($id <> "") {
    require_once('fig.php');
    $inserta= "DELETE FROM admins WHERE idadmin='$id'";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
    $_SESSION["delOK"] = 1;
    Header("Location: admin.php");
}

<?php

require_once('fig.php');

$tipoOperacion = $_GET['oper'];

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
if ($tipoOperacion == 'cambiarpago') {
    $id = $_GET['id'];
    $plazo = $_GET['plazo'];
    $cuantia = $_POST['cuantia'];

    $inserta= "UPDATE jugadores SET $plazo='$cuantia' WHERE pedido='$id'";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());

    $_SESSION["pagaOK"] = 1;
    Header("Location: cobros.php");
}


//*********************EQUIPAMOS A UN JUGADOR*************************//
if ($tipoOperacion == 'equip') {
    $id = $_GET['id'];
    if ($id <> "") {
        require_once('fig.php');
        $inserta= "UPDATE jugadores SET equipacion='NO' WHERE pedido='$id'";

        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["delOK"] = 1;
        Header("Location: noequip.php");
    }
}

//Función que da de alta una nueva temporada **************************************************************//
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

//*********************DAMOS DE BAJA A UN JUGADOR*************************//

if ($tipoOperacion == 'baja') {
    $id = $_GET['id'];
    if ($id <> "") {
        require_once('fig.php');
        $inserta= "DELETE FROM jugadores WHERE pedido='$id'";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["delOK"] = 1;
        Header("Location: categorias.php");
    }
}


//*********************DAMOS DE BAJA A UN ADMIN*************************//
if ($tipoOperacion == 'bajaAdmin') {
    $id = $_GET['id'];
    if ($id <> "") {
        require_once('fig.php');
        $inserta= "DELETE FROM admins WHERE idadmin='$id'";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["delOK"] = 1;
        Header("Location: admin.php");
    }
}


//************************* AGREGAMOS UN ADMIN *************************//

if ($tipoOperacion == 'regAdmin') {
    if (($_POST['nombre'] == ' ') or ($_POST['email'] == ' ') or ($_POST['pwd'] == ' ') or ($_POST['tipouser'] == ' ') or ($_POST['pwd2'] == ' ') and ($_POST['pwd'] == $_POST['pwd2'])) {//comprobamos que las variables enviadas por el form de login.php tienen contenido
        Header("Location: admin.php"); //estan vacías, volvemos al index
    } else {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $nivel = $_POST['tipouser'];

        mysql_select_db(DB_NAME_AG, $ilink);
        $inserta="INSERT INTO admins (level,nombre,email,password) VALUES ('$nivel','$nombre','$email','$pwd')";
        $resultado=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["regOK"]= 1;
        Header("Location: admin.php");
    }
}; //endIF registro nuevo Admin


//************************* EDITAMOS A UN ADMIN *************************//
if ($tipoOperacion == 'editAdminPass') {
    $id = $_GET['id'];
    $newpass = $_POST['pwd'];
    $newpassVal = $_POST['pwd2'];

    if ($newpass != $newpassVal) {
        $_SESSION["regOK"]= -2;
        Header("Location: admin.php?id=$id");
    } else {
        mysql_select_db(DB_NAME_AG, $ilink);
        $updateAdmin1 = "UPDATE admins SET password = '$newpass' WHERE idadmin = '$id'";
        $resuUpAd1=mysql_query($updateAdmin1, $ilink) or die(mysql_error());
        $_SESSION["regOK"]= 2;
        Header("Location: admin.php");
    }
};

if ($tipoOperacion == 'editAdminTipo') {
    $id = $_GET['id'];
    $nivel = $_POST['tipouser'];
    mysql_select_db(DB_NAME_AG, $ilink);
    $updateAdmin2 = "UPDATE admins SET level = '$nivel' WHERE idadmin = '$id'";
    $resuUpAd2=mysql_query($updateAdmin2, $ilink) or die(mysql_error());
    $_SESSION["regOK"]= 2;
    Header("Location: admin.php");
};
 //endIF edición Admin;

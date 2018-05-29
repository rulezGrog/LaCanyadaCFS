<?php

require('fig.php');

$tipoOperacion = $_GET['oper'];

//Función que realiza un pago**************************************************************//
if ($tipoOperacion == 'pagar') {
    $id = $_GET['id'];
    $plazo = $_GET['plazo'];

    $inserta= "UPDATE jugadores SET $plazo='0' WHERE pedido='$id'";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
    $_SESSION["pagaOK"] = 1;
    // Header("Location: cobros.php");
    echo "<script> window.location.replace('cobros.php') </script>";
}

//Función que realiza VARIOS PAGOS************************************************************//
if ($tipoOperacion == 'fullpago') {
    $plazo = $_GET['plazo'];
    $ids = $_POST['imputero-'.$plazo];

    $inserta= "UPDATE jugadores SET $plazo='0' WHERE pedido IN ($ids)";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
    $_SESSION["paga2OK"] = 1;
    // Header("Location: cobros.php");
    echo "<script> window.location.replace('cobros.php') </script>";
}

//Función que cambia un pago**************************************************************//
if ($tipoOperacion == 'cambiarpago') {
    $id = $_GET['id'];
    $plazo = $_GET['plazo'];
    $cuantia = $_POST['cuantia'];

    $inserta= "UPDATE jugadores SET $plazo='$cuantia' WHERE pedido='$id'";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
    $_SESSION["pagaOK"] = 1;
    // Header("Location: cobros.php");
    echo "<script> window.location.replace('cobros.php') </script>";
}


//*********************EQUIPAMOS A UN JUGADOR*************************//
if ($tipoOperacion == 'equip') {
    $id = $_GET['id'];

    if ($id <> "") {
        $inserta= "UPDATE jugadores SET equipacion='NO' WHERE pedido='$id'";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["equipOK"] = 1;
        // Header("Location: noequip.php");
        echo "<script> window.location.replace('noequip.php') </script>";
    }
}

//*********************EQUIPAMOS A VARIOS JUGADORES*************************//
if ($tipoOperacion == 'fullequip') {
    $ids = $_POST['imputer'];

    if ($ids <> "") {
        $inserta= "UPDATE jugadores SET equipacion='NO' WHERE pedido IN ($ids)";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["equip2OK"] = 1;
        Header("Location: noequip.php");
        echo "<script> window.location.replace('noequip.php') </script>";
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

    // Header("Location: index.php");
    echo "<script> window.location.replace('index.php') </script>";
}

//*********************DAMOS DE BAJA A UN JUGADOR*************************//
if ($tipoOperacion == 'baja') {
    $id = $_GET['id'];
    if ($id <> "") {
        $inserta= "DELETE FROM jugadores WHERE pedido='$id'";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["delOK"] = 1;
        // Header("Location: categorias.php");
        echo "<script> window.location.replace('categorias.php') </script>";
    }
}

//**********************ASCENDEMOS A UN JUGADOR**************************//
if ($tipoOperacion == 'ascenso') {
    $id = $_GET['id'];
    $categoria = $_GET['newcategoria'];
    if ($id <> "") {
        $inserta= "UPDATE jugadores SET categoria='$categoria', ascendido='1' WHERE pedido='$id'";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["upOK"] = 1;
        // Header("Location: categorias.php");
        echo "<script> window.location.replace('categorias.php') </script>";
    }
}

//****************ASCENDEMOS A UN JUGADOR PREVIAMENTE ASCENDIDO*********************//
if ($tipoOperacion == 'descenso') {
    $id = $_GET['id'];
    $categoria = $_GET['newcategoria'];
    if ($id <> "") {
        $inserta= "UPDATE jugadores SET categoria='$categoria', ascendido='0' WHERE pedido='$id'";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["upOK"] = 1;
        // Header("Location: categorias.php");
        echo "<script> window.location.replace('categorias.php') </script>";
    }
}

//*********************DAMOS DE BAJA A UN ADMIN*************************//
if ($tipoOperacion == 'bajaAdmin') {
    $id = $_GET['id'];
    if ($id <> "") {
        $inserta= "DELETE FROM admins WHERE idadmin='$id'";
        $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["delOK"] = 1;
        // Header("Location: admin.php");
        echo "<script> window.location.replace('admin.php') </script>";
    }
}


//************************* AGREGAMOS UN ADMIN *************************//
if ($tipoOperacion == 'regAdmin') {
    if (($_POST['nombre'] == ' ') or ($_POST['email'] == ' ') or ($_POST['pwd'] == ' ') or ($_POST['tipouser'] == ' ') or ($_POST['pwd2'] == ' ') and ($_POST['pwd'] == $_POST['pwd2'])) {//comprobamos que las variables enviadas por el form de login.php tienen contenido
        // Header("Location: admin.php"); //estan vacías, volvemos al index
        echo "<script> window.location.replace('admin.php') </script>";
    } else {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $nivel = $_POST['tipouser'];

        mysql_select_db(DB_NAME_AG, $ilink);
        $inserta="INSERT INTO admins (level,nombre,email,password) VALUES ('$nivel','$nombre','$email','$pwd')";
        $resultado=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["regOK"]= 1;
        // Header("Location: admin.php");
        echo "<script> window.location.replace('admin.php') </script>";
    }
}; //endIF registro nuevo Admin


//************************* EDITAMOS A UN ADMIN *************************//
if ($tipoOperacion == 'editAdminPass') {
    $id = $_GET['id'];
    $newpass = $_POST['pwd'];
    $newpassVal = $_POST['pwd2'];

    if ($newpass != $newpassVal) {
        $_SESSION["regOK"]= -2;
        // Header("Location: admin.php?id=$id");
        echo "<script> window.location.replace('admin.php?id=$id') </script>";
    } else {
        mysql_select_db(DB_NAME_AG, $ilink);
        $updateAdmin1 = "UPDATE admins SET password = '$newpass' WHERE idadmin = '$id'";
        $resuUpAd1=mysql_query($updateAdmin1, $ilink) or die(mysql_error());
        $_SESSION["regOK"]= 2;
        // Header("Location: admin.php");
        echo "<script> window.location.replace('admin.php') </script>";
    }
};

if ($tipoOperacion == 'editAdminTipo') {
    $id = $_GET['id'];
    $nivel = $_POST['tipouser'];
    mysql_select_db(DB_NAME_AG, $ilink);
    $updateAdmin2 = "UPDATE admins SET level = '$nivel' WHERE idadmin = '$id'";
    $resuUpAd2=mysql_query($updateAdmin2, $ilink) or die(mysql_error());
    $_SESSION["regOK"]= 2;
    // Header("Location: admin.php");
    echo "<script> window.location.replace('admin.php') </script>";
};
 //endIF edición Admin;

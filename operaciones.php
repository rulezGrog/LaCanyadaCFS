<?php

require('fig.php');
require('funciones.php');

$tipoOperacion = $_GET['oper'];

//Función que realiza un pago**************************************************//
if ($tipoOperacion == 'pagar') {
    $id = $_GET['id'];
    $plazo = $_GET['plazo'];

    $inserta= "UPDATE jugadores SET $plazo='0' WHERE pedido='$id'";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
    $_SESSION["pagaOK"] = 1;
    // Header("Location: cobros.php");
    echo "<script> window.location.replace('cobros.php') </script>";
}

//Función que realiza VARIOS PAGOS*********************************************//
if ($tipoOperacion == 'fullpago') {
    $plazo = $_GET['plazo'];
    $ids = $_POST['imputero-'.$plazo];

    $inserta= "UPDATE jugadores SET $plazo='0' WHERE pedido IN ($ids)";
    $resultado1=mysql_query($inserta, $ilink) or die(mysql_error());
    $_SESSION["paga2OK"] = 1;
    // Header("Location: cobros.php");
    echo "<script> window.location.replace('cobros.php') </script>";
}

//Función que cambia un pago***************************************************//
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


//*********************EQUIPAMOS A UN JUGADOR**********************************//
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

//*********************EQUIPAMOS A VARIOS JUGADORES***************************//
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

//Función que da de alta una nueva temporada *********************************//
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

//*********************DAMOS DE BAJA A UN JUGADOR******************************//
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

//**********************ASCENDEMOS A UN JUGADOR********************************//
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

//****************DESCENDEMOS A UN JUGADOR PREVIAMENTE ASCENDIDO****************//
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

//*********************DAMOS DE BAJA A UN ADMIN********************************//
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


//************************* AGREGAMOS UN ADMIN ********************************//
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


//************************* EDITAMOS A UN ADMIN *******************************//
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
};//endIF edición Admin;


 //************************* AGREGAMOS UN ENTERNADOR **************************//
if ($tipoOperacion == 'regCoach') {
    if (($_POST['nombre'] == '') or ($_POST['apellidos'] == '') or ($_POST['email'] == '')) {
        //comprobamos que las variables enviadas por el formulario de newcoach.php tienen contenido

        $_SESSION["datosFailure"] = 1;
        echo "<script> window.location.replace('entrenadores.php') </script>";
    } else {
        $nombre = encrypt(ucwords(strtolower($_POST['nombre'])));
        $apellidos = encrypt(ucwords(strtolower($_POST['apellidos'])));
        $email = encrypt($_POST['email']);
        $temporada = $_SESSION["temporada"];

        mysql_select_db(DB_NAME_AG, $ilink);
        $inserta="INSERT INTO entrenadores (nombre,apellidos,email,revision) VALUES ('$nombre','$apellidos','$email','0')";
        $resultado=mysql_query($inserta, $ilink) or die(mysql_error());
        
        $select="SELECT idcoach FROM entrenadores ORDER BY idcoach DESC LIMIT 1"; //seleccionamos el id del enternador recien agregado para crear su carpeta de archivos
        $resultado=mysql_query($select, $ilink) or die(mysql_error());
        $entrenador = mysql_fetch_array($resultado);
        $idCoach = $entrenador['idcoach'];
        $path = "./uploads/entrenadores/$temporada/$idCoach/";
        mkdir( $path, 0777, true );

        $_SESSION["regCoachOK"] = 1;
        echo "<script> window.location.replace('entrenadores.php') </script>";
    }
}; //endIF registro nuevo Enternador


 //************************* AGREGAMOS UN EQUIPO ******************************//
 if ($tipoOperacion == 'regTeam') {
    if (($_POST['nickteam'] == '') or ($_POST['teamcategory'] == '')) {
        //comprobamos que las variables enviadas desde el formulario equipos.php tienen contenido

        $_SESSION["datosFailure"] = 1;
        echo "<script> window.location.replace('equipos.php') </script>";
    } else {
        $categoria = $_POST['teamcategory'];
        $nickequipo = $_POST['nickteam'];

        mysql_select_db(DB_NAME_AG, $ilink);
        $inserta="INSERT INTO equipos (categoria,nickequipo) VALUES ('$categoria','$nickequipo')";
        $resultado=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["regTeamOK"] = 1;
        echo "<script> window.location.replace('equipos.php') </script>";
    }
}; //endIF registro nuevo Enternador

//*********************** ASIGNAMOS UN ENTRENADOR A UN EQUIPO *****************//
if ($tipoOperacion == 'CoachToTeam') {
    $idCoach = $_GET['id'];
    if (($_POST['CoachToTeam'] == '')) {
        //comprobamos que las variables enviadas desde el formulario entrenadores.php tienen contenido

        $_SESSION["datosFailure"] = 1;
        echo "<script> window.location.replace('entrenadores.php') </script>";
    } else {
        $equipo = $_POST['CoachToTeam'];

        mysql_select_db(DB_NAME_AG, $ilink);
        $inserta="UPDATE equipos SET entrenador = $idCoach WHERE idequipo = '$equipo'";
        $resultado=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["CoachToTeam"] = 1;
        echo "<script> window.location.replace('entrenadores.php') </script>";
    }
}; //endIF 

//*********************** ASIGNAMOS UN EQUIPO A UN ENTRENADOR *****************//
if ($tipoOperacion == 'TeamToCoach') {
    $idTeam = $_GET['id'];
    if (($_POST['TeamToCoach'] == '')) {
        //comprobamos que las variables enviadas desde el formulario equipos.php tienen contenido

        $_SESSION["datosFailure"] = 1;
        echo "<script> window.location.replace('equipos.php') </script>";
    } else {
        $entrenador = $_POST['TeamToCoach'];

        mysql_select_db(DB_NAME_AG, $ilink);
        $inserta="UPDATE equipos SET entrenador = $entrenador WHERE idequipo = '$idTeam'";
        $resultado=mysql_query($inserta, $ilink) or die(mysql_error());
        $_SESSION["TeamToCoach"] = 1;
        echo "<script> window.location.replace('equipos.php') </script>";
    }
}; //endIF 

//*********************** SUBIDA DE ARCHIVOS ENTRENADOR ***********************//
if ($tipoOperacion == 'UpArchive') {
    $folder = $_GET['pth'];

    error_reporting(E_ALL);
        ini_set('display_errors', 1);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $name     = $_FILES['file']['name'];
            $tmpName  = $_FILES['file']['tmp_name'];
            $error    = $_FILES['file']['error'];
            $size     = $_FILES['file']['size'];
            $ext      = strtolower(pathinfo($name, PATHINFO_EXTENSION));

            echo $name;
            echo $folder;

            switch ($error) {
                case UPLOAD_ERR_OK:
                    $valid = true;
                    //validate file extensions
                    if ( !in_array($ext, array('jpg','jpeg','png','gif','xml','pdf','txt','xlsx')) ) {
                        $valid = false;
                        $response = 'Tipo de archivo inválido.';
                    }
                    //validate file size
                    if ( $size/1024/1024 > 10 ) {
                        $valid = false;
                        $response = 'File size is exceeding maximum allowed size.';
                    }
                    //upload file
                    if ($valid) {
                        $targetPath =  $folder. $name;
                        echo $targetPath;
                        move_uploaded_file($tmpName,$targetPath);
                        header( 'Location: entrenadores.php' ) ;
                        exit;
                    }
                    break;
                case UPLOAD_ERR_INI_SIZE:
                    $response = 'The uploaded file exceeds the upload_max_filesize directive in php.ini.';
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    $response = 'The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.';
                    break;
                case UPLOAD_ERR_PARTIAL:
                    $response = 'The uploaded file was only partially uploaded.';
                    break;
                case UPLOAD_ERR_NO_FILE:
                    $response = 'No file was uploaded.';
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    $response = 'Missing a temporary folder. Introduced in PHP 4.3.10 and PHP 5.0.3.';
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    $response = 'Failed to write file to disk. Introduced in PHP 5.1.0.';
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $response = 'File upload stopped by extension. Introduced in PHP 5.2.0.';
                    break;
                default:
                    $response = 'Unknown error';
                break;
            }

            echo $response;
        }

}; //endIF 

//*********************DAMOS DE BAJA A UN ENTRENADOR***************************//
if ($tipoOperacion == 'borrarCoach') {
    $id = $_GET['id'];
    if ($id <> "") {
        $delete= "DELETE FROM entrenadores WHERE idcoach='$id'";
        $update= "UPDATE equipos SET entrenador = NULL WHERE entrenador='$id'";
        $resultado1=mysql_query($delete, $ilink) or die(mysql_error());
        $resultado2=mysql_query($update, $ilink) or die(mysql_error());
        $_SESSION["delOK"] = 1;
        // Header("Location: categorias.php");
        echo "<script> window.location.replace('entrenadores.php') </script>";
    }
} //endIF 

//**************************BORRAMOS UN EQUIPO*********************************//
if ($tipoOperacion == 'borrarCoach') {
    $id = $_GET['id'];
    if ($id <> "") {
        $delete= "DELETE FROM equipos WHERE idequipo='$id'";
        $resultado=mysql_query($delete, $ilink) or die(mysql_error());
        $_SESSION["delOK"] = 1;
        // Header("Location: categorias.php");
        echo "<script> window.location.replace('equipos.php') </script>";
    }
} //endIF 
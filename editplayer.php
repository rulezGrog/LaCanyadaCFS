<?php

require_once('fig.php'); //incluimos el config.php que contiene los datos de la conexión a la db
require_once('funciones.php');

$operacion = $_GET['op'];
$id = $_GET['id'];

// $temporadaAct = $_SESSION["temporada"];

$mesactual = date('n');
if ($mesactual < 7) {
    $temporadaAct = date('Y')-1;
} else {
    $temporadaAct = date('Y');
}


if ($operacion == 'edit1') { // edición del Primer Panel

  $nombretut = encrypt($_POST['nombretut']);
    $apellidostut = encrypt($_POST['apellidostut']);
    $nombre = encrypt($_POST['nombre']);
    $apellidos = encrypt($_POST['apellidos']);
    $dni = encrypt($_POST['dni']);
    $birthdate = $_POST['birthdate'];
    $telefono = encrypt($_POST['telefono']);
    $email = encrypt($_POST['email']);

    $difyearcategoria = $temporadaAct - (int)$birthdate;

    if ($difyearcategoria < 8) {
        $categoria = 'prebenjamin';
    } else {
        if ($difyearcategoria < 10) {
            $categoria = 'benjamin';
        } else {
            if ($difyearcategoria < 12) {
                $categoria = 'alevin';
            } else {
                if ($difyearcategoria < 14) {
                    $categoria = 'infantil';
                } else {
                    if ($difyearcategoria < 16) {
                        $categoria = 'cadete';
                    } else {
                        if ($difyearcategoria < 19) {
                            $categoria = 'juvenil';
                        } else {
                            $categoria = 'senior';
                        };
                    };
                };
            };
        };
    };

    $update1 = "UPDATE jugadores SET nombre = '$nombre', apellidos = '$apellidos', nom_tutor = '$nombretut', ape_tutor = '$apellidostut', dni = '$dni', email = '$email', tlf = '$telefono', categoria = '$categoria', birthdate = '$birthdate' WHERE pedido = '$id'";
    $resultado = mysql_query($update1, $ilink) or die(mysql_error());

    $_SESSION["editOK"]= 1;
    Header("Location: categorias.php");
}


if ($operacion == 'edit2') { // edición del segundo Panel

  $via = $_POST['via'];
    $direccion = encrypt($_POST['direccion']);
    $poblacion = encrypt($_POST['poblacion']);
    $provincia = encrypt($_POST['provincia']);
    $cp = $_POST['cp'];

    $update2 = "UPDATE jugadores SET tipo_calle = '$via', direccion = '$direccion', provincia = '$provincia', poblacion = '$poblacion', cp = '$cp'   WHERE pedido = '$id'";
    $resultado = mysql_query($update2, $ilink) or die(mysql_error());

    $_SESSION["editOK"]= 1;
    Header("Location: categorias.php");
}

if ($operacion == 'edit3') { // edición del Tercer Panel

  $nombrecuenta = encrypt($_POST['bancname']);
    $apecuenta = encrypt($_POST['bancsurname']);
    $numcuenta = encrypt($_POST['bancnum']);
    $primerpago = $_POST['importe1'];
    $segundopago = $_POST['importe2'];
    $tercerpago = $_POST['importe3'];
    $cuartopago = $_POST['importe4'];
    $quintopago = $_POST['importe5'];
    $pagoextra = $_POST['importeExtra'];

    $update3 = "UPDATE jugadores SET titular_cuenta = '$nombrecuenta', ape_cuenta = '$apecuenta', num_cuenta = '$numcuenta', primerpago = '$primerpago', segundopago = '$segundopago', tercerpago = '$tercerpago', cuartopago = '$cuartopago', quintopago = '$quintopago', pagoextra = '$pagoextra' WHERE pedido = '$id'";
    $resultado = mysql_query($update3, $ilink) or die(mysql_error());

    $_SESSION["editOK"]= 1;
    Header("Location: categorias.php");
}


if ($operacion == 'edit4') { // edición del Cuarto Panel

  if ($_POST['termsImage1'] <> 1) {
      $imagenes1 = 0;
  } else {
      $imagenes1 = 1;
  }

    if ($_POST['termsImage2'] <> 1) {
        $imagenes2 = 0;
    } else {
        $imagenes2 = 1;
    }

    if ($_POST['termsImage3'] <> 1) {
        $imagenes3 = 0;
    } else {
        $imagenes3 = 1;
    }

    if ($_POST['termsImage4'] <> 1) {
        $imagenes4 = 0;
    } else {
        $imagenes4 = 1;
    }

    $update4 = "UPDATE jugadores SET termsimage1 = '$imagenes1', termsimage2 = '$imagenes2', termsimage3 = '$imagenes3', termsimage4 = '$imagenes4' WHERE pedido = '$id'";
    $resultado = mysql_query($update4, $ilink) or die(mysql_error());

    $_SESSION["editOK"]= 1;
    Header("Location: categorias.php");
}

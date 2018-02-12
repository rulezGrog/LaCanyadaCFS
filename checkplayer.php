<?php
require('fig.php'); //incluimos el config.php que contiene los datos de la conexión a la db
require('funciones.php');


// $temporadaAct = $_SESSION["temporada"];

$mesactual = date('n');
if ($mesactual < 7) {
    $temporadaAct = date('Y')-1;
} else {
    $temporadaAct = date('Y');
}

$temporadaReg = $_POST['temporada'];

  if ($_POST['operacion'] == 'SI') {
      $operacion = $_POST['numoper'];
  } else {
      // Obtiene el contador (lo crea si no existe)
    $file = fopen("iupay/contador.txt", "r");
      $operacion = fgets($file);
      if ($operacion == "" || $operacion == false) {
          $operacion = nextCount("0");
      } else {
          $operacion = nextCount($operacion);
      }
      fclose($file);
      $file = fopen("iupay/contador.txt", "w");
      fputs($file, $operacion);
      fclose($file);

      $_SESSION["operacion"] = $operacion;
  }

  if ($_POST['nombretut'] <> '') {
      $tutor = encrypt(ucwords(strtolower($_POST['nombretut'])));
      $tutorapellidos = encrypt(ucwords(strtolower($_POST['apellidostut'])));
  } else {
      $tutor = '';
      $tutorapellidos = '';
  }

  $nombre = encrypt(ucwords(strtolower($_POST['nombre'])));
  $apellidos = encrypt(ucwords(strtolower($_POST['apellidos'])));
  $dni = encrypt($_POST['dni']);
  $telefono = encrypt($_POST['telefono']);
  $email = encrypt($_POST['email']);
  $via = $_POST['via'];
  $direccion = encrypt(ucwords(strtolower($_POST['direccion'])));
  $poblacion = encrypt(ucwords(strtolower($_POST['poblacion'])));
  $provincia = encrypt(ucwords(strtolower($_POST['provincia'])));
  $cp = $_POST['cp'];

  if ($_POST['message'] <> '') {
      $mensaje = $_POST['message'];
  } else {
      $mensaje = '';
  };

    $birthdate = $_POST['birthdate'];
    $birthyear = substr($birthdate, -4);
    $birthmonth = substr($birthdate, -7, 2);
    $birthday = substr($birthdate, 0, -8);

    $difyearcategoria = $temporadaReg - $birthyear;

    $nacimiento = $birthyear.'-'.$birthmonth.'-'.$birthday;

    // $datetimenacimiento = date_create($birthdate);
    // $nacimiento = date_format($datetimenacimiento, 'Y-m-d');

    $_SESSION["birthdate"] = $birthdate;
    $_SESSION["birthyear"] = $birthyear;
    $_SESSION["birthmonth"] = $birthmonth;
    $_SESSION["birthday"] = $birthday;
    $_SESSION["difYear"] = $difyearcategoria;
    $_SESSION["nacimiento"] = $nacimiento;
    // $_SESSION["datetimenacimiento"] = $datetimenacimiento;


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

mysql_select_db(DB_NAME_AG, $ilink);

if ($temporadaAct == $temporadaReg) { //*******************************************

  $antiquity = $_POST['antiquity'];
    $equipacion = $_POST['equipement'];

    $tpv = $_POST['tpv'];

    if ($_POST['fracc'] == 'SI') {
        $fraccionado = 1;
        $titularcuenta = encrypt(ucwords(strtolower($_POST['bancname'])));
        $apellidoscuenta = encrypt(ucwords(strtolower($_POST['bancsurname'])));
        $numerocuenta = encrypt($_POST['bancnum']);
        $primerpago = $_POST['importe1'];
        $segundopago = $_POST['importe2'];
        $tercerpago = $_POST['importe3'];
        $cuartopago = $_POST['importe4'];
        $quintopago = $_POST['importe5'];
        $pagoextra = $_POST['importeExtra'];
    } else {
        $fraccionado = 0;
        $bancname = '';
        $bancsurname = '';
        $bancnum = '';
    };

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

    $inserta="INSERT INTO jugadores (pedido,nombre,apellidos,nom_tutor,ape_tutor,dni,tipo_calle,direccion,poblacion,provincia,cp,email,tlf,antiguedad,mensaje,importe,titular_cuenta,ape_cuenta,num_cuenta,fraccionada,categoria,temporada,birthdate,equipacion,termsimage1,termsimage2,termsimage3,termsimage4,primerpago,segundopago,tercerpago,cuartopago,quintopago,pagoextra) VALUES ('$operacion','$nombre','$apellidos','$tutor','$tutorapellidos','$dni','$via','$direccion','$poblacion','$provincia','$cp','$email','$telefono','$antiquity','$mensaje','$tpv','$titularcuenta','$apellidoscuenta','$numerocuenta','$fraccionado','$categoria','$temporadaReg','$nacimiento','$equipacion','$imagenes1','$imagenes2','$imagenes3','$imagenes4','$primerpago','$segundopago','$tercerpago','$cuartopago','$quintopago','$pagoextra')";
    $resultado=mysql_query($inserta, $ilink) or die(mysql_error());


    $_SESSION["regOK"]= 1;
    Header("Location: categorias.php");
} //endIF**************************************

if ($temporadaAct > $temporadaReg) {
    $inserta="INSERT INTO '$temporadaReg' (pedido,nombre,apellidos,nom_tutor,ape_tutor,dni,tipo_calle,direccion,poblacion,provincia,cp,email,tlf,mensaje,categoria,temporada,birthdate,termsimage1,termsimage2,termsimage3,termsimage4) VALUES ('$pedido','$nombre','$apellidos','$tutor','$tutorapellidos','$dni','$via','$direccion','$poblacion','$provincia','$cp','$email','$telefono','$mensaje','$categoria','$temporadaReg','$nacimiento','$imagenes1','$imagenes2','$imagenes3','$imagenes4')";
    $resultado=mysql_query($inserta, $ilink) or die(mysql_error());

    $_SESSION["regOK"]= 1;
    Header("Location: newplayer.php");
}
  mysql_close($ilink);

  $_SESSION["cadena"] = $cadena;

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
                // require_once('funciones.php');


                define ('ENCRYPT_KEY',"ZUH+nKZkaBb8tho");

                //*********** FUNCIONES DE ENCRIPTACION-DESENCRIPTACION ****************//
                function decrypt($in)
                {
                    $in = base64_decode($in);
                    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_ECB);
                    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
                    $dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_256,ENCRYPT_KEY, $in, MCRYPT_MODE_ECB, $iv);

                    return $dec;
                }

                define ('ENCRYPT_KEY2',"bRuD5WYw5wd0rdHR9yLlM6wt2vteuiniQBqE70nAuhU=");

                function newencrypt($data) {
                    // Remove the base64 encoding from our key
                    $encryption_key = base64_decode(ENCRYPT_KEY2);
                    // Generate an initialization vector
                    $iv = openssl_random_pseudo_bytes(openssl_cipher_iv_length('aes-256-cbc'));
                    // Encrypt the data using AES 256 encryption in CBC mode using our encryption key and initialization vector.
                    $encrypted = openssl_encrypt(utf8_decode($data), 'aes-256-cbc', $encryption_key, 0, $iv);
                    // The $iv is just as important as the key for decrypting, so save it with our encrypted data using a unique separator (::)
                    return base64_encode($encrypted . '::' . $iv);
                }

                function newdecrypt($data) {
                    // Remove the base64 encoding from our key
                    $encryption_key = base64_decode(ENCRYPT_KEY2);
                    // To decrypt, split the encrypted data from our IV - our unique separator used was "::"
                    list($encrypted_data, $iv) = explode('::', base64_decode($data), 2);
                    return openssl_decrypt($encrypted_data, 'aes-256-cbc', $encryption_key, 0, $iv);
                }

                //*********** "FIN" FUNCIONES DE ENCRIPTACION-DESENCRIPTACION ****************//


                require_once('headmenu.php');
            }

        }

?>

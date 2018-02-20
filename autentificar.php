<?php
require('fig.php'); //incluimos el config.php que contiene los datos de la conexión a la db

if (($_POST['email'] == '') or ($_POST['contrasena'] == '')) {
//comprobamos que las variables enviadas por el form de login.php tienen contenido
	$_SESSION['noLoginDATA'] = 1;
	echo "<script> window.location.replace('index.php') </script>";
	// header("Location: index.php"); //estan vacías, volvemos al index
} else {

// $pass = sha1(md5($_POST['contrasena']));

$pass = $_POST['contrasena'];
$emalio = $_POST['email'] ;

//comprobamos en la db si existe ese nick con esa pass
$usuario = mysql_query("SELECT * FROM admins WHERE email='$emalio' and password='$pass'");
    if ($user_ok = mysql_fetch_array($usuario)) { //si existe comenzamos con la sesion, si no, al index

				// session_register("usuario"); //registramos la variable usuario que contendrá el nick del user
				// session_register("idusuario"); //registramos la variable idusuario que contendrá la id del user
				// session_register("level"); //registramos la variable level que contendrá el level del user
				//damos valores a las variables de la sesión
				$_SESSION['admin'] = $user_ok['nombre']; //damos el nick a la variable usuario
				// $_SESSION['idusuario'] = $user_ok["id"]; //damos la id del user a la variable idusuario
				$_SESSION['level'] = $user_ok['level']; //damos el level del user a la variable level
				$_SESSION['regOK'] = 0;
        $_SESSION['delOK'] = 0;
        $_SESSION['INFO'] = 1;
        $_SESSION['pagaOK'] = 0;

        echo "<script> window.location.replace('index.php') </script>";
        // header('Location: index.php'); //volvemos al login donde nos saldrá nuestro menú de usuario
    } else {
        $_SESSION['regNOT'] = 1;
        echo "<script> window.location.replace('index.php') </script>";
        // header('Location: index.php');
    }
}
?>

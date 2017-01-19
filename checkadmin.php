<?php
require_once('fig.php'); //incluimos el config.php que contiene los datos de la conexión a la db



$operacion = $_GET['op'];

if ($operacion == 'reg') {

        if( ($_POST['nombre'] == ' ') or ($_POST['email'] == ' ') or ($_POST['pwd'] == ' ') or ($_POST['tipouser'] == ' ') or ($_POST['pwd2'] == ' ') and ($_POST['pwd'] == $_POST['pwd2']) )//comprobamos que las variables enviadas por el form de login.php tienen contenido
        {
        Header("Location: admin.php"); //estan vacías, volvemos al index

        }else{

          $nombre = $_POST['nombre'];
          $email = $_POST['email'];
          $pwd = $_POST['pwd'];
          $nivel = $_POST['tipouser'];

          mysql_select_db(DB_NAME_AG,$ilink);
          $inserta="INSERT INTO admins (level,nombre,email,password) VALUES ('$nivel','$nombre','$email','$pwd')";
          $resultado=mysql_query($inserta,$ilink) or die (mysql_error());
          $_SESSION["regOK"]= 1;
          Header("Location: admin.php");
        }

}; //endIF registro nuevo Admin

if ($operacion == 'edit') {

  $id = $_GET['id'];
  $tipo = $_GET['op2'];

  if ($tipo == 'pass'){



    $newpass = $_POST['pwd'];
    $newpassVal = $_POST['pwd2'];

    if($newpass != $newpassVal){
      $_SESSION["regOK"]= -2;
      Header("Location: admin.php?id=$id");
    }else{
      mysql_select_db(DB_NAME_AG,$ilink);
      $updateAdmin1 = "UPDATE admins SET password = '$newpass' WHERE idadmin = '$id'";
      $resuUpAd1=mysql_query($updateAdmin1,$ilink) or die (mysql_error());
      $_SESSION["regOK"]= 2;
      Header("Location: admin.php");
    }

  }


  if ($tipo == 'tipo'){

    $nivel = $_POST['tipouser'];
    mysql_select_db(DB_NAME_AG,$ilink);
    $updateAdmin2 = "UPDATE admins SET level = '$nivel' WHERE idadmin = '$id'";
    $resuUpAd2=mysql_query($updateAdmin2,$ilink) or die (mysql_error());
    $_SESSION["regOK"]= 2;
    Header("Location: admin.php");

  }
}; //endIF edición Admin



?>

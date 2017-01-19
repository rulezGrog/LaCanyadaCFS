<?php

require_once('fig.php');

$id = $_GET['id'];
$plazo = $_GET['plazo'];

$tipoOperacion = $_GET['tipo'];



//Función que realiza un pago**************************************************************//
if($tipoOperacion == 'pagar'){

  		$inserta= "UPDATE jugadores SET $plazo='0' WHERE pedido='$id'";

  		$resultado1=mysql_query($inserta,$ilink) or die (mysql_error());
      $_SESSION["pagaOK"] = 1;
      Header("Location: cobros.php");

}

//Función que cambia un pago**************************************************************//
if($tipoOperacion == 'cambiar'){

	$cuantia = $_POST['cuantia'];

	$inserta= "UPDATE jugadores SET $plazo='$cuantia' WHERE pedido='$id'";

	$resultado1=mysql_query($inserta,$ilink) or die (mysql_error());
	$_SESSION["pagaOK"] = 1;
	Header("Location: cobros.php");

}


?>

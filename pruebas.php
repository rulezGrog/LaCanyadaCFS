<!--
  PÁGINA SOLO PARA PRUEBAS Y QUE NO SE MOSTRARÁ EN LA VERSIÓN DEFEINITIVA
-->

<?php  include("header.php");

$selecciona2= "SELECT * FROM admins";

        $resultado2=mysql_query($selecciona2, $ilink) or die(mysql_error());
        $numfilas = mysql_num_rows($resultado2); // obtenemos el número de filas


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        echo '
<div class="container">
  <h1 class="text-center">Página de pruebas en el desarrollo</h1>
    <br/>
    <h3>Veriables de sesión activas</h3>
    <pre>' . print_r($_SESSION, true) . '</pre>
</div>';


        include("sidebar.php");
        include("footer.php");
    }
}


?>

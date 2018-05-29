<body>
<div id="container">
    <header class="main-header">
      <!-- Logo -->
      <a href="index.php" class="logo">
          <span class="canyadaIcon"></span>
          <span class="navbar-brand">La Canyada C.F.S.</span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="nav-bar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
      </nav>
    </header>

  <!-- <nav class="navbar">
    <div class="navbar-header">
      <div class="logo">
        <span class="canyadaIcon"></span>
        <a class="navbar-brand" href="index.php">La Canyada C.F.S.</a>
      </div>
    </div>


    <div class="nav toggle">
      <a id="menu_toggle"><i class="fa fa-bars"></i></a>
    </div>
  </nav> -->

<div id="contenido" style="min-height: 922px;">
<?php
  if (isset($_SESSION["newTemp"]) && $_SESSION["newTemp"] == 'SI') {
      echo '
    <div class="alert alert-danger">
      <strong>¡PELIGRO!</strong> Desde Junio estamos ya en una nueva Temporada, pero aún seguimos usando la base de datos de la Temporada pasada. Porfavor, <strong>cree una nueva temporada</strong> en la sección <strong>"Gestión de Temporadas</strong>". <br>
      De lo contrario todas las nuevas actualizaciones de la ya actual temporada se harán en la base de datos de la vieja temporada, por lo que se crearán incongruencias.
    </div>
    ';
  }

$_SESSION['obras'] = 0; //Vsariable de session q nos pone en modo mantenimiento

if ($_SESSION['obras'] == 1) {
  echo'
  <div class="alert alert-danger">
    <strong>¡IMPORTANTE, MODO MANTENIMIENTO ACTIVADO!</strong> La activación de este modo implica que existen cosas que no están funcionando correctamente y debido a ello, y por mantener la integridad de los datos,
    se está usando una base de datos alternativa y <strong>desechable</strong>, por lo que los datos que actualmente aparecen no son, en absoluto, reflejo de la realidad. Disculpen las molestias.
  </div>
  ';
}

?>

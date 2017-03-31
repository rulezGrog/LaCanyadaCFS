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
  if ($_SESSION["newTemp"] == 'SI') {
      echo '
    <div class="alert alert-danger">
      <strong>¡PELIGRO!</strong> Desde Julio estamos ya en una nueva Temporada, pero aún seguimos usando la base de datos de la Temporada pasada. Porfavor, <strong>cree una nueva temporada</strong> en la sección <strong>"Gestión de Temporadas</strong>". <br>
      De lo contrario todas las nuevas actualizaciones de la ya actual temporada se harán en la base de datos de la vieja temporada, por lo que se crearán incongruencias.
    </div>
    ';
  }


?>

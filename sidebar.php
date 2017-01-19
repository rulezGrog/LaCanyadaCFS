<div class="main-sidebar" id="accordion">
  <!-- <div class="logo-header">
    <div class="logo">
      <span class="canyadaIcon"></span>
      <a class="logo-brand" href="index.php">La Canyada C.F.S.</a>
    </div>
  </div> -->


  <div class="">
  <ul class="sidebar-menu">
    <li class="side-header">MENÚ PRINCIPAL</li>
    <li><a href="index.php"><span class="glyphicon glyphicon-home preicon" aria-hidden="true"></span>INICIO</a></li>
    <li class="tree"><a type="button" data-parent="#accordion" data-toggle="collapse" href="#incidencias"><span class="glyphicon glyphicon-fire preicon" aria-hidden="true"></span>INCIDENCIAS</a>
     <ul id="incidencias" class="panel-collapse collapse">
       <?php
         if($_SESSION['level'] == 1 or $_SESSION['level'] == 0)
         {
         echo '
         <li><a href="cobros.php">COBROS A REALIZAR</a></li>';
         }
       ?>
       <li><a href="noequip.php">JUGADORES SIN EQUIPACIÓN</a></li>
     </ul>
    </li>
    <li class="tree"><a type="button" data-parent="#accordion" data-toggle="collapse" href="#jugadores"><span class="glyphicon glyphicon-user preicon" aria-hidden="true"></span>GESTIÓN JUGADORES</a>
     <ul id="jugadores" class="panel-collapse collapse">
       <li><a href="categorias.php">LISTA DE JUGADORES</a></li>
       <?php
       if($_SESSION['level'] == 1 or $_SESSION['level'] == 0)
       {
       echo '
       <li><a href="newplayer.php">ALTA NUEVO JUGADOR</a></li>';
       }
       ?>
     </ul>
   </li>
   <li class="tree"><a type="button" data-parent="#accordion" data-toggle="collapse" href="#gestTemp"><span class="glyphicon glyphicon-globe preicon" aria-hidden="true"></span>GESTIÓN TEMPORADAS</a>
     <ul id="gestTemp" class="panel-collapse collapse">
         <li><a href="#">[Temporadas anteriores]</a></li>
         <?php
         if($_SESSION['level'] == 0)
         {
         echo '
          <li><a href="newseason.php">CREAR NUEVA TEMPORADA</a></li>
         ';} ?>
     </ul>
   </li>
   <li class="side-header">ADMINISTRACIÓN</li>
        <?php
        if($_SESSION['level'] == 0)
        {
        echo '
        <li class="tree"><a type="button" data-parent="#accordion" data-toggle="collapse" href="#usuarios"><span class="glyphicon glyphicon-cog preicon" aria-hidden="true"></span>USUARIOS</a>
          <ul id="usuarios" class="panel-collapse collapse">
            <li><a href="admin.php">LISTA USUARIOS</a></li>
            <li><a href="regadmin.php">AÑADIR USUARIO</a></li>
          </ul>
        </li>';
        }
        ?>
        <li><a href="logout.php"><span class="glyphicon glyphicon-log-out preicon" aria-hidden="true"></span>Salir</a></li>
        <?php
        if($_SESSION['level'] == 0)
        {
        echo '
        <!--<li><a href="pruebas.php">Pruebas</a></li>-->';
        }
        ?>
    </ul>
    </div>
</div>

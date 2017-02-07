
  <body>

<?php  include("headmenu.php"); ?>
<!--
  <nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
        <span class="canyadaIcon"></span>
        <span class="navbar-brand" href="#">La Canyada - Administración de Jugadores</span>
    </div>
  </div>
  </nav> -->

      <?php
      if($_SESSION["regNOT"] == 1){
  			echo'<div class="container"><div class="alert alert-danger" style="margin:0 auto;"><strong>¡¡¡eMail y/0 contraseña incorrectos!!!!.</strong></div></div>';
  			$_SESSION["regNOT"] = 0;
  		}
      ?>


<div class="loging">
  <div class="titLog">
    <h2>LA CANYADA C.F.S.</h2>
  </div>

  <form class="form-horizontal" role="form" action="autentificar.php" method="POST">
    <div class="form-group">
      <label for="email" class="col-lg-3 control-label">Email</label>
      <div class="col-lg-9">
        <input type="email" class="form-control" id="email" name="email" placeholder="eMail" tabindex="1">
      </div>
    </div>
    <div class="form-group">
      <label for="contrasena" class="col-lg-3 control-label">Contraseña</label>
      <div class="col-lg-9">
        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder="Contraseña" tabindex="2">
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-2 col-lg-10">
        <!-- <div class="checkbox">
          <label>
            <input type="checkbox"> No cerrar sesión
          </label>
        </div> -->
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-offset-3 col-lg-9">
        <button type="submit" class="btn btn-default">Entrar</button>
      </div>
    </div>
  </form>


</div>





  </body>
</html>

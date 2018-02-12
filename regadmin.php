<?php  require("header.php");

$selecciona2= "SELECT * FROM admins";

        $resultado2=mysql_query($selecciona2, $ilink) or die(mysql_error());
        $numfilas = mysql_num_rows($resultado2); // obtenemos el número de filas


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 0) {
        echo '
<div class="headTitle">
  <span class="headTitleText"><h2> > REGISTRAR NUEVO USUARIO </h2></span>
</div>
    <div class="container">
      <form class="form-horizontal" role="form" action="operaciones.php?oper=regAdmin" method="POST">
			<div class="form-group">
				<label class="control-label col-sm-3" for="nombre">Nombre:</label>
				<div class="col-sm-8">
					<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre">
				</div>
			</div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="email">Email:</label>
          <div class="col-sm-8">
            <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca email">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="pwd">Password:</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="pwd" name="pwd" placeholder="Introduzca contraseña">
          </div>
        </div>
        <div class="form-group">
          <label class="control-label col-sm-3" for="pwd2">Repite la contraseña:</label>
          <div class="col-sm-8">
            <input type="password" class="form-control" id="pwd2" name="pwd2" placeholder="Repita contraseña">
          </div>
        </div>
				<div class="form-group">
					<label class="control-label col-sm-3" for="tipouser">Tipo de usuario:</label>
					<div class="col-sm-8">
							<select name="tipouser" id="tipouser" class="form-control">
							  <option value="2">Invitado</option>
							  <option value="1">Gestor</option>
							</select>
					</div>
		    </div>
        <div class="form-group">
          <div class="col-sm-offset-3 col-sm-8">
            <button type="submit" class="btn btn-default">enviar</button>
          </div>
        </div>
      </form>

			<br />
			<a href="admin.php" class="btn btn-primary pull-right" role="button">Atras</a>

    </div>
    ';

        include("sidebar.php");
        include("footer.php");
    }//-----------BIG-ENDIF----------------------------
}

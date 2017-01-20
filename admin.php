<?php  include("header.php");

$selecciona2= "SELECT * FROM admins";

		$resultado2=mysql_query($selecciona2,$ilink) or die (mysql_error());
		$numfilas = mysql_num_rows($resultado2); // obtenemos el número de filas


if(!isset($_SESSION['admin']) ) //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
{

}else{

	if($_SESSION['level'] == 0)
  {
    echo '<div class="container">';
			if($_SESSION["regOK"] == 1)
			{
					echo'<div class="alert alert-info"><strong>Se ha itroducido correctamemte el nuevo usuario del sitio.</strong></div>';
					$_SESSION["regOK"] = 0;
			}

			if($_SESSION["regOK"] == 2)
			{
					echo'<div class="alert alert-info"><strong>Se ha actualziado los datos del usuario correctamente.</strong></div>';
					$_SESSION["regOK"] = 0;
			}

			if($_SESSION["regOK"] == -2){

				echo"
				<span id='dom-target-v1' style='display: none;'>";

        $outputID = $_GET['id']; //Again, do some operation, get the output.
        echo htmlspecialchars($outputID); /* You have to escape because the result
                                           will not be valid HTML otherwise. */
    		echo"
				</span>

				<script type='text/javascript'>
					var div = document.getElementById('dom-target-v1');
					var myData = div.textContent;
					var direc1 = '#editarModal-';
					var direccion = direc1.concat(myData)
					    $(window).load(function(){
					        $(direccion).modal('show');
					    });
				</script>";
			}

			if($_SESSION["delOK"] == 1)
			{
					echo'<div class="alert alert-danger"><strong>Se ha borrado al usuario correctamente</strong></div>';
					$_SESSION["delOK"] = 0;
			}

			echo'
			<h1 class="text-center">Lista de usuarios</h1>
			<br>
			<div class="table-responsive">
       <table class="table table-striped">
         <thead>
         <tr>
           <th>Nombre</th>
           <th>eMail</th>
           <th>Tipo Usuario</th>
           <th> </th>
           <th> </th>
         </tr>
         </thead>
         <tbody>';
				 while ($fila = mysql_fetch_array($resultado2))
				 {
					 $idadmin = utf8_encode($fila['idadmin']);  //LOS utf8_encode HAY QUE ARREGLARLO, DEBE FUNCIONAR LA PAGINA ENTERA CON UTF8 SIN PROBLEMAS
					 $nombreAdmin = utf8_encode($fila['nombre']);
					 $emailAdmin = ($fila['email']);
					 $level = ($fila['level']);

					 if($level == 1){
						 $tipoUser = 'Gestor';
					 }else{
						 if($level == 2){
							 $tipoUser = 'Invitado';
						 }else{
							 if($level == 0){
								 $tipoUser = 'Administrador';
							 }
						 }
					 }

					 $arrayAdmins [] = $idadmin;
          echo"
					<tr>
            <td>$nombreAdmin</td>
            <td>$emailAdmin</td>
						<td>$tipoUser</td>
						<td>";
						if ($level != 0) { echo"
						<button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$idadmin'><a href='#'>EDITAR</a></button>";
					} echo "
						</td>
						<td>";
						if ($level != 0) { echo"
            <button type='button' class='btn btn-danger btn-xs' data-toggle='modal' data-target='#delModal-$idadmin'>ELIMINAR</button>";
					};
						echo"</td>
          </tr>


					<div class='modal fade bs-example-modal-sm' id='editarModal-$idadmin' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
					  <div class='modal-dialog' role='document'>
					    <div class='modal-content'>
					      <div class='modal-header'>
					        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
					        <h4 class='modal-title' id='myModalLabel'>Editra datos del usuario $nombreAdmin</h4>
					      </div>
								<div class='modal-body'>
								";
								if($_SESSION["regOK"] == -2 && $idadmin == $outputID){
										echo'<div class="alert alert-danger"><strong>Las contaseñas son diferentes</strong></div>';
										$_SESSION["regOK"] = 0;
							}; echo "
								<form action='checkadmin.php?op=edit&op2=pass&id=$idadmin' method='post'>
											<div class='form-group'>
												<label class='control-label' for='pwd'>Password:</label>
												<input type='password' class='form-control' id='pwd' name='pwd' placeholder='Introduzca nueva contraseña'>
											</div>
											<div class='form-group'>
												<label class='control-label' for='pwd2'>Repite la contraseña:</label>
												<input type='password' class='form-control' id='pwd2' name='pwd2' placeholder='Repita nueva contraseña'>
											</div>
											<button type='submit' class='btn btn-info pull-right'>Editar contraseña</button>
									</form>";
											if ($level != 0) { echo"
													<br>
													<hr>
													<form action='checkadmin.php?op=edit&op2=tipo&id=$idadmin' method='post'>
															<div class='form-group'>
																<label class='control-label' for='tipouser'>Tipo de usuario:</label>
																		<select name='tipouser' id='tipouser' class='form-control' placeholder='$tipoUser'>
																			<option value='2'>Invitado</option>
																			<option value='1'>Gestor</option>
																		</select>
															</div>
															<button type='submit' class='btn btn-info pull-right'>Editar Tipo Usuario</button>
															<br><br>
													</form>";
										}; echo"
					      </div>
					      <div class='modal-footer'>
					        	<button type='button' class='btn btn-warning btn-sm' data-dismiss='modal'>CANCELAR</button>
					      </div>

					    </div>
					  </div>
					</div>";



				}
				echo'
				</tbody>
       </table>
      </div>
			<a type="button" class="btn btn-warning pull-right" href="regadmin.php">AÑADIR NUEVO USUARIO</a>';



			foreach ($arrayAdmins as $id){

			echo "

			<div class='modal fade bs-example-modal-sm' id='delModal-$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
			  <div class='modal-dialog' role='document'>
			    <div class='modal-content'>
			      <div class='modal-header'>
			        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
			        <h4 class='modal-title' id='myModalLabel'>¿Estás seguro de eliminar al Usuario?</h4>
			      </div>
						<div class='modal-body'>
			        <p>Esta acción <strong>NO</strong> tendrá vuelta atrás y los datos borrados no podrán ser recuperados, aún así, ¿estas seguro de querer borrar el administrador?</p>
			      </div>
			      <div class='modal-footer'>
			        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>NO</button>
				        <a type='button' class='btn btn-danger btn-sm' href='elimadmin.php?id=$id'> SI </a>
			      </div>
			    </div>
			  </div>
			</div>";
			};

			include("sidebar.php");
			include("footer.php");
  }//----------------------BIG-ENDIF----------------------
}

?>

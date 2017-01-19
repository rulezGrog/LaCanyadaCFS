<?php

include("header.php");

//
// $selecciona2= "SELECT * FROM jugadores";
//
// 		$resultado2=mysql_query($selecciona2,$ilink) or die (mysql_error());
// 		$numfilas = mysql_num_rows($resultado2); // obtenemos el número de filas


if(!isset($_SESSION['admin']) ) //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
{

}else{

	if($_SESSION['level'] == 1 or $_SESSION['level'] == 0)
  {
		$temporada = $_SESSION["temporada"];

    echo '<div ng-app="app">';
		require_once('funcionesJS.php');
		echo"
<div ng-controller='formController' class='container' id='container'>

  <h1 class='text-center'>ALTA NUEVO JUGADOR</h1>

	<br>
	<hr>
	<br>

		<form role='form' action='checkplayer.php' method='POST'>

			<div style='margin-bottom: -20px;' class='row form-group'>
					<div class='form-group col-sm-7'>
						<label class='control-label col-sm-6 no-padding-left' for='operacion'>¿Tiene el jugador número de operación?</label>
						<div class='col-sm-2 no-padding-left'>
						<label class='radio-inline'>
								<input type='radio' name='operacion' value='SI' / required>Sí
						</label>
						<label class='radio-inline'>
								<input type='radio' name='operacion' value='NO' / required>NO
						</label>
						</div>
						<div class='form-group  col-sm-3 no-padding-left'>
							<input type='text' class='form-control' id='nombre' name='numoper' placeholder='Número operación'>
						</div>
					</div>
					<div class='form-group col-sm-3 pull-right no-padding-right'>
						<label class='control-label col-sm-5' for='temporada'>Temporada:</label>
						<div class='form-group col-sm-7'>
							<input type='text' class='form-control' id='temporada' name='temporada' placeholder='2016$temporada' required>
						</div>
					</div>
			</div>

			<hr>

			<div class='row form-group'>
					<div class='form-group col-sm-5'>
						<label class='control-label' for='nombretut'>Nombre padre/madre/tutor:</label>
						<input type='text' class='form-control' id='nombre' name='nombretut' placeholder='Introduzca nombre'>
					</div>
					<div class='form-group col-sm-7'>
						<label class='control-label' for='nombre'>Apellidos padre/madre/tutor:</label>
						<input type='text' class='form-control' id='nombre' name='apellidostut' placeholder='Introduzca los apellidos'>
					</div>
					<div class='form-group col-sm-5'>
						<label class='control-label' for='nombre'>Nombre Jugador:</label>
						<input type='text' class='form-control' id='nombre' name='nombre' placeholder='Introduzca nombre' required>
					</div>
					<div class='form-group col-sm-7'>
						<label class='control-label' for='apellidos'>Apellidos Jugador:</label>
						<input type='text' class='form-control' id='nombre' name='apellidos' placeholder='Introduzca los apellidos' required>
					</div>

					<div class='form-group col-sm-3'>
						<label class='control-label' for='dni'>DNI:</label>
						<input type='text' class='form-control' id='dni' name='dni' placeholder='Introduzca DNI' required>
					</div>
					<div class='form-group col-sm-3' style='float:left !important;'>
						<label class='control-label' for='birthdate'>Fecha nacimiento:</label>
						<div class='input-group date'>
							<input class='form-control' type='text' name='birthdate' class='readonly' required><span class='input-group-addon'><i class='glyphicon glyphicon-calendar' required></i></span>
						</div>
					</div>

											<script>
											    $(''.readonly').keydown(function(e){
											        e.preventDefault();
											    });
											</script>

					<div class='form-group col-sm-2'>
						<label class='control-label' for='telefono'>Teléfono:</label>
						<input type='tel' class='form-control' id='telefono' name='telefono' placeholder='612345678' required>
					</div>
					<div class='form-group col-sm-4'>
						<label class='control-label' for='email'>eMail:</label>
						<input type='email' class='form-control' id='email' name='email' placeholder='Introduzca eMail' required>
					</div>
			</div>

			<hr>

			<div class='row form-group'>
					<div class='form-group col-sm-3'>
						<label class='control-label' for='via'>Tipo Vía:</label>
						<input type='text' class='form-control' id='via' name='via' placeholder='Calle / Avenida /...' required>
					</div>
					<div class='form-group col-sm-9'>
						<label class='control-label' for='direccion'>Dirección:</label>
						<input type='txet' class='form-control' id='direccion' name='direccion' placeholder='Introduzca dirección' required>
					</div>

					<div class='form-group col-sm-4'>
						<label class='control-label' for='poblacion'>Población:</label>
						<input type='text' class='form-control' id='poblacion' name='poblacion' placeholder='Población' required>
					</div>
					<div class='form-group col-sm-4'>
						<label class='control-label' for='provincia'>Provincia:</label>
						<input type='text' class='form-control' id='provincia' name='provincia' placeholder='Provincia' required>
					</div>
					<div class='form-group col-sm-4'>
						<label class='control-label' for='cp'>Código Postal:</label>
						<input type='text' class='form-control' id='cp' name='cp' placeholder='Código postal' required>
					</div>
			</div>

					<hr>

			<div class='row form-group'>
						<div class='row form-group col-sm-12'>
								<label class='col-sm-2 control-label'>Antigüedad</label>
								<div class='col-sm-10'>
										<div class='radio'>
												<input type='radio' name='antiquity' value='OLD' required />
												Ya he jugado en La Canyada C.F.S en otras temporadas.
										</div>
										<div class='radio'>
												<input type='radio' name='antiquity' value='NEW' required />
												Es la primera vez que juego en La Canyada C.F.S.
										</div>
								</div>
						</div>

						<div class='row form-group col-sm-12'>
								<label class='col-sm-2 control-label'>Equipación</label>
								<div class='col-sm-10'>
										<div class='radio'>
												<input type='radio' name='equipement' ng-model='user.equipement' ng-change='calcTotal();' value='NO' required />
												NO necesito equipación (reutilizo la de la temporada pasada).
										</div>
										<div class='radio'>
												<input type='radio' name='equipement' ng-model='user.equipement' ng-change='calcTotal();' value='SI' required />
												SI necesito una nueva equipación.
										</div>
								</div>
						</div>
			</div>

					<hr>
					<br>

			<div class='row form-group'>

				<div clas='col-sm-6' style='margin-bottom:30px;'>
					<label class='col-sm-2 control-label' for='tpv'>Importe pagado mediente el TPV</label>
					<div class='col-sm-2'>
						<input class='form-control' type='text' name='tpv' placeholder='000€' />
					</div>
				</div>

				<br>

				<div class='col-sm-12' style='margin-bottom:10px;'>
					<label class='col-sm-2 control-label no-padding-left' for='fracc'>¿Pago Fraccionado?</label>
					<div class='col-sm-10'>
							<label class='radio-inline'>
									<input type='radio' name='fracc' ng-model='user.fracc' ng-change='setFracc();' value='SI' />Sí
							</label>
							<label class='radio-inline'>
									<input type='radio' name='fracc' ng-model='user.fracc' ng-change='setFracc();' value='NO' />NO
							</label>
					</div>
				</div>

					<div ng-show='user.fracc'>
							<div class='row form-group col-sm-12'>
									<label class='col-sm-2 control-label' for='bancname'>Titular de la cuenta bancaria</label>
									<div class='col-sm-4'>
											<input class='form-control' type='text' name='bancname' ng-model='user.bancname' placeholder='Nombre titular cuenta' />
									</div>
									<div class='col-sm-6'>
											<input class='form-control' type='text' name='bancsurname' ng-model='user.bancsurname' placeholder='Apellidos titular cuenta' />
									</div>
							</div>
							<div class='row form-group col-sm-12'>
									<label class='col-sm-4 control-label' for='bancnum'>Número de cuenta bancaria</label>
									<div class='col-sm-8 no-padding-left'>
											<input class='form-control' id='cuentaV' type='text' name='bancnum' ng-model='user.bancnum' placeholder='AA0000000000000000000000'/>
									</div>
							</div>
					</div>

					<div class='form-group col-sm-3' ng-hide='user.fracc'>
							<label class='control-label' for='importe1'>Primer Pago:</label>
							<input class='form-control' type='text' name='importe1' placeholder='000€'/>
					</div>
					<div class='form-group col-sm-3' ng-hide='user.fracc'>
							<label class='control-label' for='importe2'>Segundo Pago:</label>
							<input class='form-control' type='text' name='importe2' placeholder='000€'/>
					</div>
					<div class='form-group col-sm-3' ng-hide='user.fracc'>
							<label class='control-label' for='importe3'>Tercer Pago:</label>
							<input class='form-control' type='text' name='importe3' placeholder='000€'/>
					</div>
					<div class='form-group col-sm-3' ng-hide='user.fracc'>
							<label class='control-label' for='importe4'>Pago Extra:</label>
							<input class='form-control' type='text' name='importe4' placeholder='000€'/>
					</div>
			</div>

					<hr>
					<br>

			<div class='row form-group'>
					<div class='col-sm-12'>
						<p><strong>El jugador (y, en el caso de menores de 14 años, sus padres/representantes legales) autoriza/n, mediante el marcado de la casilla, a:</strong></p>
					</div>

					<label class='col-sm-2 control-label'></label>
					<div class='col-sm-10'>
							<input type='checkbox' ng-model='user.termsImage1' name='termsImage1' value='1' />
							La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.
					</div>

					<label class='col-sm-2 control-label'></label>
					<div class='col-sm-10'>
							<input type='checkbox' ng-model='user.termsImage2' name='termsImage2' value='1' />
							La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.
					</div>

					<label class='col-sm-2 control-label'></label>
					<div class='col-sm-10'>
							<input type='checkbox' ng-model='user.termsImage3' name='termsImage3' value='1' />
							La utilización de las imágenes para ilustrar las noticias remitidas a <a href='https://www.lacanyadacfs.com' target='_blank' >www.lacanyadacfs.com/</a>.
					</div>

					<label class='col-sm-2 control-label'></label>
					<div class='col-sm-10'>
							<input type='checkbox' ng-model='user.termsImage4' name='termsImage4' value='1' />
							La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como <a href='https://www.facebook.com/LaCanyadaCfs' target='_blank' >Facebook</a>, <a href='https://twitter.com/LaCanyadaCFS' target='_blank' >Twitter</a>, y <a href='https://www.youtube.com/user/LaCanyadaCFS?feature=mhee' target='_blank' >YouTube</a>.
					</div>
				</div>

					<br>

			<div class='row form-group'>
					<label class='col-sm-2 control-label' for='message'>Observaciones:</label>
						<div class='col-sm-10'>
								<textarea class='form-control' name='message' ng-model='user.message' cols='40' rows='6' ></textarea>
						</div>
			</div>

					<hr>
					<br>

			<button type='submit' class='btn btn-default'>enviar</button>

		</form>

	</div>
</div>

";

include("sidebar.php");
include("footer.php");
  }//-------------BIG-ENDIF------------------------------------
}

?>

<script>
$('#container .input-group.date').datepicker({
		language: "es"
});
</script>

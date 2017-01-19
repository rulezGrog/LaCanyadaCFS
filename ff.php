<?php include("header.php");

$seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '1147'";

$resultadoModal=mysql_query($seleccionaModal,$ilink) or die (mysql_error());
$filaModal = mysql_fetch_array($resultadoModal);

$nombretut = decrypt($filaModal['nom_tutor']); //isset OK OK
$apellidostut = decrypt($filaModal['ape_tutor']); //isset OK OK
$nombre = decrypt($filaModal['nombre']);
$apellidos = decrypt($filaModal['apellidos']);
$dni = decrypt($filaModal['dni']);
$birthdate = ($filaModal['birthdate']);
$telefono = decrypt($filaModal['tlf']);
$email = decrypt($filaModal['email']);
$via = ($filaModal['tipo_calle']);
$direccion = decrypt($filaModal['direccion']);
$poblacion = decrypt($filaModal['poblacion']);
$provincia = decrypt($filaModal['provincia']);
$cp = ($filaModal['cp']);
$mensaje = ($filaModal['mensaje']); //isset OK OK
$importe = ($filaModal['importe']);
$fraccionado = ($filaModal['fraccionada']);
$nombrecuenta = decrypt($filaModal['titular_cuenta']); //isset OK OK
$apecuenta = decrypt($filaModal['ape_cuenta']); //isset OK OK
$numcuenta = decrypt($filaModal['num_cuenta']); //isset OK OK
$categoria = ($filaModal['categoria']);
$temporada = ($filaModal['temporada']);

$lopd1 = ($filaModal['termsimage1']);
$lopd2 = ($filaModal['termsimage2']);
$lopd3 = ($filaModal['termsimage3']);
$lopd4 = ($filaModal['termsimage4']);


echo"
<div class='modal fade bs-example-modal-lg alto' id='editarModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog modal-lg' role='document'>
    <div class='modal-content' id='accordion'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>EDICIÓN DE DATOS DEL JUGADOR: \"<span class='text-uppercase'>$nombre $apellidos\"</span></h4>
      </div>
      <div class='modal-body'>
        <br>
        <h3 data-toggle='collapse' data-target='#panel1' class='modal-title flip' data-parent='#accordion' id='flip1'>Datos Personales:</h3>
          <div class='row form-group paneledit in' id='panel1'>
            <form accept-charset='utf-8'>
              <div class='form-group col-sm-5'>
                <label class='control-label' for='nombretut'>Nombre padre/madre/tutor:</label>
                <input type='text' class='form-control' id='nombretut' name='nombretut' placeholder='Introduzca nombre' value='<?php $nombretut ?>'>
              </div>
              <div class='form-group col-sm-7'>
                <label class='control-label' for='nombre'>Apellidos padre/madre/tutor:</label>
                <input type='text' class='form-control' id='apellidostut' name='apellidostut' placeholder='Introduzca los apellidos' value='$apellidostut'>
              </div>
              <div class='form-group col-sm-5'>
                <label class='control-label' for='nombre'>Nombre Jugador:</label>
                <input type='text' class='form-control' id='nombre' name='nombre' placeholder='Introduzca nombre' value='$nombre' required>
              </div>
              <div class='form-group col-sm-7'>
                <label class='control-label' for='apellidos'>Apellidos Jugador:</label>
                <input type='text' class='form-control' id='apellidos' name='apellidos' placeholder='Introduzca los apellidos' value='$apellidos' required>
              </div>

              <div class='form-group col-sm-3'>
                <label class='control-label' for='dni'>DNI:</label>
                <input type='text' class='form-control' id='dni' name='dni' placeholder='Introduzca DNI' value='$dni' required>
              </div>
              <div class='form-group col-sm-3' style='float:left !important;'>
                <label class='control-label' for='birthdate'>Fecha nacimiento:</label>
                <div class='input-group date'>
                  <input class='form-control' type='text' name='birthdate' class='readonly' value='$birthdate' required><span class='input-group-addon'><i class='glyphicon glyphicon-calendar' required></i></span>
                </div>
              </div>
              <div class='form-group col-sm-2'>
                <label class='control-label' for='telefono'>Teléfono:</label>
                <input type='tel' class='form-control' id='telefono' name='telefono' placeholder='612345678' value='$telefono' required>
              </div>
              <div class='form-group col-sm-4'>
                <label class='control-label' for='email'>eMail:</label>
                <input type='email' class='form-control' id='email' name='email' placeholder='Introduzca eMail' value='$email' required>
              </div>
              <br>
              <button type='submit' class='btn btn-warning float-right'>Enviar</button>
            </form>
            </div>	<!--row form-group#1-->

            <script>
              var jsnombretut ="; echo json_encode("$nombretut", JSON_HEX_TAG); echo"; //Don't forget the extra semicolon!
              document.getElementById('nombretut').value = jsnombretut;
            </script>
        <br>
        <h3 data-toggle='collapse' data-target='#panel2-$id' class='modal-title flip collapsed' data-parent='#accordion' id='flip2'>Dirección:</h3>
          <div class='row form-group paneledit collapse' id='panel2-$id'>
            <form>
            <div class='form-group col-sm-3'>
              <label class='control-label' for='via'>Tipo Vía:</label>
              <input type='text' class='form-control' id='via' name='via' placeholder='Calle / Avenida /...' value='$via' required>
            </div>
            <div class='form-group col-sm-9'>
              <label class='control-label' for='direccion'>Dirección:</label>
              <input type='txet' class='form-control' id='direccion' name='direccion' placeholder='Introduzca dirección' value='$direccion' required>
            </div>

            <div class='form-group col-sm-4'>
              <label class='control-label' for='poblacion'>Población:</label>
              <input type='text' class='form-control' id='poblacion' name='poblacion' placeholder='Población' value='$poblacion' required>
            </div>
            <div class='form-group col-sm-4'>
              <label class='control-label' for='provincia'>Provincia:</label>
              <input type='text' class='form-control' id='provincia' name='provincia' placeholder='Provincia' value='$provincia' required>
            </div>
            <div class='form-group col-sm-4'>
              <label class='control-label' for='cp'>Código Postal:</label>
              <input type='text' class='form-control' id='cp' name='cp' placeholder='Código postal' value='$cp' required>
            </div>
            <br>
            <button type='submit' class='btn btn-warning  float-right'>Enviar</button>
          </form>
          </div>	<!--row form-group#2-->

          <br>
          <h3 data-toggle='collapse' data-target='#panel3-$id' class='modal-title flip collapsed' data-parent='#accordion' id='flip3'>Datos bancarios:</h3>
            <div class='row form-group paneledit collapse' id='panel3-$id'>
            <form>
            <div class='col-sm-12' style='margin-bottom:10px;'>
              <label class='col-sm-2 control-label no-padding-left' for='fracc'>¿Pago Fraccionado?</label>
              <div class='col-sm-10'>
                  <label class='radio-inline'>
                      <input type='radio' name='fracc' value='1'"; if ($fraccionado == '1') {echo" checked='true'"; } echo" />Sí
                  </label>
                  <label class='radio-inline'>
                      <input type='radio' name='fracc' value='0'"; if ($fraccionado == '0') {echo" checked"; } echo" />No
                  </label>
              </div>
            </div>

            <div id='siFracc' class='oculto'>
              <div ng-show='user.fracc'>
                  <div class='row form-group col-sm-12'>
                      <label class='col-sm-2 control-label' for='bancname'>Titular de la cuenta bancaria</label>
                      <div class='col-sm-4'>
                          <input class='form-control' type='text' name='bancname' ng-model='user.bancname' value='$nombrecuenta' placeholder='Nombre titular cuenta' />
                      </div>
                      <div class='col-sm-6'>
                          <input class='form-control' type='text' name='bancsurname' ng-model='user.bancsurname' value='$apecuenta' placeholder='Apellidos titular cuenta' />
                      </div>
                  </div>
                  <div class='row form-group col-sm-12'>
                      <label class='col-sm-4 control-label' for='bancnum'>Número de cuenta bancaria</label>
                      <div class='col-sm-8 no-padding-left'>
                          <input class='form-control' id='cuentaV' type='text' name='bancnum' ng-model='user.bancnum' value='$numcuenta' placeholder='AA0000000000000000000000'/>
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
          <br>
            <button type='submit' class='btn btn-warning float-right'>Enviar</button>
          </form>
          </div>	<!--row form-group#3-->

            <br>
            <h3 data-toggle='collapse' data-target='#panel4-$id' class='modal-title flip collapsed' id='flip4'>Ley Orgánica de protección de datos:</h3>
              <div class='row form-group paneledit collapse' id='panel4-$id'>
                <form>
                <div class='col-sm-12'>
                  <p><strong>El jugador (y, en el caso de menores de 14 años, sus padres/representantes legales) autoriza/n, mediante el marcado de la casilla, a:</strong></p>
                </div>

                <label class='col-sm-2 control-label'></label>
                <div class='col-sm-10'>
                    <input type='checkbox' ng-model='user.termsImage1' name='termsImage1' value='1' "; if ($lopd1 == '1') {echo" checked"; } echo" />
                    La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.
                </div>

                <label class='col-sm-2 control-label'></label>
                <div class='col-sm-10'>
                    <input type='checkbox' ng-model='user.termsImage2' name='termsImage2' value='1' "; if ($lopd2 == '1') {echo" checked"; } echo" />
                    La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.
                </div>

                <label class='col-sm-2 control-label'></label>
                <div class='col-sm-10'>
                    <input type='checkbox' ng-model='user.termsImage3' name='termsImage3' value='1' "; if ($lopd3 == '1') {echo" checked"; } echo" />
                    La utilización de las imágenes para ilustrar las noticias remitidas a <a href='https://www.lacanyadacfs.com' target='_blank' >www.lacanyadacfs.com/</a>.
                </div>

                <label class='col-sm-2 control-label'></label>
                <div class='col-sm-10'>
                    <input type='checkbox' ng-model='user.termsImage4' name='termsImage4' value='1' "; if ($lopd4 == '1') {echo" checked"; } echo" />
                    La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como <a href='https://www.facebook.com/LaCanyadaCfs' target='_blank' >Facebook</a>, <a href='https://twitter.com/LaCanyadaCFS' target='_blank' >Twitter</a>, y <a href='https://www.youtube.com/user/LaCanyadaCFS?feature=mhee' target='_blank' >YouTube</a>.
                </div>
                <br>
                <button type='submit' class='btn btn-warning float-right'>Enviar</button>
              </form>
            </div>

      <br>
      <br>

      <div class='modal-footer'>
          <button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>CERRAR</button>
      </div>




      </div>	<!--modal-body-->
    </div>	<!--modal-content-->
  </div>
</div>

<div class='modal fade bs-example-modal-lg alto' id='infoModal-$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog modal-lg' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>INFORMACIÓN DEL JUGADOR</h4>
      </div>
      <div class='modal-body'>
          <div class='modalInfoPlayerHead'>
            <div style='min-height: 170px;'>
              <img style='float:left;' class='modalFotoPlayer' src='img/avatars/zoidberg.png' alt='' />
              <h2>$nombre $apellidos</h2>
              <div class='infoPlayerLeft'>
                  <p><strong>Fecha de nacimiento: </strong>"; echo strftime('%d de %B de %Y', strtotime($birthdate)); echo"</p>
                  <p><strong>Categoría</strong>: $categoria</p>
                  <p><strong>DNI</strong>: $dni</p>
              </div>
              <div class='infoPlayerRight'>";
                  if ($filaModal['nom_tutor'] != "") {
                    echo"<p><strong>Padre/Madre/Tutor:</strong> $nombretut $apellidostut</p>";
                  };
                  echo"
                  <p><strong>Teléfono</strong>: $telefono</p>
                  <p><strong>@eMail</strong>: $email</p>
              </div>
            </div>
              <div class=''>
                <p><strong>Dirección:</strong> $via $direccion - $cp, $poblacion, $provincia</p>";
                    if ($filaModal['mensaje'] != "") {
                      echo"
                      <button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseExample-$id' aria-expanded='false' aria-controls='collapseExample'>
                        Abrir Mensaje
                      </button>
                      <div class='collapse' id='collapseExample-$id'>
                        <div style='margin-top:10px;' class='well'>
                          <p>$mensaje</p>
                        </div>
                      </div>";
                    };

                    if($_SESSION['level'] == 1 or $_SESSION['level'] == 0)
                    {
                        if ($filaModal['titular_cuenta'] != "") {
                          echo"
                          <button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#banco-$id' aria-expanded='false' aria-controls='collapseExample'>
                            Mostrar datos bancarios
                          </button>
                          <div class='collapse' id='banco-$id'>
                            <div style='margin-top:10px;' class='well'>
                              <p><strong>Titular de la cuenta:</strong> $nombrecuenta $apecuenta</p>
                              <p><strong>Número de cuenta:</strong> $numcuenta</p>
                            </div>
                          </div>";
                        };
                    };
                    echo"
              </div>
          </div>
      </div>
      <div class='modal-footer'>
          <button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>CERRAR</button>
      </div>
    </div>
  </div>
</div>

<div class='modal fade bs-example-modal-sm' id='bajaModal-$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  <div class='modal-dialog' role='document'>
    <div class='modal-content'>
      <div class='modal-header'>
        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
        <h4 class='modal-title' id='myModalLabel'>¿Estás seguro de eliminar al Jugador? $nombre $apellidos</h4>
      </div>
      <div class='modal-body'>
        <p>Esta acción <strong>NO</strong> tendrá vuelta atrás y los datos borrados no podrán ser recuperados, aún así, ¿estas seguro de querer borrar al jugador?</p>
      </div>
      <div class='modal-footer'>
          <button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>NO</button>
          <a type='button' class='btn btn-danger btn-sm' href='bajaplayer.php?id=$id'>SI</a>
      </div>
    </div>
  </div>
</div>
";

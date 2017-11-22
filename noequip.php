<?php  include("header.php");


$selecciona2= "SELECT * FROM admins";
$resultado2=mysql_query($selecciona2, $ilink) or die(mysql_error());
$numfilas = mysql_num_rows($resultado2); // obtenemos el número de filas


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {

        //---------------------CREACION DE ARCHIVO A EXPORTAR---------------------//

                    $nombrearchivo = './tmp/noequipados.csv';

        if (file_exists($nombrearchivo)) {
            unlink("./tmp/noequipados.csv");
        }

                    // header('Content-Type: text/csv; charset=utf-8');
                    // header('Content-Disposition: attachment; filename=./tmp/noequipados.csv');

                    $fp = fopen('./tmp/noequipados.csv', 'w');

                    // output the column headings
                    $headerarray = array('Nombre;Apellidos;DNI;Telefono;Categoria');

        fputcsv($fp, $headerarray);

        $selectexport = "SELECT nombre,apellidos,dni,tlf,categoria  FROM jugadores WHERE equipacion='SI'";

        $export = mysql_query($selectexport) or die("Sql error : " . mysql_error());

                    // loop over the rows, outputting them
                    while ($headerarray = mysql_fetch_assoc($export)) {
                        $headerarray['nombre'] = decrypt($headerarray['nombre']);
                        $headerarray['apellidos'] = decrypt($headerarray['apellidos']);
                        $headerarray['dni'] = decrypt($headerarray['dni']);
                        $headerarray['tlf'] = decrypt($headerarray['tlf']);
                        $headerarray = array_map("utf8_decode", $headerarray);
                        fputcsv($fp, $headerarray, ';');
                    }
        fclose($fp);

//-----------------------------------------//


        echo'
        <div class="headTitle">
            <span class="headTitleText"><h2> > JUGADORES SIN EQUIPACIÓN </h2></span>
        </div>
        <div class="container">';

        if (isset($_SESSION["equipOK"]) && ($_SESSION["equipOK"]) == 1) {
            echo'<div class="alert alert-info"><strong>Se ha equipado correctamente al Jugador.</strong></div>';
            $_SESSION["equipOK"] = 0;
        }
        if (isset($_SESSION["equip2OK"]) && ($_SESSION["equip2OK"]) == 1) {
            echo'<div class="alert alert-info"><strong>Se han equipado correctamente a los jugadores selecionados.</strong></div>';
            $_SESSION["equip2OK"] = 0;
        }


        $seleccionaEquip = "SELECT * FROM jugadores WHERE equipacion = 'SI'";
        $resultadoEquip = mysql_query($seleccionaEquip, $ilink) or die(mysql_error());
        $numfilasEquip = mysql_num_rows($resultadoEquip); // obtenemos el número de filas

        if ($numfilasEquip < 1) {
            echo'<br /><div class="alert alert-warning text-center"><strong>TODOS LOS JUGADORES DE TODAS LAS CATEORIAS POSEEN EQUIPACION.</strong></div>
            </div> <!-- container -->';
        } else {

            $numPre = '1';

            echo"
							<div class='table-responsive'>
							 <table class='table table-striped'>
							   <thead>
							   <tr>
                   <th class='celdaNumJugador'>#</th>
							     <th>Nombre</th>
							     <th>Apellidos</th>
							     <th>Categoría</th>";
            if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                echo "
									 <th> </th>
                   <script type='text/javascript'>
                    $('document').ready(function(){
                      $('#checkTodos').change(function () {
                        $('input:checkbox').prop('checked', $(this).prop('checked'));
                       });
                    });
                   </script>
   								 <th><label><input value='NO' type='checkbox' id='checkTodos'/></label></th>";
            };
            echo"
							   </tr>
							   </thead>
							   <tbody>";

            while ($filaEquip = mysql_fetch_array($resultadoEquip)) {
                $nombreEquip = decrypt($filaEquip['nombre']);
                $apellidoEquip = decrypt($filaEquip['apellidos']);
                $categoriaEquip = ($filaEquip['categoria']);
                $numpedido = ($filaEquip['pedido']);
                $arraypedidos [] = $numpedido;
                echo"
											<tr>
                        <td class='celdaNumJugador'><span class='numJugador'>";
                        echo $numPre;
                        $numPre = $numPre + 1;
                        echo"</span></td>
									      <td>$nombreEquip</td>
									      <td>$apellidoEquip</td>
									      <td>$categoriaEquip</td>";
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
												<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#equipModal-$numpedido'><a href='#'>EQUIPAR</a></button></td>
                        <td><input class='form-check-input' type='checkbox' value='$numpedido' name='equipar' id='equipar'></td>";
                }
                echo"
											</tr>";
            };
            echo"
							  </tbody>
							 </table>
							</div>

              <div>
                <a type='button' class='btn btn-info pull-right' name='equiparfullequip' style='margin-left: 10px;' href='javascript:;' onclick='enviarValorToForm();' role='button' data-toggle='modal' data-target='#fullequipModal'><b>EQUIPAR SELECIONADOS</b></a>
  							<a type='button' class='btn btn-warning pull-right' name='exportarequip' href='tmp/noequipados.csv'><b>EXPORTAR</b></a>
              </div>

              <script type='text/javascript'>
              function enviarValorToForm() {
                var selected = new Array();
                $(document).ready(function() {
                  $('input:checkbox:checked').each(function() {
                    if ($(this).val() == 'NO') {                      
                    } else {
                      selected.push($(this).val());
                      document.getElementById('imputer').value=selected;
                    }

                  });

                });
              }

              var form = document.getElementById('formulario');
              document.getElementById('submitBut').addEventListener('click', function () {
                form.submit();
              });
              </script>

							</div>

              <div class='modal fade bs-example-modal-sm' id='fullequipModal' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
  						  <div class='modal-dialog' role='document'>
  						    <div class='modal-content'>
  						      <div class='modal-header'>
  						        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
  						        <h4 class='modal-title' id='myModalLabel'>Equipar jugadores seleccionados</h4>
  						      </div>
  									<div class='modal-body'>
  						        <p>Si continuas con la acción marcarás a todos los jugadores seleccionados jugador como \"Equipado\". Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
  										se podrá volver a poner como \"No Equipado\" editando al jugador en la lista de jugadores.</p>
  						      </div>
  						      <div class='modal-footer'>
                        <form action='operaciones.php?oper=fullequip' id='formulario' method='post' name='formulario'>
                          <input class='invisible' name='imputer' id='imputer' type='text'/>
                          <button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
                          <button id='submitBut' class='btn btn-success btn-sm'>EQUIPAR SELECCIONADOS</button>
                        </fomr>
  						      </div>
  						    </div>
  						  </div>
  						</div>
              ";

              foreach ($arraypedidos as $id) {
                  echo"
      						<div class='modal fade bs-example-modal-sm' id='equipModal-$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      						  <div class='modal-dialog' role='document'>
      						    <div class='modal-content'>
      						      <div class='modal-header'>
      						        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
      						        <h4 class='modal-title' id='myModalLabel'>Equipar jugador</h4>
      						      </div>
      									<div class='modal-body'>
      						        <p>Si continuas con la acción marcarás al jugador como \"Equipado\". Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
      										se podrá volver a poner como \"No Equipado\" editando al jugador en la lista de jugadores.</p>
      						      </div>
      						      <div class='modal-footer'>
      						        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
      							        <a type='button' class='btn btn-success btn-sm' href='operaciones.php?oper=equip&id=$id'>EQUIPAR</a>
      						      </div>
      						    </div>
      						  </div>
      						</div>";
              }
        }


        include("sidebar.php");
        include("footer.php");
    }//------------BIG-ENDIF--------------------------------
}

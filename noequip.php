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


        echo'<div class="container">';

        if ($_SESSION["delOK"] == 1) {
            echo'<div class="alert alert-info"><strong>Se ha equipado correctamente al Jugador.</strong></div>';
            $_SESSION["delOK"] = 0;
        }

        $seleccionaEquip = "SELECT * FROM jugadores WHERE equipacion = 'SI'";
        $resultadoEquip = mysql_query($seleccionaEquip, $ilink) or die(mysql_error());
        $numfilasEquip = mysql_num_rows($resultadoEquip); // obtenemos el número de filas

        if ($numfilasEquip < 1) {
            echo'<br /><div class="alert alert-succes"><strong>TODOS LOS JUGADORES DE TODAS LAS CATEORIAS POSEEN EQUIPACION.</strong></div>';
        } else {
            echo"
							<br />


							<h1 class='text-center'>JUGADORES SIN EQUIPACIÓN</h1>

							<br />

							<div class='table-responsive'>
							 <table class='table table-striped'>
							   <thead>
							   <tr>
							     <th>Nombre</th>
							     <th>Apellidos</th>
							     <th>Categoría</th>";
            if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                echo "
									 <th> </th>";
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
									      <td>$nombreEquip</td>
									      <td>$apellidoEquip</td>
									      <td>$categoriaEquip</td>";
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
												<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#equipModal-$numpedido'><a href='#'>EQUIPAR</a></button></td>";
                }
                echo"
											</tr>";
            };
            echo"
							  </tbody>
							 </table>
							</div>

							<a type='button' class='btn btn-warning pull-right' name='exportarequip' href='tmp/noequipados.csv'><b>EXPORTAR</b></a>

							</div>";
        }

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
							        <a type='button' class='btn btn-success btn-sm' href='equipar.php?id=$id'>EQUIPAR</a>
						      </div>
						    </div>
						  </div>
						</div>";
        }

        include("sidebar.php");
        include("footer.php");
    }//------------BIG-ENDIF--------------------------------
}

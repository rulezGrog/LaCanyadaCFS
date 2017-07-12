<?php  include("header.php");

if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {

        //---------------------CREACION DE ARCHIVOs A EXPORTAR---------------------//

        $nombrearchivo1 = './tmp/primer_plazo.csv';
        $nombrearchivo2 = './tmp/segundo_plazo.csv';
        $nombrearchivo3 = './tmp/tercer_plazo.csv';
        $nombrearchivo4 = './tmp/cuarto_plazo.csv';
        $nombrearchivo5 = './tmp/quinto_plazo.csv';
        $nombrearchivoExtra = './tmp/plazo_extra.csv';

        if (file_exists($nombrearchivo1)) {
            unlink("./tmp/primer_plazo.csv");
        }
        if (file_exists($nombrearchivo2)) {
            unlink("./tmp/segundo_plazo.csv");
        }
        if (file_exists($nombrearchivo3)) {
            unlink("./tmp/tercer_plazo.csv");
        }
        if (file_exists($nombrearchivo4)) {
            unlink("./tmp/cuarto_plazo.csv");
        }
        if (file_exists($nombrearchivo5)) {
            unlink("./tmp/quinto_plazo.csv");
        }
        if (file_exists($nombrearchivoExtra)) {
            unlink("./tmp/plazo_extra.csv");
        }
                    // header('Content-Type: text/csv; charset=utf-8');
                    // header('Content-Disposition: attachment; filename=./tmp/noequipados.csv');

                    $fp1 = fopen('./tmp/primer_plazo.csv', 'w');

                    // output the column headings
                    $headerarray1 = array('Nombre;Apellidos;DNI;Telefono;Categoria;Cuantia;NombreTitularCuenta;ApellidosTitularCuenta;NumeroDeCuenta');

        fputcsv($fp1, $headerarray1);

        $selectexport1 = "SELECT nombre,apellidos,dni,tlf,categoria,primerpago,titular_cuenta,ape_cuenta,num_cuenta  FROM jugadores WHERE primerpago <> 0";

        $export1 = mysql_query($selectexport1) or die("Sql error : " . mysql_error());

                    // loop over the rows, outputting them
                    while ($headerarray1 = mysql_fetch_assoc($export1)) {
                        $headerarray1['nombre'] = decrypt($headerarray1['nombre']);
                        $headerarray1['apellidos'] = decrypt($headerarray1['apellidos']);
                        $headerarray1['dni'] = decrypt($headerarray1['dni']);
                        $headerarray1['tlf'] = decrypt($headerarray1['tlf']);
                        $headerarray1['titular_cuenta'] = decrypt($headerarray1['titular_cuenta']);
                        $headerarray1['ape_cuenta'] = decrypt($headerarray1['ape_cuenta']);
                        $headerarray1['num_cuenta'] = decrypt($headerarray1['num_cuenta']);
                        $headerarray1 = array_map("utf8_decode", $headerarray1);
                        fputcsv($fp1, $headerarray1, ';');
                    }
        fclose($fp1);

                    //------OTRO------//

                    $fp2 = fopen('./tmp/segundo_plazo.csv', 'w');

                    // output the column headings
                    $headerarray2 = array('Nombre;Apellidos;DNI;Telefono;Categoria;Cuantia;NombreTitularCuenta;ApellidosTitularCuenta;NumeroDeCuenta');

        fputcsv($fp2, $headerarray2);

        $selectexport2 = "SELECT nombre,apellidos,dni,tlf,categoria,segundopago,titular_cuenta,ape_cuenta,num_cuenta  FROM jugadores WHERE segundopago <> 0";

        $export2 = mysql_query($selectexport2) or die("Sql error : " . mysql_error());

                    // loop over the rows, outputting them
                    while ($headerarray2 = mysql_fetch_assoc($export2)) {
                        $headerarray2['nombre'] = decrypt($headerarray2['nombre']);
                        $headerarray2['apellidos'] = decrypt($headerarray2['apellidos']);
                        $headerarray2['dni'] = decrypt($headerarray2['dni']);
                        $headerarray2['tlf'] = decrypt($headerarray2['tlf']);
                        $headerarray2['titular_cuenta'] = decrypt($headerarray2['titular_cuenta']);
                        $headerarray2['ape_cuenta'] = decrypt($headerarray2['ape_cuenta']);
                        $headerarray2['num_cuenta'] = decrypt($headerarray2['num_cuenta']);
                        $headerarray2 = array_map("utf8_decode", $headerarray2);
                        fputcsv($fp2, $headerarray2, ';');
                    }
        fclose($fp2);

                    //------OTRO------//

                    $fp3 = fopen('./tmp/tercer_plazo.csv', 'w');

                    // output the column headings
                    $headerarray3 = array('Nombre;Apellidos;DNI;Telefono;Categoria;Cuantia;NombreTitularCuenta;ApellidosTitularCuenta;NumeroDeCuenta');

        fputcsv($fp3, $headerarray3);

        $selectexport3 = "SELECT nombre,apellidos,dni,tlf,categoria,tercerpago,titular_cuenta,ape_cuenta,num_cuenta  FROM jugadores WHERE tercerpago <> 0";

        $export3 = mysql_query($selectexport3) or die("Sql error : " . mysql_error());

                    // loop over the rows, outputting them
                    while ($headerarray3 = mysql_fetch_assoc($export3)) {
                        $headerarray3['nombre'] = decrypt($headerarray3['nombre']);
                        $headerarray3['apellidos'] = decrypt($headerarray3['apellidos']);
                        $headerarray3['dni'] = decrypt($headerarray3['dni']);
                        $headerarray3['tlf'] = decrypt($headerarray3['tlf']);
                        $headerarray3['titular_cuenta'] = decrypt($headerarray3['titular_cuenta']);
                        $headerarray3['ape_cuenta'] = decrypt($headerarray3['ape_cuenta']);
                        $headerarray3['num_cuenta'] = decrypt($headerarray3['num_cuenta']);
                        $headerarray3 = array_map("utf8_decode", $headerarray3);
                        fputcsv($fp3, $headerarray3, ';');
                    }
        fclose($fp3);

                    //------OTRO------//

                    $fp4 = fopen('./tmp/cuarto_plazo.csv', 'w');

                    // output the column headings
                    $headerarray4 = array('Nombre;Apellidos;DNI;Telefono;Categoria;Cuantia;NombreTitularCuenta;ApellidosTitularCuenta;NumeroDeCuenta');

                    fputcsv($fp4, $headerarray4);

                    $selectexport4 = "SELECT nombre,apellidos,dni,tlf,categoria,segundopago,titular_cuenta,ape_cuenta,num_cuenta  FROM jugadores WHERE cuartopago <> 0";

                    $export4 = mysql_query($selectexport4) or die("Sql error : " . mysql_error());

                    // loop over the rows, outputting them
                    while ($headerarray4 = mysql_fetch_assoc($export4)) {
                        $headerarray4['nombre'] = decrypt($headerarray4['nombre']);
                        $headerarray4['apellidos'] = decrypt($headerarray4['apellidos']);
                        $headerarray4['dni'] = decrypt($headerarray4['dni']);
                        $headerarray4['tlf'] = decrypt($headerarray4['tlf']);
                        $headerarray4['titular_cuenta'] = decrypt($headerarray4['titular_cuenta']);
                        $headerarray4['ape_cuenta'] = decrypt($headerarray4['ape_cuenta']);
                        $headerarray4['num_cuenta'] = decrypt($headerarray4['num_cuenta']);
                        $headerarray4 = array_map("utf8_decode", $headerarray4);
                        fputcsv($fp4, $headerarray4, ';');
                    }
                    fclose($fp4);

                    //------OTRO------//
                    $fp5 = fopen('./tmp/quinto_plazo.csv', 'w');

                    // output the column headings
                    $headerarray5 = array('Nombre;Apellidos;DNI;Telefono;Categoria;Cuantia;NombreTitularCuenta;ApellidosTitularCuenta;NumeroDeCuenta');

                    fputcsv($fp5, $headerarray5);

                    $selectexport5 = "SELECT nombre,apellidos,dni,tlf,categoria,segundopago,titular_cuenta,ape_cuenta,num_cuenta  FROM jugadores WHERE quintopago <> 0";

                    $export5 = mysql_query($selectexport5) or die("Sql error : " . mysql_error());

                    // loop over the rows, outputting them
                    while ($headerarray5 = mysql_fetch_assoc($export5)) {
                        $headerarray5['nombre'] = decrypt($headerarray5['nombre']);
                        $headerarray5['apellidos'] = decrypt($headerarray5['apellidos']);
                        $headerarray5['dni'] = decrypt($headerarray5['dni']);
                        $headerarray5['tlf'] = decrypt($headerarray5['tlf']);
                        $headerarray5['titular_cuenta'] = decrypt($headerarray5['titular_cuenta']);
                        $headerarray5['ape_cuenta'] = decrypt($headerarray5['ape_cuenta']);
                        $headerarray5['num_cuenta'] = decrypt($headerarray5['num_cuenta']);
                        $headerarray5 = array_map("utf8_decode", $headerarray5);
                        fputcsv($fp5, $headerarray5, ';');
                    }
                    fclose($fp5);

                    //------OTRO------//


                    $fpExtra = fopen('./tmp/plazo_extra.csv', 'w');

                    // output the column headings
                    $headerarrayExtra = array('Nombre;Apellidos;DNI;Telefono;Categoria;Cuantia;NombreTitularCuenta;ApellidosTitularCuenta;NumeroDeCuenta');

        fputcsv($fpExtra, $headerarrayExtra);

        $selectexportExtra = "SELECT nombre,apellidos,dni,tlf,categoria,pagoextra,titular_cuenta,ape_cuenta,num_cuenta  FROM jugadores WHERE pagoextra <> 0";

        $exportExtra = mysql_query($selectexportExtra) or die("Sql error : " . mysql_error());

                    // loop over the rows, outputting them
                    while ($headerarrayExtra = mysql_fetch_assoc($exportExtra)) {
                        $headerarrayExtra['nombre'] = decrypt($headerarrayExtra['nombre']);
                        $headerarrayExtra['apellidos'] = decrypt($headerarrayExtra['apellidos']);
                        $headerarrayExtra['dni'] = decrypt($headerarrayExtra['dni']);
                        $headerarrayExtra['tlf'] = decrypt($headerarrayExtra['tlf']);
                        $headerarrayExtra['titular_cuenta'] = decrypt($headerarrayExtra['titular_cuenta']);
                        $headerarrayExtra['ape_cuenta'] = decrypt($headerarrayExtra['ape_cuenta']);
                        $headerarrayExtra['num_cuenta'] = decrypt($headerarrayExtra['num_cuenta']);
                        $headerarrayExtra = array_map("utf8_decode", $headerarrayExtra);
                        fputcsv($fpExtra, $headerarrayExtra, ';');
                    }
        fclose($fpExtra);

//-----------------------------------------//


        //
        // $seleccionacobros = "SELECT * FROM jugadores WHERE primero <> 0 OR segundo <> 0 OR tercero <> 0 OR extra <> 0)";
        // $resultadocobros=mysql_query($seleccionacobros,$ilink) or die (mysql_error());
        // $numfilascobros = mysql_num_rows($resultadocobros); // obtenemos el número de filas
        // $filacobros = mysql_fetch_array($resultadocobros);
        //
        // $nombre = ($filacobros['nombre']);
        // $apellido = ($filacobros['apellidos']);
        // $numpedido = ($filacobros['pedido']);
        //
        // $primerpago = ($filacobros['primerpago']);
        // $segundopago = ($filacobros['segundopago']);
        // $tercerpago =  ($filacobros['tercerpago']);
        // $pagoextra =  ($filacobros['pagoextra']);


    echo '
<div class="headTitle">
  <span class="headTitleText"><h2> > COBROS POR REALIZAR </h2></span>
</div>
<div class="container">';

        if ($_SESSION["pagaOK"] == 1) {
            echo'<div class="alert alert-info"><strong>Se ha actualizado el cobro pendiente correctamente.</strong></div>';
            $_SESSION["pagaOK"] = 0;
        }

        echo'
<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#primerPla">1er PLAZO</a></li>
  <li><a data-toggle="tab" href="#segunPla">2º PLAZO</a></li>
  <li><a data-toggle="tab" href="#tercerPla">3er PLAZO</a></li>
  <li><a data-toggle="tab" href="#cuartoPla">4º PLAZO</a></li>
  <li><a data-toggle="tab" href="#quintoPla">5º PLAZO</a></li>
  <li><a data-toggle="tab" href="#extraPla">PLAZO EXTRA</a></li>
  <!--<li><a data-toggle="tab" href="#todos">LISTADO COMPLETO</a></li>-->
</ul>

<div class="tab-content">
  <div id="primerPla" class="tab-pane fade in active">
    <h3>1er PLAZO</h3>';

        $seleccionacobros = "SELECT * FROM jugadores WHERE primerpago <> 0";
        $resultadocobros =mysql_query($seleccionacobros, $ilink) or die(mysql_error());
        $numfilascobros = mysql_num_rows($resultadocobros); // obtenemos el número de filas

        if ($numfilascobros < 1) {
            echo'<div class="alert alert-warning text-center"><strong>No existen jugadores pendientes de este pago.</strong></div>';
        } else {
            echo'
    <div class="table-responsive">
     <table class="table table-striped">
       <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Categoría</th>
         <th>Cuantía</th>
				 <th> </th>
       </tr>
       </thead>
       <tbody>';

            while ($filacobros = mysql_fetch_array($resultadocobros)) {
                $nombre = decrypt($filacobros['nombre']);
                $apellido = decrypt($filacobros['apellidos']);
                $numpedido = ($filacobros['pedido']);

                $primerpago = ($filacobros['primerpago']);
                $categoriapago = ($filacobros['categoria']);
                $arraypedidos1 [] = $numpedido;
                echo"
		        <tr>
		          <td>$nombre</td>
		          <td>$apellido</td>
		          <td>$categoriapago</td>
		          <td><b>$primerpago €</b></td>
							<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#pagarModal-$numpedido-primer'><a href='#'>PAGAR</a></button></td>
							<td><button type='button' class='btn btn-danger btn-xs' name='equiparbut' data-toggle='modal' data-target='#editarModal-$numpedido-primer'><a href='#'>EDITAR PAGO</a></button></td>
						</tr>";
            };
            echo'
			</tbody>
     </table>
    </div>

    <a type="button" class="btn btn-warning pull-right" name="exportarprimer" href="tmp/primer_plazo.csv"><b>EXPORTAR</b></a>';
        };
        echo'
  </div>
  <div id="segunPla" class="tab-pane fade">
    <h3>2º PLAZO</h3>';

        $seleccionacobros = "SELECT * FROM jugadores WHERE segundopago <> 0";
        $resultadocobros =mysql_query($seleccionacobros, $ilink) or die(mysql_error());
        $numfilascobros = mysql_num_rows($resultadocobros); // obtenemos el número de filas

        if ($numfilascobros < 1) {
            echo'<div class="alert alert-warning text-center"><strong>No existen jugadores pendientes de este pago.</strong></div>';
        } else {
            echo'
    <div class="table-responsive">
     <table class="table table-striped">
       <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Categoría</th>
         <th>Cuantía</th>
				 <th> </th>
       </tr>
       </thead>
       <tbody>';

            while ($filacobros = mysql_fetch_array($resultadocobros)) {
                $nombre = decrypt($filacobros['nombre']);
                $apellido = decrypt($filacobros['apellidos']);
                $numpedido = ($filacobros['pedido']);

                $primerpago = ($filacobros['segundopago']);
                $categoriapago = ($filacobros['categoria']);
                $arraypedidos2 [] = $numpedido;
                echo"
		        <tr>
		          <td>$nombre</td>
		          <td>$apellido</td>
		          <td>$categoriapago</td>
		          <td><b>$primerpago €</b></td>
							<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#pagarModal-$numpedido-segundo'><a href='#'>PAGAR</a></button></td>
							<td><button type='button' class='btn btn-danger btn-xs' name='equiparbut' data-toggle='modal' data-target='#editarModal-$numpedido-segundo'><a href='#'>EDITAR PAGO</a></button></td>
						</tr>";
            };
            echo'
			</tbody>
     </table>
    </div>

    <a type="button" class="btn btn-warning pull-right" name="exportarsegundo" href="tmp/segundo_plazo.csv"><b>EXPORTAR</b></a>';
        };
        echo'
  </div>


  <div id="tercerPla" class="tab-pane fade">
    <h3>3er PLAZO</h3>';

        $seleccionacobros = "SELECT * FROM jugadores WHERE tercerpago <> 0";
        $resultadocobros =mysql_query($seleccionacobros, $ilink) or die(mysql_error());
        $numfilascobros = mysql_num_rows($resultadocobros); // obtenemos el número de filas

        if ($numfilascobros < 1) {
            echo'<div class="alert alert-warning text-center"><strong>No existen jugadores pendientes de este pago.</strong></div>';
        } else {
            echo'
    <div class="table-responsive">
     <table class="table table-striped">
       <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Categoría</th>
         <th>Cuantía</th>
				 <th> </th>
       </tr>
       </thead>
       <tbody>';

            while ($filacobros = mysql_fetch_array($resultadocobros)) {
                $nombre = decrypt($filacobros['nombre']);
                $apellido = decrypt($filacobros['apellidos']);
                $numpedido = ($filacobros['pedido']);
                $primerpago = ($filacobros['tercerpago']);
                $categoriapago = ($filacobros['categoria']);
                $arraypedidos3 [] = $numpedido;
                echo"
		        <tr>
		          <td>$nombre</td>
		          <td>$apellido</td>
		          <td>$categoriapago</td>
		          <td><b>$primerpago €</b></td>
							<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#pagarModal-$numpedido-tercer'><a href='#'>PAGAR</a></button></td>
							<td><button type='button' class='btn btn-danger btn-xs' name='equiparbut' data-toggle='modal' data-target='#editarModal-$numpedido-tercer'><a href='#'>EDITAR PAGO</a></button></td>
						</tr>";
            };
            echo'
			</tbody>
     </table>
    </div>

    <a type="button" class="btn btn-warning pull-right" name="exportartercer" href="tmp/tercer_plazo.csv"><b>EXPORTAR</b></a>';
        };
        echo'
  </div>

  <div id="cuartoPla" class="tab-pane fade">
    <h3>4º PLAZO</h3>';

        $seleccionacobros = "SELECT * FROM jugadores WHERE cuartopago <> 0";
        $resultadocobros =mysql_query($seleccionacobros, $ilink) or die(mysql_error());
        $numfilascobros = mysql_num_rows($resultadocobros); // obtenemos el número de filas

        if ($numfilascobros < 1) {
            echo'<div class="alert alert-warning text-center"><strong>No existen jugadores pendientes de este pago.</strong></div>';
        } else {
            echo'
    <div class="table-responsive">
     <table class="table table-striped">
       <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Categoría</th>
         <th>Cuantía</th>
				 <th> </th>
       </tr>
       </thead>
       <tbody>';

            while ($filacobros = mysql_fetch_array($resultadocobros)) {
                $nombre = decrypt($filacobros['nombre']);
                $apellido = decrypt($filacobros['apellidos']);
                $numpedido = ($filacobros['pedido']);
                $primerpago = ($filacobros['cuartopago']);
                $categoriapago = ($filacobros['categoria']);
                $arraypedidos4 [] = $numpedido;
                echo"
		        <tr>
		          <td>$nombre</td>
		          <td>$apellido</td>
		          <td>$categoriapago</td>
		          <td><b>$primerpago €</b></td>
							<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#pagarModal-$numpedido-cuarto'><a href='#'>PAGAR</a></button></td>
							<td><button type='button' class='btn btn-danger btn-xs' name='equiparbut' data-toggle='modal' data-target='#editarModal-$numpedido-cuarto'><a href='#'>EDITAR PAGO</a></button></td>
						</tr>";
            };
            echo'
			</tbody>
     </table>
    </div>

    <a type="button" class="btn btn-warning pull-right" name="exportartercer" href="tmp/cuarto_plazo.csv"><b>EXPORTAR</b></a>';
        };
        echo'
  </div>

  <div id="quintoPla" class="tab-pane fade">
    <h3>5º PLAZO</h3>';

        $seleccionacobros = "SELECT * FROM jugadores WHERE quintopago <> 0";
        $resultadocobros =mysql_query($seleccionacobros, $ilink) or die(mysql_error());
        $numfilascobros = mysql_num_rows($resultadocobros); // obtenemos el número de filas

        if ($numfilascobros < 1) {
            echo'<div class="alert alert-warning text-center"><strong>No existen jugadores pendientes de este pago.</strong></div>';
        } else {
            echo'
    <div class="table-responsive">
     <table class="table table-striped">
       <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Categoría</th>
         <th>Cuantía</th>
				 <th> </th>
       </tr>
       </thead>
       <tbody>';

            while ($filacobros = mysql_fetch_array($resultadocobros)) {
                $nombre = decrypt($filacobros['nombre']);
                $apellido = decrypt($filacobros['apellidos']);
                $numpedido = ($filacobros['pedido']);
                $primerpago = ($filacobros['quintopago']);
                $categoriapago = ($filacobros['categoria']);
                $arraypedidos5 [] = $numpedido;
                echo"
		        <tr>
		          <td>$nombre</td>
		          <td>$apellido</td>
		          <td>$categoriapago</td>
		          <td><b>$primerpago €</b></td>
							<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#pagarModal-$numpedido-quinto'><a href='#'>PAGAR</a></button></td>
							<td><button type='button' class='btn btn-danger btn-xs' name='equiparbut' data-toggle='modal' data-target='#editarModal-$numpedido-quinto'><a href='#'>EDITAR PAGO</a></button></td>
						</tr>";
            };
            echo'
			</tbody>
     </table>
    </div>

    <a type="button" class="btn btn-warning pull-right" name="exportartercer" href="tmp/quinto_plazo.csv"><b>EXPORTAR</b></a>';
        };
        echo'
  </div>

	<div id="extraPla" class="tab-pane fade">
    <h3>PLAZO EXTRA</h3>';

        $seleccionacobros = "SELECT * FROM jugadores WHERE pagoextra <> 0";
        $resultadocobros =mysql_query($seleccionacobros, $ilink) or die(mysql_error());
        $numfilascobros = mysql_num_rows($resultadocobros); // obtenemos el número de filas

        if ($numfilascobros < 1) {
            echo'<div class="alert alert-warning text-center"><strong>No existen jugadores pendientes de este pago.</strong></div>';
        } else {
            echo'
    <div class="table-responsive">
     <table class="table table-striped">
       <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Categoría</th>
         <th>Cuantía</th>
				 <th> </th>
       </tr>
       </thead>
       <tbody>';

            while ($filacobros = mysql_fetch_array($resultadocobros)) {
                $nombre = decrypt($filacobros['nombre']);
                $apellido = decrypt($filacobros['apellidos']);
                $numpedido = ($filacobros['pedido']);
                $primerpago = ($filacobros['pagoextra']);
                $categoriapago = ($filacobros['categoria']);
                $arraypedidosExtra [] = $numpedido;
                echo"
		        <tr>
		          <td>$nombre</td>
		          <td>$apellido</td>
		          <td>$categoriapago</td>
		          <td><b>$primerpago €</b></td>
							<td><button type='button' class='btn btn-success btn-xs' name='equiparbut' data-toggle='modal' data-target='#pagarModal-$numpedido-extra'><a href='#'>PAGAR</a></button></td>
							<td><button type='button' class='btn btn-danger btn-xs' name='equiparbut' data-toggle='modal' data-target='#editarModal-$numpedido-extra'><a href='#'>EDITAR PAGO</a></button></td>
						</tr>";
            };
            echo'
			</tbody>
     </table>
    </div>

    <a type="button" class="btn btn-warning pull-right" name="exportarextra" href="tmp/plazo_extra.csv"><b>EXPORTAR</a></b>';
        };
        echo'
  </div>

	<div id="todos" class="tab-pane fade">
    <h3>TODOS LOS JUGADORES CON PAGOS PENDIENTES</h3>
    <p> </p>
  </div>


</div>

</div>';
        if (isset($arraypedidos1)) {
            foreach ($arraypedidos1 as $id) {
                $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '$id'";
                $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
                $filaModal = mysql_fetch_array($resultadoModal);

                $nombre = decrypt($filaModal['nombre']);
                $apellidos = decrypt($filaModal['apellidos']);
                $categoria = ($filaModal['categoria']);
                $temporada = ($filaModal['temporada']);

                $cuantia = ($filaModal['primerpago']);

                echo"
	<div class='modal fade bs-example-modal-sm' id='pagarModal-$id-primer' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Pagar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
				<p>Si continuas con la acción <b>marcarás el primer pago de este jugador como cobrado</b>. Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
				se podrá volver a poner como primer pago la cuantía deseada editando al jugador en la lista de jugadores.</p>
	      </div>
	      <div class='modal-footer'>
	        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
		        <a type='button' class='btn btn-success btn-sm' href='operaciones.php?id=$id&plazo=primerpago&oper=pagar'>PAGAR</a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class='modal fade bs-example-modal-sm' id='editarModal-$id-primer' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Editar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
					<div class='row'>
					<form class='form-inline' action='operaciones.php?id=$id&plazo=primerpago&oper=cambiarpago' method='post'>
						<div class='form-group col-md-offset-1'>
							<label for='nuevopago'><strong>Nueva cuantía:</strong></label>
							<input type='number' class='form-control' id='nuevopago' name='cuantia' placeholder='$cuantia'>
						</div>
						<button type='submit' class='btn btn-danger btn-sm'>CAMBIAR PAGO</button>
					</form>
					</div>
	      </div>
	      <div class='modal-footer'>
	      </div>
	    </div>
	  </div>
	</div>

	";
            }
        }

        if (isset($arraypedidos2)) {
            foreach ($arraypedidos2 as $id) {
                $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '$id'";
                $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
                $filaModal = mysql_fetch_array($resultadoModal);

                $nombre = decrypt($filaModal['nombre']);
                $apellidos = decrypt($filaModal['apellidos']);
                $categoria = ($filaModal['categoria']);
                $temporada = ($filaModal['temporada']);

                $cuantia = ($filaModal['segundopago']);
                echo"
	<div class='modal fade bs-example-modal-sm' id='pagarModal-$id-segundo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Pagar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
	        <p>Si continuas con la acción <b>marcarás el segundo pago de este jugador como cobrado</b>. Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
					se podrá volver a poner como segundo pago la cuantía deseada editando al jugador en la lista de jugadores.</p>
	      </div>
	      <div class='modal-footer'>
	        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
		        <a type='button' class='btn btn-success btn-sm' href='operaciones.php?id=$id&plazo=segundopago&oper=pagar'>PAGAR</a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class='modal fade bs-example-modal-sm' id='editarModal-$id-segundo' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Editar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
					<div class='row'>
					<form class='form-inline' action='operaciones.php?id=$id&plazo=segundopago&oper=cambiarpago' method='post'>
						<div class='form-group col-md-offset-1'>
							<label for='nuevopago'><strong>Nueva cuantía:</strong></label>
							<input type='number' class='form-control' id='nuevopago' name='cuantia' placeholder='$cuantia'>
						</div>
						<button type='submit' class='btn btn-danger btn-sm'>CAMBIAR PAGO</button>
					</form>
					</div>
	      </div>
	      <div class='modal-footer'>
	      </div>
	    </div>
	  </div>
	</div>

	";
            }
        }

        if (isset($arraypedidos3)) {
            foreach ($arraypedidos3 as $id) {
                $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '$id'";
                $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
                $filaModal = mysql_fetch_array($resultadoModal);

                $nombre = decrypt($filaModal['nombre']);
                $apellidos = decrypt($filaModal['apellidos']);
                $categoria = ($filaModal['categoria']);
                $temporada = ($filaModal['temporada']);

                $cuantia = ($filaModal['tercerpago']);
                echo"
	<div class='modal fade bs-example-modal-sm' id='pagarModal-$id-tercer' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Pagar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
				<p>Si continuas con la acción <b>marcarás el tercer pago de este jugador como cobrado</b>. Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
				se podrá volver a poner como tercer pago la cuantía deseada editando al jugador en la lista de jugadores.</p>
	      </div>
	      <div class='modal-footer'>
	        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
		        <a type='button' class='btn btn-success btn-sm' href='operaciones.php?id=$id&plazo=tercerpago&oper=pagar'>PAGAR</a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class='modal fade bs-example-modal-sm' id='editarModal-$id-tercer' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Editar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
					<div class='row'>
					<form class='form-inline' action='operaciones.php?id=$id&plazo=tercerpago&oper=cambiarpago' method='post'>
						<div class='form-group col-md-offset-1'>
							<label for='nuevopago'><strong>Nueva cuantía:</strong></label>
							<input type='number' class='form-control' id='nuevopago' name='cuantia' placeholder='$cuantia'>
						</div>
						<button type='submit' class='btn btn-danger btn-sm'>CAMBIAR PAGO</button>
					</form>
					</div>
	      </div>
	      <div class='modal-footer'>
	      </div>
	    </div>
	  </div>
	</div>

  ";
            }
        }

        if (isset($arraypedidos4)) {
            foreach ($arraypedidos4 as $id) {
                $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '$id'";
                $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
                $filaModal = mysql_fetch_array($resultadoModal);

                $nombre = decrypt($filaModal['nombre']);
                $apellidos = decrypt($filaModal['apellidos']);
                $categoria = ($filaModal['categoria']);
                $temporada = ($filaModal['temporada']);

                $cuantia = ($filaModal['cuartopago']);
                echo"
	<div class='modal fade bs-example-modal-sm' id='pagarModal-$id-cuarto' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Pagar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
				<p>Si continuas con la acción <b>marcarás el cuarto pago de este jugador como cobrado</b>. Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
				se podrá volver a poner como cuarto pago la cuantía deseada editando al jugador en la lista de jugadores.</p>
	      </div>
	      <div class='modal-footer'>
	        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
		        <a type='button' class='btn btn-success btn-sm' href='operaciones.php?id=$id&plazo=cuartopago&oper=pagar'>PAGAR</a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class='modal fade bs-example-modal-sm' id='editarModal-$id-cuarto' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Editar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
					<div class='row'>
					<form class='form-inline' action='operaciones.php?id=$id&plazo=cuartopago&oper=cambiarpago' method='post'>
						<div class='form-group col-md-offset-1'>
							<label for='nuevopago'><strong>Nueva cuantía:</strong></label>
							<input type='number' class='form-control' id='nuevopago' name='cuantia' placeholder='$cuantia'>
						</div>
						<button type='submit' class='btn btn-danger btn-sm'>CAMBIAR PAGO</button>
					</form>
					</div>
	      </div>
	      <div class='modal-footer'>
	      </div>
	    </div>
	  </div>
	</div>

  ";
            }
        }

        if (isset($arraypedidos5)) {
            foreach ($arraypedidos5 as $id) {
                $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '$id'";
                $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
                $filaModal = mysql_fetch_array($resultadoModal);

                $nombre = decrypt($filaModal['nombre']);
                $apellidos = decrypt($filaModal['apellidos']);
                $categoria = ($filaModal['categoria']);
                $temporada = ($filaModal['temporada']);

                $cuantia = ($filaModal['quintopago']);
                echo"
	<div class='modal fade bs-example-modal-sm' id='pagarModal-$id-quinto' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Pagar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
				<p>Si continuas con la acción <b>marcarás el quinto pago de este jugador como cobrado</b>. Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
				se podrá volver a poner como quinto pago la cuantía deseada editando al jugador en la lista de jugadores.</p>
	      </div>
	      <div class='modal-footer'>
	        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
		        <a type='button' class='btn btn-success btn-sm' href='operaciones.php?id=$id&plazo=quintopago&oper=pagar'>PAGAR</a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class='modal fade bs-example-modal-sm' id='editarModal-$id-quinto' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Editar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
					<div class='row'>
					<form class='form-inline' action='operaciones.php?id=$id&plazo=quintopago&oper=cambiarpago' method='post'>
						<div class='form-group col-md-offset-1'>
							<label for='nuevopago'><strong>Nueva cuantía:</strong></label>
							<input type='number' class='form-control' id='nuevopago' name='cuantia' placeholder='$cuantia'>
						</div>
						<button type='submit' class='btn btn-danger btn-sm'>CAMBIAR PAGO</button>
					</form>
					</div>
	      </div>
	      <div class='modal-footer'>
	      </div>
	    </div>
	  </div>
	</div>

	";
            }
        }

        if (isset($arraypedidosExtra)) {
            foreach ($arraypedidosExtra as $id) {
                $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '$id'";
                $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
                $filaModal = mysql_fetch_array($resultadoModal);

                $nombre = decrypt($filaModal['nombre']);
                $apellidos = decrypt($filaModal['apellidos']);
                $categoria = ($filaModal['categoria']);
                $temporada = ($filaModal['temporada']);

                $cuantia = ($filaModal['pagoextra']);
                echo"
	<div class='modal fade bs-example-modal-sm' id='pagarModal-$id-extra' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Pagar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
				<p>Si continuas con la acción <b>marcarás el pago extra de este jugador como cobrado</b>. Si por cualquier circunstacia a lo largo de la temporada este estado del jugador cambiara,
				se podrá volver a poner como pago extra la cuantía deseada editando al jugador en la lista de jugadores.</p>
	      </div>
	      <div class='modal-footer'>
	        	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>ATRÁS</button>
		        <a type='button' class='btn btn-success btn-sm' href='operaciones.php?id=$id&plazo=pagoextra&oper=pagar'>PAGAR</a>
	      </div>
	    </div>
	  </div>
	</div>

	<div class='modal fade bs-example-modal-sm' id='editarModal-$id-extra' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
	  <div class='modal-dialog' role='document'>
	    <div class='modal-content'>
	      <div class='modal-header'>
	        <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
	        <h4 class='modal-title' id='myModalLabel'>Editar cuota al jugador $nombre $apellidos</h4>
	      </div>
				<div class='modal-body'>
					<div class='row'>
					<form class='form-inline' action='operaciones.php?id=$id&plazo=pagoextra&oper=cambiarpago' method='post'>
						<div class='form-group col-md-offset-1'>
							<label for='nuevopago'><strong>Nueva cuantía:</strong></label>
							<input type='number' class='form-control' id='nuevopago' name='cuantia' placeholder='$cuantia'>
						</div>
						<button type='submit' class='btn btn-danger btn-sm'>CAMBIAR PAGO</button>
					</form>
					</div>
	      </div>
	      <div class='modal-footer'>
	      </div>
	    </div>
	  </div>
	</div>

	";
            }
        }

        include("sidebar.php");
        include("footer.php");
    }//----------BIG-ENDIF-----------------------------------------------
}

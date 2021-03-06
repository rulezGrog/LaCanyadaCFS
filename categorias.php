<?php  include("header.php");


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        echo '
        <div class="headTitle">
            <span class="headTitleText"><h2> > LISTA DE JUGADORES </h2></span>
        </div>
        <div class="container">';

        if ($_SESSION["regOK"] == 1) {
            echo'<div class="alert alert-info"><strong>Se ha introducido correctamente el nuevo Jugador.</strong></div>';
            $_SESSION["regOK"] = 0;
        }

        if ($_SESSION["delOK"] == 1) {
            echo'<div class="alert alert-danger"><strong>Se ha borrado al jugador correctamente</strong></div>';
            $_SESSION["delOK"] = 0;
        }

        if (isset($_SESSION["editOK"]) && $_SESSION["editOK"] == 1) {
            echo'<div class="alert alert-info"><strong>Se han actualizado los datos del jugador correctamente</strong></div>';
            $_SESSION["editOK"] = 0;
        }


        $nombrearchivo0 = './tmp/listajugadores.csv';
        $nombrearchivo1 = './tmp/prebenjamin.csv';
        $nombrearchivo2 = './tmp/benjamin.csv';
        $nombrearchivo3 = './tmp/alevin.csv';
        $nombrearchivo4 = './tmp/infantil.csv';
        $nombrearchivo5 = './tmp/cadete.csv';
        $nombrearchivo6 = './tmp/juvenil.csv';
        $nombrearchivo7 = './tmp/senior.csv';

        if (file_exists($nombrearchivo0)) {
            unlink("./tmp/listajugadores.csv");
        }
        if (file_exists($nombrearchivo1)) {
            unlink("./tmp/prebenjamin.csv");
        }
        if (file_exists($nombrearchivo2)) {
            unlink("./tmp/benjamin.csv");
        }
        if (file_exists($nombrearchivo3)) {
            unlink("./tmp/alevin.csv");
        }
        if (file_exists($nombrearchivo4)) {
            unlink("./tmp/infantil.csv");
        }
        if (file_exists($nombrearchivo5)) {
            unlink("./tmp/cadete.csv");
        }
        if (file_exists($nombrearchivo6)) {
            unlink("./tmp/juvenil.csv");
        }
        if (file_exists($nombrearchivo7)) {
            unlink("./tmp/senior.csv");
        }

            ///-------------- CSVs --------------///

                        $fp0 = fopen('./tmp/listajugadores.csv', 'w');

                        // output the column headings
                        $headerarray0 = array('Categoria;Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp0, $headerarray0);

        $selectexport0 = "SELECT categoria,nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores";

        $export0 = mysql_query($selectexport0) or die("Sql error : " . mysql_error());

                        // loop over the rows, outputting them
                        while ($headerarray0 = mysql_fetch_assoc($export0)) {
                            $headerarray0['nombre'] = decrypt($headerarray0['nombre']).' '.decrypt($headerarray0['apellidos']);
                            $headerarray0['dni'] = decrypt($headerarray0['dni']);
                            if ($headerarray0['nom_tutor'] != "") {
                              $headerarray0['nom_tutor'] = decrypt($headerarray0['nom_tutor']).' '.decrypt($headerarray0['ape_tutor']);
                            }
                            $headerarray0['email'] = decrypt($headerarray0['email']);
                            $headerarray0['tlf'] = decrypt($headerarray0['tlf']);
                            $headerarray0['direccion'] = $headerarray0['tipo_calle'].' '.decrypt($headerarray0['direccion']).' - '.$headerarray0['cp'].', '.decrypt($headerarray0['poblacion']).', '.decrypt($headerarray0['provincia']);
                            unset($headerarray0['apellidos'], $headerarray0['ape_tutor'], $headerarray0['tipo_calle'], $headerarray0['cp'], $headerarray0['provincia'], $headerarray0['poblacion']);
                            $headerarray0 = array_map("utf8_decode", $headerarray0);
                            fputcsv($fp0, $headerarray0, ';');
                        }
        fclose($fp0);

                        //------OTRO------//
            $fp1 = fopen('./tmp/prebenjamin.csv', 'w');

            // output the column headings
            $headerarray1 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp1, $headerarray1);

        $selectexport1 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores WHERE categoria = 'prebenjamin'";

        $export1 = mysql_query($selectexport1) or die("Sql error : " . mysql_error());

            // loop over the rows, outputting them
            while ($headerarray1 = mysql_fetch_assoc($export1)) {
                $headerarray1['nombre'] = decrypt($headerarray1['nombre']).' '.decrypt($headerarray1['apellidos']);
                $headerarray1['dni'] = decrypt($headerarray1['dni']);
                if ($headerarray1['nom_tutor'] != "") {
                  $headerarray1['nom_tutor'] = decrypt($headerarray1['nom_tutor']).' '.decrypt($headerarray1['ape_tutor']);
                }
                $headerarray1['email'] = decrypt($headerarray1['email']);
                $headerarray1['tlf'] = decrypt($headerarray1['tlf']);
                $headerarray1['direccion'] = $headerarray1['tipo_calle'].' '.decrypt($headerarray1['direccion']).' - '.$headerarray1['cp'].', '.decrypt($headerarray1['poblacion']).', '.decrypt($headerarray1['provincia']);
                unset($headerarray1['apellidos'], $headerarray1['ape_tutor'], $headerarray1['tipo_calle'], $headerarray1['cp'], $headerarray1['provincia'], $headerarray1['poblacion']);
                $headerarray1 = array_map("utf8_decode", $headerarray1);
                fputcsv($fp1, $headerarray1, ';');
            }
        fclose($fp1);

            //------OTRO------//

            $fp2 = fopen('./tmp/benjamin.csv', 'w');

            // output the column headings
            $headerarray2 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp2, $headerarray2);

        $selectexport2 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores WHERE categoria = 'benjamin'";

        $export2 = mysql_query($selectexport2) or die("Sql error : " . mysql_error());

            // loop over the rows, outputting them
            while ($headerarray2 = mysql_fetch_assoc($export2)) {
                $headerarray2['nombre'] = decrypt($headerarray2['nombre']).' '.decrypt($headerarray2['apellidos']);
                $headerarray2['dni'] = decrypt($headerarray2['dni']);
                if ($headerarray2['nom_tutor'] != "") {
                  $headerarray2['nom_tutor'] = decrypt($headerarray2['nom_tutor']).' '.decrypt($headerarray2['ape_tutor']);
                }
                $headerarray2['email'] = decrypt($headerarray2['email']);
                $headerarray2['tlf'] = decrypt($headerarray2['tlf']);
                $headerarray2['direccion'] = $headerarray2['tipo_calle'].' '.decrypt($headerarray2['direccion']).' - '.$headerarray2['cp'].', '.decrypt($headerarray2['poblacion']).', '.decrypt($headerarray2['provincia']);
                unset($headerarray2['apellidos'], $headerarray2['ape_tutor'], $headerarray2['tipo_calle'], $headerarray2['cp'], $headerarray2['provincia'], $headerarray2['poblacion']);
                $headerarray2 = array_map("utf8_decode", $headerarray2);
                fputcsv($fp2, $headerarray2, ';');
            }
        fclose($fp2);

            //------OTRO------//

            $fp3 = fopen('./tmp/alevin.csv', 'w');

            // output the column headings
            $headerarray3 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp3, $headerarray3);

        $selectexport3 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores WHERE categoria = 'alevin'";

        $export3 = mysql_query($selectexport3) or die("Sql error : " . mysql_error());

            // loop over the rows, outputting them
            while ($headerarray3 = mysql_fetch_assoc($export3)) {
                $headerarray3['nombre'] = decrypt($headerarray3['nombre']).' '.decrypt($headerarray3['apellidos']);
                $headerarray3['dni'] = decrypt($headerarray3['dni']);
                if ($headerarray3['nom_tutor'] != "") {
                  $headerarray3['nom_tutor'] = decrypt($headerarray3['nom_tutor']).' '.decrypt($headerarray3['ape_tutor']);
                }
                $headerarray3['email'] = decrypt($headerarray3['email']);
                $headerarray3['tlf'] = decrypt($headerarray3['tlf']);
                $headerarray3['direccion'] = $headerarray3['tipo_calle'].' '.decrypt($headerarray3['direccion']).' - '.$headerarray3['cp'].', '.decrypt($headerarray3['poblacion']).', '.decrypt($headerarray3['provincia']);
                unset($headerarray3['apellidos'], $headerarray3['ape_tutor'], $headerarray3['tipo_calle'], $headerarray3['cp'], $headerarray3['provincia'], $headerarray3['poblacion']);
                $headerarray3 = array_map("utf8_decode", $headerarray3);
                fputcsv($fp3, $headerarray3, ';');
            }
        fclose($fp3);

            //------OTRO------//

            $fp4 = fopen('./tmp/infantil.csv', 'w');

            // output the column headings
            $headerarray4 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp4, $headerarray4);

        $selectexport4 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores WHERE categoria = 'infantil'";

        $export4 = mysql_query($selectexport4) or die("Sql error : " . mysql_error());

            // loop over the rows, outputting them
            while ($headerarray4 = mysql_fetch_assoc($export4)) {
                $headerarray4['nombre'] = decrypt($headerarray4['nombre']).' '.decrypt($headerarray4['apellidos']);
                $headerarray4['dni'] = decrypt($headerarray4['dni']);
                if ($headerarray4['nom_tutor'] != "") {
                  $headerarray4['nom_tutor'] = decrypt($headerarray4['nom_tutor']).' '.decrypt($headerarray4['ape_tutor']);
                }
                $headerarray4['email'] = decrypt($headerarray4['email']);
                $headerarray4['tlf'] = decrypt($headerarray4['tlf']);
                $headerarray4['direccion'] = $headerarray4['tipo_calle'].' '.decrypt($headerarray4['direccion']).' - '.$headerarray4['cp'].', '.decrypt($headerarray4['poblacion']).', '.decrypt($headerarray4['provincia']);
                unset($headerarray4['apellidos'], $headerarray4['ape_tutor'], $headerarray4['tipo_calle'], $headerarray4['cp'], $headerarray4['provincia'], $headerarray4['poblacion']);
                $headerarray4 = array_map("utf8_decode", $headerarray4);
                fputcsv($fp4, $headerarray4, ';');
            }
        fclose($fp4);

            //------OTRO------//

            $fp5 = fopen('./tmp/cadete.csv', 'w');

            // output the column headings
            $headerarray5 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp5, $headerarray5);

        $selectexport5 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores WHERE categoria = 'cadete'";

        $export5 = mysql_query($selectexport5) or die("Sql error : " . mysql_error());

            // loop over the rows, outputting them
            while ($headerarray5 = mysql_fetch_assoc($export5)) {
                $headerarray5['nombre'] = decrypt($headerarray5['nombre']).' '.decrypt($headerarray5['apellidos']);
                $headerarray5['dni'] = decrypt($headerarray5['dni']);
                if ($headerarray5['nom_tutor'] != "") {
                  $headerarray5['nom_tutor'] = decrypt($headerarray5['nom_tutor']).' '.decrypt($headerarray5['ape_tutor']);
                }
                $headerarray5['email'] = decrypt($headerarray5['email']);
                $headerarray5['tlf'] = decrypt($headerarray5['tlf']);
                $headerarray5['direccion'] = $headerarray5['tipo_calle'].' '.decrypt($headerarray5['direccion']).' - '.$headerarray5['cp'].', '.decrypt($headerarray5['poblacion']).', '.decrypt($headerarray5['provincia']);
                unset($headerarray5['apellidos'], $headerarray5['ape_tutor'], $headerarray5['tipo_calle'], $headerarray5['cp'], $headerarray5['provincia'], $headerarray5['poblacion']);
                $headerarray5 = array_map("utf8_decode", $headerarray5);
                fputcsv($fp5, $headerarray5, ';');
            }
        fclose($fp5);

            //------OTRO------//

            $fp6 = fopen('./tmp/juvenil.csv', 'w');

            // output the column headings
            $headerarray6 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp6, $headerarray6);

        $selectexport6 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores WHERE categoria = 'juvenil'";

        $export6 = mysql_query($selectexport6) or die("Sql error : " . mysql_error());

            // loop over the rows, outputting them
            while ($headerarray6 = mysql_fetch_assoc($export6)) {
                $headerarray6['nombre'] = decrypt($headerarray6['nombre']).' '.decrypt($headerarray6['apellidos']);
                $headerarray6['dni'] = decrypt($headerarray6['dni']);
                if ($headerarray6['nom_tutor'] != "") {
                  $headerarray6['nom_tutor'] = decrypt($headerarray6['nom_tutor']).' '.decrypt($headerarray6['ape_tutor']);
                }
                $headerarray6['email'] = decrypt($headerarray6['email']);
                $headerarray6['tlf'] = decrypt($headerarray6['tlf']);
                $headerarray6['direccion'] = $headerarray6['tipo_calle'].' '.decrypt($headerarray6['direccion']).' - '.$headerarray6['cp'].', '.decrypt($headerarray6['poblacion']).', '.decrypt($headerarray6['provincia']);
                unset($headerarray6['apellidos'], $headerarray6['ape_tutor'], $headerarray6['tipo_calle'], $headerarray6['cp'], $headerarray6['provincia'], $headerarray6['poblacion']);
                $headerarray6 = array_map("utf8_decode", $headerarray6);
                fputcsv($fp6, $headerarray6, ';');
            }
        fclose($fp6);

            //------OTRO------//

            $fp7 = fopen('./tmp/senior.csv', 'w');

            // output the column headings
            $headerarray7 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');

        fputcsv($fp7, $headerarray7);

        $selectexport7 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM jugadores WHERE categoria = 'senior'";

        $export7 = mysql_query($selectexport7) or die("Sql error : " . mysql_error());

            // loop over the rows, outputting them
            while ($headerarray7 = mysql_fetch_assoc($export7)) {
                $headerarray7['nombre'] = decrypt($headerarray7['nombre']).' '.decrypt($headerarray7['apellidos']);
                $headerarray7['dni'] = decrypt($headerarray7['dni']);
                if ($headerarray7['nom_tutor'] != "") {
                  $headerarray7['nom_tutor'] = decrypt($headerarray7['nom_tutor']).' '.decrypt($headerarray7['ape_tutor']);
                }
                $headerarray7['email'] = decrypt($headerarray7['email']);
                $headerarray7['tlf'] = decrypt($headerarray7['tlf']);
                $headerarray7['direccion'] = $headerarray7['tipo_calle'].' '.decrypt($headerarray7['direccion']).' - '.$headerarray7['cp'].', '.decrypt($headerarray7['poblacion']).', '.decrypt($headerarray7['provincia']);
                unset($headerarray7['apellidos'], $headerarray7['ape_tutor'], $headerarray7['tipo_calle'], $headerarray7['cp'], $headerarray7['provincia'], $headerarray7['poblacion']);
                $headerarray7 = array_map("utf8_decode", $headerarray7);
                fputcsv($fp7, $headerarray7, ';');
            }
        fclose($fp7);

            //------OTRO------//

echo'
	<a type="button" class="btn btn-fullList pull-right" name="exportfullList" href="tmp/listajugadores.csv"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>EXPORTAR LISTA COMLPETA</a>

  <ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#Preb">Pre-Benjamín</a></li>
    <li><a data-toggle="tab" href="#benja">Benjamín</a></li>
    <li><a data-toggle="tab" href="#alev">Alevín</a></li>
    <li><a data-toggle="tab" href="#infa">Infantil</a></li>
    <li><a data-toggle="tab" href="#cadet">Cadete</a></li>
    <li><a data-toggle="tab" href="#juve">Juvenil</a></li>
    <li><a data-toggle="tab" href="#seni">Senior</a></li>
  </ul>

  <div class="tab-content">
    <div id="Preb" class="tab-pane fade in active">
      <h3>Pre-Benjamín</h3>';

        $seleccionaPre= "SELECT * FROM jugadores WHERE categoria = 'prebenjamin'";
        $resultadoPre=mysql_query($seleccionaPre, $ilink) or die(mysql_error());
        $numfilasPre = mysql_num_rows($resultadoPre); // obtenemos el número de filas

                        if ($numfilasPre < 1) {
                            echo'<div class="alert alert-warning text-center"><strong>No existen jugadores en esta categoría.</strong></div>';
                        } else {
                            echo'
						      <div class="table-responsive">
						       <table class="table table-striped">
						         <thead>
						         <tr>
						           <th>Nombre</th>
						           <th>Apellidos</th>
											 <th>LOPD</th>
						           <th> </th>';
                            if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                                echo "
						           <th> </th>
						           <th> </th>";
                            };
                            echo'
						         </tr>
						         </thead>
						         <tbody>';

                            while ($filaPre = mysql_fetch_array($resultadoPre)) {
                                $nombrePre = decrypt($filaPre['nombre']);
                                $apellidoPre = decrypt($filaPre['apellidos']);
                                $numpedido = ($filaPre['pedido']);
                                $arraypedidos [] = $numpedido;
                                $termsimage1Pre = ($filaPre['termsimage1']);
                                $termsimage2Pre = ($filaPre['termsimage2']);
                                $termsimage3Pre = ($filaPre['termsimage3']);
                                $termsimage4Pre = ($filaPre['termsimage4']);
                                echo"
						          <tr>
						            <td>$nombrePre</td>
						            <td>$apellidoPre</td>
												<td>";

                                if ($termsimage1Pre == 1) {
                                    echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success label-as-badge'>1</span> ";
                                } else {
                                    echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger label-as-badge'>1</span> ";
                                }

                                if ($termsimage2Pre == 1) {
                                    echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success label-as-badge'>2</span> ";
                                } else {
                                    echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger label-as-badge'>2</span> ";
                                }

                                if ($termsimage3Pre == 1) {
                                    echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success label-as-badge'>3</span> ";
                                } else {
                                    echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger label-as-badge'>3</span> ";
                                }

                                if ($termsimage4Pre == 1) {
                                    echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success label-as-badge'>4</span>";
                                } else {
                                    echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger label-as-badge'>4</span> ";
                                }


                                echo" </td>
						            <td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>";
                                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                                    echo "
						            <td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
						            <td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>";
                                }
                                echo"
						          </tr>";
                            };
                            echo'
						        </tbody>
						       </table>
						      </div>

									<a type="button" class="btn btn-warning pull-right" name="exportpreb" href="tmp/prebenjamin.csv"><b>EXPORTAR</b></a>';
                        };
        echo'
    </div>
    <div id="benja" class="tab-pane fade">
      <h3>Benjamín</h3>';

        $seleccionaBenja= "SELECT * FROM jugadores WHERE categoria = 'benjamin'";
        $resultadoBenja=mysql_query($seleccionaBenja, $ilink) or die(mysql_error());
        $numfilasBenja = mysql_num_rows($resultadoBenja); // obtenemos el número de filas

            if ($numfilasBenja < 1) {
                echo'<div class="alert alert-warning text-center"><strong>No existen jugadores en esta categoría.</strong></div>';
            } else {
                echo'
			      <div class="table-responsive">
			       <table class="table table-striped">
			         <thead>
			         <tr>
			           <th>Nombre</th>
			           <th>Apellidos</th>
								 <th>LOPD</th>
			           <th> </th>';
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
								 <th> </th>
								 <th> </th>";
                };
                echo'
			         </tr>
			         </thead>
			         <tbody>';

                while ($filaBenja = mysql_fetch_array($resultadoBenja)) {
                    $nombreBenja = decrypt($filaBenja['nombre']);
                    $apellidoBenja = decrypt($filaBenja['apellidos']);
                    $numpedido = ($filaBenja['pedido']);
                    $arraypedidos [] = $numpedido;
                    $termsimage1Benja = ($filaBenja['termsimage1']);
                    $termsimage2Benja = ($filaBenja['termsimage2']);
                    $termsimage3Benja = ($filaBenja['termsimage3']);
                    $termsimage4Benja = ($filaBenja['termsimage4']);
                    echo"
			          <tr>
			            <td>$nombreBenja</td>
			            <td>$apellidoBenja</td>
									<td>";

                    if ($termsimage1Benja == 1) {
                        echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success label-as-badge'>1</span> ";
                    } else {
                        echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger label-as-badge'>1</span> ";
                    }

                    if ($termsimage2Benja == 1) {
                        echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success label-as-badge'>2</span> ";
                    } else {
                        echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger label-as-badge'>2</span> ";
                    }

                    if ($termsimage3Benja == 1) {
                        echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success label-as-badge'>3</span> ";
                    } else {
                        echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger label-as-badge'>3</span> ";
                    }

                    if ($termsimage4Benja == 1) {
                        echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success label-as-badge'>4</span>";
                    } else {
                        echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger label-as-badge'>4</span> ";
                    }


                    echo" </td>
									<td> </td>
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>";
                    if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo "
									<td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
									<td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>";
                    }
                    echo"
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <a type="button" class="btn btn-warning pull-right" name="exportbenja" href="tmp/benjamin.csv"><b>EXPORTAR</b></a>';
            };
        echo'
    </div>
    <div id="alev" class="tab-pane fade">
      <h3>Alevín</h3>';

        $seleccionaAle = "SELECT * FROM jugadores WHERE categoria = 'alevin'";
        $resultadoAle = mysql_query($seleccionaAle, $ilink) or die(mysql_error());
        $numfilasAle = mysql_num_rows($resultadoAle); // obtenemos el número de filas

            if ($numfilasAle < 1) {
                echo'<div class="alert alert-warning text-center"><strong>No existen jugadores en esta categoría.</strong></div>';
            } else {
                echo'
			      <div class="table-responsive">
			       <table class="table table-striped">
			         <thead>
			         <tr>
			           <th>Nombre</th>
			           <th>Apellidos</th>
								 <th>LOPD</th>
			           <th> </th>';
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
								 <th> </th>
								 <th> </th>";
                };
                echo'
			         </tr>
			         </thead>
			         <tbody>';

                while ($filaAle = mysql_fetch_array($resultadoAle)) {
                    $nombreAle = decrypt($filaAle['nombre']);
                    $apellidoAle = decrypt($filaAle['apellidos']);
                    $numpedido = ($filaAle['pedido']);
                    $arraypedidos [] = $numpedido;
                    $termsimage1Ale = ($filaAle['termsimage1']);
                    $termsimage2Ale = ($filaAle['termsimage2']);
                    $termsimage3Ale = ($filaAle['termsimage3']);
                    $termsimage4Ale = ($filaAle['termsimage4']);
                    echo"
			          <tr>
			            <td>$nombreAle</td>
			            <td>$apellidoAle</td>
									<td>";

                    if ($termsimage1Ale == 1) {
                        echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success label-as-badge'>1</span> ";
                    } else {
                        echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger label-as-badge'>1</span> ";
                    }

                    if ($termsimage2Ale == 1) {
                        echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success label-as-badge'>2</span> ";
                    } else {
                        echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger label-as-badge'>2</span> ";
                    }

                    if ($termsimage3Ale == 1) {
                        echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success label-as-badge'>3</span> ";
                    } else {
                        echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger label-as-badge'>3</span> ";
                    }

                    if ($termsimage4Ale == 1) {
                        echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success label-as-badge'>4</span>";
                    } else {
                        echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger label-as-badge'>4</span> ";
                    }


                    echo" </td>
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>";
                    if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo "
									<td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
									<td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>";
                    }
                    echo"
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <a type="button" class="btn btn-warning pull-right" name="exportalev" href="tmp/alevin.csv"><b>EXPORTAR</b></a>';
            };
        echo'
    </div>
    <div id="infa" class="tab-pane fade">
      <h3>Infantil</h3>';

        $seleccionaInfa= "SELECT * FROM jugadores WHERE categoria = 'infantil'";
        $resultadoInfa=mysql_query($seleccionaInfa, $ilink) or die(mysql_error());
        $numfilasInfa = mysql_num_rows($resultadoInfa); // obtenemos el número de filas

            if ($numfilasInfa < 1) {
                echo'<div class="alert alert-warning text-center"><strong>No existen jugadores en esta categoría.</strong></div>';
            } else {
                echo'
			      <div class="table-responsive">
			       <table class="table table-striped">
			         <thead>
			         <tr>
			           <th>Nombre</th>
			           <th>Apellidos</th>
								 <th>LOPD</th>
			           <th> </th>';
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
								 <th> </th>
								 <th> </th>";
                };
                echo'
			         </tr>
			         </thead>
			         <tbody>';

                while ($filaInfa = mysql_fetch_array($resultadoInfa)) {
                    $nombreInfa = decrypt($filaInfa['nombre']);
                    $apellidoInfa = decrypt($filaInfa['apellidos']);
                    $numpedido = ($filaInfa['pedido']);
                    $arraypedidos [] = $numpedido;
                    $termsimage1Infa = ($filaInfa['termsimage1']);
                    $termsimage2Infa = ($filaInfa['termsimage2']);
                    $termsimage3Infa = ($filaInfa['termsimage3']);
                    $termsimage4Infa = ($filaInfa['termsimage4']);
                    echo"
			          <tr>
			            <td>$nombreInfa</td>
			            <td>$apellidoInfa</td>
									<td>";

                    if ($termsimage1Infa == 1) {
                        echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success label-as-badge'>1</span> ";
                    } else {
                        echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger label-as-badge'>1</span> ";
                    }

                    if ($termsimage2Infa == 1) {
                        echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success label-as-badge'>2</span> ";
                    } else {
                        echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger label-as-badge'>2</span> ";
                    }

                    if ($termsimage3Infa == 1) {
                        echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success label-as-badge'>3</span> ";
                    } else {
                        echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger label-as-badge'>3</span> ";
                    }

                    if ($termsimage4Infa == 1) {
                        echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success label-as-badge'>4</span>";
                    } else {
                        echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger label-as-badge'>4</span> ";
                    }


                    echo" </td>
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>";
                    if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo "
									<td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
									<td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>";
                    }
                    echo"
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <a type="button" class="btn btn-warning pull-right" name="exportinfa" href="tmp/infantil.csv"><b>EXPORTAR</b></a>';
            };
        echo'
    </div><div id="cadet" class="tab-pane fade">
      <h3>Cadete</h3>';

        $seleccionaCade= "SELECT * FROM jugadores WHERE categoria = 'cadete'";
        $resultadoCade=mysql_query($seleccionaCade, $ilink) or die(mysql_error());
        $numfilasCade = mysql_num_rows($resultadoCade); // obtenemos el número de filas

            if ($numfilasCade < 1) {
                echo'<div class="alert alert-warning text-center"><strong>No existen jugadores en esta categoría.</strong></div>';
            } else {
                echo'
			      <div class="table-responsive">
			       <table class="table table-striped">
			         <thead>
			         <tr>
			           <th>Nombre</th>
			           <th>Apellidos</th>
								 <th>LOPD</th>
			           <th> </th>';
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
								 <th> </th>
								 <th> </th>";
                };
                echo'
			         </tr>
			         </thead>
			         <tbody>';

                while ($filaCade = mysql_fetch_array($resultadoCade)) {
                    $nombreCade = decrypt($filaCade['nombre']);
                    $apellidoCade = decrypt($filaCade['apellidos']);
                    $numpedido = ($filaCade['pedido']);
                    $arraypedidos [] = $numpedido;
                    $termsimage1Cade = ($filaCade['termsimage1']);
                    $termsimage2Cade = ($filaCade['termsimage2']);
                    $termsimage3Cade = ($filaCade['termsimage3']);
                    $termsimage4Cade = ($filaCade['termsimage4']);
                    echo"
			          <tr>
			            <td>$nombreCade</td>
			            <td>$apellidoCade</td>
									<td>";

                    if ($termsimage1Cade == 1) {
                        echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success label-as-badge'>1</span> ";
                    } else {
                        echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger label-as-badge'>1</span> ";
                    }

                    if ($termsimage2Cade == 1) {
                        echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success label-as-badge'>2</span> ";
                    } else {
                        echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger label-as-badge'>2</span> ";
                    }

                    if ($termsimage3Cade == 1) {
                        echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success label-as-badge'>3</span> ";
                    } else {
                        echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger label-as-badge'>3</span> ";
                    }

                    if ($termsimage4Cade == 1) {
                        echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success label-as-badge'>4</span>";
                    } else {
                        echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger label-as-badge'>4</span> ";
                    }


                    echo" </td>
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>";
                    if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo "
									<td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
									<td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>";
                    }
                    echo"
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <a type="button" class="btn btn-warning pull-right" name="exportcade" href="tmp/cadete.csv"><b>EXPORTAR</b></a>';
            };
        echo'
    </div><div id="juve" class="tab-pane fade">
      <h3>Juvenil</h3>';

        $seleccionaJuve= "SELECT * FROM jugadores WHERE categoria = 'juvenil'";
        $resultadoJuve=mysql_query($seleccionaJuve, $ilink) or die(mysql_error());
        $numfilasJuve = mysql_num_rows($resultadoJuve); // obtenemos el número de filas

            if ($numfilasJuve < 1) {
                echo'<div class="alert alert-warning text-center"><strong>No existen jugadores en esta categoría.</strong></div>';
            } else {
                echo'
			      <div class="table-responsive">
			       <table class="table table-striped">
			         <thead>
			         <tr>
			           <th>Nombre</th>
			           <th>Apellidos</th>
								 <th>LOPD</th>
			           <th> </th>';
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
								 <th> </th>
								 <th> </th>";
                };
                echo'
			         </tr>
			         </thead>
			         <tbody>';

                while ($filaJuve = mysql_fetch_array($resultadoJuve)) {
                    $nombreJuve = decrypt($filaJuve['nombre']);
                    $apellidoJuve = decrypt($filaJuve['apellidos']);
                    $numpedido = ($filaJuve['pedido']);
                    $arraypedidos [] = $numpedido;
                    $termsimage1Juve = ($filaJuve['termsimage1']);
                    $termsimage2Juve = ($filaJuve['termsimage2']);
                    $termsimage3Juve = ($filaJuve['termsimage3']);
                    $termsimage4Juve = ($filaJuve['termsimage4']);
                    echo"
			          <tr>
			            <td>$nombreJuve</td>
			            <td>$apellidoJuve</td>
									<td>";

                    if ($termsimage1Juve == 1) {
                        echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success label-as-badge'>1</span> ";
                    } else {
                        echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger label-as-badge'>1</span> ";
                    }

                    if ($termsimage2Juve == 1) {
                        echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success label-as-badge'>2</span> ";
                    } else {
                        echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger label-as-badge'>2</span> ";
                    }

                    if ($termsimage3Juve == 1) {
                        echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success label-as-badge'>3</span> ";
                    } else {
                        echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger label-as-badge'>3</span> ";
                    }

                    if ($termsimage4Juve == 1) {
                        echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success label-as-badge'>4</span>";
                    } else {
                        echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger label-as-badge'>4</span> ";
                    }


                    echo" </td>
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>";
                    if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo "
									<td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
									<td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>";
                    }
                    echo"
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <a type="button" class="btn btn-warning pull-right" name="exportjuve" href="tmp/juvenil.csv"><b>EXPORTAR</b></a>';
            };
        echo'
    </div><div id="seni" class="tab-pane fade">
      <h3>Senior</h3>';

        $seleccionaSenior= "SELECT * FROM jugadores WHERE categoria = 'senior'";
        $resultadoSenior=mysql_query($seleccionaSenior, $ilink) or die(mysql_error());
        $numfilasSenior = mysql_num_rows($resultadoSenior); // obtenemos el número de filas

            if ($numfilasSenior < 1) {
                echo'<div class="alert alert-warning text-center"><strong>No existen jugadores en esta categoría.</strong></div>';
            } else {
                echo'
			      <div class="table-responsive">
			       <table class="table table-striped">
			         <thead>
			         <tr>
			           <th>Nombre</th>
			           <th>Apellidos</th>
								 <th>LOPD</th>
			           <th> </th>';
                if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                    echo "
								 <th> </th>
								 <th> </th>";
                };
                echo'
			         </tr>
			         </thead>
			         <tbody>';

                while ($filaSenior = mysql_fetch_array($resultadoSenior)) {
                    $nombreSenior = decrypt($filaSenior['nombre']);
                    $apellidoSenior = decrypt($filaSenior['apellidos']);
                    $numpedido = ($filaSenior['pedido']);
                    $arraypedidos [] = $numpedido;
                    $termsimage1Senior = ($filaSenior['termsimage1']);
                    $termsimage2Senior = ($filaSenior['termsimage2']);
                    $termsimage3Senior = ($filaSenior['termsimage3']);
                    $termsimage4Senior = ($filaSenior['termsimage4']);
                    echo"
			          <tr>
			            <td>$nombreSenior</td>
			            <td>$apellidoSenior</td>
									<td>";

                    if ($termsimage1Senior == 1) {
                        echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success label-as-badge'>1</span> ";
                    } else {
                        echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger label-as-badge'>1</span> ";
                    }

                    if ($termsimage2Senior == 1) {
                        echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success label-as-badge'>2</span> ";
                    } else {
                        echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger label-as-badge'>2</span> ";
                    }

                    if ($termsimage3Senior == 1) {
                        echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success label-as-badge'>3</span> ";
                    } else {
                        echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger label-as-badge'>3</span> ";
                    }

                    if ($termsimage4Senior == 1) {
                        echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success label-as-badge'>4</span>";
                    } else {
                        echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger label-as-badge'>4</span> ";
                    }


                    echo" </td>
			            <td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>";
                    if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo "
									<td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
									<td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>";
                    }
                    echo"
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <a type="button" class="btn btn-warning pull-right" name="exportsenior" href="tmp/senior.csv"><b>EXPORTAR</b></a>';
            };
        echo'

    </div>
  </div>

</div>';

        foreach ($arraypedidos as $id) {
            $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = '$id'";

            $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
            $filaModal = mysql_fetch_array($resultadoModal);
            if ($filaModal['nom_tutor'] != ""){
              $nombretut = decrypt($filaModal['nom_tutor']); //isset OK OK
            }else{
              $nombretut = "";
            }
            if ($filaModal['ape_tutor'] != ""){
              $apellidostut = decrypt($filaModal['ape_tutor']); //isset OK OK
            }else{
              $apellidostut = "";
            }
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
            if ($filaModal['titular_cuenta'] != ""){
              $nombrecuenta = decrypt($filaModal['titular_cuenta']); //isset OK OK
            }else{
              $nombrecuenta = "";
            }
            if ($filaModal['ape_cuenta'] != ""){
              $apecuenta = decrypt($filaModal['ape_cuenta']); //isset OK OK
            }else{
              $apecuenta = "";
            }
            if ($filaModal['num_cuenta'] != ""){
              $numcuenta = decrypt($filaModal['num_cuenta']); //isset OK OK
            }else{
              $numcuenta = "";
            }
            $categoria = ($filaModal['categoria']);
            $temporada = ($filaModal['temporada']);

            $primerpago = $filaModal['primerpago'];
            $segundopago = $filaModal['segundopago'];
            $tercerpago = $filaModal['tercerpago'];
            $cuartopago = $filaModal['cuartopago'];
            $quintopago = $filaModal['quintopago'];
            $pagoextra = $filaModal['pagoextra'];

            $lopd1 = ($filaModal['termsimage1']);
            $lopd2 = ($filaModal['termsimage2']);
            $lopd3 = ($filaModal['termsimage3']);
            $lopd4 = ($filaModal['termsimage4']);

                    // $vb = iconv("UTF-8", "ISO-8859-1", $nombretut);

                echo "
				<div class='modal fade bs-example-modal-lg alto' id='editarModal-$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
					<div class='modal-dialog modal-lg' role='document'>
						<div class='modal-content' id='accordion'>
							<div class='modal-header'>
								<button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
								<h4 class='modal-title' id='myModalLabel'>EDICIÓN DE DATOS DEL JUGADOR: \"<span class='text-uppercase'>$nombre $apellidos\"</span></h4>
							</div>
							<div class='modal-body'>
								<br>
								<h3 data-toggle='collapse' data-target='#editpanel1-$id' class='modal-title flip' data-parent='#accordion' id='flip1'>Datos Personales:</h3>
									<div class='row form-group paneledit in' id='editpanel1-$id'>
										<form accept-charset='utf-8' role='form' action='editplayer.php?id=$id&op=edit1' method='POST'>
											<div class='form-group col-sm-5'>
												<label class='control-label' for='nombretut'>Nombre padre/madre/tutor:</label>
												<input type='text' class='form-control' id='nombretut' name='nombretut' placeholder='Introduzca nombre' value='$nombretut'>
											</div>
											<div class='form-group col-sm-7'>
												<label class='control-label' for='nombre'>Apellidos padre/madre/tutor:</label>
												<input type='text' class='form-control' id='apellidostut' name='apellidostut' placeholder='Introduzca los apellidos' value='";
            echo str_replace('%ufffd', "_", $apellidostut);
            echo"'>
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
											<button type='submit' class='btn btn-warning float-right'>Guardar</button>
										</form>
										</div>	<!--row form-group#1-->

								<br>
								<h3 data-toggle='collapse' data-target='#editpanel2-$id' class='modal-title flip collapsed' data-parent='#accordion' id='flip2'>Dirección:</h3>
									<div class='row form-group paneledit collapse' id='editpanel2-$id'>
										<form accept-charset='utf-8' role='form' action='editplayer.php?id=$id&op=edit2' method='POST'>
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
										<button type='submit' class='btn btn-warning  float-right'>Guardar</button>
									</form>
									</div>	<!--row form-group#2-->

									<br>
									<h3 data-toggle='collapse' data-target='#editpanel3-$id' class='modal-title flip collapsed' data-parent='#accordion' id='flip3'>Datos bancarios:</h3>
										<div class='row form-group paneledit collapse' id='editpanel3-$id'>
										<form accept-charset='utf-8' role='form' action='editplayer.php?id=$id&op=edit3' method='POST'>
										<br>
											<!--<div class='col-sm-12' style='margin-bottom:10px;'>
											<label class='col-sm-2 control-label no-padding-left' for='fracc'>¿Pago Fraccionado?</label>
												<div class='col-sm-10'>
													<label class='radio-inline'>
															<input type='radio' name='fracc' value='1'";
            if ($fraccionado == '1') {
                echo" checked='true'";
            }
            echo" />Sí
													</label>
													<label class='radio-inline'>
															<input type='radio' name='fracc' value='0'";
            if ($fraccionado == '0') {
                echo" checked";
            }
            echo" />No
													</label>
											</div>
										</div>-->

										<div id='siFracc' class='oculto'>
											<div ng-show='user.fracc'>
													<div class='row form-group col-sm-12'>
															<label class='col-sm-2 control-label' for='bancname'>Titular de la cuenta bancaria</label>
															<div class='col-sm-4'>
																	<input class='form-control' type='text' name='bancname' value='$nombrecuenta' placeholder='Nombre titular cuenta' />
															</div>
															<div class='col-sm-6'>
																	<input class='form-control' type='text' name='bancsurname' value='$apecuenta' placeholder='Apellidos titular cuenta' />
															</div>
													</div>
													<div class='row form-group col-sm-12'>
															<label class='col-sm-4 control-label' for='bancnum'>Número de cuenta bancaria</label>
															<div class='col-sm-8 no-padding-left'>
																	<input class='form-control' id='cuentaV' type='text' name='bancnum' value='$numcuenta' placeholder='AA0000000000000000000000'/>
															</div>
													</div>
											</div>

											<div class='form-group col-sm-2' ng-hide='user.fracc'>
													<label class='control-label' for='importe1'>Primer Pago:</label>
													<input class='form-control' type='text' name='importe1' placeholder='000€' value='$primerpago'/>
											</div>
											<div class='form-group col-sm-2' ng-hide='user.fracc'>
													<label class='control-label' for='importe2'>Segundo Pago</label>
													<input class='form-control' type='text' name='importe2' placeholder='000€' value='$segundopago'/>
											</div>
											<div class='form-group col-sm-2' ng-hide='user.fracc'>
													<label class='control-label' for='importe3'>Tercer Pago:</label>
													<input class='form-control' type='text' name='importe3' placeholder='000€' value='$tercerpago'/>
											</div>
											<div class='form-group col-sm-2' ng-hide='user.fracc'>
													<label class='control-label' for='importe4'>Cuarto Pago:</label>
													<input class='form-control' type='text' name='importe4' placeholder='000€' value='$cuartopago'/>
											</div>
											<div class='form-group col-sm-2' ng-hide='user.fracc'>
													<label class='control-label' for='importe5'>Quinto Pago:</label>
													<input class='form-control' type='text' name='importe5' placeholder='000€' value='$quintopago'/>
											</div>
											<div class='form-group col-sm-2' ng-hide='user.fracc'>
													<label class='control-label' for='importeExtra'>Pago Extra:</label>
													<input class='form-control' type='text' name='importeExtra' placeholder='000€' value='$pagoextra'/>
											</div>
									</div>
									<br>
										<button type='submit' class='btn btn-warning float-right'>Guardar</button>
									</form>
									</div>	<!--row form-group#3-->

										<br>
										<h3 data-toggle='collapse' data-target='#editpanel4-$id' class='modal-title flip collapsed' id='flip4'>Ley Orgánica de protección de datos:</h3>
											<div class='row form-group paneledit collapse' id='editpanel4-$id'>
												<form accept-charset='utf-8' role='form' action='editplayer.php?id=$id&op=edit4' method='POST'>
														<div class='col-sm-12'>
															<p><strong>El jugador (y, en el caso de menores de 14 años, sus padres/representantes legales) autoriza/n, mediante el marcado de la casilla, a:</strong></p>
														</div>

														<label class='col-sm-2 control-label'></label>
														<div class='col-sm-10'>
																<input type='checkbox' ng-model='user.termsImage1' name='termsImage1' value='1' ";
            if ($lopd1 == '1') {
                echo" checked";
            }
            echo" />
																La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.
														</div>

														<label class='col-sm-2 control-label'></label>
														<div class='col-sm-10'>
																<input type='checkbox' ng-model='user.termsImage2' name='termsImage2' value='1' ";
            if ($lopd2 == '1') {
                echo" checked";
            }
            echo" />
																La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.
														</div>

														<label class='col-sm-2 control-label'></label>
														<div class='col-sm-10'>
																<input type='checkbox' ng-model='user.termsImage3' name='termsImage3' value='1' ";
            if ($lopd3 == '1') {
                echo" checked";
            }
            echo" />
																La utilización de las imágenes para ilustrar las noticias remitidas a <a href='https://www.lacanyadacfs.com' target='_blank' >www.lacanyadacfs.com/</a>.
														</div>

														<label class='col-sm-2 control-label'></label>
														<div class='col-sm-10'>
																<input type='checkbox' ng-model='user.termsImage4' name='termsImage4' value='1' ";
            if ($lopd4 == '1') {
                echo" checked";
            }
            echo" />
																La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como <a href='https://www.facebook.com/LaCanyadaCfs' target='_blank' >Facebook</a>, <a href='https://twitter.com/LaCanyadaCFS' target='_blank' >Twitter</a>, y <a href='https://www.youtube.com/user/LaCanyadaCFS?feature=mhee' target='_blank' >YouTube</a>.
														</div>
														<br>
														<button type='submit' class='btn btn-warning float-right'>Guardar</button>
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
													<p><strong>Fecha de nacimiento: </strong>";
            echo strftime('%d de %B de %Y', strtotime($birthdate));
            echo"</p>
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

            if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
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
					        <a type='button' class='btn btn-danger btn-sm' href='operaciones.php?id=$id&oper=baja'>SI</a>
				      </div>
				    </div>
				  </div>
				</div>";
        };

        include("sidebar.php");
        include("footer.php");
    } //--------------BIG-ENDIF------------------------------
}

?>

<!--
<script>
$('#container .input-group.date').datepicker({
		language: "es"
});
</script>

-->

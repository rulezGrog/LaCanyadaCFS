<?php  include("header.php");


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        $temporada = $_GET["temp"];

        $tablaTemp = 'temp'.$temporada;

        echo '
        <div class="headTitle">
            <span class="headTitleText"><h2>
              > LISTA DE JUGADORES ';
        echo $temporada;
        echo' - ';
        echo $temporada+1;
        echo '
            </h2></span>
        </div>
        <div class="container">';

        //
        //
        // $nombrearchivo0 = './tmp/listajugadores.csv';
        // $nombrearchivo1 = './tmp/prebenjamin.csv';
        // $nombrearchivo2 = './tmp/benjamin.csv';
        // $nombrearchivo3 = './tmp/alevin.csv';
        // $nombrearchivo4 = './tmp/infantil.csv';
        // $nombrearchivo5 = './tmp/cadete.csv';
        // $nombrearchivo6 = './tmp/juvenil.csv';
        // $nombrearchivo7 = './tmp/senior.csv';
        //
        // if (file_exists($nombrearchivo0)) {
        //     unlink("./tmp/listajugadores.csv");
        // }
        // if (file_exists($nombrearchivo1)) {
        //     unlink("./tmp/prebenjamin.csv");
        // }
        // if (file_exists($nombrearchivo2)) {
        //     unlink("./tmp/benjamin.csv");
        // }
        // if (file_exists($nombrearchivo3)) {
        //     unlink("./tmp/alevin.csv");
        // }
        // if (file_exists($nombrearchivo4)) {
        //     unlink("./tmp/infantil.csv");
        // }
        // if (file_exists($nombrearchivo5)) {
        //     unlink("./tmp/cadete.csv");
        // }
        // if (file_exists($nombrearchivo6)) {
        //     unlink("./tmp/juvenil.csv");
        // }
        // if (file_exists($nombrearchivo7)) {
        //     unlink("./tmp/senior.csv");
        // }

            ///-------------- CSVs --------------///

                        // $fp0 = fopen('./tmp/listajugadores.csv', 'w');
                        //
                        // // output the column headings
                        // $headerarray0 = array('Categoria;Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
                        //
                        // fputcsv($fp0, $headerarray0);

        //
        // $selectexport0 = "SELECT categoria,nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM $tablaTemp";
        //
        // $export0 = mysql_query($selectexport0) or die("Sql error : " . mysql_error());
        //
        //                 // loop over the rows, outputting them
        //                 while ($headerarray0 = mysql_fetch_assoc($export0)) {
        //                     $headerarray0['nombre'] = decrypt($headerarray0['nombre']).' '.decrypt($headerarray0['apellidos']);
        //                     $headerarray0['dni'] = decrypt($headerarray0['dni']);
        //                     $headerarray0['nom_tutor'] = decrypt($headerarray0['nom_tutor']).' '.decrypt($headerarray0['ape_tutor']);
        //                     $headerarray0['email'] = decrypt($headerarray0['email']);
        //                     $headerarray0['tlf'] = decrypt($headerarray0['tlf']);
        //                     $headerarray0['direccion'] = $headerarray0['tipo_calle'].' '.decrypt($headerarray0['direccion']).' - '.$headerarray0['cp'].', '.decrypt($headerarray0['poblacion']).', '.decrypt($headerarray0['provincia']);
        //                     unset($headerarray0['apellidos'], $headerarray0['ape_tutor'], $headerarray0['tipo_calle'], $headerarray0['cp'], $headerarray0['provincia'], $headerarray0['poblacion']);
        //                     $headerarray0 = array_map("utf8_decode", $headerarray0);
        //                     fputcsv($fp0, $headerarray0, ';');
        //                 }
        // fclose($fp0);
        //
        //                 //------OTRO------//
        //     $fp1 = fopen('./tmp/prebenjamin.csv', 'w');
        //
        //     // output the column headings
        //     $headerarray1 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
        //
        // fputcsv($fp1, $headerarray1);
        //
        // $selectexport1 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM $tablaTemp WHERE categoria = 'prebenjamin'";
        //
        // $export1 = mysql_query($selectexport1) or die("Sql error : " . mysql_error());
        //
        //     // loop over the rows, outputting them
        //     while ($headerarray1 = mysql_fetch_assoc($export1)) {
        //         $headerarray1['nombre'] = decrypt($headerarray1['nombre']).' '.decrypt($headerarray1['apellidos']);
        //         $headerarray1['dni'] = decrypt($headerarray1['dni']);
        //         $headerarray1['nom_tutor'] = decrypt($headerarray1['nom_tutor']).' '.decrypt($headerarray1['ape_tutor']);
        //         $headerarray1['email'] = decrypt($headerarray1['email']);
        //         $headerarray1['tlf'] = decrypt($headerarray1['tlf']);
        //         $headerarray1['direccion'] = $headerarray1['tipo_calle'].' '.decrypt($headerarray1['direccion']).' - '.$headerarray1['cp'].', '.decrypt($headerarray1['poblacion']).', '.decrypt($headerarray1['provincia']);
        //         unset($headerarray1['apellidos'], $headerarray1['ape_tutor'], $headerarray1['tipo_calle'], $headerarray1['cp'], $headerarray1['provincia'], $headerarray1['poblacion']);
        //         $headerarray1 = array_map("utf8_decode", $headerarray1);
        //         fputcsv($fp1, $headerarray1, ';');
        //     }
        // fclose($fp1);
        //
        //     //------OTRO------//
        //
        //     $fp2 = fopen('./tmp/benjamin.csv', 'w');
        //
        //     // output the column headings
        //     $headerarray2 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
        //
        // fputcsv($fp2, $headerarray2);
        //
        // $selectexport2 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM $tablaTemp WHERE categoria = 'benjamin'";
        //
        // $export2 = mysql_query($selectexport2) or die("Sql error : " . mysql_error());
        //
        //     // loop over the rows, outputting them
        //     while ($headerarray2 = mysql_fetch_assoc($export2)) {
        //         $headerarray2['nombre'] = decrypt($headerarray2['nombre']).' '.decrypt($headerarray2['apellidos']);
        //         $headerarray2['dni'] = decrypt($headerarray2['dni']);
        //         $headerarray2['nom_tutor'] = decrypt($headerarray2['nom_tutor']).' '.decrypt($headerarray2['ape_tutor']);
        //         $headerarray2['email'] = decrypt($headerarray2['email']);
        //         $headerarray2['tlf'] = decrypt($headerarray2['tlf']);
        //         $headerarray2['direccion'] = $headerarray2['tipo_calle'].' '.decrypt($headerarray2['direccion']).' - '.$headerarray2['cp'].', '.decrypt($headerarray2['poblacion']).', '.decrypt($headerarray2['provincia']);
        //         unset($headerarray2['apellidos'], $headerarray2['ape_tutor'], $headerarray2['tipo_calle'], $headerarray2['cp'], $headerarray2['provincia'], $headerarray2['poblacion']);
        //         $headerarray2 = array_map("utf8_decode", $headerarray2);
        //         fputcsv($fp2, $headerarray2, ';');
        //     }
        // fclose($fp2);
        //
        //     //------OTRO------//
        //
        //     $fp3 = fopen('./tmp/alevin.csv', 'w');
        //
        //     // output the column headings
        //     $headerarray3 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
        //
        // fputcsv($fp3, $headerarray3);
        //
        // $selectexport3 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM $tablaTemp WHERE categoria = 'alevin'";
        //
        // $export3 = mysql_query($selectexport3) or die("Sql error : " . mysql_error());
        //
        //     // loop over the rows, outputting them
        //     while ($headerarray3 = mysql_fetch_assoc($export3)) {
        //         $headerarray3['nombre'] = decrypt($headerarray3['nombre']).' '.decrypt($headerarray3['apellidos']);
        //         $headerarray3['dni'] = decrypt($headerarray3['dni']);
        //         $headerarray3['nom_tutor'] = decrypt($headerarray3['nom_tutor']).' '.decrypt($headerarray3['ape_tutor']);
        //         $headerarray3['email'] = decrypt($headerarray3['email']);
        //         $headerarray3['tlf'] = decrypt($headerarray3['tlf']);
        //         $headerarray3['direccion'] = $headerarray3['tipo_calle'].' '.decrypt($headerarray3['direccion']).' - '.$headerarray3['cp'].', '.decrypt($headerarray3['poblacion']).', '.decrypt($headerarray3['provincia']);
        //         unset($headerarray3['apellidos'], $headerarray3['ape_tutor'], $headerarray3['tipo_calle'], $headerarray3['cp'], $headerarray3['provincia'], $headerarray3['poblacion']);
        //         $headerarray3 = array_map("utf8_decode", $headerarray3);
        //         fputcsv($fp3, $headerarray3, ';');
        //     }
        // fclose($fp3);
        //
        //     //------OTRO------//
        //
        //     $fp4 = fopen('./tmp/infantil.csv', 'w');
        //
        //     // output the column headings
        //     $headerarray4 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
        //
        // fputcsv($fp4, $headerarray4);
        //
        // $selectexport4 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM $tablaTemp WHERE categoria = 'infantil'";
        //
        // $export4 = mysql_query($selectexport4) or die("Sql error : " . mysql_error());
        //
        //     // loop over the rows, outputting them
        //     while ($headerarray4 = mysql_fetch_assoc($export4)) {
        //         $headerarray4['nombre'] = decrypt($headerarray4['nombre']).' '.decrypt($headerarray4['apellidos']);
        //         $headerarray4['dni'] = decrypt($headerarray4['dni']);
        //         $headerarray4['nom_tutor'] = decrypt($headerarray4['nom_tutor']).' '.decrypt($headerarray4['ape_tutor']);
        //         $headerarray4['email'] = decrypt($headerarray4['email']);
        //         $headerarray4['tlf'] = decrypt($headerarray4['tlf']);
        //         $headerarray4['direccion'] = $headerarray4['tipo_calle'].' '.decrypt($headerarray4['direccion']).' - '.$headerarray4['cp'].', '.decrypt($headerarray4['poblacion']).', '.decrypt($headerarray4['provincia']);
        //         unset($headerarray4['apellidos'], $headerarray4['ape_tutor'], $headerarray4['tipo_calle'], $headerarray4['cp'], $headerarray4['provincia'], $headerarray4['poblacion']);
        //         $headerarray4 = array_map("utf8_decode", $headerarray4);
        //         fputcsv($fp4, $headerarray4, ';');
        //     }
        // fclose($fp4);
        //
        //     //------OTRO------//
        //
        //     $fp5 = fopen('./tmp/cadete.csv', 'w');
        //
        //     // output the column headings
        //     $headerarray5 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
        //
        // fputcsv($fp5, $headerarray5);
        //
        // $selectexport5 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM $tablaTemp WHERE categoria = 'cadete'";
        //
        // $export5 = mysql_query($selectexport5) or die("Sql error : " . mysql_error());
        //
        //     // loop over the rows, outputting them
        //     while ($headerarray5 = mysql_fetch_assoc($export5)) {
        //         $headerarray5['nombre'] = decrypt($headerarray5['nombre']).' '.decrypt($headerarray5['apellidos']);
        //         $headerarray5['dni'] = decrypt($headerarray5['dni']);
        //         $headerarray5['nom_tutor'] = decrypt($headerarray5['nom_tutor']).' '.decrypt($headerarray5['ape_tutor']);
        //         $headerarray5['email'] = decrypt($headerarray5['email']);
        //         $headerarray5['tlf'] = decrypt($headerarray5['tlf']);
        //         $headerarray5['direccion'] = $headerarray5['tipo_calle'].' '.decrypt($headerarray5['direccion']).' - '.$headerarray5['cp'].', '.decrypt($headerarray5['poblacion']).', '.decrypt($headerarray5['provincia']);
        //         unset($headerarray5['apellidos'], $headerarray5['ape_tutor'], $headerarray5['tipo_calle'], $headerarray5['cp'], $headerarray5['provincia'], $headerarray5['poblacion']);
        //         $headerarray5 = array_map("utf8_decode", $headerarray5);
        //         fputcsv($fp5, $headerarray5, ';');
        //     }
        // fclose($fp5);
        //
        //     //------OTRO------//
        //
        //     $fp6 = fopen('./tmp/juvenil.csv', 'w');
        //
        //     // output the column headings
        //     $headerarray6 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
        //
        // fputcsv($fp6, $headerarray6);
        //
        // $selectexport6 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM j$tablaTemp WHERE categoria = 'juvenil'";
        //
        // $export6 = mysql_query($selectexport6) or die("Sql error : " . mysql_error());
        //
        //     // loop over the rows, outputting them
        //     while ($headerarray6 = mysql_fetch_assoc($export6)) {
        //         $headerarray6['nombre'] = decrypt($headerarray6['nombre']).' '.decrypt($headerarray6['apellidos']);
        //         $headerarray6['dni'] = decrypt($headerarray6['dni']);
        //         $headerarray6['nom_tutor'] = decrypt($headerarray6['nom_tutor']).' '.decrypt($headerarray6['ape_tutor']);
        //         $headerarray6['email'] = decrypt($headerarray6['email']);
        //         $headerarray6['tlf'] = decrypt($headerarray6['tlf']);
        //         $headerarray6['direccion'] = $headerarray6['tipo_calle'].' '.decrypt($headerarray6['direccion']).' - '.$headerarray6['cp'].', '.decrypt($headerarray6['poblacion']).', '.decrypt($headerarray6['provincia']);
        //         unset($headerarray6['apellidos'], $headerarray6['ape_tutor'], $headerarray6['tipo_calle'], $headerarray6['cp'], $headerarray6['provincia'], $headerarray6['poblacion']);
        //         $headerarray6 = array_map("utf8_decode", $headerarray6);
        //         fputcsv($fp6, $headerarray6, ';');
        //     }
        // fclose($fp6);
        //
        //     //------OTRO------//
        //
        //     $fp7 = fopen('./tmp/senior.csv', 'w');
        //
        //     // output the column headings
        //     $headerarray7 = array('Jugador;DNI;FechaNacimiento;Padre/Madre/Tutor;eMail;Telefono;Direccion');
        //
        // fputcsv($fp7, $headerarray7);
        //
        // $selectexport7 = "SELECT nombre,apellidos,dni,birthdate,nom_tutor,ape_tutor,email,tlf,tipo_calle,direccion,provincia,poblacion,cp FROM $tablaTemp WHERE categoria = 'senior'";
        //
        // $export7 = mysql_query($selectexport7) or die("Sql error : " . mysql_error());
        //
        //     // loop over the rows, outputting them
        //     while ($headerarray7 = mysql_fetch_assoc($export7)) {
        //         $headerarray7['nombre'] = decrypt($headerarray7['nombre']).' '.decrypt($headerarray7['apellidos']);
        //         $headerarray7['dni'] = decrypt($headerarray7['dni']);
        //         $headerarray7['nom_tutor'] = decrypt($headerarray7['nom_tutor']).' '.decrypt($headerarray7['ape_tutor']);
        //         $headerarray7['email'] = decrypt($headerarray7['email']);
        //         $headerarray7['tlf'] = decrypt($headerarray7['tlf']);
        //         $headerarray7['direccion'] = $headerarray7['tipo_calle'].' '.decrypt($headerarray7['direccion']).' - '.$headerarray7['cp'].', '.decrypt($headerarray7['poblacion']).', '.decrypt($headerarray7['provincia']);
        //         unset($headerarray7['apellidos'], $headerarray7['ape_tutor'], $headerarray7['tipo_calle'], $headerarray7['cp'], $headerarray7['provincia'], $headerarray7['poblacion']);
        //         $headerarray7 = array_map("utf8_decode", $headerarray7);
        //         fputcsv($fp7, $headerarray7, ';');
        //     }
        // fclose($fp7);

            //------OTRO------//

echo'
    <!--
	<a type="button" class="btn btn-fullList pull-right" name="exportfullList" href="tmp/listajugadores.csv"><span class="glyphicon glyphicon-save" aria-hidden="true"></span>EXPORTAR LISTA COMLPETA</a>
     -->

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

        $seleccionaPre= "SELECT * FROM $tablaTemp WHERE categoria = 'prebenjamin'";
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
						            <td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>
						          </tr>";
                            };
                            echo'
						        </tbody>
						       </table>
						      </div>

                  <!--
									<a type="button" class="btn btn-warning pull-right" name="exportpreb" href="tmp/prebenjamin.csv"><b>EXPORTAR</b></a>
                  -->
                  ';
                        };
        echo'
    </div>
    <div id="benja" class="tab-pane fade">
      <h3>Benjamín</h3>';

        $seleccionaBenja= "SELECT * FROM $tablaTemp WHERE categoria = 'benjamin'";
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
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

            <!--
			      <a type="button" class="btn btn-warning pull-right" name="exportbenja" href="tmp/benjamin.csv"><b>EXPORTAR</b></a>
            -->
            ';
            };
        echo'
    </div>
    <div id="alev" class="tab-pane fade">
      <h3>Alevín</h3>';

        $seleccionaAle = "SELECT * FROM $tablaTemp WHERE categoria = 'alevin'";
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
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <!--
            <a type="button" class="btn btn-warning pull-right" name="exportalev" href="tmp/alevin.csv"><b>EXPORTAR</b></a>
            -->
            ';
            };
        echo'
    </div>
    <div id="infa" class="tab-pane fade">
      <h3>Infantil</h3>';

        $seleccionaInfa= "SELECT * FROM $tablaTemp WHERE categoria = 'infantil'";
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
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <!--
            <a type="button" class="btn btn-warning pull-right" name="exportinfa" href="tmp/infantil.csv"><b>EXPORTAR</b></a>
            -->
            ';
            };
        echo'
    </div><div id="cadet" class="tab-pane fade">
      <h3>Cadete</h3>';

        $seleccionaCade= "SELECT * FROM $tablaTemp WHERE categoria = 'cadete'";
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
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <!--
            <a type="button" class="btn btn-warning pull-right" name="exportcade" href="tmp/cadete.csv"><b>EXPORTAR</b></a>
            -->
            ';
            };
        echo'
    </div><div id="juve" class="tab-pane fade">
      <h3>Juvenil</h3>';

        $seleccionaJuve= "SELECT * FROM $tablaTemp WHERE categoria = 'juvenil'";
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
									<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <!--
            <a type="button" class="btn btn-warning pull-right" name="exportjuve" href="tmp/juvenil.csv"><b>EXPORTAR</b></a>
            -->
            ';
            };
        echo'
    </div><div id="seni" class="tab-pane fade">
      <h3>Senior</h3>';

        $seleccionaSenior= "SELECT * FROM $tablaTemp WHERE categoria = 'senior'";
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
			            <td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>
								</tr>";
                };
                echo'
			        </tbody>
			       </table>
			      </div>

			      <!--
            <a type="button" class="btn btn-warning pull-right" name="exportsenior" href="tmp/senior.csv"><b>EXPORTAR</b></a>
            -->
            ';
            };
        echo'

    </div>
  </div>

</div>';

        foreach ($arraypedidos as $id) {
            $seleccionaModal= "SELECT * FROM $tablaTemp WHERE pedido = '$id'";

            $resultadoModal=mysql_query($seleccionaModal, $ilink) or die(mysql_error());
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

            $primerpago = $filaModal['primerpago'];
            $segundopago = $filaModal['segundopago'];
            $tercerpago = $filaModal['tercerpago'];
            $pagoextra = $filaModal['pagoextra'];

            $lopd1 = ($filaModal['termsimage1']);
            $lopd2 = ($filaModal['termsimage2']);
            $lopd3 = ($filaModal['termsimage3']);
            $lopd4 = ($filaModal['termsimage4']);

                    // $vb = iconv("UTF-8", "ISO-8859-1", $nombretut);


        echo "

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

				";
        };

        include("sidebar.php");
        include("footer.php");
    } //--------------BIG-ENDIF------------------------------
}

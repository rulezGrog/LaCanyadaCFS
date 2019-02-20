<?php
require("header.php"); 

$idEquipo = $_GET['id']; 

$selectEquipo = "SELECT * FROM equipos WHERE idequipo = '$idEquipo' ";
$resultadoEquipo = mysql_query($selectEquipo, $ilink) or die(mysql_error());
$filaEquipo = mysql_fetch_array($resultadoEquipo);

$categoria = $filaEquipo['categoria'];
$idEntrenador = $filaEquipo['entrenador'];
$nickEquipo = $filaEquipo['nickequipo'];

$selectEntrenador = "SELECT * FROM entrenadores WHERE idcoach = '$idEntrenador' ";
$resultadoEntrenador = mysql_query($selectEntrenador, $ilink) or die(mysql_error());
$filaEntrenador = mysql_fetch_array($resultadoEntrenador);

$nombreCoach = decrypt($filaEntrenador['nombre']);
$apellidoCoach = decrypt($filaEntrenador['apellidos']);

$selectJugadores = "SELECT * FROM jugadores WHERE categoria = '$categoria' AND  idequipo = '$idEquipo' ";
$resultadoJugadores = mysql_query($selectJugadores, $ilink) or die(mysql_error());

$selectJugadoresNULL = "SELECT * FROM jugadores WHERE categoria = '$categoria' AND  idequipo IS NULL ";
$resultadoJugadoresNULL = mysql_query($selectJugadoresNULL, $ilink) or die(mysql_error());
// $filaJugadores = mysql_fetch_array($resultadoJugadores);

$aux1 = 0;
$aux2 = 0;

?>

<div class="headTitle">
    <span class="headTitleText"><h2> > <?php echo $nickEquipo.' - '.$categoria; ?> </h2></span>
</div>

<div class="container">

    <div class="bs-callout bs-callout-danger" style="margin-bottom: 50px;">
        <h4>Entrenador:</h4>
        <?php if ($nombreCoach == ''){ ?>
        <p>Equipo sin entrenador.  
            <button type='button' class='btn btn-info btn-xs' name='addToTeamBut' data-toggle='modal' data-target='#addToTeam-<?php ?>'><a href='#'><i class='glyphicon glyphicon-plus'></i> ASIGNAR</a></button>
        </p> 
        <?php }else{ ?>
        <p><?php echo $nombreCoach.' '.$apellidoCoach; ?></p>
        <?php } ?>
    </div>
            
            <?php
            while ($filaJugadores = mysql_fetch_array($resultadoJugadores)) {
                $nombre = decrypt($filaJugadores['nombre']);
                $apellido = decrypt($filaJugadores['apellidos']);
                $numpedido = ($filaJugadores['pedido']);
                // $arraypedidos [] = $numpedido;
                $fenix = ($filaJugadores['fenix']);
                $revision = ($filaJugadores['revision']);
                $ficha = ($filaJugadores['ficha']);
                $termsimage1 = ($filaJugadores['termsimage1']);
                $termsimage2 = ($filaJugadores['termsimage2']);
                $termsimage3 = ($filaJugadores['termsimage3']);
                $termsimage4 = ($filaJugadores['termsimage4']);
                $idJugadorEquipo = ($filaJugadores['idequipo']);
                
                    if ($aux1 == 0) { ?>       
                        <div class="table-responsive tablaJugadores" style="margin-bottom:40px;">
                        <table class="table table-striped">
                        <h3>Jugadores pertenecientes a <?php echo $nickEquipo ?>:</h3>
                            <thead>
                                <tr>
                                    <th class="celdaNumJugador">#</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th class="textoTHRotado"><div><span>Alta Fénix</span></div></th>
                                    <th class="textoTHRotado"><div><span>Revisión Médica</span></div></th>
                                    <th class="textoTHRotado"><div><span>Ficha Emitida</span></div></th>
                                    <th>LOPD</th>
                                    <th> </th>
                                    <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) { ?>
                                    <!--<th> </th>
                                    <th> </th>
                                    <th> </th>-->
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                                <?php         
                                }                                       
                                $aux1 += 1; ?>
                                <tr>
                                    <td class="celdaNumJugador">
                                        <span class="numJugador">
                                            <?php 
                                            echo $aux1;
                                            ?>
                                        </span>
                                    </td>
                                    <td><?php echo $nombre; ?></td>
                                    <td><?php echo $apellido; ?></td>
                                    <td class='nopadding-bot'>
                                    <?php
                                        if ($fenix == 1) {
                                            echo "<span style='color:green;' class='glyphicon glyphicon-ok-sign iconTablaJugador'></span>";
                                        } else if ($fenix == 2){
                                            echo "<span style='color:darkred;' class='glyphicon glyphicon-remove-sign iconTablaJugador'></span>";
                                        } else {
                                            echo "<span style='color:grey;' class='glyphicon glyphicon-question-sign iconTablaJugador'></span>";
                                        }
                                    ?>
                                    </td>
                                    <td class='nopadding-bot'>
                                    <?php
                                        if ($revision == 1) {
                                            echo "<span style='color:green;' class='glyphicon glyphicon-ok-sign iconTablaJugador'></span>";
                                        } else if ($revision == 2) {
                                            echo "<span style='color:darkred;' class='glyphicon glyphicon-remove-sign iconTablaJugador'></span>";
                                        } else {
                                            echo "<span style='color:grey;' class='glyphicon glyphicon-question-sign iconTablaJugador'></span>";
                                        }
                                    ?>
                                    </td>
                                    <td class='nopadding-bot'>
                                    <?php
                                        if ($ficha == 1) {
                                            echo "<span style='color:green;' class='glyphicon glyphicon-ok-sign iconTablaJugador'></span>";
                                        } else if ($ficha == 2) {
                                            echo "<span style='color:darkred;' class='glyphicon glyphicon-remove-sign iconTablaJugador'></span>";
                                        } else {
                                            echo "<span style='color:grey;' class='glyphicon glyphicon-question-sign iconTablaJugador'></span>";
                                        }
                                    ?>
                                    </td>
                                    <td>
                                    <?php

                                    if ($termsimage1 == 1) {
                                        echo"<span title='SÍ a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.' class='label label-success'>1</span> ";
                                    } else {
                                        echo"<span title='NO a : La captación y reproducción, sea cual sea el medio utilizado para ello, de su imagen (y, en su caso, la de su hij@) durante su participación o presencia en cualquier evento deportivo en el que participe.'  class='label label-danger'>1</span> ";
                                    }

                                    if ($termsimage2 == 1) {
                                        echo"<span title='SÍ a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-success'>2</span> ";
                                    } else {
                                        echo"<span title='NO a : La inclusión de las imágenes en agendas, carteles, trípticos y demás material utilizado para publicitar, apoyar o difundir las actividades deportivas de la Asopciación.' class='label label-danger'>2</span> ";
                                    }

                                    if ($termsimage3 == 1) {
                                        echo"<span title='SÍ a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-success'>3</span> ";
                                    } else {
                                        echo"<span title='NO a :  La utilización de las imágenes para ilustrar las noticias remitidas a www.lacanyadacfs.com/.' class='label label-danger'>3</span> ";
                                    }

                                    if ($termsimage4 == 1) {
                                        echo"<span title='SÍ a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-success'>4</span>";
                                    } else {
                                        echo"<span title='NO a : La utilización de las imágenes para ilustrar las noticias remitidas a páginas de Internet desarrolladas dentro del ámbito de la Asociación, como Facebook, Twitter, y YouTube.' class='label label-danger'>4</span> ";
                                    }
                                    ?>
                                    </td>
                                    <!--<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>-->
                                    <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) { ?>
                                    
                                    <!--<td><button type='button' class='btn btn-success btn-xs' name='editbut' data-toggle='modal' data-target='#editarModal-$numpedido'><a href='#'>EDITAR</a></button></td>
                                    <td><button type='button' class='btn btn-danger btn-xs' name='bajabut' data-toggle='modal' data-target='#bajaModal-$numpedido'><a href='#'>BAJA</a></button></td>-->

                                    <td><button type='button' class='btn btn-warning btn-xs' name='quitToTeamBut' data-toggle='modal' data-target='#quitToTeam-<?php echo $numpedido; ?>'><a href='#'><i class='glyphicon glyphicon-minus'></i> RETIRAR</a></button></td>
                                    <div class="modal fade bs-example-modal-sm" id="quitToTeam-<?php echo $numpedido; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form class="form-horizontal" role="form" action="operaciones.php?oper=jugadorToTeamNULL" method="POST">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                            <h4 class="modal-title" id="myModalLabel">¿Estás seguro de retirar a <?php echo $nombre; ?> del Equipo?</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <input type="text" name="idJugador" value="<?php echo $numpedido; ?>" hidden>
                                                            <!--<p>Esta acción <strong>NO</strong> tendrá vuelta atrás y los datos borrados no podrán ser recuperados, aún así, ¿estas seguro de querer borrar al jugador?</p>-->
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">NO</button>
                                                            <button type="submit" class="btn btn-success btn-sm">SI</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                    <?php } 
                    }; //end-while ?>            
                            </tbody>
                        </table>
                        </div>                        
                                                
                <?php

                while ($filaJugadoresNULL = mysql_fetch_array($resultadoJugadoresNULL)) {
                    $nombreNULL = decrypt($filaJugadoresNULL['nombre']);
                    $apellidoNULL = decrypt($filaJugadoresNULL['apellidos']);
                    $numpedidoNULL = ($filaJugadoresNULL['pedido']);
                    // $arraypedidos [] = $numpedido;
                    $fenixNULL = ($filaJugadoresNULL['fenix']);
                    $revisionNULL = ($filaJugadoresNULL['revision']);
                    $fichaNULL = ($filaJugadoresNULL['ficha']);
                    $termsimage1NULL = ($filaJugadoresNULL['termsimage1']);
                    $termsimage2NULL = ($filaJugadoresNULL['termsimage2']);
                    $termsimage3NULL = ($filaJugadoresNULL['termsimage3']);
                    $termsimage4NULL = ($filaJugadoresNULL['termsimage4']);
                    $idJugadorEquipoNULL = ($filaJugadoresNULL['idequipo']);

                    if ($aux2 == 0) { ?>                    
                     <div class="table-responsive tablaJugadores">
                        <table class="table table-striped">
                        <h3>Jugadores en <?php echo $categoria; ?> SIN EQUIPO</h3>
                            <thead>
                                <tr>
                                    <th class="celdaNumJugador">#</th>
                                    <th>Nombre</th>
                                    <th>Apellidos</th>
                                    <th> </th>
                                    <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) { ?>
                                    <!--<th> </th>
                                    <th> </th>-->
                                    <?php } ?>
                                </tr>
                            </thead>
                            <tbody>
                    <?php 
                    }                    
                    $aux2 += 1;  
            ?>
            <tr>
                <td class="celdaNumJugador">
                    <span class="numJugador">
                        <?php 
                            echo $aux2;
                        ?>
                    </span>
                </td>
				<td><?php echo $nombreNULL; ?></td>
				<td><?php echo $apellidoNULL; ?></td>                
				<!--<td><button type='button' class='btn btn-info btn-xs' name='infobut' data-toggle='modal' data-target='#infoModal-$numpedido'><a href='#'>+INFO</a></button></td>-->
                <?php if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) { ?>
                				
                <!--<td><button type='button' class='btn btn-primary btn-xs' name='ascenbut' data-toggle='modal' data-target='#ascensoModal-$numpedido'><a href='#'><span class='glyphicon glyphicon-circle-arrow-up'></span> Ascender</a></button></</td>-->

                <td><button type='button' class='btn btn-info btn-xs' name='addToTeamBut' data-toggle='modal' data-target='#addToTeam-<?php echo $numpedidoNULL; ?>'><a href='#'><i class='glyphicon glyphicon-plus'></i> ASIGNAR</a></button></td>
                <div class="modal fade bs-example-modal-sm" id="addToTeam-<?php echo $numpedidoNULL; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <form class="form-horizontal" role="form" action="operaciones.php?oper=jugadorToTeam&id=<?php echo $idEquipo; ?>" method="POST">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">¿Estás seguro de asignar a <?php echo $nombreNULL; ?> al Equipo?</h4>
                                    </div>
                                    <div class="modal-body">
                                        <input type="text" name="idJugador" value="<?php echo $numpedidoNULL; ?>" hidden>
                                        <!--<p>Esta acción <strong>NO</strong> tendrá vuelta atrás y los datos borrados no podrán ser recuperados, aún así, ¿estas seguro de querer borrar al jugador?</p>-->
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">NO</button>
                                        <button type="submit" class="btn btn-success btn-sm">SI</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                <?php } ?>
            </tr>
            <?php 
                } //end-while ?>
            
		</tbody>
	</table>
	</div>

	<a type="button" class="btn btn-warning pull-right" name="exportpreb" href="#"><b>EXPORTAR</b></a>

</div><!-- /container -->
<?php
include("sidebar.php");
include("footer.php");
?>
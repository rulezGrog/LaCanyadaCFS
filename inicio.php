
<?php

include("header.php");

$selecciona2= "SELECT * FROM admins";
$resultado2=mysql_query($selecciona2, $ilink) or die(mysql_error());
$numfilas = mysql_num_rows($resultado2); // obtenemos el número de filas


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        if ($_SESSION['INFO'] == 1) {
            $selectUltimos = "SELECT * FROM jugadores ORDER BY pedido DESC limit 10";
            $resultadoUltimos = mysql_query($selectUltimos, $ilink) or die(mysql_error());
            $numfilasUltimos = mysql_num_rows($resultadoUltimos);

            $Jugadores = "SELECT pedido FROM jugadores";
            $resulJuga = mysql_query($Jugadores, $ilink) or die(mysql_error());
            $rowsJuga = mysql_num_rows($resulJuga);
            $numJugaPre = "SELECT categoria FROM jugadores WHERE categoria='prebenjamin'";
            $numJugaBenja = "SELECT categoria FROM jugadores WHERE categoria='benjamin'";
            $numJugaAle = "SELECT categoria FROM jugadores WHERE categoria='alevin'";
            $numJugaInfa = "SELECT categoria FROM jugadores WHERE categoria='infantil'";
            $numJugaCade = "SELECT categoria FROM jugadores WHERE categoria='cadete'";
            $numJugaJuv = "SELECT categoria FROM jugadores WHERE categoria='juvenil'";
            $numJugaSen = "SELECT categoria FROM jugadores WHERE categoria='senior'";

            $JugadoresNE = "SELECT pedido FROM jugadores WHERE equipacion ='SI'";
            $resulJugaNE = mysql_query($JugadoresNE, $ilink) or die(mysql_error());
            $rowsJugaNE = mysql_num_rows($resulJugaNE);

            $JugadoresPP = "SELECT pedido FROM jugadores WHERE primerpago<>'0'";
            $resulJugaPP = mysql_query($JugadoresPP, $ilink) or die(mysql_error());
            $rowsJugaPP = mysql_num_rows($resulJugaPP);
            $JugadoresSP = "SELECT pedido FROM jugadores WHERE segundopago<>'0'";
            $resulJugaSP = mysql_query($JugadoresSP, $ilink) or die(mysql_error());
            $rowsJugaSP = mysql_num_rows($resulJugaSP);
            $JugadoresTP = "SELECT pedido FROM jugadores WHERE tercerpago<>'0'";
            $resulJugaTP = mysql_query($JugadoresTP, $ilink) or die(mysql_error());
            $rowsJugaTP = mysql_num_rows($resulJugaTP);
            $JugadoresPE = "SELECT pedido FROM jugadores WHERE pagoextra<>'0'";
            $resulJugaPE = mysql_query($JugadoresPE, $ilink) or die(mysql_error());
            $rowsJugaPE = mysql_num_rows($resulJugaPE);

            $rowsJugaTOTAL = $rowsJugaPP + $rowsJugaSP + $rowsJugaTP + $rowsJugaPE;


         //OR segundopago<>'0' OR tercerpago<>'0' OR pagoextra<>'0'

            $mesactual = date('n');
            if ($mesactual >= 7) {
                $oldTable = 'temp'.($temporada-1);
                // echo $oldTable;
                $oldTempResult = mysql_query("SHOW TABLES LIKE '$oldTable'");
                // echo $oldTempResult.' <--> ';
                $existen = mysql_num_rows($oldTempResult);
                // echo $existen.' <--> ';

                /* Si no existe la tabla */
                if ($existen == 0) {
                    $_SESSION["newTemp"] = 'SI';
                    echo '
                  <script type="text/javascript">
                      $(window).load(function(){
                          $("#ModalINFO").modal("show");
                      });
                  </script>';
                } else {
                    $_SESSION["newTemp"] = 'NO';
                }
            } else {
                $_SESSION["newTemp"] = 'NO';
            }

            echo '
	<!--AUTOLUCH MODAL INFO DEL ESTADO DEL DESARROLLO
	<script type="text/javascript">
	    $(window).load(function(){
	        $("#ModalINFO").modal("show");
	    });
	</script>-->

	<div class="modal fade bs-example-modal-sm" id="ModalINFO" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	      <div class="modal-header">
	        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
	        <h4 class="modal-title text-center" id="myModalLabel">COSAS AUN POR TERMINAR EN LA BASE DE DATOS</h4>
	      </div>
				<div class="modal-body">

				<ul class="list-group">
					<li class="list-group-item list-group-item-success"><strong>EL FORMULARIO DE REGISTRO INTERNO DE JUGADORES ESTA EN FASE DE DESARROLLO, NO LOCALIZA ENTRADAS INCORRECTAS, PERO ES FUNCIONAL.</strong></li>
				</ul>
				<ul class="list-group">
					<li class="list-group-item list-group-item-info">Botones EXPORTAR Y EDITAR de las categorías</li>
					<li class="list-group-item list-group-item-warning">Sección Temporadas Anteriores</li>
					<li class="list-group-item list-group-item-danger">TERMINAR CORRECTAMNETE EL FORMULARIO INTERNO DE NUEVO JUGADOR</li>
				</ul>
      	</div>
	      <div class="modal-footer">
	        	<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">[CERRAR]</button>
	      </div>
	    </div>
	  </div>
	</div>

	';
        }; // endif


        echo '
    <div class="headTitle">
    		<span class="headTitleText"><h2>
          > TEMPORADA " ';
        echo $temporada;
        echo' - ';
        echo $temporada+1;
        echo "
        \"</h2></span>
		</div>
    <div class='container'>
		<div class='col-md-4'>
		<div class='panel panel-info'>
				<div class='panel-heading'>Número de Jugadores</div>
					<div class='panel-body'>
						<p class='lead no-margin-bottom'><span class='lead label label-default'>$rowsJuga</span></p>
					</div>
		</div>
		</div>

		<div class='col-md-4'>
		<div class='panel panel-info'>
				<div class='panel-heading'>Jugadores sin equipacióin</div>
					<div class='panel-body'>
						<p class='lead no-margin-bottom'><span class='lead label label-default'>$rowsJugaNE</span></p>
					</div>
		</div>
		</div>

		<div class='col-md-4'>
		<div class='panel panel-info'>
				<div class='panel-heading'>Número de pagos pendientes</div>
					<div class='panel-body'>
						<p class='lead no-margin-bottom'><span class='label label-default'>$rowsJugaTOTAL</span></p>
						<!--<p><span class='value'>$rowsJugaPP $rowsJugaSP $rowsJugaTP $rowsJugaPE</span></p>-->
					</div>
		</div>
		</div>

		<br>
		<div class='col-md-12'>
		<div class='panel panel-warning'>
		  <div class='panel-heading'>
		    <h3 class='panel-title'>Últimos 10 registros de jugadores</h3>
		  </div>
				<table class='table table-striped'>
				<thead>
					<tr>
						<th>Jugador</th>
						<th>Categoría</th>
					</tr>
				</thead>
				<tbody>";
        while ($filaUltimos = mysql_fetch_array($resultadoUltimos)) {
            $nombreUlt = decrypt($filaUltimos['nombre']);
            $apellidoUlt = decrypt($filaUltimos['apellidos']);
            $categoriaUlt =  ($filaUltimos['categoria']);

            echo"<tr>
							<td>$nombreUlt $apellidoUlt</td>
							<td>$categoriaUlt</td>
						</tr>
						";
        }
        echo '
				</tbody>
				</table>
		</div>
		</div>


<!--
<div class="boxInfo">
<div class="row">
  <div class="col-md-3 col-md-offset-3 borderInfo1">
    <div class="boxInerInfo">TOTAL JUGADORES:</div>
  </div>
  <div class="col-md-3 borderInfo2">
    <div class="boxInerInfo">ÚLTIMAS INCORPORACIONES</div>
  </div>
</div>
<div class="row">
  <div class="col-md-3 col-md-offset-3 borderInfo3">
    <div class="boxInerInfo">JAGADORES SIN EQUIPACIÓN</div>
  </div>
  <div class="col-md-3 borderInfo4">
    <div class="boxInerInfo">PAGOS PENDEINTES</div>
  </div>
</div>
</div>
-->

</div><!--container-->
  </body>
</html>';
    }
    include("sidebar.php");
    include("footer.php");
}

?>

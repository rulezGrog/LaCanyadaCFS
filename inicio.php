<?php
require('header.php');

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
            $resulJugaPre = mysql_query($numJugaPre, $ilink) or die(mysql_error());
            $rowsJugaPre = mysql_num_rows($resulJugaPre);

            $numJugaBenja = "SELECT categoria FROM jugadores WHERE categoria='benjamin'";
            $resulJugaBen = mysql_query($numJugaBenja, $ilink) or die(mysql_error());
            $rowsJugaBen = mysql_num_rows($resulJugaBen);

            $numJugaAle = "SELECT categoria FROM jugadores WHERE categoria='alevin'";
            $resulJugaAle = mysql_query($numJugaAle, $ilink) or die(mysql_error());
            $rowsJugaAle = mysql_num_rows($resulJugaAle);

            $numJugaInfa = "SELECT categoria FROM jugadores WHERE categoria='infantil'";
            $resulJugaInfa = mysql_query($numJugaInfa, $ilink) or die(mysql_error());
            $rowsJugaInfa = mysql_num_rows($resulJugaInfa);

            $numJugaCade = "SELECT categoria FROM jugadores WHERE categoria='cadete'";
            $resulJugaCade = mysql_query($numJugaCade, $ilink) or die(mysql_error());
            $rowsJugaCade = mysql_num_rows($resulJugaCade);

            $numJugaJuv = "SELECT categoria FROM jugadores WHERE categoria='juvenil'";
            $resulJugaJuv = mysql_query($numJugaJuv, $ilink) or die(mysql_error());
            $rowsJugaJuv = mysql_num_rows($resulJugaJuv);

            $numJugaSen = "SELECT categoria FROM jugadores WHERE categoria='senior'";
            $resulJugaSen = mysql_query($numJugaSen, $ilink) or die(mysql_error());
            $rowsJugaSen = mysql_num_rows($resulJugaSen);



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
            $Jugadores4P = "SELECT pedido FROM jugadores WHERE cuartopago<>'0'";
            $resulJuga4P = mysql_query($Jugadores4P, $ilink) or die(mysql_error());
            $rowsJuga4P = mysql_num_rows($resulJuga4P);
            $Jugadores5P = "SELECT pedido FROM jugadores WHERE quintopago<>'0'";
            $resulJuga5P = mysql_query($Jugadores5P, $ilink) or die(mysql_error());
            $rowsJuga5P = mysql_num_rows($resulJuga5P);
            $JugadoresPE = "SELECT pedido FROM jugadores WHERE pagoextra<>'0'";
            $resulJugaPE = mysql_query($JugadoresPE, $ilink) or die(mysql_error());
            $rowsJugaPE = mysql_num_rows($resulJugaPE);

            $rowsJugaTOTAL = $rowsJugaPP + $rowsJugaSP + $rowsJugaTP + $rowsJuga4P + $rowsJuga5P + $rowsJugaPE;


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

    <div class='container2'>
    <div class='fila' id='statics'>

        <div class='panel no-panel col-md-4'>
        	<div class='statics-panel'>
              <div class='statics-number statics-Blue'>
                $rowsJuga
              </div>
              <div class='statics-text'>
                TOTAL JUGADORES
              </div>
              <button type='button' class='panel icon-top-left font-green' data-toggle='collapse' href='#jugadoresStatics' data-parent='#statics'>
                <span class='glyphicon glyphicon-plus'></span>
              </button>
        	</div>
              <div id='jugadoresStatics' class='collapse sub-statics col-md-12'>
                <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Green'>$rowsJugaPre</span>Pre-Benjamín</div>
                <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Green'>$rowsJugaBen</span>Benjamín</div>
                <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Green'>$rowsJugaAle</span>Alevín</div>
                <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Green'>$rowsJugaInfa</span>Infantil</div>
                <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Green'>$rowsJugaCade</span>Cadete</div>
                <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Green'>$rowsJugaJuv</span>Juvenil</div>
                <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Green'>$rowsJugaSen</span>Senior</div>
              </div>
        </div>

      <div class='panel no-panel col-md-4'>
        <div class='statics-panel'>
            <div class='statics-number statics-Red'>
              $rowsJugaNE
            </div>
            <div class='statics-text'>
              JUGADORES SIN EQUIPACIÓN
            </div>
        </div>
      </div>

      <div class='panel no-panel col-md-4'>
        <div class='statics-panel'>
            <div class='statics-number statics-Green'>
              $rowsJugaTOTAL
            </div>
            <div class='statics-text'>
              PAGOS PENDIENTES
            </div>
            <button type='button' class='panel icon-top-left font-green' data-toggle='collapse' href='#pagosStatics' data-parent='#statics'>
              <span class='glyphicon glyphicon-plus'></span>
            </button>
        </div>
            <div id='pagosStatics' class='collapse sub-statics col-md-12'>
              <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Blue'>$rowsJugaPP</span>Primer pago</div>
              <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Blue'>$rowsJugaSP</span>Segundo pago</div>
              <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Blue'>$rowsJugaTP</span>Tercer pago</div>
              <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Blue'>$rowsJuga4P</span>Cuarto pago</div>
              <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Blue'>$rowsJuga5P</span>Quinto pago</div>
              <div class='col-md-6 statics-small-text'><span class='statics-small-number statics-Blue'>$rowsJugaPE</span>Pago extra</div>
            </div>
      </div>

    </div><!--/.fila-->

    <div class='fila'>
  		<div class='col-md-12'>
  		<div class='box box-info'>
  		  <div class='box-header info-color'>
  		    <h3 class='box-title'>Últimos 10 registros de jugadores</h3>
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
    </div><!--/.fila-->
    </div><!--/.container2-->
  </body>
</html>';
    }
    include("sidebar.php");
    include("footer.php");
}

?>

<?php  include("header.php");


if(!isset($_SESSION['admin']) ) //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
{

}else{

	if($_SESSION['level'] == 0)
  {
    echo '<div class="container">

            <h1 class="text-center">CREAR NUEVA TEMPORADA</h1>

            <br><br>

            <div class="panel panel-warning">
              <div class="panel-heading">
                <h3 class="panel-title">Crear nueva temproada</h3>
              </div>
              <div class="panel-body">
                <p>La creación de una nueva temporada supone el volcado de la <b>MAYORÍA de los datos</b> de la temproada actual en
                una tabla paralela en la base de datos donde se guardan los datos báscios de los jugadores de temporadas pasadas,
                y el borrado de TODOS los datos de la temporada actual. Este proceso <b>NO TIENE MARCHA ATRÁS</b>, por lo que no utilice
                esta opción si realmente no está al 100% seguro de pasar a una nueva temporada. Datos bancarios, los concernientes
                a la Ley de Protección de Datos, mensajes, números de teléfono, tutores y dirección, serán desechados y <b>NO PODRÁN
                RECUPERARSE</b>.</p>
                <br>
                <button type="button" name="newseasonBut" data-toggle="modal" data-target="#newseasonModal" class="btn btn-danger pull-right">Crear nueva temporada</button>
              </div>
            </div>


            <div class="modal fade bs-example-modal-md" tabindex="-1" id="newseasonModal" role="dialog" aria-labelledby="mySmallModalLabel">
              <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel"><p>¿Estas realmente seguro de crear la nueva temporada?</p> <p><b>NO TIENE VUELTA ATRÁS</b>.</p></h4>
                  </div>
                	<div class="modal-body">
                    <button type="button" name="newseasonBut2" class="btn btn-primary pull-center" data-dismiss="modal">No</button>
                    <button type="button" name="newseasonBut2" class="btn btn-danger pull-right">Sí</button>
                    <br><br>
                  </div>
                </div>
              </div>
            </div>
















    </div>';
    };

    include("sidebar.php");
    include("footer.php");

  } //--------------BIG-ENDIF------------------------------
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="css/lacanyada.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  </head>
  <body>

    <?php
    		//conexion a Socios

    		//LOCAL******************

    		define ('DB_HOST_AG', 'localhost');
    		define ('DB_USER_AG', 'root');
    		define ('DB_PASS_AG', '');
    		define ('DB_NAME_AG', 'lacanyada');

    		//ONLINE******************

    		// define ('DB_HOST_AG', 'db630685183.db.1and1.com');
    		// define ('DB_USER_AG', 'dbo630685183');
    		// define ('DB_PASS_AG', 'Lacanyada12');
    		// define ('DB_NAME_AG', 'db630685183');

    		$ilink=mysql_connect(DB_HOST_AG, DB_USER_AG, DB_PASS_AG) or die(mysql_error());
    		$dgAg = mysql_select_db(DB_NAME_AG,$ilink);


    //Comenzamos la sesión, esto se explica despues en el Sistema de Login
    session_start();

    $seleccionaModal= "SELECT * FROM jugadores WHERE pedido = 'Gerado50881821WW'";
  	$resultadoModal=mysql_query($seleccionaModal,$ilink) or die (mysql_error());
  	$filaModal = mysql_fetch_array($resultadoModal);

  	$nombretut = ($filaModal['']); //isset
  	$apellidostut = ($filaModal['']); //isset
  	$nombre = ($filaModal['nombre']);
  	$apellidos = ($filaModal['apellidos']);
  	$dni = ($filaModal['dni']);
  	$birthdate = ($filaModal['birthdate']);
  	$telefono = ($filaModal['tlf']);
  	$email = ($filaModal['email']);
  	$via = ($filaModal['tipo_calle']);
  	$direccion = ($filaModal['direccion']);
  	$poblacion = ($filaModal['poblacion']);
  	$provincia = ($filaModal['provincia']);
  	$cp = ($filaModal['cp']);
  	$mesaje = ($filaModal['mensaje']); //isset
  	$importe = ($filaModal['importe']);
  	$nombrecuenta = ($filaModal['']); //isset
  	$apecuenta = ($filaModal['']); //isset
  	$numcuenta = ($filaModal['']); //isset
  	$categoria = ($filaModal['categoria']);
  	$temporada = ($filaModal['temporada']);

    setlocale(LC_ALL, 'es_ES', 'esp_esp', 'esp_spain', 'spanish_esp', 'spanish_spain');

    ?>



    <div class='modal fade bs-example-modal-lg' id='infoModal-$id' tabindex='-1' role='dialog' aria-labelledby='myModalLabel'>
      <div class='modal-dialog modal-lg' role='document'>
        <div class='modal-content'>
          <div class='modal-header'>
            <button type='button' class='close' data-dismiss='modal' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
            <h4 class='modal-title' id='myModalLabel'>INFORMACIÓN DEL JUGADOR - <?php echo $nombre.' '.$apellidos; ?></h4>
          </div>
    			<div class='modal-body'>
              <div class="modalInfoPlayerHead">
                <div>
                  <img style="float:left;" class="modalFotoPlayer" src="img/avatars/zoidberg.png" alt="" />
                  <h2><?php echo $nombre.' '.$apellidos; ?></h2>
                  <div class="infoPlayerLeft">
                      <p><strong>Fecha de nacimiento:</strong> <?php echo strftime('%d de %B de %Y', strtotime($birthdate)); ?></p>
                      <p><strong>Categoría</strong>: <?php echo $categoria ?></p>
                  </div>
                  <div class="infoPlayerRight">
                    <p><strong>Fecha de nacimiento:</strong> <?php echo strftime('%d de %B de %Y', strtotime($birthdate)); ?></p>
                    <p><strong>Categoría HOLa</strong>: <?php echo $categoria ?></p>
                  </div>
                </div>
              </div>
          </div>
          <div class='modal-footer'>
            	<button type='button' class='btn btn-primary btn-sm' data-dismiss='modal'>CERRAR</button>
          </div>
        </div>
      </div>
    </div>

    <button class='btn btn-primary' type='button' data-toggle='collapse' data-target='#collapseExample' aria-expanded='false' aria-controls='collapseExample'>
      Abrir Mensaje
    </button>
    <div class='collapse' id='collapseExample'>
      <div class='well'>
        <p> <?php echo $mensaje ?></p>
      </div>
    </div>

    <div class='panel-group' id='accordion' role='tablist' aria-multiselectable='true'>
      <div class='panel panel-default'>
        <div class='panel-heading' role='tab' id='headingOne'>
          <h4 class='panel-title'>
            <a role='button' data-toggle='collapse' data-parent='#accordion' href='#collapseOne' aria-expanded='true' aria-controls='collapseOne'>
              MENSAJE: (Haz click)
            </a>
          </h4>
        </div>
        <div id='collapseOne' class='panel-collapse collapse' role='tabpanel' aria-labelledby='headingOne'>
          <div class='panel-body'>
            <p> <?php echo $mensaje ?></p>
          </div>
        </div>
      </div>
    </div>



  </body>
</html>

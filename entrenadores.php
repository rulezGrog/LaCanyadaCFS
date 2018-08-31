<script type="text/javascript">
    $(document).on('click', '.browse', function() {
      var file = $(this).parent().parent().parent().find('.file');
      file.trigger('click');
    });
    $(document).on('change', '.file', function() {
      $(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
    });
  </script>

   

  <style>

  .fileUpload {
    position: relative;
    overflow: hidden;
    margin: 10px;
}
.fileUpload input.upload {
    position: absolute;
    top: 0;
    right: 0;
    margin: 0;
    padding: 0;
    font-size: 20px;
    cursor: pointer;
    opacity: 0;
    filter: alpha(opacity=0);
}
                                    .fileContainer {
                                        overflow: hidden;
                                    }
                                    
                                    .fileContainer [type=file] {
                                        cursor: inherit;
                                        display: block;
                                        font-size: 999px;
                                        filter: alpha(opacity=0);
                                        min-height: 100%;
                                        min-width: 100%;
                                        opacity: 0;
                                        position: absolute;
                                        right: 0;
                                        text-align: right;
                                        top: 0;
                                    }
                                    
                                    /* Example stylistic flourishes */
                                    
                                    .fileContainer {
                                        background: red;
                                        border-radius: .5em;
                                        float: left;
                                        padding: .5em;
                                    }
                                    
                                    .fileContainer [type=file] {
                                        cursor: pointer;
                                    }
                                    }

                                    .upload-btn-wrapper {
  position: relative;
  overflow: hidden;
  display: inline-block;
}

.btn {
  border: 2px solid gray;
  color: gray;
  background-color: white;
  padding: 8px 20px;
  border-radius: 8px;
  font-size: 20px;
  font-weight: bold;
}

.upload-btn-wrapper input[type=file] {
  font-size: 100px;
  position: absolute;
  left: 0;
  top: 0;
  opacity: 0;
}

                                    </style>
<?php  require("header.php"); 

$seleccionaCoach = "SELECT * FROM entrenadores";
$resultadoCoach = mysql_query($seleccionaCoach, $ilink) or die(mysql_error());
$numfilasCoach = mysql_num_rows($resultadoCoach); // obtenemos el número de filas

if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        echo '
        <div class="headTitle">
            <span class="headTitleText"><h2> > LISTA DE ENTRENADORES </h2></span>
        </div>

        <div class="container">'; 
        
        if ($_SESSION["CoachToTeam"] == 1){
            echo'<div class="alert alert-info"><strong>Equipo asigando a entrenador correctamente.</strong></div>';
            $_SESSION["CoachToTeam"] = 0;
        }
        
        if ($_SESSION["regCoachOK"] == 1){
            echo'<div class="alert alert-info"><strong>Entrenador dado de alta correctamente.</strong></div>';
            $_SESSION["regCoachOK"] = 0;
        }        

        if ($_SESSION["datosFailure"] == 1){
            echo'<div class="alert alert-danger"><strong>Faltan datos por introducir.</strong></div>';
            $_SESSION["datosFailure"] = 0;
        }
                
        if ($numfilasCoach < 1) {
            echo'<div class="alert alert-warning text-center"><strong>No existen entrenadores dados de alta.</strong></div>';
        } else {
            $numPrev = 1;
            echo'        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>                        
                        <th class="celdaNumJugador">#</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>  
                        <th>eMail</th>                        
                        <th class="textoTHRotado"><div><span>Revisión Médica</span></div></th>
                        <th>Equipo</th>
                        <th> </th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>';
                
                while ($filaCoach = mysql_fetch_array($resultadoCoach)) {
                    $idCoach = $filaCoach['idcoach'];
                    $nombreCoach = decrypt($filaCoach['nombre']);
                    $apellidoCoach = decrypt($filaCoach['apellidos']);
                    $email = decrypt($filaCoach['email']);
                    $revision = $filaCoach['revision'];
                                        
                    $rowequipo = mysql_query("SELECT nickequipo FROM equipos WHERE entrenador = $idCoach", $ilink);                   
                    $equipo = mysql_fetch_assoc($rowequipo);
                    
                    echo'
                    <tr>
                        <td class="celdaNumJugador"><span class="numJugador">'; 
                            echo $numPrev;
                            $numPrev = $numPrev + 1;
                        echo'</span>
                        </td>
                        <td>'.$nombreCoach.'</td>
                        <td>'.$apellidoCoach.'</td>
                        <td>'.$email.'</td>
                        <td class="nopadding-bot">';
                            if ($revision == 1) {
                                echo '<span style="color:green;" class="glyphicon glyphicon-ok-sign iconTablaJugador"></span>';
                            } else if ($revision == 2) {
                                echo '<span style="color:darkred;" class="glyphicon glyphicon-remove-sign iconTablaJugador"></span>';
                            } else {
                                echo '<span style="color:grey;" class="glyphicon glyphicon-question-sign iconTablaJugador"></span>';
                            }
                            echo'
                        </td>
                        <td>';
                        if ($equipo['nickequipo'] == '') { 

                            echo'
                            <button type="button" class="btn btn-danger btn-xs" name="addCoachToTeam" data-toggle="modal" data-target="#addTeam-'.$idCoach.'">
                                <a href="#">SIN EQUIPO <span class="glyphicon glyphicon-plus"></span></a>
                            </button>

                            <div class="modal fade bs-example-modal-sm" id="addTeam-'.$idCoach.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="myModalLabel">SELECCIONAR EQUIPO PARA '.$nombreCoach. '</h4>
                                            </div>
                                            <form class="form-horizontal" role="form" action="operaciones.php?oper=CoachToTeam&id='.$idCoach.'" method="POST">
                                                <div class="modal-body">
                                                    <div class="form-group">
                                                    <label class="control-label col-sm-4" for="CoachToTeam">Equipos sin entrenador</label>
                                                        <div class="col-sm-8">';
                                                            $rowequipoNoEntrena = mysql_query("SELECT idequipo, nickequipo FROM equipos WHERE entrenador IS NULL", $ilink);
                                                            $numero_filas = mysql_num_rows($rowequipoNoEntrena);
                                                            if(empty($numero_filas)) {
                                                                echo'                                                                
                                                                <select class="form-control" id="CoachToTeam" name="CoachToTeam" disabled>
                                                                    <option value="#" selected>NO HAY EQUIPOS DISPONIBLES</option>';
                                                                } else {
                                                                echo'    
                                                                <select class="form-control" id="CoachToTeam" name="CoachToTeam">';
                                                                while ($equipoNoEntrena = mysql_fetch_array($rowequipoNoEntrena)) {                                                                
                                                                    echo'
                                                                    <option value="'.$equipoNoEntrena["idequipo"].'">'.$equipoNoEntrena["nickequipo"].'</option>';
                                                                    }
                                                            } echo' 
                                                                </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">ATRÁS</button>';
                                                    if (empty($numero_filas)) {
                                                    echo'    
                                                    <button type="submit" class="btn btn-success btn-sm" disabled>ENVIAR</button>';
                                                    } else {
                                                    echo'    
                                                    <button type="submit" class="btn btn-success btn-sm">ENVIAR</button>';
                                                    }
                                                    echo'
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                            </div>';
                                
                        }else{
                            echo $equipo['nickequipo'];
                        } 
                        echo'</td>';
                        if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo'
                        <td><button type="button" class="btn btn-success btn-xs" name="editbutt" data-toggle="modal" data-target="#editarModal-'.$idCoach.'"><a href="#">EDITAR</a></button></td>                        
                        
                        <div class="modal fade bs-example-modal-sm" id="editarModal-'.$idCoach.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">EDITAR ENTRENADOR '.$nombreCoach.' '.$apellidoCoach.'</h4>
                                        </div>
                                        <div class="modal-body">

                                        <h3 data-toggle="collapse" data-target="#editpanel1-'.$idCoach.'" class="modal-title flip" data-parent="#accordion" id="flip1">Datos Personales</h3>
                                        <div class="row form-group paneledit in" id="editpanel1-'.$idCoach.'">
                                            <form accept-charset="utf-8" role="form" action="editplayer.php?id=-'.$idCoach.'&op=edit1" method="POST">                                                
                                                <div class="form-group col-sm-5">
                                                    <label class="control-label" for="nombre">Nombre Entenador:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre" value="'.$nombreCoach.'" required>
                                                </div>
                                                <div class="form-group col-sm-7">
                                                    <label class="control-label" for="apellidos">Apellidos Entrenador:</label>
                                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca los apellidos" value="'.$apellidoCoach.'" required>
                                                </div>             
                                                <div class="form-group col-sm-12">
                                                    <label class="control-label" for="email">eMail:</label>
                                                    <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca eMail" value="'.$email.'" required>
                                                </div>
                                                <br>
                                                <button type="submit" class="btn btn-warning float-right">Guardar</button>
                                            </form>
                                        </div>	<!--row form-group#1-->

                                        <br>    

                                        <h3 data-toggle="collapse" data-target="#editpanel2-'.$idCoach.'" class="modal-title flip" data-parent="#accordion" id="flip2-'.$idCoach.'">Revision médica</h3>
                                            <div class="row form-group paneledit collapse" id="editpanel2-'.$idCoach.'">
                                                <form accept-charset="utf-8" role="form" action="editplayer.php?id=-'.$idCoach.'&op=edit2" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <select class="form-control" name="revision" id="revisionSelct">
                                                            <option value="0"';  if ($revision == '0') {echo'selected';} echo'>Desconocido</option>
                                                            <option value="1"';  if ($revision == '1') {echo'selected';} echo'>Entregado</option>
                                                            <option value="2"';  if ($revision == '2') {echo'selected';} echo'>NO Entregado</option>
                                                        </select>                             
                                                    </div>  
                                                </div>
                                                <button type="submit" class="btn btn-warning float-right">Guardar</button>
                                                </form>
                                            </div> <!--row form-group#2-->

                                            <br>    

                                        <h3 data-toggle="collapse" data-target="#editpanel3-'.$idCoach.'" class="modal-title flip" data-parent="#accordion" id="flip2-'.$idCoach.'">Cambio de equipo</h3>
                                            <div class="row form-group paneledit collapse" id="editpanel3-'.$idCoach.'">
                                                <form accept-charset="utf-8" role="form" action="editplayer.php?id=-'.$idCoach.'&op=edit3" method="POST">
                                                <div class="row">
                                                    <div class="col-sm-4 form-group">
                                                        <select class="form-control" name="revision" id="revisionSelct">
                                                            <option value="0"';  if ($revision == '0') {echo'selected';} echo'>Desconocido</option>
                                                            <option value="1"';  if ($revision == '1') {echo'selected';} echo'>Entregado</option>
                                                            <option value="2"';  if ($revision == '2') {echo'selected';} echo'>NO Entregado</option>
                                                        </select>                             
                                                    </div>  
                                                </div>
                                                <button type="submit" class="btn btn-warning float-right">Guardar</button>
                                                </form>
                                            </div> <!--row form-group#3-->

                                        </div> <!-- modal.body -->
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">ATRÁS</button>
                                            <button type="submit" class="btn btn-success btn-sm">ENVIAR</button>
                                        </div>
                                    </div>
                                </div>
                        </div>                   
                        ';
                        }                         
                    echo'
                        <td><button type="button" class="btn btn-danger btn-xs" name="bajabutt" data-toggle="modal" data-target="#borrarModal-'.$idCoach.'"><a href="#">BORRAR</a></button></td>
                        <div class="modal fade bs-example-modal-sm" id="borrarModal-'.$idCoach.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">¿Estás seguro de eliminar al Entrenador? '.$nombreCoach.' '.$apellidoCoach.'</h4>
                                    </div>
                                    <div class="modal-body">
                                        <p>Esta acción <strong>NO</strong> tendrá vuelta atrás y los datos borrados no podrán ser recuperados, aún así, ¿estas seguro de querer borrar al jugador?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">NO</button>
                                        <a type="button" class="btn btn-danger btn-sm" href="operaciones.php?id='.$idCoach.'&oper=borrarCoach">SI</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <td><button type="button" class="btn btn-info btn-xs" name="archivebutt" data-toggle="modal" data-target="#archivosModal-'.$idCoach.'"><a href="#">ARCHIVOS</a></button></td>
                        <div class="modal fade bs-example-modal-sm" id="archivosModal-'.$idCoach.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="myModalLabel">SUBIR ARCHIVO</h4>
                                    </div>
                                    <div class="modal-body" style="display:grid;">';

                                    $temporada = $_SESSION["temporada"];

                                    $folder = "./uploads/entrenadores/$temporada/$idCoach/"; 
                                    
                                    //scan "uploads" folder and display them accordingly 
                                    echo $folder;
                                    $results = scandir($folder);
                                    foreach ($results as $result) {
                                        if ($result==='.' or $result==='..') continue;
                                        if (is_file($folder . '/' . $result)) {
                                            echo '
                                                <div>
                                                    <div class="col-sm-6" scope="row"><a href="'.$folder .'/'. $result.'">'.$result.'</a></div>
                                                    <div class="col-sm-4"><a href="funciones.php?name='.$result.'&func=remove" class="btn btn-danger btn-xs" role="button">Borrar</a></div>
                                                </div>';
                                        }
                                    }
                                    echo'
                                    <form class="card card-body bg-light" action="operaciones.php?oper=UpArchive&pth='.$folder.'" method="post" enctype="multipart/form-data">
                                        <div class="form-group col-xs-12">
                                            <input type="file" name="file" class="jfilestyle" data-theme="yellow" data-text="BUSCAR" data-placeholder="Buscar arhivo">
                                            <!-- <div class="form-group col-xs-12">
                                                <div class="fileUpload btn btn-primary col-xs-3">
                                                    <span class="">BUSCAR</span>
                                                    <input id="uploadBtn" name="file" type="file" class="upload">
                                                </div>
                                                <div class="input-group col-xs-8">
                                                    <span class="input-group-addon"><i class="fa fa-cloud-upload" aria-hidden="true"></i></span>
                                                    <input id="uploadFile" type="text" class="form-control input-lg" disabled placeholder="Subir archivo">
                                                </div>
                                            </div>  -->                                          
                                        </div>                                        
                                    </div><!--/div-bodal-Body-->
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">ATRÁS</button>
                                        <input type="submit" class="btn btn-info" value="Subir Archivo">
                                    </div>
                                    </form>                                    
                                </div>
                            </div>
                        </div>

                    </tr>
                    ';
                }
                echo '</tbody>
            </table>
        </div><!-- //FIN.table-responsive -->';           
        }        

        echo' 
        
        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-filestyle.min.js"></script>

        <div>
            <button type="button" class="btn btn-info" name="addcoach" data-toggle="modal" data-target="#newcoach"><a href="#">AÑADIR ENTREANDOR</a></button>        
        </div>
        
        <div class="modal fade bs-example-modal-sm" id="newcoach" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">AÑADIR ENTRENADOR</h4>
                        </div>
                        <form class="form-horizontal" role="form" action="operaciones.php?oper=regCoach" method="POST">
                            <div class="modal-body">
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="nombre">Nombre:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Introduzca nombre">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="apellidos">Apellidos:</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Introduzca apellidos">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="control-label col-sm-3" for="email">Email:</label>
                                    <div class="col-sm-8">
                                        <input type="email" class="form-control" id="email" name="email" placeholder="Introduzca email">
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary btn-sm" data-dismiss="modal">ATRÁS</button>
                                <button type="submit" class="btn btn-success btn-sm">ENVIAR</button>
                            </div>
                        </form>
                    </div>
                </div>
        </div>      
                        
        ';        

        echo '</div><!-- //FIN.container -->';
        include("sidebar.php");
        include("footer.php");
    } //--------------BIG-ENDIF------------------------------
}
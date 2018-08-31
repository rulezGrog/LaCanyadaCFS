<?php  require("header.php"); 

$seleccionaTeam = "SELECT * FROM equipos";
$resultadoTeam = mysql_query($seleccionaTeam, $ilink) or die(mysql_error());
$numfilasTeam = mysql_num_rows($resultadoTeam); // obtenemos el número de filas

if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        echo '
        <div class="headTitle">
            <span class="headTitleText"><h2> > LISTA DE EQUIPOS </h2></span>
        </div>

        <div class="container">'; 
        
        if ($_SESSION["TeamToCoach"] == 1){
            echo'<div class="alert alert-info"><strong>Entrenador asigando a un equipo correctamente.</strong></div>';
            $_SESSION["TeamToCoach"] = 0;
        }
        
        if ($_SESSION["regTeamOK"] == 1){
            echo'<div class="alert alert-info"><strong>Equipo dado de alta correctamente.</strong></div>';
            $_SESSION["regTeamOK"] = 0;
        }        

        if ($_SESSION["datosFailure"] == 1){
            echo'<div class="alert alert-danger"><strong>Faltan datos por introducir.</strong></div>';
            $_SESSION["datosFailure"] = 0;
        }       
                
        if ($numfilasTeam < 1) {
            echo'
            <div class="alert alert-warning text-center"><strong>No existen aún ningún equipo creado.</strong></div> 
            ';
        } else {
            
            $numPrev = 1;
            echo'        
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>                        
                        <th class="celdaNumJugador">#</th>
                        <th>NickEquipo</th>
                        <th>Categoría</th>  
                        <th>Entrenador</th>
                        <th> </th>
                        <th> </th>
                    </tr>
                </thead>
                <tbody>';
                
                while ($filaTeam = mysql_fetch_array($resultadoTeam)) {
                    $idTeam = $filaTeam['idequipo'];
                    $nickTeam = $filaTeam['nickequipo'];
                    $categoria = $filaTeam['categoria'];
                    $identrenador = $filaTeam['entrenador'];

                    echo'
                        <tr>
                        <td class="celdaNumJugador"><span class="numJugador">'; 
                            echo $numPrev;
                            $numPrev = $numPrev + 1;
                        echo'</span>
                        </td>
                        <td>'.$nickTeam.'</td>
                        <td>'.$categoria.'</td>
                        <td>'; 
                        if (empty($identrenador)) {
                            echo'<button type="button" class="btn btn-danger btn-xs" name="addCoach" data-toggle="modal" data-target="#addCoach-'.$idTeam.'"><a href="#"> + ENTRENADOR</a></button>
                            
                            <div class="modal fade bs-example-modal-sm" id="addCoach-'.$idTeam.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="myModalLabel">AÑADIR ENTRENADOR AL EQUIPO '.$nickTeam.'</h4>
                                        </div>
                                        <form class="form-horizontal" role="form" action="operaciones.php?oper=TeamToCoach&id='.$idTeam.'" method="POST">
                                            <div class="modal-body">                            
                                                <div class="form-group">
                                                <label class="control-label col-sm-3" for="TeamToCoach">Entrenador</label>
                                                    <div class="col-sm-8">';
                                                    $rowentreNULL = mysql_query("SELECT idcoach, nombre, apellidos FROM entrenadores c WHERE NOT EXISTS (SELECT 1 FROM equipos e WHERE e.entrenador = c.idcoach)", $ilink);
                                                    $numero_filas = mysql_num_rows($rowentreNULL);                                                    
                                                    if (empty($numero_filas)) {
                                                        echo'
                                                        <select class="form-control" id="TeamToCoach" name="TeamToCoach" disabled>
                                                                <option value="#" selected>NO HAY ENTEANDORES DISPONIBLES</option>';
                                                        } else {
                                                        echo'    
                                                        <select class="form-control" id="TeamToCoach" name="TeamToCoach">';                   
                                                        while ($entrenadorNULL = mysql_fetch_array($rowentreNULL)) {
                                                            echo'
                                                                <option value="'.$entrenadorNULL["idcoach"].'">'.decrypt($entrenadorNULL["nombre"]).' -- '.decrypt($entrenadorNULL["apellidos"]).'</option>';                                                       }                                                           
                                                    }   echo'
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
                            </div>                            
                            ';
                        } else { 
                            $rowentre = mysql_query("SELECT nombre, apellidos FROM entrenadores WHERE idcoach = $identrenador", $ilink);                   
                            $entrenador = mysql_fetch_array($rowentre);

                            echo decrypt($entrenador['nombre']).' --- '.decrypt($entrenador['apellidos']);
                        } 
                        echo'</td>';
                        if ($_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
                        echo'
                        <td><button type="button" class="btn btn-success btn-xs" name="editbutt" data-toggle="modal" data-target="#editarModal-'.$idTeam.'"><a href="#">EDITAR</a></button></td>
                        <td><button type="button" class="btn btn-danger btn-xs" name="bajabutt" data-toggle="modal" data-target="#borrarModal-'.$idTeam.'"><a href="#">BORRAR</a></button></td>
                        ';
                        } 
                    echo'</tr>
                    ';
                }                
                echo '</tbody>
            </table>
        </div><!-- //FIN.table-responsive -->';
        }

        echo'
            <div>
                <button type="button" class="btn btn-info" name="newteam" data-toggle="modal" data-target="#newteam"><a href="#">CREAR NUEVO EQUIPO</a></button>        
            </div>

            <div class="modal fade bs-example-modal-sm" id="newteam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">CREAR NUEVO EQUIPO</h4>
                        </div>
                        <form class="form-horizontal" role="form" action="operaciones.php?oper=regTeam" method="POST">
                            <div class="modal-body">                            
                                <div class="form-group">
                                <label class="control-label col-sm-3" for="nickteam">Nick Equipo</label>
                                    <div class="col-sm-8">
                                        <input type="text" class="form-control" id="nickteam" name="nickteam" placeholder="Senior B">
                                    </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-sm-3" for="teamcategory">Categoría Equipo</label>
                                    <div class="col-sm-8">
                                        <select class="form-control" id="teamcategory" name="teamcategory">
                                            <option value="Prebenjamin">Prebenjamín</option>
                                            <option value="Benjamin" selected>Benjamín</option>
                                            <option value="Alevin">Alevín</option>
                                            <option value="Infantil">Infantil</option>
                                            <option value="Cadete">Cadete</option>
                                            <option value="Juvenil">Juvenil</option>
                                            <option value="Senior">Senior</option>
                                        </select>
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
            </div><!-- fin crear equipos -->            
            ';

        echo '</div><!-- //FIN.container -->';
        include("sidebar.php");
        include("footer.php");
    } //--------------BIG-ENDIF------------------------------
}
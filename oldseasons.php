<?php  include("header.php");


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        echo '
        <div class="headTitle">
            <span class="headTitleText"><h2> > LISTA DE ANTIGUAS TEMPORADAS </h2></span>
        </div>
        <div class="container">';

        $firstTemp = 2016;
        $tabla = 'temp'.$firstTemp;
        // echo $tabla;

        $result = mysql_num_rows(mysql_query("SHOW TABLES LIKE 'temp".$firstTemp."'"));

        if ($result == 1) {
            while ($result == 1) {
                echo'
                  <div class="col-md-3">
                    <div class="tempBox">
                      <div class="titleTempBox">TEMPORADA '.$firstTemp.' </div>
                      <a href="consultaOldTemp.php?temp='.$firstTemp.'"><div class="buttonTempBox">
                        CONSULTAR
                      </div></a>
                    </div>
                  </div>';

                $firstTemp += 1;
                // echo $firstTemp;
                $result = mysql_num_rows(mysql_query("SHOW TABLES LIKE 'temp".$firstTemp."'"));
            }
        } else {
            #no exite ninguna temporada anterior
              echo'<h1>NO EXISTE NINGUNA TEMPORADA ANTERIOR</h1>';
        }



        echo' </div>';
        include("sidebar.php");
        include("footer.php");
    }
};

<?php  include("header.php");

$selecciona2= "SELECT * FROM admins";

        $resultado2=mysql_query($selecciona2, $ilink) or die(mysql_error());
        $numfilas = mysql_num_rows($resultado2); // obtenemos el número de filas


if (!isset($_SESSION['admin'])) { //comprobamos que no existe la session, es decir, que no se ha logeado, y mostramos el form
} else {
    if ($_SESSION['level'] == 2 or $_SESSION['level'] == 1 or $_SESSION['level'] == 0) {
        echo '
<div class="container">

<h1 class="text-center">COBROS POR REALIZAR</h1>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#oct">1er PLAZO</a></li>
  <li><a data-toggle="tab" href="#dici">2º PLAZO</a></li>
  <li><a data-toggle="tab" href="#ener">3er PLAZO</a></li>
</ul>

<div class="tab-content">
  <div id="oct" class="tab-pane fade in active">
    <h3>Octubre</h3>


    <div class="table-responsive">
     <table class="table table-striped">
       <thead>
       <tr>
         <th>Nombre</th>
         <th>Apellidos</th>
         <th>Categoría</th>
         <th>Cuantía</th>
         <th> </th>
       </tr>
       </thead>
       <tbody>
        <tr>
          <td>John</td>
          <td>Doe dOE</td>
          <td>BENJAMÍN</td>
          <td>100€</td>
          <td><button type="button" class="btn btn-success btn-xs" name="pagaroct"><a href="#">[PAGAR]</a></button></td>
        </tr>
      </tbody>
     </table>
    </div>

    <button type="button" class="btn btn-warning pull-right" name="exportarpagaroct"><a href="#">[EXPORTAR]</a></button>



  </div>
  <div id="dici" class="tab-pane fade">
    <h3>Diciembre</h3>
    <p>Some content in menu 1.</p>
  </div>
  <div id="ener" class="tab-pane fade">
    <h3>Enero</h3>
    <p>Some content in menu 2.</p>
  </div>
</div>

</div>';
    }
}

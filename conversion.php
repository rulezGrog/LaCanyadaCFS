<?php  include("header.php");

$selecciona= "SELECT * FROM jugadores2";

mysql_query ("set character_set_results='utf8'");
$resultadosd=mysql_query($selecciona,$ilink) or die (mysql_error());
$numfilas = mysql_num_rows($resultadosd);

while ($filaModal = mysql_fetch_array($resultadosd))	{


      $pedido = $filaModal['pedido'];
      if ($filaModal['nom_tutor'] != ''){
        $nombretut = newencrypt($filaModal['nom_tutor']); //isset OK OK
      }else{
        $nombretut = '';
      }

      if ($filaModal['ape_tutor'] != ''){
        $apellidostut = newencrypt($filaModal['ape_tutor']); //isset OK OK
      }else{
        $apellidostut = '';
      }

      if ($filaModal['nombre'] != ''){
        $nombre = newencrypt($filaModal['nombre']);
      }else{
        $nombre = '';
      }


      if ($filaModal['apellidos'] != ''){
        $apellidos = newencrypt($filaModal['apellidos']);
      }else{
        $apellidos = '';
      }


      if ($filaModal['dni'] != 'dni'){
        $dni = newencrypt($filaModal['dni']);
      }else{
        $dni = '';
      }
      $nacimiento = $filaModal['birthdate'];


      if ($filaModal['tlf'] != ''){
        $telefono = newencrypt($filaModal['tlf']);
      }else{
        $telefono = '';
      }


      if ($filaModal['email'] != ''){
        $email = newencrypt($filaModal['email']);
      }else{
        $email = '';
      }
      $via = $filaModal['tipo_calle'];


      if ($filaModal['direccion'] != ''){
        $direccion = newencrypt($filaModal['direccion']);
      }else{
        $direccion = '';
      }


      if ($filaModal['poblacion'] != ''){
        $poblacion = newencrypt($filaModal['poblacion']);
      }else{
        $poblacion = '';
      }


      if ($filaModal['provincia'] != ''){
        $provincia = newencrypt($filaModal['provincia']);
      }else{
        $provincia = '';
      }
      $cp = $filaModal['cp'];
      $mensaje = $filaModal['mensaje']; //isset OK OK
      $importe = $filaModal['importe'];
      $fraccionado = $filaModal['fraccionada'];


      if ($filaModal['titular_cuenta'] != ''){
        $titularcuenta = newencrypt($filaModal['titular_cuenta']);
      }else{
        $titularcuenta = '';
      } //isset OK OK


      if ($filaModal['ape_cuenta'] != ''){
        $apellidoscuenta = newencrypt($filaModal['ape_cuenta']);
      }else{
        $apellidoscuenta = '';
      } //isset OK OK


      if ($filaModal['num_cuenta'] != ''){
        $numerocuenta = newencrypt($filaModal['num_cuenta']);
      }else{
        $numerocuenta = '';
      } //isset OK OK
      $categoria = $filaModal['categoria'];
      $temporada = $filaModal['temporada'];
      $equipacion = $filaModal['equipacion'];
      $antiquity = $filaModal['antiguedad'];
      $primerpago = $filaModal['primerpago'];
      $segundopago = $filaModal['segundopago'];
      $tercerpago = $filaModal['tercerpago'];
      $pagoextra = $filaModal['pagoextra'];
      $imagenes1 = $filaModal['termsimage1'];
      $imagenes2 = $filaModal['termsimage2'];
      $imagenes3 = $filaModal['termsimage3'];
      $imagenes4 = $filaModal['termsimage4'];

      $inserta="INSERT INTO jugadores3 (pedido,nombre,apellidos,nom_tutor,ape_tutor,dni,tipo_calle,direccion,poblacion,provincia,cp,email,tlf,antiguedad,mensaje,importe,titular_cuenta,ape_cuenta,num_cuenta,fraccionada,categoria,temporada,birthdate,equipacion,termsimage1,termsimage2,termsimage3,termsimage4,primerpago,segundopago,tercerpago,pagoextra) VALUES ('$pedido','$nombre','$apellidos','$nombretut','$apellidostut','$dni','$via','$direccion','$poblacion','$provincia','$cp','$email','$telefono','$antiquity','$mensaje','$importe','$titularcuenta','$apellidoscuenta','$numerocuenta','$fraccionado','$categoria','$temporada','$nacimiento','$equipacion','$imagenes1','$imagenes2','$imagenes3','$imagenes4','$primerpago','$segundopago','$tercerpago','pagoextra')";
      $resul=mysql_query($inserta,$ilink) or die (mysql_error());
  }

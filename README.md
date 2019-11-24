Practica04-MiCorreoElectronico
==============================

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Iniciar sesión\</title\>

\<link href ="../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<form id="formulario01" method="POST" action="../controladores/login.php"\>

\<label for="correo"\>Correo electrónico \</label\>

\<input type="text" id="correo" name="correo" value="" placeholder="Ingrese el correo ..."/\>

\<br\>

\<label for="nombres"\>Contraseña (\*)\</label\>

\<input type="password" id="contrasena" width="10%" name="contrasena" value="" placeholder="Ingrese su

contraseña ..."/\>

\<br\>

\<input type="submit"  id="login" name="login" value="Iniciar Sesión" /\>

\<br\>

\<a href="index.html"\>Crear usuario\</a\>

\</form\>

\</body\>

\</html\>

 

//________________________________________________________________\_

 

\<!DOCTYPE html\>

\<html lang="es"\>

\<head\>

    \<meta charset="UTF-8"\>

    \<meta name="viewport" content="width=device-width, initial-scale=1.0"\>

    \<meta http-equiv="X-UA-Compatible" content="ie=edge"\>

    \<title\>Document\</title\>

    \<link href ="../../css/archivo.css" rel="stylesheet"/\>

    \<script type="text/javascript" src="validacion_usuario.js"\>\</script\>

    \<style type="text/css"\>

      .error {

          color: red;

          font-size: 8px;

      }

    \</style\>

\</head\>

\<body\>

    \<article class="about_tss"\>

        \<h1\>Formulario\</h1\>

          \<form action="../../config/creacion_usuarios.php" method="post" onsubmit="return validarCampos()"\>

                \<label for="cedula"\>cedula:\</label\>

                \<input type="text" id="cedula" name="cedula" onkeyup="this.value=ValidarNumeros(this.value);this.value=ValidarCedula(this.value)"/\>

                \<span id="mensajecedula" class ="error"\>\</span\>

                \<br\>

                  \<label for="name"\>Nombres:\</label\>

                  \<input type="text" id="name" name="name" onkeyup="return validarLetras(this);this.value=dosPalabras(this.value)"/\>

                  \<br\>

                  \<label for="apellidos"\>Apellidos:\</label\>

                  \<input type="text" id="apellidos" name="apellidos" onkeyup="return validarLetras(this);this.value=dosPalabras(this.value)"/\>

                  \<br\>

                  \<label for="fecha"\>Fecha de nacimiento:\</label\>

                  \<input type="date" id="fecha" name="fecha"  onkeyup="return ValidarFecha();this.value=validarLetras(this.value)"/\>

                  \<spam id="f" style="display: none;"\>ERROR\</spam\>

                \<br\>

                \<label for="direccion"\>Direccion:\</label\>

                \<input type="text" id="dire" name="dire" /\>

                \<br\>

                  \<label for="telefono"\>telefono:\</label\>

                  \<input type="text" id="telefono"name="telefono" maxlength="10" onkeyup="this.value=ValidarNumeros(this.value)" /\>

                  \<br\>

                  \<label for="mail"\>E-mail:\</label\>

                  \<input type="email" id="mail" name="mail" onkeyup="return valdarCorreo();this.value=validarAlfa(this.value)"/\>

                  \<spam id="e" style="display: none;"\>ERROR\</spam\>

                  \<br\>

                \<label for="correo"\>Contraseña:\</label\>

                \<input type="password" id="contra" minlength="8" name="contra" /\>

                \<br\>

                  \<input type="submit" id="crear" value="Aceptar" name="crear"/\>

                  \<br\>

                  \<input type="reset" id="cancelar" name="cancelar" name="cancelar" value="Cancelar" /\>

                  \<spam id="p" style="display: none;"\>Error, campos incompletos!\</spam\>

                  \<br\>

                  \<a href="login.html"\>Loguearse\</a\>

          \</form\>

        \</article\>

\</body\>

\</html\>

 

//------------------------------------------------------------------------------------------

\<?php

session_start();

if (!isset(\$_SESSION['isLogin'])) {

    header("Location: ../vista/login.html");

} elseif (\$_SESSION['rol'] == 'U') {

   header("Location: ../../admin/controladores/user/index.");

}

?\>

\<?php

//incluir conexión a la base de datos

include '../../config/conexionBD.php';

\$usuario = isset(\$_POST["correo"]) ? trim(\$_POST["correo"]) : null;

\$contrasena = isset(\$_POST["contrasena"]) ? trim(\$_POST["contrasena"]) : null;

\$sql = "SELECT \* FROM usuario WHERE usu_correo = '\$usuario' and usu_password =

MD5('\$contrasena')";

echo \$sql;

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

\$_SESSION['isLogged'] = TRUE;

while(\$row = \$result-\>fetch_assoc()) {

if(\$row['rol']=='A'){

header("Location:../../admin/controladores/admin/index.php");

}else{

header("Location:../../admin/controladores/user/index.php?correo=".\$row['usu_correo']);   

}

}

}

else{

    header("Location: ../vista/login.html");

}

\$conn-\>close();

//constraseña encriptada con md5

?\>

 

 

 

 

//-----------------------------------------------------------------------------------------

body{

    background-color: bisque;

}

form {

    /\* Sólo para centrar el formulario a la página \*/

    margin: 0 auto;

    margin-top: 10px;

    width: 600px;

    /\* Para ver el borde del formulario \*/

    padding: 5em;

    border: 1px solid \#CCC;

    border-radius: 1em;

    float: none;

    margin-top: 7em;

 }

 label {

    /\* Para asegurarse que todos los labels tienen el mismo tamaño y están alineados correctamente \*/

    display: inline-block;

    width: 90px;

    text-align: right;

    margin-top: 10px;

    size: 10em;

 }

 

 

 input {

    /\* Para asegurarse que todos los labels tienen el mismo tamaño y están alineados correctamente \*/

    display: inline-block;

    width: 90px;

    text-align: center;

    margin-top: 10px;

 }

 input, textarea {

    /\* Para asegurarse de que todos los campos de texto tienen las mismas propiedades de fuente

       Por defecto, las areas de texto tienen una fuente con monospace \*/

    font: 1em sans-serif;

 

    /\* Para darle el mismo tamaño a todos los campos de texto \*/

    width: 300px;

    -moz-box-sizing: border-box;

    box-sizing: border-box;

 

    /\* Para armonizar el look&feel del borde en los campos de texto \*/

    border: 1px solid \#999;

 }

 

 input:focus, textarea:focus {

    /\* Para dar un pequeño destaque en elementos activos\*/

    border-color: \#000;

 }

 

 textarea {

    /\* Para alinear campos de texto multilínea con sus labels \*/

    vertical-align: top;

 

    /\* Para dar suficiente espacio para escribir texto \*/

    height: 5em;

 

    /\* Para permitir a los usuarios cambiar el tamaño de cualquier textarea verticalmente

        No funciona en todos los navegadores \*/

    resize: vertical;

 }

 

 .button {

    /\* Para posicionar los botones a la misma posición que los campos de texto \*/

    padding-left: 90px; /\* mismo tamaño a todos los elementos label \*/

 }

 button {

    /\* Este margen extra representa aproximadamente el mismo espacio que el espacio

       entre los labels y sus campos de texto \*/

    margin-left: .5em;

 }

 

//________________________________________________________\_

\<!DOCTYPE html\>

\<html\>

\<head\>

 \<meta charset="UTF-8"\>

 \<link type="text/css" rel="stylesheet" href="../../css/estiloresu.css "/\>

 \<link href ="../css/archivo.css" rel="stylesheet"/\>

 \<title\>Buscar\</title\>

\</head\>

\<body\>

    \<form onsubmit="return buscarPorCedula()" action="buscar.php"\>

        \<label for="Motivo"\>Motivo:\</label\>

        \<input type="text" id="motivo" name="motivo" value=""\>

        \<input type="button" id="buscar" name="buscar" value="Buscar" onclick="buscarPorCedula()"\>

       \</form\>

       \<div id="informacion"\>\<b\>Datos de la persona\</b\>\</div\>

\<script\>

function buscarPorCedula() {

 var motivo = document.getElementById("motivo").value;

 if (motivo == "") {

 document.getElementById("informacion").innerHTML = "";

 } else {

 if (window.XMLHttpRequest) {

 // code for IE7+, Firefox, Chrome, Opera, Safari

 xmlhttp = new XMLHttpRequest();

 } else {

 // code for IE6, IE5

 xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");

 }

 xmlhttp.onreadystatechange = function() {

 if (this.readyState == 4 && this.status == 200) {

 document.getElementById("informacion").innerHTML = this.responseText;

 

 }

 };

 xmlhttp.open("GET","buscar.php?motivo="+motivo,true);

 xmlhttp.send();

 }

 return false;

}

\</script\>

\</body\>

\</html\>

 

//_____________________________________________________________\_

\<!DOCTYPE html\>

\<html lang="en"\>

\<head\>

    \<meta charset="UTF-8"\>  

    \<title\>Buscar\</title\>

    \<link href ="../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

 //incluir conexión a la base de datos

 include "conexionBD.php";

 \$motivo = \$_GET['motivo'];

 \$sql = "SELECT \* FROM gest_reuniones WHERE  reu_motivo='\$motivo'";

//cambiar la consulta para puede buscar por ocurrencias de letras

 \$result = \$conn-\>query(\$sql);

 echo " \<table style='width:100%'\>

 \<tr\>

 \<th\>Fecha\</th\>

 \<th\>Hora\</th\>

 \<th\>Lugar\</th\>

 \<th\>Latitud\</th\>

 \<th\>Longitud\</th\>

 \<th\>Remitente\</th\>

 \<th\>Motivo\</th\>

 \<th\>Observaciones\</th\>

 \<th\>\</th\>

 \<th\>\</th\>

 \<th\>\</th\>

 \</tr\>";

 if (\$result-\>num_rows \> 0) {

 while(\$row = \$result-\>fetch_assoc()) {

 echo "\<tr\>";

 echo " \<td\>" . \$row['reu_fecha'] . "\</td\>";

 echo " \<td\>" . \$row['reu_hora'] ."\</td\>";

 echo " \<td\>" . \$row['reu_lugar'] . "\</td\>";

 echo " \<td\>" . \$row['reu_latitud'] . "\</td\>";

 echo " \<td\>" . \$row['reu_longitud'] . "\</td\>";

 echo " \<td\>" . \$row['reu_remitente'] . "\</td\>";

 echo " \<td\>" . \$row['reu_motivo'] . "\</td\>"; 

 echo " \<td\>" . \$row['reu_observacion'] . "\</td\>";

 echo "\</tr\>";

 }

 } else {

 echo "\<tr\>";

 echo " \<td colspan='7'\> No existen usuarios registradas en el sistema \</td\>";

 echo "\</tr\>";

 }

 echo "\</table\>";

 \$conn-\>close();

?\>

\</body\>

\</html\>

 

 

 

//______________________________________________________\_

 

\<?php

session_start();

\$_SESSION['isLogged'] = FALSE;

session_destroy();

header("Location:../publica/vista/login.html");

?\>

 

//_______________________________________________________\_

 

\<?php

\$db_servername="localhost";

\$db_username ="root";

\$db_password="";

\$db_name="hipermedial";

  
  


\$conn =new mysqli(\$db_servername,\$db_username,\$db_password,\$db_name);

\$conn-\>set_charset("utf8");

\#probar conexion

if(\$conn-\>connect_error){

    die("Connection failed" .\$conn-\>connect_error);

}else{

    echo "\<p\>\</p\>";

}

?\>

 

 

//________________________________________________________\_

 

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Crear Nuevo Usuario\</title\>

\<style type="text/css" rel="stylesheet"\>

.error{

color: red;

}

\</style\>

\</head\>

\<body\>

\<?php

//incluir conexión a la base de datos

include 'conexionBD.php';

\$cedula = isset(\$_POST["cedula"]) ? trim(\$_POST["cedula"]) : null;

\$nombres = isset(\$_POST["name"]) ? mb_strtoupper(trim(\$_POST["name"]), 'UTF-8') : null;

\$apellidos = isset(\$_POST["apellidos"]) ? mb_strtoupper(trim(\$_POST["apellidos"]), 'UTF-8') : null;

\$direccion = isset(\$_POST["dire"]) ? mb_strtoupper(trim(\$_POST["dire"]), 'UTF-8') : null;

\$telefono = isset(\$_POST["telefono"]) ? trim(\$_POST["telefono"]): null;

\$correo = isset(\$_POST["mail"]) ? trim(\$_POST["mail"]): null;

\$fechaNacimiento = isset(\$_POST["fecha"]) ? trim(\$_POST["fecha"]): null;

\$contrasena = isset(\$_POST["contra"]) ? trim(\$_POST["contra"]) : null;

\$rol=isset(\$_POST["rol"]) ? trim(\$_POST["rol"]): 'U'; 

\$sql = "INSERT INTO usuario VALUES (0, '\$cedula', '\$nombres', '\$apellidos', '\$direccion', '\$telefono',

'\$correo', MD5('\$contrasena'), '\$fechaNacimiento', 'N', null, null ,'\$rol')";

if (\$conn-\>query(\$sql) === TRUE) {

echo "\<p\>Se ha creado los datos personales correctamemte!!!\</p\>";

} else {

if(\$conn-\>errno == 1062){

echo "\<p class='error'\>La persona con la cedula \$cedula ya esta registrada en el sistema \</p\>";

}else{echo "\<p class='error'\>Error: " . mysqli_error(\$conn) . "\</p\>";

}

}

//cerrar la base de datos

\$conn-\>close();

echo "\<a href='../publica/vista/login.html'\>Regresar\</a\>";

?\>

\</body\>

\</html\>

 

 

//__________________________________________________________\_

\<!DOCTYPE html\>\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona \</title\>

\</head\>

\<body\>

\<?php

//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

session_start();

\$codigo = \$_POST["codigo"];

\$contrasena1 = isset(\$_POST["contrasena1"]) ? trim(\$_POST["contrasena1"]) : null;

\$contrasena2 = isset(\$_POST["contrasena2"]) ? trim(\$_POST["contrasena2"]) : null;

\$sqlContrasena1 = "SELECT \* FROM usuario where usu_codigos='\$codigo' and usu_password=MD5('\$contrasena1')";

\$result = \$conn-\>query(\$sqlContrasena1);

if (\$result-\>num_rows \> 0) {

date_default_timezone_set("America/Guayaquil");

\$fecha = date('Y-m-d H:i:s', time());

\$sqlContrasena2 = "UPDATE usuario " .

"SET usu_password = MD5('\$contrasena2'), " .

"usu_fecha_modificacion = '\$fecha' " .

"WHERE usu_codigos = \$codigo";

if (\$conn-\>query(\$sqlContrasena2) === TRUE) {

echo "Se ha actualizado la contraseña correctamemte!!!\<br\>";

} else {

echo "\<p\>Error: " . mysqli_error(\$conn) . "\</p\>";

}

}else{

echo "\<p\>La contraseña actual no coincide con nuestros registros!!! \</p\>";

}

echo "\<a href='../../../publica/vista/login.html'\>Regresar\</a\>";

\$conn-\>close();?\>

\</body\>

\</html\>

 

//_____________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Eliminar datos de persona \</title\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

\$codigo = \$_POST["codigo"];

//Si voy a eliminar físicamente el registro de la tabla

//\$sql = "DELETE FROM usuario WHERE codigo = '\$codigo'";

date_default_timezone_set("America/Guayaquil");

\$fecha = date('Y-m-d H:i:s', time());

\$sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '\$fecha' WHERE

usu_codigos = \$codigo";

if (\$conn-\>query(\$sql) === TRUE) {

echo "\<p\>Se ha eliminado los datos correctamemte!!!\</p\>";

} else {

echo "\<p\>Error: " . \$sql . "\<br\>" . mysqli_error(\$conn) . "\</p\>";

}

echo "\<a href='index.php'\>Regresar\</a\>";

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//____________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Eliminar datos de persona \</title\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

\$codigo = \$_POST["codigo"];

//Si voy a eliminar físicamente el registro de la tabla

//\$sql = "DELETE FROM usuario WHERE codigo = '\$codigo'";

date_default_timezone_set("America/Guayaquil");

\$fecha = date('Y-m-d H:i:s', time());

\$sql = "UPDATE gest_reuniones SET reu_eliminado = 'S', reu_fecha_modificacion = '\$fecha' WHERE

reu_codigo = \$codigo";

if (\$conn-\>query(\$sql) === TRUE) {

echo "\<p\>Se ha eliminado los datos correctamemte!!!\</p\>";

} else {

echo "\<p\>Error: " . \$sql . "\<br\>" . mysqli_error(\$conn) . "\</p\>";

}

echo "\<a href='index.php'\>Regresar\</a\>";

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//_____________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Gestión de usuarios\</title\>

\<a href="../../../config/cerrar_sesion.php"\>Cerrar sesion\</a\>

\</head\>

\<body\>

\<table style="width:100%"\>

\<tr\>

\<th\>Cedula\</th\>

\<th\>Nombres\</th\>

\<th\>Apellidos\</th\>

\<th\>Dirección\</th\>

\<th\>Telefono\</th\>

\<th\>Correo\</th\>

\<th\>Fecha Nacimiento\</th\>

\</tr\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

include '../../../config/conexionBD.php';

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

\$sql = "SELECT \* FROM usuario WHERE rol='U'";

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

    while(\$row = \$result-\>fetch_assoc()) {

        echo " \<tr\>";

        echo " \<td\>" . \$row["usua_cedula"] . "\</td\>";

        echo " \<td\>" . \$row["usu_nombres"] ."\</td\>";

        echo " \<td\>" . \$row["usu_apellidos"] . "\</td\>";

        echo " \<td\>" . \$row["usu_direccion"] . "\</td\>";

        echo " \<td\>" . \$row["usu_telefono"] . "\</td\>";

        echo " \<td\>" . \$row["usu_correo"] . "\</td\>";

        echo " \<td\>" . \$row["usu_fecha_nacimiento"] . "\</td\>";

        echo " \<td\> \<a href='../../vista/admin/modificar.php?codigo=" . \$row['usu_codigos'] . "'\>Modificar\</a\> \</td\>";

        echo " \<td\> \<a href='../../vista/admin/eliminar.php?codigo=" . \$row['usu_codigos'] . "'\>Eliminar\</a\> \</td\>";

        echo " \<td\> \<a href='../../vista/admin/cambiar_contrasena.php?codigo=" . \$row['usu_codigos'] . "'\>Cambiar

        contraseña\</a\> \</td\>";

        echo "\</tr\>";

}

} else {

echo "\<tr\>";

echo " \<td colspan='7'\> No existen usuarios registradas en el sistema \</td\>";

echo "\</tr\>";

}

?\>

\</table\>

\<table style="width:100%"\>

\<tr\>

\<th\>Fecha\</th\>

\<th\>Hora\</th\>

\<th\>Lugar\</th\>

\<th\>Latitud\</th\>

\<th\>Longitud\</th\>

\<th\>Remitente\</th\>

\<th\>Motivo\</th\>

\<th\>Observacion\</th\>

\</tr\>

\<?php

include '../../../config/conexionBD.php';

\$sql = "SELECT \* FROM gest_reuniones ORDER BY reu_fecha DESC";

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

    while(\$row = \$result-\>fetch_assoc()) {

        echo " \<tr\>";

        echo " \<td\>" . \$row["reu_fecha"] . "\</td\>";

        echo " \<td\>" . \$row["reu_hora"] ."\</td\>";

        echo " \<td\>" . \$row["reu_lugar"] . "\</td\>";

        echo " \<td\>" . \$row["reu_latitud"] . "\</td\>";

        echo " \<td\>" . \$row["reu_longitud"] . "\</td\>";

        echo " \<td\>" . \$row["reu_remitente"] . "\</td\>";

        echo " \<td\>" . \$row["reu_motivo"] . "\</td\>";

        echo " \<td\>" . \$row["reu_observacion"] . "\</td\>";

        echo " \<td\> \<a href='../../vista/admin/eliminarreu.php?codigo=" . \$row['reu_codigo'] . "'\>Eliminar reunion\</a\> \</td\>";

        echo "\</tr\>";

}

} else {

echo "\<tr\>";

echo " \<td colspan='8'\> No existen usuarios registradas en el sistema \</td\>";

echo "\</tr\>";

}

\$conn-\>close();

?\>

\</table\>

  
  


\</body\>

\</html\>

 

 

//__________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona \</title\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

\$codigo = \$_POST["codigo"];

\$cedula = isset(\$_POST["cedula"]) ? trim(\$_POST["cedula"]) : null;

\$nombres = isset(\$_POST["nombres"]) ? mb_strtoupper(trim(\$_POST["nombres"]), 'UTF-8') : null;

\$apellidos = isset(\$_POST["apellidos"]) ? mb_strtoupper(trim(\$_POST["apellidos"]), 'UTF-8') : null;

\$direccion = isset(\$_POST["direccion"]) ? mb_strtoupper(trim(\$_POST["direccion"]), 'UTF-8') : null;

\$telefono = isset(\$_POST["telefono"]) ? trim(\$_POST["telefono"]): null;\$correo = isset(\$_POST["correo"]) ? trim(\$_POST["correo"]): null;

\$fechaNacimiento = isset(\$_POST["fechaNacimiento"]) ? trim(\$_POST["fechaNacimiento"]): null;

date_default_timezone_set("America/Guayaquil");

\$fecha = date('Y-m-d H:i:s', time());

\$sql = "UPDATE usuario " .

"SET usua_cedula = '\$cedula', " .

"usu_nombres = '\$nombres', " .

"usu_apellidos = '\$apellidos', " .

"usu_direccion = '\$direccion', " .

"usu_telefono = '\$telefono', " .

"usu_correo = '\$correo', " .

"usu_fecha_nacimiento = '\$fechaNacimiento', " .

"usu_fecha_modificacion = '\$fecha' " .

"WHERE usu_codigos = \$codigo";

if (\$conn-\>query(\$sql) === TRUE) {

echo "Se ha actualizado los datos personales correctamemte!!!\<br\>";

} else {

echo "Error: " . \$sql . "\<br\>" . mysqli_error(\$conn) . "\<br\>";

}

echo "\<a href='../../../publica/vista/login.html'\>Regresar\</a\>";

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//______________________________________________________________\_

\<!DOCTYPE html\>\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona \</title\>

\</head\>

\<body\>

\<?php

//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

session_start();

\$codigo = \$_POST["codigo"];

\$contrasena1 = isset(\$_POST["contrasena1"]) ? trim(\$_POST["contrasena1"]) : null;

\$contrasena2 = isset(\$_POST["contrasena2"]) ? trim(\$_POST["contrasena2"]) : null;

\$sqlContrasena1 = "SELECT \* FROM usuario where usu_codigos='\$codigo' and usu_password=MD5('\$contrasena1')";

\$result = \$conn-\>query(\$sqlContrasena1);

if (\$result-\>num_rows \> 0) {

date_default_timezone_set("America/Guayaquil");

\$fecha = date('Y-m-d H:i:s', time());

\$sqlContrasena2 = "UPDATE usuario " .

"SET usu_password = MD5('\$contrasena2'), " .

"usu_fecha_modificacion = '\$fecha' " .

"WHERE usu_codigos = \$codigo";

if (\$conn-\>query(\$sqlContrasena2) === TRUE) {

echo "Se ha actualizado la contraseña correctamemte!!!\<br\>";

} else {

echo "\<p\>Error: " . mysqli_error(\$conn) . "\</p\>";

}

}else{

echo "\<p\>La contraseña actual no coincide con nuestros registros!!! \</p\>";

}

echo "\<a href='../../../publica/vista/login.html'\>Regresar\</a\>";

\$conn-\>close();?\>

\</body\>

\</html\>

 

 

//________________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Crear Nuevo Usuario\</title\>

\<style type="text/css" rel="stylesheet"\>

.error{

color: red;

}

\</style\>

\</head\>

\<body\>

\<?php

//incluir conexión a la base de datos

      include '../../../config/conexionBD.php';

      \$fecha = isset(\$_POST["fecha"]) ? trim(\$_POST["fecha"]) : null;

      \$hora = isset(\$_POST["hora"]) ? mb_strtoupper(trim(\$_POST["hora"]), 'UTF-8') : null;

      \$lugar = isset(\$_POST["lugar"]) ? mb_strtoupper(trim(\$_POST["lugar"]), 'UTF-8') : null;

      \$latitud = isset(\$_POST["latitud"]) ? mb_strtoupper(trim(\$_POST["latitud"]), 'UTF-8') : null;

      \$longitud = isset(\$_POST["longitud"]) ? trim(\$_POST["longitud"]): null;

      \$remitente=isset(\$_POST["remitente"]) ? trim(\$_POST["remitente"]): null;

      \$motivo = isset(\$_POST["motivo"]) ? trim(\$_POST["motivo"]): null;

      \$observa = isset(\$_POST["obser"]) ? trim(\$_POST["obser"]): null;

      \$sql = "INSERT INTO gest_reuniones VALUES (0, '\$fecha', '\$hora', '\$lugar', '\$latitud', '\$longitud',

      '\$remitente', '\$motivo', '\$observa','N',null,null)";

      if (\$conn-\>query(\$sql) === TRUE) {

      echo "\<p\>Se ha creado los datos personales correctamemte!!!\</p\>";

      } else {

      if(\$conn-\>errno == 1062){

      echo "\<p class='error'\>La reunion ya esta registrada \</p\>";

      }else{echo "\<p class='error'\>Error: " . mysqli_error(\$conn) . "\</p\>";

      }

      }

      //cerrar la base de datos

      \$conn-\>close();

      echo "\<a href='../../../publica/vista/login.html'\>Regresar\</a\>";

      ?\>

\</body\>

\</html\>

 

 

//________________________________________________________________\_

\<!DOCTYPE html\>

\<html lang="es"\>

\<head\>

    \<meta charset="UTF-8"\>

    \<meta name="viewport" content="width=device-width, initial-scale=1.0"\>

    \<meta http-equiv="X-UA-Compatible" content="ie=edge"\>

    \<title\>Document\</title\>

    \<link href ="../../../css/archivo.css" rel="stylesheet"/\>

    \<link href ="archivo.css" rel="stylesheet"/\>

    \<script type="text/javascript" src="validacion_usuario.js"\>\</script\>

    \<style type="text/css"\>

      .error {

          color: red;

          font-size: 8px;

      }

    \</style\>

\</head\>

\<body\>

\<?php

\$codigo=\$_GET['codigo'];

?\>

    \<article class="about_tss"\>

        \<h1\>Formulario\</h1\>

          \<form action="crear_reunion.php" method="post" onsubmit="return validarCampos()"\>

            \<label for="fecha"\>Fecha:\</label\>

            \<input type="text" id="fecha" name="fecha" onkeyup="return validarLetras(this);this.value=dosPalabras(this.value)"/\>

            \<br\>

                   \<label for="hora"\>Hora:\</label\>

                  \<input type="text" id="hora" name="hora" onkeyup="return validarLetras(this);this.value=dosPalabras(this.value)"/\>

                  \<br\>

                  \<label for="lugar"\>Lugar:\</label\>

                  \<input type="text" id="lugar" name="lugar" onkeyup="return validarLetras(this);this.value=dosPalabras(this.value)"/\>

                  \<br\>

                  \<label for="latitud"\>Latitud:\</label\>

                  \<input type="text" id="latitud" name="latitud"  onkeyup="return ValidarFecha();this.value=validarLetras(this.value)"/\>

                \<br\>

                \<label for="longitud"\>Longitud:\</label\>

                \<input type="text" id="longitud" name="longitud" /\>

                \<br\>

                \<input type="hidden" id="remitente" name="remitente" value="\<?php echo \$codigo ?\>" /\>

                \<br\>

                  \<label for="motivo"\>Motivo:\</label\>

                  \<input type="text" id="motivo"name="motivo" maxlength="10" onkeyup="this.value=ValidarNumeros(this.value)" /\>

                  \<br\>

                  \<label for="observacion"\>Observacion:\</label\>

                  \<input type="text" id="obser" name="obser" onkeyup="return valdarCorreo();this.value=validarAlfa(this.value)"/\>

                  \<spam id="e" style="display: none;"\>ERROR\</spam\>

                  \<br\>

                  \<input type="submit" id="crear" value="Aceptar" name="crear"/\>

                  \<br\>

                  \<input type="reset" id="cancelar" name="cancelar" name="cancelar" value="Cancelar" /\>

                  \<spam id="p" style="display: none;"\>Error, campos incompletos!\</spam\>

          \</form\>

        \</article\>

  
  


\</body\>

\</html\>

 

//___________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Eliminar datos de persona \</title\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

\$codigo = \$_GET["codigo"];

//Si voy a eliminar físicamente el registro de la tabla

//\$sql = "DELETE FROM usuario WHERE codigo = '\$codigo'";

date_default_timezone_set("America/Guayaquil");

\$fecha = date('Y-m-d H:i:s', time());

\$sql = "UPDATE usuario SET usu_eliminado = 'S', usu_fecha_modificacion = '\$fecha' WHERE

usu_codigos = \$codigo";

if (\$conn-\>query(\$sql) === TRUE) {

echo "\<p\>Se ha eliminado los datos correctamemte!!!\</p\>";

} else {

echo "\<p\>Error: " . \$sql . "\<br\>" . mysqli_error(\$conn) . "\</p\>";

}

echo "\<a href='index.php'\>Regresar\</a\>";

\$conn-\>close();

?\>\</body\>

\</html\>

 

 

//____________________________________________________________\_

\<?php

include '../../../config/conexionBD.php';

\$id_estado=\$_POST['cbx_estado'];

\$codireu=isset(\$_POST["codireu"]) ? trim(\$_POST["codireu"]): null;

\$sql="INSERT INTO reu_usuarios VALUES(0,\$codireu,\$id_estado)";

\$result = \$conn-\>query(\$sql);

if(\$result){

    echo "Registro guardado";

}else{

    echo "Registro no guardado";

}

?\>

 

 

 

//____________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Gestión de usuarios\</title\>

\<a href="../../../config/cerrar_sesion.php"\>Cerrar sesion\</a\>

\</head\>

\<body\>

\<table style="width:100%"\>

\<tr\>

\<th\>Cedula\</th\>

\<th\>Nombres\</th\>

\<th\>Apellidos\</th\>

\<th\>Dirección\</th\>

\<th\>Telefono\</th\>

\<th\>Correo\</th\>

\<th\>Fecha Nacimiento\</th\>

\</tr\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

include '../../../config/conexionBD.php';

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location: /SistemaDeGestion/public/vista/login.html");

}

\$usuario = \$_GET["correo"];

\$sql = "SELECT \* FROM usuario WHERE usu_correo = '\$usuario'";

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

    while(\$row = \$result-\>fetch_assoc()) {

        echo " \<tr\>";

        echo " \<td\>" . \$row["usua_cedula"] . "\</td\>";

        echo " \<td\>" . \$row["usu_nombres"] ."\</td\>";

        echo " \<td\>" . \$row["usu_apellidos"] . "\</td\>";

        echo " \<td\>" . \$row["usu_direccion"] . "\</td\>";

        echo " \<td\>" . \$row["usu_telefono"] . "\</td\>";

        echo " \<td\>" . \$row["usu_correo"] . "\</td\>";

        echo " \<td\>" . \$row["usu_fecha_nacimiento"] . "\</td\>";

        echo " \<td\> \<a href='crear_reunionn.php?codigo=" . \$row['usu_correo'] . "'\>Crear reunion\</a\> \</td\>";

        echo " \<td\> \<a href='../../vista/user/eliminar.php?codigo=" . \$row['usu_codigos'] . "'\>Eliminar\</a\> \</td\>";

        echo " \<td\> \<a href='../../vista/user/modificar.php?codigo=" . \$row['usu_codigos'] . "'\>Modificar\</a\> \</td\>";

        echo " \<td\> \<a href='../../vista/user/cambiar_contrasena.php?codigo=" . \$row['usu_codigos'] . "'\>Cambiar

        contraseña\</a\> \</td\>";

        echo " \<td\> \<a href='../../../config/buscar.html'\>Buscar motivo\</a\> \</td\>";

        echo "\</tr\>";

}

} else {

    echo "\<tr\>";

    echo " \<td colspan='7'\> No existen usuarios registradas en el sistema \</td\>";

    echo "\</tr\>";

    }

    ?\>

    \</table\>

    \<table style="width:100%"\>

    \<tr\>

    \<th\>Fecha\</th\>

    \<th\>Hora\</th\>

    \<th\>Lugar\</th\>

    \<th\>Latitud\</th\>

    \<th\>Longitud\</th\>

    \<th\>Remitente\</th\>

    \<th\>Motivo\</th\>

    \<th\>Observacion\</th\>

    \</tr\>

    \<br\>

    \<h3\>Listado de las reuniones\</h3\>

\<br\>

    \<?php

    include '../../../config/conexionBD.php';

    \$sql = "SELECT \* FROM gest_reuniones ORDER BY reu_fecha DESC";

    \$result = \$conn-\>query(\$sql);

    if (\$result-\>num_rows \> 0) {

        while(\$row = \$result-\>fetch_assoc()) {

            echo " \<tr\>";

            echo " \<td\>" . \$row["reu_fecha"] . "\</td\>";

            echo " \<td\>" . \$row["reu_hora"] ."\</td\>";

            echo " \<td\>" . \$row["reu_lugar"] . "\</td\>";

            echo " \<td\>" . \$row["reu_latitud"] . "\</td\>";

            echo " \<td\>" . \$row["reu_longitud"] . "\</td\>";

            echo " \<td\>" . \$row["reu_remitente"] . "\</td\>";

            echo " \<td\>" . \$row["reu_motivo"] . "\</td\>";

            echo " \<td\>" . \$row["reu_observacion"] . "\</td\>";

            echo " \<td\> \<a href='invitar.php?codi=" . \$row['reu_codigo'] . "'\>Invitar\</a\> \</td\>";

            echo "\</tr\>";

    }

    } else {

    echo "\<tr\>";

    echo " \<td colspan='8'\> No existen usuarios registradas en el sistema \</td\>";

    echo "\</tr\>";

    }

    ?\>

    \</table\>

    \<br\>

    \<h3\>Listado de las reuniones a las que esta persona fue invitada\</h3\>

    \<br\>

    \<table style="width:100%"\>

    \<tr\>

    \<th\>Fecha\</th\>

    \<th\>Hora\</th\>

    \<th\>Lugar\</th\>

    \<th\>Latitud\</th\>

    \<th\>Longitud\</th\>

    \<th\>Remitente\</th\>

    \<th\>Motivo\</th\>

    \<th\>Observacion\</th\>

    \</tr\>

    \<?php

    include '../../../config/conexionBD.php';

    \$sql = "SELECT reu_fecha,reu_hora,reu_lugar,reu_latitud,reu_longitud,reu_remitente,

    reu_motivo,reu_observacion FROM gest_reuniones ge,usuario u,reu_usuarios ru

     WHERE  ru.id_reunion=ge.reu_codigo and u.usu_correo='\$usuario'";

    \$result = \$conn-\>query(\$sql);

    if (\$result-\>num_rows \> 0) {

        while(\$row = \$result-\>fetch_assoc()) {

            echo " \<tr\>";

            echo " \<td\>" . \$row["reu_fecha"] . "\</td\>";

            echo " \<td\>" . \$row["reu_hora"] ."\</td\>";

            echo " \<td\>" . \$row["reu_lugar"] . "\</td\>";

            echo " \<td\>" . \$row["reu_latitud"] . "\</td\>";

            echo " \<td\>" . \$row["reu_longitud"] . "\</td\>";

            echo " \<td\>" . \$row["reu_remitente"] . "\</td\>";

            echo " \<td\>" . \$row["reu_motivo"] . "\</td\>";

            echo " \<td\>" . \$row["reu_observacion"] . "\</td\>";

            echo "\</tr\>";

    }

    } else {

    echo "\<tr\>";

    echo " \<td colspan='8'\> No existen usuarios registradas en el sistema \</td\>";

    echo "\</tr\>";

    }

    \$conn-\>close();

    ?\>

    \</table\>

    \</body\>

    \</html\>

 

 

//_______________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Gestión de usuarios\</title\>

\<a href="../../../config/cerrar_sesion.php"\>Cerrar sesion\</a\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\<script src="js/"\>\</script\> 

\</head\>

\<body\>

    \<?php

    include '../../../config/conexionBD.php';

    \$codi=\$_GET['codi'];

    \$sql = "SELECT usu_codigos,usu_nombres FROM usuario";

    \$result = \$conn-\>query(\$sql);

    ?\>

    \<form id="combo" name="combo" action="guarda.php" method="POST"\>

     \<div\> Selecciona un usuario:\<select id="cbx_estado" name="cbx_estado"\>

        \<option id ="codigo" value="0"\>Seleccionar usuario\</option\>

        \<?php while(\$row =\$result-\>fetch_assoc()) { ?\>

         \<option value="\<?php echo \$row['usu_codigos']; ?\>"\>\<?php echo \$row['usu_nombres']; ?\>\</option\>

        \<?php } ?\>

        \<input type="hidden" id="codireu" name="codireu" value="\<?php echo \$codi ?\>" /\>

        \<input type="submit" id="enviar" value="Guardar" /\>

        \</select\>

        \</div\>

        \</body\>

\</html\>

 

 

//_________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona \</title\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

//incluir conexión a la base de datos

include '../../../config/conexionBD.php';

\$codigo = \$_POST["codigo"];

\$cedula = isset(\$_POST["cedula"]) ? trim(\$_POST["cedula"]) : null;

\$nombres = isset(\$_POST["nombres"]) ? mb_strtoupper(trim(\$_POST["nombres"]), 'UTF-8') : null;

\$apellidos = isset(\$_POST["apellidos"]) ? mb_strtoupper(trim(\$_POST["apellidos"]), 'UTF-8') : null;

\$direccion = isset(\$_POST["direccion"]) ? mb_strtoupper(trim(\$_POST["direccion"]), 'UTF-8') : null;

\$telefono = isset(\$_POST["telefono"]) ? trim(\$_POST["telefono"]): null;\$correo = isset(\$_POST["correo"]) ? trim(\$_POST["correo"]): null;

\$fechaNacimiento = isset(\$_POST["fechaNacimiento"]) ? trim(\$_POST["fechaNacimiento"]): null;

date_default_timezone_set("America/Guayaquil");

\$fecha = date('Y-m-d H:i:s', time());

\$sql = "UPDATE usuario " .

"SET usua_cedula = '\$cedula', " .

"usu_nombres = '\$nombres', " .

"usu_apellidos = '\$apellidos', " .

"usu_direccion = '\$direccion', " .

"usu_telefono = '\$telefono', " .

"usu_correo = '\$correo', " .

"usu_fecha_nacimiento = '\$fechaNacimiento', " .

"usu_fecha_modificacion = '\$fecha' " .

"WHERE usu_codigos = \$codigo";

if (\$conn-\>query(\$sql) === TRUE) {

echo "Se ha actualizado los datos personales correctamemte!!!\<br\>";

} else {

echo "Error: " . \$sql . "\<br\>" . mysqli_error(\$conn) . "\<br\>";

}

echo "\<a href='../../../publica/vista/login.html'\>Regresar\</a\>";

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//___________________________________________________________\_

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona\</title\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

\$codigo = \$_GET["codigo"];

?\>

\<form id="formulario01" method="POST" action="../../controladores/admin/cambiar_constrasena.php"\>

\<input type="hidden" id="codigo" name="codigo" value="\<?php echo \$codigo ?\>" /\>

\<label for="cedula"\>Contraseña Actual (\*)\</label\>

\<input type="password" id="contrasena1" name="contrasena1" value="" required

placeholder="Ingrese su contraseña actual ..."/\>

\<br\>

\<label for="cedula"\>Contraseña Nueva (\*)\</label\>

\<input type="password" id="contrasena2" name="contrasena2" value="" required

placeholder="Ingrese su contraseña nueva ..."/\>

\<br\>

\<input type="submit" id="modificar" name="modificar" value="Modificar" /\>

\<input type="reset" id="cancelar" name="cancelar" value="Cancelar" /\>

\</form\>

\</body\>

\</html\>

 

 

//________________________________________________________________\_

 

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Eliminar datos de persona\</title\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

\$codigo = \$_GET["codigo"];

\$sql = "SELECT \* FROM usuario where usu_codigos=\$codigo";

include '../../../config/conexionBD.php';

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

while(\$row = \$result-\>fetch_assoc()) {

?\>

\<form id="formulario01" method="POST" action="../../controladores/admin/eliminar.php"\>

\<input type="hidden" id="codigo" name="codigo" value="\<?php echo \$codigo ?\>" /\>

\<label for="cedula"\>Cedula (\*)\</label\>

\<input type="text" id="cedula" name="cedula" value="\<?php echo \$row["usua_cedula"]; ?\>"

disabled/\>

\<br\>

\<label for="nombres"\>Nombres (\*)\</label\>

\<input type="text" id="nombres" name="nombres" value="\<?php echo \$row["usu_nombres"];

?\>" disabled/\>

\<br\>

\<label for="apellidos"\>Apelidos (\*)\</label\>\<input type="text" id="apellidos" name="apellidos" value="\<?php echo \$row["usu_apellidos"];

?\>" disabled/\>

\<br\>

\<label for="direccion"\>Dirección (\*)\</label\>

\<input type="text" id="direccion" name="direccion" value="\<?php echo \$row["usu_direccion"];

?\>" disabled/\>

\<br\>

\<label for="telefono"\>Teléfono (\*)\</label\>

\<input type="text" id="telefono" name="telefono" value="\<?php echo \$row["usu_telefono"];

?\>" disabled/\>

\<br\>

\<label for="fecha"\>Fecha Nacimiento (\*)\</label\>

\<input type="date" id="fechaNacimiento" name="fechaNacimiento" value="\<?php echo

\$row["usu_fecha_nacimiento"]; ?\>" disabled/\>

\<br\>

\<label for="correo"\>Correo electrónico (\*)\</label\>

\<input type="email" id="correo" name="correo" value="\<?php echo \$row["usu_correo"]; ?\>"

disabled/\>

\<br\>

\<input type="submit" id="eliminar" name="eliminar" value="Eliminar" /\>

\<input type="reset" id="cancelar" name="cancelar" value="Cancelar" /\>

\</form\>

\<?php

}

} else {

echo "\<p\>Ha ocurrido un error inesperado !\</p\>";

echo "\<p\>" . mysqli_error(\$conn) . "\</p\>";

}

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//________________________________________________________________\_

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Eliminar datos de persona\</title\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

\$codigo = \$_GET["codigo"];

\$sql = "SELECT \* FROM gest_reuniones where reu_codigo=\$codigo";

include '../../../config/conexionBD.php';

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

while(\$row = \$result-\>fetch_assoc()) {

?\>

\<form id="formulario01" method="POST" action="../../controladores/admin/eliminarreu.php"\>

\<input type="hidden" id="codigo" name="codigo" value="\<?php echo \$codigo ?\>" /\>

\<label for="fecha"\>Fecha\</label\>

\<input type="text" id="fecha" name="fecha" value="\<?php echo \$row["reu_fecha"]; ?\>"

disabled/\>

\<br\>

\<label for="hora"\>Hora\</label\>

\<input type="text" id="hora" name="hora" value="\<?php echo \$row["reu_hora"];

?\>" disabled/\>

\<br\>

\<label for="lugar"\>Lugar\</label\>\<input type="text" id="lugar" name="lugar" value="\<?php echo \$row["reu_lugar"];

?\>" disabled/\>

\<br\>

\<label for="latitud"\>Latitud\</label\>

\<input type="text" id="latitud" name="latitud" value="\<?php echo \$row["reu_latitud"];

?\>" disabled/\>

\<br\>

\<label for="longitud"\>Longitud\</label\>

\<input type="text" id="longitud" name="longitud" value="\<?php echo \$row["reu_longitud"];

?\>" disabled/\>

\<br\>

\<label for="remitente"\>Remitente\</label\>

\<input type="text" id="remitente" name="remitente" value="\<?php echo

\$row["reu_remitente"]; ?\>" disabled/\>

\<br\>

\<label for="motivo"\>Motivo\</label\>

\<input type="text" id="motivo" name="motivo" value="\<?php echo \$row["reu_motivo"]; ?\>"

disabled/\>

\<br\>

\<label for="correo"\>Observacion\</label\>

\<input type="text" id="obser" name="obser" value="\<?php echo \$row["reu_observacion"]; ?\>"

disabled/\>

\<br\>

\<input type="submit" id="eliminar" name="eliminar" value="Eliminar" /\>

\<input type="reset" id="cancelar" name="cancelar" value="Cancelar" /\>

\</form\>

\<?php

}

} else {

echo "\<p\>Ha ocurrido un error inesperado !\</p\>";

echo "\<p\>" . mysqli_error(\$conn) . "\</p\>";

}

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//____________________________________________________________\_

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona\</title\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

\$codigo = \$_GET["codigo"];

\$sql = "SELECT \* FROM usuario where usu_codigos=\$codigo";

include '../../../config/conexionBD.php';

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

while(\$row = \$result-\>fetch_assoc()) {

?\>

\<form id="formulario01" method="POST" action="../../controladores/admin/modificar.php"\>\<input type="hidden" id="codigo" name="codigo" value="\<?php echo \$codigo ?\>" /\>

\<label for="cedula"\>Cedula (\*)\</label\>

\<input type="text" id="cedula" name="cedula" value="\<?php echo \$row["usua_cedula"]; ?\>"

required placeholder="Ingrese la cedula ..."/\>

\<br\>

\<label for="nombres"\>Nombres (\*)\</label\>

\<input type="text" id="nombres" name="nombres" value="\<?php echo \$row["usu_nombres"];

?\>" required placeholder="Ingrese los dos nombres ..."/\>

\<br\>

\<label for="apellidos"\>Apelidos (\*)\</label\>

\<input type="text" id="apellidos" name="apellidos" value="\<?php echo \$row["usu_apellidos"];

?\>" required placeholder="Ingrese los dos apellidos ..."/\>

\<br\>

\<label for="direccion"\>Dirección (\*)\</label\>

\<input type="text" id="direccion" name="direccion" value="\<?php echo \$row["usu_direccion"];

?\>" required placeholder="Ingrese la dirección ..."/\>

\<br\>

\<label for="telefono"\>Teléfono (\*)\</label\>

\<input type="text" id="telefono" name="telefono" value="\<?php echo \$row["usu_telefono"];

?\>" required placeholder="Ingrese el teléfono ..."/\>

\<br\>

\<label for="fecha"\>Fecha Nacimiento (\*)\</label\>

\<input type="date" id="fechaNacimiento" name="fechaNacimiento" value="\<?php echo

\$row["usu_fecha_nacimiento"]; ?\>" required placeholder="Ingrese la fecha de nacimiento ..."/\>

\<br\>

\<label for="correo"\>Correo electrónico (\*)\</label\>

\<input type="email" id="correo" name="correo" value="\<?php echo \$row["usu_correo"]; ?\>"

required placeholder="Ingrese el correo electrónico ..."/\>

\<br\>

\<input type="submit" id="modificar" name="modificar" value="Modificar" /\>

\<input type="reset" id="cancelar" name="cancelar" value="Cancelar" /\>\</form\>

\<?php

}

} else {

echo "\<p\>Ha ocurrido un error inesperado !\</p\>";

echo "\<p\>" . mysqli_error(\$conn) . "\</p\>";

}

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//_______________________________________________________________\_

\<!DOCTYPE html\>

\<html\>

\<head\>\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona\</title\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

\$codigo = \$_GET["codigo"];

?\>

\<form id="formulario01" method="POST" action="../../controladores/user/cambiar_contrasena.php"\>

\<input type="hidden" id="codigo" name="codigo" value="\<?php echo \$codigo ?\>" /\>

\<label for="cedula"\>Contraseña Actual (\*)\</label\>

\<input type="password" id="contrasena1" name="contrasena1" value="" required

placeholder="Ingrese su contraseña actual ..."/\>

\<br\>

\<label for="cedula"\>Contraseña Nueva (\*)\</label\>

\<input type="password" id="contrasena2" name="contrasena2" value="" required

placeholder="Ingrese su contraseña nueva ..."/\>

\<br\>

\<input type="submit" id="modificar" name="modificar" value="Modificar" /\>

\<input type="reset" id="cancelar" name="cancelar" value="Cancelar" /\>

\</form\>

\</body\>

\</html\>

 

 

//________________________________________________________________\_

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Eliminar datos de persona\</title\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

\$codigo = \$_GET["codigo"];

\$sql = "SELECT \* FROM usuario where usu_codigos=\$codigo";

include '../../../config/conexionBD.php';

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

while(\$row = \$result-\>fetch_assoc()) {

?\>

\<form id="formulario01" method="POST" action="../../controladores/user/eliminar.php"\>

\<input type="hidden" id="codigo" name="codigo" value="\<?php echo \$codigo ?\>" /\>

\<label for="cedula"\>Cedula (\*)\</label\>

\<input type="text" id="cedula" name="cedula" value="\<?php echo \$row["usua_cedula"]; ?\>"

disabled/\>

\<br\>

\<label for="nombres"\>Nombres (\*)\</label\>

\<input type="text" id="nombres" name="nombres" value="\<?php echo \$row["usu_nombres"];

?\>" disabled/\>

\<br\>

\<label for="apellidos"\>Apelidos (\*)\</label\>\<input type="text" id="apellidos" name="apellidos" value="\<?php echo \$row["usu_apellidos"];

?\>" disabled/\>

\<br\>

\<label for="direccion"\>Dirección (\*)\</label\>

\<input type="text" id="direccion" name="direccion" value="\<?php echo \$row["usu_direccion"];

?\>" disabled/\>

\<br\>

\<label for="telefono"\>Teléfono (\*)\</label\>

\<input type="text" id="telefono" name="telefono" value="\<?php echo \$row["usu_telefono"];

?\>" disabled/\>

\<br\>

\<label for="fecha"\>Fecha Nacimiento (\*)\</label\>

\<input type="date" id="fechaNacimiento" name="fechaNacimiento" value="\<?php echo

\$row["usu_fecha_nacimiento"]; ?\>" disabled/\>

\<br\>

\<label for="correo"\>Correo electrónico (\*)\</label\>

\<input type="email" id="correo" name="correo" value="\<?php echo \$row["usu_correo"]; ?\>"

disabled/\>

\<br\>

\<input type="submit" id="eliminar" name="eliminar" value="Eliminar" /\>

\<input type="reset" id="cancelar" name="cancelar" value="Cancelar" /\>

\</form\>

\<?php

}

} else {

echo "\<p\>Ha ocurrido un error inesperado !\</p\>";

echo "\<p\>" . mysqli_error(\$conn) . "\</p\>";

}

\$conn-\>close();

?\>

\</body\>

\</html\>

 

 

//_____________________________________________________________\_

\<!DOCTYPE html\>

\<html\>

\<head\>

\<meta charset="UTF-8"\>

\<title\>Modificar datos de persona\</title\>

\<link href ="../../../css/archivo.css" rel="stylesheet"/\>

\</head\>

\<body\>

\<?php

session_start();

if(!isset(\$_SESSION['isLogged']) \|\| \$_SESSION['isLogged'] === FALSE){

header("Location:../../../publica/vista/login.html");

}

?\>

\<?php

\$codigo = \$_GET["codigo"];

\$sql = "SELECT \* FROM usuario where usu_codigos=\$codigo";

include '../../../config/conexionBD.php';

\$result = \$conn-\>query(\$sql);

if (\$result-\>num_rows \> 0) {

while(\$row = \$result-\>fetch_assoc()) {

?\>

\<form id="formulario01" method="POST" action="../../controladores/user/modificar.php"\>\<input type="hidden" id="codigo" name="codigo" value="\<?php echo \$codigo ?\>" /\>

\<label for="cedula"\>Cedula (\*)\</label\>

\<input type="text" id="cedula" name="cedula" value="\<?php echo \$row["usua_cedula"]; ?\>"

required placeholder="Ingrese la cedula ..."/\>

\<br\>

\<label for="nombres"\>Nombres (\*)\</label\>

\<input type="text" id="nombres" name="nombres" value="\<?php echo \$row["usu_nombres"];

?\>" required placeholder="Ingrese los dos nombres ..."/\>

\<br\>

\<label for="apellidos"\>Apelidos (\*)\</label\>

\<input type="text" id="apellidos" name="apellidos" value="\<?php echo \$row["usu_apellidos"];

?\>" required placeholder="Ingrese los dos apellidos ..."/\>

\<br\>

\<label for="direccion"\>Dirección (\*)\</label\>

\<input type="text" id="direccion" name="direccion" value="\<?php echo \$row["usu_direccion"];

?\>" required placeholder="Ingrese la dirección ..."/\>

\<br\>

\<label for="telefono"\>Teléfono (\*)\</label\>

\<input type="text" id="telefono" name="telefono" value="\<?php echo \$row["usu_telefono"];

?\>" required placeholder="Ingrese el teléfono ..."/\>

\<br\>

\<label for="fecha"\>Fecha Nacimiento (\*)\</label\>

\<input type="date" id="fechaNacimiento" name="fechaNacimiento" value="\<?php echo

\$row["usu_fecha_nacimiento"]; ?\>" required placeholder="Ingrese la fecha de nacimiento ..."/\>

\<br\>

\<label for="correo"\>Correo electrónico (\*)\</label\>

\<input type="email" id="correo" name="correo" value="\<?php echo \$row["usu_correo"]; ?\>"

required placeholder="Ingrese el correo electrónico ..."/\>

\<br\>

\<input type="submit" id="modificar" name="modificar" value="Modificar" /\>

\<input type="reset" id="cancelar" name="cancelar" value="Cancelar" /\>\</form\>

\<?php

}

} else {

echo "\<p\>Ha ocurrido un error inesperado !\</p\>";

echo "\<p\>" . mysqli_error(\$conn) . "\</p\>";

}

\$conn-\>close();

?\>

\</body\>

\</html\>

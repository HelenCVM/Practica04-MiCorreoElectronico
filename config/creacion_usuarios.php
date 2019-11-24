<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Crear Nuevo Usuario</title>
<style type="text/css" rel="stylesheet">
.error{
color: red;
}
</style>
</head>
<body>
<?php
//incluir conexión a la base de datos
include 'conexionBD.php';
$cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
$nombres = isset($_POST["name"]) ? mb_strtoupper(trim($_POST["name"]), 'UTF-8') : null;
$apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
$direccion = isset($_POST["dire"]) ? mb_strtoupper(trim($_POST["dire"]), 'UTF-8') : null;
$telefono = isset($_POST["telefono"]) ? trim($_POST["telefono"]): null;
$correo = isset($_POST["mail"]) ? trim($_POST["mail"]): null;
$fechaNacimiento = isset($_POST["fecha"]) ? trim($_POST["fecha"]): null;
$contrasena = isset($_POST["contra"]) ? trim($_POST["contra"]) : null;
$rol=isset($_POST["rol"]) ? trim($_POST["rol"]): 'U'; 
$sql = "INSERT INTO usuario VALUES (0, '$cedula', '$nombres', '$apellidos', '$direccion', '$telefono',
'$correo', MD5('$contrasena'), '$fechaNacimiento', 'N', null, null ,'$rol')";
if ($conn->query($sql) === TRUE) {
echo "<p>Se ha creado los datos personales correctamemte!!!</p>";
} else {
if($conn->errno == 1062){
echo "<p class='error'>La persona con la cedula $cedula ya esta registrada en el sistema </p>";
}else{echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
}
}
//cerrar la base de datos
$conn->close();
echo "<a href='../publica/vista/login.html'>Regresar</a>";
?>
</body>
</html>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Eliminar datos de persona</title>
<link href ="../../../css/archivo.css" rel="stylesheet"/>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location:../../../publica/vista/login.html");
}
?>
<?php
$codigo = $_GET["codigo"];
$sql = "SELECT * FROM gest_reuniones where reu_codigo=$codigo";
include '../../../config/conexionBD.php';
$result = $conn->query($sql);
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
?>
<form id="formulario01" method="POST" action="../../controladores/admin/eliminarreu.php">
<input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>" />
<label for="fecha">Fecha</label>
<input type="text" id="fecha" name="fecha" value="<?php echo $row["reu_fecha"]; ?>"
disabled/>
<br>
<label for="hora">Hora</label>
<input type="text" id="hora" name="hora" value="<?php echo $row["reu_hora"];
?>" disabled/>
<br>
<label for="lugar">Lugar</label><input type="text" id="lugar" name="lugar" value="<?php echo $row["reu_lugar"];
?>" disabled/>
<br>
<label for="latitud">Latitud</label>
<input type="text" id="latitud" name="latitud" value="<?php echo $row["reu_latitud"];
?>" disabled/>
<br>
<label for="longitud">Longitud</label>
<input type="text" id="longitud" name="longitud" value="<?php echo $row["reu_longitud"];
?>" disabled/>
<br>
<label for="remitente">Remitente</label>
<input type="text" id="remitente" name="remitente" value="<?php echo
$row["reu_remitente"]; ?>" disabled/>
<br>
<label for="motivo">Motivo</label>
<input type="text" id="motivo" name="motivo" value="<?php echo $row["reu_motivo"]; ?>"
disabled/>
<br>
<label for="correo">Observacion</label>
<input type="text" id="obser" name="obser" value="<?php echo $row["reu_observacion"]; ?>"
disabled/>
<br>
<input type="submit" id="eliminar" name="eliminar" value="Eliminar" />
<input type="reset" id="cancelar" name="cancelar" value="Cancelar" />
</form>
<?php
}
} else {
echo "<p>Ha ocurrido un error inesperado !</p>";
echo "<p>" . mysqli_error($conn) . "</p>";
}
$conn->close();
?>
</body>
</html>
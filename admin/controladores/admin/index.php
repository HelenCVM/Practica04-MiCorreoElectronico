<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gestión de usuarios</title>
<a href="../../../config/cerrar_sesion.php">Cerrar sesion</a>
</head>
<body>
<table style="width:100%">
<tr>
<th>Cedula</th>
<th>Nombres</th>
<th>Apellidos</th>
<th>Dirección</th>
<th>Telefono</th>
<th>Correo</th>
<th>Fecha Nacimiento</th>
</tr>
<?php
session_start();
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location:../../../publica/vista/login.html");
}
?>
<?php
include '../../../config/conexionBD.php';
if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
header("Location:../../../publica/vista/login.html");
}
$sql = "SELECT * FROM usuario WHERE rol='U'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo " <tr>";
        echo " <td>" . $row["usua_cedula"] . "</td>";
        echo " <td>" . $row["usu_nombres"] ."</td>";
        echo " <td>" . $row["usu_apellidos"] . "</td>";
        echo " <td>" . $row["usu_direccion"] . "</td>";
        echo " <td>" . $row["usu_telefono"] . "</td>";
        echo " <td>" . $row["usu_correo"] . "</td>";
        echo " <td>" . $row["usu_fecha_nacimiento"] . "</td>";
        echo " <td> <a href='../../vista/admin/modificar.php?codigo=" . $row['usu_codigos'] . "'>Modificar</a> </td>";
        echo " <td> <a href='../../vista/admin/eliminar.php?codigo=" . $row['usu_codigos'] . "'>Eliminar</a> </td>";
        echo " <td> <a href='../../vista/admin/cambiar_contrasena.php?codigo=" . $row['usu_codigos'] . "'>Cambiar
        contraseña</a> </td>";
        echo "</tr>";
    
}
} else {
echo "<tr>";
echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
echo "</tr>";
}
?>
</table>

<table style="width:100%">
<tr>
<th>Fecha</th>
<th>Hora</th>
<th>Lugar</th>
<th>Latitud</th>
<th>Longitud</th>
<th>Remitente</th>
<th>Motivo</th>
<th>Observacion</th>
</tr>

<?php
include '../../../config/conexionBD.php';
$sql = "SELECT * FROM gest_reuniones ORDER BY reu_fecha DESC";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo " <tr>";
        echo " <td>" . $row["reu_fecha"] . "</td>";
        echo " <td>" . $row["reu_hora"] ."</td>";
        echo " <td>" . $row["reu_lugar"] . "</td>";
        echo " <td>" . $row["reu_latitud"] . "</td>";
        echo " <td>" . $row["reu_longitud"] . "</td>";
        echo " <td>" . $row["reu_remitente"] . "</td>";
        echo " <td>" . $row["reu_motivo"] . "</td>";
        echo " <td>" . $row["reu_observacion"] . "</td>";
        echo " <td> <a href='../../vista/admin/eliminarreu.php?codigo=" . $row['reu_codigo'] . "'>Eliminar reunion</a> </td>";
        echo "</tr>";
    
}
} else {
echo "<tr>";
echo " <td colspan='8'> No existen usuarios registradas en el sistema </td>";
echo "</tr>";
}
$conn->close();
?>
</table>


    
</body>
</html>
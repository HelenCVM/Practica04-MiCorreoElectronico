<?php
session_start();
if (!isset($_SESSION['isLogin'])) {
    header("Location: ../vista/login.html");
} elseif ($_SESSION['rol'] == 'U') {
   header("Location: ../../admin/controladores/user/index.");
}
?>

<?php
//incluir conexión a la base de datos
include '../../config/conexionBD.php';
$usuario = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
$contrasena = isset($_POST["contrasena"]) ? trim($_POST["contrasena"]) : null;
$sql = "SELECT * FROM usuario WHERE usu_correo = '$usuario' and usu_password =
MD5('$contrasena')";
echo $sql;
$result = $conn->query($sql);
if ($result->num_rows > 0) {
$_SESSION['isLogged'] = TRUE;
while($row = $result->fetch_assoc()) {
if($row['rol']=='A'){
header("Location:../../admin/controladores/admin/index.php");
}else{
header("Location:../../admin/controladores/user/index.php?correo=".$row['usu_correo']);   
}
}
}
else{
    header("Location: ../vista/login.html");
}
$conn->close();
//constraseña encriptada con md5
?>

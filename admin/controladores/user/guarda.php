<?php
include '../../../config/conexionBD.php';
$id_estado=$_POST['cbx_estado'];
$codireu=isset($_POST["codireu"]) ? trim($_POST["codireu"]): null;
$sql="INSERT INTO reu_usuarios VALUES(0,$codireu,$id_estado)";
$result = $conn->query($sql);
if($result){
    echo "Registro guardado";
}else{
    echo "Registro no guardado";
}
?>
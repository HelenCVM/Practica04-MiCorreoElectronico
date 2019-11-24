<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Gestión de usuarios</title>
<a href="../../../config/cerrar_sesion.php">Cerrar sesion</a>
<link href ="../../../css/archivo.css" rel="stylesheet"/>
<script src="js/"></script> 
</head>

<body>
    <?php
    include '../../../config/conexionBD.php';
    $codi=$_GET['codi'];
    $sql = "SELECT usu_codigos,usu_nombres FROM usuario";
    $result = $conn->query($sql);
    ?>
    <form id="combo" name="combo" action="guarda.php" method="POST">
     <div> Selecciona un usuario:<select id="cbx_estado" name="cbx_estado">
        <option id ="codigo" value="0">Seleccionar usuario</option>
        <?php while($row =$result->fetch_assoc()) { ?>
         <option value="<?php echo $row['usu_codigos']; ?>"><?php echo $row['usu_nombres']; ?></option>
        <?php } ?>
        <input type="hidden" id="codireu" name="codireu" value="<?php echo $codi ?>" />
        <input type="submit" id="enviar" value="Guardar" />
        </select>
        </div>
        </body>
</html>
<?php
require_once 'config.php';

if( isset($_GET['id']) && is_numeric($_GET['id']) ){
    $sql = "CALL EliminarCarpetas(".$_GET['id'].")";
    mysqli_query($conexion, $sql) or die(mysqli_error());
    
    header('location: controlCarpetasRecibidas.php?eliminar');
}else{
    header('location: controlCarpetasRecibidas.php');
}
?>
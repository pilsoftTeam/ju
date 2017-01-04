<?php
require_once 'config.php';

if( isset($_POST['guardar']) ){
    $rutPostulante = $_POST['rutPostulante'];
    $tipoBeca      = $_POST['beca'];
    $medioContacto = $_POST['medioContacto'];
    $gestionRealizada = mysqli_real_escape_string($conexion, stripslashes($_POST['gestionRealizada']));
    
    $sql = "CALL InsertarGestionDocumental('".$rutPostulante."', '".$tipoBeca."', '".$medioContacto."', '".$gestionRealizada."')";
    $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
    
    #mysqli_free_result($result);
    mysqli_close($conexion);       

    header('location: registroGestionDocs.php?registro=ok&rutPostulante='.$rutPostulante.'&beca='.$tipoBeca);
}else{
    header('location: inicio.php');
}
?>
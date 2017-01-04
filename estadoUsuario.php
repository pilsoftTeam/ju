<?php 
require_once 'config.php';

$estado     = $_POST['estado'];
$idusuario  = $_POST['usuario'];

if( is_numeric($idusuario) && isset($estado) ){
    $sqlUp = "UPDATE usuarios SET estado=";
    if( $estado == 'inactivo' ){        
        $sqlUp.="'1' ";         
    }elseif( $estado == 'activo' ){        
        $sqlUp.="'0' ";
    }   

    $sqlUp.= "WHERE idusuario=".$idusuario." LIMIT 1";
    $resUp = mysqli_query($conexion, $sqlUp) or die(mysqli_error()); 
    $afectados = mysqli_affected_rows($conexion);

    if( $resUp && $afectados == 1 ){        
        echo utf8_encode('Cambio de estado satisfactorio.');    
    }else{
        echo 'Error al intentar cambiar el estado.';
    }   
}else{        
    echo 'Falla al intentar cambiar el estado.';              
}
?>
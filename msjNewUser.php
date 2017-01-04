<?php
require_once 'config.php';
require_once 'funciones.php';

if( empty($_GET['guardarUsuario']) ){
    header("location: index.php");
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>:: Resultado ::</title>
    <?php include_once 'tagsMeta.php'; ?>
    
    <?php include_once 'tagsCSS.php'; ?>

    <?php include_once 'tagsFixJS.php'; ?>
  </head>

  <body>
    <div class="container">
        <?php include_once 'menuInicio.php'; ?>
        <h2 class="text-center well well-sm">:: Resultado ::</h2>
        
        <?php
        if( isset($_GET['guardarUsuario']) ){
            
            if( $_GET['guardarUsuario'] == 'si' ){
        ?>            
        <p class="alert alert-success"><strong>El nuevo usuario a sido ingresado correctamente !!</strong></p>
        <?php
            }else{
        ?>            
        <p class="alert alert-danger"><strong>Error durante la creaci&oacute;n del nuevo usuario. Favor, intente nuevamente.</strong></p>
        <?php
            }
        }
        ?>
                                                                             
    </div> <!-- /container -->

    <?php include_once 'tagsJS.php'; ?> 
            
  </body>
</html>
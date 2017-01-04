<?php
require_once 'config.php';
require_once 'funciones.php';

if( empty($_GET['modificarUsuario']) ){
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
        if( isset($_GET['modificarUsuario']) ){
            
            if( $_GET['modificarUsuario'] == 'si' ){
        ?>            
        <p class="alert alert-success"><strong>El usuario a sido modificado correctamente !!</strong></p>
        <?php
            }else{
        ?>            
        <p class="alert alert-danger"><strong>Error durante la modificaci&oacute;n del usuario. Favor, intente nuevamente.</strong></p>
        <?php
            }
        }
        ?>
                                                                             
    </div> <!-- /container -->

<?php include_once 'tagsJS.php'; ?>
            
  </body>
</html>
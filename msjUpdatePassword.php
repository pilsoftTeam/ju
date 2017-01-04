<?php
require_once 'config.php';
#var_dump($_GET['modificarPassword']);
if( empty($_GET['modificarPassword']) ){
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
        if( isset($_GET['modificarPassword']) ){
            if( $_GET['modificarPassword'] == 'si' ){
        ?>
        <p class="alert alert-success"><strong>La contrase&ntilde;a a sido cambiada correctamente !!</strong></p>
        <?php
            }else{
        ?>    
        <p class="alert alert-danger"><strong>Error durante la modificaci&oacute;n de la contrase&ntilde;a. Favor, intente nuevamente.</strong></p>
        <?php
            }
        }
        ?>
    <?php include_once 'tagsJS.php'; ?>
  </body>
</html>
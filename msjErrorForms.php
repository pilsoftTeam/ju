<?php
require_once 'config.php';
require_once 'funciones.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta charset="iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Licencias M&eacute;dicas" />
    <meta name="author" content="Fortunato y Asociados" />
    <link rel="icon" href="<?php echo FAVICON; ?>" />

    <title>:: Error de Validaci&oacute;n ::</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <?php include_once 'menuSuperior.php'; ?>
        <h2 class="text-center text-danger well well-sm">:: Error de Validaci&oacute;n ::</h2>
        
        <?php
        if( isset($_GET['camposVacios']) ){
        ?>            
        <p class="alert alert-danger">Estos campos son obligatorios: <strong><?php echo $_GET['camposVacios']; ?></strong></p>
        <?php
        }
        ?>

        <?php
        if( isset($_GET['largoMinCampos']) ){
        ?>            
        <p class="alert alert-danger">Estos campos requieren un M&iacute;nimo de caracteres: <strong><?php echo $_GET['largoMinCampos']; ?></strong></p>
        <?php
        }
        ?>

        <?php
        if( isset($_GET['largoMaxCampos']) ){
        ?>            
        <p class="alert alert-danger">Estos campos permiten un M&aacute;ximo de caracteres: <strong><?php echo $_GET['largoMaxCampos']; ?></strong></p>
        <?php
        }
        ?>

        <?php
        if( isset($_GET['rechazarUsuario']) ){
        ?>            
        <p class="alert alert-danger">Lo sentimos, el usuario <strong><?php echo $_GET['rechazarUsuario']; ?></strong> ya existe. Por favor, ingrese uno diferente he intente nuevamente.</p>
        <?php
        }
        ?>

        <?php
        if( isset($_GET['rechazarFuncionario']) ){
        ?>            
        <p class="alert alert-danger">Lo sentimos, el funcionario RUT: <strong><?php echo $_GET['rechazarFuncionario']; ?></strong> ya existe. Por favor, verifique el RUT he intente nuevamente.</p>
        <?php
        }
        ?>
                
        <?php
        if( isset($_GET['passDistintas']) ){
        ?>            
        <p class="alert alert-danger">Lo sentimos, las <strong>contrase&ntilde;as</strong> ingresadas no son coincidentes. Por favor, intente nuevamente.</p>
        <?php
        }
        ?>                                                                     
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
            
  </body>
</html>
<?php
require_once 'config.php';
require_once 'funciones.php';

if( empty($_GET['guardarFuncionario']) ){
    header("location: index.php");
}
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

    <title>:: Resultado ::</title>
    
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
        <h2 class="text-center well well-sm">:: Resultado ::</h2>
        
        <?php
        if( isset($_GET['guardarFuncionario']) ){
            
            if( $_GET['guardarFuncionario'] == 'si' ){
        ?>            
        <p class="alert alert-success"><strong>El nuevo funcionario a sido ingresado correctamente!!</strong></p>
        <?php
            }else{
        ?>            
        <p class="alert alert-danger"><strong>Error durante la creaci&oacute;n del nuevo funcionario. Favor, intente nuevamente.</strong></p>
        <?php
            }
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
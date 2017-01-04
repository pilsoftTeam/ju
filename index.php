<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Revisión Documental Becas Junaeb 2017</title>    
    <?php include_once 'tagsMeta.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">
      <form action="checkLogin.php" method="post" class="form-signin" role="form">
        <div class="text-center" id="form-signin-logo">
            <img src="images/logo_index.png" />
        </div>        
        <br />
        <div class="text-center bg-info">
            <i><b class="form-signin-descripcion">Empresa Fortunato y Asociados</b><br />Servicio de Revisi&oacute;n y Gesti&oacute;n de Documentaci&oacute;n Postulaciones a las Becas de Mantenci&oacute;n Junaeb 2017</i>
        </div>
        <h2 class="form-signin-heading text-primary">Iniciar Sesi&oacute;n</h2>        
        <?php
        #echo '<br />';        
        if(isset($_GET['logout'])){
            echo '<label class="control-label text-info"><strong>Sesi&oacute;n Finalizada Correctamente!</strong></label>';
        }
        
        if(isset($_GET['err'])){
            if($_GET['err']==1){
                echo '<label class="control-label text-info"><strong>Por favor Ingrese Usuario y Contrase&ntilde;a</strong></label>';
            }
            if($_GET['err']==2){
                echo '<label class="control-label text-danger"><strong>Usuario o Contrase&ntilde;a Incorrectos</strong></label>';
            }
            if($_GET['err']==3){
                echo '<label class="control-label text-danger"><strong>El tiempo de la sessi&oacute;n ha caducado.</strong></label>';
            }            
        }
        ?>        
        <label for="inputUser" class="sr-only">Usuario</label>
        <input name="username" id="inputUser" class="form-control input-sm" placeholder="Usuario" required="" autofocus="" type="text" />
        <label for="inputPassword" class="sr-only">Password</label>
        <input name="password" id="inputPassword" class="form-control" placeholder="Contrase&ntilde;a" required="" type="password"  min="6" max="15" />
        <div class="checkbox">
          <label>
            <input value="remember-me" type="checkbox" /> Recordarme
          </label>
        </div>
        <button class="btn btn-primary btn-md btn-block" type="submit">Acceder</button>
        <input type="hidden" name="login" value="" />
      </form>

    </div> <!-- /container -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
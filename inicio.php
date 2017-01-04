<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Revisión Documental Becas Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?>
    <?php include_once 'tagsCSS.php'; ?>    
    <?php include_once 'tagsFixJS.php'; ?>
  </head>
  <body>
    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      <!-- Main component for a primary marketing message or call to action -->
      <div class="jumbotron">
        <div class=" text-center">        
            <div><img src="images/logo_index.png" alt="Junaeb" title="Junaeb" /></div>                    
            <br />
            <p><b><em>Servicio de Revisi&oacute;n Documental y Gesti&oacute;n de Documentaci&oacute;n<br />Postulaciones a las Becas de Mantenci&oacute;n Junaeb 2017</em></b></p>
        </div>               
        <!--
        <div class="row text-center">
            <div class="col-xs-12 col-md-4 col-md-offset-4">            
            <div class="btn-group dropdown btn-group-lg">              
              <button type="button" class="btn btn-primary">Seleccione Tipo Beca &nbsp;</button>
              <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                <span class="caret"></span>
                <span class="sr-only">Toggle Dropdown</span>
              </button>              
              <ul class="dropdown-menu" role="menu" style="font-size: 12px;">
                <li><a href="#">Beca Presidente de la Rep&uacute;blica <span class="badge pull-right">BPR</span></a></li>
                <li><a href="#">Beca Ind&iacute;gena B&aacute;sica y Media <span class="badge pull-right">BIBM</span></a></li>
                <li><a href="#">Beca Ind&iacute;gena Edu. Superior &nbsp;<span class="badge pull-right">BISUP</span></a></li>
              </ul>
            </div>            
            </div>
        </div>
        /Split button -->                          
        <br />
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="rutPostulante.php?beca=BIBM" id="btn-bibm" class="btn btn-success btn-block btn-lg" role="button">Ind&iacute;gena B&aacute;sica &amp; Media &nbsp;&nbsp; <span class="badge">BI</span></a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="rutPostulante.php?beca=BISUP" class="btn btn-primary btn-block btn-lg" role="button">Ind&iacute;gena Superior &nbsp;&nbsp; <span class="badge">BI</span></a>
            </div>                    
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="rutPostulante.php?beca=BITM" id="btn-bitm" class="btn btn-warning btn-block btn-lg" role="button">Integ. Territorial Media &nbsp;&nbsp; <span class="badge">BIT</span></a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="rutPostulante.php?beca=BITSUP" class="btn btn-danger btn-block btn-lg active" role="button">Integ. Territorial Sup. &nbsp;&nbsp; <span class="badge">BIT</span></a>
            </div>                
        </div>
        <div class="clearfix visible-xs-block"></div>
        <br />
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="rutPostulante.php?beca=BPA" class="btn btn-default btn-block btn-lg active" role="button">Patagonia Ays&eacute;n Sup. &nbsp;&nbsp; <span class="badge">BPA</span></a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="rutPostulante.php?beca=BA" class="btn btn-info btn-block btn-lg" role="button">Ays&eacute;n Superior &nbsp;&nbsp; <span class="badge">BA</span></a>
            </div>
            <div class="col-xs-12 col-sm-3 col-md-3">
                <a href="rutPostulante.php?beca=BRI" id="btn-bri" class="btn btn-danger btn-block btn-lg" role="button">Residencia Ind&iacute;gena Sup. &nbsp;&nbsp; <span class="badge">BRI</span></a>
            </div>                
        </div>        
      </div> <!-- /jumbotron -->
    </div> <!-- /container -->

<?php include_once 'tagsJS.php'; ?>    
<script>
$(document).ready(function(){
    alert('Bienvenid@:\n\n"En su primer ingreso, favor leer MANUAL ubicado a la derecha del menú."');
    
    function parpadear(){
        $('#btn-bibm, #btn-bitm, #btn-bri').fadeIn(800).delay(400).fadeOut(200, parpadear);
    }
    parpadear();
});
<?php 
if( isset($_GET['resultCheck']) && $_GET['resultCheck']=='ok' ){ ?>
    alert('La revisión de la beca ' + <?php echo $_GET['beca']; ?> + ' fue guardada correctamente.');
<?php
}elseif( isset($_GET['resultCheck']) && $_GET['resultCheck']=='error' ){ ?>
    alert('Se a producido un error al intentar guardar la revisión de la beca ' + <?php echo $_GET['beca']; ?> + '.');
<?php
}    
?>
</script>
  </body>
</html>
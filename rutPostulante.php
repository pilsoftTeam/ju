<?php
require_once 'config.php';
$tipoBeca = $_GET['beca'];
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>RUT del Postulante - Becas Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?>
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>    
  </head>
  <body>

    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      
      <h2 class="text-center well well-sm">Rut del Postulante</h2>
      <div class="well well-sm">      
        <h4 class="text-center alert alert-info">
        <?php if($tipoBeca=='BIBM'){ ?>        
            <b>BECA IND&Iacute;GENA B&Aacute;SICA &amp; MEDIA</b>        
        <?php }elseif($tipoBeca=='BISUP'){ ?>        
            <b>BECA IND&Iacute;GENA EDU. SUPERIOR</b>        
        <?php }elseif($tipoBeca=='BITM'){ ?>        
            <b>BECA INTEGRACI&Oacute;N TERRITORIAL EDU. MEDIA</b>
        <?php }elseif($tipoBeca=='BITSUP'){ ?>
            <b>BECA INTEGRACI&Oacute;N TERRITORIAL EDU. SUPERIOR</b>
        <?php }elseif($tipoBeca=='BPA'){ ?>
            <b>BECA PATAGONIA AYS&Eacute;N</b>
        <?php }elseif($tipoBeca=='BA'){ ?>
            <b>BECA AYS&Eacute;N</b>
        <?php }elseif($tipoBeca=='BRI'){ ?>
            <b>BECA RESIDENCIA IND&Iacute;GENA</b>
        <?php } ?>
        </h4>

        <form action="checklist<?php echo $tipoBeca; ?>.php" method="post" id="formRutPostulante" class="form-horizontal" role="form">
            <fieldset>
                <div class="form-group">
                    <label for="rutPostulante" class="control-label col-xs-12 col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-3">Rut Postulante: </label>
                    <div class="col-xs-7 col-sm-3 col-md-2">                        
                        <input type="text" class="form-control" name="rutPostulante" id="rutPostulante" placeholder="Ingrese Rut" required="required" maxlength="10" />
                        <span class="text-muted"><em>Rut Ej. 21836942</em></span>
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2">                        
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Buscar</button>
                    </div>
                </div>               
            </fieldset>
            <input type="hidden" name="beca" value="<?php echo $tipoBeca; ?>" />
        </form>
      </div> <!-- /pozo -->
    </div> <!-- /container -->

<?php include_once 'tagsJS.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    alert('Favor, para realizar pruebas de revisión copie e ingrese el RUT 21836942');
<?php if(isset($_GET['rutInvalido'])){ ?>
    var rutInvalido = '<?php echo $_GET['rutInvalido'] ?>';
    alert('El RUT ' + rutInvalido + ' no se encuentra en la BD de Postulantes a la Beca <?php echo $_GET['beca']; ?>');
<?php } ?>
});
$("#formRutPostulante").validate();
</script>
  </body>
</html>
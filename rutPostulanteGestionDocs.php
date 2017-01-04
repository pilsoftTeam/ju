<?php
require_once 'config.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>RUT para Gestión de Documentos - Becas Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?> 
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>    
  </head>
  <body>
    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      
      <h2 class="text-center well well-sm">Rut del Postulante</h2>
      <div class="well well-sm">      
        <h4 class="text-center alert alert-info"><b>REGISTRO DE GESTI&Oacute;N DE DOCUMENTOS</b></h4>
        
        <form action="registroGestionDocs.php" method="post" id="formRutGestionDocs" class="form-horizontal" role="form">
            <fieldset>
                <div class="form-group">
                    <label for="rutPostulante" class="control-label col-xs-12 col-sm-3 col-sm-offset-2 col-md-2 col-md-offset-3">Rut Postulante: </label>
                    <div class="col-xs-7 col-sm-3 col-md-2">                        
                        <input type="text" class="form-control" name="rutPostulante" id="rutPostulante" placeholder="Ingrese Rut" required="required" maxlength="10" />
                    </div>
                    <div class="col-xs-12 col-sm-2 col-md-2">                        
                        <button type="submit" name="buscar" class="btn btn-primary"><span class="glyphicon glyphicon-user"></span> Buscar</button>
                    </div>
                </div>

                <div class="form-group">
                    <label for="beca" class="control-label col-xs-12 col-sm-2 col-sm-offset-4 col-md-2 col-md-offset-3">Tipo Beca:</label>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <select class="form-control" name="beca" id="beca" required="required">
                            <option value="">Seleccione...</option>
                            <option value="Indígena Básica y Media">Ind&iacute;gena B&aacute;sica &amp; Media</option>
                            <option value="Indígena Superior">Ind&iacute;gena Superior</option>
                            <option value="Integración Territorial Media">Integ. Territorial Media</option>
                            <option value="Integración Territorial Superior">Integ. Territorial Superior</option>
                            <option value="Patagonia Aysén Superior">Patagonia Ays&eacute;n Superior</option>
                            <option value="Aysén Superior">Ays&eacute;n Superior</option>
                            <option value="Residencia Indígena Superior">Residencia Ind&iacute;gena Superior</option>
                        </select>                    
                    </div>
                </div>
                                              
            </fieldset>       
        </form>
      </div> <!-- /pozo -->
    </div> <!-- /container -->

<?php include_once 'tagsJS.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    alert('Para realizar pruebas de gestión de docs. ingrese RUT 21836942 y BI B&M.');
<?php if(isset($_GET['rutInvalido'])){ ?>
    var rutInvalido = '<?php echo $_GET['rutInvalido'] ?>';
    alert('El RUT ' + rutInvalido + ' no se encuentra en la BD de Postulantes a la Beca <?php echo $_GET['beca']; ?>');
<?php } ?>
});
$("#formRutGestionDocs").validate();
</script>
  </body>
</html>
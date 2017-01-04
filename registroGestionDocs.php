<?php
require_once 'config.php';

if( isset($_GET['registro']) ){
    $tipoBeca = $_GET['beca'];
    $rutPostulante = $_GET['rutPostulante'];    
}else{
    $tipoBeca = $_POST['beca'];
    $rutPostulante = $_POST['rutPostulante'];
}
#var_dump($tipoBeca, $rutPostulante);
$result = mysqli_query($conexion, "CALL Consulta_Rut($rutPostulante)") or die(mysqli_error($conexion));
$existePostulante = mysqli_fetch_array($result);

if('FALSE' == $existePostulante['respuesta']){
    header('location: rutPostulanteGestionDocs.php?beca='.$tipoBeca.'&rutInvalido='.$rutPostulante);
    exit;
}else{
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Registro de Gesti&oacute;n de Documentos - Becas Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?>
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>    
  </head>
  <body>

    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      
      <h2 class="text-center well well-sm">Registros del Postulante</h2>
      <div class="well well-sm">      
        <h4 class="text-center alert alert-info"><b>REGISTRO DE GESTI&Oacute;N DE DOCUMENTOS</b></h4>
        
        <form action="procesarRegistroGestionDocs.php" method="post" id="formRegGestionDocs" class="form-horizontal" role="form">
            <fieldset>
                <div class="form-group">
                    <label for="gestionRealizada" class="control-label col-sm-3 col-md-2"><b>Gesti&oacute;n Realizada:</b></label>
                    <div class="col-sm-5 col-md-6">                        
                        <input type="text" class="form-control" name="gestionRealizada" id="gestionRealizada" placeholder="Describa la gestión realizada" required="required" maxlength="100" />
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <select class="form-control" name="medioContacto" id="medioContacto" required="required">
                            <option value="">Medio de Contacto</option>
                            <option value="Llamado telefónico">Llamado telef&oacute;nico</option>
                            <option value="Correo electrónico">Correo electr&oacute;nico</option>
                            <option value="Carta certificada">Carta certificada</option>
                            <option value="Visita domiciliaria">Visita domiciliaria</option>                            
                        </select>                    
                    </div>                    
                    <div class="col-sm-2 col-md-2">
                        <input type="hidden" name="beca" value="<?php echo $tipoBeca; ?>" />                        
                        <input type="hidden" name="rutPostulante" value="<?php echo $rutPostulante; ?>" />
                        <button type="submit" name="guardar" class="btn btn-primary" style="width: 100%;"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                    </div>
                </div>                                             
            </fieldset>            
        </form>
      </div> <!-- /pozo -->                 
        <?php
            mysqli_free_result($result);
            mysqli_next_result($conexion);
                    
            $sql = "CALL DatosGestionDocumental('".$rutPostulante."')";
            $result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));            
        ?>  
        <h3 class="text-center"><b>HISTORIAL DE GESTI&Oacute;N DE LA DOCUMENTACI&Oacute;N</b></h3>
        
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
                <tr class="active">
                    <th class="text-center">RUT</th>
                    <th class="text-center">Descripci&oacute;n de la Gesti&oacute;n Realizada</th>
                    <th class="text-center">Medio Contacto</th>
                    <th class="text-center">Tipo Beca</th>
                    <th class="text-center">Fecha</th>                    
                    <th class="text-center">Hora</th>
                </tr>
                <?php while( $historial = mysqli_fetch_array($result)){
                        $fecha = date('d/m/Y', strtotime($historial['fechaHora']));
                        $hora  = date('H:i', strtotime($historial['fechaHora']));
                ?>
                       
                <tr>                    
                    <td class="text-center"><?php echo $historial['rutPostulante']; ?></td>
                    <td><?php echo $historial['gestionRealizada']; ?></td>                    
                    <td class="text-center"><?php echo $historial['medioContacto']; ?></td>
                    <td class="text-center"><?php echo $historial['tipoBeca']; ?></td>
                    <td class="text-center"><?php echo $fecha; ?></td>
                    <td class="text-center"><?php echo $hora; ?></td>                    
                </tr>
                <?php }            
                    mysqli_free_result($result);    
                    mysqli_close($conexion);                
                ?>
            </table>        
        </div>
    </div> <!-- /container -->

<?php include_once 'tagsJS.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    alert('Para pruebas de gestión de docs, ingrese glosa, medio contacto y Guarde.');
<?php if(isset($_GET['registro']) && $_GET['registro'] == 'ok'){ ?>    
    alert('Registro de gestión de documentación cargado.');
<?php } ?>
});
$("#formRegGestionDocs").validate();
</script>
  </body>
</html>
<?php
}	
?>
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
$result1 = mysqli_query($conexion, "CALL Consulta_Rut($rutPostulante)") or die(mysqli_error($conexion));
$existePostulante = mysqli_fetch_array($result1);

if('FALSE' == $existePostulante['respuesta']){
    header('location: rutPostulanteCargaDocs.php?beca='.$tipoBeca.'&rutInvalido='.$rutPostulante);
    exit;
}else{
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Registro Carga de Documentos - Becas Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?>
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>    
  </head>
  <body>

    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      
      <h2 class="text-center well well-sm">Documentos del Postulante</h2>
      <div class="well well-sm">      
        <h4 class="text-center alert alert-info"><b>REGISTRO Y CARGA DE DOCUMENTOS PARA BECA <?php echo strtoupper($tipoBeca); ?></b></h4>        
        <?php
            mysqli_free_result($result1);
            mysqli_next_result($conexion);
                    
            $sql = "CALL Lista_Documentos('".$tipoBeca."')";
            $result2 = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));            
        ?>
        <div class="table-responsive">
            <table class="table table-bordered table-condensed">
                <tr class="active">
                    <th class="text-center">ID</th>
                    <th class="text-center">Tipo Certificado / Documento</th>
                    <th class="text-center" style="width: 210px;">Cargar Archivo</th>
                    <th class="text-center">Tipo Beca</th>
                    <th class="text-center">Guardar</th>
                </tr>
                <?php while( $documento = mysqli_fetch_array($result2) ){
                ?>                
                <tr>
                <!-- cada fila de la tabla es un form independiente para la carga de documentos x separado según elección -->
                <form action="procesarCargaDocs.php" method="post" enctype="multipart/form-data" role="form">                
                    <td class="text-center" style="vertical-align: middle;"><?php echo $documento['idDocumento']; ?></td>
                        <input type="hidden" name="idDoc" value="<?php echo $documento['idDocumento']; ?>" />
                    <td class="tipoDoc" style="vertical-align: middle;"><?php echo $documento['nombreCertificado']; ?></td>
                    <td>                    
                        <input type="file" name="archivo" accept="application/pdf" class="btn btn-xs form-control" />
                        <input type="hidden" name="nombreCorto" value="<?php echo $documento['nombreCortoDocumento']; ?>" />
                    </td>                    
                    <td class="text-center" style="vertical-align: middle;"><?php echo $documento['beca']; ?></td>
                    <td>
                        <input type="hidden" name="beca" value="<?php echo $tipoBeca; ?>" />                        
                        <input type="hidden" name="rutPostulante" value="<?php echo $rutPostulante; ?>" />
                        <button type="submit" name="guardar" class="btn btn-primary btn-xs btn-block">Guardar</button>                        
                    </td>
                </form>
                </tr>                
                <?php } ?>                
            </table>
        </div>
      </div> <!-- /pozo -->                 
        <?php
            mysqli_free_result($result2);
            mysqli_next_result($conexion);
                    
            $sql = "CALL DatosCargaDocumentos('".$rutPostulante."', '".$tipoBeca."')";
            $result3 = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));            
        ?>  
        <h3 class="text-center"><b>HISTORIAL CARGA DIGITALIZACI&Oacute;N</b></h3>
        
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
                <tr class="active">
                    <th class="text-center">RUT</th>
                    <th class="text-center">Documento Cargado / Subido al Sistema</th>
                    <th class="text-center">Fecha</th>                    
                    <th class="text-center">Hora</th>
                </tr>
                <?php while( $historial = mysqli_fetch_array($result3)){
                        $fecha = date('d/m/Y', strtotime($historial['fechaHora']));
                        $hora  = date('H:i', strtotime($historial['fechaHora']));
                ?>                       
                <tr>                    
                    <td class="text-center"><?php echo $historial['rutPostulante']; ?></td>
                    <td class="docCargado"><?php echo $historial['nombreCertificado']; ?></td>
                    <td class="text-center"><?php echo $fecha; ?></td>
                    <td class="text-center"><?php echo $hora; ?></td>                    
                </tr>                
                <!--  -->
                <?php }
                    mysqli_free_result($result3);
                    mysqli_close($conexion);                
                ?>
            </table>        
        </div>
    </div> <!-- /container -->

<?php include_once 'tagsJS.php'; ?>
<script type="text/javascript">
$(document).ready(function(){
    var $tipoDoc = $('td.tipoDoc');
    var docCargado = $('td.docCargado');
    $tipoDoc.each(function(i, element){
        docCargado.each(function(){
            if( $(element).text() == $(this).text() ){
                $(element).addClass('text-warning');
                $(element).parent().find('button:submit').removeClass('btn-primary').addClass('btn-warning').text('Actualizar');
            }
        });                      
    });
    alert('Para realizar pruebas de carga, ingrese un archivo PDF de Ej. y Guarde.');
});
</script>
  </body>
</html>
<?php
}	
?>
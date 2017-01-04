<?php
require_once 'config.php';
require_once 'funciones.php';

$idSupervisor     = $_SESSION['userid'];
$regionSupervisor = $_SESSION['userregion'];

if( isset($_POST['guardar']) && $_POST['guardar'] =='guardar' ){
    $cantidad = $_POST['cantidad'];
    $beca     = $_POST['beca'];
    $region   = $_POST['region'];
    $fecha    = $_POST['fecha'];
    
    if( !is_numeric($cantidad) ){
        header('location: controlCarpetasRecibidas.php?cantidad');
    }
    
    if( validarFecha($fecha) ){
        $fecha = formatDateToMySql($fecha);
    }else{
        header('location: controlCarpetasRecibidas.php?fecha='.$fecha);
    }
    
    $sql = "CALL InsertarCarpetas('".$idSupervisor."', '".$cantidad."', '".$beca."', '".$region."', '".$fecha."')";
    $result = mysqli_query($conexion, $sql) or die(mysqli_error());        
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Control de Carpetas Recibidas - Becas Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?> 
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>
    <link href="css/jquery-ui.min.css" rel="stylesheet" />
    <link href="css/jquery-ui.theme.min.css" rel="stylesheet" />
  </head>
  <body>
    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      
      <h2 class="text-center well well-sm">Cantidad de Carpetas Recibidas</h2>
      <div class="well well-sm">      
        <h4 class="text-center alert alert-info"><b>Control de Carpetas Recibidas</b></h4>
        
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" id="formControlCarpetas" class="form-horizontal" role="form">
            <fieldset>
                <div class="form-group">
                    <label for="cantidad" class="control-label col-xs-12 col-md-2">Total recibidas:</label>
                    <div class="col-xs-5 col-md-1">
                        <input type="number" class="form-control" name="cantidad" id="cantidad" placeholder="###" required="required" min="1" max="999" />
                    </div>

                    <!-- <label for="beca" class="control-label col-xs-12 col-md-1">Tipo Beca:</label> -->
                    <div class="col-xs-11 col-md-3">
                        <select class="form-control" name="beca" id="beca" required="required">
                            <option value="">-- Tipo Beca --</option>
                            <option value="BIBM">Ind&iacute;gena B&aacute;sica &amp; Media</option>
                            <option value="BISUP">Ind&iacute;gena Superior</option>
                            <option value="BITM">Integraci&oacute;n Territorial Media</option>
                            <option value="BITSUP">Integraci&oacute;n Territorial Superior</option>
                            <option value="BPA">Patagonia Ays&eacute;n Superior</option>
                            <option value="BA">Ays&eacute;n Superior</option>
                            <option value="BRI">Residencia Ind&iacute;gena Superior</option>
                        </select>
                    </div>

                    <!-- <label for="beca" class="control-label col-xs-12 col-md-1">Regi&oacute;n:</label> -->
                    <div class="col-xs-6 col-md-2">
                        <select class="form-control" name="region" id="region" required="required">
                            <option value="">-- Regi&oacute;n --</option>
                            <option value="1">1</option>
                        </select>                    
                    </div>
                    
                    <!-- <label for="fecha" class="control-label col-xs-12 col-md-1">Fecha:</label> -->
                    <div class="col-xs-8 col-md-2">
                        <input type="text" class="form-control" name="fecha" id="fecha" placeholder="Fecha Recepci&oacute;n" required="required" />
                    </div>
                                                            
                    <div class="col-xs-12 col-md-2">                        
                        <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Guardar</button>
                        <input type="hidden" name="guardar" value="guardar" />
                    </div>
                </div>                                              
            </fieldset>       
        </form>
      </div> <!-- /pozo -->
        <?php                    
            $sql = "CALL ConsultaCarpetas('".$regionSupervisor."')";
            $result2 = mysqli_query($conexion, $sql) or die(mysqli_error());            
        ?>  
        <h3 class="text-center"><b>CONTROL CANTIDAD CARPETAS RECIBIDAS</b></h3>
        
        <div class="table-responsive">
            <table class="table table-bordered table-condensed table-striped">
              <thead>  
                <tr class="active">
                    <th>RECIBIDAS</th>
                    <th>TIPO BECA</th>
                    <th>REGI&Oacute;N</th>
                    <th>SUPERVISOR</th>                    
                    <th>FECHA</th>
                    <th></th>
                </tr>
              </thead>  
                <?php while( $fila = mysqli_fetch_array($result2)){
                        $fecha = date('d-m-Y', strtotime($fila['fechaRecepcion']));
                        //$hora  = date('H:i', strtotime($fila['controlInterno']));
                ?>                       
                <tr>                                        
                    <td class="text-right"><?php echo $fila['recibidas']; ?></td>
                    <td><?php echo $fila['tipoBeca']; ?></td>
                    <td class="text-center"><?php echo $fila['region']; ?></td>
                    <td><?php echo $fila['supervisor']; ?></td>
                    <td class="text-center"><?php echo $fecha; ?></td>
                    <td>
                        <a href="eliminarRecibidas.php?id=<?php echo $fila["id"]; ?>" class="btn btn-danger btn-xs btn-block" role="button" title="Eliminar">
                            <span class="glyphicon glyphicon-ban-circle"></span>
                        </a>                    
                    </td>                    
                </tr>                 
                <!--  -->
                <?php }
                    mysqli_free_result($result2);
                    mysqli_close($conexion);                
                ?>
            </table>        
        </div>      
    </div> <!-- /container -->
    <?php include_once 'tagsJS.php'; ?>
    <script src="js/jquery-ui.min.js"></script>
    <script src="js/datepicker-es.js"></script>
    <script type="text/javascript">
    $(document).ready(function(){
        $("#fecha").datepicker({
            minDate: new Date("2016-12-29")
        });
    <?php if( isset($_GET['cantidad']) ){ ?>
        alert('El dato \"total recibidas\" ingresado no es válido.');        
    <?php }
          if( isset($_GET['fecha']) ){ ?>
        var errorFecha = '<?php echo $_GET['fecha']; ?>';
        alert('El formato de la fecha ' + errorFecha + ' no es válido.');
    <?php }
          if( isset($_GET['eliminar']) ){ ?>
        alert('Registro de carpetas recibidas fue eliminado.');
    <?php } ?>            
    });
    //$("#formControlCarpetas").validate();
</script>
  </body>
</html>
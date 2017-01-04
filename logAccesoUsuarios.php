<?php
require_once 'config.php';
require_once 'requires/Zebra_Pagination.php';

//si luego de buscar desido limpiar y mostrar todo de nuevo
if( isset($_POST['buscar']) && $_POST['buscar'] == '' ){
    $_SESSION['busqueda'] = '';
}

#paginacion con zebra_pagination
$sqlCount = "SELECT COUNT(LOG.idLog) FROM historial_acceso_usuarios LOG JOIN usuarios USER ON LOG.idUsuario=USER.idusuario";

if( isset($_POST['buscar']) && $_POST['buscar'] != '' ){
    $filtrar = mysqli_real_escape_string($conexion, (trim($_POST['buscar'])));
    $busqueda = ' WHERE ';

    if( substr_count($_POST['buscar'], '/') == 2 ){
        $postFecha = trim($_POST['buscar']);                
        list($dia, $mes, $anio) = explode('/', $postFecha);        
        
        $postFecha = $anio.'-'.$mes.'-'.$dia;
        $desde = $postFecha.' '.'00:00:00';       
        $hasta = $postFecha.' '.'59:59:59';
        
        $busqueda.= "(LOG.fechaHoraAcceso >= '".$desde."' AND LOG.fechaHoraAcceso <= '".$hasta."')";
    }else{
        $busqueda.= "(";
        $busqueda.= "USER.nombre LIKE '%".$filtrar."%' OR ";
        $busqueda.= "USER.apellidos LIKE '%".$filtrar."%' OR ";
        $busqueda.= "USER.perfil LIKE '%".$filtrar."%' OR ";
        $busqueda.= "LOG.ipUsuario LIKE '%".$filtrar."%'";
        $busqueda.= ")";
    }
    
    $_SESSION['busqueda'] = $busqueda;    
}

if( isset($_SESSION['busqueda']) && $_SESSION['busqueda'] != '' ){
    $sqlCount.= $_SESSION['busqueda'];
}

$resultCount = mysqli_query($conexion, $sqlCount) or die(mysqli_error($conexion));
$logUsuarios = mysqli_fetch_row($resultCount);

//recupero total de registros y asigno a una var
$total_registros = $logUsuarios[0];

//total de registros por pagina
$resultados = 5;

//instanciamos la clase del paginador
$paginacion = new Zebra_Pagination();

//asigno el # total de registros
$paginacion->records($total_registros);

//asigno el # de registros a mostrar por pag
$paginacion->records_per_page($resultados);
//presentacion del paginador
$paginacion->labels('Ant.', 'Sig.');

//elimina los ceros anteriores
$paginacion->padding(false);

// determina el # de links
$paginacion->selectable_pages(4);
    
$sql = "SELECT USER.nombre, USER.apellidos, USER.perfil, LOG.ipUsuario, LOG.fechaHoraAcceso "
     . "FROM historial_acceso_usuarios LOG JOIN usuarios USER ON LOG.idUsuario=USER.idusuario";

if( isset($_SESSION['busqueda']) && $_SESSION['busqueda'] != '' ){
$sql.= $_SESSION['busqueda'];
}
    
$sql.= " ORDER BY LOG.idLog DESC LIMIT ". ( ($paginacion->get_page() -1) * $resultados ) . "," .$resultados;
$result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion));
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Historial de Acceso Usuarios</title>
    <?php include_once 'tagsMeta.php'; ?>    
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>       
</head>
<body>
<div class="container">
<?php require_once 'menuInicio.php'; ?>
<h2 class="text-center well well-sm">HISTORIAL DE ACCESO USUARIOS</h2>

<div class="well well-sm">
    <div class="row">
        <div class="col-md-4 col-md-offset-8"> 
        <div class="row">
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" class="form-inline">
            <div class="col-md-8">                           
                <input type="text" name="buscar" id="buscar" value="" placeholder="Buscar..." class="form-control" style="width: 100%;" />
            </div>
            <div class="col-md-4">
                <input type="submit" name="btnbuscar" id="btnbuscar" value="Buscar" class="btn btn-primary btn-block" />                
            </div>
        </form>            
        </div>
        </div>        
    </div>
</div>

<div class="table-responsive">
<table id="Exportar_a_Excel" class="table table-condensed table-bordered table-striped table-hover">
<thead> 
<tr>
    <th>Usuario</th>
    <th>Perfil</th>
    <th>IP Cliente</th>    
    <th>Fecha</th>
    <th>Hora</th>    
</tr>
</thead>
<tbody>
<?php
while( $fila = mysqli_fetch_array($result) ){
    $fecha = date('d/m/Y', strtotime($fila['fechaHoraAcceso']));
    $hora  = date('H:i', strtotime($fila['fechaHoraAcceso']));
?>
<tr>               
    <td><?php echo $fila["nombre"].' '.$fila["apellidos"]; ?></td>    
    <td class="text-center text-primary"><b><?php echo $fila["perfil"]; ?></b></td>    
    <td class="text-center"><?php echo $fila["ipUsuario"]; ?></td>
    <td class="text-center"><?php echo $fecha; ?></td>
    <td class="text-center"><?php echo $hora; ?></td>
</tr>
<?php 
}
?>
</tbody>
</table>

<div class="text-center text-info"><b>TOTAL <?php echo $total_registros; ?> REGISTROS</b></div>

<?php
	$paginacion->render();
?>
</div> <!-- /table-responsive -->
</div> <!-- /container -->

<?php include_once 'tagsJS.php'; ?>
<script>               
$(document).ready(function(){   
});
alert("Historial de acceso de usuarios al sistema de revisión becas Junaeb 2017.");
</script>    
</body>
</html>
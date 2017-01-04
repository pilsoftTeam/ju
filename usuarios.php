<?php
require_once 'config.php';
require_once 'funciones.php';
require_once 'requires/Zebra_Pagination.php';
//header('Content-Type: text/html; charset=iso-8859-1');
//si luego de buscar desido limpiar y mostrar todo de nuevo
if( isset($_POST['buscar']) && $_POST['buscar'] == '' ){
    $_SESSION['busquedaUsuario'] = '';
}

#paginacion con zebra_pagination
$sqlCount = "SELECT COUNT(*) FROM usuarios WHERE ";
          
//para evitar busqueda de espacios vacios
//$_POST['buscar'] = trim($_POST['buscar']);

if( isset($_POST['buscar']) && $_POST['buscar'] != '' ){

    $filtrar = trim($_POST['buscar']);
    #$filtrar = busqueda($filtrar);
    #echo $filtrar;
    $busqueda = '';
        
    $busqueda.= "(";
    $busqueda.= "nombre LIKE '%".$filtrar."%' OR ";
    $busqueda.= "apellidos LIKE '%".$filtrar."%' OR ";
    $busqueda.= "usuario LIKE '%".$filtrar."%' OR ";
    $busqueda.= "perfil LIKE '%".$filtrar."%'";
    $busqueda.= ") AND ";
    
    $_SESSION['busquedaUsuario'] = $busqueda;
    
}

if( isset($_SESSION['busquedaUsuario']) && $_SESSION['busquedaUsuario'] != '' ){
    $sqlCount.= $_SESSION['busquedaUsuario'];
}

$where = " usuario<>'admin' ";
//concateno la condicion anterior para simplificar y aplicar la misma en query sgte...
$sqlCount.= $where;
       
$resultCount = mysqli_query($conexion, $sqlCount) or die(mysqli_error());
$count = mysqli_fetch_row($resultCount);

//recupero total de registros y asigno a una var
$total_registros = (int)$count[0];

//total de registros por pagina
$resultados = 10;

//instanciamos la clase del paginador
$paginacion = new Zebra_Pagination();

//asigno el # total de registros
$paginacion->records($total_registros);

//asigno el # de registros a mostrar por pag
$paginacion->records_per_page($resultados);
//presentacion del paginador
$paginacion->labels('Anterior', 'Siguiente');

//elimina los ceros anteriores
$paginacion->padding(false);

// determina el # de links
$paginacion->selectable_pages(11);
    
$sql = "SELECT idusuario, nombre, apellidos, usuario, perfil, estado, region FROM usuarios WHERE ";

if( isset($_SESSION['busquedaUsuario']) && $_SESSION['busquedaUsuario'] != '' ){
    $sql.= $_SESSION['busquedaUsuario'];
}

$sql.= $where;
    
$sql.= "ORDER BY estado DESC, nombre, apellidos LIMIT ". ( ($paginacion->get_page() -1) * $resultados ) . "," .$resultados;
#echo $sql; 
$result = mysqli_query($conexion, $sql) or die(mysqli_error());
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Mantenedor de Usuarios</title>  
    <?php include_once 'tagsMeta.php'; ?>    
    <?php include_once 'tagsCSS.php'; ?>         
    <?php include_once 'tagsFixJS.php'; ?>   
  </head>

  <body>

    <div class="container">
      <?php include_once 'menuInicio.php'; ?>
      <h2 class="text-center well well-sm">Mantenedor de Usuarios</h2>    
                   
        <div class="well well-sm">
        <div class="row">
            <div class="col-md-1 col-md-offset-3">
                <a href="nuevoUsuario.php" class="btn btn-primary btn-sm btn-block" title="Nuevo">
                    <span class="glyphicon glyphicon-plus"></span>
                </a>
            </div>        
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" role="form">
                <div class="col-md-2 col-md-offset-2">                        
                    <label class="sr-only" for="buscar">Buscar: </label>               
                    <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control input-sm" />
                </div>
                <div class="col-md-1">
                    <button type="submit" name="btnbuscar" id="btnbuscar" class="btn btn-primary btn-sm btn-block" title="Buscar">
                        <span class="glyphicon glyphicon-search"></span>
                    </button>                      
                </div>
            </form>  
        </div>
        </div>
        
        <div class="row">
        <div class="table-responsive">
            <div class="col-md-6 col-md-offset-3">
                <form name="formRegistros" id="formRegistros">
                    <table class="table table-striped table-hover table-condensed table-bordered">
                        <thead> 
                            <tr>
                                <th>NOMBRE</th>
                                <th>APELLIDOS</th>    
                                <th>USUARIO</th>
                                <th>PERF&Iacute;L</th>
                                <th>REGI&Oacute;N</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                
                        <tbody>
                        <?php
                        while($fila = mysqli_fetch_assoc($result)){
                        ?>
                        <tr>                                
                            <td><?php echo $fila["nombre"]; ?></td>                                
                            <td><?php echo $fila["apellidos"]; ?></td>
                            <td class="text-center text-info"><strong><?php echo $fila["usuario"]; ?></strong></td>
                            <td class="text-center"><?php if( $fila["perfil"]=='Supervisor' ){ echo 'Supervisor'; }else{ echo $fila["perfil"]; } ?></td>
                            <td class="text-center text-primary"><strong><?php if( $fila["perfil"]=='Supervisor' ){ echo $fila["region"]; }else{ echo 'N/A'; } ?></strong></td>
                            <!--<td class="text-center"><?php if( $fila["estado"]==1 ){ echo 'Activo'; }else{ echo 'Inactivo'; } ?></td>-->
                            <td>
                                <a href="actualizarUsuario.php?id=<?php echo $fila["idusuario"]; ?>" class="btn btn-warning btn-xs btn-block" role="button" title="Modificar">
                                    <span class="glyphicon glyphicon-refresh"></span>
                                </a>
                            </td>
                            <?php if( $fila["estado"] == 1 ){ ?>
                            <td>
                                <button type="button" value="<?php echo $fila["idusuario"]; ?>" class="activo btn btn-success btn-xs btn-block" title="Inactivar">
                                    <span class="glyphicon glyphicon-ok"></span>
                                </button>
                                
                            </td>
                            <?php }else{ ?>
                            <td>
                                <button type="button" value="<?php echo $fila["idusuario"]; ?>" class="inactivo btn btn-danger btn-xs btn-block" title="Activar">
                                    <span class="glyphicon glyphicon-ban-circle"></span>
                                </button>
                            </td>
                            <?php } ?>    
                        </tr>
                        <?php 
                        }
                        ?>
                        </tbody>
                    </table>
                </form>
            </div>                      

        </div> <!-- /table-responsive -->                                            
        </div> <!-- /row -->  
        
        <div class="text-info text-center"><strong>TOTAL <?php echo $total_registros; ?> REGISTROS</strong></div>
        <?php
        	$paginacion->render();
        ?>                                  
    </div> <!-- /container -->
    <?php include_once 'tagsJS.php'; ?>         
    <script>
    $(document).ready(function(){
       $('.activo, .inactivo').on("click", function(){
           var actual = $(this).attr('class').split(' ')[0];
           var idusuario = $(this).val();
           var url = 'estadoUsuario.php';
           
           $.post(url, {estado: actual, usuario: idusuario}, function(data){
                alert(data);
                location.reload();
           });           
       });           	   
    });      
    </script>        
  </body>
</html>
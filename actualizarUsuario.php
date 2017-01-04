<?php
require_once 'config.php';
require_once 'funciones.php';

$sqlRegion = "SELECT DISTINCT(numRegion) FROM regiones";
$resRegion = mysqli_query($conexion, $sqlRegion) or die(mysqli_error());
    
if( isset($_GET['id']) ){
    $sql = "SELECT * FROM usuarios WHERE idusuario='".$_GET['id']."' LIMIT 1";
    $res = mysqli_query($conexion, $sql) or die(mysqli_error());
    $usuario = mysqli_fetch_assoc($res);
}    

if( isset($_POST["submit"]) ){    
    $nombre    = ucwords(strtolower(limpiarString(trim($_POST["nombre"]))));
    $apellidos = ucwords(strtolower(limpiarString(trim($_POST["apellidos"]))));
    #$usuario   = strtolower(limpiarString(trim($_POST["usuario"])));
    $perfil    = $_POST["perfil"];
    $estado    = $_POST["estado"];
    if( empty($_POST["region"]) || $perfil != 'Supervisor' ){
        $region = 0;
    }else{
        $region = $_POST["region"];
    }    
    
    $msjCamposVacios   = '';
    $msjLargoMinCampos = '';     
    $msjLargoMaxCampos = '';
    
    if( campoVacio($nombre) ){
        $msjCamposVacios.= 'Nombre | ';        
    }
    if( campoVacio($apellidos) ){
        $msjCamposVacios.= 'Apellidos | ';
    }
#    if( campoVacio($usuario) ){
#        $msjCamposVacios.= 'Usuario | ';
#    }
    if( campoVacio($perfil) ){
        $msjCamposVacios.= 'Perfil | ';
    }
    if(  campoVacio($estado) ){
        $msjCamposVacios.= 'Estado';
    }

    if( largoMin($nombre, 2) ){
        $msjLargoMinCampos.= 'Nombre=2 | ';
    }    
    if( largoMin($apellidos, 2) ){
        $msjLargoMinCampos.= 'Apellidos=2';
    }                            
#    if( largoMin($usuario, 2) ){
#        $msjLargoMinCampos.= 'Usuario=2';
#    }
    
    if( largoMax($nombre, 30) ){
        $msjLargoMaxCampos.= 'Nombre=30 | ';
    }    
    if( largoMax($apellidos, 30) ){
        $msjLargoMaxCampos.= 'Apellidos=30';
    }                            
#    if( largoMax($usuario, 20) ){
#        $msjLargoMaxCampos.= 'Usuario=20';
#    }
                                                                                                                                                        
    if( $msjCamposVacios != '' ){
        header("location: msjErrorForms.php?camposVacios=".$msjCamposVacios);        
    }elseif( $msjLargoMinCampos != '' ){
        header("location: msjErrorForms.php?largoMinCampos=".$msjLargoMinCampos);
    }elseif( $msjLargoMaxCampos != '' ){
        header("location: msjErrorForms.php?largoMaxCampos=".$msjLargoMaxCampos);
#    }elseif( $existe != 0 ){
#        header("location: msjErrorForms.php?rechazarUsuario=".$usuario);         
#    }        
    }else{            
        $query = "UPDATE usuarios SET nombre='".$nombre."', apellidos='".$apellidos."', perfil='".$perfil."', estado='".$estado."', region='".$region."' "
               . "WHERE idusuario=".$_POST["id"]." LIMIT 1";
        $result = mysqli_query($conexion, $query) or die(mysqli_error());
        
        if($result){
            header("location: msjUpdateUser.php?modificarUsuario=si");            
        }else{
            header("location: msjUpdateUser.php?modificarUsuario=no");
        }        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Modificar Usuario</title>
    <?php include_once 'tagsMeta.php'; ?>    
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>
  </head>

  <body>

    <div class="container">
        <?php include_once 'menuInicio.php'; ?>
        <h2 class="text-center well well-sm">Modificar Usuario</h2>            
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myForm" class="form-horizontal" role="form">                     
            <div class="form-group">
                <label for="nombre" class="col-md-1 col-md-offset-4">Nombre</label>
                <div class="col-md-3">
                    <input type="text" name="nombre" id="nombre" value="<?php echo $usuario['nombre']; ?>" class="form-control input-sm" required="required" minlength="2" maxlength="30" placeholder="Nombre" title="Ingrese nombre"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="apellidos" class="col-md-1 col-md-offset-4">Apellidos</label>
                <div class="col-md-3">
                    <input type="text" name="apellidos" id="apellidos" value="<?php echo $usuario['apellidos']; ?>" class="form-control input-sm" required="required" minlength="2" maxlength="30" placeholder="Apellidos" title="Ingrese apellidos"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="perfil" class="col-md-1 col-md-offset-4">Perfil</label>
                <div class="col-md-2">
                    <select name="perfil" id="perfil" class="form-control input-sm" required="required" title="Seleccione un perfil">
                        <option value="Revisor"<?php if( $usuario['perfil'] == 'Revisor' ){ ?> selected="selected"<?php } ?>>Revisor</option>
                        <option value="Supervisor"<?php if( $usuario['perfil'] == 'Supervisor' ){ ?> selected="selected"<?php } ?>>Supervisor</option>
                        <!--<option value="Jefe Proyecto"<?php if( $usuario['perfil'] == 'Jefe Proyecto' ){ ?> selected="selected"<?php } ?>>Jefe Proyecto</option>-->                        
                        <option value="Junaeb"<?php if( $usuario['perfil'] == 'Junaeb' ){ ?> selected="selected"<?php } ?>>Junaeb</option>
                    </select>                    
                </div>                
            </div>

            <div class="form-group" id="regiones" style="display: none;">
                <label for="region" class="col-md-1 col-md-offset-4">Regi&oacute;n</label>
                <div class="col-md-2">
                    <select name="region" id="region" class="form-control input-sm" required="">
                        <option value="">Regi&oacute;n</option>
                        <?php while( $regiones = mysqli_fetch_array($resRegion) ){ ?>
                        <option value="<?php echo $regiones['numRegion']; ?>"<?php if($regiones['numRegion']==$usuario['region']){ ?> selected="selected"<?php } ?>><?php echo $regiones['numRegion']; ?></option>
                        <?php } ?>                                            
                    </select>
                </div>
            </div>
            
            <div class="form-group">
                <label for="estado" class="col-md-1 col-md-offset-4">Estado</label>
                <div class="col-md-2">
                    <select name="estado" id="estado" class="form-control input-sm" required="required" title="Seleccione un estado">
                        <option value="1"<?php if( $usuario['estado'] == '1' ){ ?> selected="selected"<?php } ?>>Activo</option>
                        <option value="0"<?php if( $usuario['estado'] == '0' ){ ?> selected="selected"<?php } ?>>Inactivo</option>
                    </select>                    
                </div>                
            </div>            

            <div class="form-group">
                <label for="contrasena" class="col-md-1 col-md-offset-4">Contrase&ntilde;a</label>
                <div class="col-md-2">
                    <a href="actualizarPassword.php?id=<?php echo $usuario['idusuario']; ?>" class="btn btn-info btn-block btn-sm" role="button">Cambiar</a>
                </div>                
            </div>

            <div class="form-group">
                <div class="col-md-2 col-md-offset-6">
                    <input type="hidden" name="id" id="id" value="<?php echo $usuario['idusuario']; ?>" />
                    <input type="submit" name="submit" id="submit" value="Modificar" class="btn btn-primary btn-sm pull-right" />                    
                </div>                                                
            </div>
        </form>                
                                    
    </div> <!-- /container -->
    <?php include_once 'tagsJS.php'; ?>    
    <script type="text/javascript">
        //muestra region si es supervisor
        var perfil = $('#perfil').val();
        var regiones = $('#regiones');
        if( perfil == 'Supervisor' ){
            regiones.css("display", "block");
        }
        //muestra o no region al cambiar perfil
        $('#perfil').on('change', function(){
            var perfil = $('#perfil').val();
            var regiones = $('#regiones');
            if( perfil == 'Supervisor' ){
                regiones.css("display", "block");
            }else{
                regiones.css("display", "none");
            }
        });
        $("#myForm").validate();
    </script>
  </body>
</html>
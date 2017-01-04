<?php
require_once 'config.php';
require_once 'funciones.php';

    $sqlRegion = "SELECT DISTINCT(numRegion) FROM regiones";
    $resRegion = mysqli_query($conexion, $sqlRegion) or die(mysqli_error());    
    
if( isset($_POST["submit"]) ){    
    $nombre    = ucwords(strtolower(limpiarString(trim($_POST["nombre"]))));
    $apellidos = ucwords(strtolower(limpiarString(trim($_POST["apellidos"]))));
    $usuario   = strtolower(limpiarString(trim($_POST["usuario"])));
    $perfil    = $_POST["perfil"];
    $estado    = $_POST["estado"];
    $pass      = limpiarString(trim($_POST["contrasena"]));
    $repass    = limpiarString(trim($_POST["repContrasena"]));
    if( empty($_POST["region"]) ){
        $region = 0;
    }else{
        $region = $_POST["region"];
    }       

    $sql    = "SELECT idusuario FROM usuarios WHERE usuario='".$usuario."' LIMIT 1";
    $res    = mysqli_query($conexion, $sql) or die(mysqli_error());
    $existe = mysqli_num_rows($res);    
    
    $msjCamposVacios   = '';
    $msjLargoMinCampos = '';     
    $msjLargoMaxCampos = '';
    
    if( campoVacio($nombre) ){
        $msjCamposVacios.= 'Nombre | ';        
    }
    if( campoVacio($apellidos) ){
        $msjCamposVacios.= 'Apellidos | ';
    }
    if( campoVacio($usuario) ){
        $msjCamposVacios.= 'Usuario | ';
    }
    if( campoVacio($perfil) ){
        $msjCamposVacios.= 'Perfil | ';
    }
    if(  campoVacio($estado) ){
        $msjCamposVacios.= 'Estado | ';
    }
    if( campoVacio($pass) ){
        $msjCamposVacios.= 'Contraseña | ';
    }
    if( campoVacio($repass) ){
        $msjCamposVacios.= 'Confirmar Contraseña';
    }

    if( largoMin($nombre, 2) ){
        $msjLargoMinCampos.= 'Nombre=2 | ';
    }    
    if( largoMin($apellidos, 2) ){
        $msjLargoMinCampos.= 'Apellidos=2 | ';
    }                            
    if( largoMin($usuario, 2) ){
        $msjLargoMinCampos.= 'Usuario=2 | ';
    }
    if( largoMin($pass, 5) ){
        $msjLargoMinCampos.= 'Contraseña=5 | ';
    }
    if( largoMin($repass, 5) ){
        $msjLargoMinCampos.= 'Confirmar Contraseña=5';
    }
    
    if( largoMax($nombre, 30) ){
        $msjLargoMaxCampos.= 'Nombre=30 | ';
    }    
    if( largoMax($apellidos, 30) ){
        $msjLargoMaxCampos.= 'Apellidos=30 | ';
    }                            
    if( largoMax($usuario, 20) ){
        $msjLargoMaxCampos.= 'Usuario=20 | ';
    }
    if( largoMax($pass, 30) ){
        $msjLargoMaxCampos.= 'Contraseña=30 | ';
    }
    if( largoMax($repass, 30) ){
        $msjLargoMaxCampos.= 'Confirmar Contraseña=30';
    }    
                                                                                                                                                        
    if( $msjCamposVacios != '' ){
        header("location: msjErrorForms.php?camposVacios=".$msjCamposVacios);        
    }elseif( $msjLargoMinCampos != '' ){
        header("location: msjErrorForms.php?largoMinCampos=".$msjLargoMinCampos);
    }elseif( $msjLargoMaxCampos != '' ){
        header("location: msjErrorForms.php?largoMaxCampos=".$msjLargoMaxCampos);
    }elseif( $existe != 0 ){
        header("location: msjErrorForms.php?rechazarUsuario=".$usuario);         
    }elseif( $pass !== $repass ){
        header("location: msjErrorForms.php?passDistintas=si");        
    }else{
        $sal  = $usuario;
        $pass = hash("sha1", $pass.$sal);
            
        $query = "INSERT INTO usuarios (nombre, apellidos, usuario, perfil, estado, contrasena, region) "
        . "VALUES('".$nombre."', '".$apellidos."', '".$usuario."', '".$perfil."', '".$estado."', '".$pass."', '".$region."')";
        $result = mysql_query($conexion, $query) or die(mysqli_error());
        
        if($result){
            header("location: msjNewUser.php?guardarUsuario=si");            
        }else{
            header("location: msjNewUser.php?guardarUsuario=no");
        }        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Nuevo Usuario</title>
    <?php include_once 'tagsMeta.php'; ?>    
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?> 
  </head>

  <body>

    <div class="container">
        <?php include_once 'menuInicio.php'; ?>
        <h2 class="text-center well well-sm">Nuevo Usuario</h2>            
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myForm" class="form-horizontal" role="form">                     
            <div class="form-group">
                <label for="nombre" class="col-md-1 col-md-offset-4">Nombre</label>
                <div class="col-md-3">
                    <input type="text" name="nombre" id="nombre" class="form-control input-sm" required="required" minlength="2" maxlength="30" placeholder="Nombre" title="Ingrese nombre"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="apellidos" class="col-md-1 col-md-offset-4">Apellidos</label>
                <div class="col-md-3">
                    <input type="text" name="apellidos" id="apellidos" class="form-control input-sm" required="required" minlength="2" maxlength="30" placeholder="Apellidos" title="Ingrese apellidos"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="usuario" class="col-md-1 col-md-offset-4">Usuario</label>
                <div class="col-md-3">
                    <input type="text" name="usuario" id="usuario" class="form-control input-sm" required="required" minlength="2" maxlength="20" placeholder="Usuario" title="Ingrese usuario"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="perfil" class="col-md-1 col-md-offset-4">Perfil</label>
                <div class="col-md-2">
                    <select name="perfil" id="perfil" class="form-control input-sm" required="required" title="Seleccione un perfil">                        
                        <option value="Revisor">Revisor</option>
                        <option value="Supervisor">Supervisor</option>
                        <option value="Junaeb">Junaeb</option>
                        <!--
                        <option value="Jefe Proyecto">Jefe Proyecto</option>
                        -->
                    </select>                    
                </div>                
            </div>
            
            <div class="form-group" id="regiones" style="display: none;">
                <label for="region" class="col-md-1 col-md-offset-4">Regi&oacute;n</label>
                <div class="col-md-2">
                    <select name="region" id="region" class="form-control input-sm" required="">
                        <option value="">Regi&oacute;n</option>
                        <?php while( $regiones  = mysql_fetch_array($resRegion) ){ ?>
                        <option value="<?php echo $regiones['numRegion']; ?>"><?php echo $regiones['numRegion']; ?></option>
                        <?php } ?>                                            
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="estado" class="col-md-1 col-md-offset-4">Estado</label>
                <div class="col-md-2">
                    <select name="estado" id="estado" class="form-control input-sm" required="required" title="Seleccione un estado">
                        <option value="1">Activo</option>
                        <option value="0">Inactivo</option>
                    </select>                    
                </div>                
            </div>            

            <div class="form-group">
                <label for="contrasena" class="col-md-1 col-md-offset-4">Contrase&ntilde;a</label>
                <div class="col-md-3">
                    <input type="password" name="contrasena" id="contrasena" class="form-control input-sm" required="required" minlength="5" maxlength="30" placeholder="Contraseña" title="Ingrese contraseña"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="repContrasena" class="col-md-1 col-md-offset-4">Confirmar</label>
                <div class="col-md-3">
                    <input type="password" name="repContrasena" id="repContrasena" class="form-control input-sm" required="required" equalTo="#contrasena" minlength="5" maxlength="30" placeholder="Confirmar Contraseña" title="Confirmar contraseña"/>                    
                </div>                
            </div>

            <div class="form-group">
                <div class="col-md-2 col-md-offset-6">
                    <input type="submit" name="submit" id="submit" value="Guardar" class="btn btn-primary btn-block" />                    
                </div>                                                
            </div>
        </form>                
                                    
    </div> <!-- /container -->
    <?php include_once 'tagsJS.php'; ?>       
    <script type="text/javascript">
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
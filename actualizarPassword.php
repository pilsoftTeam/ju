<?php
require_once 'config.php';
require_once 'funciones.php';
#var_dump($_GET['id']);
//if( empty($_GET['id']) ){
//    header("location: index.php");
//}    

if( isset($_POST["submit"]) ){    
    $pass      = limpiarString(trim($_POST["contrasena"]));
    $repass    = limpiarString(trim($_POST["repContrasena"]));    
    
    $msjCamposVacios   = '';
    $msjLargoMinCampos = '';     
    $msjLargoMaxCampos = '';
        
    if( campoVacio($pass) ){
        $msjCamposVacios.= 'Contraseña | ';
    }
    if( campoVacio($repass) ){
        $msjCamposVacios.= 'Confirmar Contraseña';
    }
                           
    if( largoMin($pass, 5) ){
        $msjLargoMinCampos.= 'Contraseña=5 | ';
    }
    if( largoMin($repass, 5) ){
        $msjLargoMinCampos.= 'Confirmar Contraseña=5';
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
    }elseif( $pass !== $repass ){
        header("location: msjErrorForms.php?passDistintas=si");        
    }else{
        $sql = "SELECT usuario FROM usuarios WHERE idusuario='".$_POST['id']."' LIMIT 1";
        $res = mysqli_query($conexion, $sql) or die(mysqli_error());
        $usuario = mysqli_fetch_assoc($res);
        
        $sal  = $usuario['usuario'];
        $pass = hash("sha1", $pass.$sal);
            
        $query = "UPDATE usuarios SET contrasena='".$pass."' WHERE idusuario=".$_POST["id"]." LIMIT 1";
        $result = mysqli_query($conexion, $query) or die(mysqli_error());
        #var_dump($sql, $usuario['usuario'], $query, $result);
        if($result){
            header("location: msjUpdatePassword.php?modificarPassword=si");            
        }else{
            header("location: msjUpdatePassword.php?modificarPassword=no");
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
        <h2 class="text-center well well-sm">Cambiar Contrase&ntilde;a</h2>            
        
        <form action="<?php echo $_SERVER['SCRIPT_NAME']; ?>" method="post" id="myForm" class="form-horizontal" role="form">
            <div class="form-group">
                <label for="contrasena" class="col-md-1 col-md-offset-4">Nueva Contrase&ntilde;a</label>
                <div class="col-md-3">
                    <input type="password" name="contrasena" id="contrasena" class="form-control input-sm" required="required" minlength="5" maxlength="30" placeholder="Nueva contraseña" title="Ingrese nueva contraseña"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="repContrasena" class="col-md-1 col-md-offset-4">Confirmar Contrase&ntilde;a</label>
                <div class="col-md-3">
                    <input type="password" name="repContrasena" id="repContrasena" class="form-control input-sm" required="required" equalTo="#contrasena" minlength="5" maxlength="30" placeholder="Confirmar Contraseña" title="Confirmar nueva contraseña"/>                    
                </div>                
            </div>                             

            <div class="form-group">
                <div class="col-md-1 col-md-offset-7">
                    <input type="hidden" name="id" id="id" value="<?php echo $_GET['id']; ?>" />
                    <input type="submit" name="submit" id="submit" value="Cambiar" class="btn btn-primary btn-block btn-sm" />                    
                </div>                                                
            </div>
        </form>                
                                    
    </div> <!-- /container -->
    <?php include_once 'tagsJS.php'; ?>          
    <script type="text/javascript">
        $("#myForm").validate();
    </script>
  </body>
</html>
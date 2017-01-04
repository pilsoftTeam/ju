<?php
require_once 'config.php';
require_once 'funciones.php';

if( isset($_POST["submit"]) ){
    $rut       = limpiarString(trim($_POST["rut"]));
    $nombres   = ucwords(strtolower(limpiarString(trim($_POST["nombres"]))));
    $apellidoP = ucwords(strtolower(limpiarString(trim($_POST["apellidoPaterno"]))));
    $apellidoM = ucwords(strtolower(limpiarString(trim($_POST["apellidoMaterno"]))));
    $sexo      = limpiarString($_POST["sexo"]);
    $sistSalud = limpiarString($_POST["sistSalud"]);
    $cargo     = ucwords(strtolower(limpiarString(trim($_POST["cargo"]))));
    $tipoContrato = limpiarString($_POST["tipoContrato"]);
    $instSalud = limpiarString($_POST["instSalud"]);
    $fContrato = formatDateEuroToMySql($_POST["fContrato"]);
    $sueldoBase = limpiarString($_POST["sueldoBase"]);
    
    $sql    = "SELECT id FROM funcionarios WHERE rut_funcionario='".$rut."' LIMIT 1";
    $res    = mysql_query($sql, $conexion) or die(mysql_error());
    $existe = mysql_num_rows($res);
    
    $msjCamposVacios   = '';
    $msjLargoMinCampos = '';     
    $msjLargoMaxCampos = '';
    
    if( campoVacio($rut) ){
        $msjCamposVacios.= 'Rut | ';        
    }
    if( campoVacio($nombres) ){
        $msjCamposVacios.= 'Nombres | ';        
    }
    if( campoVacio($apellidoP) ){
        $msjCamposVacios.= 'Apellido Paterno | ';
    }
    if( campoVacio($apellidoM) ){
        $msjCamposVacios.= 'Apellido Materno | ';
    }    
    if( campoVacio($sexo) ){
        $msjCamposVacios.= 'Sexo | ';
    }
    if( campoVacio($sistSalud) ){
        $msjCamposVacios.= 'Sistema de Salud | ';
    }
    if(  campoVacio($cargo) ){
        $msjCamposVacios.= 'Cargo | ';
    }
    if( campoVacio($tipoContrato) ){
        $msjCamposVacios.= 'Tipo de Contrato | ';
    }
    if( campoVacio($instSalud) ){
        $msjCamposVacios.= 'Institución de Salud | ';
    }
    if(  campoVacio($fContrato) ){
        $msjCamposVacios.= 'Fecha de Contrato | ';
    }
    if(  campoVacio($sueldoBase) ){
        $msjCamposVacios.= 'Sueldo Base';
    }   

    if( largoMin($rut, 8) ){
        $msjLargoMinCampos.= 'RUT=8 | ';
    }        
    if( largoMin($nombres, 5) ){
        $msjLargoMinCampos.= 'Nombres=5 | ';
    }    
    if( largoMin($apellidoP, 2) ){
        $msjLargoMinCampos.= 'Apellido Paterno=2 | ';
    }                            
    if( largoMin($apellidoM, 2) ){
        $msjLargoMinCampos.= 'Apellido Materno=2 | ';
    }    
    if( largoMin($cargo, 5) ){
        $msjLargoMinCampos.= 'Cargo=5';
    }

    if( largoMax($rut, 12) ){
        $msjLargoMinCampos.= 'RUT=12 | ';
    }    
    if( largoMax($nombres, 60) ){
        $msjLargoMinCampos.= 'Nombres=60 | ';
    }    
    if( largoMax($apellidoP, 20) ){
        $msjLargoMinCampos.= 'Apellido Paterno=20 | ';
    }                            
    if( largoMax($apellidoM, 20) ){
        $msjLargoMinCampos.= 'Apellido Materno=20 | ';
    }    
    if( largoMax($cargo, 30) ){
        $msjLargoMinCampos.= 'Cargo=30';
    }
                                                                                                                                                        
    if( $msjCamposVacios != '' ){
        header("location: msjErrorForms.php?camposVacios=".$msjCamposVacios);        
    }elseif( $msjLargoMinCampos != '' ){
        header("location: msjErrorForms.php?largoMinCampos=".$msjLargoMinCampos);
    }elseif( $msjLargoMaxCampos != '' ){
        header("location: msjErrorForms.php?largoMaxCampos=".$msjLargoMaxCampos);
    }elseif( $existe != 0 ){
        header("location: msjErrorForms.php?rechazarFuncionario=".$rut);         
    }else{            
        $query = "INSERT INTO funcionarios " 
                . "(id, rut_funcionario, apellido_paterno, apellido_materno, nombres, sexo, "
                . "sistema_salud, cargo, tipo_contrato, institucion_salud, fecha_contrato, sueldo_base) "
                . "VALUES (NULL, '".$rut."', '".$apellidoP."', '".$apellidoM."', '".$nombres."', '".$sexo."', "
                . "'".$sistSalud."', '".$cargo."', '".$tipoContrato."', '".$instSalud."', '".$fContrato."', '".$sueldoBase."')";
        $result = mysql_query($query, $conexion) or die(mysql_error());
        
        if($result){
            header("location: msjNewUser.php?guardarFuncionario=si");            
        }else{
            header("location: msjNewUser.php?guardarFuncionario=no");
        }        
    }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=iso-8859-1" />
    <meta charset="iso-8859-1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content="Licencias M&eacute;dicas" />
    <meta name="author" content="Fortunato y Asociados" />
    <link rel="icon" href="<?php echo FAVICON; ?>" />

    <title>Nuevo Funcionario</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />
    <link href="css/estilos.css" rel="stylesheet" />
    <link href="css/validate.css" rel="stylesheet" />

    <script src="js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>

    <div class="container">
        <?php include_once 'menuSuperior.php'; ?>
        <h2 class="text-center well well-sm">Nuevo Funcionario</h2>            
        
        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="myForm" class="form-horizontal" role="form">                     
            <div class="form-group">
                <label for="rut" class="col-md-1 col-md-offset-4">RUT</label>
                <div class="col-md-2">
                    <input type="text" name="rut" id="rut" class="form-control input-sm" required="required" minlength="8" maxlength="12" placeholder="RUT" title="Ingrese RUT"/>
                </div>                
            </div>
            
            <div class="form-group">
                <label for="nombres" class="col-md-1 col-md-offset-4">Nombre Completo</label>
                <div class="col-md-3">
                    <input type="text" name="nombres" id="nombres" class="form-control input-sm" required="required" minlength="5" maxlength="60" placeholder="Nombre Completo" title="Ingrese nombre completo"/>
                </div>                
            </div>
            
            <div class="form-group">
                <label for="apellidoP" class="col-md-1 col-md-offset-4">Apellido Paterno</label>
                <div class="col-md-3">
                    <input type="text" name="apellidoP" id="apellidoP" class="form-control input-sm" required="required" minlength="2" maxlength="20" placeholder="Apellido Paterno" title="Ingrese apellido paterno"/>
                </div>                
            </div>                                    

            <div class="form-group">
                <label for="apellidoM" class="col-md-1 col-md-offset-4">Apellido Materno</label>
                <div class="col-md-3">
                    <input type="text" name="apellidoM" id="apellidoM" class="form-control input-sm" required="required" minlength="2" maxlength="20" placeholder="Apellido Materno" title="Ingrese apellido materno"/>
                </div>                
            </div>            

            <div class="form-group">
                <label for="sexo" class="col-md-1 col-md-offset-4">Sexo</label>
                <div class="col-md-2">
                    <select name="sexo" id="sexo" class="form-control input-sm" required="required" title="Seleccione Sexo">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>                    
                </div>                
            </div>
            
            <div class="form-group">
                <label for="sistSalud" class="col-md-1 col-md-offset-4">Sistema de Salud</label>
                <div class="col-md-2">
                    <select name="sistSalud" id="sistSalud" class="form-control input-sm" required="required" title="Seleccione Sist. de Salud">
                        <option value="Fonasa">Fonasa</option>
                        <option value="Isapre">Isapre</option>
                    </select>                    
                </div>                
            </div>            
            
            <div class="form-group">
                <label for="cargo" class="col-md-1 col-md-offset-4">Cargo</label>
                <div class="col-md-3">
                    <input type="text" name="cargo" id="cargo" class="form-control input-sm" required="required" minlength="5" maxlength="30" placeholder="Cargo" title="Ingrese cargo"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="tipoContrato" class="col-md-1 col-md-offset-4">Tipo de Contrato</label>
                <div class="col-md-2">
                    <select name="tipoContrao" id="tipoContrato" class="form-control input-sm" required="required" title="Seleccione tipo contrato">
                        <option value="Planta">Planta</option>
                        <option value="Contrata">Contrata</option>
                        <option value="Honorarios">Honorarios</option>
                    </select>                    
                </div>                
            </div>
            
            <div class="form-group">
                <label for="instSalud" class="col-md-1 col-md-offset-4">Instituci&oacute;n de Salud</label>
                <div class="col-md-3">
                    <select name="instSalud" id="instSalud" class="form-control input-sm" required="required" title="Seleccione Inst. de Salud">
                        <option value="0">Fonasa</option>
                        <option value="99">Banmédica S.A.</option>
                        <option value="65">Chuquicamata Ltda.</option>
                        <option value="67">Colmena Golden Cross S.A.</option>
                        <option value="107">Consalud S.A.</option>
                        <option value="78">Cruz Blanca S.A.</option>
                        <option value="94">Cruz del Norte Ltda.</option>
                        <option value="81">Ferrosalud S.A.</option>
                        <option value="76">Fundación Ltda.</option>
                        <option value="63">Fusat Ltda.</option>
                        <option value="88">Masvida S.A.</option>
                        <option value="68">Río Blanco Ltda.</option>
                        <option value="62">San Lorenzo Ltda.</option>
                        <option value="80">Vida Tres S.A.</option>                        
                    </select>                    
                </div>                
            </div>                        

            <div class="form-group">
                <label for="fContrato" class="col-md-1 col-md-offset-4">Fecha de Contrato</label>
                <div class="col-md-2">
                    <input type="text" name="fContrato" id="fContrato" class="form-control input-sm" required="required" minlength="10" maxlength="10" placeholder="Fecha de Contrato" title="Ingrese fecha contrato"/>
                </div>                
            </div>

            <div class="form-group">
                <label for="sueldoBase" class="col-md-1 col-md-offset-4">Sueldo Base</label>
                <div class="col-md-2">
                    <input type="text" name="sueldoBase" id="sueldoBase" class="form-control input-sm" required="required" minlength="1" maxlength="11" placeholder="Sueldo Base" title="sueldo base"/>                    
                </div>                
            </div>

            <div class="form-group">
                <div class="col-md-1 col-md-offset-7">
                    <input type="submit" name="submit" id="submit" value="Guardar" class="btn btn-primary btn-block btn-sm" />                    
                </div>                                                
            </div>
        </form>                
                                    
    </div> <!-- /container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="js/jquery-1.11.3.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.validate.min.js"></script>
    <script src="js/messages_es.min.js"></script>
    
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="js/ie10-viewport-bug-workaround.js"></script>
    
    <script>
        $("#myForm").validate();
    </script>
        
  </body>
</html>
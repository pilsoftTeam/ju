<?php
require_once 'config.php';
require_once 'obsSelect.php';

$tipoBeca = $_POST['beca'];
$rutPostulante = $_POST['rutPostulante'];

$result = mysqli_query($conexion, "CALL Consulta_Rut($rutPostulante)") or die(mysqli_error($conexion));
$existePostulante = mysqli_fetch_array($result);

if('FALSE' == $existePostulante['respuesta']){
    header('location: rutPostulante.php?beca='.$tipoBeca.'&rutInvalido='.$rutPostulante);
    exit;
}else{
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title>Checklist BITSUP - Becas de Mantenci&oacute;n Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?>
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>
    <link href="css/estilos_checklists.css" rel="stylesheet" />   
  </head>

  <body>

    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      <h2 class="alert alert-info text-center" id="titulo"><b>REVISI&Oacute;N BECA INTEGRACI&Oacute;N TERRITORIAL EDU. SUPERIOR</b></h2>      
      <div class="well well-sm">        
        <ul class="nav nav-tabs nav-justified" style="font-size: 12px; font-weight:;">
          <li id="linkGenerales" class="pestanas"><a href="#datosGenerales" style="background: #E0E0E0;">GENERAL</a></li>
          <li id="linkDocumental" class="pestanas"><a href="#documental" style="background: #5EAEAE;">DOCUMENTAL</a></li>
          <li id="linkAntecedentes" class="pestanas"><a href="#antecedentes" style="background-color: #EC7600;">ANTECEDENTES</a></li>
          <li id="linkAcademica" class="pestanas"><a href="#academica" style="background-color: #FFFF2D;">ACAD&Eacute;MICA</a></li>
          <!-- <li id="linkEconomica" class="pestanas"><a href="#economica" style="background-color: #9191C8">ECON&Oacute;MICA</a></li> -->
          <li id="linkFactoresRiesgo" class="pestanas"><a href="#factoresRiesgo" style="background-color: #FF9428">FACT. RIESGO</a></li>
          <li id="linkEducacion" class="pestanas"><a href="#educacion" style="background-color: #359AFF;">EDUCACI&Oacute;N</a></li>
          <li id="linkTerritorial" class="pestanas"><a href="#territorial" style="background-color: #CBCB96">TERRITORIAL</a></li>
         <li id="linkEstadoCierre" class="pestanas"><a href="#estadoCierre" style="background-color: #0076EC;">CIERRE</a></li>
        </ul>
        
        <br />
        <!--  enctype="multipart/form-data" -->
        <form action="procesarChecklistsBITSUP.php" method="post" id="checklistForm" class="form-horizontal" role="form">
            <fieldset>
                <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Consulta_Datos_Postulante($rutPostulante)") or die(mysqli_error($conexion));
                    $datosGrales = mysqli_fetch_array($result);	
                ?>                        
                <!-- DATOS GENERALES -->
                <?php require_once 'dimensiones' . '/' . 'datosGenerales.php'; ?>

                <!-- DOCUMENTAL -->
                <div id="verDocumental" class="dimension" style="display: none;">
                <h3 id="documental"><strong>REVISI&Oacute;N DOCUMENTAL</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>
                </h3>
                <!-- Documentos del Postulante -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr class="active">                            
                            <td><h4><strong>Documentos del Postulante</strong></h4></td>
                            <th class="text-center"><h4><strong>BIT SUP</strong></h4></th>  
                        </tr>
                        <tr class="text-danger">
                            <td>Certificado de residencia del domicilio familiar que acredite comuna y localidad</td>
                            <td class="text-center">
                                <input type="checkbox" name="certificadoRecidDomiFamiAcredComunaLocalidad" id="" value="COMPLETO" class="revDocumental" />
                            </td>
                        </tr>
                        <tr class="text-danger">
                            <td>Certificado de aprobaci&oacute;n curricular semestre anterior o a&ntilde;o anterior o certificado de concentraci&oacute;n de notas de semestre anterior o a&ntilde;o anterior</td>
                            <td class="text-center">
                                <input type="checkbox" name="certifAprobCurriSemAntAnioAntOcertifConcentNotasSemAntAnioAnt" id="" value="COMPLETO" class="revDocumental" />
                            </td>
                        </tr>                                                
                        <tr class="text-danger">
                            <td>Certificado de alumno regular</td>
                            <td class="text-center"><input type="checkbox" name="certificadoAlumnoRegular" id="" value="COMPLETO" class="revDocumental" /></td>
                        </tr>                        
                        <tr class="text-warning docOpcional">
                            <td>Certificado de embarazo</td>
                            <td class="text-center"><input type="checkbox" name="certificadoEmbarazo" id=""  value="COMPLETO" class="revDocumental" /></td>
                        </tr>                        
                    </table>
                </div>
                </div>
                                                
                <!-- ANTECEDENTES DEL POSTULANTE -->
                <!-- CREAR CONEXI�N SP A ANTECEDENTES POSTULANTE AQUI -->
                <?php 
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_AP($rutPostulante)") or die(mysqli_error($conexion));
                    $antecedentesPostulante = mysqli_fetch_array($result);
                ?>
                <?php require_once 'dimensiones' .'/'. 'antecedentesEduSUP.php' ?>
                                
                <?php 
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DA($rutPostulante)") or die(mysqli_error($conexion));
                    $dimAcademica = mysqli_fetch_array($result);
                ?>
                                
                <!-- DIM. ACADEMICA -->
                <?php require_once 'dimensiones' .'/'. 'dimAcademicaEduSUP.php' ?>
                                
                <!-- DIM. ECONOMICA -->
                <?php require_once 'dimensiones' .'/'. 'dimEconomica.php' ?>
                
                <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DFR($rutPostulante)") or die(mysqli_error($conexion));
                    $dimFactRiesgo = mysqli_fetch_array($result);
                ?>
                               
                <!-- DIM. OTROS FACTORES DE RIESGO -->
                <?php require_once 'dimensiones' .'/'. 'dimFactoresRiesgo.php' ?>

                <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DE($rutPostulante)") or die(mysqli_error($conexion));
                    $dimEducacion = mysqli_fetch_array($result);
                ?>
                                                 
                <!-- DIM. EDUCACION -->
                <?php require_once 'dimensiones' .'/'. 'dimEducacion.php' ?>

                <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    //$result = mysqli_query($conexion, "CALL Datos_DS($rutPostulante)") or die(mysqli_error($conexion));
                    //$dimTerritorial = mysqli_fetch_array($result);
                ?>
                
                <!-- DIM. TERRITORIAL -->
                <?php require_once 'dimensiones' .'/'. 'dimTerritorial.php' ?>
                <hr>
                <br>
                <?php require_once 'dimensiones' .'/'. 'estadoCierreRev.php' ?>
                
                <br />
                
                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" name="guardarBISUP" class="btn btn-primary btn-lg pull-right">Guardar Revisi&oacute;n</button>
                    </div>
                </div>                               
            </fieldset>
        </form>      

      </div> <!-- /pozo -->
    </div> <!-- /container -->
    <?php include_once 'tagsJS.php'; ?>    
    <script src="js/logica_checklists.js"></script>
  </body>
</html>
<?php
}
?>
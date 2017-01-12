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
        <title>Checklist BIBM - Becas de Mantenci&oacute;n Junaeb 2017</title>
        <?php include_once 'tagsMeta.php'; ?>
        <?php include_once 'tagsCSS.php'; ?>
        <?php include_once 'tagsFixJS.php'; ?>
        <link href="css/estilos_checklists.css" rel="stylesheet" />
    </head>
    <body>
    <div class="container">
        <?php include_once 'menuInicio.php'; ?>
        <h2 class="alert alert-info text-center" id="titulo"><b>REVISI&Oacute;N BECA IND&Iacute;GENA B&Aacute;SICA &amp; MEDIA</b></h2>
        <div class="well well-sm">
            <ul class="nav nav-tabs nav-justified" style="font-size: 12px; font-weight:;">
                <li id="linkGenerales" class="pestanas"><a href="#datosGenerales" style="background: #E0E0E0;">GENERAL</a></li>
                <li id="linkDocumental" class="pestanas"><a href="#documental" style="background: #5EAEAE;">DOCUMENTAL</a></li>
                <li id="linkAntecedentes" class="pestanas"><a href="#antecedentes" style="background-color: #EC7600;">ANTECEDENTES</a></li>
                <li id="linkAcademica" class="pestanas"><a href="#academica" style="background-color: #FFFF2D;">ACAD&Eacute;MICA</a></li>
                <!--<li id="linkEconomica" class="pestanas"><a href="#economica" style="background-color: #9191C8">ECON&Oacute;MICA</a></li>-->
                <li id="linkFactoresRiesgo" class="pestanas"><a href="#factoresRiesgo" style="background-color: #FF9428">FACT. RIESGO</a></li>
                <li id="linkEducacion" class="pestanas"><a href="#educacion" style="background-color: #359AFF;">EDUCACI&Oacute;N</a></li>
                <li id="linkSocioCultural" class="pestanas"><a href="#socioCultural" style="background-color: #1AFF53">SOCIOCULTURAL</a></li>
                <li id="linkTerritorial" class="pestanas"><a href="#territorial" style="background-color: #CBCB96">TERRITORIAL</a></li>
                <li id="linkEstadoCierre" class="pestanas"><a href="#estadoCierre" style="background-color: #0076EC;">CIERRE</a></li>
            </ul>
    
            <br/>
            
            <form action="procesarChecklistBIBM.php" method="post" id="checklistForm" class="form-horizontal" role="form">
                <fieldset>
                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Consulta_Datos_Postulante($rutPostulante)") or die(mysqli_error($conexion));
                    $datosGrales = mysqli_fetch_array($result);
                    ?>
                    
                    <?php require_once 'dimensiones' . '/' . 'datosGenerales.php'; ?>
    
                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL verificaDocumentosPostulante('$tipoBeca', $rutPostulante)") or die(mysqli_error($conexion));
                    $revDocumental = mysqli_fetch_assoc($result);
                    ?>
                    <!-- DOCUMENTAL -->
                    <div id="verDocumental" class="dimension" style="display: none;">
                        <h3 id="documental"><strong>REVISI&Oacute;N DOCUMENTAL</strong>
                            <span class="label label-info pull-right">
                                <a href="#titulo" class="volver-arriba">Volver Men&uacute;</a>
                            </span>
                        </h3>
                        <!-- Documentos del Postulante -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed">
                                <tr class="active">
                                    <td>
                                        <h4>
                                            <strong>Documentos del Postulante</strong>
                                        </h4>
                                    </td>
                                    <th class="text-center"><h4><strong>BI B&amp;M</strong></h4></th>
                                </tr>
                                <?php if( $revDocumental['organizacion_indigena'] == 'SI' ){ ?>
                                <tr class="text-danger">
                                    <td>Certificado de participaci&oacute;n del padre, madre o representante legal en organizaci&oacute;n ind&iacute;gena</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoParticipacionOrgIndigena" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <?php }if( $revDocumental['comunidad_indigena'] == 'SI' ){ ?>
                                <tr class="text-danger">
                                    <td>Certificado se domicilia o vive en comunidad ind&iacute;gena</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoSeDomiciliaViveEnComunidadIndigena" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <?php }if( $revDocumental['participa_rituales'] == 'SI' ){ ?>
                                <tr class="text-danger">
                                    <td>Certificado de participa de pr&aacute;cticas y/o celebraciones rituales de la comunidad o pueblo al que pertenece
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <?php }if( is_numeric($revDocumental['certi_conadi']) ){ ?>
                                <tr class="text-danger">
                                    <td>Certificado Conadi que acredite calidad ind&iacute;gena</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoConadiAlumno" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <?php }if( $revDocumental['certi_embarazo'] == 'SI' ){ ?>
                                <!-- Verificar y confirmar el tipo de dato devuelto -->                                
                                <tr class="text-warning docOpcional">
                                    <td>Certificado de embarazo</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoEmbarazo" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <?php } ?>
                            </table>
                        </div>
                    </div>
    
                    <?php 
                        mysqli_free_result($result);
                        mysqli_next_result($conexion);
                        $result = mysqli_query($conexion, "CALL Datos_AP($rutPostulante)") or die(mysqli_error($conexion));
                        $antecedentesPostulante = mysqli_fetch_array($result);
                    ?>                    
    
                    <?php require_once 'dimensiones' . '/' . 'antecedentesEduBM.php'; ?>
    
                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DA($rutPostulante)") or die(mysqli_error($conexion));
                    $dimAcademica = mysqli_fetch_array($result);
                    ?>
    
                    <?php require_once 'dimensiones' . '/' . 'dimAcademicaEduBM.php'; ?>
    
                    <?php require_once 'dimensiones' . '/' . 'dimEconomica.php'; ?>
    
                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DFR($rutPostulante)") or die(mysqli_error($conexion));
                    $dimFactRiesgo = mysqli_fetch_array($result);
                    ?>
    
                    <?php require_once 'dimensiones' . '/' . 'dimFactoresRiesgo.php'; ?>
                    
                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DE($rutPostulante)") or die(mysqli_error($conexion));
                    $dimEducacion = mysqli_fetch_array($result);
                    ?>
    
                    <?php require_once 'dimensiones' . '/' . 'dimEducacion.php'; ?>
    
                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DS($rutPostulante)") or die(mysqli_error($conexion));
                    $dimSocioCultural = mysqli_fetch_array($result);
                    ?>
    
                    <?php require_once 'dimensiones' . '/' . 'dimSocioCultural.php'; ?>
    
                    <?php
                        mysqli_free_result($result);
                        mysqli_next_result($conexion);
                        //$result = mysqli_query($conexion, "CALL Datos_DS($rutPostulante)") or die(mysqli_error($conexion));
                        //$dimTerritorial = mysqli_fetch_array($result);
                    ?>
                
                    <?php require_once 'dimensiones' . '/' . 'dimTerritorial.php'; ?>                    
                    
                    <hr />
                    <br />
                    
                    <?php require_once 'dimensiones' . '/' . 'estadoCierreRev.php'; ?>
    
                    <br />
    
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" name="guardarBIBM" class="btn btn-primary btn-lg pull-right">Guardar Revisi&oacute;n</button>
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
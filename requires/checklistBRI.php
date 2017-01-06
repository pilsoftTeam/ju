<?php
require_once 'config.php';

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
    <title>Checklist BRI - Becas de Mantenci&oacute;n Junaeb 2017</title>
    <?php include_once 'tagsMeta.php'; ?>
    <?php include_once 'tagsCSS.php'; ?>
    <?php include_once 'tagsFixJS.php'; ?>
    <link href="css/estilos_checklists.css" rel="stylesheet" />   
  </head>

  <body>

    <div class="container">      
      <?php include_once 'menuInicio.php'; ?>
      <h2 class="alert alert-info text-center" id="titulo"><b>REVISI&Oacute;N BECA RESIDENCIA IND&Iacute;GENA EDU. SUPERIOR</b></h2>      
      <div class="well well-sm">        
        <ul class="nav nav-tabs nav-justified" style="font-size: 11px;">
          <li id="linkGenerales" class="pestanas"><a href="#datosGenerales" style="background: #E0E0E0;">GENERAL</a></li>
          <li id="linkDocumental" class="pestanas"><a href="#documental" style="background: #5EAEAE;">DOCUMENTAL</a></li>
          <li id="linkAntecedentes" class="pestanas"><a href="#antecedentes" style="background-color: #EC7600;">ANTECEDENTES</a></li>
          <li id="linkAcademica" class="pestanas"><a href="#academica" style="background-color: #FFFF2D;">ACAD&Eacute;MICA</a></li>
          <!-- <li id="linkEconomica" class="pestanas"><a href="#economica" style="background-color: #9191C8">ECON&Oacute;MICA</a></li> -->
          <li id="linkFactoresRiesgo" class="pestanas"><a href="#factoresRiesgo" style="background-color: #FF9428">FACT. RIESGO</a></li>
          <li id="linkEducacion" class="pestanas"><a href="#educacion" style="background-color: #359AFF;">EDUCACI&Oacute;N</a></li>
          <li id="linkSocioCultural" class="pestanas"><a href="#socioCultural" style="background-color: #1AFF53">SOCIOCULTURAL</a></li>
          <li id="linkTerritorial" class="pestanas"><a href="#territorial" style="background-color: #CBCB96">TERRITORIAL</a></li>
          <li id="linkEstadoCierre" class="pestanas"><a href="#estadoCierre" style="background-color: #0076EC;">CIERRE</a></li>
        </ul>
        
        <br />
        <!--  enctype="multipart/form-data" -->
        <form action="procesarChecklistsBRI.php" method="post" id="checklistForm" class="form-horizontal" role="form">
            <fieldset>
                <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Consulta_Datos_Postulante($rutPostulante)") or die(mysqli_error($conexion));
                    $datosGrales = mysqli_fetch_array($result);	
                ?>                        
                <!-- DATOS GENERALES -->
                <div id="verGenerales" class="dimension" style="display: none;">
                <h3 id="datosGenerales"><strong>DATOS GENERALES</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>
                </h3>
                
                <!-- Dato(s) pasado(s) como oculto(s) -->
                <input type="hidden" name="regionDeEjecucion" value="<?php echo $datosGrales['region_ejecucion']; ?>" />
                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Rut Alumno:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['rut']; ?></strong></p>
                        <input type="hidden" name="rutAlumno" value="<?php echo $datosGrales['rut']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2"><b><em>¿Rut Incorrecto?</em></b> :</label>                    
                    <div class="col-xs-8 col-sm-9 col-md-10">
                        <label class="checkbox-inline"> <!-- Quitar -inline para que input abarque toda la fila -->
                        <input type="checkbox" name="resultadoRutAlumno" id="resultadoRutAlumno" value="INCORRECTO" />
                        <input type="text" name="obsRutAlumno" id="obsRutAlumno" class="form-control input-sm" placeholder="Observación Rut" maxlength="100" />
                        </label>                                                                                     
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Nombre del Alumno:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['nombreAlumno']; ?></strong></p>
                        <input type="hidden" name="nombreAlumno" value="<?php echo $datosGrales['nombreAlumno']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2"><b><em>¿Nombre Incorrecto?</em></b> :</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <label class="checkbox-inline">
                            <input type="checkbox" name="resultadoNombreAlumno" id="resultadoNombreAlumno" value="INCORRECTO" />
                            <input type="text" name="obsNombreAlumno" id="obsNombreAlumno" class="form-control input-sm" placeholder="Observación Nombres" maxlength="100" />                            
                        </label>                                                    
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Domicilio del Alumno:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['direccionAlumno']; ?></strong></p>
                        <input type="hidden" name="domicilioAlumno" value="<?php echo $datosGrales['direccionAlumno']; ?>" />
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Beca de Postulaci&oacute;n:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['beca']; ?></strong></p>
                        <input type="hidden" name="tipoBecaAlumno" value="<?php echo $datosGrales['beca']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Curso/Nivel:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['curso']; ?></strong></p>
                        <input type="hidden" name="nivelEducacional" value="<?php echo $datosGrales['curso']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Provincia (Familia):</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['provincia_domicilio']; ?></strong></p>
                        <input type="hidden" name="provinciaDomicilioFamiliarAlumno" value="<?php echo $datosGrales['provincia_domicilio']; ?>" />
                    </div>
                </div>                                                                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Comuna (Familia):</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['comuna_domicilio']; ?></strong></p>
                        <input type="hidden" name="comunaDomicilioFamiliarAlumno" value="<?php echo $datosGrales['comuna_domicilio']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Unidad Operativa:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['unidad_operativa']; ?></strong></p>
                        <input type="hidden" name="tipoUnidadOperativa" value="<?php echo $datosGrales['unidad_operativa']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Instituci&oacute;n Evaluadora:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['unidad_operativa']; ?></strong></p>
                        <input type="hidden" name="institucionEvaluadora" value="<?php echo $datosGrales['unidad_operativa']; ?>" />
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Profesional Evaluador:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['nombreProfesional']; ?></strong></p>
                        <input type="hidden" name="profesionalQueEvaluo" value="<?php echo $datosGrales['nombreProfesional']; ?>" />
                    </div>
                </div>
                </div>

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
                            <th class="text-center"><h4><strong>BRI</strong></h4></th>  
                        </tr>
                        <tr class="text-danger">
                            <td>Certificado de participaci&oacute;n en organizaci&oacute;n ind&iacute;gena</td>
                            <td class="text-center">
                                <input type="checkbox" name="certificadoParticipacionOrgIndigena" id="" value="COMPLETO" class="revDocumental" />
                            </td>
                        </tr>
                        <tr class="text-danger">
                            <td>Certificado se domicilia o vive en comunidad ind&iacute;gena</td>
                            <td class="text-center">
                                <input type="checkbox" name="certificadoSeDomiciliaViveEnComunidadIndigena" id="" value="COMPLETO" class="revDocumental" />
                            </td>
                        </tr>
                        <tr class="text-danger">
                            <td>Certificado de participa de pr&aacute;cticas y/o celebraciones rituales de la comunidad o pueblo al que pertenece</td>
                            <td class="text-center">
                                <input type="checkbox" name="certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad" id="" value="COMPLETO" class="revDocumental" />
                            </td>
                        </tr>                        
                        <tr class="text-danger">
                            <td>Certificado Conadi que acredite calidad ind&iacute;gena</td>
                            <td class="text-center"><input type="checkbox" name="certificadoConadiAlumno" id="" value="COMPLETO" class="revDocumental" /></td>
                        </tr>
                        <tr class="text-danger">
                            <td>Certificado de residencia del domicilio familiar que acredite comuna y localidad</td>
                            <td class="text-center">
                                <input type="checkbox" name="certificadoRecidDomiFamiAcredComunaLocalidad" id="" value="COMPLETO" class="revDocumental" />
                            </td>
                        </tr>                        
                        <tr class="text-danger">
                            <td>Concentraci&oacute;n de notas del &uacute;ltimo a&ntilde;o acad&eacute;mico cursado</td>
                            <td class="text-center"><input type="checkbox" name="concentracionNotasUltAnioAcad" id="" value="COMPLETO" class="revDocumental" /></td>
                        </tr>
                        <tr class="text-danger">
                            <td>Certificado de alumno regular</td>
                            <td class="text-center"><input type="checkbox" name="certificadoAlumnoRegular" id="" value="COMPLETO" class="revDocumental" /></td>
                        </tr>
                        <tr class="text-danger">
                            <td>Documento de arriendo de inmueble</td>
                            <td class="text-center"><input type="checkbox" name="documentoArriendoInmueble" id="" value="COMPLETO" class="revDocumental" /></td>
                        </tr>                                                
                        <tr class="text-warning docOpcional">
                            <td>Certificado de embarazo</td>
                            <td class="text-center"><input type="checkbox" name="certificadoEmbarazo" id=""  value="COMPLETO" class="revDocumental" /></td>
                        </tr>                        
                    </table>
                </div>
                </div>
                                                
                <!-- ANTECEDENTES DEL POSTULANTE -->
                <!-- CREAR CONEXIÓN SP A ANTECEDENTES POSTULANTE AQUI -->
                <?php 
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_AP($rutPostulante)") or die(mysqli_error($conexion));
                    $antecedentesPostulante = mysqli_fetch_array($result);
                ?>                
                <div id="verAntecedentes" class="dimension" style="display: none;">
                <h3 id="antecedentes"><strong>ANTECEDENTES DEL POSTULANTE</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>                
                </h3>                                
                <!-- IES -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Institici&oacute;n de Educaci&oacute;n Superior</strong><span class="text-warning"> ( *nuevo campo [Lista BD] )</span></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="institucionEduSupPapel" id="institucionEduSupPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="IES...">IES...</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="institucionEduSupSinab"><b>IES...<?php //echo  ?></b></span>
                                <input type="hidden" name="institucionEduSupSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="institucionEduSupEmp" id="institucionEduSupEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="IES...">IES...</option>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiInstitucionEduSup" class="label"></span>
                                <input type="hidden" name="resultadoDigiInstitucionEduSup" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>
                
                <!-- Carrera (nombre) -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Carrera (nombre)</strong><span class="text-warning"> ( *Lista BD [NO usar utf8_ci en Query] )</span></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="nombreCarreraPapel" id="nombreCarreraPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="carreras...">carreras...</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="nombreCarreraSinab"><b>carreras...<?php //echo  ?></b></span>
                                <input type="hidden" name="nombreCarreraSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="nombreCarreraEmp" id="nombreCarreraEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="carreras...">carreras...</option>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiNombreCarrera" class="label"></span>
                                <input type="hidden" name="resultadoDigiNombreCarrera" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>

                <!-- Año de Ingreso -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Año de Ingreso</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="anioIngresoCarreraPapel" id="anioIngresoCarreraPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="anioIngresoCarreraSinab"><b>2017<?php //echo  ?></b></span>
                                <input type="hidden" name="anioIngresoCarreraSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="anioIngresoCarreraEmp" id="anioIngresoCarreraEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>                                    
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAnioIngresoCarrera" class="label"></span>
                                <input type="hidden" name="resultadoDigiAnioIngresoCarrera" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>

                <!-- Duración Carrera (En Semestres) -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Duraci&oacute;n Carrera (En Semestres)</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="duracionCarreraPapel" id="duracionCarreraPapel">
                                    <option value="">Seleccione...</option>
                                    <?php for( $i=2; $i<=18; $i++ ){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="duracionCarreraSinab"><b>2<?php //echo  ?></b></span>
                                <input type="hidden" name="duracionCarreraSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="duracionCarreraEmp" id="duracionCarreraEmp">
                                    <option value="">Seleccione...</option>
                                    <?php for( $i=2; $i<=18; $i++ ){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiDuracionCarrera" class="label"></span>
                                <input type="hidden" name="resultadoDigiDuracionCarrera" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>

                <!-- Discapacidad -->
                <!-- Falta agregar campo discapacidad a éste SP y quitarlo de SP Fac. de Riesgo -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Discapacidad</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="discapacidadPapel" id="discapacidadPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </td>                           
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="discapacidadSinab"><b><?php #echo $antecedentesPostulante['discapacidad']; ?></b></span>
                                <input type="hidden" name="discapacidadSinab" value="<?php #echo $antecedentesPostulante['discapacidad']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="discapacidadEmp" id="discapacidadEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>                        
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiDiscapacidad" class="label"></span>
                                <input type="hidden" name="resultadoDigiDiscapacidad" value="" />                            
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                                
                <h4 class="alert alert-warning"><strong>ACREDITACI&Oacute;N ASCENDENCIA IND&Iacute;GENA</strong></h4>

                <!-- Dato(s) pasado(s) como oculto(s) -->
                <input type="hidden" name="rbd" value="<?php echo $antecedentesPostulante['rbd']; ?>" />
                                
                <!-- Pueblo Indígena -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Pueblo Ind&iacute;gena</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="puebloIndigenaPapel" id="puebloIndigenaPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="Atacameño">Atacame&ntilde;o</option>
                                    <option value="Aymara">Aymara</option>
                                    <option value="Diaguita">Diaguita</option>
                                    <option value="Kawhaskar">Kawhaskar</option>
                                    <option value="Mapuche">Mapuche</option>
                                    <option value="Colla">Colla</option>
                                    <option value="Quechua">Quechua</option>
                                    <option value="Rapa Nui">Rapa Nui</option>
                                    <option value="Yagan">Yagan</option>
                                    <option value="No Aplica">No Aplica</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="puebloIndigenaSinab"><b><?php echo $antecedentesPostulante['etnia_bi']; ?></b></span>
                                <input type="hidden" name="puebloIndigenaSinab" value="<?php echo $antecedentesPostulante['etnia_bi']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="puebloIndigenaEmp" id="puebloIndigenaEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="Atacameño">Atacame&ntilde;o</option>
                                    <option value="Aymara">Aymara</option>
                                    <option value="Diaguita">Diaguita</option>
                                    <option value="Kawhaskar">Kawhaskar</option>
                                    <option value="Mapuche">Mapuche</option>
                                    <option value="Colla">Colla</option>
                                    <option value="Quechua">Quechua</option>
                                    <option value="Rapa Nui">Rapa Nui</option>
                                    <option value="Yagan">Yagan</option>
                                    <option value="No Aplica">No Aplica</option>                                                               
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiPuebloIndigena" class="label"></span>
                                <input type="hidden" name="resultadoDigiPuebloIndigena" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Acreditado x Certificado -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Acreditado por Certificado (N&deg;)</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <input type="number" name="acreditadoPorCertificadoConadiPapel" id="acreditadoPorCertificadoConadiPapel" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8" />
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="acreditadoPorCertificadoConadiSinab"><b><?php echo $antecedentesPostulante['certificado_conadi']; ?></b></span>
                                <input type="hidden" name="acreditadoPorCertificadoConadiSinab" value="<?php echo $antecedentesPostulante['certificado_conadi']; ?>" />                            
                            </td>
                            <td>
                                <input type="number" name="acreditadoPorCertificadoConadiEmp" id="acreditadoPorCertificadoConadiEmp" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8" />
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAcreditadoPorCertificadoConadi" class="label"></span>
                                <input type="hidden" name="resultadoDigiAcreditadoPorCertificadoConadi" value="" />                            
                            </td>
                        </tr>
                        <tr>
                        <!-- Sólo Aplica para BRI y las BI -->
                            <td colspan="3" class="text-right text-primary" style="background-color: yellow;">
                                <span><b><em>&iquest; N&deg; de certificado CONADI se encuentra &quot;precargado&quot; en Sinab ?</em></b></span>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="cerfificadoConadiPrecargado" id="cerfificadoConadiPrecargado" value="SI" />
                            </td>
                        </tr>
                        <!-- /cerfificadoConadiPrecargado -->
                    </table>
                </div>
                
                <!-- Acreditado x Apellido -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Acreditado por Apellido</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="acreditadoPorApellidoPapel" id="acreditadoPorApellidoPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="acreditadoPorApellidoSinab"><b><?php echo $antecedentesPostulante['acreditacion_por_apellidos']; ?></b></span>
                                <input type="hidden" name="acreditadoPorApellidoSinab" value="<?php echo $antecedentesPostulante['acreditacion_por_apellidos']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="acreditadoPorApellidoEmp" id="acreditadoPorApellidoEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>                                                               
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAcreditadoPorApellido" class="label"></span>
                                <input type="hidden" name="resultadoDigiAcreditadoPorApellido" value="" />                            
                            </td>
                        </tr>
                        <!-- Sólo Aplica para BRI y las BI -->
                        <tr>
                            <td colspan="3" class="text-right text-primary" style="background-color: yellow;">
                                <span><b><em>&iquest; Estudiante cuenta con apellido ind&iacute;gena &quot;directo&quot; en Sinab ?</em></b></span>
                            </td>
                            <td class="text-center">
                                <input type="checkbox" name="apellidoIndigenaDirecto" id="apellidoIndigenaDirecto" value="SI" />
                            </td>
                        </tr>
                        <!-- /apellidoIndigenaDirecto -->                        
                    </table>
                </div>

                <h4 class="alert alert-warning"><strong>COMUNA DE DOMICILIO</strong></h4>

                <!-- Región Domicilio Familiar - SÓLO BRI -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Regi&oacute;n Domicilio Familiar</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="regionDomicilioFamiliarPapel" id="regionDomicilioFamiliarPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                            <!-- Se debe llamar a la región del domicilio familiar en SP -->
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="regionDomicilioFamiliarSinab"><b>1<?php #echo $antecedentesPostulante['']; ?></b></span>
                                <input type="hidden" name="regionDomicilioFamiliarSinab" value="<?php #echo $antecedentesPostulante['']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="regionDomicilioFamiliarEmp" id="regionDomicilioFamiliarEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>                                                            
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoRegionDomicilioFamiliar" class="label"></span>
                                <input type="hidden" name="resultadoRegionDomicilioFamiliar" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>
                
                <!-- Comuna Domicilio Familiar -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Comuna Domicilio Familiar</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="comuDomicilioFamiliarPapel" id="comuDomicilioFamiliarPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="comuDomicilioFamiliarSinab"><b>1<?php #echo $antecedentesPostulante['']; ?></b></span>
                                <input type="hidden" name="comuDomicilioFamiliarSinab" value="<?php #echo $antecedentesPostulante['']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="comuDomicilioFamiliarEmp" id="comuDomicilioFamiliarEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>                                                            
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoComuDomicilioFamiliar" class="label"></span>
                                <input type="hidden" name="resultadoComuDomicilioFamiliar" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>

                <!-- Comuna Domicilio Estudios -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Comuna Domicilio Estudios</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="comuDomicilioEstudiosPapel" id="comuDomicilioEstudiosPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="comuDomicilioEstudiosSinab"><b>1<?php #echo $antecedentesPostulante[''];?></b></span>
                                <input type="hidden" name="comuDomicilioEstudiosSinab" value="<?php #echo $antecedentesPostulante['']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="comuDomicilioEstudiosEmp" id="comuDomicilioEstudiosEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>                                                            
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoComuDomicilioEstudios" class="label"></span>
                                <input type="hidden" name="resultadoComuDomicilioEstudios" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>                
                </div> <!-- /verAntecedentes -->
                                
                <?php 
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DA($rutPostulante)") or die(mysqli_error($conexion));
                    $dimAcademica = mysqli_fetch_array($result);
                ?>
                                
                <?php require_once 'dimensiones' . '/' . 'dimAcademicaEduSUP.php'; ?>
                
                <!-- DIM. ECONOMICA - YA NO SE REVISA (DATO VERIFICADO X ENTIDAD EXTERNA -->
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

                <?php require_once 'dimensiones' . '/' . 'estadoCierreRev.php'; ?>

                <div class="form-group">
                    <div class="col-md-12">
                        <button type="submit" name="guardarBRI" class="btn btn-primary btn-lg pull-right">Guardar Revisi&oacute;n</button>
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
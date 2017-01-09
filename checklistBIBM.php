<?php
require_once 'config.php';
require_once 'obsSelect.php';

$tipoBeca = $_POST['beca'];
$rutPostulante = $_POST['rutPostulante'];

$result = mysqli_query($conexion, "CALL Consulta_Rut($rutPostulante)") or die(mysqli_error($conexion));
$existePostulante = mysqli_fetch_array($result);

if ('FALSE' == $existePostulante['respuesta']) {
    header('location: rutPostulante.php?beca=' . $tipoBeca . '&rutInvalido=' . $rutPostulante);
    exit;
} else {
    ?>

    <!DOCTYPE html>
    <html lang="es">
    <head>
        <title>Checklist BIBM - Becas de Mantenci&oacute;n Junaeb 2017</title>
        <?php include_once 'tagsMeta.php'; ?>
        <?php include_once 'tagsCSS.php'; ?>
        <?php include_once 'tagsFixJS.php'; ?>
        <link href="css/estilos_checklists.css" rel="stylesheet"/>
    </head>

    <body>

    <div class="container">
        <?php include_once 'menuInicio.php'; ?>
        <h2 class="alert alert-info text-center" id="titulo"><b>REVISI&Oacute;N BECA IND&Iacute;GENA B&Aacute;SICA &amp;
                MEDIA</b></h2>
        <div class="well well-sm">
            <ul class="nav nav-tabs nav-justified" style="font-size: 12px; font-weight:;">
                <li id="linkGenerales" class="pestanas">
                    <a href="#datosGenerales" style="background: #E0E0E0;">GENERAL</a>
                </li>
                <li id="linkDocumental" class="pestanas">
                    <a href="#documental" style="background: #5EAEAE;">DOCUMENTAL</a>
                </li>
                <li id="linkAntecedentes" class="pestanas">
                    <a href="#antecedentes" style="background-color: #EC7600;">ANTECEDENTES</a>
                </li>
                <li id="linkAcademica" class="pestanas">
                    <a href="#academica" style="background-color: #FFFF2D;">ACAD&Eacute;MICA</a>
                </li>
                <li id="linkEconomica" class="pestanas">
                    <a href="#economica" style="background-color: #9191C8">ECON&Oacute;MICA</a>
                </li>
                <li id="linkFactoresRiesgo" class="pestanas">
                    <a href="#factoresRiesgo" style="background-color: #FF9428">FACT. RIESGO</a>
                </li>
                <li id="linkEducacion" class="pestanas">
                    <a href="#educacion" style="background-color: #359AFF;">EDUCACI&Oacute;N</a>
                </li>
                <li id="linkSocioCultural" class="pestanas">
                    <a href="#socioCultural" style="background-color: #1AFF53">SOCIOCULTURAL</a>
                </li>
            </ul>

            <br/>
            <!--  enctype="multipart/form-data" -->
            <form action="procesarChecklistsBIBM.php" method="post" id="checklistForm" class="form-horizontal"
                  role="form">
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
                                <tr class="text-danger">
                                    <td>Certificado de participaci&oacute;n del padre, madre o representante legal en organizaci&oacute;n ind&iacute;gena</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoParticipacionOrgIndigena" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <tr class="text-danger">
                                    <td>Certificado se domicilia o vive en comunidad ind&iacute;gena</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoSeDomiciliaViveEnComunidadIndigena" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <tr class="text-danger">
                                    <td>Certificado de participa de pr&aacute;cticas y/o celebraciones rituales de la comunidad o pueblo al que pertenece
                                    </td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <tr class="text-danger">
                                    <td>Certificado Conadi que acredite calidad ind&iacute;gena</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoConadiAlumno" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                                <tr class="text-warning docOpcional">
                                    <td>Certificado de embarazo</td>
                                    <td class="text-center">
                                        <input type="checkbox" name="certificadoEmbarazo" id="" value="COMPLETO" class="revDocumental"/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <!-- ANTECEDENTES DEL POSTULANTE -->
                    <div id="verAntecedentes" class="dimension" style="display: none;">
                        <h3 id="antecedentes"><strong>ANTECEDENTES DEL POSTULANTE</strong>
                            <span class="label label-info pull-right"><a href="#titulo"
                                                                         class="volver-arriba">Volver Men&uacute;</a></span>
                        </h3>
                        <!-- Curso -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-condensed">
                                <tr>
                                    <td colspan="4">
                                        <h4>
                                            <strong>Curso del Estudiante de Ense&ntilde;anza B&aacute;sica y Media</strong>
                                        </h4>
                                    </td>
                                </tr>
                                <tr>
                                    <th>Registro Formulario</th>
                                    <th>Registro Digitaci&oacute;n</th>
                                    <th>Registro Revisi&oacute;n</th>
                                    <th>RESULTADO</th>
                                </tr>
                                <tr>
                                    <td>
                                        <select class="form-control" name="cursoBasicaMediaPapel" id="cursoBasicaMediaPapel">
                                            <option value="">Seleccione...</option>
                                            <option value="Quinto Básico">Quinto Básico</option>
                                            <option value="Sexto Básico">Sexto Básico</option>
                                            <option value="Séptimo Básico">Séptimo Básico</option>
                                            <option value="Octavo Básico">Octavo Básico</option>
                                            <option value="Séptimo y Octavo Básico">Séptimo y Octavo Básico</option>
                                            <option value="Primero Medio">Primero Medio</option>
                                            <option value="Segundo Medio">Segundo Medio</option>
                                            <option value="Primero y Segundo Medio">Primero y Segundo Medio</option>
                                            <option value="Tercero Medio">Tercero Medio</option>
                                            <option value="Cuarto Medio">Cuarto Medio</option>
                                            <option value="Tercero y Cuarto Medio">Tercero y Cuarto Medio</option>
                                        </select>
                                    </td>
                                    <td class="text-center bg-info" style="vertical-align: middle;">
                                        <span id="cursoBasicaMediaSinab">
                                            <b><?php echo $datosGrales['curso']; ?></b>
                                        </span>
                                        <input type="hidden" name="cursoBasicaMediaSinab" value="<?php echo $datosGrales['curso']; ?>"/>
                                    </td>
                                    <td>
                                        <select class="form-control" name="cursoBasicaMediaEmp" id="cursoBasicaMediaEmp">
                                            <option value="">Seleccione...</option>
                                            <option value="Quinto Básico">Quinto Básico</option>
                                            <option value="Sexto Básico">Sexto Básico</option>
                                            <option value="Séptimo Básico">Séptimo Básico</option>
                                            <option value="Octavo Básico">Octavo Básico</option>
                                            <option value="Séptimo y Octavo Básico">Séptimo y Octavo Básico</option>
                                            <option value="Primero Medio">Primero Medio</option>
                                            <option value="Segundo Medio">Segundo Medio</option>
                                            <option value="Primero y Segundo Medio">Primero y Segundo Medio</option>
                                            <option value="Tercero Medio">Tercero Medio</option>
                                            <option value="Cuarto Medio">Cuarto Medio</option>
                                            <option value="Tercero y Cuarto Medio">Tercero y Cuarto Medio</option>
                                        </select>
                                    </td>
                                    <td class="valor-resultado text-center" style="vertical-align: middle;">
                                        <span id="resultadoEduBasicaMedia" class="label"></span>
                                        <input type="hidden" name="resultadoEduBasicaMedia" value=""/>
                                    </td>
                                </tr>
                            </table>
                        </div>


                        <?php crearSelectObservaciones('EduBasicaMedia', 'BIBM') ?>


                        <!-- CREAR CONEXIÓN SP A ANTECEDENTES POSTULANTE AQUI -->
                        <?php
                        mysqli_free_result($result);
                        mysqli_next_result($conexion);
                        $result = mysqli_query($conexion, "CALL Datos_AP($rutPostulante)") or die(mysqli_error($conexion));
                        $antecedentesPostulante = mysqli_fetch_array($result);
                        ?>

                        <h4 class="alert alert-warning"><strong>ACREDITACI&Oacute;N ASCENDENCIA IND&Iacute;GENA</strong>
                        </h4>

                        <!-- Dato(s) pasado(s) como oculto(s) -->
                        <input type="hidden" name="rbd" value="<?php echo $antecedentesPostulante['rbd']; ?>"/>

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
                                        <span id="puebloIndigenaSinab">
                                            <b><?php echo $antecedentesPostulante['etnia_bi']; ?></b>
                                        </span>
                                        <input type="hidden" name="puebloIndigenaSinab" value="<?php echo $antecedentesPostulante['etnia_bi']; ?>"/>
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
                                        <input type="hidden" name="resultadoDigiPuebloIndigena" value=""/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php crearSelectObservaciones('DigiPuebloIndigena', 'BIBM') ?>

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
                                        <input type="number" name="acreditadoPorCertificadoConadiPapel" id="acreditadoPorCertificadoConadiPapel" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8"/>
                                    </td>
                                    <td class="text-center bg-info" style="vertical-align: middle;">
                                        <span id="acreditadoPorCertificadoConadiSinab">
                                            <b><?php echo $antecedentesPostulante['certificado_conadi']; ?></b>
                                        </span>
                                        <input type="hidden" name="acreditadoPorCertificadoConadiSinab" value="<?php echo $antecedentesPostulante['certificado_conadi']; ?>"/>
                                    </td>
                                    <td>
                                        <input type="number" name="acreditadoPorCertificadoConadiEmp" id="acreditadoPorCertificadoConadiEmp" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8"/>
                                    </td>
                                    <td class="valor-resultado text-center" style="vertical-align: middle;">
                                        <span id="resultadoDigiAcreditadoPorCertificadoConadi" class="label"></span>
                                        <input type="hidden" name="resultadoDigiAcreditadoPorCertificadoConadi" value=""/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php crearSelectObservaciones('DigiAcreditadoPorCertificadoConadi', 'BIBM') ?>

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
                                        <input type="hidden" name="acreditadoPorApellidoSinab" value="<?php echo $antecedentesPostulante['acreditacion_por_apellidos']; ?>"/>
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
                                        <input type="hidden" name="resultadoDigiAcreditadoPorApellido" value=""/>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <?php crearSelectObservaciones('DigiAcreditadoPorApellido', 'BIBM') ?>
                    </div>

                    <?php require_once 'dimensiones' . '/' . 'antecedentesEduBM.php'; ?>

                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DA($rutPostulante)") or die(mysqli_error($conexion));
                    $dimAcademica = mysqli_fetch_array($result);
                    ?>

                    <!-- DIM. ACADEMICA -->

                    <?php require_once 'dimensiones' . '/' . 'dimAcademicaEduSUP.php'; ?>
                    <!-- DIM. ECONOMICA -->
                    <?php require_once 'dimensiones' . '/' . 'dimEconomica.php'; ?>

                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DFR($rutPostulante)") or die(mysqli_error($conexion));
                    $dimFactRiesgo = mysqli_fetch_array($result);
                    ?>

                    <!-- DIM. OTROS FACTORES DE RIESGO -->

                    <?php require_once 'dimensiones' . '/' . 'dimFactoresRiesgo.php'; ?>
                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DE($rutPostulante)") or die(mysqli_error($conexion));
                    $dimEducacion = mysqli_fetch_array($result);
                    ?>

                    <!-- DIM. EDUCACION -->
                    <?php require_once 'dimensiones' . '/' . 'dimEducacion.php'; ?>

                    <?php
                    mysqli_free_result($result);
                    mysqli_next_result($conexion);
                    $result = mysqli_query($conexion, "CALL Datos_DS($rutPostulante)") or die(mysqli_error($conexion));
                    $dimSocioCultural = mysqli_fetch_array($result);
                    ?>

                    <!-- DIM. SOCIOCULTURAL -->
                    <?php require_once 'dimensiones' . '/' . 'dimSocioCultural.php'; ?>
                    <hr>
                    <br>
                    <!-- ESTADO CIERRE -->
                    <?php require_once 'dimensiones' . '/' . 'estadoCierreRev.php'; ?>

                    <br/>

                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="submit" name="guardarBIBM" class="btn btn-primary btn-lg pull-right">
                                Guardar Revisi&oacute;n
                            </button>
                        </div>
                    </div>
                </fieldset>
            </form>

        </div> <!-- /pozo -->
    </div> <!-- /container -->
    <?php include_once 'tagsJS.php'; ?>
    <script src="js/logica_checklists.js"></script>
    <script type="text/javascript">
        alert('GGG');
    </script>
    </body>
    </html>
    <?php
}
?>
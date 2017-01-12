<?php
require_once 'config.php';
require_once 'funciones.php';
#header('Content-Type: text/html charset=UTF-8')
/**
 * Muesta variables x pantalla
 * echo "<h2>Campos de Revisi&oacuten BI B&M</h2>\n\n"
 * if( isset($_POST["guardarBIBM"]) ){
 * foreach($_POST as $clave=>$valor ){
 * echo "El campo: " . $clave . " contiene: " . $valor . "\n"
 * echo "</br>"
 * }
 * }
 **/
if (isset($_POST['estadoChecklist']) && $_POST['estadoChecklist'] != '') {
    $idRevisor = '1';

    extract($_POST, EXTR_PREFIX_ALL, "bibm");#PREFIX será abrev. según beca

    list($rutAlumno, $dvAlumno) = explode('-', $bibm_rutAlumno);

    if (empty($bibm_certificadoConadiAlumno)) {
        $bibm_certificadoConadiAlumno = 'INCOMPLETO';
    }
    if (empty($bibm_certificadoParticipacionOrgIndigena)) {
        $bibm_certificadoParticipacionOrgIndigena = 'INCOMPLETO';
    }
    if (empty($bibm_certificadoSeDomiciliaViveEnComunidadIndigena)) {
        $bibm_certificadoSeDomiciliaViveEnComunidadIndigena = 'INCOMPLETO';
    }
    if (empty($bibm_certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad)) {
        $bibm_certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad = 'INCOMPLETO';
    }
    if (empty($bibm_certificadoEmbarazo)) {
        $bibm_certificadoEmbarazo = 'INCOMPLETO';
    }

    $bibm_obsRutAlumno = limpiarString($bibm_obsRutAlumno);
    $bibm_obsNombreAlumno = limpiarString($bibm_obsNombreAlumno);
    #var_dump($bri_obsRutAlumno, $bri_obsNombreAlumno, $bri_resultadoRutAlumno, $bri_resultadoNombreAlumno);

    //*** OBSERVACIONES ***//
    if( empty($bibm_resultadoRutAlumno) ){
        $bibm_resultadoRutAlumno = 'CORRECTO';
    }
    if( empty($bibm_resultadoNombreAlumno) ){
        $bibm_resultadoNombreAlumno = 'CORRECTO';
    }




    settype($bibm_rbd, "integer");
    settype($bibm_regionDeEjecucion, "integer");
    settype($bibm_notaPapel, "float");
    settype($bibm_notaEmp, "float");
    settype(trim($bibm_acreditadoPorCertificadoConadiPapel), "integer");
    settype(trim($bibm_acreditadoPorCertificadoConadiEmp), "integer");


    $query = "CALL BIBM_SUP_InsertarDatos(" . $idRevisor . ", 
    #Variables generales
    
    '" . $bibm_regionDeEjecucion . "', '" . $bibm_estadoChecklist . "', '" . $bibm_codEstadoChecklist . "',
    '" . $rutAlumno . "', " . "'" . $dvAlumno . "', '".$bibm_resultadoRutAlumno."', '".$bibm_obsRutAlumno."',
    '" . $bibm_nombreAlumno . "','" . $bibm_resultadoNombreAlumno."', '".$bibm_obsNombreAlumno."',
    '" . $bibm_domicilioAlumno . "','" . $bibm_tipoBecaAlumno . "',
    '" . $bibm_nivelEducacional . "', '" . $bibm_provinciaDomicilioFamiliarAlumno . "',
    '" . $bibm_comunaDomicilioFamiliarAlumno . "', " . "'" . $bibm_profesionalQueEvaluo . "',
    '" . $bibm_tipoUnidadOperativa . "','" . $bibm_institucionEvaluadora . "', '" . $bibm_rbd . "', " . "
    
   
    #Variables normales
    
    '" . $bibm_nombreEstEducacionalPapel . "', '" . $bibm_nombreEstEducacionalSinab . "', '" . $bibm_nombreEstEducacionalEmp . "', '" . $bibm_resultadoDigiNombreEstEducacional . "',
    '" . $bibm_cursoBasicaMediaPapel . "', '" . $bibm_cursoBasicaMediaSinab . "', '" . $bibm_cursoBasicaMediaEmp . "', '" . $bibm_resultadoEduBasicaMedia . "',
    '" . $bibm_discapacidadPapel . "', '" . $bibm_discapacidadSinab . "', '" . $bibm_discapacidadEmp . "', '" . $bibm_resultadoDigiDiscapacidad . "',
    '" . $bibm_puebloIndigenaPapel . "', " . "'" . $bibm_puebloIndigenaSinab . "','" . $bibm_puebloIndigenaEmp . "','" . $bibm_resultadoDigiPuebloIndigena . "',
    '" . $bibm_acreditadoPorCertificadoConadiPapel . "', '" . $bibm_acreditadoPorCertificadoConadiSinab . "', " . "'" . $bibm_acreditadoPorCertificadoConadiEmp . "','" . $bibm_resultadoDigiAcreditadoPorCertificadoConadi . "',
    '" . $bibm_acreditadoPorApellidoPapel . "', '" . $bibm_acreditadoPorApellidoSinab . "', " . "'" . $bibm_acreditadoPorApellidoEmp . "', '" . $bibm_resultadoDigiAcreditadoPorApellido . "',
    '" . $bibm_notaPapel . "', '" . $bibm_notaSinab . "', '" . $bibm_notaEmp . "', '" . $bibm_resultadoDigiNota . "',
    '" . $bibm_deficitApoyoFamiliarPapel . "', '".$bibm_deficitApoyoFamiliarSinab."','" . $bibm_deficitApoyoFamiliarEmp . "', '" . $bibm_resultadoDigiDeficitApoyoFamiliar . "',
    '" . $bibm_duplicidadFuncionesAlumnoPapel . "', " . "'" . $bibm_duplicidadFuncionesAlumnoSinab . "', '" . $bibm_duplicidadFuncionesAlumnoEmp . "', '" . $bibm_resultadoDigiDuplicidadFuncionesAlumno . "',
    '" . $bibm_hermanosHijosEstudiantesPapel . "', " . "'" . $bibm_hermanosHijosEstudiantesSinab . "', '" . $bibm_hermanosHijosEstudiantesEmp . "', '" . $bibm_resultadoDigiHermanosHijosEstudiantes . "',
    '" . $bibm_participaEnOrgIndigenaPapel . "', " . "'" . $bibm_participaEnOrgIndigenaSinab . "', '" . $bibm_participaEnOrgIndigenaEmp . "', '" . $bibm_resultadoDigiParticipacionOrgIndigena . "',
    '" . $bibm_seDomiciliaViveEnComunidadIndigenaPapel . "', " . "'" . $bibm_seDomiciliaViveEnComunidadIndigenaSinab . "', '" . $bibm_seDomiciliaViveEnComunidadIndigenaEmp . "', '" . $bibm_resultadoDigiSeDomiciliaViveEnComunidadIndigena . "' ,
    '" . $bibm_participaDePracticasCulturalesRitualesDeLaComunidadPapel . "', '" . $bibm_participaDePracticasCulturalesRitualesDeLaComunidadSinab . "', '" . $bibm_participaDePracticasCulturalesRitualesDeLaComunidadEmp . "','" . $bibm_resultadoDigiParticipaDePracticasCulturalesRitualesDeLaComunidad . "',
    '" . $bibm_aislamientoPromedioComunalPapel . "', '" . $bibm_aislamientoPromedioComunalSinab . "', " . "'" . $bibm_aislamientoPromedioComunalEmp . "', '" . $bibm_resultadoDigiAislamientoPromedioComunal . "',
    '" . $bibm_lugarEstudioAlumnoPapel . "', '" . $bibm_lugarEstudioAlumnoSinab . "', " . "'" . $bibm_lugarEstudioAlumnoEmp . "', '" . $bibm_resultadoDigiLugarEstudioAlumno . "',  
     
     #Documental
     
     '" . $bibm_certificadoParticipacionOrgIndigena . "', '" . $bibm_certificadoSeDomiciliaViveEnComunidadIndigena . "', " . "'" . $bibm_certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad . "', '" . $bibm_certificadoConadiAlumno . "', " . "'" . $bibm_certificadoEmbarazo . ")";


    //$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    //mysqli_free_result($result);
    //mysqli_next_result($conexion);
    //mysqli_close($conexion);
    //#var_dump($query);
}


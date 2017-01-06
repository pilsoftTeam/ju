<?php
require_once 'config.php';
require_once 'funciones.php';
/**
 * Muesta variables x pantalla
echo "<h2>Campos de Revisi&oacute;n BRI</h2>\n\n";
if( isset($_POST["estadoChecklist"]) ){
    foreach($_POST as $clave=>$valor ){        
        echo "El campo: " . $clave . " contiene: " . $valor . "\n";
        echo "</br>";
    }
}
**/
$idRevisor = '1';#En producción $idRevisor será = a $_SESSION['userid'];

if( isset($_POST['estadoChecklist']) && $_POST['estadoChecklist'] != '' ){    
    
    //*** IMPORTA VARS $_POST AL SCRIPT ***//
    extract($_POST, EXTR_PREFIX_ALL, "bri");#PREFIX será abrev. según beca
    
    //*** LUEGO DE IMPORTAR SE TRATAN LAS VARS QUE LO NECESITAN ***//
    list($rutAlumno, $dvAlumno) = explode('-', $bri_rutAlumno);
    
    $bri_obsRutAlumno = limpiarString($bri_obsRutAlumno);
    $bri_obsNombreAlumno = limpiarString($bri_obsNombreAlumno);
    #var_dump($bri_obsRutAlumno, $bri_obsNombreAlumno, $bri_resultadoRutAlumno, $bri_resultadoNombreAlumno);
        
    //*** OBSERVACIONES ***//
    if( empty($bri_resultadoRutAlumno) ){
        $bri_resultadoRutAlumno = 'CORRECTO';
    }
    if( empty($bri_resultadoNombreAlumno) ){
        $bri_resultadoNombreAlumno = 'CORRECTO';
    }
    
    //*** DOCUMENTOS - DEFINIR SI SERÁN DINÁMICOS O CON N/A ***//
    if( empty($bri_certificadoParticipacionOrgIndigena) ){
        $bri_certificadoParticipacionOrgIndigena = 'INCOMPLETO';
    }
    if( empty($bri_certificadoSeDomiciliaViveEnComunidadIndigena) ){
        $bri_certificadoSeDomiciliaViveEnComunidadIndigena = 'INCOMPLETO';
    }    
    if( empty($bri_certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad) ){
        $bri_certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad = 'INCOMPLETO'; 
    }
    if( empty($bri_certificadoConadiAlumno) ){
        $bri_certificadoConadiAlumno = 'INCOMPLETO';
    }
    if( empty($bri_certificadoRecidDomiFamiAcredComunaLocalidad) ){
        $bri_certificadoRecidDomiFamiAcredComunaLocalidad = 'INCOMPLETO';
    }
    if( empty($bri_concentracionNotasUltAnioAcad) ){
        $bri_concentracionNotasUltAnioAcad = 'INCOMPLETO';
    }
    if( empty($bri_certificadoAlumnoRegular) ){
        $bri_certificadoAlumnoRegular = 'INCOMPLETO';
    }
    if( empty($bri_documentoArriendoInmueble) ){
        $bri_documentoArriendoInmueble = 'INCOMPLETO';
    }
    if( empty($bri_certificadoEmbarazo) ){
        $bri_certificadoEmbarazo = 'INCOMPLETO';
    }

    //** SGTES. 2 SÓLO APLICAN A BRI Y BI **//    
    if( empty($cerfificadoConadiPrecargado) ){
        $cerfificadoConadiPrecargado = 'NO';
    }
    
    if( empty($apellidoIndigenaDirecto) ){
        $apellidoIndigenaDirecto = 'NO';
    }
        
    settype($bri_rbd, "integer");
    settype($bri_regionDeEjecucion, "integer");    
    settype($bri_anioIngresoCarreraPapel, "integer");    
    settype($bri_anioIngresoCarreraEmp, "integer");    
    settype($bri_duracionCarreraPapel, "integer");
    settype($bri_duracionCarreraEmp, "integer");
    settype(trim($bri_acreditadoPorCertificadoConadiPapel), "integer");
    settype(trim($bri_acreditadoPorCertificadoConadiEmp), "integer");
    /**
    settype($bri_notaPapel, "float");    
    settype($bri_notaEmp, "float");  
    settype(trim($bri_nemPapel), "float");    
    settype(trim($bri_nemEmp), "float");
    settype(trim($bri_psuPapel), "integer");    
    settype(trim($bri_psuEmp), "integer");
    **/
    $query = "CALL BRI_SUP_InsertarDatos(".$idRevisor.", '".$bri_regionDeCreacion."', '".$bri_estadoChecklist."', '".$bri_codEstadoChecklist."', '".$rutAlumno."', "
    . "'".$dvAlumno."', '".$bri_resultadoRutAlumno."', '".$bri_obsRutAlumno."', '".$bri_nombreAlumno."', '".$bri_resultadoNombreAlumno."', '".$bri_obsNombreAlumno."', "
    . "'".$bri_domicilioAlumno."', '".$bri_tipoBecaAlumno."', '".$bri_nivelEducacional."', '".$bri_provinciaDomicilioFamiliarAlumno."', '".$bri_comunaDomicilioFamiliarAlumno."', "
    . "'".$bri_profesionalQueEvaluo."', '".$bri_tipoUnidadOperativa."', '".$bri_institucionEvaluadora."', '".$bri_rbd."', '".$bri_institucionEduSupPapel."', '".$bri_institucionEduSupSinab."', "
    . "'".$bri_institucionEduSupEmp."', '".$bri_resultadoDigiInstitucionEduSup."', '".$bri_nombreCarreraPapel."', '".$bri_nombreCarreraSinab."', '".$bri_nombreCarreraEmp."', "
    . "'".$bri_resultadoDigiNombreCarrera."', '".$bri_anioIngresoCarreraPapel."', '".$bri_anioIngresoCarreraSinab."', '".$bri_anioIngresoCarreraEmp."', '".$bri_resultadoDigiAnioIngresoCarrera."', "
    . "'".$bri_duracionCarreraPapel."', '".$bri_duracionCarreraSinab."', '".$bri_duracionCarreraEmp."', '".$bri_resultadoDigiDuracionCarrera."', '".$bri_puebloIndigenaPapel."', "
    . "'".$bri_puebloIndigenaSinab."', '".$bri_puebloIndigenaEmp."', '".$bri_resultadoDigiPuebloIndigena."', '".$bri_acreditadoPorCertificadoConadiPapel."', '".$bri_acreditadoPorCertificadoConadiSinab."', "
    . "'".$bri_acreditadoPorCertificadoConadiEmp."', '".$bri_resultadoDigiAcreditadoPorCertificadoConadi."', '".$bri_acreditadoPorApellidoPapel."', '".$bri_acreditadoPorApellidoSinab."', "
    . "'".$bri_acreditadoPorApellidoEmp."', '".$bri_resultadoDigiAcreditadoPorApellido."', '".$bri_regionDomicilioFamiliarPapel."', '".$bri_regionDomicilioFamiliarSinab."', '".$bri_regionDomicilioFamiliarEmp."', "    
    . "'".$bri_resultadoRegionDomicilioFamiliar."', '".$bri_comuDomicilioFamiliarPapel."', '".$bri_comuDomicilioFamiliarSinab."', '".$bri_comuDomicilioFamiliarEmp."', "
    . "'".$bri_resultadoComuDomicilioFamiliar."', '".$bri_comuDomicilioEstudiosPapel."', '".$bri_comuDomicilioEstudiosSinab."', '".$bri_comuDomicilioEstudiosEmp."', '".$bri_resultadoComuDomicilioEstudios."', "
    // NEM, Aprob. curricular y PSU no aplican en BI y BRI según Obs. de Junaeb
    /**
    . "'".$bri_notaPapel."', '".$bri_notaSinab."', '".$bri_notaEmp."', '".$bri_resultadoDigiNota."', '".$bri_nemPapel."', '".$bri_nemSinab."', '".$bri_nemEmp."', '".$bri_resultadoDigiNem."', "
    . "'".$bri_aprobacionCurricularPapel."', '".$bri_aprobacionCurricularSinab."', '".$bri_aprobacionCurricularEmp."', '".$bri_resultadoDigiAprobacionCurricular."', "
    . "'".$bri_psuPapel."', '".$bri_psuSinab."', '".$bri_psuEmp."', '".$bri_resultadoDigiPsu."', '".$bri_tramoRSHPapel."', '".$bri_tramoRSHSinab."', '".$bri_tramoRSHEmp."', '".$bri_resultadoDigitramoRSH."', "
    **/    
    . "'".$bri_deficitApoyoFamiliarPapel."', '".$bri_deficitApoyoFamiliarSinab."', '".$bri_deficitApoyoFamiliarEmp."', '".$bri_resultadoDigiDeficitApoyoFamiliar."', "
    . "'".$bri_discapacidadPapel."', '".$bri_discapacidadSinab."', '".$bri_discapacidadEmp."', '".$bri_resultadoDigiDiscapacidad."', '".$bri_duplicidadFuncionesAlumnoPapel."', "    
    . "'".$bri_duplicidadFuncionesAlumnoSinab."', '".$bri_duplicidadFuncionesAlumnoEmp."', '".$bri_resultadoDigiDuplicidadFuncionesAlumno."', '".$bri_hermanosHijosEstudiantesPapel."', "
    . "'".$bri_hermanosHijosEstudiantesSinab."', '".$bri_hermanosHijosEstudiantesEmp."', '".$bri_resultadoDigiHermanosHijosEstudiantes."', '".$bri_participaEnOrgIndigenaPapel."', "
    . "'".$bri_participaEnOrgIndigenaSinab."', '".$bri_participaEnOrgIndigenaEmp."', '".$bri_resultadoDigiParticipacionOrgIndigena."', '".$bri_seDomiciliaViveEnComunidadIndigenaPapel."', "
    . "'".$bri_seDomiciliaViveEnComunidadIndigenaSinab."', '".$bri_seDomiciliaViveEnComunidadIndigenaEmp."', '".$bri_resultadoDigiSeDomiciliaViveEnComunidadIndigena."', "
    . "'".$bri_participaDePracticasCulturalesRitualesDeLaComunidadPapel."', '".$bri_participaDePracticasCulturalesRitualesDeLaComunidadSinab."', '".$bri_participaDePracticasCulturalesRitualesDeLaComunidadEmp."', "
    . "'".$bri_resultadoDigiParticipaDePracticasCulturalesRitualesDeLaComunidad."', '".$bri_aislamientoPromedioComunalPapel."', '".$bri_aislamientoPromedioComunalSinab."', "
    . "'".$bri_aislamientoPromedioComunalEmp."', '".$bri_resultadoDigiAislamientoPromedioComunal."', '".$bri_aislamientoDeLocalidadesPapel."', '".$bri_aislamientoDeLocalidadesSinab."', "
    . "'".$bri_aislamientoDeLocalidadesEmp."', '".$bri_resultadoDigiAislamientoDeLocalidades."', '".$bri_lugarEstudioAlumnoPapel."', '".$bri_lugarEstudioAlumnoSinab."', " 
    . "'".$bri_lugarEstudioAlumnoEmp."', '".$bri_resultadoDigiLugarEstudioAlumno."', '".$bri_certificadoParticipacionOrgIndigena."', '".$bri_certificadoSeDomiciliaViveEnComunidadIndigena."', "
    . "'".$bri_certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad."', '".$bri_certificadoConadiAlumno."', '".$bri_certificadoRecidDomiFamiAcredComunaLocalidad."', "                    
    . "'".$bri_concentracionNotasUltAnioAcad."', '".$bri_certificadoAlumnoRegular."', '".$bri_documentoArriendoInmueble."', '".$bri_certificadoEmbarazo."'"
    . ")";
                     
    $result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    #TRUE o FALSE (no devuelve un conjunto de resultados como en un SELECT...)
    mysqli_free_result($result);
    //mysqli_next_result($conexion); #Prepara el siguiente resultado de multi_query
    mysqli_close($conexion);
    #var_dump($query);
    
    //*** TRAZABILIDAD DE ESTADOS DE CIERRE - DE SER NECESARIO, IRÁ UN INSERT ***//
    #..............................................................................
    if( $result ){
        header('location: inicio.php?beca=BRI&resultCheck=ok&postulante='.$bri_rutAlumno);
    }else{
        header('location: inicio.php?beca=BRI&resultCheck=error&postulante='.$bri_rutAlumno);
    }   
}else{
    header('location: inicio.php');
}
?>
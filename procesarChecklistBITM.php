<?php
require_once 'config.php';
require_once 'funciones.php';

$idRevisor = '1';#En producción $idRevisor será = a $_SESSION['userid'];

if (isset($_POST['estadoChecklist']) && $_POST['estadoChecklist'] != '') {

    extract($_POST, EXTR_PREFIX_ALL, "bitm"); #PREFIX será abrev. según beca

    list($rutAlumno, $dvAlumno) = explode('-', $bitm_rutAlumno);


    $bitm_obsRutAlumno = limpiarString($bitm_obsRutAlumno);
    $bitm_obsNombreAlumno = limpiarString($bitm_obsNombreAlumno);
    #var_dump($bri_obsRutAlumno, $bri_obsNombreAlumno, $bri_resultadoRutAlumno, $bri_resultadoNombreAlumno);

    //*** OBSERVACIONES ***//
    if (empty($bitm_resultadoRutAlumno)) {
        $bitm_resultadoRutAlumno = 'CORRECTO';
    }
    if (empty($bitm_resultadoNombreAlumno)) {
        $bitm_resultadoNombreAlumno = 'CORRECTO';

    }
    if (empty($bitm_certificadoRecidDomiFamiAcredComunaLocalidad)) {
        $bitm_certificadoRecidDomiFamiAcredComunaLocalidad = 'INCOMPLETO';
    }
    if (empty($bitm_certificadoEmbarazo)) {
        $bitm_certificadoEmbarazo = 'INCOMPLETO';
    }

        //Variables

        settype($bitm_rbd, "integer");
        settype($bitm_regionDeEjecucion, "integer");
        settype($bitm_anioIngresoCarreraPapel, "integer");
        settype($bitm_anioIngresoCarreraEmp, "integer");
        settype($bitm_duracionCarreraPapel, "integer");
        settype($bitm_duracionCarreraEmp, "integer");
        settype(trim($bitm_acreditadoPorCertificadoConadiPapel), "integer");
        settype(trim($bitm_acreditadoPorCertificadoConadiEmp), "integer");

    
        #Variables antecedentes
        $query = "CALL BITM_SUP_InsertarDatos(" . $idRevisor . "',
        
        '" . $bitm_regionDeEjecucion . "', '" . $bitm_estadoChecklist . "', '" . $bitm_codEstadoChecklist . "','" . $rutAlumno . "', " . "'" . $dvAlumno . "', '".$bitm_resultadoRutAlumno."', '".$bitm_obsRutAlumno."',
        '" . $bitm_nombreAlumno . "','" . $bitm_resultadoNombreAlumno."', '".$bitm_obsNombreAlumno."',
        '" . $bitm_domicilioAlumno . "','" . $bitm_tipoBecaAlumno . "',
        '" . $bitm_nivelEducacional . "', '" . $bitm_provinciaDomicilioFamiliarAlumno . "',
        '" . $bitm_comunaDomicilioFamiliarAlumno . "', " . "'" . $bitm_profesionalQueEvaluo . "',
        '" . $bitm_tipoUnidadOperativa . "','" . $bitm_institucionEvaluadora . "', '" . $bitm_rbd . "', " . "
    
        #Variables normales
        
        '" . $bitm_nombreEstEducacionalPapel . "', '" . $bitm_nombreEstEducacionalSinab . "', '" . $bitm_nombreEstEducacionalEmp . "', '" . $bitm_resultadoDigiNombreEstEducacional . "', 
        '" . $bitm_cursoBasicaMediaPapel . "', '" . $bitm_cursoBasicaMediaSinab . "', '" . $bitm_cursoBasicaMediaEmp . "', '" . $bitm_resultadoEduBasicaMedia . "',
        '" . $bitm_discapacidadPapel . "', '" . $bitm_discapacidadSinab . "', '" . $bitm_discapacidadEmp . "', '" . $bitm_resultadoDigiDiscapacidad . "',
        '" . $bitm_puebloIndigenaPapel . "'," . "'" . $bitm_puebloIndigenaSinab . "','" . $bitm_puebloIndigenaEmp . "' , '" . $bitm_resultadoDigiPuebloIndigena . "',
        '" . $bitm_acreditadoPorCertificadoConadiPapel . "', '" . $bitm_acreditadoPorCertificadoConadiSinab . "', " . "'" . $bitm_acreditadoPorCertificadoConadiEmp . "', '" . $bitm_resultadoDigiAcreditadoPorCertificadoConadi . "',
        '" . $bitm_acreditadoPorApellidoPapel . "', '" . $bitm_acreditadoPorApellidoSinab . "', " . "'" . $bitm_acreditadoPorApellidoEmp . "', '" . $bitm_resultadoDigiAcreditadoPorApellido . "',
        '" . $bitm_notaPapel . "', '" . $bitm_notaSinab . "', '" . $bitm_notaEmp . "', '" . $bitm_resultadoDigiNota . "',
        '" . $bitm_deficitApoyoFamiliarPapel . "', '" . $bitm_deficitApoyoFamiliarSinab . "','" . $bitm_deficitApoyoFamiliarEmp . "', '" . $bitm_resultadoDigiDeficitApoyoFamiliar . "',
        '" . $bitm_duplicidadFuncionesAlumnoPapel . "', " . "'" . $bitm_duplicidadFuncionesAlumnoSinab . "', '" . $bitm_duplicidadFuncionesAlumnoEmp . "', '" . $bitm_resultadoDigiDuplicidadFuncionesAlumno . "',
        '" . $bitm_hermanosHijosEstudiantesPapel . "', " . "'" . $bitm_hermanosHijosEstudiantesSinab . "', '" . $bitm_hermanosHijosEstudiantesEmp . "', '" . $bitm_resultadoDigiHermanosHijosEstudiantes . "',
        '" . $bitm_aislamientoDeLocalidadesPapel . "', '" . $bitm_aislamientoDeLocalidadesSinab . "', '" . $bitm_aislamientoDeLocalidadesEmp . "', '" . $bitm_resultadoDigiAislamientoDeLocalidades . "',
        '" . $bitm_aislamientoPromedioComunalPapel . "', '" . $bitm_aislamientoPromedioComunalSinab . "', " . "'" . $bitm_aislamientoPromedioComunalEmp . "', '" . $bitm_resultadoDigiAislamientoPromedioComunal . "',
        '" . $bitm_lugarEstudioAlumnoPapel . "', '" . $bitm_lugarEstudioAlumnoSinab . "', " . "'" . $bitm_lugarEstudioAlumnoEmp . "', '" . $bitm_resultadoDigiLugarEstudioAlumno . "',
        
        #Documental
        '" . $bitm_certificadoRecidDomiFamiAcredComunaLocalidad . "', " . "'" . $bitm_certificadoEmbarazo . ")";

        //$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
        //#TRUE o FALSE (no devuelve un conjunto de resultados como en un SELECT...)
        //mysqli_free_result($result);
        ////mysqli_next_result($conexion); #Prepara el siguiente resultado de multi_query
        //mysqli_close($conexion);
        //#var_dump($query);


}


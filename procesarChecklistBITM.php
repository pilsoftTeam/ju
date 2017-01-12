<?php
require_once 'config.php';
require_once 'funciones.php';

$idRevisor = '1';#En producción $idRevisor será = a $_SESSION['userid'];

if (isset($_POST['estadoChecklist']) && $_POST['estadoChecklist'] != '') {

    extract($_POST, EXTR_PREFIX_ALL, "bitm"); #PREFIX será abrev. según beca

    list($rutAlumno, $dvAlumno) = explode('-', $bitm_rutAlumno);

    if (empty($bitm_certificadoRecidDomiFamiAcredComunaLocalidad)) {
        $bitm_certificadoRecidDomiFamiAcredComunaLocalidad = 'INCOMPLETO';
    }
    if (empty($bitm_certificadoEmbarazo)) {
        $bitm_certificadoEmbarazo = 'INCOMPLETO';
    }

    //Variables

    /**
     *
     * $bitm_regionDeEjecucion;
     * $bitm_rutAlumno;
     * $bitm_nombreAlumno;
     * $bitm_domicilioAlumno;
     * $bitm_tipoBecaAlumno;
     * $bitm_nivelEducacional;
     * $bitm_provinciaDomicilioFamiliarAlumno;
     * $bitm_comunaDomicilioFamiliarAlumno;
     * $bitm_tipoUnidadOperativa;
     * $bitm_institucionEvaluadora;
     * $bitm_profesionalQueEvaluo;
     * $bitm_rbd;
     *
     *
     * $bitm_nombreEstEducacionalPapel;
     * $bitm_nombreEstEducacionalSinab;
     * $bitm_nombreEstEducacionalEmp;
     * $bitm_resultadoDigiNombreEstEducacional;
     * $bitm_ObsDigiNombreEstEducacional;
     *
     *
     * $bitm_cursoBasicaMediaPapel;
     * $bitm_cursoBasicaMediaSinab;
     * $bitm_cursoBasicaMediaEmp;
     * $bitm_resultadoEduBasicaMedia;
     * $bitm_ObsEduBasicaMedia;
     *
     *
     * $bitm_discapacidadPapel;
     * $bitm_discapacidadSinab;
     * $bitm_discapacidadEmp;
     * $bitm_resultadoDigiDiscapacidad;
     * $bitm_ObsDigiDiscapacidad;
     *
     *
     * $bitm_puebloIndigenaPapel;
     * $bitm_puebloIndigenaSinab;
     * $bitm_puebloIndigenaEmp;
     * $bitm_resultadoDigiPuebloIndigena;
     * $bitm_ObsDigiPuebloIndigena;
     *
     *
     * $bitm_acreditadoPorCertificadoConadiPapel;
     * $bitm_acreditadoPorCertificadoConadiSinab;
     * $bitm_acreditadoPorCertificadoConadiEmp;
     * $bitm_resultadoDigiAcreditadoPorCertificadoConadi;
     * $bitm_ObsDigiAcreditadoPorCertificadoConadi;
     *
     *
     * $bitm_acreditadoPorApellidoPapel;
     * $bitm_acreditadoPorApellidoSinab;
     * $bitm_acreditadoPorApellidoEmp;
     * $bitm_resultadoDigiAcreditadoPorApellido;
     * $bitm_ObsDigiAcreditadoPorApellido;
     *
     *
     * $bitm_notaPapel;
     * $bitm_notaSinab;
     * $bitm_notaEmp;
     * $bitm_resultadoDigiNota;
     * $bitm_ObsDigiNota;
     *
     *
     * $bitm_deficitApoyoFamiliarPapel;
     * $bitm_deficitApoyoFamiliarSinab;
     * $bitm_deficitApoyoFamiliarEmp;
     * $bitm_resultadoDigiDeficitApoyoFamiliar;
     * $bitm_ObsDigiDeficitApoyoFamiliar;
     *
     *
     * $bitm_duplicidadFuncionesAlumnoPapel;
     * $bitm_duplicidadFuncionesAlumnoSinab;
     * $bitm_duplicidadFuncionesAlumnoEmp;
     * $bitm_resultadoDigiDuplicidadFuncionesAlumno;
     * $bitm_ObsDigiDuplicidadFuncionesAlumno;
     *
     *
     * $bitm_hermanosHijosEstudiantesPapel;
     * $bitm_hermanosHijosEstudiantesSinab;
     * $bitm_hermanosHijosEstudiantesEmp;
     * $bitm_resultadoDigiHermanosHijosEstudiantes;
     * $bitm_ObsDigiHermanosHijosEstudiantes;
     *
     *
     * $bitm_aislamientoPromedioComunalPapel;
     * $bitm_aislamientoPromedioComunalSinab;
     * $bitm_aislamientoPromedioComunalEmp;
     * $bitm_resultadoDigiAislamientoPromedioComunal;
     * $bitm_ObsDigiAislamientoPromedioComunal;
     *
     *
     * $bitm_aislamientoDeLocalidadesPapel;
     * $bitm_aislamientoDeLocalidadesSinab;
     * $bitm_aislamientoDeLocalidadesEmp;
     * $bitm_resultadoDigiAislamientoDeLocalidades;
     * $bitm_ObsDigiAislamientoDeLocalidades;
     *
     *
     * $bitm_lugarEstudioAlumnoPapel;
     * $bitm_lugarEstudioAlumnoSinab;
     * $bitm_lugarEstudioAlumnoEmp;
     * $bitm_resultadoDigiLugarEstudioAlumno;
     * $bitm_ObsDigiLugarEstudioAlumno;
     *
     *
     * $bitm_codEstadoChecklist;
     * $bitm_estadoChecklist;
     * $bitm_guardarBITM;
     *
     */


    $query = "CALL BITM_SUP_InsertarDatos(" . $idRevisor . "'"
        . $bitm_regionDeEjecucion . "','" . $bitm_estadoChecklist . "','" . $bitm_codEstadoChecklist . "','" . $rutAlumno . "'," . "'" . $dvAlumno . "','" . $bitm_nombreAlumno . "',"
        . "'" . $bitm_domicilioAlumno . "','" . $bitm_tipoBecaAlumno . "', '" . $bitm_nivelEducacional . "','" . $bitm_provinciaDomicilioFamiliarAlumno . "','" . $bitm_comunaDomicilioFamiliarAlumno . "',"
        . "'" . $bitm_profesionalQueEvaluo . "','" . $bitm_tipoUnidadOperativa . "','" . $bitm_institucionEvaluadora . "','" . $bitm_rbd . "',"
        . "'" . $bitm_puebloIndigenaPapel . "'," . "'" . $bitm_puebloIndigenaSinab . "','" . $bitm_puebloIndigenaEmp . "' , '" . $bitm_resultadoDigiPuebloIndigena . "', '" . $bitm_acreditadoPorCertificadoConadiPapel . "', '" . $bitm_acreditadoPorCertificadoConadiSinab . "', "
        . "'" . $bitm_acreditadoPorCertificadoConadiEmp . "', '" . $bitm_resultadoDigiAcreditadoPorCertificadoConadi . "', '" . $bitm_acreditadoPorApellidoPapel . "', '" . $bitm_acreditadoPorApellidoSinab . "', "
        . "'" . $bitm_acreditadoPorApellidoEmp . "', '" . $bitm_resultadoDigiAcreditadoPorApellido . "',  " . "'" . $bitm_notaPapel . "', '" . $bitm_notaSinab . "', '" . $bitm_notaEmp . "', '" . $bitm_resultadoDigiNota . "',  "
        . "'" . $bitm_deficitApoyoFamiliarPapel . "', '" . $bitm_deficitApoyoFamiliarSinab . "','" . $bitm_deficitApoyoFamiliarEmp . "', '" . $bitm_resultadoDigiDeficitApoyoFamiliar . "', "
        . "'" . $bitm_discapacidadPapel . "', '" . $bitm_discapacidadSinab . "', '" . $bitm_discapacidadEmp . "', '" . $bitm_resultadoDigiDiscapacidad . "','" . $bitm_duplicidadFuncionesAlumnoPapel . "', "
        . "'" . $bitm_duplicidadFuncionesAlumnoSinab . "', '" . $bitm_duplicidadFuncionesAlumnoEmp . "', '" . $bitm_resultadoDigiDuplicidadFuncionesAlumno . "','" . $bitm_hermanosHijosEstudiantesPapel . "', "
        . "'" . $bitm_hermanosHijosEstudiantesSinab . "', '" . $bitm_hermanosHijosEstudiantesEmp . "', '" . $bitm_resultadoDigiHermanosHijosEstudiantes . "', "
        . "'" . $bitm_nombreEstEducacionalPapel . "', '" . $bitm_nombreEstEducacionalSinab . "', '" . $bitm_nombreEstEducacionalEmp . "', '" . $bitm_resultadoDigiNombreEstEducacional . "'"
        . "'" . $bitm_cursoBasicaMediaPapel . "', '" . $bitm_cursoBasicaMediaSinab . "', '" . $bitm_cursoBasicaMediaEmp . "', '" . $bitm_resultadoEduBasicaMedia . "'"
        //Agregados
        . "'" . $bitm_aislamientoDeLocalidadesPapel . "', '" . $bitm_aislamientoDeLocalidadesSinab . "', '" . $bitm_aislamientoDeLocalidadesEmp . "', '" . $bitm_resultadoDigiAislamientoDeLocalidades . "'"
        //Termino de agregados
        . "'" . $bitm_aislamientoPromedioComunalPapel . "', '" . $bitm_aislamientoPromedioComunalSinab . "', " . "'" . $bitm_aislamientoPromedioComunalEmp
        . "', '" . $bitm_resultadoDigiAislamientoPromedioComunal . "', "
        . "'" . $bitm_lugarEstudioAlumnoPapel . "', '" . $bitm_lugarEstudioAlumnoSinab . "', " . "'" . $bitm_lugarEstudioAlumnoEmp . "', '" . $bitm_resultadoDigiLugarEstudioAlumno . "',"
        . "'" . $bitm_certificadoRecidDomiFamiAcredComunaLocalidad . "', " . "'" . $bitm_certificadoEmbarazo . ")";

    //$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
    //#TRUE o FALSE (no devuelve un conjunto de resultados como en un SELECT...)
    //mysqli_free_result($result);
    ////mysqli_next_result($conexion); #Prepara el siguiente resultado de multi_query
    //mysqli_close($conexion);
    //#var_dump($query);

}
?>
<pre>
<?php
print_r(get_defined_vars());//
?>
</pre>


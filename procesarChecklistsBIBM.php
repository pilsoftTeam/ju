<?php
require_once 'config.php';
#header('Content-Type: text/html; charset=UTF-8');
/**
 * Muesta variables x pantalla
echo "<h2>Campos de Revisi&oacute;n BI B&M</h2>\n\n";
if( isset($_POST["guardarBIBM"]) ){
    foreach($_POST as $clave=>$valor ){        
        echo "El campo: " . $clave . " contiene: " . $valor . "\n";
        echo "</br>";
    }
}
**/
list($rutAlumno, $dvAlumno) = explode('-', trim($_POST['rutAlumno']));
//echo 'el rut es: '.$rutAlumno.' y el DV es: '.$dvAlumno;

$idRevisor = '1';
$regionDeCreacion = trim($_POST['regionDeEjecucion']);
$estadoRevision = trim($_POST['estadoChecklist']);
$codEstadoRevision = trim($_POST['codEstadoChecklist']);

if( isset($_POST['resultadoRutAlumno']) ){
    $resulRutAlumno = trim($_POST['resultadoRutAlumno']);
}else{
    $resulRutAlumno = 'CORRECTO';
}

$obsRutAlumno = trim($_POST['obsRutAlumno']);
$nombreAlumno = trim($_POST['nombreAlumno']);

if( isset($_POST['resultadoNombreAlumno']) ){
    $resulNombreAlumno = trim($_POST['resultadoNombreAlumno']);
}else{
    $resulNombreAlumno = 'CORRECTO';
}
$obsNombreAlumno = trim($_POST['obsNombreAlumno']);
$domicilioAlumno = trim($_POST['domicilioAlumno']);
$tipoBecaAlumno = trim($_POST['tipoBecaAlumno']);
$nivelEducacional = trim($_POST['nivelEducacional']);
$provinciaFamiliarAlumno = trim($_POST['provinciaDomicilioFamiliarAlumno']);
$comunaFamiliarAlumno = trim($_POST['comunaDomicilioFamiliarAlumno']);
$profesionalQEvaluo = trim($_POST['profesionalQueEvaluo']);
$tipoUnidadOperativa = trim($_POST['tipoUnidadOperativa']);
$institucionEvaluadora = trim($_POST['institucionEvaluadora']);
$cursoBasicaMediaPapel = trim($_POST['cursoBasicaMediaPapel']);
$cursoBasicaMediaSinab = trim($_POST['cursoBasicaMediaSinab']);
$cursoBasicaMediaEmp = trim($_POST['cursoBasicaMediaEmp']);
$resulEduBasicaMedia = trim($_POST['resultadoEduBasicaMedia']);
$rbd  = trim($_POST['rbd']);
$puebloIndigenaPapel = trim($_POST['puebloIndigenaPapel']);
$puebloIndigenaSinab = trim($_POST['puebloIndigenaSinab']);
$puebloIndigenaEmp = trim($_POST['puebloIndigenaEmp']);
$resulDigiPuebloIndigena = trim($_POST['resultadoDigiPuebloIndigena']);
if( isset($_POST['certificadoConadiAlumno']) ){
    $certificadoConadiAlumno = trim($_POST['certificadoConadiAlumno']); #DOC
}else{
    $certificadoConadiAlumno = 'INCOMPLETO';
}
$acreditadoPorCertificadoConadiPapel = trim($_POST['acreditadoPorCertificadoConadiPapel']); #ver opción de validar INT con filter_var
$acreditadoPorCertificadoConadiSinab = trim($_POST['acreditadoPorCertificadoConadiSinab']);
$acreditadoPorCertificadoConadiEmp = trim($_POST['acreditadoPorCertificadoConadiEmp']);
$resulDigiAcreditadoPorCertificadoConadi = trim($_POST['resultadoDigiAcreditadoPorCertificadoConadi']);
$acreditadoPorApellidoPapel = trim($_POST['acreditadoPorApellidoPapel']);
$acreditadoPorApellidoSinab = trim($_POST['acreditadoPorApellidoSinab']);
$acreditadoPorApellidoEmp = trim($_POST['acreditadoPorApellidoEmp']);
$resulDigiAcreditadoPorApellido = trim($_POST['resultadoDigiAcreditadoPorApellido']);
$notaPapel = trim($_POST['notaPapel']);
$notaSinab = trim($_POST['notaSinab']);
$notaEmp = trim($_POST['notaEmp']);
$resulDigiNota = trim($_POST['resultadoDigiNota']);
$deficitApoyoFamiliarPapel = trim($_POST['deficitApoyoFamiliarPapel']);
$deficitApoyoFamiliarSinab = trim($_POST['deficitApoyoFamiliarSinab']);
$deficitApoyoFamiliarEmp = trim($_POST['deficitApoyoFamiliarEmp']);
$resulDigiDeficitApoyoFamiliar = trim($_POST['resultadoDigiDeficitApoyoFamiliar']);
$discapacidadPapel = trim($_POST['discapacidadPapel']);
$discapacidadSinab = trim($_POST['discapacidadSinab']);
$discapacidadEmp = trim($_POST['discapacidadEmp']);
$resulDigiDiscapacidad = trim($_POST['resultadoDigiDiscapacidad']);
$duplicidadFuncionesAlumnoPapel = trim($_POST['duplicidadFuncionesAlumnoPapel']);
$duplicidadFuncionesAlumnoSinab = trim($_POST['duplicidadFuncionesAlumnoSinab']);
$duplicidadFuncionesAlumnoEmp = trim($_POST['duplicidadFuncionesAlumnoEmp']); #al final sp
$resulDigiDuplicidadFuncionesAlumno = trim($_POST['resultadoDigiDuplicidadFuncionesAlumno']);
$hermanosHijosEstudiantesPapel = trim($_POST['hermanosHijosEstudiantesPapel']);
$hermanosHijosEstudiantesSinab = trim($_POST['hermanosHijosEstudiantesSinab']);
$hermanosHijosEstudiantesEmp = trim($_POST['hermanosHijosEstudiantesEmp']); #al final sp
$resulDigiHermanosHijosEstudiantes = trim($_POST['resultadoDigiHermanosHijosEstudiantes']);
$participaPadreMadreRepresentanteEnOrgIndigenaPapel = trim($_POST['participaPadreMadreRepresentanteLegalEnOrgIndigenaPapel']);
$participaPadreMadreRepresentanteEnOrgIndigenaSinab = trim($_POST['participaPadreMadreRepresentanteLegalEnOrgIndigenaSinab']);
$participaPadreMadreRepresentanteEnOrgIndigenaEmp = trim($_POST['participaPadreMadreRepresentanteLegalEnOrgIndigenaEmp']);
$resulDigiParticipacionOrgIndigena = trim($_POST['resultadoDigiParticipacionOrgIndigena']);
if( isset($_POST['certificadoParticipacionOrgIndigena']) ){
    $certificadoParticipacionOrgIndigena = trim($_POST['certificadoParticipacionOrgIndigena']);  #DOC
}else{
    $certificadoParticipacionOrgIndigena = 'INCOMPLETO';
}    
$seDomiciliaViveEnComunidadIndigenaPapel = trim($_POST['seDomiciliaViveEnComunidadIndigenaPapel']);
$seDomiciliaViveEnComunidadIndigenaSinab = trim($_POST['seDomiciliaViveEnComunidadIndigenaSinab']);
$seDomiciliaViveEnComunidadIndigenaEmp = trim($_POST['seDomiciliaViveEnComunidadIndigenaEmp']);
$resulDigiSeDomiciliaViveEnComunidadIndigena = trim($_POST['resultadoDigiSeDomiciliaViveEnComunidadIndigena']);
if( isset($_POST['certificadoSeDomiciliaViveEnComunidadIndigena']) ){
    $certificadoSeDomiciliaViveEnComunidadIndigena = trim($_POST['certificadoSeDomiciliaViveEnComunidadIndigena']); #DOC
}else{
    $certificadoSeDomiciliaViveEnComunidadIndigena = 'INCOMPLETO';
}
$participaDePracticasCulturalesRitualesDeLaComunidadPapel = trim($_POST['participaDePracticasCulturalesRitualesDeLaComunidadPapel']);
$participaDePracticasCulturalesRitualesDeLaComunidadSinab = trim($_POST['participaDePracticasCulturalesRitualesDeLaComunidadSinab']);
$participaDePracticasCulturalesRitualesDeLaComunidadEmp = trim($_POST['participaDePracticasCulturalesRitualesDeLaComunidadEmp']);
$resulDigiParticipaDePracticasCulturalesRitualesDeLaComunidad = trim($_POST['resultadoDigiParticipaDePracticasCulturalesRitualesDeLaComunidad']);

if( isset($_POST['certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad']) ){
    $certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad = trim($_POST['certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad']); #DOC    
}else{
    $certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad = 'INCOMPLETO'; 
}
if( isset($_POST['certificadoEmbarazo']) ){
    $certificadoEmbarazo = trim($_POST['certificadoEmbarazo']); #DOC
}else{
    $certificadoEmbarazo = 'INCOMPLETO';
}

$query = "CALL BI_BM_InsertarDatos(".$idRevisor.", '".$estadoRevision."', '".$codEstadoRevision."', '".$rutAlumno."', "
       . "'".$dvAlumno."', '".$resulRutAlumno."', '".$obsRutAlumno."', '".$nombreAlumno."', '".$resulNombreAlumno."', '".$obsNombreAlumno."', "
       . "'".$domicilioAlumno."', '".$tipoBecaAlumno."', '".$nivelEducacional."', '".$provinciaFamiliarAlumno."', '".$comunaFamiliarAlumno."', "
       . "'".$profesionalQEvaluo."', '".$tipoUnidadOperativa."', '".$institucionEvaluadora."', '".$cursoBasicaMediaPapel."', '".$cursoBasicaMediaSinab."', "
       . "'".$cursoBasicaMediaEmp."', '".$resulEduBasicaMedia."', '".$rbd."', '".$puebloIndigenaPapel."', '".$puebloIndigenaSinab."', '".$puebloIndigenaEmp."', "
       . "'".$resulDigiPuebloIndigena."', '".$certificadoConadiAlumno."', '".$notaPapel."', '".$notaSinab."', '".$notaEmp."', '".$resulDigiNota."', "
       . "'".$deficitApoyoFamiliarPapel."', '".$deficitApoyoFamiliarSinab."', '".$deficitApoyoFamiliarEmp."', '".$resulDigiDeficitApoyoFamiliar."', "
       . "'".$discapacidadPapel."', '".$discapacidadSinab."', '".$discapacidadEmp."', '".$resulDigiDiscapacidad."', '".$duplicidadFuncionesAlumnoPapel."', "
       . "'".$duplicidadFuncionesAlumnoSinab."', '".$resulDigiDuplicidadFuncionesAlumno."', '".$hermanosHijosEstudiantesPapel."', "
       . "'".$hermanosHijosEstudiantesSinab."', '".$resulDigiHermanosHijosEstudiantes."', '".$participaPadreMadreRepresentanteEnOrgIndigenaPapel."', "
       . "'".$participaPadreMadreRepresentanteEnOrgIndigenaSinab."', '".$participaPadreMadreRepresentanteEnOrgIndigenaEmp."', "
       . "'".$resulDigiParticipacionOrgIndigena."', '".$certificadoParticipacionOrgIndigena."', '".$seDomiciliaViveEnComunidadIndigenaPapel."', "
       . "'".$seDomiciliaViveEnComunidadIndigenaSinab."', '".$seDomiciliaViveEnComunidadIndigenaEmp."', '".$resulDigiSeDomiciliaViveEnComunidadIndigena."', "
       . "'".$certificadoSeDomiciliaViveEnComunidadIndigena."', '".$participaDePracticasCulturalesRitualesDeLaComunidadPapel."', "
       . "'".$participaDePracticasCulturalesRitualesDeLaComunidadSinab."', '".$participaDePracticasCulturalesRitualesDeLaComunidadEmp."', "
       . "'".$resulDigiParticipaDePracticasCulturalesRitualesDeLaComunidad."', '".$certificadoParticipaDePracticasCulturalesRitualesDeLaComunidad."', "
       . "'".$hermanosHijosEstudiantesEmp."', '".$duplicidadFuncionesAlumnoEmp."', '".$certificadoEmbarazo."', '".$regionDeCreacion."', "
       . "'".$acreditadoPorCertificadoConadiPapel."', '".$acreditadoPorCertificadoConadiSinab."', '".$acreditadoPorCertificadoConadiEmp."', "
       . "'".$resulDigiAcreditadoPorCertificadoConadi."', '".$acreditadoPorApellidoPapel."', '".$acreditadoPorApellidoSinab."', '".$acreditadoPorApellidoEmp."', "
       . "'".$resulDigiAcreditadoPorApellido."'"
       . ")";              
$result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));

mysqli_free_result($result);
mysqli_next_result($conexion);
mysqli_close($conexion);
#var_dump($query);
if( $result ){
?>
<script type="text/javascript">
	alert('Revisión guardada correctamente.');
    window.location.href = 'inicio.php';
</script>
<?php
}else{
?>
<script type="text/javascript">
	alert('Error al intentar guardar la Revisión.');
</script>
<?php
}
?>
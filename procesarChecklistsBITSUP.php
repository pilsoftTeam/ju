<?php
require_once 'config.php';
require_once 'funciones.php';
/**
 * Muesta variables x pantalla
 * echo "<h2>Campos de Revisi&oacute;n BRI</h2>\n\n";
 * if( isset($_POST["estadoChecklist"]) ){
 * foreach($_POST as $clave=>$valor ){
 * echo "El campo: " . $clave . " contiene: " . $valor . "\n";
 * echo "</br>";
 * }
 * }
 **/
$idRevisor = '1';#En producción $idRevisor será = a $_SESSION['userid'];

if (isset($_POST['estadoChecklist']) && $_POST['estadoChecklist'] != '') {


//*** IMPORTA VARS $_POST AL SCRIPT ***//
extract($_POST, EXTR_PREFIX_ALL, "bitsup"); #PREFIX será abrev. según beca


//*** LUEGO DE IMPORTAR SE TRATAN LAS VARS QUE LO NECESITAN ***//
list($rutAlumno, $dvAlumno) = explode('-', $bitsup_rutAlumno);


//*** OBSERVACIONES ***//
if (empty($bitsup_certificadoRecidDomiFamiAcredComunaLocalidad)) {
    $bitsup_certificadoRecidDomiFamiAcredComunaLocalidad = 'INCOMPLETO';
}

$arr = get_defined_vars();
?>
    <pre>
        <?php
        foreach ($arr as $a) {
            print_r($a);
        }
        ?>
</pre>
<?php


}



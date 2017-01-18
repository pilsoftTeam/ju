<?php
//Queda a tu criterio renombrar este archivo jonathan!

//Le decimos a el script que el encoding de nuestro resultado
// debera ser utf8 y el tipo de contenido es json.
header('Content-Type: application/json; charset="utf-8"');
require 'config.php';

//GETS;
$rut = $_GET['rut'];
$beca = $_GET['beca'];
//Nombre tabla. Las tablas deberian seguir este patron de nombre
//x_sup_datos_captura_checklists donde x es el nombre de la beca.
//se cambia el nombre de la beca a minusculas

$nombreTabla = strtolower($beca) . '_sup_datos_captura_checklists';

//Query. El preg replace es para sacar las comillas que vienen en el rut. Se puede cambiar a otra variable si quieres


$sql = "SELECT * FROM " . $nombreTabla . " WHERE " . $nombreTabla . ".rutAlumno = '" . preg_replace('/(^[\"\']|[\"\']$)/', '', $rut) . "'";

$result = mysqli_query($conexion, $sql) or die("Error : " . mysqli_error($conexion));

if ($result->num_rows == 0) {
    return false;
} else {
    $rows = [];
    while ($row = $result->fetch_assoc()) {
        $rows[] = array_map('utf8_encode', $row);
    }
    //salida a json para el script ajax
    echo json_encode($rows);

}



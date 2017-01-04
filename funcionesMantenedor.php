<?php
require_once 'config.php';

function agregarDirector($nombre, $apellido, $telefono, $correo, $region, $conexion1){
	$query = "INSERT INTO directores_regionales(nombre_director, apellido_director, telefono, correo, region) "
			."VALUES ('".$nombre."', '".$apellido."', '".$telefono."', '".$correo."', '".$region."')";
	mysql_query($query,$conexion1) or die("Error: ".mysql_error($conexion1));
	//mysql_close($conexion1);
}

function eliminarDirector($id, $conexion2){
	$query = "DELETE FROM directores_regionales WHERE id = ".$id;
	mysql_query($query,$conexion2);
	//mysql_close($conexion2);
}

function actualizarDirector($id, $nombre, $apellido, $telefono, $correo, $region, $conexion3){
	$query = "UPDATE directores_regionales SET nombre_director='".$nombre."', apellido_director='".$apellido."', "
			."telefono ='".$telefono."', correo='".$correo."', region=		'".$region."' WHERE id=".$id;
	mysql_query($query,$conexion3);
	//mysql_close($conexion3);
}


?>
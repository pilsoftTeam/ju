<?php

function conectarBD(){
	$host="localhost";
	$port=3306;
	$socket="";
	$user="root";
	$password="";
	$dbname="pilsof5_revision_becas_junaeb";

	$conexion = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Error de conexi�n: '.mysqli_connect_error());

	return $conexion;
}
?>
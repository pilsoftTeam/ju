<?php

function conectarBD(){
	$host="localhost";
	$port=3306;
	$socket="";
	$user="fya_junaeb";
	$password="junaeb2016";
	$dbname="fya_pae_junaeb";   

	$conexion = new mysqli($host, $user, $password, $dbname, $port, $socket)
	or die ('Error de conexión: '.mysqli_connect_error());

	return $conexion;
}
?>
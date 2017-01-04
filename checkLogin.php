<?php
require_once 'config.php';
//check if form is submitted

if(isset($_POST['login']))
{
    $inicio = "SELECT idusuario FROM usuarios";
    $res = mysqli_query($conexion, $inicio) or die(mysqli_error());
    $rows = mysqli_num_rows($res);  

    if( $rows == 0 )
    {
        $pass = "fortunato";
        $sal  = "admin";
        $firtPass = hash("sha1", $pass.$sal);  

        $crearAdmin = "INSERT INTO usuarios (nombre, apellidos, perfil, usuario, contrasena, region, estado) ";
        $crearAdmin.= "VALUES ('Admin', 'Sistema', 'Administrador', 'admin', '".$firtPass."', '0', '1')";         
        mysqli_query($conexion, $crearAdmin) or die(mysqli_error());
    }

	//check if every field is entered
	if(!$_POST['username'] || !$_POST['password'])
	{
		header("location:index.php?err=1");
        exit();
	}
	else
	{
		//check if username and pass exists in db
		$username = stripslashes($_POST['username']);
		$password = stripslashes($_POST['password']);

        // ...To protect MySQL injection
        $username = mysqli_real_escape_string($conexion, $username);
        $password = mysqli_real_escape_string($conexion, $password);

        // encrypt password
        $enc_password = hash("sha1", $password.$username);

        $query = "SELECT idusuario, usuario, nombre, apellidos, perfil, region FROM usuarios WHERE usuario='".$username."' AND contrasena='".$enc_password."' AND estado='1' LIMIT 1";
		$resource = mysqli_query($conexion, $query);
        $usuario = mysqli_fetch_array($resource);
		$count = mysqli_num_rows($resource);

        if( $count == 1 )
		{	
			//if yes, start session and set a variable
			#session_start(); ya viene desde config.php
			$_SESSION['logged_in'] = 1;
            $_SESSION['userid']    = $usuario['idusuario'];
            $_SESSION['username']  = $usuario['usuario'];
            $_SESSION['nombre']    = $usuario['nombre'];
            $_SESSION['apellidos'] = $usuario['apellidos'];
            $_SESSION['userregion'] = $usuario['region'];
            $_SESSION['fullname']  = $_SESSION['nombre'].' '.$_SESSION['apellidos'];
            $_SESSION['perfil'] = $usuario['perfil'];
            
            $insertSql = "INSERT INTO historial_acceso_usuarios(idUsuario, ipUsuario) VALUES(".$_SESSION['userid'].", '".$_SERVER['REMOTE_ADDR']."')";
            mysqli_query($conexion, $insertSql);            
            //echo strlen($_SERVER['HTTP_USER_AGENT']).'<br>';            
            
            //header("location:inicio.php");         
             if( $usuario['perfil'] == 'Administrador' ){
                 header("location:inicio.php");
             }elseif( $usuario['perfil'] == 'Junaeb' ){
                 header("location:inicio.php");
             }elseif( $usuario['perfil'] == 'Jefe Proyecto' ){
                 header("location:inicio.php");                            
             }elseif( $usuario['perfil'] == 'Supervisor' ){
                 header("location:etapaAsignarRevisores.php");
             }elseif( $usuario['perfil'] == 'Revisor' ){
                 header("location:etapaInspeccionPae.php");
             }             
		}
		else
		{
			//if not, redirect back to login page showing an error
			header("location:index.php?err=2");
		}
	}
}
?>
<?php
require_once 'config.php';
$ftp_server = "186.10.68.210";
$ftp_user = "junaeb";
$ftp_pass = "fortunato2016";
$conn_id = ftp_connect($ftp_server) or die("No se pudo conectar a $ftp_server"); 
$login_result = ftp_login($conn_id, $ftp_user, $ftp_pass);
$tipoBeca= $_POST['beca']; // viene desde formulario
$idDoc = $_POST['idDoc'];
$rut=$_POST['rutPostulante']; // viene desde formulario
$tipo_doc=$_POST['nombreCorto']; // viene desde formulario
if(isset($_POST["guardar"])){
	$dir_subida = "./archivos_checklist/".$rut;
	$archivo=$_FILES['archivo']['name'];
	$peso_archivo=$_FILES['archivo']['tmp_name'];
	$peso_archivo = round(((filesize($peso_archivo))/1024)/1024,2); 
	$ext = pathinfo($archivo, PATHINFO_EXTENSION);
	if($peso_archivo>=6){
		echo "<script>";
		echo "alert('El archivo ingresado, no puede superar los 6 Megabyte. El peso actual del archivo es de ".$peso_archivo." Megabyte');";
        echo "window.location.href='CargaDocsBecas.php?registro=&rutPostulante=".$rut."&beca=".$tipoBeca."';";
		echo "</script>";
	}else{
		if(is_dir($dir_subida)){
			if($_FILES['archivo']['name']!=""){
				//mkdir($dir_subida, 0700);
				$fichero_subido = $dir_subida."/".$tipo_doc."_".$rut.".".$ext;
				if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
					ftp_chdir($conn_id, "Documentos_Junaeb");
					ftp_chdir($conn_id, $rut);
					ftp_put($conn_id, $tipo_doc."_".$rut.".".$ext, $fichero_subido, FTP_BINARY);
					unlink($fichero_subido);                    
					$consulta = "CALL Consultar_Insertar_Documentos('".$rut."', '".$idDoc."')";
					$result = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion)); 
					$cantidad = mysqli_num_rows($result);
					if($cantidad==0){
						mysqli_free_result($result);
						mysqli_next_result($conexion);
						$sql = "CALL Insertar_Documentos('".$rut."', '".$idDoc."')";
						$result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
						//mysqli_free_result($result);
					}else{
						mysqli_free_result($result);
						mysqli_next_result($conexion);
						$sql = "CALL Actualizar_Insertar_Documentos('".$rut."', '".$idDoc."')";
						$result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
						//mysqli_free_result($result);
					}
					mysqli_close($conexion);
					echo "<script>";
					echo "alert('Archivo Subido Correctamente.');";
                    echo "window.location.href='CargaDocsBecas.php?registro=&rutPostulante=".$rut."&beca=".$tipoBeca."';";
					echo "</script>";
				}
			}else{
				echo "<script>";
				echo "alert('Ingrese Archivo a Subir.');";
                echo "window.location.href='CargaDocsBecas.php?registro=&rutPostulante=".$rut."&beca=".$tipoBeca."';";
				echo "</script>";
			}
		}else{
			if($_FILES['archivo']['name']!=""){
				mkdir($dir_subida, 0700);
				$fichero_subido = $dir_subida."/".$tipo_doc."_".$rut.".".$ext;
				if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
					ftp_chdir($conn_id, "Documentos_Junaeb");
					if (ftp_mkdir($conn_id, $rut)) {
						ftp_chdir($conn_id, $rut);
						ftp_put($conn_id, $tipo_doc."_".$rut.".".$ext, $fichero_subido, FTP_BINARY);
						unlink($fichero_subido);
					}else{
						echo "Ha habido un problema durante la creaci¨®n de $dir\n";
					}
                    			
					$consulta = "CALL Consultar_Insertar_Documentos('".$rut."', '".$idDoc."')";
					$result = mysqli_query($conexion, $consulta) or die(mysqli_error($conexion)); 
					$cantidad = mysqli_num_rows($result);
					if($cantidad==0){	
						mysqli_free_result($result);
						mysqli_next_result($conexion);		
						$sql = "CALL Insertar_Documentos('".$rut."', '".$idDoc."')";
						$result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
					}else{
						mysqli_free_result($result);
						mysqli_next_result($conexion);
						$sql = "CALL Actualizar_Insertar_Documentos('".$rut."', '".$idDoc."')";
						$result = mysqli_query($conexion, $sql) or die(mysqli_error($conexion)); 
						//mysqli_free_result($result);
					}
					mysqli_close($conexion);
					echo "<script>";
					echo "alert('Archivo Subido Correctamente.');";
                    echo "window.location.href='CargaDocsBecas.php?registro=&rutPostulante=".$rut."&beca=".$tipoBeca."';";
					echo "</script>";
				}
			}else{
				echo "<script>";
				echo "alert('Ingrese Archivo a Subir.');";
                echo "window.location.href='CargaDocsBecas.php?registro=&rutPostulante=".$rut."&beca=".$tipoBeca."';";
				echo "</script>";
			}
		}
		ftp_close($conn_id);
	}
}
?>
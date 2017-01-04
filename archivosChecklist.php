<?php
require_once 'config.php';
require_once 'requires/Zebra_Pagination.php';
?>
<!DOCTYPE html>
<html lang="es">
  <head>
  	<title>Archivos Checklist</title>
    <?php include_once 'tagsMeta.php'; ?>
    
    <?php include_once 'tagsCSS.php'; ?>

    <?php include_once 'tagsFixJS.php'; ?>       
</head>
<body>


<div class="container">
<?php require_once 'menuInicio.php'; ?>
<h2 class="text-center well well-sm">:: ASIGNAR ARCHIVOS CHECKLIST ::</h2>
<h4 class="text-center well well-sm">En este módulo, se subirán los archivos de respaldo de cada Checklist.</h4>
<div class="well well-sm">
    <div class="row">
        <div class="col-md-12">
            <form name="formulario" id="formulario" action="#" method="post" enctype="multipart/form-data" class="form-inline">
           		<div class="row">
        			<div class="col-md-2" style="width: 13%;">
                    	Ingrese Nª de Folio:
                    </div>
        			<div class="col-md-3">
                    	<input name="folio" type="text" class="form-control" style="width: 100%;" />
                    </div>                    
                </div>
                <div class="row">
        			<div class="col-md-2" style="width: 12%;">
                    	Ingrese el archivo:
                    </div>
     				<div class="col-md-3">
                    	<input name="archivo" id="archivo" class="btn btn-secundary" type="file" style="width: 100%;" />
                    </div>               
                </div>
                <div class="row">
        			<div class="col-md-12">
                    	<input type="submit" value="Subir" name="button"  class="btn btn-primary" />
                    </div>
                </div>        
            </form>
            <br>
            <?php
            if(isset($_POST["button"])){
                if($_POST["folio"]==""){
                    echo "<script>";
                    echo "alert ('Ingrese Número de Folio.');";
                    echo "</script>";
                }else{
                    $dir_subida = "./archivos_checklist/".$_POST["folio"];
                    
                    if(is_dir($dir_subida)){
                        if($_FILES['archivo']['name']!=""){
                            //mkdir($dir_subida, 0700);
                            $fichero_subido = $dir_subida."/".basename($_FILES['archivo']['name']);
                            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
                                $sql2 = "INSERT INTO archivos_checklist (archivo,ruta_archivo,folio) VALUES ('".basename($_FILES['archivo']['name'])."','".$dir_subida."',".$_POST["folio"].");";
                                $res2 = mysql_query($sql2,$conexion ) or die(mysql_error());
                                echo "<script>";
                                echo "alert ('Archivo Subido Correctamente.');";
                                echo "</script>";
                            }
                        }else{
                            echo "<script>";
                            echo "alert ('Ingrese Archivo a Subir.');";
                            echo "</script>";
                        }
                    }else{
                        if($_FILES['archivo']['name']!=""){
                            mkdir($dir_subida, 0700);
                            $fichero_subido = $dir_subida."/".basename($_FILES['archivo']['name']);
                            if (move_uploaded_file($_FILES['archivo']['tmp_name'], $fichero_subido)) {
                                $sql2 = "INSERT INTO archivos_checklist (archivo,ruta_archivo,folio) VALUES ('".basename($_FILES['archivo']['name'])."','".$dir_subida."',".$_POST["folio"].");";
                                $res2 = mysql_query($sql2,$conexion ) or die(mysql_error());
                                echo "<script>";
                                echo "alert ('Archivo Subido Correctamente.');";
                                echo "</script>";
                            }
                        }else{
                            echo "<script>";
                            echo "alert ('Ingrese Archivo a Subir.');";
                            echo "</script>";
                        }
                    }
                }
            }
            ?>
            <table class="table table-striped table-hover table-condensed table-bordered" style="width: 50%;" align="center">
                <thead>
                    <tr>
                        <th>Folio</th>
                        <th>Archivo</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $sql1 = "SELECT * FROM archivos_checklist";
                    $res1 = mysql_query($sql1, $conexion);
                    while($fila = mysql_fetch_array($res1)){
                        echo "<tr>";
                        echo "<td style='text-align:center'>".$fila['folio']."</td>";
                        echo "<td style='text-align:center'><a href='".$fila['ruta_archivo']."/".$fila['archivo']."'>".$fila['archivo']."</a></td>";
                        echo "<td style='text-align:center'>".date("d-m-Y H:i:s", strtotime($fila['control_interno']) )."</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
		</div>
	</div>
</div>
</div>           
<?php include_once 'tagsJS.php'; ?>   
</body>
</html>
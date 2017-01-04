<!-- Static navbar -->
      <!-- <nav class="navbar navbar-default navbar-inverse" role="navigation"> -->
      <nav class="navbar navbar-default" role="navigation"> <!-- menú pegado al techo añadir a class navbar-fixed-top -->
          <div class="navbar-header">
            <a href="#" class="navbar-brand">:: <?php if(isset($_SESSION['fullname'])){ echo $_SESSION['fullname']; } ?></a>

          <button class="navbar-toggle" data-toggle="collapse" data-target=".navHeaderCollapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>            
          </div>      
          
          <div class="collapse navbar-collapse navHeaderCollapse" id="navbar">
            <ul class="nav navbar-nav">
              <!-- Inicio -->
              <li class="active"><a href="inicio.php" class="btn btn-default" role="button">Inicio</a></li>
              <!-- /Inicio -->
              <!-- Reportes -->
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" title="PARA VER REPORTES DE EJ. USAR RANGO DE FECHA 25-10-2016 AL 25-10-2016"><u>Reportes Junaeb</u> <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">                    
                    <li class="dropdown-header">Datos de Acceso a Reportes Demo</li>
                    <li class="text-muted text-center"><small><em>User: junaeb | Pass: junaeb2016</em></small></li>
                    <li class="divider"></li>
                    <!-- <li class="dropdown-header">Reportes</li> -->
                    <li><a href="http://186.10.68.210:8080/pentaho/api/repos/%3Apublic%3Atest.prpt/viewer" target="_blank" title="PARA VER REPORTES DE EJ. USAR RANGO DE FECHA 25-10-2016 AL 25-10-2016">Reporte BIBM</a></li>
                    <li><a href="http://186.10.68.210:8080/pentaho/api/repos/%3Apublic%3Atrazabilidad.prpt/viewer" target="_blank" title="PARA VER REPORTES DE EJ. USAR RANGO DE FECHA 25-10-2016 AL 25-10-2016">Estado de Avance BIBM</a></li>
                    <li><a href="http://186.10.68.210:8080/pentaho/api/repos/%3Apublic%3ASubreporteA2.prpt/viewer" target="_blank" title="">Resumen Incorrectos BIBM</a></li>
                    <li class="divider"></li>
                    <li><a href="controlCarpetasRecibidas.php">Control Carpetas Recibidas</a></li>
                    <li class="divider"></li>
                    <li><a href="logAccesoUsuarios.php">Historial Acceso Usuarios</a></li>
                  </ul>
              </li> 
              <!-- /Reportes -->
                           
              <!-- Informes -->
<!--
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Otros <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">                    
                    <li><a href="#">Reporte</a></li>
                  </ul>
              </li>
-->
              <!-- /Informes --> 
              
              <!-- Control Gestión Documental -->
              <li><a href="rutPostulanteGestionDocs.php" role="button">Registro Gesti&oacute;n Docs</a></li>                                         
              <li><a href="rutPostulanteCargaDocs.php" role="button">Carga de Documentos</a></li>
            </ul>
                              
            <ul class="nav navbar-nav navbar-right">      
              <li class="">
		          <a href="https://sinab.junaeb.cl" target="_blank">Sinab</a>                  
              </li>
              <li class="active">
                <a href="Manual_de_Uso_Sistema_Junaeb.pdf" target="_blank">Manual</a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Mantenedores <span class="caret"></span></a>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="usuarios.php">Cuentas Usuarios</a></li>                    
                    <!-- <li><a href="funcionarios.php">Funcionarios</a></li> -->                  
                  </ul>
              </li>
              <li class=""><a href="logout.php?logout" class="btn btn-default btn-sm" role="button">Cerrar Sesi&oacute;n</a></li>
            </ul>            
          </div><!--/.nav-collapse -->
      </nav>
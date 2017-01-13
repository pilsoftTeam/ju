
                <!-- ANTECEDENTES DEL POSTULANTE -->               
                <div id="verAntecedentes" class="dimension" style="display: none;">
                <h3 id="antecedentes"><strong>ANTECEDENTES DEL POSTULANTE</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>                
                </h3>                                
                <!-- IES -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4">
                                <h4><strong>Institici&oacute;n de Educaci&oacute;n Superior</strong><span class="text-warning"> [Lista BD]</span></h4>
                            </td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="institucionEduSupPapel" id="institucionEduSupPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="IES...">IES...</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="institucionEduSupSinab"><b>IES...<?php //echo  ?></b></span>
                                <input type="hidden" name="institucionEduSupSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="institucionEduSupEmp" id="institucionEduSupEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="IES...">IES...</option>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiInstitucionEduSup" class="label"></span>
                                <input type="hidden" name="resultadoDigiInstitucionEduSup" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiInstitucionEduSup', $tipoBeca) ?>

                <!-- Carrera (nombre) -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Carrera (nombre)</strong><span class="text-warning"> ( *Lista BD [NO usar utf8_ci en Query] )</span></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="nombreCarreraPapel" id="nombreCarreraPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="carreras...">carreras...</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="nombreCarreraSinab"><b>carreras...<?php //echo  ?></b></span>
                                <input type="hidden" name="nombreCarreraSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="nombreCarreraEmp" id="nombreCarreraEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="carreras...">carreras...</option>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiNombreCarrera" class="label"></span>
                                <input type="hidden" name="resultadoDigiNombreCarrera" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiNombreCarrera', $tipoBeca) ?>

                <!-- Año de Ingreso -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Año de Ingreso</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="anioIngresoCarreraPapel" id="anioIngresoCarreraPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="anioIngresoCarreraSinab"><b>2017<?php //echo  ?></b></span>
                                <input type="hidden" name="anioIngresoCarreraSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="anioIngresoCarreraEmp" id="anioIngresoCarreraEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="2008">2008</option>
                                    <option value="2009">2009</option>
                                    <option value="2010">2010</option>
                                    <option value="2011">2011</option>
                                    <option value="2012">2012</option>
                                    <option value="2013">2013</option>
                                    <option value="2014">2014</option>
                                    <option value="2015">2015</option>
                                    <option value="2016">2016</option>
                                    <option value="2017">2017</option>                                    
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAnioIngresoCarrera" class="label"></span>
                                <input type="hidden" name="resultadoDigiAnioIngresoCarrera" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiAnioIngresoCarrera', $tipoBeca) ?>

                <!-- Duración Carrera (En Semestres) -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Duraci&oacute;n Carrera (En Semestres)</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="duracionCarreraPapel" id="duracionCarreraPapel">
                                    <option value="">Seleccione...</option>
                                    <?php for( $i=2; $i<=18; $i++ ){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="duracionCarreraSinab"><b>2<?php //echo  ?></b></span>
                                <input type="hidden" name="duracionCarreraSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="duracionCarreraEmp" id="duracionCarreraEmp">
                                    <option value="">Seleccione...</option>
                                    <?php for( $i=2; $i<=18; $i++ ){ ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php } ?>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiDuracionCarrera" class="label"></span>
                                <input type="hidden" name="resultadoDigiDuracionCarrera" value="" />                            
                            </td>
                        </tr>                        
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiDuracionCarrera', $tipoBeca) ?>

                <!-- Discapacidad -->
                <!-- Falta agregar campo discapacidad a éste SP y quitarlo de SP Fac. de Riesgo -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Discapacidad</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="discapacidadPapel" id="discapacidadPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </td>                           
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="discapacidadSinab"><b><?php #echo $antecedentesPostulante['discapacidad']; ?></b></span>
                                <input type="hidden" name="discapacidadSinab" value="<?php #echo $antecedentesPostulante['discapacidad']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="discapacidadEmp" id="discapacidadEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>                        
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiDiscapacidad" class="label"></span>
                                <input type="hidden" name="resultadoDigiDiscapacidad" value="" />                            
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiDiscapacidad', $tipoBeca) ?>
                                
                <h4 class="alert alert-warning"><strong>ACREDITACI&Oacute;N ASCENDENCIA IND&Iacute;GENA</strong></h4>

                <!-- Dato(s) pasado(s) como oculto(s) -->
                <input type="hidden" name="rbd" value="<?php echo $antecedentesPostulante['rbd']; ?>" />
                                
                <!-- Pueblo Indígena -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Pueblo Ind&iacute;gena</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="puebloIndigenaPapel" id="puebloIndigenaPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="Atacameño">Atacame&ntilde;o</option>
                                    <option value="Aymara">Aymara</option>
                                    <option value="Diaguita">Diaguita</option>
                                    <option value="Kawhaskar">Kawhaskar</option>
                                    <option value="Mapuche">Mapuche</option>
                                    <option value="Colla">Colla</option>
                                    <option value="Quechua">Quechua</option>
                                    <option value="Rapa Nui">Rapa Nui</option>
                                    <option value="Yagan">Yagan</option>
                                    <option value="No Aplica">No Aplica</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="puebloIndigenaSinab"><b><?php echo $antecedentesPostulante['etnia_bi']; ?></b></span>
                                <input type="hidden" name="puebloIndigenaSinab" value="<?php echo $antecedentesPostulante['etnia_bi']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="puebloIndigenaEmp" id="puebloIndigenaEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="Atacameño">Atacame&ntilde;o</option>
                                    <option value="Aymara">Aymara</option>
                                    <option value="Diaguita">Diaguita</option>
                                    <option value="Kawhaskar">Kawhaskar</option>
                                    <option value="Mapuche">Mapuche</option>
                                    <option value="Colla">Colla</option>
                                    <option value="Quechua">Quechua</option>
                                    <option value="Rapa Nui">Rapa Nui</option>
                                    <option value="Yagan">Yagan</option>
                                    <option value="No Aplica">No Aplica</option>                                                               
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiPuebloIndigena" class="label"></span>
                                <input type="hidden" name="resultadoDigiPuebloIndigena" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiPuebloIndigena', $tipoBeca) ?>

                <!-- Acreditado x Certificado -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Acreditado por Certificado (N&deg;)</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <input type="number" name="acreditadoPorCertificadoConadiPapel" id="acreditadoPorCertificadoConadiPapel" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8" />
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="acreditadoPorCertificadoConadiSinab"><b><?php echo $antecedentesPostulante['certificado_conadi']; ?></b></span>
                                <input type="hidden" name="acreditadoPorCertificadoConadiSinab" value="<?php echo $antecedentesPostulante['certificado_conadi']; ?>" />                            
                            </td>
                            <td>
                                <input type="number" name="acreditadoPorCertificadoConadiEmp" id="acreditadoPorCertificadoConadiEmp" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8" />
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAcreditadoPorCertificadoConadi" class="label"></span>
                                <input type="hidden" name="resultadoDigiAcreditadoPorCertificadoConadi" value="" />                            
                            </td>
                        </tr>
                        <!-- Sólo Aplica para BRI y las BI -->
                        <?php if( $tipoBeca == 'BRI' || $tipoBeca == 'BISUP' ){
                            mysqli_free_result($result);
                            mysqli_next_result($conexion);
                            $query = "CALL verificaDatosPrecargados('$tipoBeca', $rutPostulante)";
                            $result = mysqli_query($conexion, $query) or die(mysqli_error($conexion));
                            $datosPrecarga = mysqli_fetch_assoc($result);                            
                        ?>
                        <tr>                        
                            <td colspan="3" class="text-right text-primary" style="background-color: yellow;">
                                <span><b><em>&iquest; N&deg; de certificado CONADI se encuentra &quot;precargado&quot; en Sinab ?</em></b></span>
                            </td>
                            <td class="text-center">
                                <?php if( is_numeric($datosPrecarga['certificado_conadi']) ){?>
                                <!-- <img src="images/ok.png" title="<?php echo $datosPrecarga['certificado_conadi']; ?>" /> -->
                                <span class="label label-success"><?php echo 'N&deg; '.$datosPrecarga['certificado_conadi']; ?></span>
                                <input type="hidden" name="cerfificadoConadiPrecargado" value="<?php echo $datosPrecarga['certificado_conadi']; ?>" />
                                <?php }else{?>
                                <img src="images/unchecked.gif" />
                                <input type="hidden" name="cerfificadoConadiPrecargado" value="NO" />
                                <?php }?>
                            </td>
                        </tr>
                        <?php } ?>
                        <!-- /cerfificadoConadiPrecargado -->
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiAcreditadoPorCertificadoConadi', $tipoBeca) ?>
                
                <!-- Acreditado x Apellido -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Acreditado por Apellido</strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="acreditadoPorApellidoPapel" id="acreditadoPorApellidoPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="acreditadoPorApellidoSinab"><b><?php echo $antecedentesPostulante['acreditacion_por_apellidos']; ?></b></span>
                                <input type="hidden" name="acreditadoPorApellidoSinab" value="<?php echo $antecedentesPostulante['acreditacion_por_apellidos']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="acreditadoPorApellidoEmp" id="acreditadoPorApellidoEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>                                                               
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAcreditadoPorApellido" class="label"></span>
                                <input type="hidden" name="resultadoDigiAcreditadoPorApellido" value="" />                            
                            </td>
                        </tr>
                        <!-- Sólo Aplica para BRI y las BI -->
                        <?php if( $tipoBeca == 'BRI' || $tipoBeca == 'BISUP' ){ ?>
                        <tr>
                            <td colspan="3" class="text-right text-primary" style="background-color: yellow;">
                                <span><b><em>&iquest; Estudiante cuenta con apellido ind&iacute;gena &quot;directo&quot; en Sinab ?</em></b></span>
                            </td>
                            <td class="text-center">
                                <?php if( $datosPrecarga['acreditacion_por_apellidos']=='SI' ){?>
                                <img src="images/ok.png" />
                                <input type="hidden" name="apellidoIndigenaDirecto" value="SI" />
                                <?php }else{?>
                                <img src="images/unchecked.gif" />
                                <input type="hidden" name="apellidoIndigenaDirecto" value="NO" />
                                <?php }?>
                            </td>
                        </tr>
                        <?php }?>
                        <!-- /apellidoIndigenaDirecto -->                        
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiAcreditadoPorApellido', $tipoBeca) ?>

                <h4 class="alert alert-warning"><strong>COMUNA DE DOMICILIO</strong></h4>

                <!-- Región Domicilio Familiar - SÓLO BRI -->
                <?php if( $tipoBeca == 'BRI' ){ ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Regi&oacute;n Domicilio <em>Familiar</em></strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="regionDomicilioFamiliarPapel" id="regionDomicilioFamiliarPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                            <!-- Se debe llamar a la región del domicilio familiar en SP -->
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="regionDomicilioFamiliarSinab"><b>1<?php #echo $antecedentesPostulante['']; ?></b></span>
                                <input type="hidden" name="regionDomicilioFamiliarSinab" value="<?php #echo $antecedentesPostulante['']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="regionDomicilioFamiliarEmp" id="regionDomicilioFamiliarEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>                                                            
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoRegionDomicilioFamiliar" class="label"></span>
                                <input type="hidden" name="resultadoRegionDomicilioFamiliar" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('RegionDomicilioFamiliar', $tipoBeca) ?>
                <?php } ?>
                
                <!-- Comuna Domicilio Familiar -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Comuna Domicilio <em>Familiar</em></strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="comuDomicilioFamiliarPapel" id="comuDomicilioFamiliarPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="comuDomicilioFamiliarSinab"><b>1<?php #echo $antecedentesPostulante['']; ?></b></span>
                                <input type="hidden" name="comuDomicilioFamiliarSinab" value="<?php #echo $antecedentesPostulante['']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="comuDomicilioFamiliarEmp" id="comuDomicilioFamiliarEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>                                                            
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoComuDomicilioFamiliar" class="label"></span>
                                <input type="hidden" name="resultadoComuDomicilioFamiliar" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('ComuDomicilioFamiliar', $tipoBeca) ?>

                <!-- Comuna Domicilio Estudios -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Comuna Domicilio <em>Estudios</em></strong></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="comuDomicilioEstudiosPapel" id="comuDomicilioEstudiosPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="comuDomicilioEstudiosSinab"><b>1<?php #echo $antecedentesPostulante[''];?></b></span>
                                <input type="hidden" name="comuDomicilioEstudiosSinab" value="<?php #echo $antecedentesPostulante['']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="comuDomicilioEstudiosEmp" id="comuDomicilioEstudiosEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="1">1</option>                                                            
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoComuDomicilioEstudios" class="label"></span>
                                <input type="hidden" name="resultadoComuDomicilioEstudios" value="" />                            
                            </td>
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('ComuDomicilioEstudios', $tipoBeca) ?>
            </div>
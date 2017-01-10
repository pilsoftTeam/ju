
                <!-- ANTECEDENTES DEL POSTULANTE -->
                <div id="verAntecedentes" class="dimension" style="display: none;">
                    <h3 id="antecedentes"><strong>ANTECEDENTES DEL POSTULANTE</strong>
                        <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>
                    </h3>
                    <!-- Nombre Establecimiento -->               
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <td colspan="4">
                                    <h4><strong>Establecimiento Educacional</strong><span class="text-warning"> [Lista BD]</span></h4>
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
                                    <select class="form-control" name="nombreEstEducacionalPapel" id="nombreEstEducacionalPapel">
                                        <option value="">Seleccione...</option>
                                        <option value="Establecimiento">Establecimiento</option>
                                    </select>
                                </td>
                                <td class="text-center bg-info" style="vertical-align: middle;">
                                    <span id="nombreEstEducacionalSinab"><b>Establecimiento<?php //echo  ?></b></span>
                                    <input type="hidden" name="nombreEstEducacionalSinab" value="<?php //echo  ?>" />                            
                                </td>
                                <td>
                                    <select class="form-control" name="nombreEstEducacionalEmp" id="nombreEstEducacionalEmp">
                                        <option value="">Seleccione...</option>
                                        <option value="Establecimiento">Establecimiento</option>
                                    </select>                            
                                </td>
                                <td class="valor-resultado text-center" style="vertical-align: middle;">
                                    <span id="resultadoDigiNombreEstEducacional" class="label"></span>
                                    <input type="hidden" name="resultadoDigiNombreEstEducacional" value="" />                            
                                </td>
                            </tr>                        
                        </table>
                    </div>
                    
                    <?php crearSelectObservaciones('DigiNombreEstEducacional', $tipoBeca) ?>
                                    
                    <!-- Curso -->
                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed">
                            <tr>
                                <td colspan="4">
                                    <h4><strong>Curso del Estudiante de Ense&ntilde;anza B&aacute;sica y Media</strong></h4>
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
                                    <select class="form-control" name="cursoBasicaMediaPapel" id="cursoBasicaMediaPapel">
                                        <option value="">Seleccione...</option>
                                        <option value="Quinto Básico">Quinto Básico</option>
                                        <option value="Sexto Básico">Sexto Básico</option>
                                        <option value="Séptimo Básico">Séptimo Básico</option>
                                        <option value="Octavo Básico">Octavo Básico</option>
                                        <option value="Séptimo y Octavo Básico">Séptimo y Octavo Básico</option>
                                        <option value="Primero Medio">Primero Medio</option>
                                        <option value="Segundo Medio">Segundo Medio</option>
                                        <option value="Primero y Segundo Medio">Primero y Segundo Medio</option>
                                        <option value="Tercero Medio">Tercero Medio</option>
                                        <option value="Cuarto Medio">Cuarto Medio</option>
                                        <option value="Tercero y Cuarto Medio">Tercero y Cuarto Medio</option>
                                    </select>
                                </td>
                                <td class="text-center bg-info" style="vertical-align: middle;">
                                    <span id="cursoBasicaMediaSinab"><b><?php echo $datosGrales['curso']; ?></b></span>
                                    <input type="hidden" name="cursoBasicaMediaSinab" value="<?php echo $datosGrales['curso']; ?>"/>
                                </td>
                                <td>
                                    <select class="form-control" name="cursoBasicaMediaEmp" id="cursoBasicaMediaEmp">
                                        <option value="">Seleccione...</option>
                                        <option value="Quinto Básico">Quinto Básico</option>
                                        <option value="Sexto Básico">Sexto Básico</option>
                                        <option value="Séptimo Básico">Séptimo Básico</option>
                                        <option value="Octavo Básico">Octavo Básico</option>
                                        <option value="Séptimo y Octavo Básico">Séptimo y Octavo Básico</option>
                                        <option value="Primero Medio">Primero Medio</option>
                                        <option value="Segundo Medio">Segundo Medio</option>
                                        <option value="Primero y Segundo Medio">Primero y Segundo Medio</option>
                                        <option value="Tercero Medio">Tercero Medio</option>
                                        <option value="Cuarto Medio">Cuarto Medio</option>
                                        <option value="Tercero y Cuarto Medio">Tercero y Cuarto Medio</option>
                                    </select>
                                </td>
                                <td class="valor-resultado text-center" style="vertical-align: middle;">
                                    <span id="resultadoEduBasicaMedia" class="label"></span>
                                    <input type="hidden" name="resultadoEduBasicaMedia" value=""/>
                                </td>
                            </tr>
                        </table>
                    </div>
                    
                    <?php crearSelectObservaciones('EduBasicaMedia', $tipoBeca) ?>

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
                                    <span id="discapacidadSinab"><b>NO<?php #echo $antecedentesPostulante['discapacidad']; ?></b></span>
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
                    <input type="hidden" name="rbd" value="<?php echo $antecedentesPostulante['rbd']; ?>"/>

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
                                    <input type="hidden" name="puebloIndigenaSinab" value="<?php echo $antecedentesPostulante['etnia_bi']; ?>"/>
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
                                    <input type="hidden" name="resultadoDigiPuebloIndigena" value=""/>
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
                                    <input type="number" name="acreditadoPorCertificadoConadiPapel" id="acreditadoPorCertificadoConadiPapel" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8"/>
                                </td>
                                <td class="text-center bg-info" style="vertical-align: middle;">
                                    <span id="acreditadoPorCertificadoConadiSinab"><b><?php echo $antecedentesPostulante['certificado_conadi']; ?></b></span>
                                    <input type="hidden" name="acreditadoPorCertificadoConadiSinab" value="<?php echo $antecedentesPostulante['certificado_conadi']; ?>"/>
                                </td>
                                <td>
                                    <input type="number" name="acreditadoPorCertificadoConadiEmp" id="acreditadoPorCertificadoConadiEmp" class="form-control" min="0" max="99999999" step="1" required="required" maxlength="8"/>
                                </td>
                                <td class="valor-resultado text-center" style="vertical-align: middle;">
                                    <span id="resultadoDigiAcreditadoPorCertificadoConadi" class="label"></span>
                                    <input type="hidden" name="resultadoDigiAcreditadoPorCertificadoConadi" value=""/>
                                </td>
                            </tr>
                            <!-- Sólo Aplica para BRI y las BI -->
                            <?php if( $tipoBeca == 'BRI' || $tipoBeca == 'BIBM' ){ ?>
                            <tr>                        
                                <td colspan="3" class="text-right text-primary" style="background-color: yellow;">
                                    <span><b><em>&iquest; N&deg; de certificado CONADI se encuentra &quot;precargado&quot; en Sinab ?</em></b></span>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="cerfificadoConadiPrecargado" id="cerfificadoConadiPrecargado" value="SI" />
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
                                    <input type="hidden" name="acreditadoPorApellidoSinab" value="<?php echo $antecedentesPostulante['acreditacion_por_apellidos']; ?>"/>
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
                                    <input type="hidden" name="resultadoDigiAcreditadoPorApellido" value=""/>
                                </td>
                            </tr>
                            <!-- Sólo Aplica para BRI y las BI -->
                            <?php if( $tipoBeca == 'BRI' || $tipoBeca == 'BIBM' ){ ?>
                            <tr>
                                <td colspan="3" class="text-right text-primary" style="background-color: yellow;">
                                    <span><b><em>&iquest; Estudiante cuenta con apellido ind&iacute;gena &quot;directo&quot; en Sinab ?</em></b></span>
                                </td>
                                <td class="text-center">
                                    <input type="checkbox" name="apellidoIndigenaDirecto" id="apellidoIndigenaDirecto" value="SI" />
                                </td>
                            </tr>
                            <?php } ?>
                            <!-- /apellidoIndigenaDirecto -->                            
                        </table>
                    </div>
                    <?php crearSelectObservaciones('DigiAcreditadoPorApellido', $tipoBeca) ?>
                </div>
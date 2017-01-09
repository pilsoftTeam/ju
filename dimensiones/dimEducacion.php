
                <!-- DIM. EDUCACION -->
                <div id="verEducacion" class="dimension" style="display: none;">
                <h3 id="educacion"><strong>DIMENSI&Oacute;N EDUCACI&Oacute;N</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>
                </h3>
                <!-- Duplicidad de Funciones del estudiante -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Duplicidad de funciones del estudiante</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="duplicidadFuncionesAlumnoPapel" id="duplicidadFuncionesAlumnoPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="Sólo Estudia">S&oacute;lo Estudia</option>
                                    <option value="Trabaja">Trabaja</option>
                                    <option value="Es padre">Es padre</option>
                                    <option value="Es Jefe de Hogar">Es Jefe de Hogar</option>
                                    <option value="Embarazada">Embarazada</option>
                                    <option value="Es madre">Es madre</option>                                                                       
                                </select>
                            </td>                            
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="duplicidadFuncionesAlumnoSinab"><b><?php echo $dimEducacion['duplicidad_funciones']; ?></b></span>
                                <input type="hidden" name="duplicidadFuncionesAlumnoSinab" value="<?php echo $dimEducacion['duplicidad_funciones']; ?>" />                             
                            </td>
                            <td>
                                <select class="form-control" name="duplicidadFuncionesAlumnoEmp" id="duplicidadFuncionesAlumnoEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="Sólo Estudia">S&oacute;lo Estudia</option>
                                    <option value="Trabaja">Trabaja</option>
                                    <option value="Es padre">Es padre</option>
                                    <option value="Es Jefe de Hogar">Es Jefe de Hogar</option>
                                    <option value="Embarazada">Embarazada</option>
                                    <option value="Es madre">Es madre</option>         
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiDuplicidadFuncionesAlumno" class="label"></span>
                                <input type="hidden" name="resultadoDigiDuplicidadFuncionesAlumno" value="" />  
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiDuplicidadFuncionesAlumno', $tipoBeca) ?>
                
                <!-- Hermanos o Hijos Estudiantes -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Hermanos o Hijos Estudiantes</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="hermanosHijosEstudiantesPapel" id="hermanosHijosEstudiantesPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="No tiene otros mienbros del grupo familiar estudiando">No tiene otros mienbros del grupo familiar estudiando</option>
                                    <option value="En Enseñanza Pre-básica">En Ense&ntilde;anza Pre-b&aacute;sica</option>
                                    <option value="En Enseñanza Básica">En Ense&ntilde;anza B&aacute;sica</option>
                                    <option value="En Enseñanza Media">En Ense&ntilde;anza Media</option>
                                    <option value="En Enseñanza Superior">En Ense&ntilde;anza Superior</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="hermanosHijosEstudiantesSinab"><b><?php echo $dimEducacion['hermanos_estudiantes']; ?></b></span>
                                <input type="hidden" name="hermanosHijosEstudiantesSinab" value="<?php echo $dimEducacion['hermanos_estudiantes']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="hermanosHijosEstudiantesEmp" id="hermanosHijosEstudiantesEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="No tiene otros mienbros del grupo familiar estudiando">No tiene otros mienbros del grupo familiar estudiando</option>
                                    <option value="En Enseñanza Pre-básica">En Ense&ntilde;anza Pre-b&aacute;sica</option>
                                    <option value="En Enseñanza Básica">En Ense&ntilde;anza B&aacute;sica</option>
                                    <option value="En Enseñanza Media">En Ense&ntilde;anza Media</option>
                                    <option value="En Enseñanza Superior">En Ense&ntilde;anza Superior</option>
                                </select>
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiHermanosHijosEstudiantes" class="label"></span>
                                <input type="hidden" name="resultadoDigiHermanosHijosEstudiantes" value="" />
                            </td>                       
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiHermanosHijosEstudiantes', $tipoBeca) ?>
                </div>
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
                                    <option value="Sólo Estudia">Sólo Estudia</option>
                                    <option value="Estudia y Trabaja">Estudia y Trabaja</option>
                                    <option value="Alumno estudia y es padre">Alumno estudia y es padre</option>
                                    <option value="Alumna estudia y es madre">Alumna estudia y es madre</option>
                                    <option value="Alumno Jefe de Hogar">Alumno Jefe de Hogar</option>
                                    <option value="Alumna embarazada">Alumna embarazada</option>
                                </select>
                            </td>                            
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="duplicidadFuncionesAlumnoSinab"><b><?php echo $dimEducacion['duplicidad_funciones']; ?></b></span>
                                <input type="hidden" name="duplicidadFuncionesAlumnoSinab" value="<?php echo $dimEducacion['duplicidad_funciones']; ?>" />                             
                            </td>
                            <td>
                                <select class="form-control" name="duplicidadFuncionesAlumnoEmp" id="duplicidadFuncionesAlumnoEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="Sólo Estudia">Sólo Estudia</option>
                                    <option value="Estudia y Trabaja">Estudia y Trabaja</option>
                                    <option value="Alumno estudia y es padre">Alumno estudia y es padre</option>
                                    <option value="Alumna estudia y es madre">Alumna estudia y es madre</option>
                                    <option value="Alumno Jefe de Hogar">Alumno Jefe de Hogar</option>
                                    <option value="Alumna embarazada">Alumna embarazada</option>          
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiDuplicidadFuncionesAlumno" class="label"></span>
                                <input type="hidden" name="resultadoDigiDuplicidadFuncionesAlumno" value="" />  
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                
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
                                    <option value="No tiene hermanos o hijos estudiando">No tiene hermanos o hijos estudiando</option>
                                    <option value="En Educación Pre-básica">En Educación Pre-básica</option>
                                    <option value="En Educación Básica">En Educación Básica</option>
                                    <option value="En Educación Media">En Educación Media</option>
                                    <option value="En Educación Superior Residencia">En Educación Superior Residencia</option>
                                    <option value="En Educación Superior Fuera Residencia">En Educación Superior Fuera Residencia</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="hermanosHijosEstudiantesSinab"><b><?php echo $dimEducacion['hermanos_estudiantes']; ?></b></span>
                                <input type="hidden" name="hermanosHijosEstudiantesSinab" value="<?php echo $dimEducacion['hermanos_estudiantes']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="hermanosHijosEstudiantesEmp" id="hermanosHijosEstudiantesEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="No tiene hermanos o hijos estudiando">No tiene hermanos o hijos estudiando</option>
                                    <option value="En Educación Pre-básica">En Educación Pre-básica</option>
                                    <option value="En Educación Básica">En Educación Básica</option>
                                    <option value="En Educación Media">En Educación Media</option>
                                    <option value="En Educación Superior Residencia">En Educación Superior Residencia</option>
                                    <option value="En Educación Superior Fuera Residencia">En Educación Superior Fuera Residencia</option>
                                </select>
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiHermanosHijosEstudiantes" class="label"></span>
                                <input type="hidden" name="resultadoDigiHermanosHijosEstudiantes" value="" />                            
                            </td>                       
                        </tr>
                    </table>
                </div>
                </div>
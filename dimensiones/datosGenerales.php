
                <!-- DATOS GENERALES -->
                <div id="verGenerales" class="dimension" style="display: none;">
                <h3 id="datosGenerales"><strong>DATOS GENERALES</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>
                </h3>
                
                <!-- Dato(s) pasado(s) como oculto(s) -->
                <input type="hidden" name="regionDeEjecucion" value="<?php echo $datosGrales['region_ejecucion']; ?>" />
                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Rut Alumno:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['rut']; ?></strong></p>
                        <input type="hidden" name="rutAlumno" value="<?php echo $datosGrales['rut']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2"><b><em>¿Rut Incorrecto?</em></b> :</label>                    
                    <div class="col-xs-8 col-sm-9 col-md-10">
                        <label class="checkbox-inline"> <!-- Quitar -inline para que input abarque toda la fila -->
                        <input type="checkbox" name="resultadoRutAlumno" id="resultadoRutAlumno" value="INCORRECTO" />
                        <input type="text" name="obsRutAlumno" id="obsRutAlumno" class="form-control input-sm" placeholder="Observación Rut" maxlength="100" />
                        </label>                                                                                     
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Nombre del Alumno:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['nombreAlumno']; ?></strong></p>
                        <input type="hidden" name="nombreAlumno" value="<?php echo $datosGrales['nombreAlumno']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2"><b><em>¿Nombre Incorrecto?</em></b> :</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <label class="checkbox-inline">
                            <input type="checkbox" name="resultadoNombreAlumno" id="resultadoNombreAlumno" value="INCORRECTO" />
                            <input type="text" name="obsNombreAlumno" id="obsNombreAlumno" class="form-control input-sm" placeholder="Observación Nombres" maxlength="100" />                            
                        </label>                                                    
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Domicilio del Alumno:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['direccionAlumno']; ?></strong></p>
                        <input type="hidden" name="domicilioAlumno" value="<?php echo $datosGrales['direccionAlumno']; ?>" />
                    </div>
                </div>                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Beca de Postulaci&oacute;n:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['beca']; ?></strong></p>
                        <input type="hidden" name="tipoBecaAlumno" value="<?php echo $datosGrales['beca']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Curso/Nivel:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['curso']; ?></strong></p>
                        <input type="hidden" name="nivelEducacional" value="<?php echo $datosGrales['curso']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Provincia (Familia):</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['provincia_domicilio']; ?></strong></p>
                        <input type="hidden" name="provinciaDomicilioFamiliarAlumno" value="<?php echo $datosGrales['provincia_domicilio']; ?>" />
                    </div>
                </div>                                                                
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Comuna (Familia):</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['comuna_domicilio']; ?></strong></p>
                        <input type="hidden" name="comunaDomicilioFamiliarAlumno" value="<?php echo $datosGrales['comuna_domicilio']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Unidad Operativa:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['unidad_operativa']; ?></strong></p>
                        <input type="hidden" name="tipoUnidadOperativa" value="<?php echo $datosGrales['unidad_operativa']; ?>" />
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Instituci&oacute;n Evaluadora:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['unidad_operativa']; ?></strong></p>
                        <input type="hidden" name="institucionEvaluadora" value="<?php echo $datosGrales['unidad_operativa']; ?>" />
                    </div>
                </div> 
                <div class="form-group">
                    <label class="control-label col-xs-4 col-sm-3 col-md-2">Profesional Evaluador:</label>
                    <div class="col-xs-8 col-sm-9 col-md-10">                        
                        <p class="form-control-static"><strong><?php echo $datosGrales['nombreProfesional']; ?></strong></p>
                        <input type="hidden" name="profesionalQueEvaluo" value="<?php echo $datosGrales['nombreProfesional']; ?>" />
                    </div>
                </div>
                </div>
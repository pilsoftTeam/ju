
                <!-- DIM. TERRITORIAL -->
                <div id="verTerritorial" class="dimension" style="display: none;">
                <h3 id="territorial"><strong>DIMENSI&Oacute;N TERRITORIAL</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>                
                </h3>
                <!-- Aislamiento Promedio Comunal -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Aislamiento Promedio Comunal</strong><span class="text-warning"> [Listar desde BD]</span></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="aislamientoPromedioComunalPapel" id="aislamientoPromedioComunalPapel">
                                    <option value="">Seleccione Comuna...</option>
                                    <option value="Comuna">Comuna</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="aislamientoPromedioComunalSinab"><b>Comuna<?php //echo $dimTerritorial['']; ?></b></span>
                                <input type="hidden" name="aislamientoPromedioComunalSinab" value="<?php //echo $dimTerritorial['']; ?>" />
                            </td>
                            <td>
                                <select class="form-control" name="aislamientoPromedioComunalEmp" id="aislamientoPromedioComunalEmp">
                                    <option value="">Seleccione Comuna...</option>
                                    <option value="Comuna">Comuna</option>
                                </select>
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAislamientoPromedioComunal" class="label"></span>
                                <input type="hidden" name="resultadoDigiAislamientoPromedioComunal" value="" />                            
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiAislamientoPromedioComunal', $tipoBeca) ?>
                
                <!-- Aislamiento de Localidades -->
                <?php if( $tipoBeca != 'BIBM' ||$tipoBeca != 'BISUP' ){ ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Aislamiento de Localidades</strong><span class="text-warning"> [Listar desde BD]</span></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="aislamientoDeLocalidadesPapel" id="aislamientoDeLocalidadesPapel">
                                    <option value="">Seleccione Localidad...</option>
                                    <option value="Localidad">Localidad</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="aislamientoDeLocalidadesSinab"><b>Localidad<?php //echo $dimTerritorial['']; ?></b></span>
                                <input type="hidden" name="aislamientoDeLocalidadesSinab" value="<?php //echo $dimTerritorial['']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="aislamientoDeLocalidadesEmp" id="aislamientoDeLocalidadesEmp">
                                    <option value="">Seleccione Localidad...</option>
                                    <option value="Localidad">Localidad</option>              
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAislamientoDeLocalidades" class="label"></span>
                                <input type="hidden" name="resultadoDigiAislamientoDeLocalidades" value="" />             
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiAislamientoDeLocalidades', $tipoBeca) ?>
                <?php } ?>

                <!-- Lugar de Estudio del Alumno/a -->
                <?php if( $tipoBeca != 'BPA' || $tipoBeca != 'BA' ){ ?>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Lugar de Estudio del Alumno/a</strong></h4></td>
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="lugarEstudioAlumnoPapel" id="lugarEstudioAlumnoPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="En la comuna">En la comuna</option>
                                    <option value="Fuera de la Comuna">Fuera de la Comuna</option>        
                                    <option value="Fuera de la Provincia">Fuera de la Provincia</option>
                                    <option value="Fuera de la Región">Fuera de la Regi&oacute;n</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="lugarEstudioAlumnoSinab"><b><?php //echo $dimTerritorial['']; ?></b></span>
                                <input type="hidden" name="lugarEstudioAlumnoSinab" value="<?php //echo $dimTerritorial['']; ?>" />
                            </td>
                            <td>
                                <select class="form-control" name="lugarEstudioAlumnoEmp" id="lugarEstudioAlumnoEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="En la comuna">En la comuna</option>
                                    <option value="Fuera de la Comuna">Fuera de la Comuna</option>        
                                    <option value="Fuera de la Provincia">Fuera de la Provincia</option>
                                    <option value="Fuera de la Región">Fuera de la Regi&oacute;n</option>
                                </select>
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiLugarEstudioAlumno" class="label"></span>
                                <input type="hidden" name="resultadoDigiLugarEstudioAlumno" value="" />
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiLugarEstudioAlumno', $tipoBeca) ?>
                <?php } ?>
                </div>
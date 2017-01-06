
                <!-- DIM. OTROS FACTORES DE RIESGO -->                 
                <div id="verFactoresRiesgo" class="dimension" style="display: none;">
                <h3 id="factoresRiesgo"><strong>DIMENSI&Oacute;N OTROS FACTORES DE RIESGO</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>
                </h3>
                <!-- Déficit en red de apoyo familiar -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable D&eacute;ficit en Red de Apoyo Familiar</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="deficitApoyoFamiliarPapel" id="deficitApoyoFamiliarPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="Familia Nuclear Biparental">Familia Nuclear Biparental</option>
                                    <option value="Apoyo sólo de la madre o sólo del padre(familia monoparental)">Apoyo s&oacute;lo de la madre o s&oacute;lo del padre(familia monoparental)</option>
                                    <option value="Sin los padres, a cargo de los abuelos o parientes">Sin los padres, a cargo de los abuelos o parientes</option>
                                    <option value="Estudiante sólo">Estudiante s&oacute;lo</option>
                                    <option value="Red Sename">Red Sename</option>                                    
                                </select>
                            </td>                           
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="deficitApoyoFamiliarSinab"><b><?php echo $dimFactRiesgo['deficit_apoyo']; ?></b></span>
                                <input type="hidden" name="deficitApoyoFamiliarSinab" value="<?php echo $dimFactRiesgo['deficit_apoyo']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="deficitApoyoFamiliarEmp" id="deficitApoyoFamiliarEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="Familia Nuclear Biparental">Familia Nuclear Biparental</option>
                                    <option value="Apoyo sólo de la madre o sólo del padre(familia monoparental)">Apoyo s&oacute;lo de la madre o s&oacute;lo del padre(familia monoparental)</option>
                                    <option value="Sin los padres, a cargo de los abuelos o parientes">Sin los padres, a cargo de los abuelos o parientes</option>
                                    <option value="Estudiante sólo">Estudiante s&oacute;lo</option>
                                    <option value="Red Sename">Red Sename</option>                                   
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiDeficitApoyoFamiliar" class="label"></span>
                                <input type="hidden" name="resultadoDigiDeficitApoyoFamiliar" value="" />                            
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                </div>
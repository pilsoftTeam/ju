
                <!-- DIM. ACADEMICA -->
                <div id="verAcademica" class="dimension" style="display: none;">
                <h3 id="academica"><strong>DIMENSI&Oacute;N ACAD&Eacute;MICA</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>                
                </h3>
                <!-- Calificación / Nota -->               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Calificaci&oacute;n Acad&eacute;mica, Nota</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="notaPapel" id="notaPapel">
                                    <option value="">Seleccione...</option>
                                    <?php for($i=4; $i<7; $i++){
                                            for($j=0; $j<=9; $j++){
                                                $nota = $i.'.'.$j;
                                                if( $nota =='4.0' ){
                                                    $nota = '4';
                                                }                                                
                                    ?>
                                    <option value="<?php echo $nota; ?>"><?php echo $nota; ?></option>
                                    <?php   }
                                          }
                                    ?>
                                    <option value="7">7</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="notaSinab"><b><?php echo $dimAcademica['nota']; ?></b></span>
                                <input type="hidden" name="notaSinab" value="<?php echo $dimAcademica['nota']; ?>" />
                            </td>                            
                            <td>
                                <select class="form-control" name="notaEmp" id="notaEmp">
                                    <option value="">Seleccione...</option>                                    
                                    <?php for($i=4; $i<7; $i++){
                                            for($j=0; $j<=9; $j++){                                                
                                                $nota = $i.'.'.$j;
                                                if( $nota =='4.0' ){
                                                    $nota = '4';
                                                }
                                    ?>
                                    <option value="<?php echo $nota; ?>"><?php echo $nota; ?></option>
                                    <?php   }
                                          }
                                    ?>
                                    <option value="7">7</option>                        
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiNota" class="label"></span>
                                <input type="hidden" name="resultadoDigiNota" value="" />
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                
                <!-- SEGÚN OBS. DE JUNAEB, NEM, CURRICULAR Y PSU N/A PARA BRI NI BI -->
                
                <!-- NEM
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>NEM</strong><span class="text-warning"> ( *Tipo de Dato x Definir )</span></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="nemPapel" id="nemPapel">
                                    <option value="">Seleccione...</option>
                                    <?php for($i=4; $i<7; $i++){
                                            for($j=0; $j<=9; $j++){
                                                $nota = $i.'.'.$j;
                                                if( $nota =='4.0' ){
                                                    $nota = '4';
                                                }                                                
                                    ?>
                                    <option value="<?php echo $nota; ?>"><?php echo $nota; ?></option>
                                    <?php   }
                                          }
                                    ?>
                                    <option value="7">7</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="nemSinab"><b>NEM...<?php //echo  ?></b></span>
                                <input type="hidden" name="nemSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="nemEmp" id="nemEmp">
                                    <option value="">Seleccione...</option>
                                    <?php for($i=4; $i<7; $i++){
                                            for($j=0; $j<=9; $j++){
                                                $nota = $i.'.'.$j;
                                                if( $nota =='4.0' ){
                                                    $nota = '4';
                                                }                                                
                                    ?>
                                    <option value="<?php echo $nota; ?>"><?php echo $nota; ?></option>
                                    <?php   }
                                          }
                                    ?>
                                    <option value="7">7</option>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiNem" class="label"></span>
                                <input type="hidden" name="resultadoDigiNem" value="" />
                            </td>
                        </tr>                        
                    </table>
                </div>
                -->
                 
                <!-- Aprobación Curricular
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Aprobaci&oacute;n Curricular</strong><span class="text-warning"> ( *Tipo de Dato x Definir )</span></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <select class="form-control" name="aprobacionCurricularPapel" id="aprobacionCurricularPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="curricular...">curricular...</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="aprobacionCurricularSinab"><b>curricular...<?php //echo  ?></b></span>
                                <input type="hidden" name="aprobacionCurricularSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="aprobacionCurricularEmp" id="aprobacionCurricularEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="curricular...">curricular...</option>
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiAprobacionCurricular" class="label"></span>
                                <input type="hidden" name="resultadoDigiAprobacionCurricular" value="" />
                            </td>
                        </tr>                        
                    </table>
                </div>
                -->
                
                <!-- PSU
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>PSU</strong><span class="text-warning"> ( *Dato Requerido ?? )</span></h4></td>                            
                        </tr>
                        <tr>                            
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>                            
                            <td>
                                <input type="number" name="psuPapel" id="psuPapel" class="form-control" min="0" max="999" step="1" required="required" />                            
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="psuSinab"><b>0<?php //echo  ?></b></span>
                                <input type="hidden" name="psuSinab" value="<?php //echo  ?>" />                            
                            </td>
                            <td>
                                <input type="number" name="psuEmp" id="psuEmp" class="form-control" min="0" max="999" step="1" required="required" />                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiPsu" class="label"></span>
                                <input type="hidden" name="resultadoDigiPsu" value="" />
                            </td>
                        </tr>                        
                    </table>
                </div>                
                </div>
                -->
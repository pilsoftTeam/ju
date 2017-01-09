
                <!-- DIM. SOCIOCULTURAL -->
                <div id="verSocioCultural" class="dimension" style="display: none;">
                <h3 id="socioCultural"><strong>DIMENSI&Oacute;N SOCIOCULTURAL</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>                
                </h3>
                <!-- Participación en organización Indígena -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Participaci&oacute;n en organizaci&oacute;n Ind&iacute;gena</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="participaEnOrgIndigenaPapel" id="participaEnOrgIndigenaPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="participaEnOrgIndigenaSinab"><b><?php echo $dimSocioCultural['organizacion_indigena']; ?></b></span>
                                <input type="hidden" name="participaEnOrgIndigenaSinab" value="<?php echo $dimSocioCultural['organizacion_indigena']; ?>" />
                            </td>
                            <td>
                                <select class="form-control" name="participaEnOrgIndigenaEmp" id="participaEnOrgIndigenaEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>                        
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiParticipacionOrgIndigena" class="label"></span>
                                <input type="hidden" name="resultadoDigiParticipacionOrgIndigena" value="" />                            
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiParticipacionOrgIndigena', $tipoBeca) ?>
                
                <!-- Se domicilia o vive en comunidad indígena -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Se domicilia o vive en comunidad ind&iacute;gena</strong></h4></td>                            
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="seDomiciliaViveEnComunidadIndigenaPapel" id="seDomiciliaViveEnComunidadIndigenaPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="seDomiciliaViveEnComunidadIndigenaSinab"><b><?php echo $dimSocioCultural['comunidad_indigena']; ?></b></span>
                                <input type="hidden" name="seDomiciliaViveEnComunidadIndigenaSinab" value="<?php echo $dimSocioCultural['comunidad_indigena']; ?>" />                            
                            </td>
                            <td>
                                <select class="form-control" name="seDomiciliaViveEnComunidadIndigenaEmp" id="seDomiciliaViveEnComunidadIndigenaEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>                        
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiSeDomiciliaViveEnComunidadIndigena" class="label"></span>
                                <input type="hidden" name="resultadoDigiSeDomiciliaViveEnComunidadIndigena" value="" />                            
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiSeDomiciliaViveEnComunidadIndigena', $tipoBeca) ?>

                <!-- Participa de prácticas culturales y/o celebraciones rituales de la comunidad o pueblo al que pertenece -->
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td colspan="4"><h4><strong>Variable Participa de pr&aacute;cticas culturales y/o celebraciones rituales de la comunidad o pueblo al que pertenece</strong></h4></td>
                        </tr>
                        <tr>
                            <th>Registro Formulario</th>
                            <th>Registro Digitaci&oacute;n</th>
                            <th>Registro Revisi&oacute;n</th>
                            <th>RESULTADO</th>                            
                        </tr>
                        <tr>
                            <td>
                                <select class="form-control" name="participaDePracticasCulturalesRitualesDeLaComunidadPapel" id="participaDePracticasCulturalesRitualesDeLaComunidadPapel">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>
                                </select>
                            </td>
                            <td class="text-center bg-info" style="vertical-align: middle;">
                                <span id="participaDePracticasCulturalesRitualesDeLaComunidadSinab"><b><?php echo $dimSocioCultural['participa_rituales']; ?></b></span>
                                <input type="hidden" name="participaDePracticasCulturalesRitualesDeLaComunidadSinab" value="<?php echo $dimSocioCultural['participa_rituales']; ?>" />
                            </td>
                            <td>
                                <select class="form-control" name="participaDePracticasCulturalesRitualesDeLaComunidadEmp" id="participaDePracticasCulturalesRitualesDeLaComunidadEmp">
                                    <option value="">Seleccione...</option>
                                    <option value="SI">SI</option>
                                    <option value="NO">NO</option>                        
                                </select>                            
                            </td>
                            <td class="valor-resultado text-center" style="vertical-align: middle;">
                                <span id="resultadoDigiParticipaDePracticasCulturalesRitualesDeLaComunidad" class="label"></span>
                                <input type="hidden" name="resultadoDigiParticipaDePracticasCulturalesRitualesDeLaComunidad" value="" />
                            </td>                                                        
                        </tr>
                    </table>
                </div>
                <?php crearSelectObservaciones('DigiParticipaDePracticasCulturalesRitualesDeLaComunidad', $tipoBeca) ?>
                </div>
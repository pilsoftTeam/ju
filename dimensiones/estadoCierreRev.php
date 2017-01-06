
                <!-- ESTADO DE CIERRE DE REVISIÓN -->
                <div id="verEstadoCierre" class="dimension" style="display: none;">
                <h3 id="estadoCierre"><strong>ESTADO CIERRE DE LA REVISI&Oacute;N</strong>
                    <span class="label label-info pull-right"><a href="#titulo" class="volver-arriba">Volver Men&uacute;</a></span>
                </h3>

                <div class="form-group">
                    <label class="control-label col-sm-3 col-md-2"><b>Estado de Cierre Revisi&oacute;n:</b></label>
                    <div class="col-sm-9 col-md-10">
                        <select name="codEstadoChecklist" id="codEstadoChecklist" class="form-control">
                        <option value="">Seleccione estado...</option>
                        <option value="CC1">Formulario revisado NO presenta errores (sin documentaci&oacute;n faltante, aspectos normativos correctos y sin errores de digitaci&oacute;n).</option>
                        <option value="CC2">Con errores de transcripci&oacute;n de informaci&oacute;n en Papel v/s Form. Digital y/o coherencia interna del Form. digital respecto a normativa, se modifica Sinab.</option>
                        <option value="CC3">Se detecta documentaci&oacute;n faltante, &eacute;sta se gestiona, se obtiene con estudiante o red colaboradora, y se modifica el formulario en Sinab.</option>                        
                        <option value="CC4">Se detecta documentaci&oacute;n faltante, &eacute;sta se gestiona, NO se obtiene con estudiante o red colaboradora, y se modifica formulario en Sinab si corresponde.</option>
                        </select>
                        <input type="hidden" name="estadoChecklist" id="estadoChecklist" value="" />
                    </div>
                </div>
                </div>
$(document).ready(function(){
    //Fuerza a que los combobox sean obligatorios
    $("select").attr('required', 'required');
    //$("input:checkbox").attr('required', 'required');
    
    $('#obsRutAlumno').prop('disabled', true);
    $('#obsNombreAlumno').prop('disabled', true);
    
    $('#resultadoRutAlumno').on('change', function(){
        var obsRut = $('#obsRutAlumno');
        if($(this).is(':checked')){
            obsRut.prop('disabled', false);
            obsRut.prop('required', true);    
        }else{
            obsRut.val('').prop('disabled', true);
            obsRut.prop('required', false);
        }
    });
    
    $('#resultadoNombreAlumno').on('change', function(){
        var obsNombre = $('#obsNombreAlumno');
        if($(this).is(':checked')){
            obsNombre.prop('disabled', false);
            obsNombre.prop('required', true);
        }else{
            obsNombre.val('').prop('disabled', true);
            obsNombre.prop('required', false);
        }
    });
    
    //Inicializa todos los textos resultado de revisión a Incorrectos
    var textResulDefault = $('td.valor-resultado').children('span');
    textResulDefault.addClass('label-danger');
    textResulDefault.text('INCORRECTO');
    
    ////Inicializa todos los inputs de resultados de revisión a Incorrectos
    var varResulDefault = $('td.valor-resultado').children('input:hidden');
    varResulDefault.val('INCORRECTO');
            
    //Cambia las clases de la pestaña selecionada
    $('.pestanas').on('click', function(){
        $(this).toggleClass('active negrita');
    });
    
    //Cambia la clase de la fila si el doc existe !
    $('.revDocumental').on('change', function(){
        if(!$(this).parents('tr').is('.docOpcional')){
            $(this).parents('tr').toggleClass('text-danger');
            $(this).parent().toggleClass('success');
        }else{
            $(this).parents('tr').toggleClass('text-warning');
            $(this).parent().toggleClass('success');
        }
    });    
        
    /* muestra u oculta secciones de pestañas */
    $('#linkGenerales').on('click', function(){
        $('#verGenerales').toggle('slow');
    });
    
    $('#linkDocumental').on('click', function(){
        $('#verDocumental').toggle('slow');
    });    

    $('#linkAntecedentes').on('click', function(){
        $('#verAntecedentes').toggle('slow');
    });

    $('#linkAcademica').on('click', function(){
        $('#verAcademica').toggle('slow');
    });

    $('#linkEconomica').on('click', function(){
        $('#verEconomica').toggle('slow');
    });

    $('#linkFactoresRiesgo').on('click', function(){
        $('#verFactoresRiesgo').toggle('slow');
    });

    $('#linkEducacion').on('click', function(){
        $('#verEducacion').toggle('slow');
    });

    $('#linkSocioCultural').on('click', function(){
        $('#verSocioCultural').toggle('slow');
    });

    $('#linkTerritorial').on('click', function(){
        $('#verTerritorial').toggle('slow');
    });    

    $('#linkEstadoCierre').on('click', function(){
        $('#verEstadoCierre').toggle('slow');
    });    
    
    //Según los valores pasados x param, se entrega resultado revisión
    function estado(colPapel, colSinab, colEmp, colResultado, input){
        
        colPapel.trim();
        colSinab.trim();
        colEmp.trim();
        
        if( colPapel == '' || colEmp == '' ){
            if(colResultado.is('.label-danger')){
                colResultado.removeClass('label-danger'); //evita doble .danger    
            }
            colResultado.removeClass('label-success').addClass('label-danger');
            colResultado.text('INCORRECTO');
                        
        }else if( colPapel == colSinab && colSinab == colEmp ){
            colResultado.removeClass('label-danger').addClass('label-success');
            colResultado.text('CORRECTO');             
        }else{
            if(colResultado.is('.label-danger')){
                colResultado.removeClass('label-danger'); //evita doble .danger    
            }
            colResultado.removeClass('label-success').addClass('label-danger');
            colResultado.text('INCORRECTO');
            
        }
        //alert('Estados de Papel: ' + colPapel + ' Sinab: ' + colSinab + ' Emp: ' + colEmp);
        input.val(colResultado.text());
        if( colResultado.text() != '' ){
            //alert('Estado cambiado a: ' + colResultado.text());
        }
    }

    /* Evaluación de Datos Antecedentes Postulante */
        
    $('#cursoBasicaMediaPapel, #cursoBasicaMediaEmp').on('change', function(){            
        var Papel = $('#cursoBasicaMediaPapel').val();
        var Sinab = $('#cursoBasicaMediaSinab').text();
        var Emp   = $('#cursoBasicaMediaEmp').val();
        var resultado = $('#resultadoEduBasicaMedia');
        var input = $('input[name="resultadoEduBasicaMedia"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#nombreEstEducacionalPapel, #nombreEstEducacionalEmp').on('change', function(){            
        var Papel = $('#nombreEstEducacionalPapel').val();
        var Sinab = $('#nombreEstEducacionalSinab').text();
        var Emp   = $('#nombreEstEducacionalEmp').val();
        var resultado = $('#resultadoDigiNombreEstEducacional');
        var input = $('input[name="resultadoDigiNombreEstEducacional"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });    
    
    $('#institucionEduSupPapel, #institucionEduSupEmp').on('change', function(){            
        var Papel = $('#institucionEduSupPapel').val();
        var Sinab = $('#institucionEduSupSinab').text();
        var Emp   = $('#institucionEduSupEmp').val();
        var resultado = $('#resultadoDigiInstitucionEduSup');
        var input = $('input[name="resultadoDigiInstitucionEduSup"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });
    
    $('#nombreCarreraPapel, #nombreCarreraEmp').on('change', function(){            
        var Papel = $('#nombreCarreraPapel').val();
        var Sinab = $('#nombreCarreraSinab').text();
        var Emp   = $('#nombreCarreraEmp').val();
        var resultado = $('#resultadoDigiNombreCarrera');
        var input = $('input[name="resultadoDigiNombreCarrera"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });    

    $('#anioIngresoCarreraPapel, #anioIngresoCarreraEmp').on('change', function(){            
        var Papel = $('#anioIngresoCarreraPapel').val();
        var Sinab = $('#anioIngresoCarreraSinab').text();
        var Emp   = $('#anioIngresoCarreraEmp').val();
        var resultado = $('#resultadoDigiAnioIngresoCarrera');
        var input = $('input[name="resultadoDigiAnioIngresoCarrera"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#duracionCarreraPapel, #duracionCarreraEmp').on('change', function(){            
        var Papel = $('#duracionCarreraPapel').val();
        var Sinab = $('#duracionCarreraSinab').text();
        var Emp   = $('#duracionCarreraEmp').val();
        var resultado = $('#resultadoDigiDuracionCarrera');
        var input = $('input[name="resultadoDigiDuracionCarrera"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });    
            
    $('#puebloIndigenaPapel, #puebloIndigenaEmp').on('change', function(){            
        var Papel = $('#puebloIndigenaPapel').val();
        var Sinab = $('#puebloIndigenaSinab').text();
        var Emp   = $('#puebloIndigenaEmp').val();
        var resultado = $('#resultadoDigiPuebloIndigena');
        var input = $('input[name="resultadoDigiPuebloIndigena"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });
    
    $('#acreditadoPorCertificadoConadiPapel, #acreditadoPorCertificadoConadiEmp').on('change', function(){            
        var Papel = $('#acreditadoPorCertificadoConadiPapel').val();
        var Sinab = $('#acreditadoPorCertificadoConadiSinab').text();
        var Emp   = $('#acreditadoPorCertificadoConadiEmp').val();
        var resultado = $('#resultadoDigiAcreditadoPorCertificadoConadi');
        var input = $('input[name="resultadoDigiAcreditadoPorCertificadoConadi"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#acreditadoPorApellidoPapel, #acreditadoPorApellidoEmp').on('change', function(){            
        var Papel = $('#acreditadoPorApellidoPapel').val();
        var Sinab = $('#acreditadoPorApellidoSinab').text();
        var Emp   = $('#acreditadoPorApellidoEmp').val();
        var resultado = $('#resultadoDigiAcreditadoPorApellido');
        var input = $('input[name="resultadoDigiAcreditadoPorApellido"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });          

    $('#regionDomicilioFamiliarPapel, #regionDomicilioFamiliarEmp').on('change', function(){            
        var Papel = $('#regionDomicilioFamiliarPapel').val();
        var Sinab = $('#regionDomicilioFamiliarSinab').text();
        var Emp   = $('#regionDomicilioFamiliarEmp').val();
        var resultado = $('#resultadoRegionDomicilioFamiliar');
        var input = $('input[name="resultadoRegionDomicilioFamiliar"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });
    
    $('#comuDomicilioFamiliarPapel, #comuDomicilioFamiliarEmp').on('change', function(){            
        var Papel = $('#comuDomicilioFamiliarPapel').val();
        var Sinab = $('#comuDomicilioFamiliarSinab').text();
        var Emp   = $('#comuDomicilioFamiliarEmp').val();
        var resultado = $('#resultadoComuDomicilioFamiliar');
        var input = $('input[name="resultadoComuDomicilioFamiliar"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });
    
    $('#comuDomicilioEstudiosPapel, #comuDomicilioEstudiosEmp').on('change', function(){            
        var Papel = $('#comuDomicilioEstudiosPapel').val();
        var Sinab = $('#comuDomicilioEstudiosSinab').text();
        var Emp   = $('#comuDomicilioEstudiosEmp').val();
        var resultado = $('#resultadoComuDomicilioEstudios');
        var input = $('input[name="resultadoComuDomicilioEstudios"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });    
                    
    /* Evaluación de Datos de Dim. Académica */
        
    $('#notaPapel, #notaEmp').on('change', function(){            
        var Papel = $('#notaPapel').val();
        var Sinab = $('#notaSinab').text();
        var Emp   = $('#notaEmp').val();
        var resultado = $('#resultadoDigiNota');
        var input = $('input[name="resultadoDigiNota"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#nemPapel, #nemEmp').on('change', function(){            
        var Papel = $('#nemPapel').val();
        var Sinab = $('#nemSinab').text();
        var Emp   = $('#nemEmp').val();
        var resultado = $('#resultadoDigiNem');
        var input = $('input[name="resultadoDigiNem"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });    

    $('#aprobacionCurricularPapel, #aprobacionCurricularEmp').on('change', function(){            
        var Papel = $('#aprobacionCurricularPapel').val();
        var Sinab = $('#aprobacionCurricularSinab').text();
        var Emp   = $('#aprobacionCurricularEmp').val();
        var resultado = $('#resultadoDigiAprobacionCurricular');
        var input = $('input[name="resultadoDigiAprobacionCurricular"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#psuPapel, #psuEmp').on('change', function(){            
        var Papel = $('#psuPapel').val();
        var Sinab = $('#psuSinab').text();
        var Emp   = $('#psuEmp').val();
        var resultado = $('#resultadoDigiPsu');
        var input = $('input[name="resultadoDigiPsu"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });    
    
    /* Evaluación de Datos de Dim. Económica **POR DEFINIR en procesar... */
        
    $('#tramoRSHPapel, #tramoRSHEmp').on('change', function(){            
        var Papel = $('#tramoRSHPapel').val();
        var Sinab = $('#tramoRSHSinab').text();
        var Emp   = $('#tramoRSHEmp').val();
        var resultado = $('#resultadoDigitramoRSH');
        var input = $('input[name="resultadoDigitramoRSH"]');
        
        estado(Papel, Sinab, Emp, resultado, input);        
    });
        
    /* Evaluación de Datos de Dim. Fact. de Riesgo */
        
    $('#discapacidadPapel, #discapacidadEmp').on('change', function(){            
        var Papel = $('#discapacidadPapel').val();
        var Sinab = $('#discapacidadSinab').text();
        var Emp   = $('#discapacidadEmp').val();
        var resultado = $('#resultadoDigiDiscapacidad');
        var input = $('input[name="resultadoDigiDiscapacidad"]');
        
        estado(Papel, Sinab, Emp, resultado, input);        
    });
    
    $('#deficitApoyoFamiliarPapel, #deficitApoyoFamiliarEmp').on('change', function(){            
        var Papel = $('#deficitApoyoFamiliarPapel').val();
        var Sinab = $('#deficitApoyoFamiliarSinab').text();
        var Emp   = $('#deficitApoyoFamiliarEmp').val();
        var resultado = $('#resultadoDigiDeficitApoyoFamiliar');
        var input = $('input[name="resultadoDigiDeficitApoyoFamiliar"]');
        
        estado(Papel, Sinab, Emp, resultado, input);        
    });

    /* Evaluación de Datos de Dim. Educación */
        
    $('#duplicidadFuncionesAlumnoPapel, #duplicidadFuncionesAlumnoEmp').on('change', function(){            
        var Papel = $('#duplicidadFuncionesAlumnoPapel').val();
        var Sinab = $('#duplicidadFuncionesAlumnoSinab').text();
        var Emp   = $('#duplicidadFuncionesAlumnoEmp').val();
        var resultado = $('#resultadoDigiDuplicidadFuncionesAlumno');
        var input = $('input[name="resultadoDigiDuplicidadFuncionesAlumno"]');
                     
        estado(Papel, Sinab, Emp, resultado, input);
    });    
    
    $('#hermanosHijosEstudiantesPapel, #hermanosHijosEstudiantesEmp').on('change', function(){            
        var Papel = $('#hermanosHijosEstudiantesPapel').val();
        var Sinab = $('#hermanosHijosEstudiantesSinab').text();
        var Emp   = $('#hermanosHijosEstudiantesEmp').val();
        var resultado = $('#resultadoDigiHermanosHijosEstudiantes');
        var input = $('input[name="resultadoDigiHermanosHijosEstudiantes"]');
                     
        estado(Papel, Sinab, Emp, resultado, input);
    });
    
    /* Evaluación de Datos de Dim. Sociocultural */
    
    $('#participaPadreMadreRepresentanteLegalEnOrgIndigenaPapel, #participaPadreMadreRepresentanteLegalEnOrgIndigenaEmp').on('change', function(){            
        var Papel = $('#participaPadreMadreRepresentanteLegalEnOrgIndigenaPapel').val();
        var Sinab = $('#participaPadreMadreRepresentanteLegalEnOrgIndigenaSinab').text();
        var Emp   = $('#participaPadreMadreRepresentanteLegalEnOrgIndigenaEmp').val();
        var resultado = $('#resultadoDigiParticipacionOrgIndigena');
        var input = $('input[name="resultadoDigiParticipacionOrgIndigena"]');
                     
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#participaEnOrgIndigenaPapel, #participaEnOrgIndigenaEmp').on('change', function(){            
        var Papel = $('#participaEnOrgIndigenaPapel').val();
        var Sinab = $('#participaEnOrgIndigenaSinab').text();
        var Emp   = $('#participaEnOrgIndigenaEmp').val();
        var resultado = $('#resultadoDigiParticipacionOrgIndigena');
        var input = $('input[name="resultadoDigiParticipacionOrgIndigena"]');
                     
        estado(Papel, Sinab, Emp, resultado, input);
    });            

    $('#seDomiciliaViveEnComunidadIndigenaPapel, #seDomiciliaViveEnComunidadIndigenaEmp').on('change', function(){            
        var Papel = $('#seDomiciliaViveEnComunidadIndigenaPapel').val();
        var Sinab = $('#seDomiciliaViveEnComunidadIndigenaSinab').text();
        var Emp   = $('#seDomiciliaViveEnComunidadIndigenaEmp').val();
        var resultado = $('#resultadoDigiSeDomiciliaViveEnComunidadIndigena');
        var input = $('input[name="resultadoDigiSeDomiciliaViveEnComunidadIndigena"]');
                     
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#participaDePracticasCulturalesRitualesDeLaComunidadPapel, #participaDePracticasCulturalesRitualesDeLaComunidadEmp').on('change', function(){            
        var Papel = $('#participaDePracticasCulturalesRitualesDeLaComunidadPapel').val();
        var Sinab = $('#participaDePracticasCulturalesRitualesDeLaComunidadSinab').text();
        var Emp   = $('#participaDePracticasCulturalesRitualesDeLaComunidadEmp').val();
        var resultado = $('#resultadoDigiParticipaDePracticasCulturalesRitualesDeLaComunidad');
        var input = $('input[name="resultadoDigiParticipaDePracticasCulturalesRitualesDeLaComunidad"]');
                     
        estado(Papel, Sinab, Emp, resultado, input);
    });

    /* Evaluación de Datos de Dim. Territorial */

    $('#aislamientoPromedioComunalPapel, #aislamientoPromedioComunalEmp').on('change', function(){            
        var Papel = $('#aislamientoPromedioComunalPapel').val();
        var Sinab = $('#aislamientoPromedioComunalSinab').text();
        var Emp   = $('#aislamientoPromedioComunalEmp').val();
        var resultado = $('#resultadoDigiAislamientoPromedioComunal');
        var input = $('input[name="resultadoDigiAislamientoPromedioComunal"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#aislamientoDeLocalidadesPapel, #aislamientoDeLocalidadesEmp').on('change', function(){            
        var Papel = $('#aislamientoDeLocalidadesPapel').val();
        var Sinab = $('#aislamientoDeLocalidadesSinab').text();
        var Emp   = $('#aislamientoDeLocalidadesEmp').val();
        var resultado = $('#resultadoDigiAislamientoDeLocalidades');
        var input = $('input[name="resultadoDigiAislamientoDeLocalidades"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });

    $('#lugarEstudioAlumnoPapel, #lugarEstudioAlumnoEmp').on('change', function(){            
        var Papel = $('#lugarEstudioAlumnoPapel').val();
        var Sinab = $('#lugarEstudioAlumnoSinab').text();
        var Emp   = $('#lugarEstudioAlumnoEmp').val();
        var resultado = $('#resultadoDigiLugarEstudioAlumno');
        var input = $('input[name="resultadoDigiLugarEstudioAlumno"]');
        
        estado(Papel, Sinab, Emp, resultado, input);
    });
    
    // Al cambiar estado revisión pasa texto a input 
    $('#codEstadoChecklist').on('change', function(){
        var estadoChecklist = $('#estadoChecklist');
        
        if( $(this).val() !== '' ){            
            estadoChecklist.val('');
            estadoChecklist.val($('#codEstadoChecklist option:selected').text());
            //alert('Largo texto revisión: ' + estadoChecklist.val().length);
        }else{
            estadoChecklist.val('');
        }
    });    
});

// Muestra todas las vistas antes de Guardar
$('#checklistForm').on('submit', function(){
    $('div.dimension').each(function(){
        $(this).css("display", "block");    
    });

    // Según estilo actual de pestañas, se cambian
    //$('li.pestanas').each(function(){  
        //$(this).removeClass('active negrita');
        //$(this).toggleClass('active negrita');
    //});    
});

$("#checklistForm").validate();
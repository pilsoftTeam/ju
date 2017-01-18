/**
 * Created by Julio Marchant on 12/01/2017.
 */


/*
 Queda a tu criterio cambiar el nombre de este archivo y el nombre de las funcionesy los mensajes de este

 Para llamar a este archivo debes crear una etiqueta script apuntado a esete script
 ### <script src="ajaxUpdate.js"></script> ###

 Y despues crear otra etiqueta script para llamar la funcion init que acepta 2 parametros;
 rut, beca

 <script>
 init(111111111, BIBM)
 </script>

 */
//Llamada ajax
function init(rut, beca) {
    var url = 'dupes.php';
    $.ajax({
        url: url,
        method: 'GET',
        data: {
            rut: rut,
            beca: beca
        }
    }).then(function (data) {

        if (data === null) {
            console.log('NOT found')
        } else {
            alert('Se ha detectado que este formulario ya se realizo. Prodeceremos con cargar la informacion que esta guardada.');
            ajax(data);
        }
    }, function (data) {
        console.log('Error  : ' + data)
    });
}
function ajax(data) {

    //Se crea un array para guardar todos los ids de los documentos;
    //Ojo que los estoy comparando con el id de el formulario. O sea supone que todos los formularios
    //Tienen el mismo id.
    var ids = [];
    $('.revDocumental').each(function () {
        $(this).attr('id', this.name)
    });
    $("#checklistForm").find('input , select ').each(function () {
        //Se añaden al array cada id de input o select que tenga el formulario
        if (this.id !== '') ids.push(this.id);
    });

    //Data es lo que se recibe de la funcion php. y la que tiene todos los datos


    $.each(data, function (key, valor) {
        //El parametro key solamente guarda el index del array =  0.
        //Sin importancia para este script pero necesario en la funcion
        //El parametro valor es el que contiene las llaves y valores de nuestro json
        $.each(valor, function (idLlave) {
            //le asignamos cada valor de "valor" a el parametro idLlave que se encargara de darle un significado


            ids.forEach(function (item) {
                //le asignamos cada valor de "ids" a el parametro items que se encargara de darle un significad

                //La comprobacion se hace aca. Si la id de llave es igual al item
                //Si es asi la variable selector tendra como nombre el ID.
                if (idLlave === item) {

                    //Esto te lo explique.Si tienes alguna duda me dices
                    var selector = '#' + idLlave;
                    var type = $(selector).prop('type');
                    var tag = $(selector).prop('tagName');
                    /**
                     * Error de trim <Explicacion>
                     *
                     * El error de trim se propiciaba al momento de querer comparar un campo vacio con la funcion trim
                     * Esto sucede por que el algoritmo cambia el valor de los select a el valor que le da la base de datos
                     * y si no se encuentra este lo deja vacio
                     * Entonces si el trim encuentra algo vacio saltara el error de que no tiene a nada que hacerle trim
                     */

                    if (tag === 'INPUT' && type === 'checkbox')
                        $(selector).prop('checked', true).parent().addClass('success').parent().removeClass();
                    if (tag === 'SELECT') $(selector).val(jQuery.isNumeric(valor[idLlave]) ? Math.round(valor[idLlave] * 10) / 10 : valor[idLlave]).trigger('change');
                    if (tag === 'INPUT' && type === 'text') $(selector).val(valor[idLlave]);
                    if (tag === 'INPUT' && type === 'number') $(selector).val(valor[idLlave]);
                }


            });


        });


    });

}
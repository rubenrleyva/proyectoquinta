/**
 * Función encargada de las opciones de la tabla.
 */
function tabla() {

    $('#usotabla').DataTable({
        "language": {
            "sProcessing": "Procesando...",
            "sLengthMenu": "Mostrar _MENU_ registros",
            "sZeroRecords": "No se encontraron resultados",
            "sEmptyTable": "Ningún dato disponible en la tabla",
            "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sInfoPostFix": "",
            "sSearch": "Buscar:",
            "sUrl": "",
            "sInfoThousands": ",",
            "sLoadingRecords": "Cargando...",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast": "Último",
                "sNext": "Siguiente",
                "sPrevious": "Anterior"
            },
            "oAria": {
                "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                "sSortDescending": ": Activar para ordenar la columna de manera descendente"
            }
        },
        "pageLength": 4,
        "paging": true,
        "lengthChange": false,
        "searching": true,
        "ordering": true,
        "info": true,
        "scrollX": true
    });
}

/**
 *  Función encargada de activar o desactivar opciones en la creación o edición de usuarios.
 *  deprecated

function usuarios_deprecated(){

    $("#tipousuario").change(function () {

        if ($(this).val() == 1) {
            $("#matricula").prop('disabled', true);
            $("#clasespracticas").prop('disabled', true);
            $("#teorico").prop('disabled', true);
            $("#practico").prop('disabled', true);
        }else {
            $("#matricula").prop('disabled', false);
            $("#clasespracticas").prop('disabled', false);
            $("#teorico").prop('disabled', false);
            $("#practico").prop('disabled', false);
        }
    });
}*/

/**
 * Función encargada de activar o desactivar opciones en la creación o edición de usuarios.

function usuarios() {

    $("#datosextra").hide();
    $("#tipousuario").change(function () {
        if ($(this).val() == 2) {
            $("#datosextra").show();
            $("#matricula").attr('required', 'required');
            $("#clasespracticas").attr('required', 'required');
            $("#teorico").attr('required', 'required');
            $("#practico").attr('required', 'required');
        } else {
            $("#datosextra").hide();
            $("#matricula").removeAttr('required');
            $("#clasespracticas").removeAttr('required');
            $("#teorico").removeAttr('required');
            $("#practico").removeAttr('required');
        }
    });
}*/

/**
 * Función encargada de aumentar el IVA en función al precio sin IVA para permisos.
 */
function precioIva() {

    $('input[name=precioiva]').change(function () {
        $("#precio").val(($(this).val() / 1.21).toFixed(2));
    });
}

/**
 * Función encargada de aumentar el IVA en función al precio sin IVA para permisos.
 */
function precioIvaPagos() {

    var permiso = 0;
    var clases = 0;
    var juntos = 0;
    var ultimo = 0;

    $('select[name=numeroclases]').change(function () {

        clases = 0;

        juntos = 0;

        clases = $(this).val() * $('input[name=precioclases]').val();

        juntos = parseFloat(clases + parseFloat(permiso)).toFixed(2);

        juntosIva = parseFloat(juntos * 1.21).toFixed(2);

        $("#precio").val(juntos);
        $("#precioiva").val(juntosIva);
    });

    $('select[name=concepto]').change(function () {

        permiso = $(this).find(':selected').data('precio');

        if (permiso > 0){
            $('#precioclases').prop("readonly", true);   
            $('#precio').prop("readonly", true);
            $('#precioiva').prop("readonly", true);
            juntos = clases + parseFloat(permiso);
            ultimo = parseFloat(juntos * 1.21).toFixed(2);
            
        }else{
            $('#precioclases').removeAttr("readonly");     
            $('#precio').removeAttr("readonly");
            $('#precioiva').removeAttr("readonly");
            juntos = 0;
            ultimo = 0;
        }

        $("#numeroclases").val($(this).find(':selected').data('clase'));
        $("#precio").val(juntos);
        $("#precioiva").val(ultimo);
    });
}

var numeroPregunta = 0;
var numeroRespuesta = 0;


/**
 *  Función encargada de introducir nuevas preguntas en las encuestas.
 */
function nuevaPreguntasEncuesta(){

    $("#nuevaPregunta").click(function () {
        numeroPregunta++;
        $("#nuevasPreguntas").append("<div id='preguntas" + numeroPregunta + "' class='form-group row'>"
                + "<div class='col-md-4'>"
                    + "<label for='pregunta" + numeroPregunta + "' class='col-md-12 col-form-label text-right'>Pregunta</label>"
                +"</div>"
                + "<div class='col-md-1'>"
                    + "<input id='preguntanumero" + numeroPregunta + "' type='text' class='form-control @error('preguntanumero" + numeroPregunta + "') is-invalid @enderror' name='preguntanumero" + numeroPregunta + "' autocomplete='preguntanumero" + numeroPregunta + "' placeholder='Nº' autofocus>"
                + "</div>"
                +"<div class='col-md-4'>"
                    + "<input id='pregunta" + numeroPregunta + "' type='text' class='form-control @error('pregunta" + numeroPregunta + "') is-invalid @enderror' name='pregunta" + numeroPregunta + "' autocomplete='pregunta" + numeroPregunta +"' placeholder='Introduce la pregunta*' autofocus>"
                +"</div>"
            + "</div>"
        );
    });

    $("#borrarPregunta").click(function () {
        $('#preguntas' + numeroPregunta).remove();
        $('#nuevasRespuestas' + numeroPregunta).remove();
        numeroPregunta--;
    });
}

/**
 *  Función encargada de introducir nuevas preguntas en las encuestas.
 */
function nuevaRespuestasEncuesta() {

    $("#nuevaRespuesta").click(function () {
        numeroRespuesta++;
        $("#nuevasRespuestas").append("<div id='respuestas" + numeroRespuesta + "' class='form-group row'>"
                + "<div class='col-md-4'>"
                    + "<label for='respuesta" + numeroRespuesta + "' class='col-md-12 col-form-label text-right'>Respuesta</label>"
                + "</div>"
                + "<div class='col-md-5'>"
                    + "<input id='respuesta" + numeroRespuesta + "' type='text' class='form-control @error('respuesta" + numeroRespuesta + "') is-invalid @enderror' name='respuesta" + numeroRespuesta + "' autocomplete='respuesta" + numeroRespuesta + "' autofocus>"
                + "</div>"
                + "<div class='col-md-3'>"

                + "</div>"
            + "</div>"
        );
    });

    $("#borrarRespuesta").click(function ()  {
        $('#respuestas' + numeroRespuesta).remove();
        numeroRespuesta--;
    });

}

/**
 * Función encargada de cambiar los colores de las barras estadísticas.
 */
function coloresEstadistica(){

    var numItems = $('.progress-bar').length;
    var primerNumero = parseInt($('.progress-bar').attr('data-id'));
    for (let inicio = 0; inicio < numItems; inicio++) {
        var colores = Math.floor(Math.random() * 16777215).toString(16);
        $('.color_' + primerNumero).css('background-color', '#'+colores);
        primerNumero++;
    }
}

/**
 * Función encargada de mostrar un popover de borrado.
 * @param  {number} valor El Id de la imagen a borrar.
 */
function borrarFoto(valor) {

    // Añadimos lo que queremos que tenga el popup
    var popupElement = '<a href="' + valor + '" class="btn color" id="popbutton">¿Borrar?</i></a>';

    // Opciones del popover.
    $('#popbutton').popover({
        animation: true,
        content: popupElement,
        html: true
    });
}

/**
 * Función encargada de mostrar un popover de borrado.
 */
function precios() {

    var sumaPrecio = 0;
    var sumaPrecioIva = 0;

    $(".precioferta").each(function () {

        var value = $(this).text();

        if (!isNaN(value) && value.length != 0) {
            sumaPrecio += parseFloat(value);
        }
    });

    $('#nuevo').text(sumaPrecio);

    $(".precioiva").each(function () {

        var value = $(this).text();

        if (!isNaN(value) && value.length != 0) {
            sumaPrecioIva += parseFloat(value);
        }
    });

    $('#nuevoiva').text(sumaPrecioIva);
}

/**
 * Función encargada de la preview de la foto
 * @param {foto} input
 */
function previewFoto(input) {

    // Si tenemos la foto 
    if (input.files && input.files[0]) {

        // instanciamos FileReader
        var reader = new FileReader();

        // y cargamos la foto en una preview.
        reader.onload = function (e) {
            $('#preview').attr('src', e.target.result);
        }

        // contiene la URL de la foto
        reader.readAsDataURL(input.files[0]);
    }
}

/**
 * Función encargada mostrar información de los cursos.
 */
function infoPermisos() {

    $(".permisos").hide();

    // Al entrar el ratón cambia muestra los precios que le corresponde.
    $('.course-item').mouseenter(function () {
     
        // Para el uso de los permisos básicos.
        if ($("h4", this).first().text() == 'básicos'){

            $("p", this).text('Permisos B, A.M. y A1/A2.');

            $(".heading.servicio").text('servicios básicos').fadeIn("slow");
            $(".excerpt.servicio").text('Permisos B, A.M. y A1/A2.').fadeIn("slow");

            $(".permisos-profesionales").hide();
            $(".titulaciones").hide();
            $(".cursos").hide();
            $(".permisos-basicos").fadeIn("slow");
  
        // Para el uso de los permisos profesionales.
        } else if ($("h4", this).first().text() == 'profesionales'){

            $("p", this).text('Permisos C, C1, D, D1 y E.');

            $(".heading.servicio").text('servicios profesionales').fadeIn("slow");
            $(".excerpt.servicio").text('Permisos C, C1, D, D1 y E.').fadeIn("slow");

            $(".permisos-basicos").hide();
            $(".titulaciones").hide();
            $(".cursos").hide();
            $(".permisos-profesionales").fadeIn("slow");

        // Para el uso de los cursos
        } else if ($("h4", this).first().text() == 'cursos') {

            $("p", this).text('Certificados de aptitud profesional, aplicador de fitosanitarios y manipulador de alimentos.');

            $(".heading.servicio").text('cursos');
            $(".excerpt.servicio").text('Certificados de aptitud profesional, aplicador de fitosanitarios y manipulador de alimentos.').fadeIn("slow");

            $(".permisos-basicos").hide();
            $(".permisos-profesionales").hide();
            $(".titulaciones").hide();
            $(".cursos").fadeIn("slow");

        // Para el uso de las titulaciones.
        }else if ($("h4", this).first().text() == 'titulaciones') {

            $("p", this).text('Conductores de torillo, camión autoportante y retroexcavadora.');

            $(".heading.servicio").text('titulaciones').fadeIn("slow");
            $(".excerpt.servicio").text('Conductores de torillo, camión autoportante y retroexcavadora.').fadeIn("slow");

            $(".permisos-basicos").hide();
            $(".permisos-profesionales").hide();
            $(".cursos").hide();
            $(".titulaciones").fadeIn("slow");
        }
    });

    // Al sacar el ratón cambiá de nuevo de texto.
    $('.course-item').mouseleave(function () {

        $("p", this).text('Más información.');

    });
}

/**
 * Función encargada de cambiar los checkbox
 */
function eleccion(){
    
    $('#respuesta-check1').click(function () {

        if ($(this).prop('checked')) {
            $('#respuesta-check2').prop('checked', false);
            $('#respuesta-check3').prop('checked', false);
        }
    });

    $('#respuesta-check2').click(function () {

        if ($(this).prop('checked')) {
            $('#respuesta-check1').prop('checked', false);
            $('#respuesta-check3').prop('checked', false);
        }
    });

    $('#respuesta-check3').click(function () {
        if ($(this).prop('checked')) {
            $('#respuesta-check1').prop('checked', false);
            $('#respuesta-check2').prop('checked', false);
        }
    });
}


/**
 * Función encargada de validar los checkbox
 */
function validarCheckbox(){
    
    // Buscamos los checkbox
    const checkbox = $('input[type=checkbox]');

    // Comprobamos el número de checkbox que tenemos
    const checkBoxTamano = checkbox.length;

    // Si el tamaño del checkbox es mayor a cero le damos su posición
    // al primer checkbox
    const primerCheckBox = checkBoxTamano > 0 ? checkbox[0] : null;

    // Función de inicio
    function init() {

        // Si existe el primer checkbox
        if (primerCheckBox) {

            // recorremos los checkbox
            for (let i = 0; i < checkBoxTamano; i++) {

                // comprobamos el cambio
                // checkbox[i].addEventListener('change', checkValidity);
                $(checkbox[i]).change(checkValido);
            }

            checkValido();
        }
    }

    // Función encargada de comprobar si se encuentra chekeado
    function checked() {

        // recorremos los checkbox
        for (let i = 0; i < checkBoxTamano; i++) {

            // si se encuentra checkeado retornamos true
            if (checkbox[i].checked) return true;
        }

        // en caso contrario false
        return false;
    }

    // Función encargada de mostrar el mensaje
    function checkValido() {
        const errorMessage = !checked() ? 'Selecciona una de estas opciones.' : '';
        primerCheckBox.setCustomValidity(errorMessage);
    }

    // Comenzamos
    init();
}

/**
 *  Función encargada de introducir nuevas preguntas en las encuestas
 *  deprecated

function nuevaRespuestasEncuestaBotones_deprecated() {

    $(document).on("click", "#nuevarespuesta", function () {
        numeroRespuesta++;
        $("#nuevasRespuestas" + numeroPregunta).append("<div id='respuestas" + numeroRespuesta + "' class='form-group row'>"
            + "<label for='respuesta" + numeroRespuesta + "' class='col-md-4 col-form-label text-right'>Respuesta " + numeroRespuesta + "</label>"
            + "<div class='col-md-4'>"
            + "<input id='respuesta" + numeroRespuesta + "' type='text' class='form-control @error('respuesta" + numeroRespuesta + "') is-invalid @enderror' name='respuesta" + numeroRespuesta + "' autocomplete='respuesta" + numeroRespuesta + "' autofocus>"
            + "</div>"
            + "</div>"
        );
    });

    $(document).on("click", "#quitarespuesta", function () {
        $('#respuestas' + numeroRespuesta).remove();
        numeroRespuesta--;
    });
}*/

/**
 *  Función encargada de introducir nuevas preguntas en las encuestas
 *  deprecated

function nuevaPreguntasEncuestaBotones_deprecated() {

    $("#nuevaPregunta").click(function () {
        numeroPregunta++;
        $("#nuevasPreguntas").append("<div id='preguntas" + numeroPregunta + "' class='form-group row'>"
            + "<label for='pregunta" + numeroPregunta + "' class='col-md-4 col-form-label text-right'>Pregunta " + numeroPregunta + "</label>"
            + "<div class='col-md-4'>"
            + "<input id='pregunta" + numeroPregunta + "' type='text' class='form-control @error('pregunta" + numeroPregunta + "') is-invalid @enderror' name='pregunta" + numeroPregunta + "' autocomplete='pregunta" + numeroPregunta + "' autofocus>"
            + "</div>"
            + "<div class='col-md-4'>"
            + "<a id='nuevarespuesta' data-numeropregunta='" + numeroPregunta + "' class='btn color wow mb-10'><i class='icofont icofont-plus'></i></a>"
            + "<a id='quitarespuesta' data-numeropregunta='" + numeroPregunta + "'class='btn color wow mb-10'><i class='icofont icofont-minus'></i></a>"
            + "</div>"
            + "</div>"
            + "<div id='nuevasRespuestas" + numeroPregunta + "'></div>"
        );
    });

    $("#borrarPregunta").click(function () {
        $('#preguntas' + numeroPregunta).remove();
        $('#nuevasRespuestas' + numeroPregunta).remove();
        numeroPregunta--;
    });
}*/

/**
 *  Función encargada de introducir nuevas preguntas en las encuestas
 *  deprecated.

function nuevaRespuestasEncuesta_deprecated() {

    $("#añadirespuesta" + numeroPregunta).click(function () {
        numeroRespuesta++;
        $("#nuevasRespuestas" + numeroPregunta).append("<div id='respuestas" + numeroRespuesta + "' class='form-group row'>"
            + "<label for='respuesta" + numeroRespuesta + "' class='col-md-4 col-form-label text-right'>Respuesta " + numeroRespuesta + "</label>"
            + "<div class='col-md-4'>"
            + "<input id='respuesta" + numeroRespuesta + "' type='text' class='form-control @error('respuesta" + numeroRespuesta + "') is-invalid @enderror' name='respuesta" + numeroRespuesta + "' autocomplete='respuesta" + numeroRespuesta + "' autofocus>"
            + "</div>"
            + "</div>"
        );

    });

    $("#quitarespuesta" + numeroPregunta).click(function () {
        $('#respuestas' + numeroRespuesta).remove();
        numeroRespuesta--;
    });
}*/

/**
 *  Función encargada de introducir nuevas preguntas en las encuestas
 *  deprecated.

function nuevaPreguntasEncuesta_deprecated(){

    $("#nuevaPregunta").click(function () {
        numeroPregunta++;
        $("#nuevasPreguntas").append("<div id='preguntas" + numeroPregunta + "' class='form-group row'>"
            + "<label for='pregunta" + numeroPregunta + "' class='col-md-4 col-form-label text-right'>Pregunta " + numeroPregunta+"</label>"
                +"<div class='col-md-4'>"
                    + "<input id='pregunta" + numeroPregunta + "' type='text' class='form-control @error('pregunta" + numeroPregunta + "') is-invalid @enderror' name='pregunta" + numeroPregunta + "' autocomplete='pregunta" + numeroPregunta +"' autofocus>"
                +"</div>"
                + "<div class='col-md-4'>"
                    + '<a id="añadirespuesta'+numeroPregunta+'" class="btn color wow fadeInLeft mb - 10"><i class="icofont icofont-plus"></i></a>'
                    + "<a id='quitarespuesta"+numeroPregunta+"' class='btn color wow fadeInLeft mb - 10'><i class='icofont icofont-minus'></i></a>"
                + "</div>"
            + "</div>"
            + "<div id='nuevasRespuestas" + numeroPregunta +"'></div>"
        );

    });

    $("#borrarPregunta").click(function () {
        $('#preguntas' + numeroPregunta).remove();
        numeroPregunta--;
    })
}*/

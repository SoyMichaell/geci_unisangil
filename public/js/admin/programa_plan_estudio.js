$(function() {

    var tipoestudiante = $('#estu_administrativo').val();

    if (tipoestudiante == 'Si') {
        $('#administrativo-estudiante').show();
    } else {
        $('#estu_administrativo').on('change', onSelectTipoEstudiante);
        $('#administrativo-estudiante').hide();
    }
});

function onSelectTipoEstudiante() {
    var tipoestudiante = $('#estu_administrativo').val();
    if (tipoestudiante == 'Si') {
        $('#administrativo-estudiante').show();
    } else {
        $('#estu_administrativo').on('change', onSelectTipoEstudiante);
        $('#administrativo-estudiante').hide();
    }
}

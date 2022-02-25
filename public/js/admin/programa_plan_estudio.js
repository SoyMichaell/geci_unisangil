$(function() {
    $('#estu_programa').on('change', onSelectProgramaEstudio);
    $('#estu_departamento').on('change', onSelectMunicipio);
});

function onSelectProgramaEstudio() {
    var id_programa_plan = $(this).val();

    $.get('/programa/' + id_programa_plan + '/selectivoplan', function(data) {
        var html_select = '<option value="">---- SELECCIONE PLAN DE ESTUDIO ----</option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].id + '">' + data[i].pp_nombre + '</option>';
        $('#estu_programa_plan').html(html_select);
    });
}

function onSelectMunicipio() {
    var id_municipio_plan = $(this).val();

    $.get('/programa/' + id_municipio_plan + '/selectivomunicipio', function(data) {
        var html_select = '<option value="">---- SELECCIONE MUNICIPIO ----</option>';
        for (var i = 0; i < data.length; ++i)
            html_select += '<option value="' + data[i].id + '">' + data[i].mun_nombre + '</option>';
        $('#estu_ciudad').html(html_select);
    });
}
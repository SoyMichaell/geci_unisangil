$(function() {
    var tipo_usuario = $('#per_tipo_usuario').val();
    if (tipo_usuario == '1' || tipo_usuario == '2' || tipo_usuario == '4' || tipo_usuario == '9' || tipo_usuario == '10') {
        $('#rol-credentials').show();

    } else {
        $('#rol-credentials').hide();
    }
    $('#per_tipo_usuario').on('change', onChangeUser);
    console.log(tipo_usuario);
});

function onChangeUser() {
    var tipo_usuario = $('#per_tipo_usuario').val();
    console.log(tipo_usuario);
    if (tipo_usuario == '1' || tipo_usuario == '2' || tipo_usuario == '4' || tipo_usuario == '9' || tipo_usuario == '10') {
        $('#rol-credentials').show();

    } else {
        $('#rol-credentials').hide();
    }
}
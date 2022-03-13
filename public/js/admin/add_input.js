$(document).ready(function() {
    var maxField = 10; //Input fields increment limitation
    var addButton = $('.add_button'); //Add button selector
    var wrapper = $('.par_wrapper'); //Input field wrapper
    var fieldHTML = '<div class="row mb-3"><div class="col-md-4"><input class="form-control mt-2" type="number" name="exseredpar_numero_identificacion[]" placeholder="Número de identificacioón" value=""/></div><div class="col-md-4"><input class="form-control mt-2" type="text" name="exseredpar_nombre_participante[]" placeholder="Nombre completo" value=""/></div><div class="col-md-4"><select class="form-select mt-2" name="exseredpar_rol_participante[]"><option value="">---- SELECCIONE ----</option><option value="estudiante">Estudiante</option><option value="docente">Docente</option><option value="administrativo">Administrativo</option><option value="directivo">Directivo</option><option value="egresado">Egresado</option></select></div><a style="width:50px" href="javascript:void(0);" class="btn btn-danger mt-1 remove_button" title="Remove field"><i class="fa-solid fa-trash"></i></a></div>'; //New input field html 
    var x = 1; //Initial field counter is 1
    $(addButton).click(function() { //Once add button is clicked
        cant = $('#cantidad').val();
        if (x <= cant) { //Check maximum number of input fields
            x++; //Increment field counter
            $(wrapper).append(fieldHTML); // Add field html
        }
    });
    $(wrapper).on('click', '.remove_button', function(e) { //Once remove button is clicked
        e.preventDefault();
        $(this).parent('div').remove(); //Remove field html
        x--; //Decrement field counter
    });
});
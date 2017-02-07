'use strict';

var form_agregar_pagina = $("#form_agregar_pagina");
var btn_eliminar_pagina = $("#btn_eliminar_pagina");

$(function(){

	// validar formulario y enviar
	form_agregar_pagina.on('submit', function(e){

		$(this).validate({
            rules: {

                input_nombre: {
                    required: true
                },
                input_controller: {
                    required: true
                }
            },
            messages: {

                input_nombre: {
                    required: 'Campo requerido',
                },
                input_controller: {
                    required: 'Campo requerido',
                }
            },
            errorPlacement: function(error, element) {
                if (element.is(":radio") || element.is(":checkbox")) {
                    element.closest('.option-group').after(error);
                }
                else {
                    error.insertAfter(element);
                }
            }
        });

        if($(this).valid(true))
        {
            $(this).submit();
        }else{
            e.preventDefault();
        }

	});

});
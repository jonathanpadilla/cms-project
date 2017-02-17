'use strict'

var btn_agregar_bloque 		= $(".btn_agregar_bloque");
var modal_nuevo_bloque 		= $("#modal_nuevo_bloque");
var btn_agregar_texto 		= $(".btn_agregar_texto");
var btn_eliminar_seccion 	= $(".btn_eliminar_seccion");
var btn_eliminar_bloque 	= $(".btn_eliminar_bloque");

$(function(){

	btn_agregar_bloque.on('click', function(e){
		e.preventDefault();

		var btn = $(this);

		$.ajax({
			url: Routing.generate('admin_pagina_bloques_agregar_cargar_form'),
			method: 'post',
			data: {'tipo': btn.data('tipo'), 'pagina': btn.data('pagina')},
			dataType: 'html'
		}).done(function(html){
			if(html)
			{
				$("#nuevo_bloque_content").html(html);
				modal_nuevo_bloque.modal('show');
			}
		});
	});

	btn_agregar_texto.on('click', function(e){
		e.preventDefault();

		var btn = $(this);
		var data = {'tipo': btn.data('tipo'), 'bloque': btn.data('bloque')};

		if($(this).attr('data-min') && $(this).attr('data-max') && $(this).attr('data-id'))
		{
			data.min 	= btn.data('min');
			data.max 	= btn.data('max');
			data.id 	= btn.data('id');
		}

		$.ajax({
			url: Routing.generate('admin_pagina_bloques_agregar_texto'),
			data: data,
			method: 'post',
			dataType: 'html'
		}).done(function(html){
			$("#nuevo_bloque_content").html(html);
			modal_nuevo_bloque.modal('show');
		});

	});

	btn_eliminar_seccion.on('click', function(e){
		e.preventDefault();

		var btn = $(this);

		if(confirm('¿Eliminar?'))
		{
			$.ajax({
				url: Routing.generate('admin_pagina_bloques_eliminar_seccion'),
				data: {'id': btn.data('id')},
				method: 'post',
				dataType: 'json'
			}).done(function(json){
				if(json.result)
				{
					location.reload(true);
				}
			});
		}
	});

	btn_eliminar_bloque.on('click', function(e){
		e.preventDefault();

		var btn = $(this);

		if(confirm('¿Eliminar?'))
		{
			$.ajax({
				url: Routing.generate('admin_pagina_bloques_eliminar'),
				data: {'id': btn.data('id')},
				method: 'post',
				dataType: 'json'
			}).done(function(json){
				if(json.result)
				{
					location.reload(true);
				}
			});
		}
	})

});
'use strict'

var btn_agregar_bloque = $(".btn_agregar_bloque");
var modal_nuevo_bloque = $("#modal_nuevo_bloque");

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
});
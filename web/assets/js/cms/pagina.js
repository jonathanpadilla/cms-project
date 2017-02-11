'use strict';

var btn_editar = $(".btn_editar");
var modal_pagina = $("#modal_pagina");

$(function(){

	btn_editar.on('click', function(e){
		e.preventDefault();

		var btn = $(this);

		$.ajax({
			url: Routing.generate('admin_pagina_editar_item'),
			data: {'id': btn.data('id'), 'tipo': btn.data('tipo'), 'value': btn.data('value')},
			method: 'post',
			dataType: 'html'
		}).done(function(html){
			modal_pagina.find("#modal_content").html(html);
			modal_pagina.modal('show');
		});

	});

});
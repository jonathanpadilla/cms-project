var btn_edit = $(".btn_edit");

$(function(){
	'use strict';

	btn_edit.find('a').on('click', function(e){
		e.preventDefault();

		$('#modal_editar_texto').modal('show');
	});
});
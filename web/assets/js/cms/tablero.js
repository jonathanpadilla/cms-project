'use strict';

var btn_eliminar_pagina = $(".btn_eliminar_pagina");

$(function(){

	btn_eliminar_pagina.on('click', function(e){
		if(confirm('¿Eliminar pagina?'))
		{
			return true;
		}else{
			e.preventDefault();
		}
	});

});
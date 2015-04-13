// Funcion Carga Ajax

$.ajaxSetup({'beforeSend' : function(xhr) {
	if (xhr.overrideMimeType) {
		//FF & Chrome
		xhr.overrideMimeType('text/html; charset=UTF-8');
		}
	}
});

/* Funciones Comunes */

$(function(){
	$('.infobubbles_center').delay(1500).fadeOut(300);
});
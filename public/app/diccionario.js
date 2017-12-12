$(document).ready(function() {
	diccionario('');
});


function diccionario(valor) {
	$.ajax({
		url: 'http://127.0.0.1:8000/diccionario',
		type: 'POST)',
		dataType: 'json',
		data: {param1: valor},
		success:function(respuesta) {
			alert(respuesta);
		}
	})
}
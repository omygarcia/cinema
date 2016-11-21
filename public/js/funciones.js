//;
var BASE_URL = "http://127.0.0.1:8080/cine/public/"; 

$(document).on("ready",main);

function main()
{

//Funcion para registrar los generos
$("#registro").click(function(event){
	//alert("todo ok");
	event.preventDefault();
	var route = BASE_URL+"genero";
	var token = $("input[name=_token").val();
	var genero = $("#txt_genero").val();
	var datos = {"genero":genero};
	$.ajax({
		url:route,
		type:"POST",
		data:datos,
		headers: {"X-CSRF-TOKEN":token},
		dataType:"json",
		before:
			function()
			{
				$("#bar-loader").show();
			},
		complete:
			function()
			{
				$("#bar-loader").hide();
			},
		success:
			function(response)
			{
				//alert("gf");
				console.log(response);
				$("#mensaje").html(response.mensaje);
			},
		error:
			function(response)
			{
				console.log(response);
			}
	});
});

//funcion para listar generos
var tabla = $("#tabla-genero");
$.get(BASE_URL+"generos",function(response){
	$(response).each(function(clave,valor){
		tabla.append("<tr><td>"+valor.genre+"</td><td><a href='#' class='btn btn-azul'>Editar</a><a href='#' class='btn btn-rojo'>Eliminar</a></td></tr>");
	});
});

}




function ocultar()
{
	$(".alert-success").hide();
}

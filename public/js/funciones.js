//;
var BASE_URL = "http://127.0.0.1:8080/cine/public/"; 

$(document).on("ready",main);

function main()
{

//Funcion para registrar los generos
$("#registro").click(function(event){
	event.preventDefault();
	//alert("todo ok");
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
		beforeSend:
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
				$("#mensaje_success").html(response.respuesta).addClass("show").removeClass("hide");
				$("#mensaje_danger").html("").addClass("hide").removeClass("show");
			},
		error:
			function(response)
			{
				console.log(response);
				var mensaje = "";
	
					$.each(response.responseJSON,function(clave,valor){
						mensaje+="-"+valor+"<br />";
					});
				
				//response.responseJSON.genero[0]
				$("#mensaje_danger").addClass("show").removeClass("hide");
				$("#mensaje_danger_text").html(mensaje);
				$("#mensaje_success").html("").addClass("hide").removeClass("show");
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


$("[data-hide]").click(function(event){
	event.preventDefault();
	alert("todo Ok");
	$(this).parent().addClass("show").removeClass("hide");
});

}

$(document).on("click",".pagination a",function(event){
	event.preventDefault();
	var page = $(this).attr("href").split("page=")[1];
	var route = BASE_URL+"usuario";

	$.ajax({
		url:route,
		type:"GET",
		data:{"page":page},
		dataType:"json",
		success:
			function(response)
			{
				//console.log(response);
				$(".user").html(response);
			}
	});

	//console.log(page);
});




/*function ocultar()
{
	$(".alert-success").hide();
}*/

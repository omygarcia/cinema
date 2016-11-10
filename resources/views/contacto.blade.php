@extends("layouts.principal")
@section("content")
		<div class="main">
		<div class="contact-content">
			<div class="top-header span_top">
				<div class="logo">
					<a href="index.html"><img src="images/logo.png" alt="" /></a>
					<p>Movie Theater</p>
				</div>
				<div class="search v-search">
					<form>
						<input type="text" value="Search.." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search..';}"/>
						<input type="submit" value="">
					</form>
				</div>
				<div class="clearfix"></div>
			</div>
			<!---contact-->
<div class="main-contact">
		@if(Session::has("mensaje"))
			<div id="mensaje-success" class="alert alert-success">
				{{ Session::get("mensaje") }}
				<button class="btn-alert-success" onclick="ocultar();">x</button>
			</div>
		@endif
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{!! $error !!}</li>
					@endforeach
				</ul>
				<button class="btn-alert-errors" onclick="ocultar();">x</button>
			</div>
		@endif
		 <h3 class="head">CONTACT</h3>
		 <p>WE'RE ALWAYS HERE TO HELP YOU</p>
		 <div class="contact-form">
			 {!! Form::open(["route"=>"mail.store","method"=>"POST"]) !!}
			 	{!! csrf_field() !!}
				 <div class="col-md-6 contact-left">
					  <input type="text" name="name" placeholder="name" required/>
					  <div id="name-errors" class="alert alert-danger"></div>
					  <input type="text" name="mail" placeholder="mail" required/>
					  <div id="mail-errors" class="alert alert-danger"></div>
<!--					  <div class="g-recaptcha" data-sitekey="6LfqFAsUAAAAAP5Hal21fCeGCazV9jsJMJ-00tnH"></div>-->
{!! Recaptcha::render() !!}
<div id="g-recaptcha-errors" class="alert alert-danger"></div>
					  <!--<input type="text" placeholder="phone" required/>-->
				  </div>
				  <div class="col-md-6 contact-right">
					 <textarea name="mensaje" placeholder="Message"></textarea>
					 <div id="mensaje-errors" class="alert alert-danger"></div>
					 <input type="submit" value="SEND" onclick="validaFormContacto()"/>
				 </div>
				 <div class="clearfix"></div>

			 {!! Form::close() !!}
	     </div>
		 <div class="contact_info">
			 <h3>Find Us Here</h3>
			 <div class="map">
				<iframe width="100%" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265&amp;output=embed"></iframe><br><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=Lighthouse+Point,+FL,+United+States&amp;aq=4&amp;oq=light&amp;sll=26.275636,-80.087265&amp;sspn=0.04941,0.104628&amp;ie=UTF8&amp;hq=&amp;hnear=Lighthouse+Point,+Broward,+Florida,+United+States&amp;t=m&amp;z=14&amp;ll=26.275636,-80.087265" style="color:#000;text-align:left;font-size:12px">View Larger Map</a></small>
			</div>
	 </div>
</div>
<script src='https://www.google.com/recaptcha/api.js'></script>
<script>
function validaFormContacto()
{
	event.preventDefault();
	//alert("click");
	var token = $("input[name=_token]").val();
	var route = "{{route("mail.store")}}";
	var name = $("input[name=name").val();
	var mail = $("input[name=mail").val();
	var mensaje = $("textarea[name=mensaje").val();
	var recaptcha = $("#g-recaptcha-response").val();
	var datos = {"name":name,"mail":mail,"g-recaptcha-response":recaptcha,"mensaje":mensaje};
	console.log(datos);
	$.ajax({
		url:route,
		headers: {"X-CSRF-TOKEN":token},
		type:"post",
		dataType:"json",
		data:datos,
		success:
			function(respuesta)
			{
				//console.log("mensaje enviado");
				$("#name-errors").fadeOut();
				$("#mail-errors").fadeOut();
				$("#g-recaptcha-errors").fadeOut();
				$("#mensaje-errors").fadeOut();
				$("#mensaje-success").html("mensaje enviado correctamente").fadeIn();
			},
		error:
			function(respuesta)
			{
				//alert("todo ok");
				console.log(respuesta);

				if(respuesta.responseJSON.name != null){$("#name-errors").html(respuesta.responseJSON.name).fadeIn()}else{$("#name-errors").fadeOut();}
				(respuesta.responseJSON.mail!=null)?$("#mail-errors").html(respuesta.responseJSON.mail).fadeIn():$("#mail-errors").fadeOut();
				(respuesta.responseJSON["g-recaptcha-response"]!=null)?$("#g-recaptcha-errors").html(respuesta.responseJSON["g-recaptcha-response"][0]+"<br />"+respuesta.responseJSON["g-recaptcha-response"][1]).fadeIn():$("#g-recaptcha-errors").fadeOut();
				(respuesta.responseJSON.mensaje!=null)?$("#mensaje-errors").html(respuesta.responseJSON.mensaje).fadeIn():$("#mensaje-errors").fadeOut();
			}
	});
}
</script>
@stop

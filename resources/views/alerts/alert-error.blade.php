@if(Session::has("mensaje-error"))
	<div class="alert alert-danger">
		{{ Session::get("mensaje-error") }}
	</div>
@endif
<div id="mensaje_danger" class="alert alert-danger hide">
	<a href="#" class="close" data-hide="alert" aria-label="close">&times;</a>
	<div id="mensaje_danger_text"></div>
</div>
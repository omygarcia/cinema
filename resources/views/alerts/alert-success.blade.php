@if(Session::has("mensaje-success"))
	<div class="alert alert-success">
		{{ Session::get("mensaje-success") }}
	</div>
@endif
<div id="mensaje_success" class="alert alert-success hide">
</div>
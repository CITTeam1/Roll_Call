@if (Session::get('success') != "")
	<div class="form-group">
		<div class="alert alert-success">
			{{Session::get('success')}}
		</div>
	</div>
@endif
@if (Session::get('denied') != "")
	<div class="form-group">
		<div class="alert alert-danger">
			{{Session::get('denied')}}
		</div>
	</div>
@endif
@if (Session::get('warning') != "")
	<div class="form-group">
		<div class="alert alert-warning">
			{{Session::get('warning')}}
		</div>
	</div>
@endif
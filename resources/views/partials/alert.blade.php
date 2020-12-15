@if(session('success'))

<div class="alert alert-dismissible alert-success mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Success!</strong> {{session('success')}} .
</div>

@endif



@if(session('error'))

<div class="alert alert-dismissible alert-danger mt-2">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Oh snap!</strong> {{session('error')}} .
</div>

@endif
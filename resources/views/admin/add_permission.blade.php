@extends('layouts.admin_app')

@section('content')
<div class="text-right">
	<a href="{{ route('admin.permissions') }}" class="btn btn btn-danger mb-3">Back</a>
</div>
<form action="{{ route('admin.add_permission') }}" class="was-validated" method="POST">
	@csrf
    <div class="form-group">
      	<label for="uname">Permission:</label>
      	<input type="text" class="form-control" id="role" placeholder="Add Permission" name="name" required>
      	<div class="valid-feedback">Valid.</div>
      	<div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

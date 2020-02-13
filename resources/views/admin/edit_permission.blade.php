@extends('layouts.admin_app')

@section('content')
<div class="text-right">
	<a href="{{ route('admin.permissions') }}" class="btn btn btn-danger mb-3">Back</a>
</div>
<form action="{{ route('admin.edit_permission',['permission_id'=>$permission_id]) }}" class="was-validated" method="POST">
	@csrf
    <div class="form-group">
      	<label for="uname">Permission:</label>
      	<input type="text" class="form-control" id="role" placeholder="Edit Permission" name="name" required value="{{ $permission->name }}">
      	<div class="valid-feedback">Valid.</div>
      	<div class="invalid-feedback">Please fill out this field.</div>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

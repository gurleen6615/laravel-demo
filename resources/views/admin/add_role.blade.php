@extends('layouts.admin_app')

@section('content')
<div class="text-right">
	<a href="{{ route('admin.roles') }}" class="btn btn btn-danger mb-3">Back</a>
</div>
<form action="{{ route('admin.add_role') }}" class="was-validated" method="POST">
	@csrf
    <div class="form-group">
      	<label for="uname">Role:</label>
      	<input type="text" class="form-control" id="role" placeholder="Add Role" name="role" required>
      	<div class="valid-feedback">Valid.</div>
      	<div class="invalid-feedback">Please fill out this field.</div>
    </div>
     <div class="form-group ">
        <label>Permissions for this Role:</label>
        @foreach ($permissions as $permission)
         <label class="form-check-label form-check">
            <input class="form-check-input" type="checkbox" name="permissions[]"value="{{ $permission->name }}"> {{ $permission->name }}
        </label>
        @endforeach
       
      
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
@endsection

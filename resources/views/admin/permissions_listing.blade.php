@extends('layouts.admin_app')

@section('content')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="text-right">
	<a href="{{ route('admin.add_permission') }}" class="btn btn btn-danger mb-3">Add Permission</a>
</div>
<table class="table table-striped">
	<tr>
		<th>Permission Name</th>
		<th style="width:35%;">Actions</th>
	</tr>	
	@foreach($permissions as $permission)
		<tr>
			<td>
				{{$permission->name}}
			</td>
			<td>
				<a href="{{ route('admin.edit_permission',['permission_id'=>$permission->id]) }}" class="btn btn-primary mr-2">
					Edit Permission
				</a>
				<a href="{{ route('admin.delete_permission',['permission_id'=>$permission->id]) }}" class="btn btn-secondary mr-2">
					Delete Permission
				</a>
			</td>
		</tr>
	@endforeach
</table>
@endsection

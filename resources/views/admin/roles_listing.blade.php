@extends('layouts.admin_app')

@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="text-right">
	<a href="{{ route('admin.add_role') }}" class="btn btn btn-danger mb-3">Add Role</a>
</div>
<table class="table table-striped">
	<tr>
		<th style="width:65%;">Role Name</th>
		<th style="width:35%;">Actions</th>
	</tr>	
	@foreach($roles as $role)
		<tr>
			<td>
				{{$role->name}}
			</td>
			<td>
				<a href="{{ route('admin.edit_role',['role_id'=>$role->id]) }}" class="btn btn-primary mr-2">
					Edit Role
				</a>
				<a href="{{ route('admin.delete_role',['role_id'=>$role->id]) }}" class="btn btn-secondary mr-2">
					Delete Role
				</a>
			</td>
		</tr>
	@endforeach
</table>
{{ $roles->links() }}
@endsection

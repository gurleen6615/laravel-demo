@extends('layouts.admin_app')

@section('content')
@section('content')
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
<div class="text-right">
	<a href="{{ route('admin.update_permissions') }}" class="btn btn btn-danger mb-3">Update Permissions</a>
</div>
<table class="table table-striped">
	<tr>
		<th>Permission Controller</th>
		<th>Permission Action</th>
	</tr>	
	@foreach($permissions as $permission)
		<tr>
			@php
				$pArray = explode('_',$permission->name);
			@endphp
			<td>
				{{ $pArray[0] }}
			</td>
			<td>
				{{ $pArray[1] }}
			</td>
			
		</tr>
	@endforeach
</table>
@endsection

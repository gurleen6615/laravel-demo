@extends('layouts.admin_app')

@section('content')
<div class="alert alert-success success-box" style="display: none;">
    Data updated!
</div>
<div class="alert alert-danger error-box" style="display: none;">
    
</div>
<table class="table table-striped">
	<tr>
		<th>Username</th>
		<th>Email</th>	
		<th>Role</th>	
	</tr>	
	@foreach($users as $user)
		<tr>
			<td>
				{{$user->name}}
			</td>
			<td>
				{{$user->email}}
			</td>
			<td>
				@php
                   	$userRole = ""
                @endphp
				@foreach ($user->roles as $role1)
					@php
	                   	$userRole = $role1->name
	                @endphp
              	@endforeach
              	<input type="hidden" name="old_role" id="old_role_{{ $user->id }}" value="{{ $userRole }}">
				<select name="roles" class="form-control assign-role-to-user" data-id="{{$user->id}}"> 
					<option value="">Select Role</option>
					@foreach($roles as $role)
						<option value="{{ $role->name }}" @php if($userRole==$role->name){ echo "selected"; } @endphp>{{ $role->name }}</option>
					@endforeach
				</select>
			</td>
		</tr>
	@endforeach
</table>
@endsection


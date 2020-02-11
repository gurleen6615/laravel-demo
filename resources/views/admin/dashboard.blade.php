@extends('layouts.admin_app')

@section('content')
<table class="table table-striped">
<tr>
<th>Username</th>
<th>Email</th>	
</tr>	
@foreach($users as $user)
<tr>
<td>
	{{$user->name}}
</td>
<td>
	{{$user->email}}
</td>
</tr>
@endforeach
</table>
@endsection

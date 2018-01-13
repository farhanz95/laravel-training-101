@extends('layouts.app')

@section('content')
	
	@component('components.table')
		@slot('tbody')
			<tr>
				<th>Name</th>
				<td>{{ $user->name }}</td>
			</tr>
			<tr>
				<th>E-mail</th>
				<td>{{ $user->email }}</td>
			</tr>
			<tr>
				<th></th>
				<td>
					<div class="btn-group">
						<a href="{{ route('users.index')}}" class="btn btn-sm btn-danger">
						Back
						</a>
					</div>
				</td>
			</tr>
		@endslot
	@endcomponent
@endsection
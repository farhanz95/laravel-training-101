@extends('layouts.app')

@section('content')
	<form action="{{ route('users.update', $user->id) }}" method="POST">
	
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	
	@component('components.table')
		@slot('tbody')
			<tr>
				<th>Name</th>
				<td>
					<input type="text" 
					class="form-control" 
					name="name"
					value="{{ $user->name }}">

					@if ($errors->has('name'))
						<span class="has-block">
							<strong>{{ $errors->first('name') }}</strong>
						</span>
					@endif
				</td>
			</tr>
			<tr>
				<th>E-mail</th>
				<td>
					<input type="text" 
					class="form-control" 
					name="email" disabled
					value="{{ $user->email }}">
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div class="btn-group">
						<a href="{{ route('users.index')}}" class="btn btn-sm btn-danger">
							Back
						</a>
						<button class="btn btn-sm btn-success">Update</button>
					</div>
				</td>
			</tr>
		@endslot
	@endcomponent
@endsection


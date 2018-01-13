@extends('layouts.app')

@section('content')
	<form action="{{ route('users.store') }}" method="POST">
	
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
					value="">

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
					name="email"
					value="">

					@if ($errors->has('email'))
						<span class="has-block">
							<strong>{{ $errors->first('email') }}</strong>
						</span>
					@endif
				</td>
			</tr>
			<tr>
				<th>Password</th>
				<td>
					<input type="password" 
					class="form-control" 
					name="password"
					value="">

					@if ($errors->has('password'))
						<span class="has-block">
							<strong>{{ $errors->first('password') }}</strong>
						</span>
					@endif
				</td>
			</tr>
			<tr>
				<th>Confirm Password</th>
				<td>
					<input type="password" 
					class="form-control" 
					name="password_confirmation"
					value="">

					@if ($errors->has('password_confirmation'))
						<span class="has-block">
							<strong>{{ $errors->first('password_confirmation') }}</strong>
						</span>
					@endif
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div class="btn-group">
						<a href="{{ route('users.index')}}" class="btn btn-sm btn-danger">
							Back
						</a>
						<button class="btn btn-sm btn-success">Create</button>
					</div>
				</td>
			</tr>
		@endslot
	@endcomponent
@endsection


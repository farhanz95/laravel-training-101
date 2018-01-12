@extends('layouts.app')

@section('content')
	<form action="{{ route('post.update', $post->id) }}" method="POST">
	
	{{ csrf_field() }}
	{{ method_field('PUT') }}
	
	@component('components.table')
		@slot('tbody')
			<tr>
				<th>Name</th>
				<td>
					<input type="text" 
					class="form-control" 
					name="post_name"
					value="{{ $post->post_name }}">

					@if ($errors->has('post_name'))
						<span class="has-block">
							<strong>{{ $errors->first('post_name') }}</strong>
						</span>
					@endif
				</td>
			</tr>
			<tr>
				<th>E-mail</th>
				<td>
					<input type="text" 
					class="form-control" 
					name="post_email" disabled
					value="{{ $post->post_email }}">

					@if ($errors->has('post_email'))
						<span class="has-block">
							<strong>{{ $errors->first('post_email') }}</strong>
						</span>
					@endif
				</td>
			</tr>
			<tr>
				<td></td>
				<td>
					<div class="btn-group">
						<a href="{{ route('post.index')}}" class="btn btn-sm btn-danger">
							Back
						</a>
						<button class="btn btn-sm btn-success">Update</button>
					</div>
				</td>
			</tr>
		@endslot
	@endcomponent
@endsection


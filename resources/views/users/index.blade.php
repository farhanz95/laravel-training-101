@extends('layouts.app')

@section('content')
	@include('components.menutable', ['models' => $users])
	<div class="pull-right">
		{{ $users->links() }}
	</div>
	@component('components.table')
		@slot('thead')
			<tr>
				<th>#</th>
				<th>Name</th>
				<th>E-mail</th>`
				<th>Action</th>
			</tr>
		@endslot
		@slot('tbody')
			@forelse($users as $key => $user)
    		<?php $model = $user; ?>
			<tr>
				<td>
					{{
						($users->currentPage() * $users->perPage() - $users->perPage())+($key+1)
					}}
				</td>
				<td>{{ $user->name  }}</td>
				<td>{{ $user->email }}</td>
				<td>@include('components.actions')</td>
			</tr>
			@empty
			<tr>
				<td></td>
				<td></td>
				<td></td>
				<td></td>
			</tr>
			@endforelse
		@endslot
	@endcomponent
@endsection

@push('scripts')
<script>

$('body').on('change','.perPage',function(){
	var val = $(this).val();

	window.location.href = "{{ route('users.index') }}?page="+val;
})

</script>
@endpush
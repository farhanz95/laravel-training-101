<div class="btn-group">
	{{ $prepend_actions or '' }}
	<a class="btn btn-sm btn-primary" href=" {{ route($model->getTable().'.edit', $model->id) }} ">Edit</a>
	<a class="btn btn-sm btn-info" href=" {{ route($model->getTable().'.show', $model->id) }} ">View</a>

	<a class="btn btn-sm btn-danger" 
		href="{{ route($model->getTable().'.destroy', $model->id) }}"
		onclick="event.preventDefault();if(confirm('Are you sure want to delete this {{ $model->getTable() }} ?')){document.getElementById('destroy-{{ $model->getTable() }}-form-{{ $model->id }}').submit()}">
		Delete
	</a>
	<form id="destroy-{{ $model->getTable() }}-form-{{ $model->id }}" 
		action="{{ route($model->getTable().'.destroy', $model->id) }}"
		method="POST" style="display:none">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}		
	</form>
	{{ $append_actions or '' }}
</div>
<div class="btn-group">
	{{ $prepend_actions or '' }}
	<a class="btn btn-sm btn-primary" href=" {{ route('post.edit', $post->id) }} ">Edit</a>
	<a class="btn btn-sm btn-info" href=" {{ route('post.show', $post->id) }} ">View</a>

	<a class="btn btn-sm btn-danger" 
		href="{{ route('post.destroy', $post->id) }}"
		onclick="event.preventDefault();if(confirm('Are you sure want to delete this post?')){document.getElementById('destroy-post-form-{{ $post->id }}').submit()}">
		Delete
	</a>
	<form id="destroy-post-form-{{ $post->id }}" 
		action="{{ route('post.destroy', $post->id) }}"
		method="POST" style="display:none">
		{{ csrf_field() }}
		{{ method_field('DELETE') }}		
	</form>
	{{ $append_actions or '' }}
</div>
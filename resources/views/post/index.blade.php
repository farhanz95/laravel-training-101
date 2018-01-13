@extends('layouts.app')

@section('content')
    @include('components.menutable', ['models' => $posts])
    <div class="pull-right">
        {{ $posts->links() }}
    </div>
    @component('components.table')
        @slot('thead')
            <tr>
                <th>#</th>
                <th>User</th>
                <th>Post Name</th>
                <th>Post Type</th>
                <th>Post Address</th>
                <th>Post Time</th>
                <th>Post Email</th>
                <th>Action</th>
            </tr>
        @endslot
        @slot('tbody')
            @forelse($posts as $key => $post)
            <?php $model = $post; ?>
            <tr>
                <td>
                    {{
                        ($posts->currentPage() * $posts->perPage() - $posts->perPage())+($key+1)
                    }}
                </td>
                <td>{{ $post->user->name  }}</td>
                <td>{{ $post->post_name }}</td>
                <td>{{ $post->post_type }}</td>
                <td>{{ $post->post_address }}</td>
                <td>{{ $post->post_time }}</td>
                <td>{{ $post->post_email }}</td>
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
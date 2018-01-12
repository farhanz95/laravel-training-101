@extends('layouts.app')

@section('content')
    <div class="pull-left">
        There Are Currently {{ $posts->total() }} Post
        
        <br>

        No Of Post To Appear On Each Page
        <select name="perPage" class="form-control perPage" width="20px !important">
            @foreach (['15','30','45','60','75','90'] as $key => $value)
                 <option>{{ $value }}</option>
            @endforeach
        </select>
        <a href="{{ route('post.create') }}">
            <button class="btn btn-sm btn-default pull-left" style="margin-top:10px;margin-bottom:10px">Add Post</button>
        </a>
    </div>
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
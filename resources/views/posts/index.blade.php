@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">post List</div>
    <div class="card-body">
        @can('create-post')
            <a href="{{ route('posts.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New post</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Title</th>
                <th scope="col">Posted by</th>
                <th scope="col">Category</th>
                <th scope="col">Page view</th>
                <th scope="col">Summary</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $post->title }}</td>
                    <td>{{ $post->author }}</td>
                    <td>{{ $post->categories->name }}</td>
                    <td>{{ $post->pages->name }}</td>
                    <td>{{ Str::words($post->summary, 50, '...') }}</td>
                    <td>
                        <form action="{{ route('posts.destroy', $post) }}" method="post">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('posts.show', $post) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-post')
                                <a href="{{ route('posts.edit', $post) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-post')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this post?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No post Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $posts->links() }}

    </div>
</div>
@endsection
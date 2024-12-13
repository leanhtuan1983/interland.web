@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Page List</div>
    <div class="card-body">
        @can('create-page')
            <a href="{{ route('pages.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New page</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($pages as $page)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $page->name }}</td>
                    <td>{{ $page->description }}</td>
                    <td>
                        <form action="{{ route('pages.destroy', $page->id) }}" method="page">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('pages.show', $page->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-page')
                                <a href="{{ route('pages.edit', $page->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-page')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this page?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No page Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $pages->links() }}

    </div>
</div>
@endsection

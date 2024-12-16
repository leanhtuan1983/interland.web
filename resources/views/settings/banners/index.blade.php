@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Banner List</div>
    <div class="card-body">
        @can('create-banner')
            <a href="{{ route('banners.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Banner</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($banners as $banner)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $banner->name }}</td>
                    <td><img src="{{ url('storage/'.$banner->img_path) }}" alt="{{ $banner->img_path }}" style="height: 200px;; object-fit:cover;" /></td>
                    <td>{{ $banner->description }}</td>
                    <td>
                        <form action="{{ route('banners.destroy', $banner->id) }}" method="banner">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('banners.show', $banner->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-banner')
                                <a href="{{ route('banners.edit', $banner->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-banner')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this banner?');"><i class="bi bi-trash"></i> Delete</button>
                            @endcan
                        </form>
                    </td>
                </tr>
                @empty
                    <td colspan="4">
                        <span class="text-danger">
                            <strong>No Image Found!</strong>
                        </span>
                    </td>
                @endforelse
            </tbody>
        </table>

        {{ $banners->links() }}

    </div>
</div>
@endsection
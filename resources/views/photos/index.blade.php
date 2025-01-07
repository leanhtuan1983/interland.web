@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Photo List</div>
    <div class="card-body">
        @can('create-photo')
            <a href="{{ route('photos.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New photo</a>
        @endcan
        <table class="table table-striped table-bordered">
            <thead>
                <tr>
                <th scope="col">S#</th>
                <th scope="col">Album</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($photos as $photo)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $photo->albums->name }}</td>
                    <td><img class="img-fluid" src="{{ url('storage/'.$photo->url) }}" alt="{{ $photo->url }}" style="width: 200px; height: auto;; object-fit:cover;" /></td>
                    <td>{{ $photo->description }}</td>
                    <td>
                        <form action="{{ route('photos.destroy', $photo->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('photos.show', $photo->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-photo')
                                <a href="{{ route('photos.edit', $photo->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-photo')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this photo?');"><i class="bi bi-trash"></i> Delete</button>
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

        {{ $photos->links() }}

    </div>
</div>
@endsection
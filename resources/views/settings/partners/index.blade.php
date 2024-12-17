@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">Partner List</div>
    <div class="card-body">
        @can('create-part$partner')
            <a href="{{ route('partners.create') }}" class="btn btn-success btn-sm my-2"><i class="bi bi-plus-circle"></i> Add New Partner</a>
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
                @forelse ($partners as $partner)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $partner->name }}</td>
                    <td><img class="mx-auto d-block" src="{{ url('storage/'.$partner->img_path) }}" alt="{{ $partner->img_path }}" style="height: 100px;; object-fit:cover;" /></td>
                    <td>{{ $partner->description }}</td>
                    <td>
                        <form action="{{ route('partners.destroy', $partner->id) }}" method="POST">
                            @csrf
                            @method('DELETE')

                            <a href="{{ route('partners.show', $partner->id) }}" class="btn btn-warning btn-sm"><i class="bi bi-eye"></i> Show</a>

                            @can('edit-part$partner')
                                <a href="{{ route('partners.edit', $partner->id) }}" class="btn btn-primary btn-sm"><i class="bi bi-pencil-square"></i> Edit</a>
                            @endcan

                            @can('delete-partner')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Do you want to delete this partner?');"><i class="bi bi-trash"></i> Delete</button>
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

        {{ $partners->links() }}

    </div>
</div>
@endsection
@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Banner
                </div>
                <div class="float-end">
                    <a href="{{ route('banners.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('banners.update', $banner->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $banner->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @if ($banner->img_path)
                            <img src="{{ url('storage/' . $banner->img_path) }}" alt="Current Image" class="img-thumbnail mt-2" width="300">
                        @endif
                    </div>

                    <div class="mb-3 row">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" required>{{ old('description', $banner->description) }}</textarea>
                    </div>
                    
                    <div class="mb-3 row">
                        <input type="submit" class="col-md-3 offset-md-5 btn btn-primary" value="Update">
                    </div>
                </form>
            </div>
        </div>
    </div>    
</div>
    
@endsection






   
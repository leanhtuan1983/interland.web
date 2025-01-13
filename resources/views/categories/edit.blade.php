@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Edit Category
                </div>
                <div class="float-end">
                    <a href="{{ route('categories.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('categories.update', $category->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="mb-3 row">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" id="image" name="image" class="form-control">
                        @if ($category->image_path)
                            <img src="{{ asset('storage/' . $category->image_path) }}" alt="Current Image" class="img-thumbnail mt-2" width="300">
                        @endif
                    </div>
                    <div class="mb-3">
                    <select name="page_id" id="page_id" 
                                    class="form-control @error('page_id') is-invalid @enderror">
                                @foreach ($pages as $page)
                                    <option value="{{ $page->id }}" 
                                        {{ old('page_id', $category->page_id) == $page->id ? 'selected' : '' }}>
                                        {{ $page->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                    </div>
                    <div class="mb-3 row">
                        <label for="description" class="form-label">Description</label>
                        <textarea id="description" name="description" class="form-control" required>{{ old('description', $category->description) }}</textarea>
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






   
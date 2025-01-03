@extends('layouts.app')

@section('content')

<div class="row justify-content-center">
    <div class="col-md-8">

        <div class="card">
            <div class="card-header">
                <div class="float-start">
                    Add New Photo
                </div>
                <div class="float-end">
                    <a href="{{ route('photos.index') }}" class="btn btn-primary btn-sm">&larr; Back</a>
                </div>
            </div>
            <div class="card-body">
            <form action="{{ route('photos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
                <div class="form-group">
                    <label for="album">Chọn Album</label>
                    <select id="album" name="album_id" class="form-control">
                        <option value="">-- Chọn Album --</option>
                        @foreach ($albums as $album)
                        <option value="{{ $album->id }}" {{ old('album_id') == $album->id ? 'selected' : '' }}>{{ $album->name }}</option>
                        @endforeach
                        <option value="new" {{ old('album_id') == 'new' ? 'selected' : '' }}>-- Tạo Album mới --</option>
                    </select>
                    @error('album_id')
                        <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group mt-3" id="new-album-group" style="display: none;">
                    <label for="new-album">Tên Alum mới</label>
                    <input type="text" name="name" id="new-album" class="form-control" placeholder="Nhập tên album mới">
                </div>

                <div class="form-group mt-3">
                    <label for="photo">Upload ảnh</label>
                    <input type="file" name="photo" id="photo" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary mt-3">Lưu</button>
            </form>
            </div>
        </div>
    </div>    
</div>
<script>
    document.getElementById('album').addEventListener('change', function () {
        toggleNewAlbumGroup(this.value);
    });

    function toggleNewAlbumGroup(value) {
        const newAlbumGroup = document.getElementById('new-album-group');
        newAlbumGroup.style.display = value === 'new' ? 'block' : 'none';
    }

    // Trigger on page load in case of validation errors
    toggleNewAlbumGroup("{{ old('album_id') }}");
</script>  


@endsection



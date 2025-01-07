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
                        @if ($albums->isEmpty())
                            <option value="new" selected>-- Tạo Album mới --</option>
                        @else
                        @foreach ($albums as $album)
                            <option value="{{ $album->id }}">{{ $album->name }}</option>
                        @endforeach
                            <option value="new">-- Tạo Album mới --</option>
                        @endif
                    </select>
                </div>
                <div class="form-group mt-3" id="new-album" style="display: none;">
                    <label for="new-album">Tên Alum mới</label>
                    <input type="text" name="new_album" id="new_album" class="form-control" placeholder="Nhập tên album mới">
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
            $('#album').change(function() {
                if ($(this).val() == 'new') {
                    $('#new-album').show();
                } else {
                    $('#new-album').hide();
                }
            });
        });

</script>  
@endsection



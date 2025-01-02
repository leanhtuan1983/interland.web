<!-- Menu phải bài viết của trang Lĩnh vực hoạt động -->
<p class="h5 ms-4 mb-4 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Lĩnh vực hoạt động</p>
    @foreach ($fields as $field)
    <div class="ms-4 item-nav mt-2 p-1">
        <a class="item-field text-decoration-none text-black-50" href="{{ route('category-field',$field) }}"><i class="bi bi-chevron-right me-2"></i>{{ $field->name }}</a> 
    </div>
    @endforeach 
    <p class="h5 ms-4 mt-4 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Lĩnh vực tiêu biểu</p>
    @foreach ($typicalFields as $typicalField)
    <div class="d-flex ms-4 mb-4">
        <img src="{{ asset('storage/' . $typicalField->img_path) }}" alt="{{ $typicalField->name }}" style="width:82px; height:52px">
        <a class="ms-4 text-decoration-none text-dark post-title" href="{{ route('viewFieldItemPost',$typicalField) }}">
            {{ Str::words($typicalField->title, 10, '...') }}<br>
            <span class="text-black-50">{{ Carbon\Carbon::parse($typicalField->created_at)->format('d/m/y') }}</span>
        </a> 
    </div>
    @endforeach
</div>

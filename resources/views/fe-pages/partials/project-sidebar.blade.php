
<p class="h4 mb-4 border-bottom border-costume" style="color: rgb(99, 35, 111)">Lĩnh vực hoạt động</p>
    @foreach ($fields as $field)
    <div class="d-flex mb-4">
        <img src="{{ asset('storage/' . $field->image_path) }}" alt="{{ $field->name }}" style="width:82px; height:52px">
        <p class="ms-4">{{ $field->name }}</p>
    </div>
    @endforeach

    <p class="h4 mb-4 mt-2 border-bottom border-costume" style="color: rgb(99, 35, 111)">Dự án tiêu biểu</p>
    @foreach ($typicalProjects as $typicalProject)
    <div class="d-flex mb-4">
        <img src="{{ asset('storage/' . $typicalProject->img_path) }}" alt="{{ $typicalProject->name }}" style="width:82px; height:52px">
        <p class="ms-4 post-title">{{ Str::words($typicalProject->title, 10, '...') }}</br>
            <span class="text-black-50">{{ Carbon\Carbon::parse($typicalProject->created_at)->format('d/m/y') }}</span>
        </p>
    @endforeach
    </div>
</div>

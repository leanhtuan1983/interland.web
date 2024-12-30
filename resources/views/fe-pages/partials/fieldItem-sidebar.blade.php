<!-- Menu phải bài viết của trang Lĩnh vực hoạt động -->
<p class="h5 ms-4 mb-4 border-bottom border-costume" style="color: rgb(99, 35, 111)">Lĩnh vực hoạt động</p>
    @foreach ($fields as $field)
    <div class="ms-4 item-nav">
        <p class="item-field"><i class="bi bi-chevron-right me-2"></i>{{ $field->name }}</p>
    </div>
    @endforeach

    <p class="h5 ms-4 mt-4 border-bottom border-costume" style="color: rgb(99, 35, 111)">Dự án tiêu biểu</p>
    @foreach ($typicalProjects as $typicalProject)
    <div class="d-flex ms-4 mb-4">
        <img src="{{ asset('storage/' . $typicalProject->img_path) }}" alt="{{ $typicalProject->name }}" style="width:82px; height:52px">
        <p class="ms-4 post-title">{{ Str::words($typicalProject->title, 10, '...') }}</br>
            <span class="text-black-50">{{ Carbon\Carbon::parse($typicalProject->created_at)->format('d/m/y') }}</span>
        </p>
    </div>
    @endforeach
</div>

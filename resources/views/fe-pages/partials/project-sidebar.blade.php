<!-- Menu phải của trang Dự án -->
<p class="h4 mb-4 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Lĩnh vực hoạt động</p>
    @foreach ($fields as $field)
    <div class="d-flex mb-4">
        <img src="{{ asset('storage/' . $field->image_path) }}" alt="{{ $field->name }}" class="img-fluid" style="width:82px; height:auto; object-fit:cover;">
        <a class="text-decoration-none text-dark ms-2" href="{{ route('category-field',$field) }}">{{ $field->name }}</a>
    </div>
    @endforeach

    <p class="h4 mb-4 mt-2 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Dự án tiêu biểu</p>
    @foreach ($typicalProjects as $typicalProject)
        <div class="d-flex mb-4">
            <img src="{{ asset('storage/' . $typicalProject->img_path) }}" alt="{{ $typicalProject->name }}" class="img-fluid" style="width:82px; height:auto; object-fit:cover;">
            <a class="ms-4 text-decoration-none text-dark post-title" href="{{ route('viewProjectItemPost',$typicalProject) }}">
                {{ Str::words($typicalProject->title, 10, '...') }}<br>
                <span class="text-black-50">{{ Carbon\Carbon::parse($typicalProject->created_at)->format('d/m/y') }}</span>
            </a> 
        </div>
    @endforeach
</div>

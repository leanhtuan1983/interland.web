<!-- Menu phải trang hiển thị từng hạng mục của Lĩnh vực hoạt động -->

<p class="h5 ms-4 mb-4 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Lĩnh vực hoạt động</p>
@foreach ($fields as $field)
    <div class="ms-4 item-nav mt-2 p-1">
        <a class="item-field text-decoration-none text-black-50 {{ Request::is('linh-vuc-hoat-dong/'.$field->slug) ? 'active' : '' }}" 
            href="{{ route('category-field', $field->slug) }}">
            <i class="bi bi-chevron-right me-2"></i>{{ $field->name }}
        </a>
    </div>
@endforeach


<p class="h5 ms-4 mt-4 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Dự án tiêu biểu</p>
    @foreach ($typicalProjects as $typicalProject)
    <div class="d-flex ms-4 mb-4">
        <img src="{{ asset('storage/' . $typicalProject->img_path) }}" alt="{{ $typicalProject->name }}" class="img-fluid" style="width:82px; height:auto; object-fit:cover;">

        <a class="ms-4 text-decoration-none text-dark post-title" href="{{ route('viewProjectItemPost',$typicalProject) }}">
                {{ Str::words($typicalProject->title, 10, '...') }}<br>
                <span class="text-black-50">{{ Carbon\Carbon::parse($typicalProject->created_at)->format('d/m/y') }}</span>
        </a> 
    </div>
    @endforeach
</div>

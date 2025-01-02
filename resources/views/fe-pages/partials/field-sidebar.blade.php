<!-- Menu phải của trang Lĩnh vực hoạt động -->
<div class="row">
    <p class="h4 mb-4 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Dự án</p>
    @foreach ($projects as $project)
        <div class="d-flex mb-4">
            <img src="{{ asset('storage/' . $project->image_path) }}" alt="{{ $project->name }}" style="width:82px; height:52px">
            <a class="text-decoration-none text-dark ms-2" href="{{ route('category-project', $project)}}">{{ $project->name }}</a>
        </div>
    @endforeach

    <p class="h4 mb-4 mt-2 border-bottom border-2 border-costume" style="color: rgb(99, 35, 111)">Lĩnh vực tiêu biểu</p>
    @foreach ($typicalFields as $typicalField)
        <div class="d-flex mb-4">
            <img src="{{ asset('storage/' . $typicalField->img_path) }}" alt="{{ $typicalField->name }}" style="width:82px; height:62px; object-fit:cover;">
            <a class="ms-4 text-decoration-none text-dark post-title" href="{{ route('viewFieldItemPost',$typicalField) }}">
                {{ Str::words($typicalField->title, 10, '...') }}<br>
                <span class="text-black-50">{{ Carbon\Carbon::parse($typicalField->created_at)->format('d/m/y') }}</span>
            </a> 
        </div>
    @endforeach
</div>



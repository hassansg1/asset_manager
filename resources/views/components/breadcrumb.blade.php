<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-20">{{ $heading ?? '' }}</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($items as $item)
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}"
                        ><a href="{{ route('view/assets', $item->id) }}">{{ $item->text ?? '' }}</a></li>
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
</div>

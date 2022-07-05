<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            @if($heading == 'dropDown')
            <h4 class="mb-sm-0 font-size-20"></h4>
            @else
                <h4 class="mb-sm-0 font-size-20">{{ $heading ?? '' }}</h4>
            @endif

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach($items as $item)
                        <li class="breadcrumb-item {{ $loop->last ? 'active' : '' }}"
                        ><a href="{{ route('view/assets', $item->id) }}">
                                @if($heading == 'dropDown')
                                {{ $item->text ?? '' }} |
                                @else
                                    {{ $item->text ?? '' }}
                                @endif
                            </a></li>
                    @endforeach
                </ol>
            </div>

        </div>
    </div>
</div>



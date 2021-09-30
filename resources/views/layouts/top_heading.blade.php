<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0 font-size-18 top_heading_text">{{ $heading ?? '' }}</h4>

            @if(isset($goBack))
                <button onclick="location.href='{{ $goBack }}'" type="button" class="mt-4 btn waves-effect">
                    <i style="font-size: 15px" class="fas fa-backspace"> Go Back</i>
                </button>
            @endif
        </div>
        @isset($item)
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @php $crItem = $item @endphp
                    @while($crItem->parentName())
                        @php $parents[] = $crItem->parentModel() @endphp
                        @php $crItem = $crItem->parentModel() @endphp
                    @endwhile
                    @if(isset($parents) && count($parents) > 0)
                        @foreach(array_reverse($parents) as $parent)
                            @php $model =  new ReflectionClass($parent)@endphp
                            <li class="breadcrumb-item">&nbsp;<a target="_blank"
                                                                 href="{{ route(strtolower($model->getShortName()).'.show',$parent->id) }}">{{ $parent->show_name }}</a>
                            </li>
                        @endforeach
                    @endif
                    <li class="breadcrumb-item active">&nbsp;{{ $item->show_name }}
                    </li>
                </ol>
            </div>
        @endisset
    </div>
</div>

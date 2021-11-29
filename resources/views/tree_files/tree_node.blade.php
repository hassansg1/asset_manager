@php($rand = rand(10000,100000))
<li id="li_{{ $parent->combine_name_short }}" class="li_{{ $rand }}" data-tata="{{ $parent->combine_name_short }}">
    <a data-classstring="{{ $classString }}" id="{{ $parent->combine_name_short }}" href="javascript:void(0)"
       class="waves-effect tree_ul_a"
       aria-expanded="false">
        <span onclick="location.href='{{ url( 'filterAssets/'.($parent->getSelfModel() ? str_replace('\\','-',str_replace('??','_',$parent->getSelfModel()->combine)) : '') ) }}'"
              key="t-multi-level">{{$parent->getSelfName()}}</span>
        @if (count($parent->childs()) > 0)
            <span>
        <i style="float: right" onclick="toggleLiArrows('{{ $rand }}')"
           class="fas fa-angle-right fa-angle-up_kkk link_{{ $parent->combine_name_short }}"
           id="{{ $rand }}"></i>
    </span>
        @endif
    </a>
    @php($classString .= $classString == '' ? $parent->combine_name_short : '-'.$parent->combine_name_short)

    @if (count($parent->noAssetChilds()) > 0)
        <ul class="tree_ul_a {{ $parent->combine_name_short }}">
            @foreach($parent->noAssetChilds() as $parent)
                @include('tree_files.tree_node', $parent)
            @endforeach
        </ul>
    @endif
</li>

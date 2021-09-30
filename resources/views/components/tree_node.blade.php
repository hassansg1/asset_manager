{{--@php($rand = rand(10000,100000))--}}
{{--<li class="">--}}
{{--    <a href="javascript:void(0)" class="waves-effect tree_ul_a" aria-expanded="true">--}}
{{--        <span onclick="location.href='{{  $parent->getSelfModel()->getLink() }}'" key="t-multi-level">{{$parent->getSelfName()}}</span>--}}
{{--        @if (count($parent->childs()) > 0)--}}
{{--            <span>--}}
{{--        <i style="float: right" onclick="toggleLiArrows('{{ $rand }}')" class="fas fa-angle-up fa-angle-up_kkk" id="{{ $rand }}"></i>--}}
{{--    </span>--}}
{{--        @endif--}}
{{--    </a>--}}

{{--    @if (count($parent->childs()) > 0)--}}
{{--        <ul class="tree_ul_a">--}}
{{--            @foreach($parent->childs() as $parent)--}}
{{--                @include('tree_files.tree_node', $parent)--}}
{{--            @endforeach--}}
{{--        </ul>--}}
{{--    @endif--}}
{{--</li>--}}

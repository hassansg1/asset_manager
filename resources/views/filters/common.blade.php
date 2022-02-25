<div class="filters">
    @if(isset($data['no_header']))
    @else
        @include('filters.add')
        @include('filters.pagination')
    @endif
    {{--    @include('filters.add_remove_columns')--}}
    {{--    @include('filters.advanced_filters')--}}
    {{--    @include('filters.delete')--}}
    {{--    @include('filters.refresh')--}}
    @include('filters.export')
    @include('filters.search')
    @yield('filters')
</div>
<div class="mt-2">
    @yield('below_filters')
</div>
<style>
    .btn_padding8{
        padding: 8px 15px !important;
    }
    .btn_padding5{
        padding: 5px 15px !important;
    }
</style>

<div class="filters">
    @include('filters.add')
    @include('filters.add_remove_columns')
    @include('filters.advanced_filters')
    @include('filters.delete')
    @include('filters.refresh')
    @include('filters.pagination')
    @include('filters.export')
    @yield('filters')
</div>
<div class="mt-2">
    @yield('below_filters')
</div>

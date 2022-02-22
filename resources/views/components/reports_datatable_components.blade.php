<div class="data_table_div" id="">
    <div id="{{ $route ?? '' }}">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
{{--                        @include('filters.common')--}}
                        <div class="mt-2">
                        </div>
                        <div class="custom_table_div">
                            <table id="{{ $id ?? 'datatable-buttons' }}"
                                   class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                <thead class="table-light custom_table_head">
                                <tr>
                                    @yield('table_header')
                                </tr>
                                </thead>
                                <tbody id="table_content_div_body">
                                @yield('table_rows')
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
        @yield('table_bottom')
    </div>
</div>

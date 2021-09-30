@extends('layouts.master')

@section('title') {{ $heading }}s @endsection

@section('content')
    @yield('top_content')
    @include('layouts.top_heading',['heading' => $heading."s"])
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        @include('filters.common')
                        <div class="mt-2">
                        </div>
                        <div class="custom_table_div">
                            <table id="datatable-buttons" class="table table-bordered dt-responsive nowrap w-100 dataTable no-footer dtr-inline">
                                <thead class="table-light custom_table_head">
                                <tr>
                                    <th class="select_all_checkbox" style="width: 10px"><input onclick="toggleSelectAll()"
                                                                                               type="checkbox" name=""
                                                                                               id="select_all"></th>
                                    @yield('table_header')
                                    <th>
                                        Actions
                                    </th>
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
    </div>
@endsection
@section('script')
    <script>
        function toggleSelectAll() {
            $('.select_row').prop('checked', $('#select_all').is(":checked"));
        }
    </script>
    @include('scripts.script_datatable')
@endsection

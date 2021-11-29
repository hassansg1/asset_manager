@extends('layouts.master')

@section('title') {{ $heading }}s @endsection

@section('content')
    @yield('top_content')
    @include('layouts.top_heading',['heading' => $heading])
    <div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">

                        @include('filters.common')
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
    </div>
@endsection
@section('script')
    <script>
        function toggleSelectAll() {
            $('.select_row').prop('checked', $('#select_all').is(":checked"));
        }

        function deleteItem(item, id) {
            $.ajax({
                type: "POST",
                url: '{{ route('resource.deleteCheck') }}',
                data: {
                    item: item,
                    '_token': '{{ csrf_token() }}'
                },
                success: function (result) {
                    if (result.status) {
                        $('#delete_' + id).submit();
                    } else
                        doErrorToast('This company cannot be deleted. Reason : Underlying data exists.Delete underlying data first..');
                },
            });
        }
    </script>
    @include('scripts.script_datatable')
@endsection

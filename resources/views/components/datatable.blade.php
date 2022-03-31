@extends('layouts.master')

@section('title') {{ $heading }} @endsection

@section('content')
    @yield('top_content')
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h5 class="mb-sm-0 font-size-18 top_heading_text">
                    @if(isset($customHeading))
                        @yield('custom_heading')
                    @else
                        {{$heading}}
                    @endif
                </h5>
            </div>
        </div>
    </div>

    @yield('top_content_secondary')
    @include('components.datatable_components')
@endsection

@section('script')
    <script>
        function toggleSelectAll() {
            $('.select_row').not(':disabled').prop('checked', $('#select_all').is(":checked"));
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

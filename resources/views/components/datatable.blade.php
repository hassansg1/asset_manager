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
            $('#delete_' + id).submit();
        }
    </script>
    @include('scripts.script_datatable')
@endsection

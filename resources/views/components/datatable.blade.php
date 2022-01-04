@extends('layouts.master')

@section('title') {{ $heading }}s @endsection

@section('content')
@yield('top_content')
@include('layouts.top_heading',['heading' => $heading])
@yield('top_content_secondary')
@include('components.datatable_components')
@endsection
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

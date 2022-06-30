@extends('layouts.master_secondry')

@section('title') {{ $heading }}s @endsection

@section('content')
@yield('top_content')
@include('layouts.top_heading',['heading' => $heading])
@include('components.datatable_components')
@endsection
@section('script')
<script>
    function toggleSelectAll() {
        $('.select_row').prop('checked', $('#select_all').is(":checked"));
    }

    function deleteItem(item, id) {
        $('.delete_' + id).submit();
    }
</script>
@include('scripts.script_datatable')
@endsection

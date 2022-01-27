@extends('components.datatable')
@section('top_content_secondary')
    <input type="hidden" name="not_in_software_id" id="not_in_software_id" value="">
    <input type="hidden" name="patch_id_filter" id="patch_id_filter" value="">
    <div id="selected_patch"></div>
    <div id="selected_software"></div>
    @include('patch.partials.modals')
@endsection
@section('below_filters')
    @include('patch.partials.top_btns')
@endsection
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Patch Name</th>
    <th>Software Name</th>
    <th>Software Version</th>
    <th>Vendor Name</th>
    <th>Release Date</th>
    <th>CVE</th>
    <th>Action</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@section('script')
    @include('patch.script')
    <script>
        function selectApprovedSoftware() {
            let selectElements = [];
            $('input:checkbox.select_row').each(function () {
                if (this.checked) {
                    selectElements.push($(this).val());
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route("patch.bulkApprove") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    elements: selectElements,
                },
                success: function (result) {
                    showModal(defaultModal, result.html);
                    $('.select2').select2();
                },
            });
        }

        function applySelectedPatches() {
            let selectElements = [];
            $('input:checkbox.select_row').each(function () {
                if (this.checked) {
                    selectElements.push($(this).val());
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route("patch.applyBulkPatches") }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    elements: selectElements,
                },
                success: function (result) {
                    showModal(defaultModal, result.html);
                    $('.select2').select2();
                },
            });
        }
    </script>
@endsection

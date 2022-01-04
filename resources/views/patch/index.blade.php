@extends('components.datatable')
@section('top_content_secondary')
    <button onclick="selectApprovedSoftware()" class="btn btn-primary mb-1">Select Approved Softwares</button>
    <button onclick="applySelectedPatches()" class="btn btn-primary mb-1">Apply Selected Patches</button>
@endsection
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Software</th>
    <th>Name</th>
    <th>Description</th>
    <th>Release Date</th>
    <th>Action</th>
@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@section('script')
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

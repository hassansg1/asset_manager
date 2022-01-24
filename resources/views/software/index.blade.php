@extends('components.datatable')
@section('top_content_secondary')
    <input type="hidden" name="not_in_software_id" id="not_in_software_id" value="">
    <input type="hidden" name="software_id_filter" id="software_id_filter" value="">
    @include('software.partials.modals')
@endsection
@section('table_header')
    <th class="select_all_checkbox" style="width: 10px"><input
            onclick="toggleSelectAll()"
            type="checkbox" name=""
            id="select_all"></th>
    <th>Vendor Name</th>
    <th>Software Name</th>
    <th>Version</th>
    <th>Description</th>
    <th>Patch Approval</th>
    <th>Actions</th>

@endsection
@section('table_rows')
    @include($route.'.form_rows')
@endsection
@section('script')
    @include('software.script')
    <script>
        function selectApprovedPatches() {
            let selectElements = [];
            $('input:checkbox.select_row').each(function () {
                if (this.checked) {
                    selectElements.push($(this).val());
                }
            });
            $.ajax({
                type: "POST",
                url: '{{ route("software.bulkApprove") }}',
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

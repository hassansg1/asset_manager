@can('Edit '.$route)
    <input type="hidden" name="can_edit" value="1" id="can_edit">
    <div style="text-align: right">
        <button type="submit" class="btn btn-primary w-md submit_form">Save</button>
    </div>
@endcan
@section('script')
    <script>
        function addNewAfterSave() {
            $('form').append('<input type="hidden" name="add_new" value="1" />');
            $('.submit_form').click();
        }

        $(document).ready(function () {
            let canEdit = $('#can_edit').val();
            if (canEdit != 1)
            {
                $("form :input").prop("disabled", true);
            }
        });
    </script>
@endsection

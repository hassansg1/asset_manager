{{--@can('Edit '.$route)--}}
    <input type="hidden" name="can_edit" value="1" id="can_edit">
    <div style="text-align: center">
        <button type="submit" class="btn btn-primary w-md submit_form">Save</button>
        <a href="{{route($route.'.index')}}">
            <button type="button" class="btn btn-primary w-md submit_form">Cancel</button>
        </a>
    </div>
{{--@endcan--}}
@section('script')
    <script>
        function addNewAfterSave() {
            $('form').append('<input type="hidden" name="add_new" value="1" />');
            $('.submit_form').click();
        }

        $(".item_form").submit(function (e) {
            if ($('#change_justification_reason').val() == undefined) {
                showModal(justificationModal, $('#justification_modal_content').html());
                e.preventDefault();
            }
        });

        $(document).ready(function () {
            // let canEdit = $('#can_edit').val();
            // if (canEdit != 1)
            // {
            //     $("form :input").prop("disabled", true);
            // }
        });
    </script>
@endsection

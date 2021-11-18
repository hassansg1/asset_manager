<div style="text-align: center">
    <button type="submit" class="btn btn-primary w-md submit_form">Save</button>
    <button type="button" onclick="addNewAfterSave()" style="display: {{ isset($edit) && $edit ? 'none' : 'inline'}} "
            class="btn btn-primary w-md">Save and Add New
    </button>
    <button type="submit" class="btn btn-primary w-md">
        <a class="href_btns" href="{{ url()->previous()  }}">Cancel</a>
    </button>
</div>

@section('script')
    <script>
        // $(".item_form").submit(function (e) {
        //     if ($('#change_justification_reason').val() == undefined) {
        //         showModal(justificationModal, $('#justification_modal_content').html());
        //         e.preventDefault();
        //     }
        // });

        function addNewAfterSave() {
            $('form').append('<input type="hidden" name="add_new" value="1" />');
            $('.submit_form').click();
        }
    </script>
@endsection

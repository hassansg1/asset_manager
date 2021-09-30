<script>
    function addNote() {
        let content = $('#notes_field').val();
        let clientId = $('#current_obj_id').val();

        $.ajax({
            type: "POST",
            url: '{{ route('notes.store') }}',
            data: {
                notes_content: content,
                clientId: clientId,
                ajax: true,
                '_token': '{{ csrf_token() }}'
            },
            success: function (result) {
                if (result.status) {
                    $('#loyalty_points_table').html(result.html);
                    doSuccessToast('Success..!!!');
                } else {
                    doSomethingWentWrongToast();
                }
            },
        });
    }

    function updateNote(id) {
        let content = $('#notes_field_modal_' + id).val();
        let clientId = $('#current_obj_id').val();

        $.ajax({
            type: "POST",
            url: '{{ route('notes.update',0) }}',
            data: {
                notes_content: content,
                clientId: clientId,
                id: id,
                ajax: true,
                '_method': 'put',
                '_token': '{{ csrf_token() }}'
            },
            success: function (result) {
                if (result.status) {
                    $('#notes_table').html(result.html);
                    doSuccessToast('Success..!!!');
                } else {
                    doSomethingWentWrongToast();
                }
            },
        });
    }

    function editNote(id,route) {
        $.ajax({
            type: "GET",
            url: route,
            success: function (result) {
                if (result.status) {
                    showModal(centerModal, result.html);
                } else {
                    doSomethingWentWrongToast();
                }
            },
        });
    }
</script>

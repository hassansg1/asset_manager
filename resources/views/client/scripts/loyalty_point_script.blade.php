<script>

    $(document).ready(function () {
        $('#loyalty_points_table_el').DataTable();
    });

    function addLoyaltyPoints() {
        let balance = $('#loyalty_points_input').val() == '' ? 0 : $('#loyalty_points_input').val();
        let comment = $('#comments_loyalty').val();
        let clientId = $('#current_obj_id').val();

        $.ajax({
            type: "POST",
            url: '{{ route('loyalty_points.store') }}',
            data: {
                'balance': balance,
                clientId: clientId,
                ajax: true,
                comment: comment,
                '_token': '{{ csrf_token() }}'
            },
            success: function (result) {
                if (result.status) {
                    $('#loyalty_points_table').html(result.html);
                    $('#loyalty_points_table_el').DataTable();
                    doSuccessToast('Success..!!!');
                } else {
                    doSomethingWentWrongToast();
                }
            },
        });
    }
</script>

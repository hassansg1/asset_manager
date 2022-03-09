<script>

    function applicableClauseStatusChange(clause_id, column_name, value) {
        $.ajax({
            type: "POST",
            url: '{{ route('applicableClause.storeClauseData') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'clause_id': clause_id,
                'column_name': column_name,
                'value': value,
            },
            success: function (result) {
                if (result.status) {
                    if (value == 1) {
                        $('#select_location_' + clause_id).removeAttr('disabled');
                    } else if (value == 0 && column_name == "applicable") {
                        $('#select_location_' + clause_id).prop('disabled', true);
                        $('#select_location_' + clause_id).prop('selectedIndex',0);
                    }
                    doSuccessToast('Success ...!!!');
                } else
                    doErrorToast('Failure...!!!');
            },
        });
    }
</script>



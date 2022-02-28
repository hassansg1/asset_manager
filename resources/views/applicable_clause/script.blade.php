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
                if(value == 1){
                    $('#select_location_'+clause_id).removeAttr('disabled');
                }else{
                    $('#select_location_'+clause_id).prop('disabled', true);
                }
                doSuccessToast('Success ...!!!');
            },
        });
    }
</script>



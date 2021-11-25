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
                doSuccessToast('Success ...!!!');
            },
        });
    }
</script>



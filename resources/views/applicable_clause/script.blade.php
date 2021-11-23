<script>

    function complianceStatusChange(compliance_id, column_name, value) {

        // console.log('compliance_id' + compliance_id +
        //             'column_name' + column_name +
        //             'value' + value);
        $.ajax({
            type: "POST",
            url: '{{ route('compliance.storeComplaiceData') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'compliance_id': compliance_id,
                'column_name': column_name,
                'value': value,

            },
            success: function (result) {
                doSuccessToast('Success ...!!!');
            },
        });
    }

    function complianceAddLocation(compliance_data_id) {

        var selected = $('.complianceDatalocation').select2("val");
        $.ajax({
            type: "POST",
            url: '{{ route('compliance.storeComplianceDataLocations') }}',
            data: {
                '_token': '{{ csrf_token() }}',
                'compliance_data_id': compliance_data_id,
                'value': selected,

            },
            success: function (result) {
                $('#lll_' + compliance_data_id).html(result.html);
                $('.complianceDatalocationss').select2();
                console.log(result);
            },
        });

    }
</script>



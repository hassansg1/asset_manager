<script>

    function complianceStatusChange(compliance_id,column_name,value) {

        // console.log('compliance_id' + compliance_id +
        //             'column_name' + column_name +
        //             'value' + value);
        $.ajax({
            type: "POST",
            url: '{{ route('compliance.storeComplaiceData') }}',
            data: {
                    '_token': '{{ csrf_token() }}',
                    'compliance_id' : compliance_id,
                    'column_name' : column_name,
                    'value' : value,

                },
            success: function (result) {
                if (result.status) {
                    console.log(result);
                } else {
                }
            },
        });
    }

    function complianceAddLocation(compliance_data_id,column_name,value)
    {
         $.ajax({
            type: "POST",
            url: '{{ route('compliance.storeComplaiceDataLocations') }}',
            data: {
                    '_token': '{{ csrf_token() }}',
                    'compliance_id' : compliance_id,
                    'column_name' : column_name,
                    'value' : value,

                },
            success: function (result) {
                if (result.status) {
                    console.log(result);
                } else {
                }
            },
        });
         
    }
</script>


   
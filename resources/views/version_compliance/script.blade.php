<script>

    function showCompliancePopup(locationId, clauseId, versionId) {
        $.ajax({
            url: '{{url('/showCompliancePopup')}}',
            type: 'GET',
            data: {
                locationId: locationId,
                clauseId: clauseId,
                versionId: versionId,
            },
            success: function (data) {
                if (data.status) {
                    showModal(defaultModal, data.html);
                    $('.select2').select2();
                } else
                    doErrorToast();
            }
        });
    }

    $('body').on('click', '.details-control', function () {
        var tr = $(this).closest('tr');
        var row = complianceTable.row(tr);
        var trId = $(this).attr('data-id');
        let iconClass = $('.icon_' + trId);
        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
            iconClass.removeClass('fas fa-eye-slash');
            iconClass.addClass('fas fa-eye');

        } else {
            showSubLocations(tr, row, trId, iconClass);
        }
    });

    function showSubLocations(tr, row, trId, iconClass) {
        $.ajax({
            url: '{{url('/getLocationsOfCompliance')}}',
            type: 'GET',
            data: {trId: trId, version: '{{ $version }}'},
            success: function (data) {
                row.child(data.html).show();
                tr.addClass('shown');
                $('.select2').select2();
                iconClass.removeClass('fas fa-eye');
                iconClass.addClass('fas fa-eye-slash');
            }
        });
    }


    function updateCompliant(location_id, e, compliance_version_id, compliance_data_id) {
        var compliant = $(e).val();
        $.ajax({
            url: '{{ url('/updateComplianceVersionItems') }}',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: 'POST',
            data: {
                compliant: compliant,
                compliance_data_id: compliance_data_id,
                location_id: location_id,
                compliance_version_id: compliance_version_id
            },
            success: function (data) {
                if (data.status) {
                    doSuccessToast();
                }
            }
        });

    }

    function updateComplianceVersionItemsAttachmentId(location_id, e, compliance_version_id, compliance_data_id) {
        let attachment_id = $(e).val();
        $.ajax({
            url: '{{ url('/updateComplianceVersionItems') }}',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: 'POST',
            data: {
                attachment_id: attachment_id,
                compliance_data_id: compliance_data_id,
                location_id: location_id,
                compliance_version_id: compliance_version_id
            },
            success: function (data) {
                if (data.status) {
                    doSuccessToast();
                }
            }
        });

    }

    function updateComment(location_id, e, compliance_version_id, compliance_data_id) {
        let comment = $(e).val();
        $.ajax({
            url: '{{ url('/updateComplianceVersionItems') }}',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: 'POST',
            data: {
                comment: comment,
                compliance_data_id: compliance_data_id,
                location_id: location_id,
                compliance_version_id: compliance_version_id
            },
            success: function (data) {
                if (data.status) {
                    doSuccessToast();
                }
            }
        });

    }

    function updateLink(location_id, e, compliance_version_id, compliance_data_id) {
        var link = $(e).val();
        $.ajax({
            url: '{{ url('/updateComplianceVersionItems') }}',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: 'POST',
            data: {
                link: link,
                compliance_data_id: compliance_data_id,
                location_id: location_id,
                compliance_version_id: compliance_version_id
            },
            success: function (data) {
                if (data.status) {
                    doSuccessToast();
                }
            }
        });

    }

    function updateAttachment($location_id, e) {
        var tr = $(this).closest('tr');
        var attachment_id = $(e).val();
        var location_id = $location_id;
        $.ajax({
            url: '{{ url('/updateComplianceVersionItems') }}',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            type: 'POST',
            data: {attachment_id: attachment_id, location_id: location_id},
            success: function (data) {
                if (data.status) {
                    doSuccessToast();
                }
            }
        });

    }
</script>



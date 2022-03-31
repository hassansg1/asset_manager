@if($request->view == "false")
    @include('version_compliance.partials.edit_popup_content')
@else
    @include('version_compliance.partials.view_popup_content')
@endif
<script>
    $("#complianceForm").on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            url: '{{url('/submitCompliance')}}',
            type: 'POST',
            data: $("#complianceForm").serialize(),
            success: function (data) {
                if (data.status) {
                    let locationId = $('#location_id').val();
                    let clauseId = $('#clause_id').val();
                    let el = $('#' + "compl_" + locationId + clauseId);
                    console.log($(data.html).find('.compl_compliant').html());
                    el.find('.compl_compliant').html($(data.html).find('.compl_compliant').html());
                    el.find('.compl_comment').html($(data.html).find('.compl_comment').html());
                    el.find('.compl_attachment').html($(data.html).find('.compl_attachment').html());
                    // el.replaceWith(data.html);
                    $('.modal').modal('hide');
                    doSuccessToast();
                } else
                    doErrorToast();
            }
        });
    });
</script>

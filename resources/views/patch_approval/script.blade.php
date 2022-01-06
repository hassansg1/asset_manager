<script>
    function onTypeChange() {
        let value = $('#start_type').val();
        loadPatchPageData(value, 'top_content_table');
        $('#confirm_selection').css('display','block');
    }

    function loadPatchPageData(type, div) {
        $.ajax({
            type: "GET",
            url: window.location.origin + '/' + type,
            success: function (result) {
                $('#' + div).html($(result).find('.data_table_div').html());
            },
        });
    }

    function confirmTopSelection() {
        let value = $('#start_type').val();
        let bottomValue = 'software';
        if (value == "software") bottomValue = 'patch';
        loadPatchPageData(bottomValue, 'bottom_content_table');
        $('#confirm_approval').css('display','block');
    }
</script>

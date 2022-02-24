<script>
    let pageNumber = 1;
    $(document).on("click", ".page-link", function (e) {
        e.preventDefault();
        let url = $(this).attr('href');
        let query = url.split('?');
        pageNumber = query[1].split('=')[1];
        let type = query[0].split('/');
        type = type[type.length - 1];
        loadTableData(url, type);
    });

    // $(document).on('keyup', '#search_keyword', function (e) {
    //     if (e.keyCode == 13) {
    //         $('#keyword_search_btn').trigger("click");
    //     }
    // });

    $(document).on('search', '#search_keyword', function (e) {
        $('#keyword_search_btn').trigger("click");
    });

    function loadDataTableDynamically(type, div) {
        loadTableData(window.location.origin + '/' + type, div);
    }

    function loadTableData(url, div) {
        let not_in_software_id = $('#not_in_software_id').val();
        let not_in_software_id_condition = '';
        if (not_in_software_id && not_in_software_id != "") {
            not_in_software_id_condition = 1;
        }
        let software_id = $('#software_id_filter').val();
        let patch_id = $('#patch_id_filter').val();
        let asset_id_filter = $('#asset_id_filter').val();
        let search_keyword = $('#search_keyword').val();
        let patch_ids = $("input[name='checked_patch[]']")
            .map(function () {
                return $(this).val();
            }).get();
        let software_ids = $("input[name='checked_software[]']")
            .map(function () {
                return $(this).val();
            }).get();


        $.ajax({
            type: "GET",
            url: url,
            data: {
                not_in_software_id_condition: not_in_software_id_condition,
                not_in_software_id: not_in_software_id,
                software_id: software_id,
                patch_id: patch_id,
                asset_id_filter: asset_id_filter,
                search_keyword: search_keyword,
                patch_ids: patch_ids,
                software_ids: software_ids,

            },
            success: function (result) {
                $('#' + div).html($(result).find('#' + div).html());
            },
        });
    }

    function disableForm(target) {
        $(target + " :input").prop("disabled", true);
    }

    function showDetailPopup(url) {
        $.ajax({
            type: "get",
            url: url,
            success: function (result) {
                if (result) {
                    showModal(defaultModal, $(result).find('.item_form').find('.row').html())
                    // disableForm('#pageAdd');
                }
            }

        });
    }

    $(document).on('change', '.select_row', function () {
        let type = $(this).attr('data-type');

        if (this.checked) {
            let id = $(this).val();
            if ($('#selected_' + type).length == 0) {
                $('body').append('<div id=' + 'selected_' + type + '></div>');
            }
            $('#selected_' + type).append('<input type="hidden" value="' + id + '" name="checked_' + type + '[]" id="' + type + id + '">');
        } else {
            let id = $(this).val();
            $('#' + type + id).remove();
        }
    });
</script>
